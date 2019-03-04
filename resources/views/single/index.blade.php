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
              <form action="{{route('single.import')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                  Choose your File : 
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
                <th>PENGELOLA</th>
                <th>JATUH TEMPO</th>
                <th>DENOM</th>
                <th>PERFORMANCE</th>
                <th>TRANSAKSI</th>
                <th>FEEBASED</th>
                <th>AC</th>
                <th>CCTV</th>
                <th>TANGGAL</th>
              </tr>
              </thead>
              <tbody>
              @foreach($listSingle as $key => $data)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->id_atm}}</td>
                <td>{{$data->lokasi}}</td>
                <td>{{$data->pengelola}}</td>
                <td>{{$data->jatuh_tempo}}</td>
                <td>{{$data->denom}}</td>
                <td>{{$data->performance}}</td>
                <td>{{$data->transaksi}}</td>
                <td>{{$data->feebased}}</td>
                <td>{{$data->ac}}</td>
                <td>{{$data->cctv}}</td>
                <td>{{$data->tanggal}}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>

    <div>
      <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading"><b>Charts</b></div>
               <div class="panel-body" id="singleChart">
               </div>
           </div>
       </div>
     </div>
    </div>
  </section>
</div>
@endsection