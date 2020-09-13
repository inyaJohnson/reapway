<div class="d-flex justify-content-between align-items-end flex-wrap">
    @can('admin-actions')
        <form style="display: inline-flex;" method="GET" action="{{route('search.investment')}}">
            <input class="form-control" type="date" name="start" value="@php echo (isset($start))? $start:''; @endphp">
            <input class="form-control" type="date" name="end" value="@php echo (isset($end))? $end:'';@endphp">
            <button type="submit" class="btn btn-primary mt-2 mt-xl-0">Search</button>
        </form>
    @endcan
</div>
