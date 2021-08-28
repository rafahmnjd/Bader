{{-- @extends('layouts.app1')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
@endsection
@section('content')
<div id="output" style="margin: 30px;">
<div id="chart"></div>
</div> --}}
{{-- <div class="row">
    <div class="col">
        <div>

        </div>
    </div>
    <div class="col-8">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div> --}}
{{--
@endsection
@section('script')
<!-- external libs from cdnjs -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js">
</script>
<!-- optional: mobile support with jqueryui-touch-punch -->
<script type="text/javascript" src="../vendor\nicolaskruchten\pivottable\dist/pivot.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js">
</script>
<script type="text/javascript">
    // This example is the most basic usage of pivotUI()

$(function(){

    var derivers = $.pivotUtilities.derivers;
    var renderers = $.extend($.pivotUtilities.renderers,
    $.pivotUtilities.c3_renderers);

    // $.getJSON("mps.json", function(mps) {
    $("#output").pivotUI( {!!$data!!}, {
    renderers: renderers,
    cols: ["Party"], rows: ["Province"],
    rendererName: "Horizontal Stacked Bar Chart",
    rowOrder: "value_z_to_a", colOrder: "value_z_to_a",
    rendererOptions: {
    c3: { data: {colors: {
    Liberal: '#dc3912', Conservative: '#3366cc', NDP: '#ff9900',
    Green:'#109618', 'Bloc Quebecois': '#990099'
    }}}
    }
    });
    });
    // });
</script>
@endsection --}}

@extends('layouts.app1')
@section('style')

<!-- PivotTable.js libs from ../dist -->
<link rel="stylesheet" type="text/css" href="../vendor\nicolaskruchten\pivottable/dist/pivot.css">
{{-- <link rel="stylesheet" type="text/css" href="{{asset('plugin/pivotTable/nrecopivottableext.css')}}"> --}}
{{-- <style>
    body {
        font-family: Verdana;
    }
</style> --}}

@endsection

@section('content')
<div class="container">
    <div class="row">
    <div class="col">
        <div id="output" style="margin: 30px;">
    </div>
</div>
</div>


</div>
@endsection
@section('script')
<!-- external libs from cdnjs -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js">
</script>
<!-- optional: mobile support with jqueryui-touch-punch -->
<script type="text/javascript" src="../vendor\nicolaskruchten\pivottable\dist/pivot.js"></script>
<script type="text/javascript" src="{{asset('plugin/pivotTable/nrecopivottableext.js')}}"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js">
</script>
<script type="text/javascript">
    // This example is the most basic usage of pivotUI()

    $(function(){
                // var nrecoPivotExt = new NRecoPivotTableExtensions({
                // drillDownHandler: function (dataFilter) {
                // console.log(dataFilter);
                // } });
                // var sampleData = {!!$data!!};
                // var pvtOpts = {
                // renderer: nrecoPivotExt.wrapTableRenderer($.pivotUtilities.renderers["Table"]),
                // rendererOptions: { sort: { direction : "desc", column_key : [ "1" ]} },
                // // vals: ["V"], rows: ["A"], cols: ["B"],
                // aggregator : $.pivotUtilities.aggregators["Sum"](["V"]),
                // }
                // $('#output').pivot(sampleData, pvtOpts);




    $("#output").pivotUI(
                    {!!$data!!},

                    {
                    // rows: ["color"],
                    // cols: ["shape"],
                    rendererOptions: { plotly: {width: 600, height: 600} }
                    }
                   );
        });
</script>
@endsection
