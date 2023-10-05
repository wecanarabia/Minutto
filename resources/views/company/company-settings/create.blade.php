<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.ADD COMPANY SETTINGS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">@lang('views.ADD COMPANY SETTINGS')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">

                <div class="widget-content searchable-container list">

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="mb-0">@lang('views.ADD GENERAL SETTINGS')</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.store') }}">
                                            @csrf
                                            <div class="row g-3 align-items-center">
                                                <div class="mb-4">
                                                    <label for="firstname" class="form-label">@lang('views.ENGLISH NAME')</label>
                                                    <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$company?->getTranslation('name','en')??"") }}" required>
                                                    @error('english_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="lastname" class="form-label">@lang('views.ARABIC NAME')</label>
                                                    <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$company?->getTranslation('name','ar')??"") }}" id="lastname" required>
                                                    @error('arabic_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label for="english_description" class="form-label">@lang('views.ENGLISH DESCRIPTION')</label>
                                                    <textarea class="form-control" id="english_description" name="english_description" rows="3">{{ old('english_description',$company?->getTranslation('description','en')??null) }}</textarea>
                                                    @error('english_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="arabic_description" class="form-label">@lang('views.ARABIC DESCRIPTION')</label>
                                                    <textarea class="form-control" id="arabic_description" name="arabic_description" rows="3">{{ old('arabic_description',$company?->getTranslation('description','ar')??NULL) }}</textarea>
                                                    @error('arabic_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.EMPLOYEES COUNT')</label>
                                                    <input type="number" class="form-control" name="employees_count" value="{{ old('employees_count',$company->employees_count??0) }}" required>
                                                    @error('employees_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.NUMBER OF ALLOWED DEPARTURE') @lang('views.IN HOURS')</label>
                                                    <input type="number" class="form-control" name="leaves_count" value="{{ old('leaves_count',$company?->leaves_count) }}" required>
                                                    @error('leaves_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.NUMBER OF EMPLOYEE VACATION BALANCE') @lang('views.IN DAYS')</label>
                                                    <input type="number" class="form-control" name="holidays_count" value="{{ old('holidays_count',$company->holidays_count??0) }}" required>
                                                    @error('holidays_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.ALLOWED SICK LEAVES') @lang('views.IN DAYS')</label>
                                                    <input type="number" class="form-control" name="sick_leaves" value="{{ old('sick_leaves',$company->sick_leaves??0) }}" required>
                                                    @error('sick_leaves')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.NUMBER OF EMPLOYEE ADVANCES IN MONTH')</label>
                                                    <input type="number" class="form-control" name="advances_count" value="{{ old('advances_count',$company->advances_count??0) }}" required>
                                                    @error('advances_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.PERCENTAGE OF ADVANCES') (%)</label>
                                                    <input type="number" class="form-control" name="advances_percentage" value="{{ old('advances_percentage',$company->advances_percentage??0) }}" required>
                                                    @error('advances_percentage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.OVERTIME RATE') @lang('views.OVERTIME CALC')</label>
                                                    <input type="text" class="form-control" name="extra_rate" value="{{ old('extra_rate',$company->extra_rate??0) }}" required>
                                                    @error('extra_rate')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.SUBSCRIPTION')</label>
                                                    <select class="default-select form-control" name="subscription_id">
                                                        <option  selected disabled>@lang('views.SUBSCRIPTION')</option>
                                                        @foreach ($subscriptions as $subscription)
                                                        <option value="{{ $subscription->id }}" @selected(old('subscription_id',$company?->subscription_id??"") == $subscription->id)>{{ $subscription->name  }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subscription_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.TIMEZONE')</label>
                                                    <select class="default-select form-control" name="timezone">
                                                        <option  selected disabled>
                                                            <label class="form-label">@lang('views.TIMEZONE')</option>
                                                        @foreach ($timezones as $timezone)
                                                        <option value="{{ $timezone }}" @selected(old('timezone',$company?->timezone??'') == $timezone)>{{ $timezone  }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('timezone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.CURRENCY')</label>
                                                    <select class="default-select form-control" name="currency">
                                                        <option  selected disabled>@lang('views.CURRENCY')</option>
                                                        @foreach ($currencies as $currency)
                                                        <option value="{{ $currency }}" @selected(old('currency',$company?->currency??'') == $currency)>{{ $currency  }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('currency')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">@lang('views.ATTENDANCE GRACE PERIOD') (HH:MM:SS)</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM:SS" name="grace_period" value="{{ old('grace_period',$company?->grace_period??0) }}" required>
                                                    @error('grace_period')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <input type="submit" value="@lang('views.NEXT')" class="btn btn-primary mt-4">
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
    <!-- end profile -->

    </div>
    </div>
    </div>
</x-front-layouts.app>
