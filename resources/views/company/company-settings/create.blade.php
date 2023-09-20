<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Add Company Settings</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">Add Company Settings</a></li>
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
                                            <h5 class="mb-0">Add General Settings</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.store') }}">
                                            @csrf
                                            <div class="row g-3 align-items-center">
                                                <div class="mb-4">
                                                    <label for="firstname" class="form-label">English Name</label>
                                                    <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$company?->getTranslation('name','en')??"") }}" required>
                                                    @error('english_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="lastname" class="form-label">Arabic Name</label>
                                                    <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$company?->getTranslation('name','ar')??"") }}" id="lastname" required>
                                                    @error('arabic_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label for="english_description" class="form-label">English Description</label>
                                                    <textarea class="form-control" id="english_description" name="english_description" rows="3">{{ old('english_description',$company?->getTranslation('description','en')??null) }}</textarea>
                                                    @error('english_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="arabic_description" class="form-label">Arabic Description</label>
                                                    <textarea class="form-control" id="arabic_description" name="arabic_description" rows="3">{{ old('arabic_description',$company?->getTranslation('description','ar')??NULL) }}</textarea>
                                                    @error('arabic_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Employees Count</label>
                                                    <input type="number" class="form-control" name="employees_count" value="{{ old('employees_count',$company->employees_count??0) }}" required>
                                                    @error('employees_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Number Of allowed leave (In Hours)</label>
                                                    <input type="number" class="form-control" name="leaves_count" value="{{ old('leaves_count',$company?->leaves_count) }}" required>
                                                    @error('leaves_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Number Of Employee Vacation Balance (In Days)</label>
                                                    <input type="number" class="form-control" name="holidays_count" value="{{ old('holidays_count',$company->holidays_count??0) }}" required>
                                                    @error('holidays_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Allowed Sick Leaves (in days)</label>
                                                    <input type="number" class="form-control" name="sick_leaves" value="{{ old('sick_leaves',$company->sick_leaves??0) }}" required>
                                                    @error('sick_leaves')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Percentage of Advances (%)</label>
                                                    <input type="number" class="form-control" name="advances_percentage" value="{{ old('advances_percentage',$company->advances_percentage??0) }}" required>
                                                    @error('advances_percentage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Overtime Rate (for overtime calculation)</label>
                                                    <input type="text" class="form-control" name="extra_rate" value="{{ old('extra_rate',$company->extra_rate??0) }}" required>
                                                    @error('extra_rate')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Subscription</label>
                                                    <select class="default-select form-control" name="subscription_id">
                                                        <option  selected disabled>Subscription</option>
                                                        @foreach ($subscriptions as $subscription)
                                                        <option value="{{ $subscription->id }}" @selected(old('subscription_id',$company?->subscription_id??"") == $subscription->id)>{{ $subscription->name  }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subscription_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Timezone</label>
                                                    <select class="default-select form-control" name="timezone">
                                                        <option  selected disabled>Timezone</option>
                                                        @foreach ($timezones as $timezone)
                                                        <option value="{{ $timezone }}" @selected(old('timezone',$company?->timezone??'') == $timezone)>{{ $timezone  }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('timezone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Attendance Grace Period (HH:MM:SS)</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM:SS" name="grace_period" value="{{ old('grace_period',$company?->grace_period??0) }}" required>
                                                    @error('grace_period')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <input type="submit" value="Submit" class="btn btn-primary mt-4">
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
