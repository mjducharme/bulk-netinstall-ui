@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-1">Slot</div>
    <div class="col-sm-1">Interface</div>
    <div class="col-sm-6">Operation / Status</div>
  </div>
  <hr/>
  @foreach ($interfaces as $interface)
  <div class="row">
    <div class="col-sm-1 my-auto">{{ $loop->iteration }}</div>
    <div class="col-sm-1 my-auto">{{ $interface->interface_friendly_name }}</div>
    <div class="col-sm-10"><form style="margin-bottom: 0px; ">
    <div class="form-row">
    <div class="col-2">  
    <select class="form-control" id="selectOperation" onchange="displayDivDemo('selectCol{{ $loop->iteration }}', this)">
      <option value="0">Prepare Device</option>
      <option value="1">Apply Template</option>
    </select>
    </div>
    <div class="col" id="selectCol{{ $loop->iteration }}" style="display:none;">
    <select class="form-control" id="selectTemplate">
    @foreach ($templates as $template)
      <option>{{ $template->description }} </option>
    @endforeach  
    </select>
</div><div class="col mt-auto">
<button type="submit" class="btn btn-primary">Go</button>
</div></div></form></div>
  </div>
  <hr/>
  @endforeach
</div>
@endsection

<script type="text/javascript">
function displayDivDemo(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
   }
</script>
