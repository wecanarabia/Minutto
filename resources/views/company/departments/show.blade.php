<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.DEPARTMENTS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.departments.index') }}">@lang('views.DEPARTMENTS')</a></li>
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
                                        <h5 class="mb-0">{{ $department->name }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">
                                        <div
                                            class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                            @if ($department->head)
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="{{ route('front.employees.show',$department->head->id) }}">
                                                    @if ($department->head->image==null)

                                                    <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $department->head->name . ' ' . $department->head->last_name }}" width="72"
                                                        height="72" class="rounded-circle">
                                                    @else
                                                    <img src="{{ asset($department->head->image) }}" alt="{{ $department->head->name . ' ' . $department->head->last_name }}" width="72"
                                                    height="72" class="rounded-circle">
                                                    @endif
                                                <div>

                                                    <h6 class="fw-semibold fs-4 mb-0">{{ $department->head->name . ' ' . $department->head->last_name }}</h6>
                                                    <p class="mb-0">@lang('views.HEAD MANAGER')</p>


                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ENGLISH NAME')</p>
                                                <h6 class="fw-semibold mb-0">{{ $department->getTranslation('name', 'en') }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ARABIC NAME')</p>
                                                <h6 class="fw-semibold mb-0">{{ $department->getTranslation('name', 'ar') }}
                                                </h6>
                                            </div>


                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ENGLISH DESCRIPTION')</p>
                                                <h6 class="fw-semibold mb-0">{{ $department->getTranslation('description', 'en')}}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ARABIC DESCRIPTION')</p>
                                                <h6 class="fw-semibold mb-0">{{ $department->getTranslation('description', 'ar')}}
                                                </h6>
                                            </div>


                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('front.departments.edit', $department->id) }}"
                                                class="btn btn-primary fs-2">@lang('views.EDIT')</a>
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
