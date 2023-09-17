<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Alerts</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.alerts.index') }}">Alerts</a></li>
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
                                        <h5 class="mb-0">{{ $alert->name }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">
                                        <div
                                        class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="{{ route('company.employees.show',$alert->user->id) }}">

                                            <img src="{{ asset($alert->user->image) }}" width="72"
                                                height="72" class="rounded-circle">
                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0">
                                                    {{ $alert->user->name . ' ' . $alert->user->last_name }}</h6>
                                                <p class="mb-0">{{ $alert->user->career }}</p>
                                            </a>
                                            </div>

                                        </div>

                                    </div>
                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">Alert Date</p>
                                                <h6 class="fw-semibold mb-0">{{ $alert->alert_date }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Alert Type</p>
                                                <h6 class="fw-semibold mb-0">{{ $alert->type }}
                                                </h6>
                                            </div>



                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">Alert Type's Value</p>
                                                <h6 class="fw-semibold mb-0">{{ $alert->punishment }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Note</p>
                                                <h6 class="fw-semibold mb-0">{{ $alert->note }}
                                                </h6>
                                            </div>

                                              <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">File</p>
                                                <h6 class="fw-semibold mb-0">
                                                    <a href="{{ route('front.alerts.file',$alert->id) }}" class="text-muted">{{ explode('/',$alert->file)[2]??null }}</a>
                                                </h6>
                                            </div>







                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('front.alerts.edit', $alert->id) }}"
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
