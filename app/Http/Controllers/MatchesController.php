<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Match;
use App\Models\Team;
use DateTime;
use PhpOption\None;
use Tests\DuskTestCase;

class MatchesController extends Controller
{
    private function convertDateFormat($dateString): string
    {
        // Parse the date string using DateTime
        $date = DateTime::createFromFormat('l, F d Y', $dateString);

        // Format the date as yyyy-mm-dd
        return $date->format('Y-m-d');
    }

    private function loadMatchDataFromApi($url)
    {
        return ['', 0, 0, 0, 0];
    }

    public function loadDataFromApi()
    {

        $ch = curl_init();

        $url = "https://www.strafe.com/calendar/csgo/";
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

        file_put_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file.txt', $response);

        $response = file_get_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file.txt');

        $dom = new \DOMDocument();
        @$dom->loadHTML($response);

        $xpath = new \DOMXPath($dom);

        $upcomingMatches = $xpath->query('//div[contains(@class, "calendar_section__g_8cP")]');

        $matchesData = [];
        foreach ($upcomingMatches as $matchElement)
        {
            $calendarMatchItems = $xpath->query('.//a[contains(@class, "calendar_match__0kcvd")]', $matchElement);
            $matchData = [];


            $sectionMatchesDate = $xpath->query('.//h2[contains(@class, "calendar_sectionHeader__a2fDX")]', $matchElement);
            $matchDate = Null;

            foreach ($sectionMatchesDate as $date)
            {
                $matchDate = $date->textContent;
            }

            foreach ($calendarMatchItems as $calendarMatchItem)
            {
                $names = $xpath->query('.//span[contains(@class, "truncatedText_container__rqNN9")]', $calendarMatchItem);
                $teamsData = [];

                foreach ($names as $name)
                {
                    $teamsData[] = $name->textContent;
                }

                $logos = $xpath->query('.//img', $calendarMatchItem);
                $i=0;
                foreach ($logos as $logo)
                {
                    $teamsData[] = $logo->getAttribute('src');
                    $i++;
                    if ($i == 2)
                        break;
                }

                $times = $xpath->query('.//div[contains(@class, "calendar_time__EZpaW")]', $calendarMatchItem);
                foreach ($times as $time)
                {
                    $teamsData[] = $time->textContent;
                }

                $teamsData[] = $matchDate;
                $teamsData = array_merge($teamsData, $this->loadMatchDataFromApi($calendarMatchItem->getAttribute('href')));
                $matchData[] = $teamsData;

                $game = Game::where('name', 'csgo')->first();
                $team1 = Team::where('name', $teamsData[0])->first();
                if (!$team1)
                {
                    $team1 = new Team();
                    $team1->name = $teamsData[0];
                    $team1->logo = $teamsData[3];
                    $team1->ranking = 0;
                    $team1->game_id = $game->id;
                    $team1->save();
                }
                $team2 = Team::where('name', $teamsData[1])->first();
                if (!$team2)
                {
                    $team2 = new Team();
                    $team2->name = $teamsData[1];
                    $team2->logo = $teamsData[4];
                    $team2->ranking = 0;
                    $team2->game_id = $game->id;
                    $team2->save();
                }

                $match = Match::where('team1_id', $team1->id)
                    ->where('team2_id', $team2->id)
                    ->where('date', $this->convertDateFormat($teamsData[6]))
                    ->first();

                if (!$match)
                {
                    $match = new Match();
                    $match->team1_id = $team1->id;
                    $match->team2_id = $team2->id;
                    $match->tournament = $teamsData[2];
                    $match->time = $teamsData[5] == 'Live' ? '00:00' : $teamsData[5];
                    $match->live = $teamsData[5] == 'Live' ? 1 : 0;
                    $match->date = $this->convertDateFormat($teamsData[6]);
                    $match->team1_cef = $teamsData[8];
                    $match->team1_points = $teamsData[10];
                    $match->team2_cef = $teamsData[9];
                    $match->team2_points = $teamsData[11];
                    $match->format = $teamsData[7];
                    $match->scrap_url = $calendarMatchItem->getAttribute('href');
                    $match->team2_points = $teamsData[11];
                    $match->save();
                } else {
                    $match->time = $teamsData[5] == 'Live' ? '00:00' : $teamsData[5];
                    $match->live = $teamsData[5] == 'Live' ? 1 : 0;
                    $match->date = $this->convertDateFormat($teamsData[6]);
                    $match->team1_cef = $teamsData[8];
                    $match->team1_points = $teamsData[10];
                    $match->team2_cef = $teamsData[9];
                    $match->team2_points = $teamsData[11];
                    $match->save();
                }
            }

            $matchesData[] = $matchData;
        }

        return redirect()->back();
    }
}
