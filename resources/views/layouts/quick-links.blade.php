<div class="container mb-4">
    @can('admin-actions')
    <form class="form-row" method="GET" action="{{route('search.investment')}}">
        <div class="col-md-3">
            <div class="form-group">
            <input class="form-control" type="date" name="start" value="@php echo (isset($start))? $start:''; @endphp">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <input class="form-control" type="date" name="end" value="@php echo (isset($end))? $end:'';@endphp">
            </div>
        </div>
        <div class="col-md-3">
        <button id="search-button" type="submit" >Search</button>

        </div>
    </form>
    @endcan
</div>