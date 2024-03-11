<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class TransparansiAnggaranController extends Controller
{
    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index(Request $request, $kategori)
    {
        $breadcrumbs = [['link' => "transparansi_anggaran", 'name' => ""]];

        if($request['transparansi_anggaran_search'] != "") {
            $respTransAnggaran =  Http::get('https://serumpun.babelprov.go.id/transparansi_anggaran_search/'.$request['transparansi_anggaran_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respTransAnggaran =  Http::get('https://serumpun.babelprov.go.id/transparansi_anggaran.json/'.$kategori.'?page='.((int)$request['page']-1))->json();
        }

        $respKategoriTransAnggaran =  Http::get('https://serumpun.babelprov.go.id/kategori_transparansi_anggaran.json')->json();

        // Meta Tags
        Helper::setMeta(
            'transparansi_anggaran_index',
            URL::to('/').'/transparansi_anggaran/all',
            'Produk Hukum',
            'Indeks Transparansi Anggaran Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Transparansi Anggaran Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_trans_anggaran.png')
        );

        return view('/content/transparansi_anggaran/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_transparansi_anggaran' => $respTransAnggaran,
            'data_kategori_transparansi_anggaran' => $respKategoriTransAnggaran['listTransAnggaran'],
        ]);
    }


    // ------------------------------------------------------------------------------
    //      ::  S H O W  /   D E T I L ::
    // ------------------------------------------------------------------------------
    public function show($slug)
    {
        $breadcrumbs = [['link' => "bank_data_detil", 'name' => ""]];

        $respDetilTransparansiAnggaran =  Http::get('https://serumpun.babelprov.go.id/transparansi_anggaran_detil.json/'.$slug)->json();
        $respTransparansiAnggaran=  Http::get('https://jdih.babelprov.go.id/transparansi_anggaran.json/all')->json();
        $img_thumb = asset('images/website/img_trans_anggaran.png');

        // Meta Tags
        Helper::setMeta(
            'transparansi_anggaran_detil',
            URL::to('/').'/transparansi_anggaran_detil'.$respDetilTransparansiAnggaran['slug'],
            $respDetilTransparansiAnggaran['kategori'],
            $respDetilTransparansiAnggaran['kategori'].' Tahun '.$respDetilTransparansiAnggaran['tahun'],
            $respDetilTransparansiAnggaran['title'],
            $img_thumb
        );

        return view('/content/transparansi_anggaran/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_transparansi_anggaran' => $respDetilTransparansiAnggaran,
            'data_transparansi_anggaran' => $respTransparansiAnggaran['listTransparansiAnggaran'],
            'img_thumb' => $img_thumb
        ]);
    }
}
