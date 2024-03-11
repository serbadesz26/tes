<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PengumumanController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $respPengumuman =  Http::get('https://serumpun.babelprov.go.id/pengumuman.json?page='.((int)$request['page']-1))->json();
        $breadcrumbs = [['link' => "pengumuman", 'name' => "Indeks"]];

        // Meta Tags
        Helper::setMeta(
            'pengumuman_index',
            URL::to('/').'/pengumuman',
            'Pengumuman, Announcement',
            'Indeks Pengumuman Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Pengumuman Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_pengumuman.png')
        );

        return view('/content/pengumuman/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_pengumuman' => $respPengumuman,
        ]);
    }

    // Detil Pengumuman
    public function show($slug)
    {
        $breadcrumbs = [['link' => "pengumuman", 'name' => "Detil"]];

        $respDetilPengumuman =  Http::get('https://serumpun.babelprov.go.id/pengumuman_detil.json/'.$slug)->json();
        $respPengumuman =  Http::get('https://serumpun.babelprov.go.id/pengumuman.json')->json();
        $img_thumb = asset('images/website/img_pengumuman.png');
        $breadcrumbs = [['link' => "/pengumuman", 'name' => $respDetilPengumuman['title']]];

        // Meta Tags
        Helper::setMeta(
            'pengumuman_detil',
            URL::to('/').'/pengumuman_detil'.$respDetilPengumuman['slug'],
            'Pengumuman, Announcement',
            $respDetilPengumuman['title'],
            $respDetilPengumuman['body'] ? $respDetilPengumuman['body'] : '',
            $img_thumb
        );

        return view('/content/pengumuman/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_pengumuman' => $respDetilPengumuman,
            'data_pengumuman' => $respPengumuman['listPengumuman'],
            'img_thumb' => $img_thumb
        ]);
    }
}
