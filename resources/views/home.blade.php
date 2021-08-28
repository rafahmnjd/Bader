@extends('layouts.app1')
@section('style')

<!-- PivotTable.js libs from ../dist -->
<link rel="stylesheet" type="text/css" href="../vendor\nicolaskruchten\pivottable/dist/pivot.css">


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
{{-- <script type="text/javascript" src="{{asset('plugin/pivotTable/nrecopivottableext.js')}}"></script> --}}
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
                    rows: ["color"],
                    cols: ["shape"],
                    rendererOptions: { plotly: {width: 600, height: 600} }
                    }
                   );
        });
</script>
@endsection
