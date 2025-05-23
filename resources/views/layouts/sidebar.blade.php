<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        @php
          use Illuminate\Support\Str; 
          $currentRoute = Route::currentRouteName();
          $permissionRoutes = [
            'Manajemen Berita' => ['route' => 'berita.staffIndex', 'icon' => 'bx bx-news', 'label' => 'Berita'],
            'Manajemen Tenant' => ['route' => 'tenant.staffIndex', 'icon' => 'bx bx-store', 'label' => 'Tenant'],
            'Manajemen Sewa Lahan' => ['route' => 'sewa.staffIndex', 'icon' => 'bx bx-map', 'label' => 'Sewa Lahan'],
            'Manajemen Perijinan Usaha' => ['route' => 'perijinan.staffIndex', 'icon' => 'bx bx-id-card', 'label' => 'Perijinan Usaha'],
            'Manajemen Pengiklanan' => ['route' => 'pengiklanan.staffIndex', 'icon' => 'bx bx-broadcast', 'label' => 'Pengiklanan'],
            'Manajemen Field Trip' => ['route' => 'fieldtrip.staffIndex', 'icon' => 'bx bx-walk', 'label' => 'Field Trip'],
            'Manajemen Laporan Keuangan' => ['route' => 'keuangan.staffIndex', 'icon' => 'bx bx-money', 'label' => 'Laporan Keuangan'],
            'Manajemen Slider' => ['route' => 'slider.staffIndex', 'icon' => 'bx bx-slider', 'label' => 'Slider'],
            'Manajemen Ajuan Informasi Publik' => ['route' => 'informasiPublik.staffIndex', 'icon' => 'bx bx-info-circle', 'label' => 'Informasi Publik'],
            'Manajemen Lalu Lintas Angkutan Udara' => ['route' => 'laluLintas.staffIndex', 'icon' => 'bx bxs-traffic', 'label' => 'Lalu Lintas Angkutan Udara'],
          ];
          $userRoutes = [
            'Ajukan Tenant' => ['route' => 'tenant.index', 'icon' => 'bx bx-store', 'label' => 'Ajukan Tenant'],
            'Ajukan Sewa Lahan' => ['route' => 'sewa.index', 'icon' => 'bx bx-map', 'label' => 'Ajukan Sewa Lahan'],
            'Ajukan Perijinan Usaha' => ['route' => 'perijinan.index', 'icon' => 'bx bx-id-card', 'label' => 'Ajukan Perijinan Usaha'],
            'Ajukan Pengiklanan' => ['route' => 'pengiklanan.index', 'icon' => 'bx bx-broadcast', 'label' => 'Ajukan Pengiklanan'],
            'Ajukan Field Trip' => ['route' => 'fieldtrip.index', 'icon' => 'bx bx-walk', 'label' => 'Ajukan Field Trip'],
          ];
        @endphp
        @php
          $user = auth()->user();
        @endphp
        <!-- Staff Sidebar -->
        @foreach ($permissionRoutes as $permissionName => $data)
          @if ($user->hasPermission($permissionName))
            <li class="{{ Str::startsWith($currentRoute, Str::before($data['route'], '.')) ? 'mm-active' : '' }}">
              <a href="{{ route($data['route']) }}" class="waves-effect d-flex align-items-center">
                <i class="{{ $data['icon'] }}"></i>
                <span>{{ $data['label'] }}</span>
              </a>
            </li>
          @endif
        @endforeach
        <!-- User Sidebar -->
        @foreach ($userRoutes as $permissionName => $data)
          @notadmin
            @notstaff
              <li class="{{ Str::startsWith($currentRoute, Str::before($data['route'], '.')) ? 'mm-active' : '' }}">
                <a href="{{ route($data['route']) }}" class="waves-effect">
                  <i class="{{ $data['icon'] }}"></i>
                  <span>{{ $data['label'] }}</span>
                </a>
              </li>
            @endnotstaff
          @endnotadmin
        @endforeach
        <!-- Admin Sidebar -->
        @admin
          <li>
            <a href="{{ route('root') }}" class="waves-effect">
              <i class="bx bx-home-circle"></i>
              <span key="t-contact">@lang('sidebar.dashboard')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('customers.*') ? 'mm-active' : '' }}">
            <a href="{{ route('customers.index') }}" class="waves-effect">
              <i class='bx bx-user'></i>
              <span key="t-contact">Pengguna</span>
            </a>
          </li>
          <li class="{{ request()->routeIs('roles.*') ? 'mm-active' : '' }}">
            <a href="{{ route('roles.index') }}" class="waves-effect">
              <i class='bx bx-user'></i>
              <span key="t-contact">Roles</span>
            </a>
          </li>

          <!-- <li class="{{ request()->routeIs('airlines.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airlines.index') }}" class="waves-effect">
              <i class='bx bx-globe'></i>
              <span key="t-contact">@lang('sidebar.airlines')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('planes.*') ? 'mm-active' : '' }}">
            <a href="{{ route('planes.index') }}" class="waves-effect">
              <i class='bx bxs-paper-plane'></i>
              <span key="t-contact">@lang('sidebar.planes')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('airports.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airports.index') }}" class="waves-effect">
              <i class='bx bx-buildings'></i>
              <span key="t-contact">@lang('sidebar.airports')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('flights.*') ? 'mm-active' : '' }}">
            <a href="{{ route('flights.index') }}" class="waves-effect">
              <i class='bx bxs-plane-alt'></i>
              <span key="t-contact">@lang('sidebar.flights')</span>
            </a>
          </li> -->

          {{-- tickets --}}
          <!-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->routeIs('tickets.*') ? 'mm-active' : '' }}">
              <i class="dripicons-ticket"></i>
              <span key="t-ecommerce">@lang('sidebar.tickets')</span>
            </a>
            <ul class="{{ request()->routeIs('tickets.*') ? 'sub-menu mm-collapse mm-show' : 'sub-menu' }}" aria-expanded="false">
              <li>
                <a href="{{ route('tickets.index') }}">All Tickets
                  <span class="badge rounded-pill bg-info float-end ticket-badge d-none" id="totalTickets"></span>
                </a>
              </li>
              <li>
                <a href="{{ route('tickets.index', ['status' => 'pending']) }}" class="{{ request()->get('status') == 'pending' ? 'active' : '' }}" key="t-products">Pending Tickets
                  <span class="badge rounded-pill bg-info float-end ticket-badge d-none" id="pendingTickets"></span>
                </a>
              </li>
              <li>
                <a href="{{ route('tickets.index', ['status' => 'approved']) }}" class="{{ request()->get('status') == 'approved' ? 'active' : '' }}" key="t-products">Approved Tickets
                  <span class="badge rounded-pill bg-info float-end ticket-badge d-none" id="approvedTickets"></span>
                </a>
              </li>
              <li>
                <a href="{{ route('tickets.index', ['status' => 'canceled']) }}" class="{{ request()->get('status') == 'canceled' ? 'active' : '' }}" key="t-products">Canceled Tickets
                  <span class="badge rounded-pill bg-info float-end ticket-badge d-none" id="canceledTickets"></span>
                </a>
              </li>
            </ul>
          </li> -->
        @else
          {{-- USER ROUTES  --}}
          <!-- <li>
            <a href="{{ route('profile') }}" class="waves-effect">
              <i class="bx bx-user-circle"></i>
              <span key="t-contact">@lang('sidebar.my_profile')</span>
            </a>
          </li> -->

          <!-- <li>
            <a href="{{ route('tickets.flights') }}" class="waves-effect">
              <i class="bx bx-credit-card"></i>
              <span>@lang('sidebar.book_ticket')</span>
            </a>
          </li>

          <li>
            <a href="{{ route('tickets.userTickets') }}" class="waves-effect">
              <i class="bx bx-credit-card"></i>
              <span>@lang('sidebar.my_tickets')</span>
            </a>
          </li> -->
        @endadmin

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->

@push('scripts')
  <script>
    $(document).ready(function() {
      getOrderStatusCount()
    });

    const getOrderStatusCount = () => {
      $.ajax({
        url: "{{ route('ticketStatusCount') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {
          // remove d-none class from the badge
          $('.ticket-badge').removeClass('d-none');

          $("#totalTickets").html(data.totalTickets);
          $("#pendingTickets").html(data.pendingTickets);
          $("#approvedTickets").html(data.approvedTickets);
          $("#canceledTickets").html(data.canceledTickets);
        }
      });
    }

  </script>
@endpush
