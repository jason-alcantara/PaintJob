@extends('layout.master')

@section('content')
    <div class="new-paint-job">
        <h3>New Paint Job</h3>
        <div class="row">
            <div class="column">
                <img src="images/default.png" id="current-img">
            </div>
            <div class="column">
                <img src="images/arrow.png">
            </div>
            <div class="column">
                <img src="images/default.png" id="target-img">
            </div>
        </div>
    </div>

    <form class="form" action="{{ route('store') }}" method="POST">
    {{ csrf_field() }}
        <h4>Car Details</h4>
        <div class="col-25">
            <label>Plate No.</label>
        </div>
        <div class="col-75">
            <input type="text" name="plate_num" id="plate_num">
        </div>
        </br>
        <div class="col-25">
            <label>Current Color</label>
        </div>
        <div class="col-75">
            <select id="current" name="current">
                <option value="images/default.png"></option>
                <option value="images/green.png">Green</option>
                <option value="images/red.png">Red</option>
                <option value="images/blue.png">Blue</option>
            </select>
        </div>
        </br>
        <div class="col-25">
            <label>Target Color</label>
        </div>
        <div class="col-75">
            <select id="target" name="target">
                <option value="images/default.png"></option>
                <option value="images/green.png">Green</option>
                <option value="images/red.png">Red</option>
                <option value="images/blue.png">Blue</option>
            </select>
        </div>
   
        <input type="submit">
    </form>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#current').change(function() {
        $('#current-img').attr('src', $('#current').val());
    });
    $('#target').change(function() {
        $('#target-img').attr('src', $('#target').val());
    });
});
</script>
@endsection
