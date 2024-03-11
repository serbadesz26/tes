<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tbody>

            {{--Nama--}}
            <tr>
                <td>Nama Role</td>
                <td><strong>{{ $role->name }}</strong></td>
            </tr>

            {{--Created at--}}
            <tr>
                <td>Created at</td>
                <td>{{ $role->created_at }}</td>
            </tr>

            {{--Update at--}}
            <tr>
                <td>Update at</td>
                <td>{{ $role->updated_at }}</td>
            </tr>

            </tbody>
        </table>

        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Permission</h3>
            </div>
            <div class="card-body p-0">
                {!! Helper::rolePermissionsList($rolePermissions) !!}
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                    @foreach(Helper::getUsersByRole($role->name) as $user)
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            {{ $user->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
