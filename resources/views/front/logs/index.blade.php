<x-layouts.header title="Logs"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Logs</h3>

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
                                        <th>Admin</th>
                                        <th>Title</th>
                                        <th>Log</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $log)

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
              </div>
            </div><!-- Row End -->
        </div>
    </div>


</x-layouts.app>
