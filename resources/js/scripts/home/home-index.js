/*=========================================================================================
    S H O W C A S E
==========================================================================================*/
function loadShowcase(dataShowcase) {

    // Indikator Slider
    let htmlSlider = '<ol class="carousel-indicators">';
    let htmlSlide = '<div class="carousel-inner" role="listbox">';
    let htmlIndikator =
        '<a class="carousel-control-prev" href="#showcaseIndicators" role="button" data-slide="prev">' +
        '  <span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
        '  <span class="sr-only">Previous</span>' +
        '</a>' +
        '<a class="carousel-control-next" href="#showcaseIndicators" role="button" data-slide="next">' +
        '  <span class="carousel-control-next-icon" aria-hidden="true"></span>' +
        '  <span class="sr-only">Next</span>' +
        '</a>';

    $.each(dataShowcase, function(index, element) {
        let status = (index === 0) ? 'active' : '';

        htmlSlider += '<li data-target="#showcaseIndicators" data-slide-to="'+ index +'" class="'+ status +'"></li>';

        htmlSlide += '<div class="carousel-item '+  status +'">';
        htmlSlide += '  <img class="img-fluid" src="'+ element.foto +'" alt="'+ element.title +'" width="100%" height="auto" />';
        htmlSlide += '</div>';
    });

    htmlSlider += "</ol>";
    htmlSlide += "</div>";

    $("#ajxShowcase").html(htmlSlider + htmlSlide + htmlIndikator);
}

/*=========================================================================================
    B E R I T A
==========================================================================================*/
function loadBerita(dataBerita) {

    let htmlBerita = '' +
        '<div class="card mt-1">' +
        '   <div class="card-header bg-primary bg-darken-2 text-white p-1 m-0">' +
        '       <h4 class="card-title text-white">:: Kabar Terkini</h4>' +
        '       <p class="card-text font-small-2 mr-25 mb-0">' +
        '           <a href="#" class="text-body-heading">+ Kabar Lainnya</a>' +
        '       </p>' +
        '   </div>' +

        '   <div class="card-body my-50 py-50">' +
        '       <div class="row">' +
        '           <div class="d-flex justify-content-between flex-column mt-1 mt-sm-0 col-12 col-md-6 order-1 p-50">' +
        '               <div id="berita_terbaru" class="mb-0">' +
        '                   <img src="'+ dataBerita[0].thumb_foto +'" width="100%" height="auto" class="img-fluid" alt="'+ dataBerita[0].title +'">' +
        '                   <h4 class="blog-recent-post-title mt-1">' +
        '                       <a href="berita_detil'+ dataBerita[0].slug +'" class="text-body-heading">'+ dataBerita[0].title +'</a>' +
        '                   </h4>' +
        '                   <span class="text-muted small">'+ dataBerita[0].created +' | '+ dataBerita[0].sumber +'</span>' +
        '               </div>' +
        '           </div>' +

        '           <div class="d-flex justify-content-between flex-column col-12 col-md-6 order-2 p-0">' +
        '               <div class="media-list media-bordered px-50">';

    $.each(dataBerita, function(index, element) {
        htmlBerita +=
            '<div class="media p-50">' +
            '   <div class="media-aside align-self-start pr-1">' +
            '       <img src="'+ element.thumb_foto +'" width="100" height="60" class="rounded" alt="'+ element.title +'">' +
            '   </div>' +
            '   <div class="media-body">' +
            '       <a href="/berita_detil'+ element.slug +'" class="text-body-heading" target="_self">' +
            '           <h6 class="media-heading">'+ element.title +'</h6>' +
            '       </a>' +
            '       <p class="card-text text-muted small">'+ element.created +' | '+ element.sumber +'</p>' +
            '   </div>' +
            '</div>';
    });

    htmlBerita +=
        '               </div>' +
        '           </div>' +
        '       </div>' +
        '   </div>' +
        '</div>';

    $("#ajxBerita").html(htmlBerita);
}

/*=========================================================================================
    P E N G U M U M A N
==========================================================================================*/
function loadPengumuman(dataPengumuman) {

    let htmlPengumuman =
        '<div class="card my-50">' +
        '   <div class="card-header bg-danger bg-darken-4 text-white p-1 m-0">' +
        '       <h4 class="card-title text-white">Pengumuman Terbaru</h4>' +
        '       <p class="card-text font-small-2 mr-25 mb-0">' +
        '           <a href="{{ route("pengumuman-index") }}" class="text-body-heading"> + Pengumuman Lainnya</a>' +
        '       </p>' +
        '   </div>';

    htmlPengumuman +=
        '<div class="card-body my-50 py-50">' +
        '   <ul class="timeline">';

    $.each(dataPengumuman, function(index, element) {
        htmlPengumuman +=
            '<li class="timeline-item pb-0">' +
            '   <span class="timeline-point timeline-point-indicator"></span>' +
            '   <div class="timeline-event">' +
            '       <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">' +
            '           <a href="/pengumuman_detil'+ element.slug +'" class="text-body-heading" target="_self">' +
            '               <h4 class="media-heading">'+ element.title +'</h4>' +
            '           </a>' +
            '       </div>' +
            '       <p>'+ element.sumber +'</p>' +
            '   </div>' +
            '</li>';
    });

    htmlPengumuman +=
        '       </ul>' +
        '   </div>' +
        '</div>';

    $("#ajxPengumuman").html(htmlPengumuman);
}

