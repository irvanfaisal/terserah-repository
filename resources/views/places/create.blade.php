@extends('master')
@section('content')

    <section id="place">
        <div class="container">
            <h1>Add New Place</h1>
            <br/>

            {!! Form::open(['class'=>'form-horizontal', 'url' => 'places', 'files'=>true]) !!}
                <div class="controls">
                    {!! Form::file('images[]', array('multiple'=>true, 'id' => 'uploadfile')) !!}
                </div>
                <div id="dvPreview"></div>  
            @include ('partials._form_place', ['SubmitButtonText' => 'Add Place'])
            {!! Form::close() !!}

            @include('errors.list')

    </section>

@stop
