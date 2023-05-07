<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card border-0 mb-4 no-bg">
                        <div
                            class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                            <h3 class=" fw-bold flex-fill mb-0">Attendance Details</h3>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->


            <div class="row g-3">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card teacher-card  mb-3">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold ">{{ $attendance->user->name }}</h6>
                            <button type="button" class="btn p-0" data-bs-toggle="modal"
                                data-bs-target="#edit-attendance"><i
                                    class="icofont-edit text-primary fs-6"></i></button>

                        </div>
                        <div class="card-body  d-flex teacher-fulldeatil">

                            <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                                <a href={{ route('company.employees.show', $attendance->user->id) }}">
                                    <img src="{{ asset($attendance->user->image) }}" alt=""
                                        class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                </a>
                                <div
                                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                    <span class="text-muted small">{{ $attendance->user->name .
                                        "
                                        " .
                                        $attendance->user->last_name }}</span>
                                </div>
                            </div>


                            <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                <ul class="list-unstyled mb-0">
                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Attendance Time</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->time_attendance }}</span>
                                        </div>
                                    </li>
                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Departure Time</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->time_departure }}</span>
                                        </div>
                                    </li>
                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Discount</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->discount_value }}</span>
                                        </div>
                                    </li>
                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Note</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->note }}</span>
                                        </div>
                                    </li>

                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Replay</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->replay }}</span>
                                        </div>
                                    </li>
                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Delay</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-muted">{{ $attendance->delay }}</span>
                                        </div>
                                    </li>

                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">Status</span>
                                        </div>
                                        <div class="col-8">
                                            <span
                                            @class(['badge','bg-success'=>$attendance->getTranslation('status','en')=='disciplined',
                                            'bg-secondary'=>$attendance->getTranslation('status','en')=='late',
                                            'bg-danger'=>$attendance->getTranslation('status','en')=='absence',
                                            'bg-info'=>$attendance->getTranslation('status','en')=='vacation',
                                            ])
                                        >
                                            {{ $attendance->status }}</span>
                                        </div>
                                    </li>

                                    <li class="row flex-wrap mb-3">
                                        <div class="col-4">
                                            <span class="fw-bold">File</span>
                                        </div>
                                        <div class="col-8">
                                            <a href="{{ route('company.attendance.file', $attendance->id) }}"
                                                class="text-muted">{{ explode('/', $attendance->file)[2]??null }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Employee Info-->
            <div class="modal fade" id="edit-attendance" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="edit-attendanceLabel"> Edit Attendance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="deadline-form">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <input id="id-attendance" type="hidden" value="{{ $attendance->id }}">
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label for="exampleFormAtgtendanceStatus" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormAtgtendanceStatus"
                                            aria-label="Default select example">
                                            <option disabled selected>Status</option>
                                            @foreach ($allStatus as $status)
                                            <option value="{{ json_encode($status) }}" @selected($attendance->status ==
                                                $status[Illuminate\Support\Facades\App::getLocale()])>
                                                {{ $status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="col-sm-6">
                                    <label for="exampleFormControlattenddiscount" class="form-label">Discount</label>
                                    <input type="text" class="form-control"
                                        id="exampleFormControlattenddiscount" value="{{ $attendance->discount_value }}">
                                </div>
                            </div>
                            <div class="row g-3 mb-3">

                                <div class="col-sm-6">
                                    <label for="exampleFormControldeparturetime" class="form-label">Departure
                                        Time</label>
                                    <input type="time" class="form-control" name="time_departure"
                                        id="exampleFormControldeparturetime" value="{{ date('H:i',strtotime($attendance->time_departure)) }}">
                                </div>

                                <div class="col-sm-6">
                                    <label for="exampleFormControlattendancenote" class="form-label">Note</label>
                                    <textarea class="form-control" name="note"
                                        id="exampleFormControlattendancenote">{{ $attendance->note }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button id="attendance-submit" class="btn btn-primary">update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
