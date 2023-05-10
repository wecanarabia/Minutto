<x-layouts.header title="Alert"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Alert</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.alerts.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Alert</a>
                        </div>
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
                                        <th>Alert Type</th>
                                        <th>Alert Date</th>
                                        <th>type's value</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $alert)

                                    <tr>
                                        <td>
                                            {{ $alert->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $alert->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$alert->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $alert->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $alert->type }}
                                        </td>
                                       <td>
                                        {{ $alert->alert_date }}
                                       </td>
                                       <td>
                                        {{ $alert->punishment }}
                                       </td>

                                

                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.alerts.edit',$alert->id) }}"><i class="icofont-edit text-success"></i></a>
                                            <a class="btn btn-outline-secondary" href="{{ route('company.alerts.show',$alert->id) }}"><i class="icofont-location-arrow"></i></a>
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
