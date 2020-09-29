
<a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action waves-effect  text-white">
    <i class="fas fa-user mr-2"></i> Package<i class="fas fa-chevron-right ml-2 " style="font-size: 12px;"></i>
</a>
<p id="collapseExample" class="collapse ml-2">
    <a href="{{route('packages.create')}}" class="list-group-item  waves-effect  text-white">
        <i class="fas fa-user mr-2"></i>Create Package</a>

    <a href="{{route('packages.index')}}" class="list-group-item  waves-effect  text-white">
        <i class="fas fa-user mr-2"></i>Packages</a>
</p>
<a href="{{route('withdrawal')}}" class="list-group-item  waves-effect text-white">
    <i class="fas fa-map mr-2"></i>Withdraw</a>
<a href="{{route('withdrawal.transaction')}}" class="list-group-item  waves-effect text-white ">
    <i class="fas fa-archway mr-2"></i><span >Withdraw Transaction</span></a>
<a href="{{route('deposit.transaction')}}" class="list-group-item  waves-effect text-white ">
    <i class="fas fa-archway mr-2"></i>Deposit Transactions</a>

<a  data-toggle="collapse" href="#usermanagementCollapse" role="button" aria-expanded="false" aria-controls="usermanagementCollapse" class="list-group-item waves-effect  text-white">
    <i class="fas fa-user mr-2"></i> User management<i class="fas fa-chevron-right ml-2 " style="font-size: 12px;"></i>
</a>
<p id="usermanagementCollapse" class="collapse ml-2">
<a href="{{route('user.blocked')}}" class="list-group-item list-group-item-action waves-effect  text-white">
    <i class="fas fa-users-cog mr-2"></i>Blocked Users</a>
<a href="{{route('user.index')}}" class="list-group-item  waves-effect  text-white">
    <i class="fas fa-users-cog mr-2"></i>Users </a>
</p>
<a href="{{route('help.index')}}" class="list-group-item waves-effect  text-white">
    <i class="far fa-question-circle mr-2"></i>Response To Request</a>