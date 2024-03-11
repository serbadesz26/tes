<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\Share;
use App\Models\Counter;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    // Index
    public function index(Request $request, $kanal)
    {
        if($request['berita_search'] != "") {
            $respBerita =  Http::get('https://serumpun.babelprov.go.id/berita_search/'.$request['berita_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respBerita =  Http::get('https://serumpun.babelprov.go.id/berita.json/'.$kanal.'?page='.((int)$request['page']-1))->json();
        }
        $respKanal =  Http::get('https://serumpun.babelprov.go.id/kanal_berita.json')->json();
        $breadcrumbs = [['link' => "/berita/all", 'name' => "Indeks"]];

        // Meta Tags
        Helper::setMeta(
            'berita_index',
            URL::to('/').'/berita/all',
            'Berita, News',
            'Indeks Berita Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Berita seputaran Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_prodkum.png')
        );

        return view('/content/berita/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_berita' => $respBerita,
            'data_kanal' => $respKanal['listKanal']
        ]);
    }

    // Detil Berita
    public function show($slug)
    {
        $respDetilBerita =  Http::get('https://serumpun.babelprov.go.id/test_berita_detil.json/'.$slug)->json();
        $respBerita =  Http::get('https://serumpun.babelprov.go.id/berita.json')->json();
        $img_thumb = $respDetilBerita['dtl_foto'];
        $breadcrumbs = [['link' => "/berita/all", 'name' => $respDetilBerita['title']]];
        
        $counter = Counter::where('slug', $slug)->count();
        if($counter == 0){
            $countnya = str_replace(',','',$respDetilBerita['total-view'])+1;
            $simpan = DB::table('counter')
                ->insert(['slug' => $slug, 'count' => $countnya]);
        }
        else{
            $counter = Counter::where('slug', $slug)->first();
            $countnya = $counter['count']+1;
            $update = DB::table('counter')
              ->where('slug', $slug)
              ->update(['count' => $countnya]);
            //$update = Counter::where('slug', $slug)->update(['count' => $countnya]);
            //var_dump($countnya);
        }
        
        // Meta Tags
        Helper::setMeta(
            'berita_detil',
            URL::to('/').'/berita_detil'.$respDetilBerita['slug'],
            'Berita, News',
            $respDetilBerita['title'],
            $respDetilBerita['keterangan'],
            Helper::getImage($img_thumb)
        );

        return view('/content/berita/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_berita' => $respDetilBerita,
            'data_berita' => $respBerita['daftarBerita'],
            'img_thumb' => $img_thumb,
            'counter' => $countnya
        ]);
    }
}
