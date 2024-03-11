<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'kelamin',
        'foto',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ------------------------------------------------------------------------------------
    //         ::  C U S T O M  F I E L D S  ::
    // ------------------------------------------------------------------------------------
    public function getRoleAttribute()
    {
        $role_badge = "";

        if($this->getRoleNames()) {

            foreach ($this->getRoleNames() as $roleName) {
                $role_badge .= "<label class='badge badge-success'>".$roleName."</label>&nbsp;";
            }
            return $role_badge;
        }
        else {

            return '';
        }
    }

    public function getActionAttribute()
    {
        $user = Auth::user();

        $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

        $actions .= $user->hasPermissionTo('user-list') ? '<a href="'.route("users.show", $this->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
        $actions .= $user->hasPermissionTo('user-edit') ? '<a href="'.route('users.edit', $this->id).'" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
        $actions .= $user->hasPermissionTo('user-delete') ? '<a href="'.route('users.confirm-delete', $this->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

        $actions .= '</div>';

        return $actions;
    }
}
