@extends('layouts.default')

@section('main')
    <div class="flexVertical spaceE" >
        @foreach ($attestations as $attestation)
            <div class="cardsAnnonce">
                <a href="{{route('attestations.show', $attestation->id)}}" class="titleCard" >{{$attestation->id}}</a>
                <p class="texteAnnonce">{{$attestation->message}}</p>
            </div>
        @endforeach
    </div>
    {{ $attestations->links() }}

@endsection
