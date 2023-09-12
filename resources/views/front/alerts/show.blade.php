<x-layouts.header title="{{ $alert->user->name }} Alert"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">{{ $alert->user->name }} Alert</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.alerts.index') }}"></i>Alerts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->

        @if (session()->has('success'))
        <div class="alert alert-dismissible fade show" role="alert">
            <strong><i class="icofont-check-circled m-2 "></i>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row g-3">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="mb-0 fw-bold ">{{ $alert->user->name }} Alert</h6>
                        <a  class="btn p-0" href="{{ route('company.alerts.edit',$alert->id) }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">
                        @if ($alert->user)

                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href={{ route('company.employees.show',$alert->user->id) }}">
                                <img src="{{ asset($alert->user->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">Employee</h6>
                                <span class="text-muted small">{{ $alert->user->name }}</span>
                            </div>
                        </div>

                        @endif

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Alert Date</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $alert->alert_date }}</span>
                                    </div>
                                </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Note</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $alert->note }}</span>
                                    </div>
                                 </li>



                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Alert Type</span>
                                    </div>
                                    <div class="col-8">
                                     <span>{{ $alert->type }}</span>
                                    </div>
                                 </li>


                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Type's Value</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$alert->punishment}}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">File</span>
                                    </div>
                                    <div class="col-8">
                                        <a href="{{ route('company.alerts.file',$alert->id) }}" class="text-muted">{{ explode('/',$alert->file)[2]??null }}</a>
                                    </div>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
</x-layouts.app>
