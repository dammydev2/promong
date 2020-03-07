@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<div class="row">

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		<div class="col-lg-4"></div>

		<div class="col-lg-4 panel panel-primary">

			<div class="panel-heading">Add User <i class="fa fa-user-plus"></i> </div>
			<div class="panel-body">
				
				<form method="post" action="{{ route('updateuser') }}">
                    @csrf

                    @foreach($data as $row)

                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">

                        <div class="form-group has-feedback{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="contact_name" value="{{ $row->contact_name }}" placeholder="Contact Name e.g. Musa Chinedu Ayodele">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            @if ($errors->has('contact_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="contact_phone" value="{{ $row->contact_phone  }}" placeholder="Contact Person Phone">
                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>

                            @if ($errors->has('contact_phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_phone') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ $row->email  }}" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>

                        <input type="hidden" name="id" value="{{ $row->id }}">

                        @endforeach

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Update User</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    
                </div>

            </div>


        </div>
    </div>
    @endsection
