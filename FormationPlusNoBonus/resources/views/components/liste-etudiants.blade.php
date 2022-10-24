<?php 
use App\Models\Etudiant;
$etudiants = Etudiant::all();
?>
@foreach ($etudiants as $etudiants)
<option value="{{$etudiants->prenom.' '.$etudiants->nom}}">{{$etudiants->prenom.' '.$etudiants->nom}}</option>
@endforeach