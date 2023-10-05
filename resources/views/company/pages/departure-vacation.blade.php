<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">{{ $page->title }}</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">{{ $page->title }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <x-front-layouts.messages />
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                </div>
            @endif
                <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div id="cat-data" class="col-lg-12">
                                        <button id="cat-edit" class="btn btn-success float-end">@lang('views.EDIT')</button>

                                        <div class="chat-list chat active-chat" data-user-id="1">



                                            <div class="row">


                                                <div class="col-4 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ENGLISH TITLE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $page->getTranslation('title', 'en') }}
                                                    </h6>
                                                </div>
                                                <div class="col-8 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ARABIC TITLE')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $page->getTranslation('title', 'ar') }}
                                                    </h6>
                                                </div>


                                                <div class="col-8 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ENGLISH CONTENT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $page->getTranslation('content', 'en')}}
                                                    </h6>
                                                </div>
                                                <div class="col-8 mb-7">
                                                    <p class="mb-1 fs-2">@lang('views.ARABIC CONTENT')</p>
                                                    <h6 class="fw-semibold mb-0">{{ $page->getTranslation('content', 'ar')}}
                                                    </h6>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">@lang('views.EDIT') {{ $page->title }}</h5>
                                                <form method="post"
                                                    action="{{ route("front.pages.departure-vacation.update") }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $page->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label class="form-label fw-semibold">@lang('views.ENGLISH CONTENT')</label>
                                                             <textarea  class="form-control" name="english_content" id="addnote" rows="3">{{ old('english_content',$page->getTranslation('content', 'en')) }}</textarea>


                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label class="form-label fw-semibold">@lang('views.ARABIC CONTENT')</label>
                                                            <textarea  class="form-control" name="arabic_content"  id="addnote" rows="3">{{ old('arabic_content',$page->getTranslation('content', 'ar')) }}</textarea>
                                                          </div>






                                                    </div>
                                                    <input type="submit" value="@lang('views.UPDATE')" class="btn btn-primary mx-2">
                                                    <button id="cat-cancel" class="btn btn-dark">@lang('views.CANCEL')</button>

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
        </div>
    </div>
</x-front-layouts.app>
