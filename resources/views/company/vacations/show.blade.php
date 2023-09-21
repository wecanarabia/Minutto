<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Vacation Requests</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.vacations.index') }}">Vacation Requests</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <x-front-layouts.messages />
                @if ($errors->any())
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
                                        @if (!in_array($vacation->getTranslation('status','en'),['approve','rejected']))

                                        <button id="cat-edit" class="btn btn-success float-end">Edit</button>
                                        @endif
                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('front.employees.show',$vacation->user->id) }}">
                                                        @if ($vacation->user->image==null)

                                                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $vacation->user->name . ' ' . $vacation->user->last_name }}" width="72"
                                                            height="72" class="rounded-circle">
                                                        @else
                                                    <img src="{{ asset($vacation->user->image) }}" width="72" alt="{{ $vacation->user->name . ' ' . $vacation->user->last_name }}"
                                                        height="72" class="rounded-circle">
                                                        @endif
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $vacation->user->name . ' ' . $vacation->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $vacation->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">From</p>
                                                    <h6 class="fw-semibold mb-0">{{ $vacation->from }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">To</p>
                                                    <h6 class="fw-semibold mb-0">{{ $vacation->to }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Note</p>
                                                    <h6 class="fw-semibold mb-0">{{ $vacation->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Replay</p>
                                                    <h6 class="fw-semibold mb-0">{{ $vacation->replay }}</h6>
                                                </div>



                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Status</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <span @class(['badge','bg-success'=>$vacation->getTranslation('status','en')=='approve',
                                                            'bg-danger'=>$vacation->getTranslation('status','en')=='rejected',
                                                            'bg-info'=>$vacation->getTranslation('status','en')=='waiting',
                                                            ])>{{ $vacation->status }}</span>
                                                    </h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Vacation Type</p>
                                                    <h6 class="fw-semibold mb-0">{{ $vacation->vtype->name }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">File</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <a href="{{ route('front.vacations.file',$vacation->id) }}" class="text-muted">{{ explode('/',$vacation->file)[2]??null }}</a>
                                                    </h6>
                                                </div>







                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Vacation Request</h5>
                                                <form method="post"
                                                    action="{{ route('front.vacations.update', $vacation->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $vacation->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextrareplay" class="form-label">Replay</label>
                                                            <textarea class="form-control" name="replay"
                                                                id="exampleFormControlextrareplay">{{ $vacation->replay }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextranote" class="form-label">Note</label>
                                                            <textarea class="form-control" name="note"
                                                                id="exampleFormControlextranote">{{ $vacation->note }}</textarea>
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlvacationfrom" class="form-label">From</label>
                                                            <input type="date" class="form-control"
                                                                id="exampleFormControlvacationfrom" name="from" value="{{ $vacation->from }}">
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlvacationto" class="form-label">To</label>
                                                            <input type="date" class="form-control"
                                                                id="exampleFormControlvacationto" name="to" value="{{ $vacation->to }}">
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormextraStatus" class="form-label">Status</label>
                                                            <select class="form-select" id="exampleFormVacationStatus"
                                                            aria-label="Default select example">
                                                            <option disabled selected>Status</option>
                                                            @foreach ($allStatus as $status)
                                                            <option value="{{ json_encode($status) }}" @selected($vacation->status==$status[Illuminate\Support\Facades\App::getLocale()])>
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
