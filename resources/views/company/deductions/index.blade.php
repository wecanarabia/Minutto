<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.deductions.create") }}" class="btn btn-info float-end">
                        <i class="ti ti-device-watch-plus text-white me-1 fs-5"></i> @lang('views.ADD ATTENDANCE DEDUCTIONS')
                      </a>
                    <h4 class="fw-semibold mb-8">@lang('views.ATTENDANCE DEDUCTIONS')</h4>
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
                                <h5 class="mb-0">@lang('views.ATTENDANCE DEDUCTIONS')</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>

                                        <th>@lang('views.FROM')</th>
                                        <th>@lang('views.TO')</th>
                                        <th>@lang('views.PERCENTAGE')</th>
                                        <th>@lang('views.ACTIONS')</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $deduction)

                                    <tr>
                                        <td>
                                            {{ $deduction->from }}
                                        </td>
                                        <td>
                                            {{ $deduction->to }}
                                       </td>
                                       <td>
                                        {{ $deduction->percentage }}
                                       </td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.deductions.show',$deduction->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
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
