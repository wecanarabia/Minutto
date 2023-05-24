<x-layouts.header title="{{ $log->user->name }} Incentive"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">{{ $log->user->name }} Log</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.logs.index') }}"></i>Logs</a>
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
                        <h6 class="mb-0 fw-bold ">{{ $log->user->name }} Log</h6>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">
                        @if ($log->user)

                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href={{ route('company.employees.show',$log->user->id) }}">
                                <img src="{{ asset($log->user->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">Employee</h6>
                                <span class="text-muted small">{{ $log->user->name }}</span>
                            </div>
                        </div>

                        @endif

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Admin</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted"><a href="{{ route('company.admins.show',$log->admin->id) }}">{{ $log->admin->name }}</a></span>
                                    </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Title</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->getTranslation('on','en') }}</span>
                                    </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Title</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->getTranslation('on','ar') }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Log</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->getTranslation('log','en') }}</span>
                                    </div>
                                </li>

                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Log</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->getTranslation('log','ar') }}</span>
                                    </div>
                                </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Note</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->note }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">created_at</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $log->created_at }}</span>
                                    </div>
                                 </li>


                            </ul>
                        </div>
                    </div>
                </div>
</x-layouts.app>
