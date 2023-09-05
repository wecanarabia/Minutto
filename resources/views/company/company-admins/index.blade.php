<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Admins</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Admins</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark me-3"></i>
              </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

              <a href="{{ route("front.admins.create") }}" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add Admins
              </a>
            </div>
          </div>
        </div>
        <!-- ---------------------
                        end Contact
                    ---------------- -->

        <div class="card card-body">
            <x-front-layouts.messages/>
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>Id</th>
                <th>Admin</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $admin)
                <tr class="search-items" style="">
                    <td>{{ $admin->id }}</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $admin->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('company.admins.show',$admin->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $admin->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span>{{ $admin->email }}</span>
                  </td>
                  <td>
                    <span>{{ $admin->phone }}</span>
                  </td>
                  <td>
                    <span>{{ $admin?->role?->name }}</span>
                  </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.admins.show',$admin->id) }}" class="text-info edit">
                        <i class="ti ti-eye fs-5"></i>
                      </a>
                      <a href="{{ route('front.admins.edit',$admin->id) }}" class="text-primary edit">
                        <i class="ti ti-edit fs-5"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
                <!-- end row -->
              </tbody>
            </table>
          </div>
        </div>
      </div>


</x-front-layouts.app>
