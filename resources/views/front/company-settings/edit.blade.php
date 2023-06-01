<x-layouts.header title="{{ $company->name }}"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-3">
       <div class="container-xxl">
           <div class="row align-items-center">
               <div class="border-0 mb-4">
                   <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                       <h3 class="fw-bold mb-0">{{ $company->name }}</h3>
                       <a class="btn btn-dark btn-set-task w-sm-100 mx-2 " href="{{ route('company.company-settings.show',$company->id) }}"></i>{{ $company->name }}</a>

                   </div>
               </div>
           </div> <!-- Row end  -->

           <div class="row align-item-center">
               <div class="col-md-12">
                   <div class="card mb-3">
                       <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                           <h6 class="mb-0 fw-bold ">{{ $company->name }}</h6>
                       </div>
                       <div class="card-body">
                           <form method="post" action="{{ route('company.company-settings.update') }}">
                               @csrf
                               @method('put')
                               <input type="hidden" value="{{ Auth::guard('company')->user()->company_id }}">
                               <div class="row g-3 align-items-center">
                                   <div class="col-md-6">
                                       <label for="firstname" class="form-label">English Name</label>
                                       <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$company?->getTranslation('name','en')??"") }}" required>
                                       @error('english_name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <label for="lastname" class="form-label">Arabic Name</label>
                                       <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$company?->getTranslation('name','ar')??"") }}" id="lastname" required>
                                       @error('arabic_name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="col-md-6">
                                       <label for="english_description" class="form-label">English Description</label>
                                       <textarea class="form-control" id="english_description" name="english_description" rows="3">{{ old('english_description',$company?->getTranslation('description','en')??null) }}</textarea>
                                       @error('english_description')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <label for="arabic_description" class="form-label">Arabic Description</label>
                                       <textarea class="form-control" id="arabic_description" name="arabic_description" rows="3">{{ old('arabic_description',$company?->getTranslation('description','ar')??NULL) }}</textarea>
                                       @error('arabic_description')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <label class="form-label">Employees Count</label>
                                       <input type="number" class="form-control" name="employees_count" value="{{ old('employees_count',$company->employees_count??0) }}" required>
                                       @error('employees_count')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <label class="form-label">Allowed Leaves Count (In Hours)</label>
                                       <input type="number" class="form-control" name="leaves_count" value="{{ old('leaves_count',$company?->leaves_count) }}" required>
                                       @error('leaves_count')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="col-md-6">
                                       <label class="form-label">Allowed Holidays Count (in days)</label>
                                       <input type="number" class="form-control" name="holidays_count" value="{{ old('holidays_count',$company->holidays_count??0) }}" required>
                                       @error('holidays_count')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="col-md-6">
                                    <label class="form-label">Allowed Sick Leaves (in days)</label>
                                    <input type="number" class="form-control" name="sick_leaves" value="{{ old('sick_leaves',$company->sick_leaves??0) }}" required>
                                    @error('sick_leaves')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                   <div class="col-md-6">
                                       <label class="form-label">Percentage of Advances (%)</label>
                                       <input type="number" class="form-control" name="advances_percentage" value="{{ old('advances_percentage',$company->advances_percentage??0) }}" required>
                                       @error('advances_percentage')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="col-md-6">
                                    <label class="form-label">Overtime Rate (for ocertime calculation)</label>
                                    <input type="text" class="form-control" name="extra_rate" value="{{ old('extra_rate',$company->extra_rate??0) }}" required>
                                    @error('extra_rate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                   <div class="col-md-6">
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
                                   <div class="col-md-6">
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

                                   <div class="col-md-6">
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
           </div><!-- Row end  -->

       </div>
   </div>
</x-layouts.app>
