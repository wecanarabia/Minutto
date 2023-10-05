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
                                            <h5 class="mb-0">@lang('views.ADD BRANCH SETTINGS')</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.branch.store') }}">
                                            @csrf
                                            <div class="row g-3 align-items-center">
                                                <div class="mb-4">
                                                    <label for="firstname" class="form-label">@lang('views.ENGLISH NAME')</label>
                                                    <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$branch?->getTranslation('name','en')??"") }}" required>
                                                    @error('english_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="lastname" class="form-label">@lang('views.ARABIC NAME')</label>
                                                    <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$branch?->getTranslation('name','ar')??"") }}" id="lastname" required>
                                                    @error('arabic_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="mb-4">
                                                    <label for="addnote" class="form-label">@lang('views.LOCATION')</label>
                                                    <input type="text" id="address-input" name="location" value="{{  old('location',$branch?->location??"") }}" class="form-control map-input">
                                                    <input type="hidden" name="lat" id="address-latitude" value="{{  old('lat',$branch?->lat??0) }}" />
                                                    <input type="hidden" name="long" id="address-longitude" value="{{  old('long',$branch?->long??0) }}" />
                                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                                    </div>
                                                    @error('location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    @error('lat')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    @error('long')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                               </div>


                                            </div>

                                            <a href="{{ route('front.company-settings.create') }}" class="btn btn-dark mt-4">@lang('views.BACK')</a>
                                            <input type="submit" value="@lang('views.NEXT')" class="btn btn-primary mt-4">
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
