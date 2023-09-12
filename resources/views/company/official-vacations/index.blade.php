<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.official-vacations.create") }}" class="btn btn-info float-end">
                        <i class="ti ti-calendar-plus text-white me-1 fs-5"></i> Add Official Vacation
                      </a>
                    <h4 class="fw-semibold mb-8">Official Vacations</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Official Vacations</li>
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
                    <x-front-layouts.messages />

                    <!-- ---------------------
                            start Scroll - Horizontal
                        ---------------- -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Official Vacations</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>

                                        <th>Actions</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $vacation)

                                    <tr>
                                        <td>{{ $vacation->from }}</td>
                                        <td>{{ $vacation->to }}</td>
                                        <td>
                                            {{ $vacation->getTranslation('name', 'en') }}
                                       </td>
                                       <td>
                                        {{ $vacation->getTranslation('name', 'ar') }}
                                       </td>

                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.official-vacations.show',$vacation->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="{{ route('front.official-vacations.edit',$vacation->id) }}" class="text-primary edit">
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
