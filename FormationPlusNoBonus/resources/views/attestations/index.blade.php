@extends('layouts.default')

@section('main')
    <div class="flexVertical spaceE" >
        @foreach ($attestations as $attestations)
            <div class="cardsAnnonce">
                <a href="{{route('attesations.show', $attestations->id)}}" class="titleCard" >{{$attestations->id}}</a>
                <p class="texteAnnonce">{{$attestations->message}}</p>
            </div>
        @endforeach
    </div>
    {{ $attestations->links() }}

@endsection
