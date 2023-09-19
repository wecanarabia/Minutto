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
                                            <h5 class="mb-0">Add Department Settings</h5>
                                        </div>
                                        <form method="post" action="{{ route('front.company-settings.department.store') }}">
                                            @csrf
                                            <div class="row g-3 align-items-center">
                                                <div class="mb-4">
                                                    <label for="firstname" class="form-label">English Name</label>
                                                    <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$branch?->getTranslation('name','en')??"") }}" required>
                                                    @error('english_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="lastname" class="form-label">Arabic Name</label>
                                                    <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$branch?->getTranslation('name','ar')??"") }}" id="lastname" required>
                                                    @error('arabic_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="mb-4">
                                                    <label for="addnote" class="form-label">English Descritpion</label>
                                                    <textarea  class="form-control" name="english_description" id="addnote" rows="3">{{ old('english_description',$department?->getTranslation('description','en')) }}</textarea>
                                                    @error('english_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label for="addnote" class="form-label">Arabic Descritpion</label>
                                                        <textarea  class="form-control" name="arabic_description"  id="addnote" rows="3">{{ old('arabic_description',$department?->getTranslation('description','ar')) }}</textarea>
                                                        @error('arabic_description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                         @enderror
                                                     </div>


                                            </div>

                                            <a href="{{ route('front.company-settings.branch.create') }}" class="btn btn-dark mt-4">Back</a>
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
