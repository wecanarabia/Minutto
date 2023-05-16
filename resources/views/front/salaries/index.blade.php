<x-layouts.header title="Salaries"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Salaries</h3>
                        @if (count($data)==0||count($data['salaries'])==0))
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.salaries.generate') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Generate Salaries this Month</a>
                        </div>
                        @else
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100 mx-2" href="{{ route('company.salaries.update') }}">Update Salaries</a>
                            @if (count($employeesNoSalary)>0)
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.salaries.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Salary</a>
                            @endif
                        </div>

                        @endif


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
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Actual Salary</th>
                                        <th>Net Salary</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['salaries']??null as $salary)

                                    <tr>
                                        <td>
                                            {{ $salary->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $salary->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$salary->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $salary->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $salary->month }}
                                       </td>
                                       <td>
                                        {{ $salary->year }}
                                       </td>
                                        <td>
                                        {{ $salary->actual_salary }}
                                       </td>
                                        <td>
                                        {{ $salary->net_salary }}
                                       </td>

                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.salaries.show',$salary->id) }}"><i class="icofont-location-arrow"></i></a>
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
