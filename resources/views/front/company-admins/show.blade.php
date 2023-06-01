<x-layouts.header title="{{ $admin->name }}"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">{{ $admin->name }}</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.admins.index') }}"></i>Admins</a>
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
                        <h6 class="mb-0 fw-bold ">{{ $admin->name }}</h6>
                        <a  class="btn p-0" href="{{ route('company.admins.edit',$admin->id) }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card teacher-card  mb-3">
                        <div class="card-body  d-flex teacher-fulldeatil">
                            <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                                <a href="#">
                                    <img src="{{ asset($admin->image) }}" alt=""
                                        class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                </a>
                                <div
                                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                    <h6 class="mb-0 fw-bold d-block fs-6">{{ $admin?->role?->name }}</h6>
                                    <span class="text-muted small">Admin Id : {{ $admin->id }}</span>
                                </div>
                            </div>
                            <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ $admin->name }}
                                </h6>
                                <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted"></span>
                                <div class="row g-2 pt-2">
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-ui-touch-phone"></i>
                                            <span class="ms-2 small">{{ $admin->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-email"></i>
                                            <span class="ms-2 small">{{ $admin->email }}</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-address-book"></i>
                                            <span class="ms-2 small">{{ $admin->company->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @can('logs')
                <div class="row g-3">


                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Admin Logs</h6>
                            </div>
                            <div class="card-body">
                                <div class="row clearfix g-3">
                                    <div class="col-sm-12">
                                          <div class="card mb-3">
                                            <table class="table table-hover align-middle mb-0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Employee</th>
                                                        <th>Admin</th>
                                                        <th>Title</th>
                                                        <th>Log</th>
                                                        <th>Created At</th>
                                                        <th>Show</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($admin->logs as $log)

                                                    <tr>
                                                        <td>
                                                            {{ $log->id }}
                                                        </td>
                                                       <td>
                                                           <img class="avatar rounded-circle" src="{{ asset( $log->user->image ) }}" alt="">
                                                           <a href="{{ route('company.employees.show',$log->user->id) }}" class="fw-bold text-secondary">
                                                           <span class="fw-bold ms-1">{{ $log->user->name }}</span></a>
                                                       </td>
                                                       <td>
                                                        <img class="avatar rounded-circle" src="{{ asset( $log->admin->image ) }}" alt="">
                                                        <a href="{{ route('company.admins.show',$log->admin->id) }}" class="fw-bold text-secondary">
                                                        <span class="fw-bold ms-1">{{ $log->admin->name }}</span></a>
                                                        </td>
                                                       <td>
                                                        {{ $log->on }}
                                                       </td>

                                                       <td>
                                                        {{ $log->log }}
                                                       </td>
                                                       <td>
                                                        {{ $log->created_at }}
                                                       </td>
                                                       <td>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <a class="btn btn-outline-secondary" href="{{ route('company.logs.show',$log->id) }}"><i class="icofont-location-arrow"></i></a>
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                </tbody>
                                            </table>
                                          </div>
                                    </div>
                                  </div><!-- Row End -->
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

</x-layouts.app>
