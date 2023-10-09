<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">

                            <h4 class="fw-semibold mb-8">@lang('views.ATTENDANCE DEDUCTION')</h4>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"

                                            href="{{ route('front.deductions.index') }}">@lang('views.ATTENDANCE DEDUCTION')</a></li>

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



                                            <div class="row">


                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.FROM')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $deduction->from }}</h6>
                                                </div>

                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.TO')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $deduction->to }}</h6>
                                                </div>

                                                <div class="col-12 mb-7">

                                                    <p class="mb-1 fs-2">@lang('views.DEDUCTION PERCENTAGE')</p>

                                                    <h6 class="fw-semibold mb-0">{{ $deduction->percentage }}</h6>
                                                </div>





                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE DEDUCTION')</h5>
                                                <form method="post"
                                                    action="{{ route('front.deductions.update',$deduction->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $deduction->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label class="form-label">@lang('views.FROM')</label>
                                                            <input type="time" class="form-control" name="from" value="{{ old('from',date('H:i', strtotime($deduction->from))) }}" >

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label class="form-label">@lang('views.TO')</label>
                                                            <input type="time" class="form-control" name="to" value="{{ old('to',date('H:i', strtotime($deduction->to))) }}" >
                                                        </div>

                                                        <div class="mb-4 col-12">

                                                            <label for="percentage" class="form-label">@lang('views.DEDUCTION PERCENTAGE') (HH:MM:SS)</label>

                                                            <input type="text" class="form-control" name="percentage" placeholder="HH:MM:SS" value="{{ old('percentage',$deduction?->percentage??"") }}" id="percentage" required>
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
