<div id="test_ajax">

    {{-- Card Header--}}
    <div class="card my-50">
        <div class="card-header bg-danger bg-darken-4 text-white p-1 m-0">
            <h4 class="card-title text-white">Pengumuman Terbaru</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('pengumuman-index') }}" class="text-body-heading">
                    + Test Loading Content with Ajax
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">

            <div id="ajax_data">

                <div id="loading" class="text-center">
                    <span class="spinner-border">
                        <span class="sr-only">Loading...</span>
                    </span>
                </div>

            </div>

        </div>
    </div>

</div>


@section('page-script')
    <script>
        $(document).ready(function() {

            function loadContent(data) {
                let html = '<ul class="timeline">';

                $.each(data, function(index, element) {
                    html += '<li class="timeline-item pb-0">';
                    html += '  <span class="timeline-point timeline-point-indicator"></span>';
                    html += '    <div class="timeline-event">'
                    html += '      <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">';
                    html += '        <a href="/pengumuman_detil'+ element.slug +'" class="text-body-heading" target="_self">';
                    html += '          <h4 class="media-heading">'+ element.title +'</h4>';
                    html += '        </a>';
                    html += '      </div>';
                    html += '      <p>'+ element.sumber +'</p>';
                    html += '  </div>';
                    html += '</li>';
                });

                html += "</ul>";
                $("#ajax_data").html(html);
            }

            $.ajax({
                method: 'GET',
                url: "https://babelprov.go.id/pengumuman_front.json",

                beforeSend: function() {
                    $("#loading").removeClass('d-none');
                },
                success: function(result) {
                    $("#loading").addClass('d-none');
                    loadContent(result.listPengumuman);
                },
                error: function (jqXhr)
                {
                    $("#ajax_data").html('Loading Data Error..');
                }
            });

        });
    </script>
@endsection
