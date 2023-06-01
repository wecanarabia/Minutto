<x-layouts.header title="Add Employee Vacation"/>
<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add Employee Vacation</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.employee-vacations.index') }}"></i>Employee Vacations</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Add Employee Vacation</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.employee-vacations.store') }}">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label class="form-label">Vacation Balance</label>
                                            <input type="number" class="form-control" name="vacation_balance" value="{{ old('vacation_balance') }}" required>
                                            @error('vacation_balance')
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
