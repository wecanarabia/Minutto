<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.SHIFTS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.shifts.index') }}">@lang('views.SHIFTS')</a></li>
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
                                        <h5 class="mb-0">{{ $shift->name }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">

                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ENGLISH NAME')</p>
                                                <h6 class="fw-semibold mb-0">{{ $shift->getTranslation('name', 'en') }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.ENGLISH NAME')</p>
                                                <h6 class="fw-semibold mb-0">{{ $shift->getTranslation('name', 'ar') }}
                                                </h6>
                                            </div>

                                            <div class="col-12 mb-7">
                                                <h5>@lang('views.SHIFT WORKDAYS')</h5>
                                                <table class="table border text-nowrap customize-table mb-0 align-middle" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>@lang('views.DAY')</th>
                                                            <th>@lang('views.FROM')</th>
                                                            <th>@lang('views.TO')</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ( $shift->workdays as $workday)

                                                        <tr>

                                                            <td>
                                                                {{ $workday->day }}
                                                           </td>
                                                           <td>
                                                            {{ $workday->from }}
                                                           </td>
                                                            <td>
                                                            {{ $workday->to }}
                                                           </td>



                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>





                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('front.shifts.edit', $shift->id) }}"
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
