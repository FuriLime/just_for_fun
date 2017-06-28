{{--<li {!! (Request::is('user/events') || Request::is('user/events/create') || Request::is('user/events/*') ? 'class="active"' : '') !!}>--}}
    {{--<a href="#">--}}
        {{--<i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--}}
        {{--<span class="title">Events</span>--}}
        {{--<span class="fa arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li {!! (Request::is('user/events') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/events') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--events--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li {!! (Request::is('user/events/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/events/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New Event--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--<!-- <li {!! (Request::is('user/usergroups') || Request::is('user/usergroups/create') || Request::is('user/usergroups/*') ? 'class="active"' : '') !!}>--}}
    {{--<a href="#">--}}
        {{--<i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--}}
        {{--<span class="title">Usergroups</span>--}}
        {{--<span class="fa arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li {!! (Request::is('user/usergroups') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/usergroups') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--usergroups--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li {!! (Request::is('user/usergroups/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/usergroups/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New Usergroup--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li> -->--}}

{{--<li {!! (Request::is('user/eventcategories') || Request::is('user/eventcategories/create') || Request::is('user/eventcategories/*') ? 'class="active"' : '') !!}>--}}
    {{--<a href="#">--}}
        {{--<i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--}}
        {{--<span class="title">Administration</span>--}}
        {{--<span class="fa arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li {!! (Request::is('user/eventcategories') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/eventcategories') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Event Channels--}}
            {{--</a>--}}
        {{--</li>--}}
       {{--<!--  <li {!! (Request::is('user/eventcategories/create') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/eventcategories/create') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Add New Eventcategory--}}
            {{--</a>--}}
        {{--</li> -->--}}
        {{--<li {!! (Request::is('user/subscription_and_credits') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/subscription_and_credits') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Subscription & Credits --}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li {!! (Request::is('user/billing_and_invoices') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/billing_and_invoices') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Billing & Invoices --}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li {!! (Request::is('user/bonuses_and_free_stuff') ? 'class="active" id="active"' : '') !!}>--}}
            {{--<a href="{{ URL::to('user/bonuses_and_free_stuff') }}">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Bonuses & Free Stuff --}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}

{{--<li >--}}
    {{--<a href="#">--}}
        {{--<i class="livicon" data-name="gear" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--}}
        {{--<span class="title">Site Administration</span>--}}
        {{--<span class="fa arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li>--}}
            {{--<a href="">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Users--}}
            {{--</a>--}}
            {{--<a href="">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Events--}}
            {{--</a>--}}
            {{--<a href="">--}}
                {{--<i class="fa fa-angle-double-right"></i>--}}
                {{--Credits--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@if(Sentinel::inRole('admin'))--}}
{{--@endif--}}