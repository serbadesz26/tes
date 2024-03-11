<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class PublikasiController extends Controller
{
    private $kategori;
    private $sub_kategori;
    private $tahun;

    // ------------------------------------------------------------------------------
    //      ::  C O N S T R U C T  ::
    // ------------------------------------------------------------------------------
    function __construct(Request $request)
    {

        // ----------------------------------------
        // Set untuk pilihan filter Kategori
        // ----------------------------------------
        if($request->has('fltrKategori')) {

            Session(['KategoriId' => $request->fltrKategori]);
            $this->kategori = $request->fltrKategori;
        }
        else if (Session()->has('KategoriId')) {
            $this->kategori = Session('KategoriId', '');
            return dd($request->fltrKategori);
        }
        else {
            Session()->forget('KategoriId');
        }

        // ----------------------------------------
        // Set untuk pilihan filter Sub Kategori
        // ----------------------------------------
        if($request->has('fltrSubKategori')) {

            Session(['SubKategoriId' => $request->fltrSubKategori]);
            $this->sub_kategori = $request->fltrSubKategori;
        }
        else if (Session()->has('SubKategoriId')) {
            $this->sub_kategori = Session('SubKategoriId', '');
        }
        else {
            Session()->forget('SubKategoriId');
        }

        // ----------------------------------------
        // Set untuk pilihan filter Tahun
        // ----------------------------------------
        if($request->has('fltrTahun')) {

            Session(['TahunId' => $request->fltrTahun]);
            $this->tahun = $request->fltrTahun;
        }
        else if (Session()->has('TahunId')) {
            $this->tahun = Session('TahunId', '');
        }
        else {
            Session()->forget('TahunId');
        }

    }

    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index(Request $request)
    {
        $breadcrumbs = [['link' => "Publikasi", 'name' => ""]];
        
        if($request['publikasi_search'] != "") {
            $respPublikasi =  Http::get('https://serumpun.babelprov.go.id/publikasi.json/'.$request['publikasi_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respPublikasi =  Http::get('https://serumpun.babelprov.go.id/publikasi.json/'. ($request['fltrKategori'] != '' ? $request['fltrKategori'] : 'all').'/'. ($request['fltrSubKategori'] != '' ? $request['fltrSubKategori'] : 'all').'/'. ($request['fltrTahun'] != '' ? $request['fltrTahun'] : 'all'). '?page='.((int)$request['page']-1))->json();
        }
        
        
        $respKategoriPublikasi =  Http::get('https://serumpun.babelprov.go.id/kategori_publikasi.json')->json();
        $respSubKategoriPublikasi =  Http::get('https://serumpun.babelprov.go.id/sub_kategori_publikasi.json/all')->json();

        // Meta Tags
        Helper::setMeta(
            'publikasi_index',
            URL::to('/').'/publikasi/all/all',
            'Publikasi',
            'Indeks Publikasi Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Publikasi Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_publikasi.png')
        );

        return view('/content/publikasi/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_publikasi' => $respPublikasi,
            'data_kategori_publikasi' => $respKategoriPublikasi,
            'data_sub_kategori_publikasi' => $respSubKategoriPublikasi,
        ]);
    }


    // ------------------------------------------------------------------------------
    //      ::  S H O W  /   D E T I L ::
    // ------------------------------------------------------------------------------
    public function show($slug)
    {
        $respDetilPublikasi =  Http::get('https://serumpun.babelprov.go.id/publikasi_detil.json/'.$slug)->json();
        $img_thumb = asset('images/website/img_publikasi.png');

        $breadcrumbs = [['link' => 'publikasi?fltrKategori='.$respDetilPublikasi['kategori'], 'name' => $respDetilPublikasi['kategori']]];
        $respPublikasiTerkait=  Http::get('https://serumpun.babelprov.go.id/publikasi.json/'.$respDetilPublikasi['kategori'].'/all/all')->json();

        // Meta Tags
        Helper::setMeta(
            'publikasi_detil',
            URL::to('/').'/publikasi_detil'.$respDetilPublikasi['slug'],
            $respDetilPublikasi['kategori'],
            $respDetilPublikasi['title'],
            Str::of($respDetilPublikasi['body'])->limit(167),
            $img_thumb
        );

        return view('/content/publikasi/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_publikasi' => $respDetilPublikasi,
            'data_publikasi' => $respPublikasiTerkait['listPublikasi'],
            'img_thumb' => $img_thumb
        ]);
    }

    // ------------------------------------------------------------------------------
    //      ::  A P I   G E T   K E C   B Y    P E M D A  ::
    // ------------------------------------------------------------------------------
    public function getSubKategori(Request $request)
    {
        $html = '<option value="">-- Semua Sub Kategori --</option>';

        if(!empty($request->kategori)) {

            $data =  Http::get('https://serumpun.babelprov.go.id/sub_kategori_publikasi.json/'.$request->kategori)->json();

            foreach ($data as $value) {
                $html .= '<option value="'.$value['nama'].'">'.$value['nama'].'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
