<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav
            class="navbar-main navbar-color nav-collapsible sideNav-lock no-shadow" style="background-color: #1767A7;">
            <div class="nav-wrapper">
                <div class="header-search-wrapper hide-on-med-and-down">
                    <input class="header-search-input z-depth-2" type="text" placeholder="as-salāmu ʿalaykum wa-raḥmatu -llāhi wa-barakātuh, Ahlan wa sahlan bi hudluurikum." readonly disabled>
                </div>
                <ul class="navbar-list right">
                    {{-- untuk toggle-fullscreen --}}
                    <li class="hide-on-med-and-down">
                        <a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);">
                            <i class="material-icons">settings_overscan</i>
                        </a>
                    </li>
                    <li class="">
                        <a class="waves-effect waves-block waves-light" href="{{ route('password.change') }}">
                            <i class="material-icons">
                                <img src="{{ asset('img/secure.png') }}" alt="Mengubah Password" width="27" style="justify-content: center;align-items: center; padding-top:15px">
                            </i>
                        </a>
                    </li>
                    <li class="">
                    <form action="/logout" method="post">
                        @csrf
                        <button class=" btn-floating mb-1 btn-large btn-flat waves-effect waves-light ">
                            <i class="material-icons">exit_to_app</i>
                        </button>
                    </form>
                    </li>
                </ul>
                {{-- <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new
                            order has been placed!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours
                            ago</time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days
                            ago</time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle teal small">settings</span> Settings
                            updated</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days
                            ago</time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle deep-orange small">today</span> Director
                            meeting started</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days
                            ago</time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle amber small">trending_up</span> Generate
                            monthly report</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week
                            ago</time>
                    </li>
                </ul> --}}
            </div>
        </nav>
    </div>
</header>