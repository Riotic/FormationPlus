<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom', 'email', 'id_convention',
    ];

    // relation one to Many
    public function etudiant()
    {
        return $this->belongsTo('App\Models\Convention','id_convention','id');
    }
}
