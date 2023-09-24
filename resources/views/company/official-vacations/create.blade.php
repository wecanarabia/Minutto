<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.OFFICAL VACATIONS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.LOGS')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.official-vacations.index') }}">@lang('views.OFFICAL VACATIONS')</a></li>
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
                                        <h5 class="mb-0">@lang('views.CREATE OFFICAL VACATION')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.official-vacations.store') }}">
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
                                            <label class="form-label">@lang('views.FROM')</label>
                                            <input type="date" class="form-control" name="from" value="{{ old('from') }}" required>
                                            @error('from')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">@lang('views.TO')</label>
                                            <input type="date" class="form-control" name="to" value="{{ old('to') }}" required>
                                            @error('to')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="addnote" class="form-label">@lang('views.ENGLISH NOTE')</label>
                                            <textarea  class="form-control" name="english_note" id="addnote" rows="3">{{ old('english_note') }}</textarea>
                                            @error('english_note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="addnote" class="form-label">@lang('views.Arabic NOTE')</label>
                                            <textarea  class="form-control" name="arabic_note"  id="addnote" rows="3">{{ old('arabic_note') }}</textarea>
                                            @error('arabic_note')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
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
