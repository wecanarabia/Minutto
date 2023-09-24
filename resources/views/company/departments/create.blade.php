<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.DEPARTMENTS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.departments.index') }}">@lang('views.DEPARTMENTS')</a></li>
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
                                        <h5 class="mb-0">@lang('views.CREATE DEPARTMENT')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.departments.store') }}">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ENGLISH NAME')</label>
                                            <input type="text" name="english_name" value="{{ old('english_name') }}"
                                                class="form-control">
                                            @error('english_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ARABIC NAME')</label>
                                            <input type="text" name="arabic_name" value="{{ old('arabic_name') }}"
                                                class="form-control">
                                            @error('arabic_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">

                                        <label class="form-label fw-semibold">@lang('views.ENGLISH DESCRIPTION')</label>
                                        <textarea  class="form-control" name="english_description" id="addnote" rows="3">{{ old('english_description') }}</textarea>
                                        @error('english_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ARARBIC DESCRIPTION')</label>
                                            <textarea  class="form-control" name="arabic_description"  id="addnote" rows="3">{{ old('arabic_description') }}</textarea>
                                            @error('arabic_description')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                        </div>


                                        <input type="submit" value="Save" class="btn btn-primary">
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
