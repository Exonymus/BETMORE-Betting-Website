<?php

namespace App\Http\Controllers;

use PhpOption\None;
use Tests\DuskTestCase;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {

//        $ch = curl_init();
//
//        $url = "https://www.strafe.com/calendar/csgo/";
//        $BASE_URL = "https://app.scrapingbee.com/api/v1/?";
//        $API_KEY = "ZM68CWN4A5RK0ARD85LUJL0XWCUSQ8OLL9JZ4AL7X8G1ZBV3REIDWGV2QVOR3R2ZI7587R1DCCXCW2LE";
//
//        $parameters = array(
//            'api_key' => $API_KEY,
//            'url' => $url
//        );
//        $query = http_build_query($parameters);
//
//        curl_setopt($ch, CURLOPT_URL, $BASE_URL.$query);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//        $response = curl_exec($ch);
//
//        file_put_contents('C:\OSPanel\domains\BETMORE-Betting-Website\app\Http\Controllers\file.txt', $response);

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

                $times = $xpath->query('.//div[contains(@class, "calendar_time__EZpaW")]', $calendarMatchItem);
                foreach ($times as $time)
                {
                    $teamsData[] = $time->textContent;
                }

                $teamsData[] = $matchDate;
                $matchData[] = $teamsData;
            }

            $matchesData[] = $matchData;
        }

        dd($matchesData);

        return redirect()->back();
    }
}
