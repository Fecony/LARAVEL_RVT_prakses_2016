@extends('layouts.master')

@section('title', 'Preces')

@section('content')

<!-- sortesanas skripts -->
<script src="js/sorttable.js"></script>
<style>
    #search{
        margin-bottom:20px;
    }
    .clearable{
        background: #fff url(http://i.stack.imgur.com/mJotv.gif) no-repeat right -10px center;
        border: 1px solid #999;
        padding: 3px 18px 3px 4px;     /* Use the same right padding (18) in jQ! */
        border-radius: 3px;
        transition: background 0.4s;
    }
    .clearable.x  { background-position: right 5px center; } /* (jQ) Show icon */
    .clearable.onX{ cursor: pointer; }              /* (jQ) hover cursor style */
    .clearable::-ms-clear {display: none; width:0; height:0;} /* Remove IE default X */
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('a').tooltip();
    });
</script>
<script>
    $(document).ready(function () {
        $("#search").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#table tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

//X in input

        function tog(v) {return v ? 'addClass' : 'removeClass';}
        $(document).on('input', '.clearable', function() {
            $(this)[tog(this.value)]('x');
        }).on('mousemove', '.x', function(e) {
            $(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]('onX');
        }).on('touchstart click', '.onX', function(ev) {
            ev.preventDefault();
            $(this).removeClass('x onX').val('').change();
        });
    });
</script>

<h1>Visas preces</h1>
<p class="lead">Visas pievienoto preču tabula. @role(('admin'))<a href="{{ route('products.create') }}">Pievienot jaunu?</a>@endrole</p>
<hr>
<div class="col-md-12">
<!-- Preces -->
@if (count($products) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">Visas Preces</div>
        <div class="panel-body table-responsive">
            <input type="search" class="clearable form-control" id="search" placeholder="Meklēt">
            <table id="table" class="sortable table table-striped table-condensed nowrap task-table table-bordered" width="100%">
                <thead class="btn-default">
					<th>Pavadzīmes Nr.</th>
					<th>Piegadatajs</th>
					<th>Piegādes datums</th>
					<th>Preces nosaukums</th>
					<th>Skaits</th>
					<th>Mērvienība</th>
					<th>Piezīmes</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="">
                            <td class="table-text"><div>{{ $product->invoice_nr }}</div></td>
                            <td class="table-text"><div>{{ $product->provider }}</div></td>
                            <td class="table-text"><div>{{ date('m/j/Y' , strtotime($product->delivered_at)) }}</div></td>
                            <td class="table-text"><div>{{ $product->product_name }}</div></td>
                            <td class="table-text"><div>{{ $product->amount }}</div></td>
                            <td class="table-text"><div>{{ $product->choices }}</div></td>
                            <td class="table-text"><div>{{ $product->note }}</div></td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Apskatit preci">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- end of .panel .panel-default -->
@else
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>PRECES NAV ATRASTAS</h1>
            <a href="{{ route('products.create') }}">Pievienot jaunu?</a>
        </div>
    </div>
@endif
</div>

@stop