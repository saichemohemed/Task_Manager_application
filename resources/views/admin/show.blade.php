<x-app-layout>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- tasks css -->
    <link rel="stylesheet" href="{{ asset('assets/css/tasks.css') }}">

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">View User</h6>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Oups !</strong> There were problems with your entry.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                        <br><br><br><br>
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset($user->img_path.$user->img_name) }}" alt="" class="border br-white border-width-2-px w200-px h-200-px rounded-circle object-fit-cover">
                            <h6 class="mb-0 mt-16">{{ $user->first_name. ' ' . $user->last_name }} Jones</h6>
                            <span class="text-secondary-light mb-16">{{ $user->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Personal Info</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">First Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->first_name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Last Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->last_name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->email }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Phone Number</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->phone }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Status</span>
                                    <span class="w-70 text-secondary-light fw-medium">: @if($user->active == 1) Active @else Inactive @endif</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Join Date</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ strftime("%d %B %Y, %H:%M", strtotime($user->created_at)) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab" aria-controls="pills-edit-profile" aria-selected="true">
                                Edit Profile 
                              </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">   
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                                <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Upload Image Start -->
                                    <div class="mb-24 mt-16">
                                        <div class="avatar-upload">
                                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                                    <input type="file" id="imageUpload" name="image" accept=".png, .jpg, .jpeg" hidden>
                                                    <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                        <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                                    </label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Upload Image End -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="first_name" class="form-label fw-semibold text-primary-light text-sm mb-8">First Name <span class="text-danger-600">*</span></label>
                                                <input type="text" class="form-control radius-8" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="Enter First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="last_name" class="form-label fw-semibold text-primary-light text-sm mb-8">Last Name <span class="text-danger-600">*</span></label>
                                                <input type="text" class="form-control radius-8" id="last_name" name="last_name" value="{{$user->last_name}}" placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                                <input type="email" class="form-control radius-8" id="email" name="email" value="{{$user->email}}" placeholder="Enter email address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="phone" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone</label>
                                                <input type="text" class="form-control radius-8" id="phone" name="phone" value="{{$user->phone}}"  placeholder="Enter phone number">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8"> 
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"> 
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="container user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">

                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <iconify-icon icon="lucide:menu" class="menu-icon"></iconify-icon>&nbsp;Task Lists
                    </div>
                </div>

                <div class="scroll-area-sm">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                @foreach( $tasks as $task)
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-{{ $task->Priorities->color }}"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            
                                            <div class="widget-content-left">
                                                <div class="widget-heading">{{ $task->titel }}
                                                    <div class="badge badge-{{ $task->Priorities->color }} ml-5">
                                                        <span class="bg-{{ $task->Priorities->color }}-focus text-{{ $task->Priorities->color }}-600 border border-{{ $task->Priorities->color }}-main px-24 py-4 radius-4 fw-medium text-sm">{{ $task->Priorities->name }}</span>
                                                    </div>
                                                    <div class="badge badge-{{ $task->Priorities->color }} ml-5">
                                                        <span class="bg-{{ $task->Progress->color }}-focus text-{{ $task->Progress->color }}-600 border border-{{ $task->Progress->color }}-main px-24 py-4 radius-4 fw-medium text-sm">{{ $task->Progress->name }}</span>
                                                    </div>
                                                    <div class="badge badge-danger ml-5">
                                                        <span class="text-primary-900"><b>Start At : </b>{{ strftime("%d %B %Y, %H:%M", strtotime($task->start_date))}}</span>
                                                    </div>
                                                    <div class="badge badge-danger ml-5">
                                                        <p class="text-primary-900"><b>Due Date : </b>{{ strftime("%d %B %Y, %H:%M", strtotime($task->due_date)) }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="widget-content-right">
                                                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                                        <a class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" href="{{ route('tasks.show',$task->id) }}">
                                                            <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                                        </a>
                                                        <a class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" href="{{ route('tasks.edit',$task->id) }}">
                                                            <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                <div class="card-footer d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Showing {{ $tasks->firstItem() }}  to  {{ $tasks->lastItem() }} of {{ $tasks->total() }} entries</span>
                    {{  $tasks->withQueryString()->links()  }}
                </div>

            </div>
        </div>

    </div>
    <script>
        // ======================== Upload Image Start =====================
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        // ======================== Upload Image End =====================
    
    </script>
    
</x-app-layout>
