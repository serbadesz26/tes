@extends('layouts/contentLayoutMaster')

@section('title', 'Negeri Serumpun Sebalai')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_home.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_home.png') }}">
    </span>

    {{-- SEO Purpose --}}
    <h3 class="td-visual-hidden">Gerbang Informasi dan Pelayanan Pemerintah Provinsi Kepulauan Bangka Belitung</h3>

    <!--<div class="row match-height">-->
    <div class="row">
        <!-- Kiri -->
        <div class="col-lg-7 col-sm-12 px-05 py-05">
            <!-- Showcase -->
             @include('content.home._showcase') 
             
            <!-- Berita -->
             @include('content.home._berita') 
             
             
             
             
             
             <div class="owl-carousel banner owl-theme mt-1">
                <!--<div class="item">-->
                <!--    <a href="https://drive.google.com/drive/folders/1hNqcGNRFQMn9_W7W5Mj6Fj_oeIkjdk9p/">-->
                <!--    <img src="{{ asset('images/banner_rev/asean.jpg') }}" alt="KEKETUAAN ASEAN INDONESIA 2023" />-->
                <!--    </a>-->
                <!--</div>-->
                <div class="item">
                    <a href="https://asean2023.id/en">
                    <img src="{{ asset('images/banner_rev/asean.jpg') }}" alt="KEKETUAAN ASEAN INDONESIA 2023" />
                    </a>
                </div>
                <div class="item">
                    <a href="https://lapor.babelprov.go.id/">
                        <img src="{{ asset('images/banner_rev/pak.jpg') }}" alt="Pengaduan Masalah Pertambangan : LAPOR YAK!" />
                    </a>
                </div>
                <div class="item">
                    <!-- Banner LAPOR -->
                    <a href="https://lapor.go.id/" class="mt-1 mb-50">
                        <img src="{{ asset('images/banner_rev/lapor.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Pengaduan Masyarakat : LAPOR!" />
                    </a>
                </div>
                <!--<div class="item">-->
                     <!--Banner Transparansi -->
                <!--    <a href="https://babelprov.go.id/publikasi?fltrKategori=Transparansi+Anggaran&fltrSubKategori=&fltrTahun=" class="mt-1 mb-50">-->
                <!--        <img src="{{ asset('images/banner_rev/anggaran.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Transparansi Anggaran" />-->
                <!--    </a>-->
                <!--</div>-->
                <div class="item">
                     <!--Banner Transparansi -->
                    <a href="https://api-anggaran.babelprov.go.id" class="mt-1 mb-50">
                        <img src="{{ asset('images/banner_rev/anggaran.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Transparansi Anggaran" />
                    </a>
                </div>
                <div class="item">
                    <!-- Banner SLTIK -->
                    <a href="https://bit.ly/SurveiLayananTIK" class="mt-1 mb-50">
                        <img src="{{ asset('images/banner_rev/tik.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Survei Layanan TIK" />
                    </a>
                </div>
                <div class="item">
                    <!-- Banner informasi publik -->
                    <a href="https://portalppid.babelprov.go.id/" class="mt-1 mb-50">
                        <img src="{{ asset('images/banner_rev/info_publik.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Survei Layanan TIK" />
                    </a>
                </div>
                <div class="item">
                    <!-- pribantal -->
                    <a href="https://siperibantal.babelprov.go.id" class="mt-1 mb-50">
                        <img src="{{ asset('images/banner_rev/peribantal.jpg') }}" class="img-fluid" width="100%" height="auto" alt="Survei Layanan TIK" />
                    </a>
                </div>
                
            </div>


            <!-- LayananSPBE -->
            @include('content.home._layanan-spbe')
            
            <!-- Pengumuman -->
            @include('content.home._pengumuman')
            
            
            <!-- ProdukHukum -->
            @include('content.home._produk_hukum')
            
            <!-- Layanan -->
            @include('content.home._layanan-lain')
        
        </div>

        <!-- Kanan -->
        <div class="col-lg-5">
            <!-- InfoCovid -->
            @include('content.home._youtube') 
            <!-- Banner KI -->
            <!--<a href="https://portalppid.babelprov.go.id/" class="mt-1 mb-50">-->
            <!--    <img src="{{ asset('images/website/link-ki.png') }}" class="img-fluid" width="100%" height="auto" alt="Informasi Publik" />-->
            <!--</a>-->
            <!-- Banner BPOM -->
            <!--<a href="https://pangkalpinang.pom.go.id/" class="mt-1 mb-50">-->
            <!--    <img src="{{ asset('images/website/link-bpompkp.png') }}" class="img-fluid" width="100%" height="auto" alt="BPOM Pangkalpinang" />-->
            <!--</a>-->
            
            <!-- Agenda -->
            @include('content.home._agenda')
            <!--inradio-->
             @include('content.home._inradio')
            <!-- Artikel -->
            @include('content.home._artikel') 
            <!-- KanalBerita -->
            @include('content.home._kanal') 
            <!-- Link Pemda -->
            @include('content.home._link-pemda')
            <!-- Hoax -->
            @include('content.home._hoax') 
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/home/home-index.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.banner').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause:false,
                dots: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        });
    </script>
    
    <script>
    
        $(function() {
            $.ajax({
                url: "{{ route('api_youtube') }}",
                type: "GET",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    // Show loading shimmer before making the request
                    $(".youtube-card-loading").removeClass('d-none');
                },
                success: function(res) {
                    
                    var html = "";
                    
                    if (res.datas != null) {
                        $.each(res.datas, function(index, val) {
                            html += `
                            <div class="item">
                            <div class="card mt-1 mb-0" style="box-shadow: 1px 1px 10px rgba(240, 248, 254,0.5);">
                                <a href="https://www.youtube.com/watch?v=` + val.vidio_id + `?autoplay=1" target="_blank">
                                <div class="card-body my-50 py-50 thumbnail-container">
                                    <div class="">
                                        <div class="thumbnail-container">
                                            <img src="`+val.thumbnails.high+`" class="rounded card-img-top mt-1 mb-2">
                                            <div class="youtube-logo"></div>
                                        </div>
                                        <h5 class="card-title" style="text-align: justify;">`+val.title+`</h5>
                                        <p class="two-lines" style="text-align: justify;">`+val.description+`</p> <p class="text-muted small" style="text-align: justify;">`+moment(val.publishedAt).locale('id').format('DD MMMM YYYY')
+` | Dinas Kominfo</p>
                                    </div>
                                </div>
                                </a>
                                <div class="card-footer py-1">
                                    <h6><small class="text-muted">Sumber data :</small> <a href="https://www.youtube.com/@diskominfobangkabelitung3424" target="_blank">Youtube Dinas Komunikasi dan Informatika Provinsi Kepulauan Bangka Belitung</a></h6>
                                </div>
                                </div>
                                </div>
                                
                            `;
                        });

                        $(".youtube-card").html(html);
                        $(".youtube-card").removeClass('d-none');

                        $('.youtube-card').owlCarousel({
                        loop: true,
                        margin: 10,
                        nav: false,
                        autoplay: true,
                        autoHeight:true,
                        autoplayTimeout: 7000,
                        autoplayHoverPause:false,
                        navText: ["<div class='nav-button2 owl-nav2 owl-prev2'>‹</div>", "<div class='nav-button2 owl-nav2 owl-next2'>›</div>"],
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    });

                    } else {
                        $(".youtube-card").html(res.message);
                    }
                },
                complete: function(res) {
                    $(".youtube-card").removeClass('d-none');
                    $(".youtube-card-loading").addClass('d-none');
                },
            });
        });
    </script>
@endsection