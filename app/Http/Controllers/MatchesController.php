<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HltvApi\Client;
use HltvApi\Entity\Entity;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {
        $client = new Client();
        $matches = $client->ongoing();
        dd($matches);

        return redirect()->back();
    }
}
