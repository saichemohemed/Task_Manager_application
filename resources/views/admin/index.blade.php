
<x-app-layout>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">Liste Users</h6>
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

        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <form method="get" action="{{ route('user.index') }}">
                    @csrf
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                        <select name="pages" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                            <option value="20"  @if(request()->input('pages') == '20') selected @endif>20</option>
                            <option value="25"  @if(request()->input('pages') == '25') selected @endif>25</option>
                            <option value="50"  @if(request()->input('pages') == '50') selected @endif>50</option>
                            <option value="100"  @if(request()->input('pages') == '100') selected @endif>100</option>
                            <option value="900"  @if(request()->input('pages') == '900') selected @endif>All</option>
                        </select>

                        <input type="text" class=" bg-base h-40-px w-auto" name="search" placeholder="Search by email" style="border: 1px solid #634b6138;border-radius: 10px;padding: 5px;">

                        <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                            <option value="">Status</option>
                            <option value="1"  @if(request()->input('status') == '1') selected @endif>Active</option>
                            <option value="0"  @if(request()->input('status') == '0') selected @endif>Inactive</option>
                        </select>
                        <div class="card-title-elements ms-auto">
                            <button type="submit"  class="btn rounded-pill btn-outline-success  waves-effect">Filtre</button>                      
                            <button type="reset"  class="btn rounded-pill btn-outline-danger  waves-effect"><a href="{{ route('user.index')}}">Effacer</a></button>                      
                        </div>
                    </div>
                </form>
                <a href="{{ Route('user.create')}}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2"> 
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    Add New User
                </a>
            </div>

            <div class="card-body p-24">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Join Date</th>
                          <th scope="col" class="text-center">Status</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach( $users as $user )
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img src="{{ asset($user->img_path.$user->img_name) }}" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                    <div class="flex-grow-1">
                                        <span class="text-md mb-0 fw-normal text-secondary-light">{{ $user->email }}</span>
                                    </div>
                                    </div>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ strftime("%d %B %Y, %H:%M", strtotime($user->created_at)) }}</td>
                                <td class="text-center">
                                    @if($user->active == 1)
                                        <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Active</span> 
                                    @else
                                        <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Inactive</span> 
                                    @endif
                                </td>
                                <td class="text-center"> 
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <a class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" href="{{ route('user.show',$user->id) }}">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                            </a>
                                            <a class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" href="{{ route('user.edit',$user->id) }}">
                                                <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Showing {{ $users->firstItem() }}  to  {{ $users->lastItem() }} of {{ $users->total() }} entries</span>
                        {{  $users->withQueryString()->links()  }}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
