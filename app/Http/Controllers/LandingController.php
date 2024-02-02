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
        $tanggal = $request->input('tanggal');
        $airline = $request->input('airline');

        $url = "https://flights.booking.com/flights/SUB.AIRPORT-SRG.AIRPORT/?type=ONEWAY&adults=1&cabinClass=ECONOMY&children=&from=$depature.AIRPORT&to=$destination.AIRPORT&fromCountry=ID&toCountry=ID&fromLocationName=Bandara+Internasional+Soekarno-Hatta&toLocationName=Bandara+Internasional+Ahmad+Yani&depart=$tanggal&sort=BEST&travelPurpose=leisure&aid=397594&label=gog235jc-1DCAEoggI46AdIElgDaGiIAQGYARK4ARfIAQzYAQPoAQH4AQKIAgGoAgO4AruUlK0GwAIB0gIkMjM1ZjkzNjMtNTJlMS00ODU0LTg0ZTgtMGNjNTdmZTVkOTc42AIE4AIB";
        $response = [];

        try {
            $client = new Client();
            $username = 'U0000143378';
            $password = 'PW1bfc7aaa9a82a41a04f60e93da655aabb';
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
                $classNameMaskapai = "Text-module__root--variant-small_1___+fbYj";
                $classNameHarga = "FlightCardPrice-module__priceContainer___nXXv2";
                $classJam = "Text-module__root--variant-strong_1___SNYxf";
                $classDestination = "Text-module__root--variant-small_1___+fbYj";

                // Mencari dan menampilkan teks dari class yang diinginkan
                $jam = $this->findClassFromHtml($htmlContent, $classJam);
                $maskapai = $this->findClassFromHtml($htmlContent, $classNameMaskapai);
                $harga = $this->findClassFromHtml($htmlContent, $classNameHarga);
                $destination = $this->findClassFromHtml($htmlContent, $classDestination);

                // Menyimpan data scraping ke dalam database atau melakukan operasi lain sesuai kebutuhan

                // Menampilkan hasil scraping

                $response = [];
                for ($i = 0; $i < count($harga); $i++) {
                    $response[] = [
                        "id"=>$i,
                        "maskapai" => $maskapai[$i*10+8],
                        "harga" => $harga[$i],
                        "jamBerangkat" =>$jam[$i*2+1],
                        "jamTiba" =>$jam[$i*2+2],
                        "asal"=>$maskapai[$i*10],
                        "tujuan"=>$maskapai[$i*10+5],
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
        // Ambil data dari session
        $data = session('response');
        $pemesan = session('name');
        // Initialize $selectedResult to handle cases where $id is not found
        $selectedResult = null;

        if (isset($data[$id])) {
            // Get the selected result
            $selectedResult = $data[$id];
        }

        // Kirim data ke halaman detail
        return view('landing.detail', compact('selectedResult', 'pemesan'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'Kota_asal' => 'required',
            'Kota_Tujuan' => 'required',
            'jam_berangkat' => 'required',
            'jam_tiba' => 'required',
            'maskapai' => 'required',
            'harga' => 'required',
            'tittle' => 'required|array',
            'nama' => 'required|array',
            'nik' => 'required|array',
        ]);

        $penumpangArray = array_map(
            function ($tittle, $nama, $nik) {
                return $tittle . $nama . "-" . $nik;
            },
            $request->input('tittle'),
            $request->input('nama'),
            $request->input('nik')
        );

        $penumpang = implode(", ", $penumpangArray);

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
                'penumpang' => $penumpang,
                'created_at' => NOW(),
            ]
        );
        return redirect()->route('landing.index')->with('success', 'Data Pesanan berhasil disimpan');
    }

    public function cart()
    {
        $pemesan = session('name');
        $keranjangs = DB::select('SELECT * FROM pesanan WHERE pemesan = :pemesan', ['pemesan' => $pemesan]);
        return view('landing.cart')->with('keranjangs', $keranjangs);
    }
}
