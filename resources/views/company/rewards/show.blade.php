<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.BONUS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.rewards.index') }}">@lang('views.BONUS')</a></li>
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
                                        <h5 class="mb-0">{{ $reward->name }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">
                                        <div
                                        class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="{{ route('front.employees.show',$reward->user->id) }}">
                                                @if ($reward->user->image==null)

                                                <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $reward->user->name . ' ' . $reward->user->last_name }}" width="72"
                                                    height="72" class="rounded-circle">
                                                @else
                                            <img src="{{ asset($reward->user->image) }}" width="72" alt="{{ $reward->user->name . ' ' . $reward->user->last_name }}"
                                                height="72" class="rounded-circle">
                                                @endif
                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0">
                                                    {{ $reward->user->name . ' ' . $reward->user->last_name }}</h6>
                                                <p class="mb-0">{{ $reward->user->career }}</p>
                                            </a>
                                            </div>

                                        </div>

                                    </div>
                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.BONUS DATE')</p>
                                                <h6 class="fw-semibold mb-0">{{ $reward->reward_date }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.BONUS TYPE')</p>
                                                <h6 class="fw-semibold mb-0">{{ $reward->rtype->name }}
                                                </h6>
                                            </div>



                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.BONUS TYPES VALUE')</p>
                                                <h6 class="fw-semibold mb-0">{{ $reward->reward_value }}
                                                </h6>
                                            </div>

                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.STATUS')</p>
                                                <h6 class="fw-semibold mb-0">
                                                    <span @class(['badge','bg-success'=>$reward->getTranslation('status','en')=='approve',
                                                        'bg-danger'=>$reward->getTranslation('status','en')=='rejected',
                                                        'bg-info'=>$reward->getTranslation('status','en')=='waiting',
                                                        ])>{{ $reward->status }}</span>
                                                </h6>
                                            </div>
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.NOTE')</p>
                                                <h6 class="fw-semibold mb-0">{{ $reward->note }}
                                                </h6>
                                            </div>

                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.REPLAY')</p>
                                                <h6 class="fw-semibold mb-0">{{ $reward->replay }}
                                                </h6>
                                            </div>

                                              <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">@lang('views.FILE')</p>
                                                <h6 class="fw-semibold mb-0">
                                                    <a href="{{ route('front.rewards.file',$reward->id) }}" class="text-muted">{{ explode('/',$reward->file)[2]??null }}</a>
                                                </h6>
                                            </div>







                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('front.rewards.edit', $reward->id) }}"
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
