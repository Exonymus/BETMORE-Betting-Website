<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class GameMatch extends Model
{
    use HasFactory;


    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function getTeams()
    {
        return [
            'team1' => $this->team1,
            'team2' => $this->team2,
        ];
    }

    public function bets()
    {
        return $this->hasMany(Bet::class, 'match_id', 'id');
    }

    public function handleMatchEnd($status)
    {
        if ($status == 0)
        {
            $this->results = $this->team1->name;
            $this->winner_id = $this->team1->id;
        }
        elseif ($status == 1)
        {
            $this->results = $this->team2->name;
            $this->winner_id = $this->team2->id;
        }

        $this->save();

        foreach ($this->bets as $bet)
        {
            if ($bet->team->name == $this->results)
            {
                $win = $bet->amount * $bet->coefficient;
                $curDebt = $bet->user->loans()->where('action', 'take')->sum('amount') - $bet->user->loans()->where('action', 'return')->sum('amount');
                if ($curDebt > 0)
                {
                    $loan = new Loan();
                    $loan->amount = min($win*0.25, $curDebt);
                    $win -= $loan->amount;
                    $loan->action = 'return';
                    $loan->user_id = $bet->user_id;
                    $loan->save();
                }

                $bet->user->coins += $win;
                if ($bet->insured == '1')  $bet->user->noloses += $bet->amount * 0.2;
                $bet->user->save();
            }
            else
            {
                if ($bet->insured == '1')
                {
                    $bet->user->coins += $bet->amount;
                    $bet->user->save();
                }
            }
        }
    }

    public function loadDetails()
    {
        $ch = curl_init();

        $url = "https://www.strafe.com" . $this->scrap_url;
        $BASE_URL = "https://app.scrapingbee.com/api/v1/?";
        $API_KEY = "8I795R9NMOT3PP6K7GOQJUFWCJDCLHEUWP4ZJQT8DCZTD0CKLTSYVWMDFBRMVW0PMQRRKC7YZX77OX5M";

        $parameters = array(
            'api_key' => $API_KEY,
            'url' => $url
        );
        $query = http_build_query($parameters);

        curl_setopt($ch, CURLOPT_URL, $BASE_URL.$query);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        Log::info('curl_exec($ch);');
        do
        {
            $response = curl_exec($ch);

            if ($response === false) {
                Log::error('cURL error: ' . curl_error($ch));
                Log::error('cURL error code: ' . curl_errno($ch));
            }
        } while($response === false);
        Log::info('got data');

        file_put_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file_match.txt', $response);

        $response = file_get_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file_match.txt');

        Log::info('@$dom->loadHTML($response);');
        $dom = new \DOMDocument();
        @$dom->loadHTML($response);

        $xpath = new \DOMXPath($dom);

        $check = $xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]');
        $win = $xpath->query('//div[@class="absolute right-0 -bottom-8 uppercase font-bold my-auto md:ml-4 md:static text-positive"]');
        if ($check[0] and $win[0])
        {
            Log::info($check[0]->textContent);
            $score1 = substr($check[0]->textContent, 0, 1);
            $score2 = substr($check[0]->textContent, 4, 1);
            if ($score1 > $score2)
                $this->handleMatchEnd(0);
            else
                $this->handleMatchEnd(1);
            return;
        }

        $format = $xpath->query('//div[@class="match_properties__Bt08M text-xs"]');
        $children = $format->item(0)->getElementsByTagName('div');
        Log::info($children->length - 1);
        $sixthChildText = $children->item($children->length - 1)->textContent;
        $sixthChildText = str_replace('Format', '', $sixthChildText);

        $coefficients = [];
        if (!$xpath->query('//div[@data-oddsbanner-provider="ggbet"]//div[@class="flex items-center justify-center"]/div[@class="border-2 border-gray-300 px-3"]')[0])
            $coefficients = [0, 0];
        else
        {
            $coefficients[] = $xpath->query('//div[@data-oddsbanner-provider="ggbet"]//div[@class="flex items-center justify-center"]/div[@class="border-2 border-gray-300 px-3"]')[0]->textContent;
            $coefficients[] = $xpath->query('//div[@data-oddsbanner-provider="ggbet"]//div[@class="flex items-center justify-center"]/div[@class="ml-4 border-2 border-gray-300 px-3"]')[0]->textContent;
        }


        $points = [];
        if (!$xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/span[@class="font-semibold"]')[0])
            $points = [0, 0];
        else
        {
            $points[] = $xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/span[@class="font-semibold"]')[0]->textContent;
            $points[] = $xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/span[@class="font-semibold"]')[1]->textContent;
            if ($points[0] === '')
                $points = [0, 0];
        }

        Log::info('this change');
        $this->format = $sixthChildText;
        $this->team1_cef = $coefficients[0];
        $this->team2_cef = $coefficients[1];
        $this->team1_points = $points[0];
        $this->team2_points = $points[1];
        $this->save();
    }
}
