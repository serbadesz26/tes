<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Covid19;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    // Home
    public function home()
    {
         $breadcrumbs = [['link' => "/", 'name' => ""]];

         $respShowcase =  Http::get('https://serumpun.babelprov.go.id/showcase.json')->json();
        
         $respBerita =  Http::get('https://serumpun.babelprov.go.id/berita.json')->json();
      
         $respLayananPublik =  Http::get('https://kominfo.babelprov.go.id/layanan_spbe.json/Publik,Pemerintahan')->json();
        
         $respLayananPemerintah =  Http::get('https://kominfo.babelprov.go.id/layanan_spbe.json/Pemerintahan')->json();
        
         $respPengumuman =  Http::get('https://serumpun.babelprov.go.id/pengumuman_front.json')->json();
        
         $respProdukHukum =  Http::get('https://jdih.babelprov.go.id/produk_hukum.json')->json();
        
         $data_covid19 = Covid19::latest('tgl_data')->first();

         $respAgenda =  Http::get('https://serumpun.babelprov.go.id/agenda_front.json')->json();
        
         $respArtikel =  Http::get('https://serumpun.babelprov.go.id/artikel.json')->json();

         $respKanal =  Http::get('https://serumpun.babelprov.go.id/kanal_berita.json')->json();
        
         // $respTrans =  Http::get('https://https://serumpun.babelprov.go.id/transparansi_anggaran_all.json')->json();


        // Meta Tags
        Helper::setMeta(
            'home_index',
            URL::to('/'),
            'Website',
            'Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Babel Sejahtera, Provinsi Maju, yang Unggul di Bidang Inovasi Agropolitan & Bahari dengan Tata Kelola Pemerintahan & Pelayanan Publik yang Efisien & Cepat Berbasis Iptek',
            asset('images/website/img_home.png')
        );
        
        /*
      return view('/content/home/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_showcase' => $respShowcase['daftarShowcase'],
            'data_berita' => $respBerita['daftarBerita'],
            'data_artikel' => $respArtikel['listArtikel'],
            'data_kanal' => $respKanal['listKanal'],
            'data_layanan_pemerintah' => $respLayananPemerintah['listLayananSpbe'],
            'data_layanan_publik' => $respLayananPublik['listLayananSpbe'],
            'data_agenda' => $respAgenda['daftarAgenda'],
            'data_produk_hukum' => $respProdukHukum['listProdKum'],
            'data_covid19' => $data_covid19
        ]);*/
        
        
        // dd($respBerita['daftarBerita']);
       
       
        return view('/content/home/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_showcase' => $respShowcase['daftarShowcase'],
            'data_berita' => $respBerita['daftarBerita'],
            'data_layanan_publik' => $respLayananPublik['listLayananSpbe'],
            'data_layanan_pemerintah' => $respLayananPemerintah['listLayananSpbe'],
            'data_pengumuman' => $respPengumuman['listPengumuman'],
            'data_produk_hukum' => $respProdukHukum['listProdKum'],
            'data_covid19' => $data_covid19,
            'data_agenda' => $respAgenda['daftarAgenda'],
            'data_artikel' => $respArtikel['listArtikel'],
            'data_kanal' => $respKanal['listKanal'],
        //   'data_trans' => $respTrans['listTransparansiAnggaran']
        ]);
       
        
        
    }

    public function sitemap()
    {
        ini_set('max_execution_time', 300); // 5 minutes

        $sitemap = SitemapGenerator::create('http://localhost:8000')
            ->writeToFile(public_path('sitemap.xml'));

        if($sitemap) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sitemap berhasil dibuat',
                'data'    => $sitemap
            ], 201);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sitemap  gagal disimpan',
            ], 409);
        }
    }
    
}
