<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Covid19 extends Model
{
    use HasFactory;

    protected $table ="covid19";

    protected $dates = ['tgl_data'];

    protected $guarded = [''];

    public function getActionAttribute()
    {
        $user = Auth::user();

        $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

        $actions .= $user->hasPermissionTo('covid19-list') ? '<a href="'.route("covid19.show", $this->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
        $actions .= $user->hasPermissionTo('covid19-edit') ? '<a href="'.route('covid19.edit', $this->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
        $actions .= $user->hasPermissionTo('covid19-delete') ? '<a href="'.route('covid19.confirm-delete', $this->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

        $actions .= '</div>';

        return $actions;
    }

}
