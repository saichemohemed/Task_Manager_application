<x-app-layout>
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Dashboard</h6>
    </div>
    
        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
            @if (Auth::user()->Roles->name == 'Admin')
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-1 h-100">
                  <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                      <div>
                        <p class="fw-medium text-primary-light mb-1">Total ADMIN</p>
                        <h6 class="mb-0">{{ $admin }}</h6>
                      </div>
                      <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                      </div>
                    </div>
                  </div>
                </div><!-- card end -->
              </div>
              <div class="col">
                <div class="card shadow-none border bg-gradient-start-2 h-100">
                  <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                      <div>
                        <p class="fw-medium text-primary-light mb-1">Total USERS</p>
                        <h6 class="mb-0">{{ $users }}</h6>
                      </div>
                      <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                      </div>
                    </div>
                  </div>
                </div><!-- card end -->
              </div>
              <div class="col">
                <div class="card shadow-none border bg-gradient-start-3 h-100">
                  <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                      <div>
                        <p class="fw-medium text-primary-light mb-1">Total TASKS</p>
                        <h6 class="mb-0">{{ $tasks }}</h6>
                      </div>
                      <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                      </div>
                    </div>
    
                  </div>
                </div><!-- card end -->
              </div>
            @else
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-4 h-100">
                  <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                      <div>
                        <p class="fw-medium text-primary-light mb-1">MY TASKS</p>
                        <h6 class="mb-0">{{ $tasks_user }}</h6>
                      </div>
                      <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                      </div>
                    </div>
    
                    </div>
                    </div><!-- card end -->
                </div>
            @endif




        </div>
    

      </div>
    
</x-app-layout>