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
              <form action="{{route('atm.import')}}" method="POST" enctype="multipart/form-data">
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
                <th>Terminal ID</th>
                <th>Terminal Location</th>
                <th>Vendor</th>
                <th>Area</th>
                <th>Type Lokasi</th>
                <th>Tanggal</th>
              </tr>
              </thead>
              <tbody>
                @foreach($listAtm as $key => $data)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$data->terminal_id}}</td>
                  <td>{{$data->lokasi}}</td>
                  <td>{{$data->vendor}}</td>
                  <td>{{$data->area}}</td>
                  <td>{{$data->tipe}}</td>
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
               <div class="panel-body" id="atmChart">
               </div>
           </div>
       </div>
     </div>
    </div>
  </section>
</div>
@endsection

@section('chartAtmScript')
<script type="text/javascript">
  Highcharts.chart('atmChart', {
    dateRangeGrouping: true,
    chart: {
        type: 'column'
    },
    title: {
        text: 'ATM'
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
            '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
        name: 'Pooling ATM',
        data: {!!json_encode($total_type_pooling)!!}

    }, {
        name: 'Drive Thru',
        data: {!!json_encode($total_type_drive)!!}

    }, {
        name: 'Single House',
        data: {!!json_encode($total_type_single)!!}

    }, {
        name: 'ATM Center',
        data: {!!json_encode($total_type_center)!!}

    }]
});
</script>
@stop