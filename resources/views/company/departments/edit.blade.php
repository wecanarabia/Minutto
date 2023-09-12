<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Departments</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.departments.index') }}">Departments</a></li>
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
                                        <h5 class="mb-0">Edit Department</h5>
                                    </div>
                                    <form method="post"
                                        action="{{ route('front.departments.update', $department->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $department->id }}">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">English Name</label>
                                            <input type="text" name="english_name"
                                                value="{{ old('english_name', $department->getTranslation('name', 'en')) }}"
                                                class="form-control">
                                            @error('english_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Arabic Name</label>
                                            <input type="text" name="arabic_name"
                                                value="{{ old('arabic_name', $department->getTranslation('name', 'ar')) }}"
                                                class="form-control">
                                            @error('arabic_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">

                                            <label class="form-label fw-semibold">English Description</label>
                                            <textarea class="form-control" name="english_description" id="addnote" rows="3">{{ old('english_description', $department->getTranslation('description', 'en')) }}</textarea>
                                            @error('english_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Arabic Description</label>
                                            <textarea class="form-control" name="arabic_description" id="addnote" rows="3">{{ old('arabic_description', $department->getTranslation('description', 'ar')) }}</textarea>
                                            @error('arabic_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Department Head</label>
                                    <select class="form-select" name="department_head">
                                        <option data-display="Select">
                                            @if ($employees->count() == 0)
                                                This Department has <b>no</b> employees, please add employees to select
                                                head from
                                            @else
                                                Select Department head
                                            @endif
                                        </option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @selected(old('department_head', $department->department_head) == $employee->id)>
                                                {{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_head')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
