@extends('layouts.app')

@section('content')
<div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                	<h3 class="card-title">Create Teacher</h3>


                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <a href="{{ url('teacher') }}" class="btn btn-block btn-default"><i class="fas fa-chevron-left"></i> Back</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div id="msg" class="p-2"></div>

					{!! Form::open(array('route' => 'teacher.store', 'class' => 'form-upload', 'method'=>'POST')) !!}
				{{ Form::hidden('id') }}
        <input type="hidden" class="callback" value="form_basic_redirect">
          <input type="hidden" class="arg" value="1">
          <input type="hidden" class="callback-path" value="/teacher">

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}
                      <span class="error" id ="email_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}
                      <span class="error" id ="email_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      {{ Form::text('password', null, array('class' => 'form-control', 'placeholder' => 'Enter Password')) }}
                      <span class="error" id ="password_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Confirm Password</label>
                      {{ Form::text('c_password', null, array('class' => 'form-control', 'placeholder' => 'Enter Confirm Password')) }}
                      <span class="error" id ="c_password_err"></span>
                    </div>
                  </div> 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <!-- /.card-body -->
              {!! Form::close() !!}
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
@endsection