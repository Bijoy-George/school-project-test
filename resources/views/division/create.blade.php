@extends('layouts.app')

@section('content')
<div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                	<h3 class="card-title">Create Division</h3>


                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <a href="{{ url('division') }}" class="btn btn-block btn-default"><i class="fas fa-chevron-left"></i> Back</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div id="msg" class="p-2"></div>

					{!! Form::open(array('route' => 'division.store', 'class' => 'form-upload', 'method'=>'POST')) !!}
				{{ Form::hidden('id') }}
        <input type="hidden" class="callback" value="form_basic_redirect">
          <input type="hidden" class="arg" value="1">
          <input type="hidden" class="callback-path" value="/division">

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Division Name</label>
                      {{ Form::text('division_name', null, array('class' => 'form-control', 'placeholder' => 'Enter Division Name')) }}
                      <span class="error" id ="division_name_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Class</label>
                      {{ Form::select('class', $classes, null, array('class' => 'form-control', 'id' => 'class', 'placeholder' => 'Select')) }}
                      <span class="error" id ="class_err"></span>
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