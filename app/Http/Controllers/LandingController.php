<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use DOMDocument;
use DomXPath;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
    private function findClassFromHtml($html, $className)
    {
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        $finder = new DomXPath($dom);
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $className ')]");

        $result = [];
        foreach ($nodes as $node) {
            $result[] = $node->nodeValue;
        }

        return $result;
    }

    public function scrapeData(Request $request)
    {
        $request->validate([
            'depature' => 'required|string',
            'destination' => 'required|string',
        ]);

        $depature = $request->input('depature');
        $destination = $request->input('destination');

        $url = "https://www.tiket.com/pesawat/search?d=$depature&a=$destination&date=2024-01-16&adult=1&child=0&infant=0&class=economy&dType=AIRPORT&aType=AIRPORT&dLabel=CGK&aLabel=SUB&type=depart&flexiFare=true";

        try {
            $client = new Client();
            $username = 'U0000138959';
            $password = 'l7Tmmbzi01knplOF0S';
            $base64Credentials = base64_encode($username . ':' . $password);

            $response = $client->request('POST', 'https://scraper-api.smartproxy.com/v2/scrape', [
                'body' => '{"target":"universal","geo":"Indonesia","headless":"html","url":"' . $url . '"}',
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic ' . $base64Credentials,
                    'Content-Type' => 'application/json',
                ],
            ]);

            $jsonResponse = $response->getBody()->getContents();
            $dataArray = json_decode($jsonResponse, true);

            if (isset($dataArray['results'][0]['content'])) {
                $htmlContent = $dataArray['results'][0]['content'];

                // Penentuan Class Yang ingin diambil
                $classNameMaskapai = "Text_text__DSnue Text_size_b2__y3Q2E Text_weight_bold__m4BAY";
                $classNameHarga = "Text_text__DSnue Text_variant_alert__7jMF3 Text_size_h3__qFeEO Text_weight_bold__m4BAY";
                $classJam = "Text_text__DSnue Text_size_h3__qFeEO Text_weight_bold__m4BAY";
                $classDestination = "Text_text__DSnue Text_variant_lowEmphasis__VihAq Text_size_b3__6n_9j";

                // Mencari dan menampilkan teks dari class yang diinginkan
                $jam = $this->findClassFromHtml($htmlContent, $classJam);
                $maskapai = $this->findClassFromHtml($htmlContent, $classNameMaskapai);
                $harga = $this->findClassFromHtml($htmlContent, $classNameHarga);
                $destination = $this->findClassFromHtml($htmlContent, $classDestination);

                // Menyimpan data scraping ke dalam database atau melakukan operasi lain sesuai kebutuhan

                // Menampilkan hasil scraping

                $response = [];
                for ($i = 0; $i < count($maskapai); $i++) {
                    $response[] = [
                        "id" => $i,
                        "maskapai" => $maskapai[$i],
                        "harga" => $harga[$i],
                        "jamBerangkat" => $jam[$i * 2],
                        "jamTiba" => $jam[$i * 2 + 1],
                        "asal" => $destination[$i * 4],
                        "tujuan" => $destination[$i * 4 + 3],
                    ];
                }

                $request->session()->put('response', $response);
            } else {
                echo 'Format response tidak sesuai.';
            }
        } catch (RequestException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        return view('landing.result')->with('response', $response);
    }

    public function hasil()
    {
        $data = session('response');

        return view('landing.result', compact('data'));
    }

    public function detail($id)
    {
        // // Ambil data dari session atau database sesuai kebutuhan
        // $data = session('responses');

        // if (isset($data[$id])) {
        //     // Get the selected result
        //     $selectedResult = $data[$id];}
        // // Cari data dengan ID yang sesuai
        // // $selectedResult = collect($data)->firstWhere('id', $id);

        // // Kirim data ke halaman detail
        // return view('landing.detail', compact('selectedResult'));
        // Ambil data dari session atau database sesuai kebutuhan
        $data = session('response');

        // Initialize $selectedResult to handle cases where $id is not found
        $selectedResult = null;

        if (isset($data[$id])) {
            // Get the selected result
            $selectedResult = $data[$id];
        }

        // Kirim data ke halaman detail
        return view('landing.detail', compact('selectedResult'));
    }

    public function tambah (Request $request)
    {
        $request->validate([
            'Kota_asal' => 'required',
            'Kota_Tujuan' => 'required',
            'jam_berangkat' => 'required',
            'jam_tiba' => 'required',
            'maskapai' => 'required',
            'harga' => 'required',
            'pemesan' => 'required',
            'penumpang' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO pesanan(kota_asal,Kota_Tujuan,jam_berangkat,jam_tiba,maskapai,harga,pemesan,penumpang, created_at) VALUES(:Kota_asal,:Kota_Tujuan,:jam_berangkat,:jam_tiba,:maskapai,:harga,:pemesan,:penumpang, :created_at)',
            [
                'Kota_asal' => $request->Kota_asal,
                'Kota_Tujuan' => $request->Kota_Tujuan,
                'jam_berangkat' => $request->jam_berangkat,
                'jam_tiba' => $request->jam_tiba,
                'maskapai' => $request->maskapai,
                'harga' => $request->harga,
                'pemesan' => $request->pemesan,
                'penumpang' => $request->penumpang,
                'created_at' => NOW(),
            ]
        );
        return redirect()->route('landing.index')->with('success', 'Data Pesanan berhasil disimpan');
    }
}
