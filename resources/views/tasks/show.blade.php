<x-app-layout>


    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">View tasks</h6>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Tasks Info</h6>
                            <br><br>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Titel</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $task->titel }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Priority</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $task->Priorities->name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Progress</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $task->Progress->name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Start At </span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ strftime("%d %B %Y, %H:%M", strtotime($task->start_date)) }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Due Date</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ strftime("%d %B %Y, %H:%M", strtotime($task->due_date)) }}</span>
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
                                Edit Tasks 
                              </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">   
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <form method="POST" action="{{ route('tasks.update', $task->id) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Title <span class="text-danger-600">*</span></label>
                                              <span class="icon">
                                              </span>
                                              <input type="text" name="titel" class="form-control" placeholder="Enter Titel" value="{{ $task->titel }}" required>
                                          </div>
                                          
                                          <div class="col-md-6">
                                            <label class="form-label">Priority <span class="text-danger-600">*</span></label>
                                              <select name="priority" class="form-control radius-8 form-select" required>
                                                <option value="">Priority </option>
                                                @foreach( $priorities as $Priority)
                                                  <option value="{{ $Priority->id }}" @if($task->priority_id == $Priority->id) selected @endif>{{ $Priority->name }}</option>
                                                @endforeach
                                              </select>
                                          </div>
                        
                                          <div class="col-md-6">
                                            <label class="form-label">Progress <span class="text-danger-600">*</span></label>
                                              <select name="progress" class="form-control radius-8 form-select" required>
                                                <option value="">Progress</option>
                                                @foreach( $progress as $item)
                                                  <option value="{{ $item->id }}" @if( $task->progress_id == $item->id) selected @endif> {{ $item->name }}</option>
                                                @endforeach
                                                <li>
                                                  <a href="{{ Route('tasks.index') }}">Tasks List</a>
                                                </li>
                                              </select>
                                          </div>
                        
                                          <div class="col-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="datetime-local" name="start_date" class="form-control" value="{{ $task->start_date }}">
                                          </div>
                        
                                          <div class="col-6">
                                            <label class="form-label">Due Date <span class="text-danger-600">*</span></label>
                                            <input type="datetime-local" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
                                          </div>

                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-3 pt-3">
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
    </div>
    
</x-app-layout>
