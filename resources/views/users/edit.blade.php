@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Sections</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $single)
                            <li>{{ $single }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(!empty($data))
                {{ Form::model($data, ['route'=> ['users.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            @else
                {{ Form::open(['url'=> url('/users'), 'method'=>'post', 'class'=>'form-horizontal']) }}
            @endif
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('name', 'Name', ['for'=>'name']) }}
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) }}
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('email', 'Email', ['for'=>'email']) }}
                    @if(!empty($data))
                        {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'disabled']) }}
                    @else
                        {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required']) }}
                    @endif
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12">
                    {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>
    </div>
@endsection
