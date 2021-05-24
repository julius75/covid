<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class CovidController extends Controller
{
    public function getAll()
    {
        $client = new Client(['verify' => false ]);
        $request = $client->get('https://disease.sh/v3/covid-19/historical/kenya');
        $apiResult = (array) json_decode($request->getBody(), false);
       // $cases = array_keys((array) $apiResult["timeline"]->cases);
       // dd($cases);
        return Datatables::of($apiResult)
            ->addColumn('date', function($apiResult){
                return array_keys((array) $apiResult["timeline"]->cases);
            })
            ->addColumn('cases', function($apiResult){
                return array_values((array) $apiResult["timeline"]->cases);
            })
            ->addColumn('recovered', function($apiResult){
                return array_values((array) $apiResult["timeline"]->recovered);
            })
            ->addColumn('deaths', function($apiResult){
                return array_values((array) $apiResult["timeline"]->deaths);
            })
            ->make(true);
    }
}
