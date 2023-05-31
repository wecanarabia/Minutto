<x-layouts.header title="{{ $employee->name }}"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card border-0 mb-4 no-bg">
                        <div
                            class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                            <h3 class=" fw-bold flex-fill mb-0">{{ $employee->name ." ". $employee->last_name }}</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.employees.index') }}"></i>Employees</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- Row End -->


            <div class="row g-3">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card teacher-card  mb-3">
                        <div class="card-body  d-flex teacher-fulldeatil">
                            <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                                <a href="#">
                                    <img src="{{ asset($employee->image) }}" alt=""
                                        class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                </a>
                                <div
                                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                    <h6 class="mb-0 fw-bold d-block fs-6">{{ $employee->carrer }}</h6>
                                    <span class="text-muted small">Employee Id : {{ $employee->id }}</span>
                                </div>
                            </div>
                            <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ $employee->name ." ". $employee->last_name }}
                                </h6>
                                <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">{{ $employee->carrer }}</span>
                                <p class="mt-2 small">{{ $employee->description }}</p>
                                <div class="row g-2 pt-2">
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-ui-touch-phone"></i>
                                            <span class="ms-2 small">{{ $employee->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-email"></i>
                                            <span class="ms-2 small">{{ $employee->email }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-birthday-cake"></i>
                                            <span class="ms-2 small">{{ $employee->work_start }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-address-book"></i>
                                            <span class="ms-2 small">{{ $employee->branch->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Personal Information</h6>
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#edit1"><i class="icofont-edit text-primary fs-6"></i></button>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Nationality</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->nationality }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Date Of Birth</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->date_of_birth }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Address</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->address }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Gender</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->gender }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Marital Status</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->marital_status }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Passport No</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->passport_identity }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Nataional Id</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->national_identity }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Emergency Contact</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->emergency_contact }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Employee Work Information</h6>
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#edit3"><i class="icofont-edit text-primary fs-6"></i></button>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Career</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->career }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Country</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->country }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <Date class="fw-bold">Working Start Date</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->work_start }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Duration Of Contract</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->duration_of_contract }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Contract Expiration</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->contract_expire }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Branch</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee?->branch?->name }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Shift</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee?->shift?->name }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Department</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee?->department?->name }}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Bank information</h6>
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#edit2"><i class="icofont-edit text-primary fs-6"></i></button>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Bank Name</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->bank_name }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Account No.</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->account_number }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Bank Branch</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->bank_branch }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">IPAN</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->ipan }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Swift Number</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->swift_number }}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Profile Information</h6>
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#edit4"><i class="icofont-edit text-primary fs-6"></i></button>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Name</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->name }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Last Name</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->last_name }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Email</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->email }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Phone</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->phone }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Status</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->active?'Active':'In Active'
                                                    }}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Salary information</h6>
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#edit5"><i class="icofont-edit text-primary fs-6"></i></button>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Monthly Salary</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->monthly_salary }}</span>
                                            </div>
                                        </li>
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Daily Salary</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->daily_salary }}</span>
                                            </div>
                                        </li>

                                        <li class="row flex-wrap mb-3">
                                            <div class="col-6">
                                                <span class="fw-bold">Hourly</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted">{{ $employee->hourly_salary }}</span>
                                            </div>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('attendance')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Attendance</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                      <table class="table table-attendance table-hover align-middle mb-0" style="width:100%">
                                                          <thead>
                                                              <tr>
                                                                  <th>Id</th>
                                                                  <th>Attendance Time</th>
                                                                  <th>Departure Time</th>
                                                                  <th>Discount</th>
                                                                  <th>Status</th>
                                                                  <th>Show</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($employee->workhours as $attendance)

                                                              <tr>
                                                                  <td>
                                                                      {{ $attendance->id }}
                                                                  </td>
                                                                 <td>
                                                                  {{ $attendance->time_attendance }}
                                                                 </td>
                                                                 <td>
                                                                  {{ $attendance->time_departure }}
                                                                 </td>
                                                                 <td>
                                                                  {{ $attendance->discount_value }}
                                                                 </td>
                                                                 <td>
                                                                    @class(['badge','bg-success'=>$attendance->getTranslation('status','en')=='disciplined',
                                                                    'bg-secondary'=>$attendance->getTranslation('status','en')=='late',
                                                                    'bg-danger'=>$attendance->getTranslation('status','en')=='absence',
                                                                    'bg-info'=>$attendance->getTranslation('status','en')=='vacation',
                                                                    ])
                                                                >
                                                                  {{ $attendance->status }}</td>
                                                                 </td>
                                                                 <td>
                                                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                      <a class="btn btn-outline-secondary" href="{{ route('company.attendance.show',$attendance->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                  </div>
                                                                  </td>
                                                              </tr>

                                                              @endforeach

                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('leaves')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Leave Requests</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-leaves table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>leave Date</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                                <th>Show</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->leaves as $leave)

                                                            <tr>
                                                                <td>
                                                                    {{ $leave->id }}
                                                                </td>

                                                               <td>
                                                                {{ $leave->leave_date }}
                                                               </td>
                                                               <td>
                                                                {{ $leave->from }}
                                                               </td>
                                                               <td>
                                                                {{ $leave->to }}
                                                               </td>
                                                               <td>
                                                                <span @class(['badge','bg-success'=>$leave->getTranslation('status','en')=='approve',
                                                                'bg-danger'=>$leave->getTranslation('status','en')=='rejected',
                                                                'bg-info'=>$leave->getTranslation('status','en')=='waiting',
                                                                ])>
                                                               {{ $leave->status }}
                                                                </span>
                                                               </td>

                                                               <td>
                                                               {{ $leave->ltype->name }}
                                                               </td>
                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.leaves.show',$leave->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('vacations')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Vacation Requests</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-vacations table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                                <th>Show</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->vacations as $vacation)

                                                            <tr>
                                                                <td>
                                                                    {{ $vacation->id }}
                                                                </td>

                                                               <td>
                                                                {{ $vacation->from }}
                                                               </td>
                                                               <td>
                                                                {{ $vacation->to }}
                                                               </td>
                                                               <td>
                                                                <span @class(['badge','bg-success'=>$vacation->getTranslation('status','en')=='approve',
                                                                    'bg-danger'=>$vacation->getTranslation('status','en')=='rejected',
                                                                    'bg-info'=>$vacation->getTranslation('status','en')=='waiting',
                                                                    ])>
                                                               {{ $vacation->status }}</span>
                                                               </td>

                                                               <td>
                                                               {{ $vacation->vtype->name }}
                                                               </td>
                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.vacations.show',$vacation->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('rewards')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Incentives</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-rewards table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Employee</th>
                                                                <th>Type</th>
                                                                <th>Incentive Date</th>
                                                                <th>type's value</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->rewards as $reward)

                                                            <tr>
                                                                <td>
                                                                    {{ $reward->id }}
                                                                </td>
                                                               <td>
                                                                   <img class="avatar rounded-circle" src="{{ asset( $reward->user->image ) }}" alt="">
                                                                   <a href="{{ route('company.employees.show',$reward->user->id) }}" class="fw-bold text-secondary">
                                                                   <span class="fw-bold ms-1">{{ $reward->user->name }}</span></a>
                                                               </td>
                                                               <td>
                                                                {{ $reward->rtype->name }}
                                                                </td>
                                                               <td>
                                                                {{ $reward->reward_date }}
                                                               </td>
                                                               <td>
                                                                {{ $reward->reward_value }}
                                                               </td>

                                                               <td>
                                                                <span @class(['badge','bg-success'=>$reward->getTranslation('status','en')=='approve',
                                                                    'bg-danger'=>$reward->getTranslation('status','en')=='rejected',
                                                                    'bg-info'=>$reward->getTranslation('status','en')=='waiting',
                                                                    ])>
                                                               {{ $reward->status }}</span>
                                                               </td>


                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.rewards.edit',$reward->id) }}"><i class="icofont-edit text-success"></i></a>
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.rewards.show',$reward->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('advances')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Advances</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-advances table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Request Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Show</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->advances as $advance)

                                                            <tr>
                                                                <td>
                                                                    {{ $advance->id }}
                                                                </td>

                                                               <td>
                                                                {{ $advance->req_date }}
                                                               </td>
                                                               <td>
                                                                {{ $advance->value }}
                                                               </td>
                                                               <td>
                                                                <span @class(['badge','bg-success'=>$advance->getTranslation('status','en')=='approve',
                                                                    'bg-danger'=>$advance->getTranslation('status','en')=='rejected',
                                                                    'bg-info'=>$advance->getTranslation('status','en')=='waiting',
                                                                    ])>{{ $advance->status }}</span>
                                                               </td>
                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.advances.show',$advance->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('extra')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Extra</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-extra table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Extra Date</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                                <th>Show</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->extras as $extra)

                                                            <tr>
                                                                <td>
                                                                    {{ $extra->id }}
                                                                </td>
                                                               <td>
                                                                {{ $extra->extra_date }}
                                                               </td>
                                                               <td>
                                                                {{ $extra->from }}
                                                               </td>
                                                               <td>
                                                                {{ $extra->to }}
                                                               </td>
                                                               <td>
                                                                <span @class(['badge','bg-success'=>$extra->getTranslation('status','en')=='approve',
                                                                    'bg-danger'=>$extra->getTranslation('status','en')=='rejected',
                                                                    'bg-info'=>$extra->getTranslation('status','en')=='waiting',
                                                                    ])>
                                                               {{ $extra->status }}</span>
                                                               </td>

                                                               <td>
                                                               {{ $extra->extype->name }}
                                                               </td>
                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.leaves.show',$extra->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                     @can('alerts')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Alerts</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-alerts table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Employee</th>
                                                                <th>Alert Type</th>
                                                                <th>Alert Date</th>
                                                                <th>type's value</th>

                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->alerts as $alert)

                                                            <tr>
                                                                <td>
                                                                    {{ $alert->id }}
                                                                </td>
                                                               <td>
                                                                   <img class="avatar rounded-circle" src="{{ asset( $alert->user->image ) }}" alt="">
                                                                   <a href="{{ route('company.employees.show',$alert->user->id) }}" class="fw-bold text-secondary">
                                                                   <span class="fw-bold ms-1">{{ $alert->user->name }}</span></a>
                                                               </td>
                                                               <td>
                                                                {{ $alert->type }}
                                                                </td>
                                                               <td>
                                                                {{ $alert->alert_date }}
                                                               </td>
                                                               <td>
                                                                {{ $alert->punishment }}
                                                               </td>



                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.alerts.edit',$alert->id) }}"><i class="icofont-edit text-success"></i></a>
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.alerts.show',$alert->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('vacations')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Employee Vacation Balance</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                  <div class="card-body">
                                                    <table class="table table-vacation-e table-hover align-middle mb-0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Employee</th>
                                                                <th>Vacation Balance</th>
                                                                <th>Year</th>
                                                                <th>Show</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->UserVacations as $vacation)

                                                            <tr>
                                                                <td>
                                                                    {{ $vacation->id }}
                                                                </td>
                                                               <td>
                                                                   <img class="avatar rounded-circle" src="{{ asset( $vacation->user->image ) }}" alt="">
                                                                   <a href="{{ route('company.employees.show',$vacation->user->id) }}" class="fw-bold text-secondary">
                                                                   <span class="fw-bold ms-1">{{ $vacation->user->name }}</span></a>
                                                               </td>
                                                               <td>
                                                                {{ $vacation->vacation_balance }}
                                                               </td>
                                                               <td>
                                                                {{ $vacation->year }}
                                                               </td>

                                                               <td>
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                    <a class="btn btn-outline-secondary" href="{{ route('company.employee-vacations.show',$vacation->id) }}"><i class="icofont-location-arrow"></i></a>
                                                                </div>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan


                    @can('logs')
                    <div class="row g-3">


                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="mb-0 fw-bold ">Employee Logs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <div class="col-sm-12">
                                              <div class="card mb-3">
                                                <table class="table table-logs table-hover align-middle mb-0" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Employee</th>
                                                            <th>Admin</th>
                                                            <th>Title</th>
                                                            <th>Log</th>
                                                            <th>Created At</th>
                                                            <th>Show</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($employee->logs as $log)

                                                        <tr>
                                                            <td>
                                                                {{ $log->id }}
                                                            </td>
                                                           <td>
                                                               <img class="avatar rounded-circle" src="{{ asset( $log->user->image ) }}" alt="">
                                                               <a href="{{ route('company.employees.show',$log->user->id) }}" class="fw-bold text-secondary">
                                                               <span class="fw-bold ms-1">{{ $log->user->name }}</span></a>
                                                           </td>
                                                           <td>
                                                            <img class="avatar rounded-circle" src="{{ asset( $log->admin->image ) }}" alt="">
                                                            <a href="{{ route('company.admins.show',$log->admin->id) }}" class="fw-bold text-secondary">
                                                            <span class="fw-bold ms-1">{{ $log->admin->name }}</span></a>
                                                            </td>
                                                           <td>
                                                            {{ $log->on }}
                                                           </td>

                                                           <td>
                                                            {{ $log->log }}
                                                           </td>

                                                           <td>
                                                            {{ $log->created_at }}
                                                           </td>

                                                           <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <a class="btn btn-outline-secondary" href="{{ route('company.logs.show',$log->id) }}"><i class="icofont-location-arrow"></i></a>
                                                            </div>
                                                            </td>
                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                              </div>
                                        </div>
                                      </div><!-- Row End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>

            </div><!-- Row End -->


        </div>
    </div>



    <!-- Edit Personal Info-->
    <div class="modal fade" id="edit1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="edit1Label"> Personal Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deadline-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <input id="id1" type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput1111" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1111"
                                    value="{{ $employee->nationality }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput2222" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input flexRadioDefault1" id="flexRadioDef" name="gender" type="radio" value="male"
                                        @checked($employee->gender=='male')>
                                    <label class="form-check-label" for="flexRadioDef">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input flexRadioDefault1" id="flexRadioDefau" type="radio" name="gender" value="female"
                                        @checked($employee->gender=='female')>
                                    <label class="form-check-label" for="flexRadioDefau">
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput3333" class="form-label">Marital Status</label>
                                <input type="text" class="form-control" id="exampleFormControlInput3333"
                                    value="{{ $employee->marital_status }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput4444" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="exampleFormControlInput4444"
                                    value="{{ $employee->date_of_birth }}">

                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput5555" class="form-label">Passport No</label>
                                <input type="text" class="form-control" id="exampleFormControlInput5555"
                                    value="{{ $employee->passport_identity }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput6666" class="form-label">National Identity</label>
                                <input type="text" class="form-control" id="exampleFormControlInput6666"
                                    value="{{ $employee->national_identity }}">
                                @error('national_identity')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput7777" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="exampleFormControlInput7777"
                                    value="{{ $employee->emergency_contact }}">

                            </div>

                            <div class="col-6">
                                <label for="exampleFormControlInput8888" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleFormControlInput8888"
                                    value="{{ $employee->address }}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn1-submit" class="btn btn-primary">update</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Bank Info-->
    <div class="modal fade" id="edit2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="edit2Label"> Bank information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deadline-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input type="hidden" id="id2" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput1211" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1211"
                                    value="{{ $employee->bank_name }}">
                            </div>

                            <div class="col">
                                <label for="exampleInputAccount" class="form-label">Account No.</label>
                                <input type="text" class="form-control" id="exampleInputAccount"
                                    value="{{ $employee->account_number }}">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput3233" class="form-label">Bank Branch</label>
                                <input type="text" class="form-control" id="exampleFormControlInput3233"
                                    value="{{ $employee->bank_branch }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput4244" class="form-label">IPan</label>
                                <input type="text" class="form-control" id="exampleFormControlInput4244"
                                    value="{{ $employee->ipan }}">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput5255" class="form-label">Swift No</label>
                                <input type="text" class="form-control" id="exampleFormControlInput5255" " value=" {{
                                    $employee->swift_number }}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn2-submit" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employee Info-->
    <div class="modal fade" id="edit3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="edit3Label"> Employee Work Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deadline-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input id="id3" type="hidden" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput1131" class="form-label">Career</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1131"
                                    value="{{ $employee->career }}">

                            </div>

                            <div class="col">
                                <label for="exampleFormWorkStart" class="form-label">Working Start Date</label>
                                <input type="date" class="form-control" id="exampleFormWorkStart"
                                    value="{{ $employee->work_start }}">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput33_3" class="form-label">Duration Of Contract</label>
                                <input type="text" class="form-control" id="exampleFormControlInput33_3"
                                    value="{{ $employee->duration_of_contract }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput4434" class="form-label">Contract Expiration</label>
                                <input type="date" class="form-control" id="exampleFormControlInput4434"
                                    value="{{ $employee->contract_expire }}">

                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput5535" class="form-label">Branch</label>
                                <select class="form-select" id="exampleFormControlInput5535"
                                    aria-label="Default select example">
                                    <option disabled selected>Branch</option>
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" @selected($employee->branch_id==$branch->id)>{{
                                        $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput6636" class="form-label">Shift</label>
                                <select class="form-select" id="exampleFormControlInput6636"
                                    aria-label="Default select example">
                                    <option disabled selected>Shift</option>
                                    @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}" @selected($employee->shift_id==$shift->id)>{{
                                        $shift->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col">
                                <label for="exampleFormControlInput7737" class="form-label">department</label>
                                <select class="form-select" id="exampleFormControlInput7737" name="department_id"
                                    aria-label="Default select example">
                                    <option disabled selected>department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" @selected($employee->
                                        department_id==$department->id)>{{ $department->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput8838" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlInput8838"
                                    rows="3">{{ $employee->description }}</textarea>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn3-submit" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Other Info-->
    <div class="modal fade" id="edit4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="edit4Label">Profile Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deadline-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input type="hidden" id="id4" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput1114" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1114"
                                    value="{{ $employee->name }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput2224" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2224"
                                    value="{{ $employee->last_name }}">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput3334" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput3334"
                                    value="{{ $employee->phone }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput4440" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput4440"
                                    value="{{ $employee->email }}">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput5554" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput5554">

                            </div>

                            <div class="col-6">
                                <label for="exampleFormControlInput6664" class="form-label">Image</label>
                                <input type="file" class="form-control" id="exampleFormControlInput6664">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <div class="col">
                                    <label for="exampleFormControlInput977" class="form-label">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input flexRadioDefault44" id="active" name="status" type="radio" value="1"
                                            @checked($employee->active==1)>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input flexRadioDefault44" id="inactive" name="status" type="radio" value="0"
                                            @checked($employee->active==0)>
                                        <label class="form-check-label" for="inactive">
                                            In Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn4-sub" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Salary Info-->
    <div class="modal fade" id="edit5" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="edit5Label">Salary information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deadline-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input type="hidden" id="id5" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput1115" class="form-label">Monthly Salary</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1115"
                                    value="{{ $employee->monthly_salary }}">

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput2225" class="form-label">Daily Salary</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2225"
                                    value="{{ $employee->daily_salary }}">

                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput3335" class="form-label">Hourly Salary</label>
                                <input type="text" class="form-control" id="exampleFormControlInput3335"
                                    value="{{ $employee->hourly_salary }}">

                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn5-sub" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
