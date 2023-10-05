<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.NOTIFICATIONS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.notifications.index') }}">@lang('views.NOTIFICATIONS')</a></li>
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
                                        <h5 class="mb-0">@lang('views.CREATE NOTIFICATION')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.notifications.store') }}">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ENGLISH TITLE')</label>
                                            <input type="text" name="english_title" value="{{ old('english_title') }}"
                                                class="form-control">
                                            @error('english_title')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ARABIC TITLE')</label>
                                            <input type="text" name="arabic_title" value="{{ old('arabic_title') }}"
                                                class="form-control">
                                            @error('arabic_title')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">

                                        <label class="form-label fw-semibold">@lang('views.ENGLISH BODY')</label>
                                        <textarea  class="form-control" name="english_body" id="addnote" rows="3">{{ old('english_body') }}</textarea>
                                        @error('english_body')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>



                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">@lang('views.ARABIC BODY')</label>
                                            <textarea  class="form-control" name="arabic_body"  id="addnote" rows="3">{{ old('arabic_body') }}</textarea>
                                            @error('arabic_body')
                                                <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>



                                        <input type="submit" value="@lang('views.SAVE')" class="btn btn-primary">
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
