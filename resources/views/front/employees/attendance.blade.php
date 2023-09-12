<x-layouts.header title="Attendance"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Attendance</h3>

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
                                        <th>Employee</th>
                                        <th>Attendance Time</th>
                                        <th>Departure Time</th>
                                        <th>Deduction</th>
                                        <th>Status</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $attendance)

                                    <tr>
                                        <td>
                                            {{ $attendance->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $attendance->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$attendance->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $attendance->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $attendance->time_attendance }}
                                       </td>
                                       <td>
                                        {{ $attendance->time_departure }}
                                       </td>
                                       <td>
                                        {{ $attendance->discount_value }}
                                       </td>
                                       <td>
                                        <span
                                            @class(['badge','bg-success'=>$attendance->getTranslation('status','en')=='disciplined',
                                            'bg-secondary'=>$attendance->getTranslation('status','en')=='late',
                                            'bg-danger'=>$attendance->getTranslation('status','en')=='absence',
                                            'bg-info'=>$attendance->getTranslation('status','en')=='vacation',
                                            ])
                                        >{{ $attendance->status }}</span>
                                       </td>
                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.attendance.show',$attendance->id) }}"><i class="icofont-location-arrow"></i></a>
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
