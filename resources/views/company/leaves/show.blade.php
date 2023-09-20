<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Leave Requests</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.leaves.index') }}">Leave Requests</a></li>
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
                                        <button id="cat-edit" class="btn btn-success float-end">Edit</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('front.employees.show',$leave->user->id) }}">
                                                        @if ($leave->user->image==null)

                                                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="72"
                                                            height="72" class="rounded-circle">
                                                        @else
                                                    <img src="{{ asset($leave->user->image) }}" width="72"
                                                        height="72" class="rounded-circle">
                                                        @endif
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $leave->user->name . ' ' . $leave->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $leave->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">From</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->from }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">To</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->to }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Leave Time</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->time_leave }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Back Time</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->time_back }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Leave Date</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->leave_date }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">File</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <a href="{{ route('front.leaves.file',$leave->id) }}" class="text-muted">{{ explode('/',$leave->file)[2]??null }}</a>
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Status</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <span @class(['badge','bg-success'=>$leave->getTranslation('status','en')=='approve',
                                                            'bg-danger'=>$leave->getTranslation('status','en')=='rejected',
                                                            'bg-info'=>$leave->getTranslation('status','en')=='waiting',
                                                            ])>{{ $leave->status }}</span>
                                                    </h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Leave Type</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->ltype->name }}</h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Leave Period</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->period }}</h6>
                                                </div>
                                                 <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">delay Period</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->late_period }}</h6>
                                                </div>
                                                  <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">delay Status</p>
                                                    <h6 class="fw-semibold mb-0"><span @class(['badge','bg-success'=>$leave->getTranslation('time_status','en')=='disciplined',
                                                        'bg-danger'=>$leave->getTranslation('time_status','en')=='late',
                                                        ])>{{ $leave->time_status }}</span></h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Deduction</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->discount_value }}</h6>
                                                </div>


                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Note</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Replay</p>
                                                    <h6 class="fw-semibold mb-0">{{ $leave->replay }}</h6>
                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Leave Request</h5>
                                                <form method="post"
                                                    action="{{ route('front.leaves.update', $leave->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $leave->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextrareplay" class="form-label">Replay</label>
                                                            <textarea class="form-control" name="replay"
                                                                id="exampleFormControlextrareplay">{{ $leave->replay }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlextranote" class="form-label">Note</label>
                                                            <textarea class="form-control" name="note"
                                                                id="exampleFormControlextranote">{{ $leave->note }}</textarea>
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlleavediscount" class="form-label">Deduction</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlleavediscount" name="discount_value" value="{{ $leave->discount_value }}">
                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormextraStatus" class="form-label">Status</label>
                                                            <select class="form-select" name="status" id="exampleFormleaveStatus"
                                                            aria-label="Default select example">
                                                            <option disabled selected>Status</option>
                                                            @foreach ($allStatus as $status)
                                                            <option value="{{ json_encode($status) }}" @selected($leave->status==$status[Illuminate\Support\Facades\App::getLocale()])>
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
