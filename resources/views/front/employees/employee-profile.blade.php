<x-layouts.app>
 <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">{{ $employee->name . $employee->last_name }}</h3>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        @if (session()->has('success'))
        <div class="alert alert-dismissible fade show" role="alert">
            <div class="row g-3">
                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="card teacher-card">
                        <div class="card-body d-flex teacher-fulldeatil">
                            
            <strong><i class="icofont-check-circled m-2 "></i>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            </div>
            </div>
        </div>
        @endif
        <div class="row g-3">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body  d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href="#">
                                <img src="{{ asset($employee->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">{{ $employee->carrer }}</h6>
                                <span class="text-muted small">Employee Id : {{ $employee->id }}</span>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6  class="mb-0 mt-2  fw-bold d-block fs-6">{{ $employee->name . $employee->last_name }}</h6>
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

                @if ($errors->all())
                <div class="row g-3">
                    <div class="col-xl-8 col-lg-12 col-md-12">
                        <div class="card teacher-card  mb-3">
                            <div class="card-body bg-info d-flex teacher-fulldeatil">
                                @foreach ($errors->all() as $error)
                                    <ul class="list-unstyled mb-0">
                                        <li class="row flex-wrap mb-3">
                                            <div class="col-12">
                                                <span class="fw-bold">{{ $error }}</span>
                                            </div>
                                        </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row g-3">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Personal Informations</h6>
                                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#edit1"><i class="icofont-edit text-primary fs-6"></i></button>
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
                                            <span class="fw-bold"Address</span>
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
                                     <li class="row flex-wrap">
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
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Bank information</h6>
                                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#edit2"><i class="icofont-edit text-primary fs-6"></i></button>
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
                </div>
                
                <div class="row g-3">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Employee Informations</h6>
                                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#edit3"><i class="icofont-edit text-primary fs-6"></i></button>
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
                                            <span class="text-muted">{{ $employee->branch->name }}</span>
                                        </div>
                                     </li>

                                     <li class="row flex-wrap mb-3">
                                        <div class="col-6">
                                            <span class="fw-bold">Shift</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="text-muted">{{ $employee->shift->name }}</span>
                                        </div>
                                     </li>
                               
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Other information</h6>
                                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#edit4"><i class="icofont-edit text-primary fs-6"></i></button>
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
                                            <span class="text-muted">{{ $employee->active?'Active':'In Active' }}</span>
                                        </div>
                                     </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Row End -->


    </div>
</div>



