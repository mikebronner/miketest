    @extends('genealabs/bones-keeper::master')

    @section('innerContent')
    <div class="container">
        <h1 class="page-header">Add Role</h1>
        {{ Form::open(['route' => 'roles.store', 'method' => 'POST', 'class' => 'form-horizontal well']) }}
            <div class="form-group{{ (count($errors) > 0) ? (($errors->has('name')) ? ' has-feedback has-error' : ' has-feedback has-success') : ''; }}">
                {{ Form::label('name', 'Name', ['class' => 'control-label col-sm-2']) }}
                <div class="col-sm-5">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                    @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('name')) ? ' glyphicon-remove' : ' glyphicon-ok'; }} form-control-feedback"></span>
                    @endif
                </div>
                {{ $errors->first('name', '<span class="help-block col-sm-5">:message</span>') }}
            </div>
            <div class="form-group{{ (count($errors) > 0) ? (($errors->has('description')) ? ' has-feedback has-error' : ' has-feedback has-success') : ''; }}">
                {{ Form::label('description', 'Message', ['class' => 'control-label col-sm-2']) }}
                <div class="col-sm-5">
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('description')) ? ' glyphicon-remove' : ' glyphicon-ok'; }} form-control-feedback"></span>
                    @endif
                </div>
                {{ $errors->first('description', '<span class="help-block col-sm-5">:message</span>') }}
            </div>
            <div class="form-group{{ (count($errors) > 0) ? (($errors->has('message')) ? ' has-feedback has-error' : ' has-feedback has-success') : ''; }}">
                <div class="col-sm-2">
                    {{ link_to_route('roles.index', 'Cancel', null, ['class' => 'btn btn-default pull-left']) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::submit('Add Role', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
    @stop
