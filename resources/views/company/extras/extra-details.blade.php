<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Extra Requests</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.extras.index') }}">Extra Requests</a></li>
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

                                    <div id="cat-data" class="col-lg-12">
                                        <button id="cat-edit" class="btn btn-success float-end">Edit</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('company.employees.show',$extra->user->id) }}">

                                                    <img src="{{ asset($extra->user->image) }}" width="72"
                                                        height="72" class="rounded-circle">
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $extra->user->name . ' ' . $extra->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $extra->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">From</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->from }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">To</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->to }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">extra Date</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->extra_date }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Status</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <span @class(['badge','bg-success'=>$extra->getTranslation('status','en')=='approve',
                                                            'bg-danger'=>$extra->getTranslation('status','en')=='rejected',
                                                            'bg-info'=>$extra->getTranslation('status','en')=='waiting',
                                                            ])>{{ $extra->status }}</span>
                                                    </h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Extra Type</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->extype->name }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Extra Amount</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->amount }}</h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Note</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Replay</p>
                                                    <h6 class="fw-semibold mb-0">{{ $extra->replay }}</h6>
                                                </div>
                                                
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">File</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <a href="{{ route('front.extras.file',$extra->id) }}" class="text-muted">{{ explode('/',$extra->file)[2]??null }}</a>
                                                    </h6>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Extra Request</h5>
                                                <form method="post"
                                                    action="{{ route('front.extras.update', $extra->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $extra->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextrareplay" class="form-label">Replay</label>
                                                            <textarea class="form-control" name="replay"
                                                                id="exampleFormControlextrareplay">{{ $extra->replay }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextranote" class="form-label">Note</label>
                                                            <textarea class="form-control" name="note"
                                                                id="exampleFormControlextranote">{{ $extra->note }}</textarea>
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextrafrom" class="form-label">From</label>
                                                            <input type="time" class="form-control"
                                                                id="exampleFormControlextrafrom" name="from" value="{{ date('H:i',strtotime($extra->from)) }}">

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextrato" class="form-label">To</label>
                                                            <input type="time" class="form-control without"
                                                                id="exampleFormControlextrato" name="to" value="{{ date('H:i',strtotime($extra->to)) }}">

                                                        </div>
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormextraStatus" class="form-label">Status</label>
                                                            <select class="form-select" id="exampleFormextraStatus" name="status"
                                                                aria-label="Default select example">
                                                                <option disabled selected>Status</option>
                                                                @foreach ($allStatus as $status)
                                                                <option value="{{ json_encode($status) }}" @selected($extra->status==$status[Illuminate\Support\Facades\App::getLocale()])>
                                                                {{$status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>




                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="cat-cancel" class="btn btn-dark">Cancel</button>

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
</x-front-layouts.app>
