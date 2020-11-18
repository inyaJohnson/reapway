@can('admin-actions')
    <li class="nav-item mt-2">
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="nav-link waves-effect">
            <i class="fas fa-user mr-2"></i> Package<i class="fas fa-chevron-right ml-2 " style="font-size: 12px;"></i>
        </a>
    </li>
    {{--<p id="collapseExample" class="collapse ml-2 panel-collapse">--}}
    {{--<a href="{{route('packages.create')}}" class="nav-link waves-effect">--}}
    {{--<i class="fas fa-user mr-2"></i>Create Package</a>--}}

    {{--<a href="{{route('packages.index')}}" class="nav-link waves-effect">--}}
    {{--<i class="fas fa-user mr-2"></i>Packages</a>--}}
    {{--</p>--}}

    <li class="nav-item mt-2">
        <a href="{{route('next-to-mature')}}" class="nav-link waves-effect">
            <i class="fas fa-map mr-2"></i>Next to Mature</a>
    </li>

    <li class="nav-item mt-2">
        <a href="{{route('withdrawal.transaction')}}" class="nav-link waves-effect">
            <i class="fas fa-archway mr-2"></i><span>Withdraw Trans.</span></a>
    </li>

    <li class="nav-item mt-2">
        <a href="{{route('deposit.transaction')}}" class="nav-link waves-effect">
            <i class="fas fa-archway mr-2"></i>Deposit Trans.</a>
    </li>

    <li class="nav-item mt-2">
        <a data-toggle="collapse" href="#usermanagementCollapse" role="button" aria-expanded="false"
           aria-controls="usermanagementCollapse" class="nav-link waves-effect">
            <i class="fas fa-user mr-2"></i> Users<i class="fas fa-chevron-right ml-2 "
                                                     style="font-size: 12px;"></i>
        </a>
    </li>

    {{--<p id="usermanagementCollapse" class="collapse ml-2">--}}
    {{--<a href="{{route('user.blocked')}}" class="nav-link waves-effect">--}}
    {{--<i class="fas fa-users-cog mr-2"></i>Blocked Users</a>--}}
    {{--<a href="{{route('user.index')}}" class="nav-link waves-effect">--}}
    {{--<i class="fas fa-users-cog mr-2"></i>Users </a>--}}
    {{--</p>--}}

    <li class="nav-item mt-2">
        <a href="{{route('help.index')}}" class="nav-link waves-effect">
            <i class="far fa-question-circle mr-2"></i>Help</a>
    </li>
@endcan

@can('client-actions')
    <li class="nav-item mt-2">
        <a href="{{route('investment.invest')}}" class="nav-link waves-effect">
            <i class="fas fa-user mr-2"></i>Invest</a>
    </li>
    <li class="nav-item mt-2">
        <a href="{{route('withdrawal')}}" class="nav-link waves-effect">
            <i class="fas fa-map mr-2"></i>Withdraw</a>
    </li>
    <li class="nav-item mt-2">
        <a href="{{route('withdrawal.transaction')}}" class="nav-link waves-effect">
            <i class="fas fa-archway mr-2"></i>Withdraw Trans.</a>
    </li>
    <li class="nav-item mt-2">
        <a href="{{route('deposit.transaction')}}" class="nav-link waves-effect">
            <i class="fas fa-funnel-dollar mr-2"></i>Deposit Trans.</a>
    </li>
    <li class="nav-item mt-2">
        <a href="{{route('settings.index')}}" class="nav-link waves-effect">

            <i class="fas fa-users-cog mr-2"></i>Settings</a>
    </li>
    <li class="nav-item mt-2">
        <a href="{{route('help.create')}}" class="nav-link waves-effect">
            <i class="far fa-question-circle mr-2"></i>Help</a>
    </li>
@endcan
