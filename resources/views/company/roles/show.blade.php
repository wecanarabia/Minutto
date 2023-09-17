<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Roles</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.roles.index') }}">Roles</a></li>
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
                                        <h5 class="mb-0">{{ $role->name }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">

                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">English Name</p>
                                                <h6 class="fw-semibold mb-0">{{ $role->getTranslation('name', 'en') }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Arabic Name</p>
                                                <h6 class="fw-semibold mb-0">{{ $role->getTranslation('name', 'ar') }}
                                                </h6>
                                            </div>

                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Permissions</p>
                                                @foreach ($role->permissions as $name)
                                                    <span class="text-muted d-block">-
                                                        {{ config('global.permissions')[$name][Illuminate\Support\Facades\App::getLocale()] }}</span>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('front.roles.edit', $role->id) }}"
                                                class="btn btn-primary fs-2">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layouts.app>
