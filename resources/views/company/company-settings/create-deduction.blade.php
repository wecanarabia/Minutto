<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Add Company Settings</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="javascript:void(0);">Add Company Settings</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">

                <div class="widget-content searchable-container list">

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="mb-0">Add Attendance Deduction Settings</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.deduction.store') }}">
                                            @csrf
                                            <div class="row g-3 align-items-center">
                                                <div class="mb-4 col-12">
                                                    <label class="form-label">@lang('views.FROM')</label>
                                                     <input type="time" class="form-control" name="from" value="{{ old('from',date('H:i', strtotime($deduction->from??'00:00:00'))) }}" >
                                                    @error('from')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 col-12">
                                                    <label class="form-label">@lang('views.TO')</label>
                                                     <input type="time" class="form-control" name="to" value="{{ old('to',date('H:i', strtotime($deduction->to??'00:00:00'))) }}" >
                                                    @error('to')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4 col-12">
                                                    <label for="percentage" class="form-label">Percentage (HH:MM:SS)</label>
                                                    <input type="text" class="form-control" name="percentage" placeholder="HH:MM:SS" value="{{ old('percentage',$deduction?->percentage??"") }}" id="percentage" required>
                                                    @error('percentage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>





                                            </div>

                                            <a href="{{ route('front.company-settings.department.create') }}" class="btn btn-dark mt-4">Back</a>
                                            <input type="submit" value="Submit" class="btn btn-primary mt-4">
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
    <!-- end profile -->

    </div>
    </div>
    </div>
</x-front-layouts.app>