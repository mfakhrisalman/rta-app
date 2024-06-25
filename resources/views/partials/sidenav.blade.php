<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <div class="row mt-2">
            <div class="col s2 mt-2 pr-0 circle">
                <a href="#">
                    <img class="responsive-img circle hide-on-med-and-down" src="{{ asset('img/islam.png') }}" alt="">
                </a>
            </div>
            <div class="col s9">
                <a href="#">
                    <p class="m-0 hide-on-med-and-down">{{auth()->user()->name}}</p>
                </a>
                <p class="m-0 grey-text lighten-3 hide-on-med-and-down">{{auth()->user()->class}}</p>
            </div>
        </div>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        @unless(auth()->user()->can('guru'))
        <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('dashboard') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}" href="/dashboard">
                <i class="material-icons">dashboard</i>
                <span class="menu-title" data-i18n="Documentation">
                    Dashboard
                </span>
            </a>
        </li>
        @endunless
        @can('admin')
        <li class="{{ Request::is('siswa*')|| Request::is('pendaftar*') || Request::is('guru*') ? 'active bold' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan " href="#">
                <i class="material-icons">group</i>
                <span class="menu-title" data-i18n="Menu levels">Kelola Data</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="/guru" class="{{ Request::is('guru*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Data Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="/siswa" class="{{ Request::is('siswa*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pendaftar" class="{{ Request::is('pendaftar*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Data Pendaftar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endcan
        <li class="{{ Request::is('kelas*')|| Request::is('buat-jadwal*') ||Request::is('daftar-pendaftar-ujian*') || Request::is('setoran')|| Request::is('riwayat') ? 'active bold' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan " href="#">
                <i class="material-icons">school</i>
                <span class="menu-title" data-i18n="Menu levels">Akademik</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @can('admin')
                    <li>
                        <a href="/kelas" class="{{ Request::is('kelas*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Jadwal Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level child">Jadwal Ujian</span>
                        </a>
                        <div class="collapsible-body">
                          <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <a href="/buat-jadwal" class="{{ Request::is('buat-jadwal*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span data-i18n="Third level">Buat Jadwal</span>
                                </a>
                            </li>
                          </ul>
                          <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <a href="/daftar-pendaftar-ujian" class="{{ Request::is('daftar-pendaftar-ujian*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span data-i18n="Third level">Daftar Pendaftar Ujian</span>
                                </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    @endcan
                    @can('guru')
                    <li>
                        <a href="/setoran" class="{{ Request::is('setoran*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Setoran Hafalan</span>
                        </a>
                    </li>
                    @endcan
                    @can('siswa')
                    <li>
                        <a href="/riwayat" class="{{ Request::is('riwayat*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Riwayat Hafalan</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @unless(auth()->user()->can('guru'))
        <li class="{{ Request::is('tagihan*')|| Request::is('pembayaran*')|| Request::is('bayar-spp*') ? 'active bold' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan " href="#">
                <i class="material-icons">payment</i>
                <span class="menu-title" data-i18n="Menu levels">Pembayaran</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @can('admin')
                    <li>
                        <a href="/tagihan" class="{{ Request::is('tagihan*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Tagihan SPP</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pembayaran" class="{{ Request::is('pembayaran*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Pembayaran SPP</span></a>
                    </li>
                    @endcan
                    @can('siswa')
                    <li>
                        <a href="/pembayaran" class="{{ Request::is('pembayaran*')|| Request::is('bayar-spp*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Second level">Tagihan SPP</span></a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endunless
        @can('admin')
        <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('donasi*') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}" href="/donasi">
                <i class="material-icons">card_giftcard</i>
                <span class="menu-title" data-i18n="Documentation">Donasi</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('kritiksaran') ? 'active gradient-shadow gradient-45deg-blue-grey-blue' : '' }}" href="/kritiksaran">
                <i class="material-icons">insert_comment</i>
                <span class="menu-title" data-i18n="Documentation">Kritik & Saran</span>
            </a>
        </li>
        @endcan        
        <li class="center-align" style="position: absolute;bottom: 50px; text-align: center;width: 100%">
            <img src="{{ asset('img/Logo.png') }}" class="responsive-img " alt="">
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>