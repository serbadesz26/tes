<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PerangkatDaerahController extends Controller
{
    // Index
    public function index(Request $request, $kategori = null)
    {
        $breadcrumbs = [['link' => "perangkat_daerah", 'name' => "Indeks"]];

        $respPerangkatDaerah =  Http::get('https://serumpun.babelprov.go.id/perangkat_daerah.json/'.$kategori)->json();
        $respKategoriPerangkatDaerah=  Http::get('https://serumpun.babelprov.go.id/kategori_perangkat_daerah.json')->json();

        return view('/content/perangkat_daerah/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_perangkat_daerah' => $respPerangkatDaerah,
            'data_kategori_perangkat_daerah' => $respKategoriPerangkatDaerah['listPd'],
        ]);
    }

    // Detil PerangkatDaerah
    public function show($slug)
    {
        $breadcrumbs = [['link' => "perangkat_daerah_detil", 'name' => "Detil"]];
        
        $respDetilPerangkatDaerah =  Http::get('https://serumpun.babelprov.go.id/perangkat_daerah_detil.json/'.$slug)->json();
        //$respPerangkatDaerah =  Http::get('https://serumpun.babelprov.go.id/perangkat_daerah.json')->json();
        $respPerangkatDaerah =  Http::get('https://serumpun.babelprov.go.id/perangkat_daerah.json/all')->json();

        $title = $respDetilPerangkatDaerah['title'];
        $img_thumb = asset('images/website/img_perangkat_daerah.png');
        
        $breadcrumbs = [['link' => "/perangkat_daerah", 'name' => $respDetilPerangkatDaerah['title']]];

        //$breadcrumbs = [['link' => "/artikel/all", 'name' => $title]];
        //$breadcrumbs = [['link' => "perangkat_daerah", 'name' => $title]];

        // Meta Tags
        Helper::setMeta(
            'perangkat_daerah_detil',
            URL::to('/').'/perangkat_daerah_detil'.$respDetilPerangkatDaerah['slug'],
            'Perangkat Daerah',
            $title,
            $respDetilPerangkatDaerah['website'],
            $img_thumb
        );

        return view('/content/perangkat_daerah/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_perangkat_daerah' => $respDetilPerangkatDaerah,
            'data_perangkat_daerah' => $respPerangkatDaerah['listPerangkatDaerah'],
            'img_thumb' => $img_thumb
        ]);
    }
}
