<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.messages.create") }}" class="btn btn-info float-end mx-2">
                        <i class="ti ti-message-plus text-white me-1 fs-5"></i>@lang('views.ADD MESSAGE')
                      </a>
                      @if ($data->count()>0)
                        <a href="{{ route("front.messages.show") }}" class="btn btn-info float-end mx-2">
                            <i class="ti ti-message-star text-white me-1 fs-5"></i> @lang('views.SURRENT MESSAGE')
                        </a>
                      @endif

                    <h4 class="fw-semibold mb-8">@lang('views.MESSAGES')</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                            <li class="breadcrumb-item" aria-current="page">@lang('views.MESSAGES')</li>
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
                                <h5 class="mb-0">@lang('views.MESSAGES')</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>@lang('views.CREATED AT')</th>
                                        <th>@lang('views.ENGLISH MESSAGE')</th>
                                        <th>@lang('views.ARABIC MESSAGE')</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $message)

                                    <tr>
                                        <td>
                                            {{ $message->created_at }}
                                        </td>
                                        <td>
                                            {{ $message->getTranslation('body', 'en') }}
                                       </td>
                                       <td>
                                        {{ $message->getTranslation('body', 'ar') }}
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
