<x-layouts.header title="Vacation Requests"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Vacation Requests</h3>

                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
              <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Employee</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $vacation)

                                    <tr>
                                        <td>
                                            {{ $vacation->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $vacation->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$vacation->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $vacation->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $vacation->from }}
                                       </td>
                                       <td>
                                        {{ $vacation->to }}
                                       </td>
                                       <td>
                                        <span @class(['badge','bg-success'=>$vacation->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$vacation->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$vacation->getTranslation('status','en')=='waiting',
                                            ])>
                                       {{ $vacation->status }}</span>
                                       </td>

                                       <td>
                                       {{ $vacation->vtype->name }}
                                       </td>
                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.vacations.show',$vacation->id) }}"><i class="icofont-location-arrow"></i></a>
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


</x-layouts.app>
