<li {!! (Request::is('admin/events') || Request::is('admin/events/create') || Request::is('admin/events/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Events</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/events') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/events') }}">
                <i class="fa fa-angle-double-right"></i>
                events
            </a>
        </li>
        <li {!! (Request::is('admin/events/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/events/create') }}">
                <i class="fa fa-angle-double-right"></i>
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

<li {!! (Request::is('admin/eventcategories') || Request::is('admin/eventcategories/create') || Request::is('admin/eventcategories/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Administration</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/eventcategories') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/eventcategories') }}">
                <i class="fa fa-angle-double-right"></i>
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
                <i class="fa fa-angle-double-right"></i>
                Subscription & Credits
            </a>
        </li>
        <li {!! (Request::is('admin/billing_and_invoices') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/billing_and_invoices') }}">
                <i class="fa fa-angle-double-right"></i>
                Billing & Invoices
            </a>
        </li>
        <li {!! (Request::is('admin/bonuses_and_free_staff') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/bonuses_and_free_staff') }}">
                <i class="fa fa-angle-double-right"></i>
                Bonuses & Free Stuff
            </a>
        </li>
    </ul>
</li>
<div style="display:none">
{{$user = Sentinel::getUser()}}
{{$userRoles = $user->roles()->lists('name')->first()}}
    </div>
@if($userRoles =='admin')
    <li >
        <a href="#">
            <i class="livicon" data-name="gear" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Site Administration</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/events') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/events') }}">
                    <i class="fa fa-angle-double-right"></i>
                    events
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-angle-double-right"></i>
                    Credits
                </a>
            </li>
        </ul>
    </li>
@endif