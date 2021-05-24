<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ContohController extends Controller
{
    
    //
    function index(){
        $client = new Client(['base_uri' => 'https://smksumatra40.sch.id/']);

        $params = array("limit" => 10);
        $response = $client->request('GET', '/api/aktivitas.html', $params)->getBody();
        $response = json_decode($response);
        $response = $response->result->datas;
        return view("brader", ["data" => $response]);
    }
    
    function data(){


        $data[] = array(
            "status" => true,
            "message" => "Sukses",
            "data" => "base64",
        );
        $data[] = array(
            "kode_aktivitas" => "AKTVS7668010529202108116921",
            "judul" => "Menghapus File",
            "user" => "1 - resitdc - Restu Dwi Cahyo",
            "waktu" => "Selasa, 11 Mei 2021 - 08:01:29",
            "keterangan" => "resitdcmenghapus file dengan nama f28a7e159347a5598ff11b4a0f307cf7.apk dengan tipe application melalui ip 114.5.218.253 dengan browser Chrome pada OS Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36"
        );
        $data[] = array(
            "kode_aktivitas" => "AKTVS8477010503202108112004",
            "judul" => "Login ke dashboard",
            "user" => "1 - resitdc - Restu Dwi Cahyo",
            "waktu" => "Selasa, 11 Mei 2021 - 08:01:03",
            "keterangan" => "Restu Dwi Cahyo login ke dashboard melalui ip 114.5.218.253 dengan browser Chrome pada OS Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36"
        );

        return json_encode($data);
    }
}
