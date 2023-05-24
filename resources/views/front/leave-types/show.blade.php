<x-layouts.header title="{{ $type->name }}"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Leave Type</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.leave-types.index') }}"></i>Leave Types</a>
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
                        <h6 class="mb-0 fw-bold ">{{ $type->name }}</h6>
                        <a  class="btn p-0" href="{{ route('company.leave-types.edit',$type->id) }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">English Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $type->getTranslation('name', 'en') }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Arabic Name</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$type->getTranslation('name', 'ar')}}</span>
                                    </div>
                                 </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row g-3">


                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold ">leave Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="row clearfix g-3">
                                    <div class="col-sm-12">
                                          <div class="card mb-3">
                                              <div class="card-body">
                                                <table class="table table-hover align-middle mb-0" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Employee</th>
                                                            <th>leave Date</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Status</th>
                                                            <th>Type</th>
                                                            <th>Show</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($type->leaves as $leave)

                                                        <tr>
                                                            <td>
                                                                {{ $leave->id }}
                                                            </td>
                                                           <td>
                                                               <img class="avatar rounded-circle" src="{{ asset( $leave->user->image ) }}" alt="">
                                                               <a href="{{ route('company.employees.show',$leave->user->id) }}" class="fw-bold text-secondary">
                                                               <span class="fw-bold ms-1">{{ $leave->user->name }}</span></a>
                                                           </td>
                                                           <td>
                                                            {{ $leave->leave_date }}
                                                           </td>
                                                           <td>
                                                            {{ $leave->from }}
                                                           </td>
                                                           <td>
                                                            {{ $leave->to }}
                                                           </td>
                                                           <td>
                                                            <span @class(['badge','bg-success'=>$leave->getTranslation('status','en')=='approve',
                                                                'bg-danger'=>$leave->getTranslation('status','en')=='rejected',
                                                                'bg-info'=>$leave->getTranslation('status','en')=='waiting',
                                                                ])>
                                                           {{ $leave->status }}</span>
                                                           </td>

                                                           <td>
                                                           {{ $leave->ltype->name }}
                                                           </td>
                                                           <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <a class="btn btn-outline-secondary" href="{{ route('company.leaves.show',$leave->id) }}"><i class="icofont-location-arrow"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
</x-layouts.app>
