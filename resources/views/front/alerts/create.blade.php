<x-layouts.header title="Add Alert"/>
<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add Alert</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.alerts.index') }}"></i>Alerts</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Add Alert</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.alerts.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label class="form-label">Alert Date</label>
                                            <input type="date" class="form-control" name="alert_date" value="{{ old('alert_date') }}" required>
                                            @error('alert_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Employee</label>
                                            <select class="default-select form-control" name="user_id">
                                             <option Selected disabled>Employee</option>
                                             @foreach ($employees as $employee)
                                             <option value="{{ $employee->id }}" @selected(old('user_id') == $employee->id)>{{ $employee->name  }}</option>
                                             @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Note</label>
                                            <textarea  class="form-control" name="note" rows="3">{{ old('note') }}</textarea>
                                            @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                       </div>


                                         <div class="col-md-6">
                                            <label class="form-label">Alert Type</label>
                                            <select class="default-select form-control" name="type">
                                             <option Selected disabled>Type</option>
                                             @foreach ($types as $type)
                                             <option value="{{ json_encode($type) }}" @selected(old('type') == json_encode($type))>{{ $type[Illuminate\Support\Facades\App::getLocale()]  }}</option>
                                             @endforeach
                                            </select>
                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                         <div class="col-md-6">
                                            <label class="form-label">Type's Value (days-amount)</label>
                                            <input type="number" class="form-control" name="punishment" value="{{ old('punishment') }}" required>
                                            @error('punishment')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                               

                                         <div class="col-md-6">
                                            <label class="form-label">File</label>
                                            <input type="file" class="form-control" name="file">
                                            @error('file')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <input type="submit" value="Save" class="btn btn-primary mt-4">
                                </form>
                            </div>
                        </div>


                    </div>
                </div><!-- Row end  -->

            </div>
        </div>
</x-layouts.app>
