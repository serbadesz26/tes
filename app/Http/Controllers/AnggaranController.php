<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class AnggaranController extends Controller
{
    // Index
    public function index(Request $request, $kategori)
    {
        $breadcrumbs = [['link' => "anggaran", 'name' => "Indeks"]];

        if($request['anggaran_search'] != "") {
            $respAnggaran =  Http::get('https://serumpun.babelprov.go.id/anggaran_search/'.$request['anggaran_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respAnggaran=  Http::get('https://serumpun.babelprov.go.id/anggaran.json/'.$kategori.'?page='.((int)$request['page']-1))->json();
        }

        $respKategoriAnggaran =  Http::get('https://serumpun.babelprov.go.id/kategori_anggaran.json')->json();

        // Meta Tags
        Helper::setMeta(
            'anggaran_index',
            URL::to('/').'/anggaran/all',
            'Transparansi Anggaran',
            'Transparansi Anggaran Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_prodkum.png')
        );

        return view('/content/anggaran/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_anggaran' => $respAnggaran,
            'data_kategori_anggaran' => $respKategoriAnggaran['listKategori'],
        ]);
    }

    // Detil Transparansi Anggaran
    public function show($slug)
    {
        $breadcrumbs = [['link' => "anggaran", 'name' => ""]];

        $respDetilAnggaran =  Http::get('https://serumpun.babelprov.go.id/anggaran_detil.json/'.$slug)->json();
        $respAnggaran=  Http::get('https://serumpun.babelprov.go.id/anggaran.json/all')->json();
        $img_thumb = asset('images/website/img_prodkum.png');

        // Meta Tags
        Helper::setMeta(
            'anggaran_detil',
            URL::to('/').'/anggaran_detil'.$respDetilAnggaran['slug'],
            $respDetilAnggaran['kategori'],
            $respDetilAnggaran['kategori'].' Tahun '.$respDetilAnggaran['tahun'],
            $respDetilAnggaran['title'],
            $img_thumb
        );

        return view('/content/anggaran/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_anggaran' => $respDetilAnggaran,
            'data_anggaran' => $respAnggaran['listAnggaran'],
            'img_thumb' => $img_thumb
        ]);
    }

}
