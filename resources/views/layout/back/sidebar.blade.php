<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">EtnaPraya</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">EtnaPraya</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="nav-item dropdown">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-fire mr-2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Transaksi</li>
            <?php
            $special_menu = [
                [
                    'name' => 'Voucher & Promo',
                    'data' => []
                ]
            ]
            ?>
            @foreach(Auth::user()->getDaftarRoleMenu() as $menu)
                @if(Route::has($menu->route_prefix_menu . 'index') )
                    @if($menu->nama_tampilan_menu === 'Voucher' || $menu->nama_tampilan_menu === 'Promo Produk')
                        -Merge Menu to new menu with dropdown
                            <?php
                            array_push($special_menu[0]['data'], json_decode($menu))
                            ?>
                    @else
                        <li class="nav-item">
                            <a href="{{ route($menu->route_prefix_menu . 'index') }}" class="nav-link">
                                <i class="{{ $menu->icon_menu }} mr-2"></i>
                                <span>{{ $menu->nama_tampilan_menu }}</span>
                            </a>
                        </li>
                    @endif
                @endif
            @endforeach
            @foreach($special_menu as $sm)
                @if(!empty($sm['data']))
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-ad mr-2"></i>
                            <span>{{$sm['name']}}</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                @foreach($sm['data'] as $menu)
                                    <a href="{{ route($menu->route_prefix_menu . 'index') }}" class="nav-link">
                                        <i class="{{ $menu->icon_menu }} mr-2"></i>
                                        <span>{{ $menu->nama_tampilan_menu }}</span>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                @endif
            @endforeach

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split" onclick="logout()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>


@push('js')

@endpush
