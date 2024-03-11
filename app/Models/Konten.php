<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Konten extends Model
{
    use HasFactory;

    protected $table ="konten";

    protected $fillable = [
        'slug',
        'judul',
        'konten',
        'kategori_id',
        'image',
    ];

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  R E L A T I O N  ::
    // -----------------------------------------------------------------------------------------------------------------
    public function sub_konten()
    {
        return $this->hasMany(SubKonten::class);
    }

    public function getKategoriAttribute()
    {
        return Helper::listKategoriKonten($this->kategori_id);
    }

    public function getActionAttribute()
    {
        $user = Auth::user();

        $actions = '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

        $actions .= $user->hasPermissionTo('sub_konten-list') ? '<a href="'.route('sub_konten.index', 'konten_id='.$this->id).'" class="btn btn-sm btn-success"><i class="fas fa-th"></i></a>' : '';
        $actions .= $user->hasPermissionTo('konten-list') ? '<a href="'.route("konten.show", $this->id).'" data-toggle="modal" data-target="#showModal" class="btn btn-sm btn-warning"><i class="fas fa-search"></i></a>' : '';
        $actions .= $user->hasPermissionTo('konten-edit') ? '<a href="'.route('konten.edit', $this->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>' : '';
        $actions .= $user->hasPermissionTo('konten-delete') ? '<a href="'.route('konten.confirm-delete', $this->id).'" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></a>' : '';

        $actions .= '</div>';

        return $actions;
    }
}
