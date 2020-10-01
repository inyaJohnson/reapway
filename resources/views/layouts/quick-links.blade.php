<div class="filter">
    @can('admin-actions')
        @if(request()->is('home') || request()->is('search/investment'))
            <form class="form-row" method="GET" action="{{route('search.investment')}}">

                <div class="form-group">
                    <input class="form-control" type="date" name="start"
                           value="@php echo (isset($start))? $start:''; @endphp">
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" name="end"
                           value="@php echo (isset($end))? $end:'';@endphp">
                </div>
                <div class="form-group">
                <button class="btn-primary" id="search-button" type="submit">Filter</button>
                </div>
            </form>
        @endif

        @if(request()->is('deposit') || request()->is('search/deposit'))
            <form class="form-row" method="GET" action="{{route('search.deposit')}}">
                <div class="form-group">
                    <input class="form-control" type="date" name="start"
                           value="@php echo (isset($start))? $start:''; @endphp">
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" name="end"
                           value="@php echo (isset($end))? $end:'';@endphp">
                </div>
                <div class="form-group">
                <button id="search-button" class="btn-primary" type="submit">Filter</button>
                </div>
            </form>
        @endif
    @endcan
</div>
