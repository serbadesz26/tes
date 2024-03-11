<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <tbody>

            {{--ID--}}
            <tr>
                <td>ID</td>
                <td>{{ $user->id }}</td>
            </tr>

            {{--Nama--}}
            <tr>
                <td>Nama</td>
                <td>{{ $user->name }}</td>
            </tr>

            {{--E-Mail--}}
            <tr>
                <td>E-Mail</td>
                <td>{{ $user->email }}</td>
            </tr>

            {{--Kelamin--}}
            <tr>
                <td>Kelamin</td>
                <td>{{ $user->kelamin }}</td>
            </tr>

            {{--Role--}}
            <tr>
                <td>Role</td>
                <td>{!! $user->role !!}</td>
            </tr>

            {{--Created at--}}
            <tr>
                <td>Created at</td>
                <td>{{ $user->created_at }}</td>
            </tr>

            {{--Update at--}}
            <tr>
                <td>Update at</td>
                <td>{{ $user->updated_at }}</td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="col-md-4">

        @if (isset($user->foto) && ($user->foto != ""))
            <div id="filepreview">
                <img id="fotopreview" src="{{ asset('foto_user/' . $user->foto) }}" width="295" class="img-thumbnail">
            </div>
        @else
            <div id="filepreview">
                <img id="fotopreview" src="/img/temp_foto.png" width="295" class="img-thumbnail">
            </div>
        @endif

    </div>
</div>