<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <tbody>

            {{--ID--}}
            <tr>
                <td>ID</td>
                <td>{{ $sub_konten->id }}</td>
            </tr>

            {{--Judul--}}
            <tr>
                <td>Judul</td>
                <td>{{ $sub_konten->judul }}</td>
            </tr>

            {{--Konten--}}
            <tr>
                <td>Konten</td>
                <td>{!! $sub_konten->konten !!} </td>
            </tr>


            </tbody>
        </table>
    </div>

</div>
