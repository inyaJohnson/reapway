<div class="d-flex justify-content-between align-items-end flex-wrap">
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
        <i class="mdi mdi-download text-muted"></i>
    </button>
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-clock-outline text-muted"></i>
    </button>
    <a href="{{route('investment.invest')}}" title="Invest">
        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
        </button>
    </a>
    @if(request()->is('referral'))
        @can(['referral_actions', 'client-actions'])
            <button type="button" href="" class="btn btn-primary mt-2 mt-xl-0 referrer-form-toggle">Add Your referrer
            </button>
        @endcan
    @endif
    @can('admin-actions')
        <a type="button" href="{{route('general-report.index')}}" class="btn btn-primary mt-2 mt-xl-0">General
            report</a>
    @endcan
</div>
