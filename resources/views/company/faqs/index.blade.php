<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.faqs.create") }}" class="btn btn-info float-end">
                        <i class="ti ti-help-octagon text-white me-1 fs-5"></i> @lang('views.ADD FAQ')
                      </a>
                    <h4 class="fw-semibold mb-8">@lang('views.FAQS')</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                            <li class="breadcrumb-item" aria-current="page">@lang('views.FAQS')</li>
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
                                <h5 class="mb-0">@lang('views.FAQS')</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>@lang('views.ENGLISH QUESTION')</th>
                                        <th>@lang('views.ARABIC QUESTION')</th>
                                        <th>@lang('views.ACTIONS')</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $faq)

                                    <tr>

                                        <td>
                                            {{ $faq->getTranslation('question', 'en') }}
                                       </td>
                                       <td>
                                        {{ $faq->getTranslation('question', 'ar') }}
                                       </td>

                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.faqs.show',$faq->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
                                                </a>

                                                <a href="{{ route('front.faqs.edit',$faq->id) }}" class="text-info edit">
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
