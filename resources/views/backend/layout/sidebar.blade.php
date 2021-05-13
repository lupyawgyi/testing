<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="/home" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard Example 1
                    </a>
                </li>
                <li class="app-sidebar__heading">UI Components</li>
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyRole('Super User','IT'))

                    <li


                    >
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Admin Area
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul @if(explode('/',trim(request()->path()))[0] ==  'backend') class="{{'backend' == explode('/',trim(request()->path()))[0] ? 'mm-show' : ''}}"
                            @endif>
                            <li>
                                <a href="{{route('user')}}" @if(explode('/',trim(request()->path()))[0] ==  'backend')
                                class="{{'users' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"
                                    @endif>
                                    <i class="metismenu-icon"></i>
                                    User
                                </a>
                            </li>
                            <li>
                                <a href="{{route('role')}}" @if(explode('/',trim(request()->path()))[0] ==  'backend')
                                class="{{'roles' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"
                                    @endif>
                                    <i class="metismenu-icon">
                                    </i>Roles
                                </a>
                            </li>
                            <li>
                                <a href="/backend/permissions/index"
                                   @if(explode('/',trim(request()->path()))[0] ==  'backend')
                                   class="{{'permissions' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"
                                    @endif>
                                    <i class="metismenu-icon">
                                    </i>Permissions
                                </a>
                            </li>
                            <li>
                                <a href="{{route('region')}}" @if(explode('/',trim(request()->path()))[0] ==  'backend')
                                class="{{'regions' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"
                                    @endif>
                                    <i class="metismenu-icon ">
                                    </i>Regions
                                </a>
                            </li>
                            <li>
                                <a href="{{route('branches')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'backend')
                                   class="{{'branches' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"
                                    @endif>
                                    <i class="metismenu-icon">
                                    </i>Branches
                                </a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="{{route('errors')}}" @if(explode('/',trim(request()->path()))[0] ==  'backend')--}}
                            {{--                                class="{{'errors' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}"--}}
                            {{--                                    @endif>--}}
                            {{--                                    <i class="metismenu-icon">--}}
                            {{--                                    </i>Request Name--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </li>
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('ticket_index'))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-car"></i>
                            Ticket
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul @if(explode('/',trim(request()->path()))[0] ==  'request') class="{{'request' == explode('/',trim(request()->path()))[0] ? 'mm-show' : ''}}"
                            @endif>
                            <li>
                                <a href="{{route('allrequest')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'request')
                                   class="{{'all' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>All Request
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('portfolio_index'))

                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-car"></i>
                            Musoni Report
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul @if(explode('/',trim(request()->path()))[0] ==  'musoni') class="{{'musoni' == explode('/',trim(request()->path()))[0] ? 'mm-show' : ''}}"
                            @endif>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('file_import'))
                                <li>
                                    <a href="{{route('saving-daily')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'savingtransaction' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Saving Transaction File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('disburse-daily')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'dailydisburse' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Daily Disbursed File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('repayment-detail')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'dailyrepayment' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Daily Repayment File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('expect-detail')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'expectdetail' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Expect Detail File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('portfolio')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'portfolio' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Portfolio File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('outstanding')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'outstanding' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import Outstanding File
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('exportschedule')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'dataexportschedule' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Import DataExport schedule
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('portfolio.index')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                   class="{{'portfolio' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>Branch Portfolio
                                </a>
                            </li>
                                <li>
                                    <a href="{{route('daily_confirm_index')}}"
                                       @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                       class="{{'dailyConfirm' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}" @endif>
                                        <i class="metismenu-icon">
                                        </i>Daily Confirm
                                    </a>
                                </li>

                        </ul>
                    </li>
                @endif

                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('collection_onethirty_index'))

                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-car"></i>
                            Collection Officer
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul @if(explode('/',trim(request()->path()))[0] ==  'musoni') class="{{'musoni' == explode('/',trim(request()->path()))[0] ? 'mm-show' : ''}}"
                            @endif>
                            <li>
                                <a href="{{route('search.client')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                   class="{{'clientDetail' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>Search Client
                                </a>
                            </li>
                            <li>
                                <a href="{{route('musoni.search')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                   class="{{'search' == explode('/',trim(request()->path()))[1] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>Search Loan
                                </a>
                            </li>
                            <li>
                                <a href="{{route('collection.index')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                   class="{{'ontime' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>On Time Area
                                </a>
                            </li>

                            <li>
                                <a href="{{route('onetothirty.index')}}"
                                   @if(explode('/',trim(request()->path()))[0] ==  'musoni')
                                   class="{{'oneThirty' == explode('/',trim(request()->path()))[2] ? 'mm-active' : ''}}" @endif>
                                    <i class="metismenu-icon">
                                    </i>Active Borrower
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>
