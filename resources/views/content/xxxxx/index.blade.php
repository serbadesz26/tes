@extends('layouts/contentLayoutMaster')

@section('title', 'Negeri Serumpun Sebalai')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_home.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_home.png') }}">
    </span>

    {{-- SEO Purpose --}}
    <h3 class="td-visual-hidden">Gerbang Informasi dan Pelayanan Pemerintah Provinsi Kepulauan Bangka Belitung</h3>

    <div class="row match-height">
        <!-- Kiri -->
        <div class="col-lg-7 px-05 py-05">
            <!-- Showcase -->
            @include('content.home._showcase')
            <!-- Berita -->
            @include('content.home._berita')
            <!-- LayananSPBE -->
            @include('content.home._layanan-spbe')
            <!-- Pengumuman -->
            @include('content.home._pengumuman')
             <!-- Banner LAPOR -->
            <img src="{{ asset('images/website/banner-lapor.png') }}" class="img-fluid py-1" width="100%" height="auto" alt="Pengaduan Masyarakat : LAPOR!" />
            <!-- ProdukHukum -->
            {{-- @include('content.home._produk_hukum')--}}
        </div>

        <!-- Kanan -->
        <div class="col-lg-5">
            <!-- InfoCovid -->
            @include('content.home._covid19')
            <!-- Banner KI -->
            <a href="/ppid/tentang-ppid">
                <img src="{{ asset('images/website/link-ki.png') }}" class="img-fluid" width="100%" height="auto" alt="Pengaduan Masyarakat : LAPOR!" />
            </a>
            <!-- Agenda -->
            @include('content.home._agenda')
            <!-- Artikel -->
            @include('content.home._artikel_01')
            <!-- KanalBerita -->
            @include('content.home._kanal')
            <!-- Link Pemda -->
            @include('content.home._link-pemda')
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/home/home-index.js')) }}"></script>
@endsection

