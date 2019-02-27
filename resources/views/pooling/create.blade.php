@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Learning Material
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Add Material</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" method="POST" action="{{route('learningmaterial.store')}}" >
                  {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label>Material</label>
                  <input type="text" class="form-control" placeholder="Material" name="material">
                </div>
              </div>
              <!-- /.box-body -->
              <input type="text" name="id" value="{{$id}}" hidden="">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection