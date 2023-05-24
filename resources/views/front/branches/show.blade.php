<x-layouts.header title="{{ $branch->name }}"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Branch</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.branches.index') }}"></i>Branches</a>
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
                        <h6 class="mb-0 fw-bold ">{{ $branch->name }}</h6>
                        <a  class="btn p-0" href="{{ route('company.branches.edit',$branch->id) }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">
                        @if ($branch->head)

                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href={{ route('company.employees.show',$branch->head->id) }}">
                                <img src="{{ asset($branch->head->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">Head</h6>
                                <span class="text-muted small">{{ $branch->head->name }}</span>
                            </div>
                        </div>
                        @else

                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <img class="avatar xl rounded-circle img-thumbnail shadow-sm" src="{{ asset('assets/images/lg/avatar13.png') }}" alt="profile">

                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">Update Head</h6>
                            </div>
                        </div>
                        @endif

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $branch->getTranslation('name', 'en') }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$branch->getTranslation('name', 'ar')}}</span>
                                    </div>
                                 </li>
                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Location</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $branch->location }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Number of Employees</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $branch->employees->count()??"NO Employees added" }}</span>
                                    </div>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix g-3">
                    <div class="col-sm-12">
                          <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">Shifts</h6>
                            </div>
                              <div class="card-body">
                                  <table class="table table-hover align-middle mb-0" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>Id</th>
                                              <th>English Name</th>
                                              <th>Arabic Name</th>
                                              <th>Workdays</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($branch->shifts as $shift)

                                          <tr>
                                              <td>
                                                  {{ $shift->id }}
                                              </td>
                                              <td>
                                                  {{ $shift->getTranslation('name', 'en') }}
                                             </td>
                                             <td>
                                              {{ $shift->getTranslation('name', 'ar') }}
                                             </td>
                                             <td>
                                              @if ($shift->workdays->where('status',1)->count()==0)
                                              <a href="{{ route('company.workdays.create') }}">Add workdays to shift</a>
                                                  @else
                                              <a href="{{ route('company.workdays.show',$shift->id) }}">{{ $shift->workdays->where('status',1)->count() }} Days</a>
                                              @endif
                                             </td>
                                              <td>
                                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                      <a class="btn btn-outline-secondary" href="{{ route('company.shifts.edit',$shift->id) }}"><i class="icofont-edit text-success"></i></a>
                                                      <a class="btn btn-outline-secondary" href="{{ route('company.shifts.show',$shift->id) }}"><i class="icofont-location-arrow"></i></a>
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                    </div>
                  </div><!-- Row End -->
</x-layouts.app>
