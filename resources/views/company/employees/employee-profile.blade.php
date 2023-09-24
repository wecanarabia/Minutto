<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.EMPLOYEES')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.employees.index') }}">@lang('views.EMPLOYEES')</a></li>
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
                <!-- start profile -->
                <div class="card">
                    <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account"
                                type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                                <i class="ti ti-user-circle me-2 fs-6"></i>
                                <span class="d-none d-md-block">Profile</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications"
                                type="button" role="tab" aria-controls="pills-notifications" aria-selected="false">
                                <i class="ti ti-devices-up me-2 fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.IDENTITY')</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button"
                                role="tab" aria-controls="pills-bills" aria-selected="false">
                                <i class="ti ti-briefcase me-2 fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.WORK INFORMATION')</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security"
                                type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                                <i class="ti ti-calendar-dollar me-2 fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.SALARY INFORMATION')</span>
                            </button>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                                aria-labelledby="pills-account-tab" tabindex="0">
                                <div class="row">

                                    <div id="profile-data" class="col-lg-12">
                                        <button id="profile-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <div
                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    @if ($employee->image==null)

                                                    <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="72"
                                                        height="72" class="rounded-circle">
                                                    @else
                                                    <img src="{{ asset($employee->image) }}" alt="user4" width="72"
                                                        height="72" class="rounded-circle">
                                                    @endif

                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                            {{ $employee->name . ' ' . $employee->last_name }}</h6>
                                                        <p class="mb-0">{{ $employee->career }}</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.PHONE NUMBER')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->phone }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.EMAIL ADDRESS')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->email }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.PROFILE STATUS')</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ $employee->active == 1 ? 'Active' : 'In Active' }}</h6>
                                                </div>

                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.DESCRIPTION')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->description }}</h6>
                                                </div>




                                            </div>


                                        </div>
                                    </div>
                                    <div id="profile-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE PROFILE')</h5>
                                                <form method="post"
                                                    action="{{ route('front.employees.update', $employee->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1114"
                                                                class="form-label">@lang('views.NAME')</label>
                                                            <input type="text" name="name" class="form-control"
                                                                id="exampleFormControlInput1114"
                                                                value="{{ $employee->name }}">

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput2224"
                                                                class="form-label">@lang('views.LAST NAME')</label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                id="exampleFormControlInput2224"
                                                                value="{{ $employee->last_name }}">

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3334"
                                                                class="form-label">@lang('views.PHONE')</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                id="exampleFormControlInput3334"
                                                                value="{{ $employee->phone }}">

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4440"
                                                                class="form-label">@lang('views.EMAIL')</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="exampleFormControlInput4440"
                                                                value="{{ $employee->email }}">

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5554"
                                                                class="form-label">@lang('views.PASSWORD')</label>
                                                            <input type="password" name="password" class="form-control"
                                                                id="exampleFormControlInput5554">

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput6664"
                                                                class="form-label">@lang('views.IMAGE')</label>
                                                            <input type="file" name="image" class="form-control"
                                                                id="exampleFormControlInput6664">

                                                        </div>


                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput977"
                                                                class="form-label">@lang('views.PROFILE STATUS')</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input flexRadioDefault44"
                                                                    name="active" id="active" name="status" type="radio"
                                                                    value="1" @checked($employee->active == 1)>
                                                                <label class="form-check-label" for="active">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input flexRadioDefault44"
                                                                    name="active" id="inactive" name="status"
                                                                    type="radio" value="0" @checked($employee->active ==
                                                                0)>
                                                                <label class="form-check-label" for="inactive">
                                                                    @lang('views.IN ACTIVE')
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput8838"
                                                                class="form-label">@lang('views.DESCRIPTION')</label>
                                                            <textarea name="description" class="form-control"
                                                                id="exampleFormControlInput8838"
                                                                rows="3">{{ $employee->description }}</textarea>

                                                        </div>

                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="profile-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-notifications" role="tabpanel"
                                aria-labelledby="pills-notifications-tab" tabindex="0">
                                <div class="row">
                                    <div id="identity-data" class="col-lg-12">
                                        <button id="identity-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">
                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NATIONALITY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->nationality }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.DATE OF BIRTH')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->date_of_birth }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ADDRESS')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->address }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.GENDER')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->gender }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.MARITAL STATUS')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->marital_status }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.PASSPORT NO')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->passport_identity }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NATIONAL ID')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->national_identity }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.EMERGENCY CONTACT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->emergency_contact }}
                                                    </h6>
                                                </div>




                                            </div>

                                        </div>
                                    </div>
                                    <div id="identity-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE IDENTITY')</h5>
                                                <form method="post"
                                                    action="{{ route('front.employees.update', $employee->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1111"
                                                                class="form-label">@lang('views.NATIONALITY')</label>
                                                            <input type="text" name="nationality" class="form-control"
                                                                id="exampleFormControlInput1111"
                                                                value="{{ $employee->nationality }}">

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput2222"
                                                                class="form-label">@lang('views.GENDER')</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input flexRadioDefault1"
                                                                    name="gender" id="flexRadioDef" name="gender"
                                                                    type="radio" value="male" @checked($employee->gender
                                                                == 'male')>
                                                                <label class="form-check-label" for="flexRadioDef">
                                                                    @lang('views.MALE')
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input flexRadioDefault1"
                                                                    name="gender" id="flexRadioDefau" type="radio"
                                                                    name="gender" value="female"
                                                                    @checked($employee->gender == 'female')>
                                                                <label class="form-check-label" for="flexRadioDefau">
                                                                    @lang('views.FEMALE')
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3333"
                                                                class="form-label">@lang('views.MARITAL STATUS')</label>
                                                            <input type="text" class="form-control"
                                                                name="marital_status" id="exampleFormControlInput3333"
                                                                value="{{ $employee->marital_status }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4444"
                                                                class="form-label">@lang('views.DATE OF BIRTH')</label>
                                                            <input type="date" class="form-control" name="date_of_birth"
                                                                id="exampleFormControlInput4444"
                                                                value="{{ $employee->date_of_birth }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5555"
                                                                class="form-label">@lang('views.PASSPORT NO')</label>
                                                            <input type="text" class="form-control"
                                                                name="passport_identity"
                                                                id="exampleFormControlInput5555"
                                                                value="{{ $employee->passport_identity }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput6666"
                                                                class="form-label">@lang('views.NATIONAL ID')</label>
                                                            <input type="text" name="national_identity"
                                                                class="form-control" id="exampleFormControlInput6666"
                                                                value="{{ $employee->national_identity }}">
                                                        </div>


                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput7777"
                                                                class="form-label">@lang('views.EMERGENCY CONTACT')</label>
                                                            <input type="text" name="emergency_contact"
                                                                class="form-control" id="exampleFormControlInput7777"
                                                                value="{{ $employee->emergency_contact }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput8888"
                                                                class="form-label">@lang('views.ADDRESS')</label>
                                                            <input type="text" name="address" class="form-control"
                                                                id="exampleFormControlInput8888"
                                                                value="{{ $employee->address }}">
                                                        </div>

                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="identity-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bills" role="tabpanel"
                                aria-labelledby="pills-bills-tab" tabindex="0">
                                <div class="row">
                                    <div id="work-data" class="col-lg-12">
                                        <button id="work-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">
                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.JOP')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->career }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.WORKING START DATE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->work_start }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.DURATION OF CONTRACT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->duration_of_contract }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.CONTRACT EXPIRATION')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->contract_expire }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">

                                                    <p class="mb-1 fs-2">@lang('views.BRANCH')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->branch?->name }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.SHIFT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->shift?->name }}

                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">

                                                    <p class="mb-1 fs-2">@lang('views.DEPARTMENT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->department?->name }}

                                                    </h6>
                                                </div>





                                            </div>

                                        </div>
                                    </div>
                                    <div id="work-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE PROFILE')</h5>
                                                <form method="post"
                                                    action="{{ route('front.employees.update', $employee->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1131" class="form-label">@lang('views.CAREER')</label>
                                                            <input type="text" name="career" class="form-control" id="exampleFormControlInput1131"
                                                                value="{{ $employee->career }}">


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput33_3" class="form-label">@lang('views.DURATION OF CONTRACT')</label>
                                                            <input type="text" name="duration_of_contract" class="form-control" id="exampleFormControlInput33_3"
                                                                value="{{ $employee->duration_of_contract }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4434" class="form-label">@lang('views.CONTRACT EXPIRATION')</label>
                                                            <input type="date" name="contract_expire" class="form-control" id="exampleFormControlInput4434"
                                                                value="{{ $employee->contract_expire }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5535" class="form-label">@lang('views.BRANCH')</label>
                                                            <select class="form-select" name="branch_id" id="exampleFormControlInput5535"
                                                                aria-label="Default select example">
                                                                <option disabled selected>Branch</option>
                                                                @foreach ($branches as $branch)
                                                                <option value="{{ $branch->id }}" @selected($employee->branch_id==$branch->id)>{{
                                                                    $branch->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput6636" class="form-label">@lang('views.SHIFT')</label>
                                                            <select class="form-select" name="shift_id" id="exampleFormControlInput6636"
                                                                aria-label="Default select example">
                                                                <option disabled selected>Shift</option>
                                                                @foreach ($shifts as $shift)
                                                                <option value="{{ $shift->id }}" @selected($employee->shift_id==$shift->id)>{{
                                                                    $shift->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput7737" class="form-label">@lang('views.DEPARTMENT')</label>
                                                            <select class="form-select" name="department_id" id="exampleFormControlInput7737" name="department_id"
                                                                aria-label="Default select example">
                                                                <option disabled selected>department</option>
                                                                @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}" @selected($employee->
                                                                    department_id==$department->id)>{{ $department->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>




                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="work-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-security" role="tabpanel"
                                aria-labelledby="pills-security-tab" tabindex="0">
                                <div class="row">
                                    <div id="bank-data" class="col-lg-12">
                                        <button id="bank-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>
                                        <div class="chat-list chat active-chat" data-user-id="1">
                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.BANK NAME')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->bank_name }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ACCOUNT NO.')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->account_number }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.BANK BRANCH')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->bank_branch }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.IPAN')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->ipan }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.SWIFT NO')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->swift_number }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.MONTHLY SALARY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->monthly_salary }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.DAILY SALARY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->daily_salary }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.HOURLY SALARY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $employee->hourly_salary }}
                                                    </h6>
                                                </div>





                                            </div>

                                        </div>
                                    </div>
                                    <div id="bank-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE BANK INFO')</h5>
                                                <form method="post"
                                                    action="{{ route('front.employees.update', $employee->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1211" class="form-label">@lang('views.BANK NAME')</label>
                                                            <input type="text" name="bank_name" class="form-control" id="exampleFormControlInput1211"
                                                                value="{{ $employee->bank_name }}">


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleInputAccount" class="form-label">@lang('views.ACCOUNT NO.')</label>
                                                            <input type="text" name="account_number" class="form-control" id="exampleInputAccount"
                                                                value="{{ $employee->account_number }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3233" class="form-label">@lang('views.BANK BRANCH')</label>
                                                            <input type="text" class="form-control" name="bank_branch" id="exampleFormControlInput3233"
                                                                value="{{ $employee->bank_branch }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4244" class="form-label">@lang('views.IPAN')</label>
                                                            <input type="text" class="form-control" name="ipan" id="exampleFormControlInput4244"
                                                                value="{{ $employee->ipan }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5255" class="form-label">@lang('views.SWIFT NO')</label>
                                                            <input type="text" name="swift_number" class="form-control" id="exampleFormControlInput5255" " value=" {{
                                                                $employee->swift_number }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1115" class="form-label">@lang('views.MONTHLY SALARY')</label>
                                                            <input type="text" class="form-control" name="monthly_salary" id="exampleFormControlInput1115"
                                                                value="{{ $employee->monthly_salary }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput2225" class="form-label">@lang('views.DAILY SALARY')</label>
                                                            <input type="text" class="form-control" name="daily_salary" id="exampleFormControlInput2225"
                                                                value="{{ $employee->daily_salary }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3335" class="form-label">@lang('views.HOURLY SALARY')</label>
                                                            <input type="text" class="form-control" name="hourly_salary" id="exampleFormControlInput3335"
                                                                value="{{ $employee->hourly_salary }}">
                                                        </div>




                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="bank-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

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
    <!-- end profile -->

    </div>
    </div>
    </div>
</x-front-layouts.app>
