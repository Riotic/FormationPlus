@extends('layouts.default')

@section('main')

<?php 
use App\Models\Etudiant;
use Illuminate\Support\Js;

$etudiants = Etudiant::all();
?>

<div>
    
    
    {{-- <div id="content">Test</div> --}}
    <form class="flexVertical ali-center spaceB" action="{{ route('attestations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Etudiant</p>
        <p>Veuillez selectionner un étudiant</p>
        <select name="etudiant" class="form-control" id="etudiant"  >
            @foreach ($etudiants as $etudiants)
                <option  id="{{$etudiants->id}}" 
                    onclick="getNomConvention();autoForm({{$etudiants->id}});stockIdEtudiant({{$etudiants->id}});stockIdConvention({{$etudiants->id_convention}});refreshNbHeures()" 
                    value="{{$etudiants->id_convention}}">{{$etudiants->nom.' '.$etudiants->prenom}}</option>
            @endforeach
        </select>
        <input id="content" value="" disabled>
        <input id="nbHeures" value="" hidden>
        <input id="id_etudiant" name="id_etudiant" value="" hidden >
        <input id="id_convention" name="id_convention" value="" hidden >
        <input type="search" name="search" id="search" class="form-control" hidden>
        {{-- onclick="refreshNbHeures()" --}}
        <textarea id="message"  name="message" rows="7" cols="70">
            Bonjour #NOM_ETUDIANT# #PRENOM_ETUDIANT#,

            Vous avez suivi #nbHeur# de formation chez FormationPlus.
            Pouvez-vous nous retourner ce mail avec la pièce jointe signée.
            
            Cordialement,
            FormationPlus
        </textarea>
        {{-- onclick="refreshNbHeures()" --}}
        <button  id="validation">Créer l'attestation</button>
    </form>
</div>

<script type="text/javascript">

    function getNomPrenom(id){
        nomPrenom = document.getElementById(id).innerText;
        console.log(nomPrenom);
        return nomPrenom;
    }
    function getNbHeures(){
        nbHeures = document.getElementById("nbHeures").value;
        console.log(nbHeures);
        return nbHeures;
    }
    function autoForm(id){
        formMessage = document.getElementById('message');
        nomPrenom = getNomPrenom(id);
        nbHeures = getNbHeures();
        formMessage.value = 
        `Bonjour ${nomPrenom}, Vous avez suivi ${nbHeures}h de formation chez FormationPlus.
        Pouvez-vous nous retourner ce mail avec la pièce jointe signée.
        \n Cordialement,\nFormationPlus`;
    }
    function getNomConvention(){
        idConv = document.getElementById('etudiant').value;
        searchConv = document.getElementById('search');
        // console.log(searchConv);
        searchConv.value = idConv;
        return idConv;
    }

    function stockIdEtudiant(id){
        id_etudiant = document.getElementById("id_etudiant");
        id_etudiant.value = id;
        return id;
    }
    function stockIdConvention(id){
        id_convention = document.getElementById("id_convention");
        id_convention.value = id;
        return id;
    }

    function refreshNbHeures(){
        formMessage = document.getElementById('message').value;
        formMessageToRefresh = formMessage.split('suivi ');
        hour = formMessageToRefresh[1].split('h de');
        hour[0] = getNbHeures();
        formMessageToRefresh[1] = `suivi ${hour[0]}h de formation chez FormationPlus.
        Pouvez-vous nous retourner ce mail avec la pièce jointe signée.
        \n Cordialement,\nFormationPlus`;
        formFinal = formMessageToRefresh.join('');
        formMessage = document.getElementById('message');
        formMessage.value = formFinal;
        // console.log(hour[0]);
        // console.log(hour);
        // console.log(formMessageToRefresh[1]);
        // console.log(formMessage);
        // console.log(formFinal);
    }

    $('#message').on('click',function()
    {
        // $value=$(this).val();
        $value = getNomConvention();
        $.ajax({
            type:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},

            success:function(data)
            {
                data = data.split("---")
                // test(data);
                // $('#content').html(data);
                $('#content').val(data[0]);
                $('#nbHeures').val(data[1]);
                refreshNbHeures();
            }
        });
    });
    $('#validation').on('mouseenter',function()
    {
        // $value=$(this).val();
        $value = getNomConvention();
        $.ajax({
            type:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},

            success:function(data)
            {
                data = data.split("---")
                console.log(data);
                // test(data);
                // $('#content').html(data);
                $('#content').val(data[0]);
                $('#nbHeures').val(data[1]);
            }
        });
    });


</script>

@endsection
