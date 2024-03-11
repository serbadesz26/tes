<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubKonten extends Model
{
    use HasFactory;

    protected $table ="sub_konten";

    protected $fillable = [
        'judul',
        'konten',
        'status',
        'konten_id',
    ];

    //--------------------------------------------------------------------------------------
    //   :: RELATIONAL ::
    //--------------------------------------------------------------------------------------
    public function konten()
    {
        return $this->belongsTo(Konten::class);
    }

    // ----------------------------------------------------------------------------
    //         ::  S C O P E  ::
    // ----------------------------------------------------------------------------
    public function scopeKontenId($query, $konten_id)
    {
        return $query->where('konten_id', $konten_id);
    }

    public function getActionAttribute()
    {
        $user = Auth::user();

        $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

        $actions .= $user->hasPermissionTo('sub_konten-list') ? '<a href="'.route("sub_konten.show", $this->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
        $actions .= $user->hasPermissionTo('sub_konten-edit') ? '<a href="'.route('sub_konten.edit', $this->id).'" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
        $actions .= $user->hasPermissionTo('sub_konten-delete') ? '<a href="'.route('sub_konten.confirm-delete', $this->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

        $actions .= '</div>';

        return $actions;
    }
}
