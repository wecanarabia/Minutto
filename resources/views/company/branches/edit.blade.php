<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.BRANCHES')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.branches.index') }}">@lang('views.BRANCHES')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">

                <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="mb-0">@lang('views.EDIT BRANCH')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.branches.update',$branch->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $branch->id }}">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ENGLISH NAME')</label>
                                            <input type="text" name="english_name" value="{{ old('english_name',$branch->getTranslation('name', 'en')) }}"
                                                class="form-control">
                                            @error('english_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ARABIC NAME')</label>
                                            <input type="text" name="arabic_name" value="{{ old('arabic_name',$branch->getTranslation('name', 'ar')) }}"
                                                class="form-control">
                                            @error('arabic_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.SHIFTS')</label>
                                            <select class="select2 form-control" style="height: 36px" name="shifts[]" multiple="multiple">
                                                <optgroup label="Shifts">
                                                @foreach ($shifts as $shift)
                                                    <option value="{{ $shift->id }}" @selected(collect(old('shifts',$branch->shifts->pluck('id')))->contains($shift->id))>
                                                        {{ $shift->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            </select>
                                            @error('shifts')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.BRANCH HEAD')</label>
                                            <select class="form-select" name="branch_head">
                                                <option data-display="Select">
                                                    @if($employees->count()==0)
                                                    @lang('views.NO BRANCH HEAD')

                                                    @else

                                                    @lang('views.GET BRANCH HEAD')
                                                    @endif</option>
                                                @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" @selected(old('branch_head',$branch->branch_head) == $employee->id)>{{ $employee->name  }}</option>
                                                @endforeach
                                            </select>
                                            @error('branch_head')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.LOCATION')</label>
                                            <input type="text" id="address-input" name="location" value="{{  old('location',$branch->location) }}" class="form-control map-input">
                                            <input type="hidden" name="lat" id="address-latitude" value="{{  old('lat',$branch->lat) }}" />
                                            <input type="hidden" name="long" id="address-longitude" value="{{  old('long',$branch->long) }}" />
                                            <div id="address-map-container" style="width:100%;height:400px; ">
                                                <div style="width: 100%; height: 100%" id="address-map"></div>
                                            </div>
                                            @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <input type="submit" value="@lang('views.UPDATE')" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layouts.app>
