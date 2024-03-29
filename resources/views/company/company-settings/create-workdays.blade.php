<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.ADD COMPANY SETTINGS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">@lang('views.ADD COMPANY SETTINGS')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">

                <div class="widget-content searchable-container list">

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="mb-0">@lang('views.ADD WORKDAYS SETTINGS')</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.shift-workdays.store') }}">
                                            @csrf
                                                @foreach ($days as $i => $day)
                                                <div class="row">

                                                <div class="col-4">
                                                    <label>
                                                        <input type="checkbox" class="chk-box" name="{{ $day['en'] }}" value="{{ $i+1 }}" @if(collect(old($day['en']))->contains($i+1)) checked @endif>    {{ $day[Illuminate\Support\Facades\App::getLocale()] }}
                                                    </label><br>
                                                </div>
                                                <div class="col-4">

                                                <label class="form-label">@lang('views.FROM')</label>
                                                <input type="time" class="form-control" name="{{ $day['en'] }}-from" value="{{ old($day['en'].'-from') }}" >
                                                </div>

                                                <div class="col-4">

                                                <label class="form-label">@lang('views.TO')</label>
                                                <input type="time" class="form-control" name="{{ $day['en'] }}-to" value="{{ old($day['en'].'-to') }}" >
                                                </div>
                                            </div>
                                                @endforeach





                                            <a href="{{ route('front.company-settings.shift.create') }}" class="btn btn-dark mt-4">@lang('views.BACK')</a>
                                            <input type="submit" value="@lang('views.SAVE')" class="btn btn-primary mt-4">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end profile -->

    </div>
    </div>
    </div>
</x-front-layouts.app>
