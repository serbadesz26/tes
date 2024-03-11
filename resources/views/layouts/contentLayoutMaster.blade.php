@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp

<html lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif" data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}" class="loading {{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme']}}" @if($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {!! Meta::toHtml() !!}

  <title>@yield('title') - Provinsi Kepulauan Bangka Belitung</title>
  <h1 style="border: 0;width: 1px;height: 1px;margin: -1px;overflow: hidden;padding: 0;position: absolute;">Provinsi Kepulauan Bangka Belitung</h1>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon-index.ico')}}">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    
    <!-- plugin aksesibilitas -->
    <link rel="stylesheet" href="{{ url ('css/default.css') }} " />
    <link rel="stylesheet" href="{{ url ('css/asb.css') }} " />
    

  {{-- Include core + vendor Styles --}}
  @include('panels/styles')
  <style>
      .two-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        
        .thumbnail-container {
            position: relative;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .youtube-logo {
            width: 50px; /* Sesuaikan lebar ikon YouTube */
            height: 50px; /* Sesuaikan tinggi ikon YouTube */
            background: url('https://static.vecteezy.com/system/resources/thumbnails/023/986/704/small/youtube-logo-youtube-logo-transparent-youtube-icon-transparent-free-free-png.png') no-repeat center center/contain;
        }
        
        .thumbnail-container {
            position: relative;
            text-align: center;
        }
        
        .youtube-logo {
            width: 90px; /* Sesuaikan lebar ikon YouTube */
            height: 90px; /* Sesuaikan tinggi ikon YouTube */
            background: url('/animation/youtube.gif') no-repeat center center/contain;
            position: absolute;
            top: 50%; /* Pusatkan ikon di tengah vertikal */
            left: 50%; /* Pusatkan ikon di tengah horizontal */
            transform: translate(-50%, -50%); /* Kompensasi untuk memindahkan setengah dari lebar dan tinggi ikon */
        }
        
        .youtube-card-loading {
            width: 100%;
            /*margin: 20px; */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .thumbnail-container2 {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* 16:9 aspect ratio for the thumbnail */
            overflow: hidden;
        }
        
        .shimmer-thumbnail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(-90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 400% 100%;
            animation: shimmer 1.5s infinite linear;
        }
        
        .shimmer-text {
            margin-top: 20px;
            width: 80%; /* Set the width for the shimmer text */
            height: 16px;
            background: linear-gradient(-90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 400% 100%;
            animation: shimmer 1.5s infinite linear;
        }
        
        @keyframes shimmer {
            0% {
                background-position: 100% 0;
            }
            100% {
                background-position: -100% 0;
            }
        }
        
        /* Gaya ikon navigasi */
        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            position: absolute; /* Mengubah posisi ikon navigasi menjadi absolute */
            top: 50%; /* Menempatkan ikon navigasi di tengah tinggi (vertikal) gambar */
            width: 40px;
            height:40px;
            transform: translateY(-50%); /* Menggeser ikon navigasi ke atas sejauh setengah dari tingginya sendiri */
            font-size: 24px; /* Ukuran ikon */
            color: #000; /* Warna ikon */
            background: #fff; /* Warna latar belakang tombol navigasi */
            /*border: 2px solid #000; /* Warna border tombol navigasi */
            border-radius: 100%; /* Bentuk border tombol navigasi (lingkaran) */
            padding: 15px 15px; /* Ruang dalam tombol navigasi */
        }
        
        .owl-carousel .owl-nav button.owl-prev {
            left: 10px; /* Jarak dari sisi kiri */
        }
        
        .owl-carousel .owl-nav button.owl-next {
            right: 10px; /* Jarak dari sisi kanan */
        }
        
        /* Gaya ikon hover */
        .owl-carousel .owl-nav button.owl-prev:hover,
        .owl-carousel .owl-nav button.owl-next:hover {
            background: #000; /* Warna latar belakang saat tombol dihover */
            color: #fff; /* Warna ikon saat tombol dihover */
        }
        
        .owl-dots {
          text-align: center;
          padding-top: 15px;
        }
        .owl-dots button.owl-dot {
          width: 10px;
          height: 10px;
          border-radius: 50%;
          display: inline-block;
          background: #ccc;
          margin: 0 3px;
        }
        .owl-dots button.owl-dot.active {
          background-color: #000;
        }
        .owl-dots button.owl-dot:focus {
          outline: none;
        }

        .audio-container {
            width: 100%;
            max-width: 800px;
        }

        .custom-audio {
            width: 95%; /* Make the audio element fill its container */
        }

        @media screen and (min-width: 768px) {
            .audio-container {
                max-width: 800px;
            }
        }

</style>

</head>



@isset($configData["mainLayoutType"])
@extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalLayoutMaster' :
'layouts.verticalLayoutMaster' ))
@endisset
