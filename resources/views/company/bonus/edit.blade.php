<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.BONUS')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.bonus.index') }}">@lang('views.BONUS')</a></li>
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
                                        <h5 class="mb-0">@lang('views.EDIT BONUS')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.bonus.update',$bonus->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $bonus->id }}">
                                        <div class="col-md-10">
                                            <label class="form-label">@lang('views.BONUS DATE')</label>
                                            <input type="date" class="form-control" name="date" value="{{ old('date',$bonus->date) }}" required>
                                            @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-10">
                                            <label class="form-label">@lang('views.EMPLOYEE')</label>
                                            <select class="default-select form-control" name="user_id">
                                             <option Selected disabled>@lang('views.EMPLOYEE')</option>
                                             @foreach ($employees as $employee)
                                             <option value="{{ $employee->id }}" @selected(old('user_id',$bonus->user_id) == $employee->id)>{{ $employee->name  }}</option>
                                             @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                        <div class="col-md-10">
                                            <label class="form-label">@lang('views.NOTE')</label>
                                            <textarea  class="form-control" name="note" rows="3">{{ old('note',$bonus->note) }}</textarea>
                                            @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                       </div>



                                         <div class="col-md-10">
                                            <label class="form-label">@lang('views.BONUS TYPE')</label>
                                            <select class="default-select form-control" name="type">
                                             <option Selected disabled>@lang('views.BONUS TYPE')</option>
                                             @foreach ($types as $type)
                                             <option value="{{ json_encode($type) }}" @selected(old('type',$bonus->getRawOriginal('type')) == json_encode($type))>{{ $type[Illuminate\Support\Facades\App::getLocale()]  }}</option>
                                             @endforeach
                                            </select>
                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                         <div class="col-md-10">
                                            <label class="form-label">@lang('views.TYPES VALUE') @lang('views.ALERT TYPE VALUE')</label>
                                            <input type="text" class="form-control" name="value" value="{{ old('value',$bonus->value) }}" required>
                                            @error('value')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                         <div class="col-md-10 mb-4">
                                            <label class="form-label">@lang('views.FILE')</label>
                                            <input type="file" class="form-control" name="file">
                                            @error('file')
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
