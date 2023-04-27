<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add Department</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Add Branch</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.branches.store') }}">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label for="firstname" class="form-label">English Name</label>
                                            <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name') }}" required>
                                            @error('department_head')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname" class="form-label">English Name</label>
                                            <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name') }}" id="lastname" required>
                                            @error('arabic_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-12">
                                            <label for="addnote" class="form-label">Location</label>
                                            <input type="text" id="address-input" name="location" value="{{  old('location') }}" class="form-control map-input">
                                            <input type="hidden" name="lat" id="address-latitude" value="{{  old('lat') }}" />
                                            <input type="hidden" name="long" id="address-longitude" value="{{  old('long') }}" />
                                            <div id="address-map-container" style="width:100%;height:400px; ">
                                                <div style="width: 100%; height: 100%" id="address-map"></div>
                                            </div>
                                            @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            @error('lat')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            @error('long')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                       </div>


                                    </div>

                                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                                </form>
                            </div>
                        </div>


                    </div>
                </div><!-- Row end  -->

            </div>
        </div>
</x-layouts.app>
