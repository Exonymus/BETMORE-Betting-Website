<?php

namespace App\Http\Controllers;

use App\Jobs\LoadDataFromApiJob;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {
        LoadDataFromApiJob::dispatch();
        return redirect()->back();
    }
}
