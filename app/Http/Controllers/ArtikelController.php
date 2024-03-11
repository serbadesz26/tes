<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class ArtikelController extends Controller
{
    // Index
    public function index(Request $request, $kanal)
    {
        $breadcrumbs = [['link' => "artikel", 'name' => "Indeks"]];

        if($request['artikel_search'] != "") {
            $respArtikel =  Http::get('https://serumpun.babelprov.go.id/artikel_search/'.$request['artikel_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respArtikel =  Http::get('https://serumpun.babelprov.go.id/artikel.json/'.$kanal.'?page='.((int)$request['page']-1))->json();
        }

        $respKanal =  Http::get('https://serumpun.babelprov.go.id/kanal_artikel.json')->json();

        // Meta Tags
        Helper::setMeta(
            'artikel_index',
            URL::to('/').'/artikel/all',
            'Artikel, Article',
            'Indeks Artikel Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Artikel seputaran Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_prodkum.png')
        );

        return view('/content/artikel/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_artikel' => $respArtikel,
            'data_kanal' => $respKanal['listKanal'],
        ]);
    }

    // Detil Artikel
    public function show($slug)
    {
        $respDetilArtikel =  Http::get('https://serumpun.babelprov.go.id/artikel_detil.json/'.$slug)->json();
        $respArtikel =  Http::get('https://serumpun.babelprov.go.id/artikel.json')->json();
        $img_thumb = $respDetilArtikel['dtl_foto'];
        $breadcrumbs = [['link' => "/artikel/all", 'name' => $respDetilArtikel['title']]];

        // Meta Tags
        Helper::setMeta(
            'artikel_detil',
            URL::to('/').'/artikel_detil'.$respDetilArtikel['slug'],
            'Artikel, Article',
            $respDetilArtikel['title'],
            $respDetilArtikel['keterangan'],
            $img_thumb
        );

        return view('/content/artikel/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_artikel' => $respDetilArtikel,
            'data_artikel' => $respArtikel['listArtikel'],
            'img_thumb' => $img_thumb
        ]);
    }
}
