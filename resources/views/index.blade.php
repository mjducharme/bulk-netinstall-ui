@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-1">Slot</div>
            <div class="col-sm-1">Interface</div>
            <div class="col-sm-8">Current Operation</div>
            <div class="col-sm-2">Previous Operation</div>
        </div>
        <hr />
        @foreach ($interfaces as $interface)
            <div class="row">
                <div class="col-sm-1 my-auto">{{ $loop->iteration }}</div>
                <div class="col-sm-1 my-auto">{{ $interface->interface_friendly_name }}</div>
                <div class="col-sm-8 my-auto">
                    <form style="margin-bottom: 0px; " id="operationForm">
                        <div class="form-row">
                            <div class="col-3">
                                <select class="form-control" id="selectOperation"
                                    onchange="displayDivDemo('selectCol{{ $loop->iteration }}', this)" form="operationForm">
                                    <option value="0">Reset Slot</option>
                                    <option value="1">Prepare Device</option>
                                    <option value="2">Apply Template</option>
                                </select>
                            </div>
                            <div class="col" id="selectCol{{ $loop->iteration }}" style="display:none;">
                                <select class="form-control" id="selectTemplate" form="operationForm">
                                    @foreach ($templates as $template)
                                        <option>{{ $template->description }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-auto">
                                <button type="submit" class="btn btn-primary" form="operationForm">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"><b>Op:</b> None<br /><b>Result:</b> None</div>
            </div>
            <hr />
        @endforeach
    </div>
@endsection

<script type="text/javascript">
    function displayDivDemo(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 2 ? 'block' : 'none';
    }
</script>
