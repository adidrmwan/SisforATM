@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <h1>Performance</h1>
  </section>
  <section class="content">
    
    <div class="row">
      <div class="col-xs-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Upload Performance</h3>
          </div>
          <div style="padding: 10px;">
              <form action="{{route('performance.import')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                  Choose your xls/csv File : 
                  <input type="file" name="file" class="form-control" id="file">
                  <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%;" value="upload" >
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          <h3 class="box-title">Daftar Performance</h3>
          </div>
          <div class="box-body">
            <div class="row">
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>ID ATM</th>
                <th>LOKASI</th>
                 <th>AREA</th>
                <th>PENGELOLA</th>
                 <th>JENIS LOKASI</th>
                <th>JENIS MESIN</th>
                 <th>DENOM</th>
                <th>ITEM</th>
                 <th>VOLUME</th>
                <th>FEEBASED</th>
                 <th>KUADRAN</th>
              </tr>
              </thead>
              <tbody>
             @foreach($performfeb as $key => $data)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->id_atm}}</td>
                <td>{{$data->lokasi}}</td>
                <td>{{$data->area}}</td>
                <td>{{$data->pengelola}}</td>
                <td>{{$data->jenis_lokasi}}</td>
                <td>{{$data->jenis_mesin}}</td>
                <td>{{$data->denom}}</td>
                <td>{{$data->item}}</td>
                <td>{{$data->volume}}</td>
                <td>{{$data->feebased}}</td>
                <td>{{$data->kuadran}}</td>

              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>
  </section>
</div>
@endsection