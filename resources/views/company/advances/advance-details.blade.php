<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.ADVANCE REQUEST')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.advances.index') }}">@lang('views.ADVANCE REQUEST')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <x-front-layouts.messages />
                @if ($errors->any())
                <input type="hidden" id="validationErrors" value="1">
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
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

                                    <div id="cat-data" class="col-lg-12">
                                        <button id="cat-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('front.employees.show',$advance->user->id) }}">
                                                        @if ($advance->user->image==null)

                                                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="72"
                                                            height="72" class="rounded-circle">
                                                        @else
                                                    <img src="{{ asset($advance->user->image) }}" width="72"
                                                        height="72" class="rounded-circle">
                                                        @endif
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $advance->user->name . ' ' . $advance->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $advance->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.REQUEST DATE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $advance->req_date }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.AMOUNT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ currency($advance->value) }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NOTE')</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ $advance->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.REPLAY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $advance->replay }}</h6>
                                                </div>



                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.STATUS')</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <span
                                                        @class(['badge','bg-success'=>$advance->getTranslation('status','en')=='approve',
                                                        'bg-danger'=>$advance->getTranslation('status','en')=='rejected',
                                                        'bg-info'=>$advance->getTranslation('status','en')=='waiting',
                                                        ])
                                                    >
                                                        {{ $advance->status }}</span>
                                                    </h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.FILE')</p>
                                                    <h6 class="fw-semibold mb-0"><a href="{{ route('front.advances.file', $advance->id) }}"
                                                        class="text-muted">{{ explode('/', $advance->file)[2]??null }}</a></h6>
                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE ADVANCE REQUEST')</h5>
                                                <form method="post"
                                                    action="{{ route('front.advances.update', $advance->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $advance->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormAtgtendanceStatus" class="form-label">@lang('views.STATUS')</label>
                                                        <select class="form-select" name="status" id="exampleFormAtgtendanceStatus"
                                                            aria-label="Default select example">
                                                            <option disabled selected>@lang('views.STATUS')</option>
                                                            @foreach ($allStatus as $status)
                                                            <option value="{{ json_encode($status) }}" @selected($advance->status ==
                                                                $status[Illuminate\Support\Facades\App::getLocale()])>
                                                                {{ $status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControladvancevalue" class="form-label">@lang('views.AMOUNT')</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControladvancevalue" name="value" value="{{ $advance->value }}">

                                                        </div>
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlattendancereplay" class="form-label">@lang('views.REPLAY')</label>
                                                            <textarea class="form-control"
                                                                id="exampleFormControlattendancereplay" name="replay">{{ $advance->replay }}</textarea>

                                                        </div>
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlattendancenote" class="form-label">@lang('views.NOTE')</label>
                                                            <textarea class="form-control"
                                                                id="exampleFormControlattendancenote" name="note">{{ $advance->note }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlreqdate" class="form-label">@lang('views.REQUEST DATE')
                                                                </label>
                                                            <input type="date" class="form-control" name="req_date"
                                                                id="exampleFormControlreqdate" value="{{ $advance->req_date }}">
                                                        </div>



                                                    </div>
                                                    <input type="submit" value="@lang('views.UPDATE')" class="btn btn-primary mx-2">
                                                    <button id="cat-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

                                                </form>

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
    @push('javasc')
<script>
if(document.getElementById('validationErrors').value=='1'){
    $('#cat-data').hide();
    $('#cat-form').removeClass('d-none');
}
</script>

@endpush
</x-front-layouts.app>