<!-- Edit Employee Personal Info-->
<div class="modal fade" id="edit1" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edit1Label"> Personal Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form method="POST" action="{{ route('company.employees.update',$employee->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput877" class="form-label">Nationality</label>
                                <input type="text" class="form-control" name="nationality" id="exampleFormControlInput877" value="{{ $employee->nationality }}">
                                @error('nationality')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput977" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" @checked($employee->gender=='male')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" @checked($employee->gender=='female')>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                     Female
                                    </label>
                                  </div>
                                  @error('gender')
                                  <div class="text-danger">{{ $message }}</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleFormControlInput9777" class="form-label">Marital Status</label>
                            <input type="number" class="form-control" id="exampleFormControlInput9777" name="marital_status" value="{{ $employee->marital_status }}">
                            @error('marital_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput2770" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="exampleFormControlInput2770" value="{{ $employee->date_of_birth }}">
                            @error('date_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        
                        <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleFormControlInput9777" class="form-label">Passport No</label>
                            <input type="number" class="form-control" id="exampleFormControlInput9777" name="passport_identity" value="{{ $employee->passport_identity }}">
                            @error('passport_identity')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput2770" class="form-label">National Identity</label>
                            <input type="date" class="form-control" name="date_of_birth" id="exampleFormControlInput2770" name="national_identity" value="{{ $employee->national_identity }}">
                            @error('national_identity')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput4777" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="exampleFormControlInput4777" name="emergency_contact" value="{{ $employee->emergency_contact }}">
                                @error('emergency_contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="update">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Bank Personal Info-->
<div class="modal fade" id="edit2" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edit2Label"> Bank information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form method="POST" action="{{ route('company.employees.update',$employee->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput8775" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput8775" name="bank_name" value="{{ $employee->bank_name }}">
                                @error('bank_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput977" class="form-label">Account No.</label>
                                <input type="text" class="form-control" id="exampleFormControlInput9775" name="account_number" value="{{ $employee->account_number }}">
                                @error('account_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleFormControlInput97775" class="form-label">Bank Branch</label>
                            <input type="text" class="form-control" id="exampleFormControlInput97775" name="bank_branch" value="{{ $employee->bank_branch }}">
                            @error('bank_branch')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput27705" class="form-label">IPan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput27705" name="ipan" value="{{ $employee->ipan }}">
                            @error('ipan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput47775" class="form-label">Swift No</label>
                                <input type="text" class="form-control" id="exampleFormControlInput47775" name="swift_number" value="{{ $employee->swift_number }}">
                                @error('swift_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="update">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Employee Employee Info-->
<div class="modal fade" id="edit3" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edit3Label"> Employee Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form method="POST" action="{{ route('company.employees.update',$employee->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput877" class="form-label">Career</label>
                                <input type="text" class="form-control" id="exampleFormControlInput877" name="career" value="{{ $employee->career }}">
                                @error('career')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput4777" class="form-label">Working Start Date</label>
                                <input type="text" class="form-control" id="exampleFormControlInput4777" name="start_work" value="{{ $employee->start_work }}">
                                @error('start_work')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleFormControlInput9777" class="form-label">Duration Of Contract</label>
                            <input type="number" class="form-control" id="exampleFormControlInput9777" name="duration_of_contract" value="{{ $employee->duration_of_contract }}">
                            @error('duration_of_contract')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput2770" class="form-label">Contract Expiration</label>
                            <input type="date" class="form-control" name="contract_expire" id="exampleFormControlInput2770" value="{{ $employee->contract_expire }}">
                            @error('contract_expire')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col">
                            <label for="exampleFormControlInput9999" class="form-label">Branch</label>
                            <select class="form-select" id="exampleFormControlInput9999" name="branch_id" aria-label="Default select example">
                                <option disabled selected>Branch</option>
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" @selected($employee->branch_id==$branch->id)>{{ $branch->name }}</option>
                                @endforeach
                              </select>
                              @error('branch_id')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                            <label for="exampleFormControlInput2999" class="form-label">Shift</label>
                            <select class="form-select" id="exampleFormControlInput2999" name="shift_id" aria-label="Default select example">
                                <option disabled selected>Shift</option>
                                @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}" @selected($employee->shift_id==$shift->id)>{{ $shift->name }}</option>
                                @endforeach
                                @error('shift_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </select>
                            </div>    
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput977" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlInput977" rows="3">{{ $employee->description }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="update">
            </div>
        </form>
        </div>
    </div>
</div

<!-- Edit Bank Other Info-->
<div class="modal fade" id="edit4" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edit4Label"> Other information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form method="POST" action="{{ route('company.employees.update',$employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput8775" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput8775" name="name" value="{{ $employee->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput977" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput9775" name="last_name" value="{{ $employee->last_name }}">
                                @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleFormControlInput97775" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="exampleFormControlInput97775" name="phone" value="{{ $employee->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput27705" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput27705" name="email" value="{{ $employee->email }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="exampleFormControlInput47775" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput47775" name="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-6">
                                <label for="exampleFormControlInput47775" class="form-label">Image</label>
                                <input type="file" class="form-control" id="exampleFormControlInput47775" name="image">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <div class="col">
                                    <label for="exampleFormControlInput977" class="form-label">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" @checked($employee->status==1)>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Active
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" @checked($employee->status==0)>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                         In Active
                                        </label>
                                      </div>
                                      @error('status')
                                      <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="update">
            </div>
        </form>
        </div>
    </div>
</div>
</x-layouts.app>
