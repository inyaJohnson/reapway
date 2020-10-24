@can('admin-actions')
    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
       aria-controls="collapseExample" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-user mr-2"></i> Package<i class="fas fa-chevron-right ml-2 " style="font-size: 12px;"></i>
    </a>
    <p id="collapseExample" class="collapse ml-2 panel-collapse">
        <a href="{{route('packages.create')}}" class="nav-link waves-effect">
            <i class="fas fa-user mr-2"></i>Create Package</a>

        <a href="{{route('packages.index')}}" class="nav-link waves-effect">
            <i class="fas fa-user mr-2"></i>Packages</a>
    </p>

    <a href="{{route('next-to-mature')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-map mr-2"></i>Next to Mature</a>

    <a href="{{route('withdrawal.transaction')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-archway mr-2"></i><span>Withdraw Trans.</span></a>

    <a href="{{route('deposit.transaction')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-archway mr-2"></i>Deposit Trans.</a>

    <a data-toggle="collapse" href="#usermanagementCollapse" role="button" aria-expanded="false"
       aria-controls="usermanagementCollapse" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-user mr-2"></i> Users<i class="fas fa-chevron-right ml-2 "
                                                 style="font-size: 12px;"></i>
    </a>

    <p id="usermanagementCollapse" class="collapse ml-2">
        <a href="{{route('user.blocked')}}" class="nav-link waves-effect">
            <i class="fas fa-users-cog mr-2"></i>Blocked Users</a>
        <a href="{{route('user.index')}}" class="nav-link waves-effect">
            <i class="fas fa-users-cog mr-2"></i>Users </a>
    </p>

    <a href="{{route('help.index')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="far fa-question-circle mr-2"></i>Help</a>
@endcan





@can('client-actions')
    <a href="{{route('investment.invest')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-user mr-2"></i>Invest</a>
    <a href="{{route('withdrawal')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-map mr-2"></i>Withdraw</a>

    <a href="{{route('withdrawal.transaction')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-archway mr-2"></i>Withdraw Trans.</a>
    <a href="{{route('deposit.transaction')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-funnel-dollar mr-2"></i>Deposit Trans.</a>
    <a href="{{route('settings.index')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="fas fa-users-cog mr-2"></i>Settings</a>
    <a href="{{route('help.create')}}" class="list-group-item list-group-item-action  waves-effect">
        <i class="far fa-question-circle mr-2"></i>Help</a>
@endcan
