@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Materi Pembelajaran</h3>
            </div>
            <form role="form" method="POST" action="{{route('learningmaterial.update', ['id' => $material->id])}}" >
              {{csrf_field()}}
              <input name="_method" type="hidden" value="PUT">
              <div class="box-body">
                <div class="form-group">
                  <label>Materi</label>
                  <input type="text" class="form-control" placeholder="Materi Pembelajaran" name="material" value="{{ $material->material }}">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection