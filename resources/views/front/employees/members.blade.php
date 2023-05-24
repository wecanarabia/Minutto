<x-layouts.header title="Members"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Employees</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
              <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Branch</th>
                                        <th>Department</th>
                                        <th>Shift</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)

                                    <tr>
                                        <td>
                                            {{ $employee->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $employee->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$employee->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $employee->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $employee->email }}
                                       </td>
                                       <td>
                                        {{ $employee->phone }}
                                       </td>
                                       <td>
                                        {{ $employee->branch->name }}
                                       </td>
                                       <td>
                                        {{ $employee->shift->name }}
                                       </td>
                                       <td>
                                        {{ $employee->shift->name }}
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
