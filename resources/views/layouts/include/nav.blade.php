<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="index.html" class="sidebar-logo">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="site logo" class="light-logo">
      <img src="{{ asset('assets/images/logo/logo-light.png') }}" alt="site logo" class="dark-logo">
      <img src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li>
        <a href="{{ Route('dashboard.index') }}">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->Roles->name == 'Admin')
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
          <span>Users</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ Route('user.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
          </li>
          <li>
            <a href="{{ Route('user.create') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add User</a>
          </li>
        </ul>
      </li>
      @endif
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
          <span>Tasks</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ Route('tasks.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Tasks List</a>
          </li>
          <li>
            <a href="{{ Route('tasks.create') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add Tasks</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>