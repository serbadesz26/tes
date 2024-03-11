<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class BankDataController extends Controller
{
    // ------------------------------------------------------------------------------
    //      ::  I N D E X ::
    // ------------------------------------------------------------------------------
    public function index(Request $request, $kategori)
    {
        $breadcrumbs = [['link' => "bank_data", 'name' => ""]];

        if($request['bank_data_search'] != "") {
            $respBankData =  Http::get('https://serumpun.babelprov.go.id/bank_data_search/'.$request['bank_data_search'].'?page='.((int)$request['page']-1))->json();
        } else {
            $respBankData =  Http::get('https://serumpun.babelprov.go.id/bank_data.json/'.$kategori.'?page='.((int)$request['page']-1))->json();
        }

        $respKategoriBankData =  Http::get('https://serumpun.babelprov.go.id/kategori_bank_data.json')->json();

        // Meta Tags
        Helper::setMeta(
            'bank_data_index',
            URL::to('/').'/bank_data/all',
            'Bank Data',
            'Indeks Bank Data Pemerintah Provinsi Kepulauan Bangka Belitung',
            'Bank Data Pemerintah Provinsi Kepulauan Bangka Belitung',
            asset('images/website/img_bank_data.png')
        );

        return view('/content/bank_data/index', [
            'breadcrumbs' => $breadcrumbs,
            'data_bank_data' => $respBankData,
            'data_kategori_bank_data' => $respKategoriBankData['listKategoriBankData'],
        ]);
    }


    // ------------------------------------------------------------------------------
    //      ::  S H O W  /   D E T I L ::
    // ------------------------------------------------------------------------------
    public function show($slug)
    {
        $breadcrumbs = [['link' => "bank_data_detil", 'name' => ""]];

        $respDetilBankData =  Http::get('https://serumpun.babelprov.go.id/bank_data_detil.json/'.$slug)->json();

        $respBankData=  Http::get('https://serumpun.babelprov.go.id/bank_data.json/all')->json();
        $img_thumb = asset('images/website/img_bank_data.png');

        // Meta Tags
        Helper::setMeta(
            'bank_data_detil',
            URL::to('/').'/bank_data_detil'.$respDetilBankData['slug'],
            $respDetilBankData['kategori'],
            $respDetilBankData['kategori'].' Tahun '.$respDetilBankData['tahun'],
            $respDetilBankData['title'],
            $img_thumb
        );

        return view('/content/bank_data/show', [
            'breadcrumbs' => $breadcrumbs,
            'data_detil_bank_data' => $respDetilBankData,
            'data_bank_data' => $respBankData['listBankData'],
            'img_thumb' => $img_thumb
        ]);
    }
}
