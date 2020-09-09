<div class="d-flex justify-content-between align-items-end flex-wrap">
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-clock-outline text-muted"></i>
    </button>
    @can('client-actions')
    <a href="{{route('investment.invest')}}" title="Invest">
        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
        </button>
    </a>
    @endcan
    @can('admin-actions')
        <a type="button" href="#" class="btn btn-primary mt-2 mt-xl-0">General
            report</a>
    @endcan
</div>
