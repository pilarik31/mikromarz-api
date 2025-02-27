<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WattmeterController extends Controller
{

    public function index(): Response
    {
        return new Response('Hello, world!');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }

    /**
     * 0-5: DateTime
     * 7: Device
     * 16-19: CH3 impulses
     * 20: Hlavička - určuje způsob zpracování záznamu
     * 
     * @link https://sensorfor.com/www/manual/NT3_IG4.pdf
     * @link http://sensorfor.com/www/index.php/lokalni
     */
    public function download(): JsonResponse
    {
        $response = Http::get(Env::get('WATTMETER_URL'));
        $split = Str::of($response->body())->split('/;/');

        $datetime = '20' . $split->get(0) . '-' . $split->get(1) . '-'
        . $split->get(2) . ' ' . $split->get(3) . ':' . $split->get(4)
        . ':' . $split->get(5);

        $test = ()

        $parsed = new Collection([
            'device' => $split->get(7),
            'timestamp' => Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('Y-m-d H:i:s'),
        ]);

        dump($response->body());
        dump($split);


        // dump($parsed);

        return new JsonResponse([
            'code' => 200,
            ...$parsed->toArray()
        ]);
    }
}
