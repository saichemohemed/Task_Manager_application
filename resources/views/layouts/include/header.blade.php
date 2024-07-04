  <div class="navbar-header">
    <div class="row align-items-center justify-content-between">
      <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-4">
          <button type="button" class="sidebar-toggle">
            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
          </button>
          <button type="button" class="sidebar-mobile-toggle">
            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
          </button>

        </div>
      </div>
      <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-3">

          <div class="dropdown">
            <button class="d-flex justify-content-center align-items-center rounded-circle" type="button" data-bs-toggle="dropdown">
              <img src="{{ asset(Auth::user()->img_path.Auth::user()->img_name) }}" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
            </button>
            <div class="dropdown-menu to-top dropdown-menu-sm">
              <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                <div>
                  <h6 class="text-lg text-primary-light fw-semibold mb-2">{{ Auth::user()->first_name.' '.Auth::user()->last_name}}</h6>
                  <span class="text-secondary-light fw-medium text-sm">{{ Auth::user()->Roles->name}}</span>
                </div>
                <button type="button" class="hover-text-danger">
                  <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon> 
                </button>
              </div>
              <ul class="to-top-list">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <li>
                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"> 
                    <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  Log Out</a>
                  </li>
                </form>
              </ul>
            </div>
          </div><!-- Profile dropdown end -->
        </div>
      </div>
    </div>
  </div> 



