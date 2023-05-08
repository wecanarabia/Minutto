<x-layouts.header title="Advance"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Advance</h3>

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
                                        <th>Request Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $advance)

                                    <tr>
                                        <td>
                                            {{ $advance->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $advance->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$advance->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $advance->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $advance->req_date }}
                                       </td>
                                       <td>
                                        {{ $advance->value }}
                                       </td>
                                       <td>
                                        <span @class(['badge','bg-success'=>$advance->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$advance->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$advance->getTranslation('status','en')=='waiting',
                                            ])>{{ $advance->status }}</span>
                                       </td>
                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.advances.show',$advance->id) }}"><i class="icofont-location-arrow"></i></a>
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
