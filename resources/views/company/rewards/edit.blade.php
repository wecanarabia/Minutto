<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">@lang('views.ALLOWANCE')</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.allowances.index') }}">@lang('views.ALLOWANCE')</a></li>
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
                                        <h5 class="mb-0">@lang('views.EDIT ALLOWANCE')</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.allowances.update',$reward->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $reward->id }}">
                                        <div class="col-md-6">
                                            <label class="form-label">@lang('views.ALLOWANCE DATE')</label>
                                            <input type="date" class="form-control" name="reward_date" value="{{ old('reward_date',$reward->reward_date) }}" required>
                                            @error('reward_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">@lang('views.EMPLOYEE')</label>
                                            <select class="default-select form-control" name="user_id">
                                             <option Selected disabled>@lang('views.EMPLOYEE')</option>
                                             @foreach ($employees as $employee)
                                             <option value="{{ $employee->id }}" @selected(old('user_id',$reward->user_id) == $employee->id)>{{ $employee->name  }}</option>
                                             @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                        <div class="col-md-12">
                                            <label class="form-label">@lang('views.NOTE')</label>
                                            <textarea  class="form-control" name="note" rows="3">{{ old('note',$reward->note) }}</textarea>
                                            @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                       </div>

                                        <div class="col-md-12">
                                            <label class="form-label">@lang('views.REPLAY')</label>
                                            <textarea  class="form-control" name="replay" rows="3">{{ old('replay',$reward->replay) }}</textarea>
                                            @error('replay')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                         </div>

                                         <div class="col-md-6">
                                            <label class="form-label">@lang('views.TYPE')</label>
                                            <select class="default-select form-control" name="reward_type_id">
                                             <option Selected disabled>Type</option>
                                             @foreach ($types as $type)
                                             <option value="{{ $type->id }}" @selected(old('reward_type_id',$reward->reward_type_id) == $type->id)>{{ $type->name  }}</option>
                                             @endforeach
                                            </select>
                                            @error('reward_type_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                         <div class="col-md-6">
                                            <label class="form-label">@lang('views.TYPES VALUE') @lang('views.ALERT TYPE VALUE')</label>
                                            <input type="text" class="form-control" name="reward_value" value="{{ old('reward_value',$reward->reward_value) }}" required>
                                            @error('reward_value')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                         <div class="col-md-6">
                                            <label class="form-label">@lang('views.STATUS')</label>
                                            <select class="default-select form-control" name="status">
                                             <option Selected disabled>@lang('views.STATUS')</option>
                                             @foreach ($allStatus as $status)
                                                <option value="{{ json_encode($status) }}" @selected(old('status', $reward->getRawOriginal('status'))==json_encode($status))>
                                                {{$status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                            @endforeach
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>

                                         <div class="col-md-6">
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
