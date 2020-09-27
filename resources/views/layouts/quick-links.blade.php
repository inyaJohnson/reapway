<div class="d-flex justify-content-between align-items-end flex-wrap">
    @can('admin-actions')
        @if(request()->is('home') || request()->is('search/investment'))
            <form style="display: inline-flex;" method="GET" action="{{route('search.investment')}}">
                <input class="form-control" type="date" name="start"
                       value="@php echo (isset($start))? $start:''; @endphp">
                <input class="form-control" type="date" name="end" value="@php echo (isset($end))? $end:'';@endphp">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        @endif

            @if(request()->is('deposit') || request()->is('search/deposit'))
                <form style="display: inline-flex;" method="GET" action="{{route('search.deposit')}}">
                    <input class="form-control" type="date" name="start"
                           value="@php echo (isset($start))? $start:''; @endphp">
                    <input class="form-control" type="date" name="end" value="@php echo (isset($end))? $end:'';@endphp">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            @endif
    @endcan
</div>
