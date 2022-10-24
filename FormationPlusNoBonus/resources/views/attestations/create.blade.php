@extends('layouts.default')

@section('main')
    <form style="margin-top:40px;" class="flexVertical ali-center spaceB" action="{{ route('attestations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="etudiant" class="form-control" id="etudiant">
            @include('components.liste-etudiants')
        </select>

    </form>
</div>


@endsection
