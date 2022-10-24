<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','nbHeur', /*'id_etudiant',*/
    ];
    // relation many to one
    public function convention()
    {
        return $this->hasMany('App\Models\Etudiant');
    }
}
