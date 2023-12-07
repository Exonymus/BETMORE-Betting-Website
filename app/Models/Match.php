<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
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
        return $this->hasMany(Bet::class);
    }

    public function loadDetails()
    {
        $ch = curl_init();

        $url = "https://www.strafe.com" . $this->scrap_url;
        $BASE_URL = "https://app.scrapingbee.com/api/v1/?";
        $API_KEY = "ZM68CWN4A5RK0ARD85LUJL0XWCUSQ8OLL9JZ4AL7X8G1ZBV3REIDWGV2QVOR3R2ZI7587R1DCCXCW2LE";

        $parameters = array(
            'api_key' => $API_KEY,
            'url' => $url
        );
        $query = http_build_query($parameters);

        curl_setopt($ch, CURLOPT_URL, $BASE_URL.$query);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        file_put_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file_match.txt', $response);

        $response = file_get_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file_match.txt');

        $dom = new \DOMDocument();
        @$dom->loadHTML($response);

        $xpath = new \DOMXPath($dom);

        $format = $xpath->query('//div[@class="match_properties__u8GBC text-xs"]');
        $children = $format->item(0)->getElementsByTagName('div');
        $sixthChildText = $children->item(5)->textContent;
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
        if (!$xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/div[@class="font-semibold"]')[0])
            $points = [0, 0];
        else
        {
            $points[] = $xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/div[@class="font-semibold"]')[0]->textContent;
            $points[] = $xpath->query('//div[@class="text-2xl sm:text-3xl my-auto"]/div[@class="font-semibold"]')[1]->textContent;
        }

        $this->format = $sixthChildText;
        $this->team1_cef = $coefficients[0];
        $this->team2_cef = $coefficients[1];
        $this->team1_points = $points[0];
        $this->team2_points = $points[1];
        $this->save();
    }
}
