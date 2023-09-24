<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.departments.create") }}" class="btn btn-info float-end">
                        <i class="ti ti-square-rounded-plus text-white me-1 fs-5"></i> Add Department
                      </a>
                    <h4 class="fw-semibold mb-8">@lang('views.DEPARTMENTS')</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                            <li class="breadcrumb-item" aria-current="page">@lang('views.DEPARTMENTS')</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>

        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-12">
                    <!-- ---------------------
                            start Scroll - Horizontal
                        ---------------- -->
                    <div class="card">
                        <div class="card-body">
                            <x-front-layouts.messages />
                            <div class="mb-2">
                                <h5 class="mb-0">@lang('views.BRANCHES')</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>@lang('views.ID')</th>
                                        <th>@lang('views.ENGLISH NAME')</th>
                                        <th>@lang('views.ARABIC NAME')</th>
                                        <th>@lang('views.HEAD')</th>
                                        <th>@lang('views.EMPLOYEES NUMBER')</th>
                                        <th>@lang('views.ACTIONS')</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $department)

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
                                        @if ($department->head)
                                        @if ($department->head->image==null)

                                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $department->head->name . ' ' . $department->head->last_name }}" width="35"
                                            class="rounded-circle">
                                        @else
                                        <img class="avatar rounded-circle" width="35" src="{{ asset( $department->head->image ) }}" alt="{{ $department->head->name . ' ' . $department->head->last_name }}">
                                        @endif
                                        <a href="{{ route('front.employees.show',$department->head->id) }}" class="fw-bold text-secondary">
                                        <span class="fw-bold ms-1">{{ $department->head->name . ' ' . $department->head->last_name }}</span></a>
                                        @else
                                            edit Department to add Head
                                        @endif
                                                                                </td>
                                       <td>{{ $department->employees->count()??"NO Employees added" }}</td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.departments.show',$department->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="{{ route('front.departments.edit',$department->id) }}" class="text-primary edit">
                                                  <i class="ti ti-edit fs-5"></i>
                                                </a>
                                              </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                    <!-- start row -->


                            </table>
            </div>
        </div>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------
                            end Scroll - Horizontal
                        ---------------- -->
                </div>
            </div>
        </div>
        <!-- ---------------------
                        end Contact
                    ---------------- -->


    </div>


</x-front-layouts.app>