/*=========================================================================================
    L A Y A N A N   S P B E
==========================================================================================*/
function loadLayananSPBE(dataLayananSPBE) {

    let htmlLayananSPBEPublik = '';
    let htmlLayananSPBEPemerintah = '';

    $.each(dataLayananSPBE, function(index, element) {

        if(element.kategori === "Publik") {
            htmlLayananSPBEPublik +=
                '<div class="col-3 col-sm-2">' +
                '   <div class="card my-50 p-0 text-center border">' +
                '       <img src="'+ element.icon +'" alt="'+ element.singkatan +'" class="mx-auto d-block" width="64px" height="auto">' +
                '       <div class="card-body m-0 p-0">' +
                '           <div class="card-text mb-0">' +
                '               <a href="'+ element.url +'">'+ element.singkatan +'</a>' +
                '           </div>' +
                '       </div>' +
                '   </div>' +
                '</div>';
        } else if (element.kategori === "Pemerintah") {
            htmlLayananSPBEPemerintah +=
                '<div class="col-3 col-sm-2">' +
                '   <div class="card my-50 p-0 text-center border">' +
                '       <img src="'+ element.icon +'" alt="'+ element.singkatan +'" class="mx-auto d-block" width="64px" height="auto">' +
                '       <div class="card-body m-0 p-0">' +
                '           <div class="card-text mb-0">' +
                '               <a href="'+ element.url +'">'+ element.singkatan +'</a>' +
                '           </div>' +
                '       </div>' +
                '   </div>' +
                '</div>';
        }

    });

    let htmlLayananSPBE =
        '<div class="card">' +
        '   <div class="card-header bg-info bg-darken-2 text-white p-1 m-0">' +
        '       <h4 class="card-title text-white">Layanan SPBE</h4>' +
        '       <p class="card-text font-small-2 mr-25 mb-0">' +
        '           <a href="/layanan_spbe/all/all" class="text-body-heading">:: Layanan Lainnya</a>' +
        '       </p>' +
        '   </div>' +

        '   <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">' +
        '       <li class="nav-item">' +
        '           <a class="nav-link active" id="layanan-publik-tab" data-toggle="tab" href="#layanan-publik-just" role="tab" aria-controls="layanan-publik-just" aria-selected="true">Layanan Publik</a>' +
        '       </li>' +
        '       <li class="nav-item">' +
        '           <a class="nav-link" id="layanan-pemerintahan-tab" data-toggle="tab" href="#layanan-pemerintahan-just" role="tab" aria-controls="layanan-pemerintahan-just" aria-selected="true">Layanan Pemerintahan</a>' +
        '       </li>' +
        '   </ul>' +

        '   <div class="tab-content p-1 pt-1">' +
        '       <div class="tab-pane active" id="layanan-publik-just" role="tabpanel" aria-labelledby="layanan-publik-tab">' +
        '           <div class="row">';

    htmlLayananSPBE += htmlLayananSPBEPublik;

    htmlLayananSPBE +=
        '   </div>' +
        '</div>' +

        '<div class="tab-pane" id="layanan-pemerintahan-just" role="tabpanel" aria-labelledby="layanan-pemerintahan-tab">' +
        '   <div class="row">';

    htmlLayananSPBE += htmlLayananSPBEPemerintah;

    htmlLayananSPBE +=
        '           </div>' +
        '       </div>' +
        '   </div>' +
        '</div>';

    $("#ajxLayananSPBE").html(htmlLayananSPBE);
}


$.ajax({
    method: 'GET',
    url: "https://babelprov.go.id/showcase.json",

    success: function(result) {
        // Load Showcase
        loadShowcase(result.daftarShowcase);

        $.ajax({
            method: 'GET',
            url: "https://babelprov.go.id/pengumuman_front.json",

            success: function(resultPengumuman) {
                // Load Pengumuman
                loadPengumuman(resultPengumuman.listPengumuman);

                $.ajax({
                    method: 'GET',
                    url: "https://kominfo.babelprov.go.id/layanan_spbe.json/Pemerintahan",

                    success: function(resultLayananSPBE) {
                        // Load Layanan SPBE
                        loadLayananSPBE(resultLayananSPBE.listLayananSpbe);

                        $.ajax({
                            method: 'GET',
                            url: "https://babelprov.go.id/berita.json",

                            success: function(resultBerita) {
                                // Load Berita
                                loadBerita(resultBerita.daftarBerita);
                            },
                            error: function (jqXhr) {
                                $("#ajxBerita").html('Loading Data Error..');
                            }
                        });
                    },
                    error: function (jqXhr) {
                        $("#ajxPengumuman").html('Loading Data Error..');
                    }
                });
            },
            error: function (jqXhr) {
                $("#ajxPengumuman").html('Loading Data Error..');
            }
        });
    },
    error: function (jqXhr) {
        $("#ajxPengumuman").html('Loading Data Error..');
    }
});
