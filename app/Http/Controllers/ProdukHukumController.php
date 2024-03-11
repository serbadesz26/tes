<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class ProdukHukumController extends Controller
{
    // Index
    public function index(Request $request, $kategori)
    {
        $breadcrumbs = [['link' => "produk_hukum", 'name' => "Indeks"]];
            
        if($request['prodkum_search'] != "") {
            $respProdKum =  Http::get('https://jdih.babelprov.go.id/produk_hukum_search/'.$request['prodkum_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respProdKum=  Http::get('https://jdih.babelprov.go.id/produk_hukum.json/'.$kategori.'?page='.((int)$request['page']-1))->json();
        }

        $respKategoriProdKum =  Http::get('https://jdih.babelprov.go.id/kategori_produk_hukum.json')->json();

        // Meta Tags
        Helper::setMeta(
            'produk_hukum_index',
            URL::to('/').'/produk_hukum/all',
            'Produk Hukum',
            'Indeks Produk Hukum Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Produk Hukum Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_prodkum.png')
        );
        

        return view('/content/produk_hukum/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_produk_hukum' => $respProdKum,
            'data_kategori_produk_hukum' => $respKategoriProdKum['listKategori'],
        ]);
    }

    // Detil Produk Hukum
    public function show($slug)
    {
        $breadcrumbs = [['link' => "produk_hukum", 'name' => ""]];

        $respDetilProdKum =  Http::get('https://jdih.babelprov.go.id/produk_hukum_detil.json/'.$slug)->json();
        $respProdKum=  Http::get('https://jdih.babelprov.go.id/produk_hukum.json/all')->json();
        $img_thumb = asset('images/website/img_prodkum.png');

        // Meta Tags
        Helper::setMeta(
            'produk_hukum_detil',
            URL::to('/').'/produk_hukum_detil'.$respDetilProdKum['slug'],
            $respDetilProdKum['kategori'],
            $respDetilProdKum['kategori'].' '.($respDetilProdKum['no'] ? 'Nomor '.$respDetilProdKum['no'] : '').' Tahun '.$respDetilProdKum['tahun'],
            $respDetilProdKum['title'],
            $img_thumb
        );

        return view('/content/produk_hukum/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_prodkum' => $respDetilProdKum,
            'data_prodkum' => $respProdKum['listProdKum'],
            'img_thumb' => $img_thumb
        ]);
    }

}
