<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Attendance</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.attendance.index') }}">Attendance</a></li>
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
                                                    <a href="{{ route('front.employees.show',$attendance->user->id) }}">

                                                    <img src="{{ asset($attendance->user->image) }}" width="72"
                                                        height="72" class="rounded-circle">
                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $attendance->user->name . ' ' . $attendance->user->last_name }}</h6>
                                                        <p class="mb-0">{{ $attendance->user->career }}</p>
                                                    </a>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Attendance Time</p>
                                                    <h6 class="fw-semibold mb-0">{{ $attendance->time_attendance }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Departure Time</p>
                                                    <h6 class="fw-semibold mb-0">{{ $attendance->time_departure }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Note</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ $attendance->note }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Replay</p>
                                                    <h6 class="fw-semibold mb-0">{{ $attendance->replay }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Delay</p>
                                                    <h6 class="fw-semibold mb-0">{{ $attendance->delay }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Status</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        <span
                                                        @class(['badge','bg-success'=>$attendance->getTranslation('status','en')=='disciplined',
                                                        'bg-secondary'=>$attendance->getTranslation('status','en')=='late',
                                                        'bg-danger'=>$attendance->getTranslation('status','en')=='absence',
                                                        'bg-info'=>$attendance->getTranslation('status','en')=='vacation',
                                                        ])
                                                    >
                                                        {{ $attendance->status }}</span>
                                                    </h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">File</p>
                                                    <h6 class="fw-semibold mb-0"><a href="{{ route('front.attendance.file', $attendance->id) }}"
                                                        class="text-muted">{{ explode('/', $attendance->file)[2]??null }}</a></h6>
                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Attendance</h5>
                                                <form method="post"
                                                    action="{{ route('front.attendance.update', $attendance->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $attendance->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormAtgtendanceStatus" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="exampleFormAtgtendanceStatus"
                                                            aria-label="Default select example">
                                                            <option disabled selected>Status</option>
                                                            @foreach ($allStatus as $status)
                                                            <option value="{{ json_encode($status) }}" @selected($attendance->status ==
                                                                $status[Illuminate\Support\Facades\App::getLocale()])>
                                                                {{ $status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlattenddiscount" class="form-label">Deduction</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlattenddiscount" name="discount_value" value="{{ $attendance->discount_value }}">


                                                        </div>
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlattendancereplay" class="form-label">Replay</label>
                                                            <textarea class="form-control"
                                                                id="exampleFormControlattendancereplay" name="replay">{{ $attendance->replay }}</textarea>

                                                        </div>
                                                        <div class="mb-4 col-12">
                                                            <label for="exampleFormControlattendancenote" class="form-label">Note</label>
                                                            <textarea class="form-control"
                                                                id="exampleFormControlattendancenote" name="note">{{ $attendance->note }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControldeparturetime" class="form-label">Departure
                                                                Time</label>
                                                            <input type="time" class="form-control" name="time_departure"
                                                                id="exampleFormControldeparturetime" value="{{ date('H:i',strtotime($attendance->time_departure)) }}">


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
