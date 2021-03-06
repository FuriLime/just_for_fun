@extends('layouts/default')

{{-- Page title --}}
@section('title')
Price
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/price.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jQueryUI/jquery-ui.css') }}">
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <div class="business-plan-block">
        <div class="container">
            <div class="row">
                <div class="text-center" id="prices-page">
                    <span class="slide-head">Flexible plans with no surprises</span>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="text-center col-xs-4 col-xs-offset-4">
                        <span class="slide-text ">Whether you’re a business or an individual,there’s an EventFellows plan for you.Or simply start with our Free Plan.</span>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 ui-slider">
                    <div class="monthly">
                        Monthly
                    </div>
                    <div class="ui-slider-container">
                        <div id="slider"></div>
                    </div>
                    <div class="yearly">
                        Yearly
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 businesses">
                    <div class="text-center">
                        <div class="plans-for">Plans for</div>
                        <span class="slide-head title-popover" data-container="body" data-toggle="popover" data-placement="right" data-content="These plans are made to support professional event inviations also for private events at an affordable price." data-original-title="Plans for Businesses">Businesses</span>
                    </div>
                </div>
                <div class="business-plan-holder">
                    <div class="col-md-3 col-sm-6 col-xs-12 business-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="price-panel-badge price-panel-badge-orange">For you?</div>
                            <div class="panel-heading">
                                <div class="price-panel-title">Startup / Freelancer</div>
                                <div class="price-panel-price">38&euro;</div>
                                <div class="price-panel-sub-title">Forever Free</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for testing</div>
                                <ul>
                                    <li>
                                        10 Events / 500 Downloads
                                    </li>
                                    <li>
                                        Basic Event Features
                                    </li>
                                    <li>
                                        Personal EventPage
                                    </li>
                                    <li>
                                        Event Dashboard
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 business-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="panel-heading">
                                <div class="price-panel-title">SME</div>
                                <div class="price-panel-price">87&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for small groups</div>
                                <ul>
                                    <li>
                                        All from "FREE"
                                    </li>
                                    <li>
                                        + Social Sharing
                                    </li>
                                    <li>
                                        + Basic Tracking
                                    </li>
                                    <li>
                                        + Email Support
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 business-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="price-panel-badge price-panel-badge-blue">Great Value</div>
                            <div class="panel-heading">
                                <div class="price-panel-title">Company</div>
                                <div class="price-panel-price">140&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for ...</div>
                                <ul>
                                    <li>
                                        All from "Lite"
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 business-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="panel-heading">
                                <div class="price-panel-title">Enterprise</div>
                                <div class="price-panel-price">489&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for ...</div>
                                <ul>
                                    <li>
                                        All from "Standart"
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 help-text">
                    All plans can be upgraded, downgraded or canceled at any time.
                </div>
            </div>
        </div>
    </div>
    <div class="individual-plans-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="individual-plans-block-sup-title">Plans for</div>
                    <div class="individual-plans-block-title">
                        <span class="title-popover" data-container="body" data-toggle="popover" data-placement="right" data-content="These plans are made to support professional event inviations also for private events at an affordable price." data-original-title="Plans for Businesses">Individuals</span>
                    </div>
                </div>
                <div class="individual-plan-holder">
                    <div class="col-md-3 col-sm-6 col-xs-12 individual-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="price-panel-badge price-panel-badge-orange">Great Start</div>
                            <div class="panel-heading">
                                <div class="price-panel-title">FREE</div>
                                <div class="price-panel-price">0&euro;</div>
                                <div class="price-panel-sub-title">Forever Free</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for testing</div>
                                <ul>
                                    <li>
                                        3 events
                                    </li>
                                    <li>
                                        50 Event Downloads
                                    </li>
                                    <li>
                                        Basic Event Features
                                    </li>
                                    <li>
                                        Personal EventPage
                                    </li>
                                    <li>
                                        Event Dashboard
                                    </li>
                                    <li>
                                        No Credit Card
                                    </li>
                                </ul>
                                <a class="btn btn-warning btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">
                                    <i class="fa fa-user"></i>
                                    FREE Signup
                                </a>
                                <div class="price-panel-help-text">
                                    You can change or cancel your subscription at any time!
                                </div>
                                <a href="#" class="price-panel-link">Questions?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 individual-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="panel-heading">
                                <div class="price-panel-title">Lite</div>
                                <div class="price-panel-price">7&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for small groups</div>
                                <ul>
                                    <li>
                                        All from "FREE"
                                    </li>
                                    <li>
                                        + Social Sharing
                                    </li>
                                    <li>
                                        + Basic Tracking
                                    </li>
                                    <li>
                                        + Email Support
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 individual-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="price-panel-badge price-panel-badge-blue">Most popular</div>
                            <div class="panel-heading">
                                <div class="price-panel-title">Standart</div>
                                <div class="price-panel-price">18&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for ...</div>
                                <ul>
                                    <li>
                                        All from "Lite"
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 individual-plan-panel-holder">
                        <div class="panel panel-default price-panel">
                            <div class="panel-heading">
                                <div class="price-panel-title">Proffesional</div>
                                <div class="price-panel-price">49&euro;</div>
                                <div class="price-panel-sub-title">Paid Monthly</div>
                            </div>
                            <div class="panel-body">
                                <div class="price-panel-body-heading">Ideal for ...</div>
                                <ul>
                                    <li>
                                        All from "Standart"
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                    <li>
                                        + ...
                                    </li>
                                </ul>
                                <a class="btn btn-primary btn-block price-btn" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="We will not charge you card before the end your trial period!" data-original-title="Try 100% risk-free">Start 14-day trial</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 help-text">
                    All plans can be upgraded, downgraded or canceled at any time.
                </div>
            </div>
        </div>
    </div>
    <div class="commonly-questions-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="commonly-questions-block-title">
                        <span class="title-popover" data-container="body" data-toggle="popover" data-placement="right" data-content="These plans are made to support professional event inviations also for private events at an affordable price." data-original-title="Plans for Businesses">Commonly asked questions</span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Donec lacinia erat tellus, in dictum neque lobortis id. Nullam congue nec mauris ac tempor.
                        In sit amet nisi facilisis, sollicitudin tortor in, ultricies massa.
                        In viverra lacus in vestibulum hendrerit. Donec non felis tristique, commodo lorem vitae,
                        porta diam. Donec facilisis orci non quam varius, eget hendrerit purus scelerisque.
                        Nulla in viverra ex, vitae pharetra dui. Integer risus ipsum, hendrerit non lacus ac,
                        venenatis feugiat arcu. Integer diam nisi, ullamcorper eget nunc auctor,
                        luctus ullamcorper eros. Proin vitae urna congue, iaculis massa sit amet, auctor purus.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Phasellus vitae arcu id nisi tincidunt semper et ut elit. Fusce tempor tristique mi at tempor.
                        Suspendisse dignissim leo lectus. Vivamus interdum dictum nisi in imperdiet.
                        In sit amet nisi facilisis, sollicitudin tortor in, ultricies massa.
                        In viverra lacus in vestibulum hendrerit. Donec non felis tristique, commodo lorem vitae,
                        porta diam. Donec facilisis orci non quam varius, eget hendrerit purus scelerisque.
                        Nulla in viverra ex, vitae pharetra dui. Integer risus ipsum, hendrerit non lacus ac,
                        venenatis feugiat arcu. Integer diam nisi, ullamcorper eget nunc auctor,
                        luctus ullamcorper eros. Proin vitae urna congue, iaculis massa sit amet, auctor purus.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Donec lacinia erat tellus, in dictum neque lobortis id. Nullam congue nec mauris ac tempor.
                        Phasellus vitae arcu id nisi tincidunt semper et ut elit. Fusce tempor tristique mi at tempor.
                        Suspendisse dignissim leo lectus. Vivamus interdum dictum nisi in imperdiet.
                        In sit amet nisi facilisis, sollicitudin tortor in, ultricies massa.
                        Nulla in viverra ex, vitae pharetra dui. Integer risus ipsum, hendrerit non lacus ac,
                        venenatis feugiat arcu. Integer diam nisi, ullamcorper eget nunc auctor,
                        luctus ullamcorper eros. Proin vitae urna congue, iaculis massa sit amet, auctor purus.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Suspendisse dignissim leo lectus. Vivamus interdum dictum nisi in imperdiet.
                        In sit amet nisi facilisis, sollicitudin tortor in, ultricies massa.
                        In viverra lacus in vestibulum hendrerit. Donec non felis tristique, commodo lorem vitae,
                        porta diam. Donec facilisis orci non quam varius, eget hendrerit purus scelerisque.
                        Nulla in viverra ex, vitae pharetra dui. Integer risus ipsum, hendrerit non lacus ac,
                        venenatis feugiat arcu. Integer diam nisi, ullamcorper eget nunc auctor,
                        luctus ullamcorper eros. Proin vitae urna congue, iaculis massa sit amet, auctor purus.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Donec lacinia erat tellus, in dictum neque lobortis id. Nullam congue nec mauris ac tempor.
                        Phasellus vitae arcu id nisi tincidunt semper et ut elit. Fusce tempor tristique mi at tempor.
                        Suspendisse dignissim leo lectus. Vivamus interdum dictum nisi in imperdiet.
                        In sit amet nisi facilisis, sollicitudin tortor in, ultricies massa.
                        In viverra lacus in vestibulum hendrerit. Donec non felis tristique, commodo lorem vitae,
                        porta diam. Donec facilisis orci non quam varius, eget hendrerit purus scelerisque.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        Donec lacinia erat tellus, in dictum neque lobortis id. Nullam congue nec mauris ac tempor.
                        Phasellus vitae arcu id nisi tincidunt semper et ut elit. Fusce tempor tristique mi at tempor.
                    </div>
                    <div class="question-title">
                        Is your free plan really free?
                    </div>
                    <div class="question-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla cursus,
                        metus quis rhoncus sodales, nunc eros luctus diam, auctor imperdiet tortor lacus elementum dui.
                        In viverra lacus in vestibulum hendrerit. Donec non felis tristique, commodo lorem vitae,
                        porta diam. Donec facilisis orci non quam varius, eget hendrerit purus scelerisque.
                        Nulla in viverra ex, vitae pharetra dui. Integer risus ipsum, hendrerit non lacus ac,
                        venenatis feugiat arcu. Integer diam nisi, ullamcorper eget nunc auctor,
                        luctus ullamcorper eros. Proin vitae urna congue, iaculis massa sit amet, auctor purus.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature-comparison-block">
        <div class="container">
            <div class="feature-comparison-block-title">
                <span class="title-popover" data-container="body" data-toggle="popover" data-placement="right" data-content="These plans are made to support professional event inviations also for private events at an affordable price." data-original-title="Plans for Businesses">Feature comparison</span>
            </div>
            <div class="table-responsive">
                <table class="table feature-comparison-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <div class="table-plan-title">Lite</div>
                                <a href="#" class="btn price-table-btn">Try</a>
                            </th>
                            <th>
                                <div class="table-plan-title">Basic</div>
                                <a href="#" class="btn price-table-btn">Try</a>
                            </th>
                            <th class="th-colored">
                                <div class="table-plan-title">Advanced</div>
                                <a href="#" class="btn price-table-btn">Try</a>
                            </th>
                            <th>
                                <div class="table-plan-title">Premium</div>
                                <a href="#" class="btn price-table-btn">Try</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><strong>PRICING</strong></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Monthly pricing (billing annually)</th>
                            <td>Free</td>
                            <td>$11.20 USD per month/agent</td>
                            <td>$20.00 USD per month/agent</td>
                            <td>$44.00 USD per month/agent</td>
                        </tr>
                        <tr>
                            <th scope="row">Monthly pricing (billing annually)</th>
                            <td>Free</td>
                            <td>$14.00 USD per month/agent</td>
                            <td>$25.00 USD per month/agent</td>
                            <td>$55.00 USD per month/agent</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Agents</th>
                            <td class="td-colored">only 1</td>
                            <td class="td-colored">Unlimited</td>
                            <td class="td-colored">Unlimited</td>
                            <td class="td-colored">Unlimited</td>
                        </tr>
                        <tr>
                            <th scope="row"><strong>SUPPORT</strong></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Email support</th>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Setup Assistance</th>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Knowledge base</th>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Live chat support</th>
                            <td>only 24x5</td>
                            <td>only 24x5</td>
                            <td>only 24x5</td>
                            <td>24x7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
        var width = window.innerWidth;
        if (width >= 768) {
            var height = Math.max($(".individual-plan-holder").height());
            $(".individual-plan-holder").height(height);
        }

        function wheretoplace(){
            var width = window.innerWidth;
            if (width <= 900) {
                return 'left';
            } else {
                return 'right';
            }
        }
        $('.price-btn').popover({
            trigger: "hover"

        });
        $('.title-popover').popover({
            trigger: "hover",
            placement: wheretoplace
        });
        var check = false;
        $("#slider").slider({
            max: 1,
            min: 0
        });
        //$("selector").slider();
        $("#slider").mousedown(function () {
            check = true
        });
        $(".ui-slider-container").mousedown(function () {
            if (check == false) {
                if ($("#slider").slider('value') == 0) {
                    $("#slider").slider('value', 1);
                } else {
                    $("#slider").slider('value', 0);
                }
            } else {
                check = false;
            }
            ;
        });
    </script>
@stop
