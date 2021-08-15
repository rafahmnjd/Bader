@extends('layouts.app1')
@section('style')


<!-- PivotTable.js libs from ../dist -->
<link rel="stylesheet" type="text/css" href="../vendor\nicolaskruchten\pivottable/dist/pivot.css">
<style>
    body {
        font-family: Verdana;
    }
</style>


@endsection

@section('content')
    <div id="output" style="margin: 30px;"></div>
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
                $("#output").pivotUI(
                    {!!$data!!},
                    {
                        rows: ["color"],
                        cols: ["shape"]
                    }
                );
             });
</script>
@endsection
