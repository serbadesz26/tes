<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class LayananSpbeController extends Controller
{
    // Index
    public function index($kategori, $jenis)
    {
        $respLayananSPBE =  Http::get('https://kominfo.babelprov.go.id/layanan_spbe.json/'.$kategori.'/'.$jenis)->json();
        $respKategori =  Http::get('https://kominfo.babelprov.go.id/kat_layanan_spbe.json')->json();
        $respJenis =  Http::get('https://kominfo.babelprov.go.id/jenis_layanan_spbe.json')->json();
        $breadcrumbs = [['link' => "layanan_spbe/all/all", 'name' => "Indeks"]];

        // Meta Tags
        Helper::setMeta(
            'layanan_spbe',
            URL::to('/').'/layanan_spbe/all/all',
            'Layanan SPBE, E-Government Services',
            'Layanan SPBE Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Informasi Layanan SPBE Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_layanan_spbe.png')
        );

        return view('/content/layanan_spbe/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_layanan_spbe' => $respLayananSPBE,
            'data_kategori_layanan_spbe' => $respKategori['listKategoriLayananSPBE'],
            'data_jenis_layanan_spbe' => $respJenis['listJenisLayananSPBE'],
        ]);
    }
}
