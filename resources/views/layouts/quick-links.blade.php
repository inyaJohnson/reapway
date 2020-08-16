<div class="d-flex justify-content-between align-items-end flex-wrap">
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
        <i class="mdi mdi-download text-muted"></i>
    </button>
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-clock-outline text-muted"></i>
    </button>
    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-plus text-muted"></i>
    </button>
    @can('admin-actions')
        <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
    @endcan
</div>
