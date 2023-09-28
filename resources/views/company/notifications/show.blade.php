<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Notifications</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.notifications.index') }}">Notifications</a></li>
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
                                        <h5 class="mb-0">{{ $notification->title }}</h5>
                                    </div>
                                    <div class="chat-list chat active-chat" data-user-id="1">

                                        <div class="row">
                                            <div class="col-4 mb-7">
                                                <p class="mb-1 fs-2">English Title</p>
                                                <h6 class="fw-semibold mb-0">{{ $notification->getTranslation('title', 'en') }}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Arabic Title</p>
                                                <h6 class="fw-semibold mb-0">{{ $notification->getTranslation('title', 'ar') }}
                                                </h6>
                                            </div>


                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">English Body</p>
                                                <h6 class="fw-semibold mb-0">{{ $notification->getTranslation('body', 'en')}}
                                                </h6>
                                            </div>
                                            <div class="col-8 mb-7">
                                                <p class="mb-1 fs-2">Arabic Body</p>
                                                <h6 class="fw-semibold mb-0">{{ $notification->getTranslation('body', 'ar')}}
                                                </h6>
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
