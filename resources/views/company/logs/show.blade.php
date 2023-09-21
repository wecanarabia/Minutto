<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">{{ $log->user->name }} Log</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.logs.index') }}">Logs</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <x-front-layouts.messages />
                @if ($errors->any())
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                </div>
            @endif
                <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="col-lg-12">

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('front.employees.show',$log->user->id) }}">
                                                        @if ($log->user->image==null)

                                                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $log->user->name . ' ' . $log->user->last_name }}" width="72"
                                                            height="72" class="rounded-circle">
                                                        @else
                                                    <img src="{{ asset($log->user->image) }}" width="72" alt="{{ $log->user->name . ' ' . $log->user->last_name }}"
                                                        height="72" class="rounded-circle">
                                                        @endif
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $log->user->name . ' ' . $log->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $log->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div
                                            class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="{{ route('company.admins.show',$log->admin->id) }}">

                                                <img src="{{ asset($log->admin->image) }}" width="72"
                                                    height="72" class="rounded-circle">
                                                <div>
                                                    <h6 class="fw-semibold fs-4 mb-0">
                                                        {{ $log->admin->name  }}</h6>
                                                </a>
                                                </div>

                                            </div>

                                        </div>

                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">English Title</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->getTranslation('on','en')}}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Arabic Title</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->getTranslation('on','ar') }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">English Log</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->getTranslation('log','en') }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Arabic Log</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->getTranslation('log','ar') }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Note</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">created_at</p>
                                                    <h6 class="fw-semibold mb-0">{{ $log->created_at }}</h6>
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
        </div>
    </div>
</x-front-layouts.app>
