<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tbody>

            {{--Name--}}
            <tr>
                <td>Nama Permission</td>
                <td><strong>{{ $permission->name }}</strong></td>
            </tr>

            {{--Guard Name--}}
            <tr>
                <td>Guard Name</td>
                <td><strong>{{ $permission->guard_name }}</strong></td>
            </tr>


            </tbody>
        </table>

        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Permission</h3>
            </div>
            <div class="card-body p-0">
                {{-- {!! rolePermissionsList($permissionRoles) !!} --}}
            </div>
        </div>

    </div>

    <div class="col-md-6">

        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                    @foreach(getUsersByRole($role->name) as $user)
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            {{ $user->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}

    </div>
</div>