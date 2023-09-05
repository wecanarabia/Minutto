<x-front-layouts.app>
    <div class="row">

    <div class="col-lg-8">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Admins</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a class="text-muted" href="{{ route('front.admins.index') }}">Admins</a></li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-content searchable-container list">
          <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Create Admin</h5>
          </div>
          <form method="post" action="{{ route('front.admins.create') }}">
            @csrf
            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label fw-semibold">Name</label>
              <input type="text" name="name" value="{{ old('name') }}"  class="form-control" id="exampleInputtext" placeholder="John Deo">
              @error('name')
            <div class="text-danger">
              {{ $message }}
            </div>
              @enderror
            </div>

            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                <div class="text-danger">
                  {{ $message }}
                </div>
                  @enderror
            </div>
            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label fw-semibold">Phone No</label>
              <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" id="exampleInputtext" placeholder="412 2150 451">
              @error('phone')
              <div class="text-danger">
                {{ $message }}
              </div>
                @enderror
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Password</label>
              <input type="password" name="password" class="form-control">
              @error('password')
              <div class="text-danger">
                {{ $message }}
              </div>
                @enderror
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Image</label>
              <input type="file" name="image" class="form-control">
              @error('image')
            <div class="text-danger">
              {{ $message }}
            </div>
              @enderror
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Role</label>
              <select class="form-select" name="role_id">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" @selected(old('role_id'))>{{ $role->name }}</option>
                @endforeach
              </select>
              @error('role_id')
              <div class="text-danger">
                {{ $message }}
              </div>
                @enderror
            </div>

            <button class="btn btn-primary">Send</button>
        </form>
        </div>
      </div>
    </div>
</x-front-layouts.app>
