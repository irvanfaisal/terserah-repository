@extends('master')
@section('content')

    <section id="place">
        <div class="container">
            @foreach($places as $place)
                <h4><a href="{{ url('places', $place->slug) }}">{{ $place->name }}</a></h4>
            @endforeach
                <br><br><br>
            tagged
            @foreach($tes as $a)
                <h4><a href="{{ url('places', $a->slug) }}">{{ $a->name }}</a></h4>
            @endforeach
        </div>
    </section>

@stop