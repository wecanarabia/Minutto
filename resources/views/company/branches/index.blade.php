<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.branches.create") }}" class="btn btn-info float-end">
                        <i class="ti ti-map-pin-plus text-white me-1 fs-5"></i> Add Branch
                      </a>
                    <h4 class="fw-semibold mb-8">Branches</h4>

                    <nav aria-label="breadcrumb">



                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Branches</li>
                        </ol>

                    </nav>
                </div>

            </div>
        </div>
    </div>
    <div class="widget-content searchable-container list">

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
                                <h5 class="mb-0">Branches</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Id</th>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>Location</th>
                                        <th>Head</th>
                                        <th>Employees Number</th>
                                        <th>Actions</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $branch)

                                    <tr>
                                        <td>
                                            {{ $branch->id }}
                                        </td>
                                        <td>
                                            {{ $branch->getTranslation('name', 'en') }}
                                       </td>
                                       <td>
                                        {{ $branch->getTranslation('name', 'ar') }}
                                       </td>
                                        <td>
                                        {{ $branch->location }}
                                       </td>
                                       <td>

                                        @if ($branch->head)

                                        <div class="d-flex align-items-center">
                                            @if ($branch->head->image==null)

                                            <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $branch->head->name . ' ' . $branch->head->last_name }}" width="35"
                                                class="rounded-circle">
                                            @else
                                            <img src="{{ asset( $branch->head->image ) }}" alt="{{ $branch->head->name . ' ' . $branch->head->last_name }}" class="rounded-circle" width="35">
                                            @endif
                                            <div class="ms-3">
                                              <div class="user-meta-info">
                                                  <a href="{{ route('front.employees.show',$branch->head->id) }}">
                                                <h6 class="user-name mb-0" data-name="Emma Adams">{{ $branch->head->name . ' ' . $branch->head->last_name }}</h6></a>
                                              </div>
                                            </div>
                                          </div>
                                          @else
                                          edit branch to add Head
                                      @endif
                                        </td>
                                       <td>{{ $branch->employees->count()??"NO Employees added" }}</td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.branches.show',$branch->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="{{ route('front.branches.edit',$branch->id) }}" class="text-primary edit">
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
