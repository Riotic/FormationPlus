<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message','id_convention', 'id_etudiant',
    ];

    // relation one to one
    public function convention()
    {
        return $this->belongsTo('App\Models\Convention','id_convention','id');
    }
    public function etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant','id_etudiant','id');
    }
}
