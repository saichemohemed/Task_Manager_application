
<x-app-layout>

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">Tasks</h6>
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

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Create Task</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('tasks.store') }}" class="row gy-3 needs-validation">
                    @csrf

                  <div class="col-md-12">
                    <label class="form-label">Title <span class="text-danger-600">*</span></label>
                      <span class="icon">
                      </span>
                      <input type="text" name="titel" class="form-control" placeholder="Enter Titel" value="{{old('titel')}}" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-label">Priority <span class="text-danger-600">*</span></label>
                      <select name="priority" class="form-control radius-8 form-select" required>
                        <option value="" disabled>Priority </option>
                        @foreach( $priorities as $Priority)
                          <option value="{{ $Priority->id }}" @if(old('priority') == $Priority->id) selected @endif>{{ $Priority->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Progress <span class="text-danger-600">*</span></label>
                      <select name="progress" class="form-control radius-8 form-select" required>
                        <option value="" disabled>Progress</option>
                        @foreach( $progress as $item)
                          <option value="{{ $item->id }}" @if(old('progress') == $item->id) selected @endif> {{ $item->name }}</option>
                        @endforeach
                        <li>
                          <a href="{{ Route('tasks.index') }}">Tasks List</a>
                        </li>
                      </select>
                  </div>

                  <div class="col-6">
                    <label class="form-label">Start Date</label>
                    <input type="datetime-local" name="start_date" class="form-control" value="{{old('start_date')}}">
                  </div>

                  <div class="col-6">
                    <label class="form-label">Due Date <span class="text-danger-600">*</span></label>
                    <input type="datetime-local" name="due_date" class="form-control" value="{{old('due_date')}}" required>
                  </div>

                  @if(Auth::user()->Roles->name == 'Admin')
                  {{-- 
                      I have a problem in design with this select multiple that I haven't had much time to improve
                      start select multiple
                  --}}
                  <div class="col-md-12">
                    <span class="text-danger-600">I have a problem in design with this select multiple that I haven't had much time to improve <br>start</span>
                    <br>
                    <label class="form-label">Users <span class="text-danger-600">*</span></label>
                      <select name="users[]" class="form-control radius-8 form-select" multiple required>
                        <option value="" disabled>Users</option>
                        @foreach( $users as $user)
                          <option value="{{ $user->id }}" @if(old('progress') == $user->id) selected @endif> {{ $user->first_name.' '.$user->last_name }}</option>
                        @endforeach
                        <li>
                          <a href="{{ Route('tasks.index') }}">Tasks List</a>
                        </li>
                      </select>
                  </div>
                  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                  <span class="text-danger-600">I have a problem in design with this select multiple that I haven't had much time to improve <br>end</span>

                  @endif
                  {{-- 
                      end select multiple
                  --}}

                  <div class="col-md-12">
                    <button class="btn btn-primary-600" type="submit">Create user</button>
                  </div>



                  
                </form>
              </div>
            </div>
          </div>

        </div>
    </div>


</x-app-layout>
