<ul id="menu" class="page-sidebar-menu">
<li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="fa fa-user fa-lg"></i>
        <span class="title">You</span>
        <span class="fa fa-angle-double-down fa-lg"></span>
    </a>
    <ul class="sub-menu">
       {{--<!--  <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('admin/users') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Users--}}
            {{--</a>--}}
        {{--</li> -->--}}
        {{--<!-- <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('admin/users/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New User--}}
            {{--</a>--}}
        {{--</li> -->--}}

         <li >
            <a href="{{ URL::to('admin/favorite') }}">
                <i class="fa fa-angle-right"></i>
                Favorite events
            </a>
        </li>
        <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                <i class="fa fa-angle-right"></i>
                Personal profile
            </a>
        </li>
        <li >
            <a href="{{ URL::to('admin/notisfaction') }}">
                <i class="fa fa-angle-right"></i>
                Notisfaction
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/events') || Request::is('admin/events/create') || Request::is('admin/events/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="fa fa-calendar fa-lg"></i>
        <span class="title">Events</span>
        <span class="fa fa-angle-double-down fa-lg"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/events') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/events') }}">
                <i class="fa fa-angle-right"></i>
                Events
            </a>
        </li>
        <li {!! (Request::is('admin/events/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/events/create') }}">
                <i class="fa fa-angle-right"></i>
                Add New Event
            </a>
        </li>
    </ul>
</li>
{{--<!-- <li {!! (Request::is('admin/usergroups') || Request::is('admin/usergroups/create') || Request::is('admin/usergroups/*') ? 'class="active"' : '') !!}>--}}
    {{--<a href="#">--}}
        {{--<i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--}}
        {{--<span class="title">Usergroups</span>--}}
        {{--<span class="fa arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li {!! (Request::is('admin/usergroups') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/usergroups') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--usergroups--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li {!! (Request::is('admin/usergroups/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/usergroups/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New Usergroup--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li> -->--}}
<!-- <li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Groups</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups') }}">
                <i class="fa fa-angle-double-right"></i>
                Groups
            </a>
        </li>
        <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Group
            </a>
        </li>
        <li {!! (Request::is('admin/groups/any_user') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups/any_user') }}">
                <i class="fa fa-angle-double-right"></i>
                Any User Access
            </a>
        </li>
    </ul>
</li> -->
<li {!! (Request::is('admin/eventcategories') || Request::is('admin/eventcategories/create') || Request::is('admin/eventcategories/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="fa fa-gears fa-lg"></i>
        <span class="title">Administration</span>
        <span class="fa fa-angle-double-down fa-lg"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/eventcategories') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/eventcategories') }}">
                <i class="fa fa-angle-right"></i>
                Event Channels
            </a>
        </li>
       {{--<!--  <li {!! (Request::is('admin/eventcategories/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('admin/eventcategories/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New Eventcategory--}}
            {{--</a>--}}
        {{--</li> -->--}}
        <li {!! (Request::is('admin/subscription_and_credits') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/subscription_and_credits') }}">
                <i class="fa fa-angle-right"></i>
                Subscription & Credits
            </a>
        </li>
        <li {!! (Request::is('admin/billing_and_invoices') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/billing_and_invoices') }}">
                <i class="fa fa-angle-right"></i>
                Billing & Invoices
            </a>
        </li>
        <li {!! (Request::is('admin/bonuses_and_free_staff') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/bonuses_and_free_staff') }}">
                <i class="fa fa-angle-right"></i>
                Bonuses & Free Stuff
            </a>
        </li>
    </ul>
</li>
@if($user = Sentinel::getUser())
@if($userRoles = $user->roles()->lists('name')->first()=='Admin')
    <li >
        <a href="#">
            <i class="fa fa-gear fa-lg"></i>
            <span class="title">Site Administration</span>
            <span class="fa fa-angle-double-down fa-lg"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ route('create/user') }}">
                    <i class="fa fa-angle-right"></i>
                    Create user
                </a>
            </li>
            <li {!! (Request::is('admin/events') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/events') }}">
                    <i class="fa fa-angle-right"></i>
                    Events
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-angle-right"></i>
                    Credits
                </a>
            </li>
        </ul>
    </li>
@endif
@endif
</ul>