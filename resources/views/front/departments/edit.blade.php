<x-layouts.header title="Edit Department"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-3">
       <div class="container-xxl">
           <div class="row align-items-center">
               <div class="border-0 mb-4">
                   <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                       <h3 class="fw-bold mb-0">Edit Department</h3>
                       <div class="col-auto d-flex w-sm-100">
                        <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.departments.index') }}"></i>Departments</a>
                        <a class="btn btn-dark btn-set-task w-sm-100 mx-2 " href="{{ route('company.departments.show',$department->id) }}"></i>{{ $department->name }}</a>
                    </div>
                   </div>
               </div>
           </div> <!-- Row end  -->

           <div class="row align-item-center">
               <div class="col-md-12">
                   <div class="card mb-3">
                       <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                           <h6 class="mb-0 fw-bold ">Edit Department</h6>
                       </div>
                       <div class="card-body">
                        <form method="post" action="{{ route('company.departments.update',$department->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $department->id }}">

                                <div class="row g-3 align-items-center">
                                   <div class="col-md-6">
                                       <label for="firstname" class="form-label">English Name</label>
                                       <input type="text" class="form-control" id="firstname" name="english_name" value="{{ old('english_name',$department->getTranslation('name', 'en')) }}" required>
                                       @error('english_name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="col-md-6">
                                       <label for="lastname" class="form-label">Arabic Name</label>
                                       <input type="text" class="form-control" name="arabic_name" value="{{ old('arabic_name',$department->getTranslation('name', 'ar')) }}" id="lastname" required>
                                       @error('arabic_name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="col-md-12">
                                       <label for="addnote" class="form-label">English Descritpion</label>
                                       <textarea  class="form-control" name="english_description" id="addnote" rows="3">{{ old('english_description',$department->getTranslation('description', 'en')) }}</textarea>
                                       @error('english_description')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                  </div>

                                   <div class="col-md-12">
                                       <label for="addnote" class="form-label">Arabic Descritpion</label>
                                       <textarea  class="form-control" name="arabic_description"  id="addnote" rows="3">{{ old('arabic_description',$department->getTranslation('description', 'ar')) }}</textarea>
                                       @error('arabic_description')
                                       <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                       <label for="addnote" class="form-label">Department Head</label>
                                       <select class="default-select form-control" name="department_head">
                                        <option  data-display="Select">
                                            @if($employees->count() == 0)
                                            This department has <b>no</b> employees, please add employees to select head from
                                            @else
                                            Department head
                                            @endif</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" @selected(old('department_head',$department->department_head) == $employee->id)>{{ $employee->name  }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_head')
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
