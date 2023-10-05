<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">{{ $company->name }}</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">{{ $company->name }}</a></li>
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
                <!-- start profile -->
                <div class="card">
                    <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account"
                                type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                                <i class="ti ti-article-filled-filled fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.GENERAL')</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications"
                                type="button" role="tab" aria-controls="pills-notifications" aria-selected="false">
                                 <i class="ti ti-device-imac fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.HR')</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button"
                                role="tab" aria-controls="pills-bills" aria-selected="false">
                                <i class="ti ti-devices-check fs-6"></i>
                                <span class="d-none d-md-block">@lang('views.SUBSCRIPTION')</span>
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



                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ENGLISH NAME')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->getTranslation('name', 'en') }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ARABIC NAME')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->getTranslation('name', 'ar') }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.CODE')</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ $company->code }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.TIMEZONE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->timezone }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.CURRENCY')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->currency }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ENGLISH DESCRIPTION')</p>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ $company->getTranslation('description', 'en') }}</h6>
                                                </div>

                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ARABIC DESCRIPTION')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->getTranslation('description', 'ar') }}</h6>
                                                </div>






                                            </div>


                                        </div>
                                    </div>
                                    <div id="profile-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE GENERAL INFO')</h5>
                                                <form method="post" action="{{ route('front.company-settings.update') }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" value="{{ Auth::guard('company')->user()->company_id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="firstname" class="form-label">@lang('views.ENGLISH NAME')</label>
                                                            <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$company?->getTranslation('name','en')??"") }}" >


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="lastname" class="form-label">@lang('views.ARABIC NAME')</label>
                                                            <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$company?->getTranslation('name','ar')??"") }}" id="lastname" >


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="english_description" class="form-label">@lang('views.ENGLISH DESCRIPTION')</label>
                                                            <textarea class="form-control" id="english_description" name="english_description" rows="3">{{ old('english_description',$company?->getTranslation('description','en')??null) }}</textarea>


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="arabic_description" class="form-label">@lang('views.ARABIC DESCRIPTION')</label>
                                                             <textarea class="form-control" id="arabic_description" name="arabic_description" rows="3">{{ old('arabic_description',$company?->getTranslation('description','ar')??NULL) }}</textarea>


                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label class="form-label">@lang('views.TIMEZONE')</label>
                                                            <select class="default-select form-control" name="timezone">
                                                                <option  selected disabled>Timezone</option>
                                                                @foreach ($timezones as $timezone)
                                                                <option value="{{ $timezone }}" @selected(old('timezone',$company?->timezone??'') == $timezone)>{{ $timezone  }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label class="form-label">@lang('views.CURRENCY')</label>
                                                            <select class="default-select form-control" name="currency">
                                                                <option  selected disabled>Currency</option>
                                                                @foreach ($currencies as $currency)
                                                                <option value="{{ $currency }}" @selected(old('currency',$company?->currency??'') == $currency)>{{ $currency  }}</option>
                                                                @endforeach
                                                            </select>

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
                                                    <p class="mb-1 fs-2">@lang('views.NUMBER OF EMPLOYEES')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->employees_count }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NUMBER OF ALLOWED DEPARTURES') (In Hours)</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->leaves_count }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NUMBER OF EMPLOYEE VACATION BALANCE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->holidays_count }} Days</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ALLOWED NUMBER OF SICK DEPARTURES')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->sick_leaves }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.PERCENTAGE OF ADVANCES')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->advances_percentage }}%</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.NUMBER OF ADVANCES IN MONTH')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->advances_count }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.OVERTIME RATE PER HOUR')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->extra_rate }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ALLOWED GRACE PERIOD')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->grace_period }} Minutes
                                                    </h6>
                                                </div>






                                            </div>

                                        </div>
                                    </div>
                                    <div id="identity-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE HR INFO')</h5>
                                                <form method="post" action="{{ route('front.company-settings.update') }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" value="{{ Auth::guard('company')->user()->company_id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1111"
                                                                class="form-label">@lang('views.NUMBER OF EMPLOYEES')</label>
                                                                <input type="number" class="form-control" name="employees_count" value="{{ old('employees_count',$company->employees_count??0) }}" >


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput2222"
                                                                class="form-label">@lang('views.NUMBER OF ALLOWED DEPARTURES') (In Hours)</label>
                                                                <input type="number" class="form-control" name="leaves_count" value="{{ old('leaves_count',$company?->leaves_count) }}" >

                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3333"
                                                                class="form-label">@lang('views.NUMBER OF EMPLOYEE VACATION BALANCE') (In Days)</label>
                                                                <input type="number" class="form-control" name="holidays_count" value="{{ old('holidays_count',$company->holidays_count??0) }}" >
                                                            </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4444"
                                                                class="form-label">@lang('views.ALLOWED NUMBER OF SICK DEPARTURES') (in days)</label>
                                                                <input type="number" class="form-control" name="sick_leaves" value="{{ old('sick_leaves',$company->sick_leaves??0) }}" >

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5555"
                                                                class="form-label">@lang('views.PERCENTAGE OF ADVANCES')(%)</label>
                                                                <input type="number" class="form-control" name="advances_percentage" value="{{ old('advances_percentage',$company->advances_percentage??0) }}" >
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">@lang('views.NUMBER OF ADVANCES IN MONTH')</label>
                                                            <input type="number" class="form-control" name="advances_count" value="{{ old('advances_count',$company->advances_count??0) }}" required>

                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput6666"
                                                                class="form-label">@lang('views.OVERTIME RATE PER HOUR')(for overtime calculation)</label>
                                                                <input type="text" class="form-control" name="extra_rate" value="{{ old('extra_rate',$company->extra_rate??0) }}" required>

                                                        </div>


                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput7777"
                                                                class="form-label">@lang('views.ALLOWED GRACE PERIOD')(HH:MM:SS)</label>
                                                                <input type="text" class="form-control" placeholder="HH:MM:SS" name="grace_period" value="{{ old('grace_period',$company?->grace_period??0) }}" required>

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
                                                    <p class="mb-1 fs-2">@lang('views.SUBSCRIPTION')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->subscription->name }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.SUBSCRIPTION END DATE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->subscription_end_date }}</h6>
                                                </div>







                                            </div>

                                        </div>
                                    </div>
                                    <div id="work-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.UPDATE SUBSCRIPTION INFO')</h5>
                                                <form method="post" action="{{ route('front.company-settings.update') }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" value="{{ Auth::guard('company')->user()->company_id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label class="form-label">@lang('views.SUBSCRIPTION')</label>
                                                            <select class="default-select form-control" name="subscription_id">
                                                                <option  selected disabled>Subscription</option>
                                                                @foreach ($subscriptions as $subscription)
                                                                <option value="{{ $subscription->id }}" @selected(old('subscription_id',$company?->subscription_id??"") == $subscription->id)>{{ $subscription->name  }}</option>
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
                            {{-- <div class="tab-pane fade" id="pills-security" role="tabpanel"
                                aria-labelledby="pills-security-tab" tabindex="0">
                                <div class="row">
                                    <div id="bank-data" class="col-lg-12">
                                        <button id="bank-edit" class="btn btn-success float-end">Edit</button>
                                        <div class="chat-list chat active-chat" data-user-id="1">
                                            <div class="row">

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Bank Name</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->bank_name }}</h6>
                                                </div>
                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Account No.</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->account_number }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Bank Branch</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->bank_branch }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">IPAN</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->ipan }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Swift No</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->swift_number }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Monthly Salary</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->monthly_salary }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Daily Salary</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->daily_salary }}
                                                    </h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Hourly Salary</p>
                                                    <h6 class="fw-semibold mb-0">{{ $company->hourly_salary }}
                                                    </h6>
                                                </div>





                                            </div>

                                        </div>
                                    </div>
                                    <div id="bank-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Bank Info</h5>
                                                <form method="post"
                                                    action="{{ route('front.employees.update', $company->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $company->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1211" class="form-label">Bank Name</label>
                                                            <input type="text" name="bank_name" class="form-control" id="exampleFormControlInput1211"
                                                                value="{{ $company->bank_name }}">


                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleInputAccount" class="form-label">Account No.</label>
                                                            <input type="text" name="account_number" class="form-control" id="exampleInputAccount"
                                                                value="{{ $company->account_number }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3233" class="form-label">Bank Branch</label>
                                                            <input type="text" class="form-control" name="bank_branch" id="exampleFormControlInput3233"
                                                                value="{{ $company->bank_branch }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput4244" class="form-label">IPan</label>
                                                            <input type="text" class="form-control" name="ipan" id="exampleFormControlInput4244"
                                                                value="{{ $company->ipan }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput5255" class="form-label">Swift No</label>
                                                            <input type="text" name="swift_number" class="form-control" id="exampleFormControlInput5255" " value=" {{
                                                                $company->swift_number }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput1115" class="form-label">Monthly Salary</label>
                                                            <input type="text" class="form-control" name="monthly_salary" id="exampleFormControlInput1115"
                                                                value="{{ $company->monthly_salary }}">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput2225" class="form-label">Daily Salary</label>
                                                            <input type="text" class="form-control" name="daily_salary" id="exampleFormControlInput2225"
                                                                value="{{ $company->daily_salary }}">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleFormControlInput3335" class="form-label">Hourly Salary</label>
                                                            <input type="text" class="form-control" name="hourly_salary" id="exampleFormControlInput3335"
                                                                value="{{ $company->hourly_salary }}">
                                                        </div>




                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
                                                    <button id="bank-cancel" class="btn btn-dark">Cancel</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
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
