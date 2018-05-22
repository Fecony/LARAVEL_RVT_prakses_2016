@extends('layouts.master')

@section('title', '| + Inv. numurs')
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select").select2();
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>

@section('content')
<h1>Jauns Inventāra numurs</h1>
<hr>
<form action="{{ route('inventars.store')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Prece</label>

        <div class="col-sm-6">
            <select data-live-search="true" class="selectpicker form-control" name="product_id" id="task-name">
                @foreach($inventar as $key)
                    <option value="{{ $key->id }}">{{ $key->product_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Inventara Nr.</label>

        <div class="col-sm-6">
            <input type="text" name="inventar_nr" id="task-name" class="form-control">
        </div>
    </div>

    <div hidden class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Status</label>

        <div class="col-sm-6">
            <input type="text" name="status" id="task-name" value="brivs" class="form-control">
        </div>
    </div>

    <!-- Add Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-success btn-block">Pievienot!</button>
        </div>
    </div>
</form>
@stop