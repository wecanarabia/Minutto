<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">
                <a href="{{ route("front.admins.create") }}" class="btn btn-info float-end mx-2">
                    <i class="ti ti-users text-white me-1 fs-5"></i>@lang('views.ADD ADMIN')
                  </a>
                  @can('roles')
                  <a href="{{ route("front.roles.index") }}" class="btn btn-dark float-end">
                    <i class="ti ti-lock-cog text-white me-1 fs-5"></i> @lang('views.ROLES')
                  </a>


              <h4 class="fw-semibold mb-8">@lang('views.ADMINS')</h4>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">@lang('views.DASHBOARD')</a></li>
                  <li class="breadcrumb-item" aria-current="page">@lang('views.ADMINS')</li>
                </ol>
              </nav>
            </div>

          </div>
        </div>
      </div>
      <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->

        <!-- ---------------------
                        end Contact
                    ---------------- -->

        <div class="card card-body">
            <x-front-layouts.messages/>
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>@lang('views.ID')</th>
                <th>@lang('views.ADMIN')</th>
                <th>@lang('views.EMAIL')</th>
                <th>@lang('views.PHONE')</th>
                <th>@lang('views.ROLE')</th>
                <th>@lang('views.ACTIONS')</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $admin)
                <tr class="search-items" style="">
                    <td>{{ $admin->id }}</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $admin->image ) }}" alt="{{ $admin->name }}" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.admins.show',$admin->id) }}">
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
