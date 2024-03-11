<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function getActionAttribute()
    {
        $user = Auth::user();

        $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

        $actions .= $user->hasPermissionTo('permission-list') ? '<a href="'.route("permissions.show", $this->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
        $actions .= $user->hasPermissionTo('permission-edit') ? '<a href="'.route('permissions.edit', $this->id).'" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
        $actions .= $user->hasPermissionTo('permission-delete') ? '<a href="'.route('permissions.confirm-delete', $this->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

        $actions .= '</div>';

        return $actions;
    }
}
