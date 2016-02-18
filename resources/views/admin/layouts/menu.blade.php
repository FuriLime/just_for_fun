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
</li><li {!! (Request::is('admin/usergroups') || Request::is('admin/usergroups/create') || Request::is('admin/usergroups/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Usergroups</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/usergroups') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/usergroups') }}">
                <i class="fa fa-angle-double-right"></i>
                usergroups
            </a>
        </li>
        <li {!! (Request::is('admin/usergroups/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/usergroups/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Usergroup
            </a>
        </li>
    </ul>
</li><li {!! (Request::is('admin/eventcategories') || Request::is('admin/eventcategories/create') || Request::is('admin/eventcategories/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Eventcategories</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/eventcategories') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/eventcategories') }}">
                <i class="fa fa-angle-double-right"></i>
                eventcategories
            </a>
        </li>
        <li {!! (Request::is('admin/eventcategories/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/eventcategories/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Eventcategory
            </a>
        </li>
    </ul>
</li>