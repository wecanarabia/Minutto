<x-layouts.app>
          <!-- Body: Body -->
          <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Departments</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.departments.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Department</a>
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
                                            <th>English Name</th>
                                            <th>Arabic Name</th>
                                            <th>Head</th>
                                            <th>Employees Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)

                                        <tr>
                                            <td>
                                                {{ $department->id }}
                                            </td>
                                            <td>
                                                {{ $department->getTranslation('name', 'en') }}
                                           </td>
                                           <td>
                                            {{ $department->getTranslation('name', 'ar') }}
                                           </td>
                                           <td>
                                            {{ $department->company->name }}
                                           </td>
                                           <td>Airtel Portal</td>
                                           <td><span class="badge bg-warning">In Progress</span></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#departmentedit"><i class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
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
