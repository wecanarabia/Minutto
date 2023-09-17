<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Shifts</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.shifts.index') }}">Shifts</a></li>
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
                                        <h5 class="mb-0">Edit Shift</h5>
                                    </div>
                                    <form method="post" action="{{ route('front.shifts.update',$shift->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $shift->id }}">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">English Name</label>
                                            <input type="text" name="english_name" value="{{ old('english_name',$shift->getTranslation('name', 'en')) }}"
                                                class="form-control">
                                            @error('english_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Arabic Name</label>
                                            <input type="text" name="arabic_name" value="{{ old('arabic_name',$shift->getTranslation('name', 'ar')) }}"
                                                class="form-control">
                                            @error('arabic_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <h5 class="mb-0">Shift Workdays</h5>
                                        </div>


                                    <div class="row">
                                        @foreach ($shift->workdays as $i => $day)
                                        <input type="hidden" name="{{ $day->getTranslation('day','en') }}-id" value="{{ $day->id }}" >

                                        <div class="col-md-4">
                                            <label>
                                                <input type="checkbox" class="chk-box" name="{{ $day->getTranslation('day','en') }}" value="{{ $i+1 }}" @if($day->status==1) checked @endif>    {{ $day->day }}
                                            </label><br>
                                        </div>
                                        <div class="col-md-4">

                                        <label class="form-label">From</label>
                                        <input type="time" class="form-control" name="{{ $day->getTranslation('day','en') }}-from" value="{{ old($day->getTranslation('day','en') .'-from',date('H:i', strtotime($day->from))) }}" >
                                        </div>

                                        <div class="col-md-4">

                                        <label class="form-label">To</label>
                                        <input type="time" class="form-control" name="{{ $day->getTranslation('day','en') }}-to" value="{{ old($day->getTranslation('day','en') .'-from',date('H:i', strtotime($day->to))) }}" >
                                        </div>
                                        @endforeach
                                    </div>

                                        <input type="submit" value="Update" class="btn btn-primary">
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
