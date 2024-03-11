{{-- Carousel --}}
<div id="showcaseIndicators" class="carousel slide mt-1 mb-50" data-ride="carousel">
    {{-- Indicator --}}
    <ol class="carousel-indicators">
        @foreach($data_showcase as $key => $item_indikator)
            <li data-target="#showcaseIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? "active" : "" }}"></li>
        @endforeach()
    </ol>
    {{-- Slide --}}
    <div class="carousel-inner" role="listbox">
        @foreach($data_showcase as $key => $item_slide)
            <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                <img class="img-fluid" src="{{ $item_slide['foto'] }}" alt="{{ $item_slide['title'] }}" width="100%" height="auto" />
            </div>
        @endforeach()
    </div>
    {{-- Navigator --}}
    <a class="carousel-control-prev" href="#showcaseIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#showcaseIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
