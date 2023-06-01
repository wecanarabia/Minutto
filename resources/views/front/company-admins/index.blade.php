<x-layouts.header title="Admin"/>
<x-layouts.app>
          <!-- Body: Body -->
          <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Admin</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.admins.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Admin</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->
                @if (session()->has('success'))
                <div class="alert alert-dismissible fade show" role="alert">
                    <strong><i class="icofont-check-circled m-2 "></i>{{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Admin</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $admin)

                                        <tr>
                                            <td>
                                                {{ $admin->id }}
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="{{ asset( $admin->image ) }}" alt="">
                                                <a href="{{ route('company.admins.show',$admin->id) }}" class="fw-bold text-secondary">
                                                <span class="fw-bold ms-1">{{ $admin->name }}</span></a>
                                            </td>
                                            <td>
                                                {{ $admin->email }}
                                           </td>
                                           <td>
                                            {{ $admin->phone }}
                                           </td>
                                           <td>
                                            {{ $admin?->role?->name }}
                                           </td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a class="btn btn-outline-secondary" href="{{ route('company.admins.edit',$admin->id) }}"><i class="icofont-edit text-success"></i></a>
                                                    <a class="btn btn-outline-secondary" href="{{ route('company.admins.show',$admin->id) }}"><i class="icofont-location-arrow"></i></a>
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
