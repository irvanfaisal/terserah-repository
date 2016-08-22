@extends('master')
@section('content')

    <section id="place">
        <div class="container">
            <h1>Edit Place</h1>
            <br/>

            {!! Form::model($place, ['class'=>'form-horizontal', 'method' => 'PATCH','action' => ['PlacesController@update', $place->slug]]) !!}
            @include ('partials._form_place', ['SubmitButtonText' => 'Edit Place'])
            {!! Form::close() !!}

            {!! Form::open(['class'=>'form-horizontal', 'method' => 'POST','action' =>  ['ImagesController@store', $place->slug], 'files'=>true]) !!}
            <div class="controls">
                {!! Form::file('images[]', array('multiple'=>true, 'id' => 'uploadfile')) !!}
            </div>
            <div id="dvPreview"></div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-8">
                    {{ Form::submit('add Images', ['class' => 'btn btn-primary form-control']) }}
                </div>

            </div>
            {!! Form::close() !!}

            @include('errors.list')

            <table class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th class="text-center">Images</th>
                    <th class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($images as $count=>$image)
                    <tr>
                        <td class="text-center"><img src="{{ URL::asset($image->url) }}" alt="image"></td>
                        <td class="text-center">
                            {!! Form::model($place, ['method' => 'DELETE','action' => ['ImagesController@destroy', $place->slug, $image->id]]) !!}
                            @include('partials._form_delete')
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop
