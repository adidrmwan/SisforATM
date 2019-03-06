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
              <form action="{{route('center.import')}}" method="POST" enctype="multipart/form-data">
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
                @foreach($listCenter as $key => $data)
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
               <div class="panel-body" id="centerChart">
               </div>
           </div>
       </div>
     </div>
    </div>
  </section>
</div>
@endsection

@section('chartCenterScript')
<script type="text/javascript">
  Highcharts.chart('centerChart', {
    dateRangeGrouping: true,
    chart: {
        type: 'column'
    },
    title: {
        text: 'Transaksi ATM'
    },
    subtitle: {
        text: 'BANK MANDIRI'
    },
    credits: {
        enabled: false
    },
    xAxis: {
        dateTimeLabelFormats:{
            month: '%b %e, %Y'
          },
        categories: {!!json_encode($kategori)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Transaksi'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp {point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'ATM Center',
        data: {!!json_encode($total_transaksi)!!}

    }]
});
</script>
@stop