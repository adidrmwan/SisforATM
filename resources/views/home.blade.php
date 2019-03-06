@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <h1>Welcome</h1>
  </section>
  <section class="content">
    <div>
      <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading"><b>Charts</b></div>
               <div class="panel-body" id="homeChart">
               </div>
           </div>
       </div>
     </div>
    </div>
  </section>
</div>
@endsection

@section('chartHome')
<script type="text/javascript">
  Highcharts.chart('homeChart', {
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
        name: 'Single House',
        data: {!!json_encode($total_transaksi_single)!!}
    }, {
        name: 'ATM Center',
        data: {!!json_encode($total_transaksi_center)!!}
    }]
});
</script>
@stop