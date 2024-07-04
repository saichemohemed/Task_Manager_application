
<x-app-layout>

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">User</h6>
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
                <h5 class="card-title mb-0">Create user</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}" class="row gy-3 needs-validation">
                    @csrf
                  <div class="col-md-6">
                    <label class="form-label">First Name <span class="text-danger-600">*</span></label>
                    <div class="icon-field has-validation">
                      <span class="icon">
                        <iconify-icon icon="f7:person"></iconify-icon>
                      </span>
                      <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" placeholder="Enter First Name" required>
                      <div class="invalid-feedback">
                        Please provide first name
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Last Name <span class="text-danger-600">*</span></label>
                    <div class="icon-field has-validation">
                      <span class="icon">
                        <iconify-icon icon="f7:person"></iconify-icon>
                      </span>
                      <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" placeholder="Enter Last Name" required>
                      <div class="invalid-feedback">
                        Please provide last name
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Email <span class="text-danger-600">*</span></label>
                    <div class="icon-field has-validation">
                      <span class="icon">
                        <iconify-icon icon="mage:email"></iconify-icon>
                      </span>
                      <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email" required>
                      <div class="invalid-feedback">
                        Please provide email address
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <div class="icon-field has-validation">
                      <span class="icon">
                        <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                      </span>
                      <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="+213 (553) 00 00 00" >
                      <div class="invalid-feedback">
                        Please provide phone number
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Password <span class="text-danger-600">*</span></label>
                    <div class="icon-field has-validation">
                      <span class="icon">
                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                      </span>
                      <input type="password" name="password" class="form-control" placeholder="*******" required>
                      <div class="invalid-feedback">
                        Please provide password
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-primary-600" type="submit">Create user</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
    </div>

    <script>
        (() => {
          'use strict'
      
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')
      
          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
      
              form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>

</x-app-layout>
