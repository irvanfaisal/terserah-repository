<div class="form-group">
    {{ Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-8">
        {{ Form::text('description', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-8">
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lon', 'lon:', ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-8">
        {{ Form::text('lon', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lat', 'lat:', ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-8">
        {{ Form::text('lat', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2 col-sm-offset-8">
        {{ Form::submit($SubmitButtonText, ['class' => 'btn btn-primary form-control']) }}
    </div>

</div>