<x-layouts.header title="{{ $vacation->user->name }}Extra Request"/>
    <x-layouts.app>
        <!-- Body: Body -->
     <div class="body d-flex py-lg-3 py-md-2">
       <div class="container-xxl">
           <div class="row clearfix">
               <div class="col-md-12">
                   <div class="card border-0 mb-4 no-bg">
                       <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                           <h3 class=" fw-bold flex-fill mb-0">Extra Request Details</h3>
                           <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.employee-vacations.index') }}"></i>Employee Vacations</a>
                        </div>
                       </div>
                   </div>
               </div>
           </div><!-- Row End -->


           <div class="row g-3">
               <div class="col-xl-12 col-lg-12 col-md-12">
                   <div class="card teacher-card  mb-3">
                       <div class="card-header py-3 d-flex justify-content-between">
                           <h6 class="mb-0 fw-bold ">{{ $vacation->user->name }}</h6>
                           <button type="button" class="btn p-0" data-bs-toggle="modal"
                                           data-bs-target="#edit-evacation"><i class="icofont-edit text-primary fs-6"></i></button>

                       </div>
                       <div class="card-body  d-flex teacher-fulldeatil">

                           <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                               <a href={{ route('company.employees.show',$vacation->user->id) }}">
                                   <img src="{{ asset($vacation->user->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                               </a>
                               <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                   <span class="text-muted small">{{ $vacation->user->name." ".$vacation->user->last_name }}</span>
                               </div>
                           </div>


                           <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                               <ul class="list-unstyled mb-0">
                                   <li class="row flex-wrap mb-3">
                                       <div class="col-4">
                                           <span class="fw-bold">Vacation Balance</span>
                                       </div>
                                       <div class="col-8">
                                           <span class="text-muted">{{ $vacation->vacation_balance }}</span>
                                       </div>
                                   </li>
                                   <li class="row flex-wrap mb-3">
                                       <div class="col-4">
                                           <span class="fw-bold">Year</span>
                                       </div>
                                       <div class="col-8">
                                           <span class="text-muted">{{$vacation->year}}</span>
                                       </div>
                                    </li>
                                    





                               
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

        <!-- Edit Employee Info-->
        <div class="modal fade" id="edit-evacation" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title  fw-bold" id="edit-evacationLabel"> Edit Employee Vacation</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="deadline-form">
                           <div class="alert alert-danger print-error-msg" style="display:none">
                               <ul></ul>
                           </div>
                           <input id="id-evacation" type="hidden" value="{{ $vacation->id }}">

                 
                            <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label for="exampleFormControlevacationbalance" class="form-label">Vacation Balance</label>
                                        <input type="number" class="form-control"
                                            id="exampleFormControlevacationbalance" value="{{ $vacation->vacation_balance }}">
                                    </div>

                                </div>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button id="evacation-submit" class="btn btn-primary">update</button>
                            </div>
                           </div>


                       </div>
                   </div>

               </div>
           </div>
       </div>
               </x-layouts.app>
