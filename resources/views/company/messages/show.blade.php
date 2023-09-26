<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Messages</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.messages.index') }}">Messages</a></li>
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


                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">English Message</p>
                                                    <h6 class="fw-semibold mb-0">{{ $message->created_at }}</h6>
                                                </div>

                                                <div class="col-12 mb-7">
                                                    <p class="mb-1 fs-2">Arabic Message</p>
                                                    <h6 class="fw-semibold mb-0">{{ $message->getTranslation('body', 'en') }}</h6>
                                                </div>

                                                <div class="col-6 mb-7">
                                                    <p class="mb-1 fs-2">Created At</p>
                                                    <h6 class="fw-semibold mb-0">{{ $message->getTranslation('body', 'ar') }}</h6>
                                                </div>





                                            </div>


                                        </div>
                                    </div>
                                    <div id="cat-form" class="col-lg-12 d-flex align-items-stretch d-none">
                                        <div class="card w-100 position-relative overflow-hidden">
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-semibold">Update Message</h5>
                                                <form method="post"
                                                    action="{{ route('front.messages.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $message->id }}">
                                                    <div class="row">
                                                        <div class="mb-4 col-12">
                                                            <label class="form-label fw-semibold">Endlish Message</label>
                                                            <textarea  class="form-control" name="english_body" id="addnote" rows="3">{{ old('english_body',$message->getTranslation('body', 'en')) }}</textarea>

                                                        </div>

                                                        <div class="mb-4 col-12">
                                                            <label class="form-label fw-semibold">Arabic Message</label>
                                                            <textarea  class="form-control" name="arabic_body"  id="addnote" rows="3">{{ old('arabic_body',$message->getTranslation('body', 'ar')) }}</textarea>
                                                        </div>






                                                    </div>
                                                    <input type="submit" value="Update" class="btn btn-primary mx-2">
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
