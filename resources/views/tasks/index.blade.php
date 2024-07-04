<x-app-layout>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- tasks css -->
    <link rel="stylesheet" href="{{ asset('assets/css/tasks.css') }}">

    <div class="row d-flex justify-content-center container">
        <div class="col-md-12">
            <div class="card-hover-shadow-2x mb-3 card">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <p>{{ $message }}</p>
                </div>
                @endif

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
                                                    @if(Auth::user()->Roles->name == 'Admin')
                                                    <div class="badge badge-danger ml-5">
                                                        <p class="text-primary-900"><b>User: </b>
                                                            @foreach( $task->users as  $index => $user)
                                                            {{ $user->first_name .' '. $user->last_name }}
                                                                @if ($index < count($task->users) - 1) ; @endif                                                            
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    @endif
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


</x-app-layout>
