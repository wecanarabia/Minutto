<x-layouts.header title="Company"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Company</h3>
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
                        <h6 class="mb-0 fw-bold ">{{ $company->name }}</h6>
                        <a  class="btn p-0" href="{{ route('company.company-settings.edit') }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->getTranslation('name', 'en') }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$company->getTranslation('name', 'ar')}}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Description</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->getTranslation('description', 'en') }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Description</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$company->getTranslation('description', 'ar')}}</span>
                                    </div>
                                </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Number of Employees</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->employees_count }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Code</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->code }}</span>
                                    </div>
                                 </li>
                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">allowed leaves count</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->leaves_count }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">allowed holidays count</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->holidays_count }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">allowed percentage advances</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->advances_percentage }}%</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Subscription</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->subscription->name }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Subscription End Date</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->subscription_end_date }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Timezone</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->timezone }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Allowed grace period</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $company->grace_period }}</span>
                                    </div>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                  <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="mb-0 fw-bold ">Branches</h6>
                    </div>
                      <div class="card-body">
                          <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>English Name</th>
                                      <th>Arabic Name</th>
                                      <th>Location</th>
                                      <th>Head</th>
                                      <th>Employees Number</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($company->branches as $branch)

                                  <tr>
                                      <td>
                                          {{ $branch->id }}
                                      </td>
                                      <td>
                                          {{ $branch->getTranslation('name', 'en') }}
                                     </td>
                                     <td>
                                      {{ $branch->getTranslation('name', 'ar') }}
                                     </td>
                                      <td>
                                      {{ $branch->location }}
                                     </td>
                                     <td>
                                      @if ($branch->head)
                                      <img class="avatar rounded-circle" src="{{ asset( $branch->head->image ) }}" alt="">
                                      <a href="{{ route('company.employees.show',$branch->head->id) }}" class="fw-bold text-secondary">
                                      <span class="fw-bold ms-1">{{ $branch->head->name }}</span></a>
                                      @else
                                          edit branch to add Head
                                      @endif
                                                                              </td>
                                     <td>{{ $branch->employees->count()??"NO Employees added" }}</td>
                                      <td>
                                          <div class="btn-group" role="group" aria-label="Basic outlined example">
                                              <a class="btn btn-outline-secondary" href="{{ route('company.branches.edit',$branch->id) }}"><i class="icofont-edit text-success"></i></a>
                                              <a class="btn btn-outline-secondary" href="{{ route('company.branches.show',$branch->id) }}"><i class="icofont-location-arrow"></i></a>
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
