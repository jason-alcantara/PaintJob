@extends('layout.master')

@section('content')
<div class="paint-job">
    <h3>Paint Jobs</h3>
    <div class="table-col" id="table-col">
    <h4>Paint Jobs in Progress</h4>
        <table>
            <tr>
                <th>Plate No.</th>
                <th>Current Color</th>
                <th>Target Color</th>
                <th>Action</th>
            </tr>
            @foreach ($progresses as $progress)
            <tr>
                <td>{{ $progress->plate_num }}</td>
                <td>{{ ucfirst($progress->current) }}</td>
                <td>{{ ucfirst($progress->target) }}</td>
                <td><button class="complete" data-id="{{ $progress->id }}">Mark as Completed</button></td>
            </tr>
            @endforeach
        </table>
    
    <h4>Paint Queue</h4>
        <table>
            <tr>
                <th>Plate No.</th>
                <th>Current Color</th>
                <th>Target Color</th>
            </tr>
            @foreach ($queues as $queue)
            <tr>
                <td>{{ $queue->plate_num }}</td>
                <td>{{ ucfirst($queue->current) }}</td>
                <td>{{ ucfirst($queue->target) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="performance">
        <h4>Shop Performance</h4>
        <div class="perf-details">
            <p>Total Cars Painted: 
                <label>{{ $completed }}</label>
            </p>
            <dl>
                <dt>Breakdown:</dt>
                <dd>Blue
                    <label>{{ $blue }}</label>
                </dd>
                <dd>Red
                    <label>{{ $red }}</label>
                </dd>
                <dd>Green
                    <label>{{ $green }}</label>
                </dd>
            </dl>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
jQuery(document).ready(function(){
    jQuery('.complete').click(function(e){
        var carId = $(this).data('id');
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('completed') }}",
            type: 'POST',
            data: {
                carId: carId,
            },
            dataType: 'json',
            success: function(result){
                setTimeout(
                    function() 
                    {
                        location.reload();
                    }, 5000);    
            }});
        });
    });
</script>
@endsection