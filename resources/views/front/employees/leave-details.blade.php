<x-layouts.header title="{{ $leave->user->name }}Leave Request"/>
<x-layouts.app>
    <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
   <div class="container-xxl">
       <div class="row clearfix">
           <div class="col-md-12">
               <div class="card border-0 mb-4 no-bg">
                   <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                       <h3 class=" fw-bold flex-fill mb-0">Leave Request Details</h3>
                       <div class="col-auto d-flex w-sm-100">
                        <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.leaves.index') }}"></i>Leave Requests</a>
                    </div>
                   </div>
               </div>
           </div>
       </div><!-- Row End -->


       <div class="row g-3">
           <div class="col-xl-12 col-lg-12 col-md-12">
               <div class="card teacher-card  mb-3">
                   <div class="card-header py-3 d-flex justify-content-between">
                       <h6 class="mb-0 fw-bold ">{{ $leave->user->name }}</h6>
                       <button type="button" class="btn p-0" data-bs-toggle="modal"
                                       data-bs-target="#edit-leave"><i class="icofont-edit text-primary fs-6"></i></button>

                   </div>
                   <div class="card-body  d-flex teacher-fulldeatil">

                       <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                           <a href={{ route('company.employees.show',$leave->user->id) }}">
                               <img src="{{ asset($leave->user->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                           </a>
                           <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                               <span class="text-muted small">{{ $leave->user->name." ".$leave->user->last_name }}</span>
                           </div>
                       </div>


                       <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                           <ul class="list-unstyled mb-0">
                               <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">leave Date</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->leave_date }}</span>
                                   </div>
                               </li>
                               <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">From</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{$leave->from}}</span>
                                   </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">To</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->to }}</span>
                                   </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Note</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->note }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Replay</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->replay }}</span>
                                   </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Period</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->period }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Leave Time</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->time_leave }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Back Time</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->time_back }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Discount</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->discount_value }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">delay period</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->late_period }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">delay Status</span>
                                   </div>
                                   <div class="col-8">
                                    <span @class(['badge','bg-success'=>$leave->getTranslation('time_status','en')=='disciplined',
                                        'bg-danger'=>$leave->getTranslation('time_status','en')=='late',
                                        ])>{{ $leave->time_status }}</span>
                                   </div>
                                </li>




                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Status</span>
                                   </div>
                                   <div class="col-8">
                                    <span @class(['badge','bg-success'=>$leave->getTranslation('status','en')=='approve',
                                        'bg-danger'=>$leave->getTranslation('status','en')=='rejected',
                                        'bg-info'=>$leave->getTranslation('status','en')=='waiting',
                                        ])>{{ $leave->status }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">Leave Type</span>
                                   </div>
                                   <div class="col-8">
                                       <span class="text-muted">{{ $leave->ltype->name }}</span>
                                   </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                   <div class="col-4">
                                       <span class="fw-bold">File</span>
                                   </div>
                                   <div class="col-8">
                                       <a href="{{ route('company.leaves.file',$leave->id) }}" class="text-muted">{{ explode('/',$leave->file)[2]??null }}</a>
                                   </div>
                                </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>

    <!-- Edit Employee Info-->
    <div class="modal fade" id="edit-leave" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title  fw-bold" id="edit-leaveLabel"> Edit leave</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="deadline-form">
                       <div class="alert alert-danger print-error-msg" style="display:none">
                           <ul></ul>
                       </div>
                       <input id="id-leave" type="hidden" value="{{ $leave->id }}">
                       <div class="row g-3 mb-3">
                           <div class="col-sm-6">
                               <label for="exampleFormleaveStatus" class="form-label">Status</label>
                               <select class="form-select" id="exampleFormleaveStatus"
                                   aria-label="Default select example">
                                   <option disabled selected>Status</option>
                                   @foreach ($allStatus as $status)
                                   <option value="{{ json_encode($status) }}" @selected($leave->status==$status[Illuminate\Support\Facades\App::getLocale()])>
                                   {{$status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-sm-6">
                            <label for="exampleFormControlleavediscount" class="form-label">Discount</label>
                            <input type="text" class="form-control"
                                id="exampleFormControlleavediscount" value="{{ $leave->discount_value }}">
                        </div>
                       </div>
                        <div class="row g-3 mb-3">



                            <div class="col-sm-6">
                                <label for="exampleFormControlleavereplay" class="form-label">Replay</label>
                                <textarea class="form-control" name="replay"
                                    id="exampleFormControlleavereplay">{{ $leave->replay }}</textarea>
                            </div>

                            <div class="col-sm-6">
                                <label for="exampleFormControlleavenote" class="form-label">Note</label>
                                <textarea class="form-control" name="note"
                                    id="exampleFormControlleavenote">{{ $leave->note }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button id="leave-submit" class="btn btn-primary">update</button>
                        </div>
                       </div>


                   </div>
               </div>

           </div>
       </div>
   </div>
           </x-layouts.app>
