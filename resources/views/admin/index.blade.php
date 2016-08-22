@extends('master')
@section('content')
    <section id="admin">
        <div class="container">
            <h2>Admin</h2><br/>
            <h4><a href="{{ url('',['places','create']) }}" class="btn btn-default" aria-label="Left Align">New Place</a></h4>
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Coordinate-x</th>
                    <th class="text-center">Coordinate-y</th>
                    <th class="text-center">Tags</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Time Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($places as $count=>$place)
                    <tr>
                        <td class="text-center">{{ ++$count }}</td>
                        <td class="text-center">{{ $place->id }}</td>
                        <td><a href="{{ url('',['places', $place->slug]) }}">{{ $place->name }}</a></td>
                        <td class="text-center">{{ $place->description }}</td>
                        <td class="text-center">{{ $place->address }}</td>
                        <td class="text-center">{{ $place->lon }}</td>
                        <td class="text-center">{{ $place->lat }}</td>
                        <td class="text-center">
                            @foreach($place->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </td>
                        <td class="text-center"><a href="{{ url('',['places', $place->slug, 'edit']) }}">Edit</a></td>
                        <td class="text-center">
                            {!! Form::model($place, ['method' => 'DELETE','action' => ['PlacesController@destroy', $place->slug]]) !!}
                                @include('partials._form_delete')
                            {!! Form::close() !!}
                        </td>
                        <td class="text-center">{{ $place->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row text-center paginate">
                {!! $places->render() !!}
            </div>
        </div>    
    </section>
@stop
