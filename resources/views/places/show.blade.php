@extends('master')
@section('content')

    <section id="place">
        <div class="container">
            <p>{{ $place->name }}</p>
            <p>{{ $place->description }}</p>
            @foreach($images as $image)
                <img src="{{ URL::asset($image->url) }}" alt="image">
            @endforeach
            <ul>
                @foreach($place->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
    </section>

@stop