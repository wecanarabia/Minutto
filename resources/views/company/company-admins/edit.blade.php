<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.ROLES')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.roles.index') }}">@lang('views.ROLES')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="mb-0">@lang('views.EDIT ADMIN')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.admins.update', $admin->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <input type="hidden" name="id" value="{{ $admin->id }}">
                                            <label for="exampleInputPassword1"
                                                class="form-label fw-semibold">@lang('views.NAME')</label>
                                            <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                                                class="form-control" id="exampleInputtext" placeholder="John Deo">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="exampleInputPassword1"
                                                class="form-label fw-semibold">@lang('views.EMAIL')</label>
                                            <input name="email" type="email"
                                                value="{{ old('email', $admin->email) }}" class="form-control">
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label fw-semibold">@lang('views.PHONE')
                                                </label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', $admin->phone) }}" id="exampleInputtext"
                                                placeholder="412 2150 451">
                                            @error('phone')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.PASSWORD')</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.CONFIRM PASSWORD')</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.IMAGE')</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ROLE')</label>
                                            <select class="form-select" name="role_id">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" @selected(old('role_id', $admin->role->id))>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <input type="submit" value="@lang('views.UPDATE')" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layouts.app>
