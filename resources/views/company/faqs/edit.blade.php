<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Faqs</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.faqs.index') }}">Faqs</a></li>
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
                                        <h5 class="mb-0">Edit Faq</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.faqs.update',$faq->id) }}">
                                        @csrf
                                        @method("put")
                                        <input type="hidden" name="id" value="{{ $faq->id }}">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">English Question</label>
                                            <input type="text" name="question_en" value="{{ old('question_en',$faq->getTranslation('question','en')) }}"
                                                class="form-control">
                                            @error('question_en')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Arabic Question</label>
                                            <input type="text" name="question_ar" value="{{ old('question_ar',$faq->getTranslation('question','ar')) }}"
                                                class="form-control">
                                            @error('question_ar')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">

                                        <label class="form-label fw-semibold">English Answer</label>
                                        <textarea  class="form-control" name="answer_en" id="addnote" rows="3">{{ old('answer_en',$faq->getTranslation('answer','en')) }}</textarea>
                                        @error('answer_en')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>



                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Arabic Answer</label>
                                            <textarea  class="form-control" name="answer_ar"  id="addnote" rows="3">{{ old('answer_ar',$faq->getTranslation('answer','ar')) }}</textarea>
                                            @error('answer_ar')
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
