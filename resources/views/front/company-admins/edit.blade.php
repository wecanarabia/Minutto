<x-layouts.header title="Edit Admin"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-3">
       <div class="container-xxl">
           <div class="row align-items-center">
               <div class="border-0 mb-4">
                   <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                       <h3 class="fw-bold mb-0">Edit Admin</h3>
                       <div class="col-auto d-flex w-sm-100">
                        <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.admins.index') }}"></i>Admins</a>
                        <a class="btn btn-dark btn-set-task w-sm-100 mx-2 " href="{{ route('company.admins.show',$admin->id) }}"></i>{{ $admin->name }}</a>
                    </div>
                   </div>
               </div>
           </div> <!-- Row end  -->

           <div class="row align-item-center">
               <div class="col-md-12">
                   <div class="card mb-3">
                       <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                           <h6 class="mb-0 fw-bold ">Edit Admin</h6>
                       </div>
                       <div class="card-body">
                        <form method="post" action="{{ route('company.admins.update',$admin->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name',$admin->name) }}" required>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email',$admin->email) }}" required>
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone',$admin->phone) }}" required>
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Role</label>
                                        <select class="default-select form-control" name="role_id">
                                         <option Selected disabled>Role</option>
                                         @foreach ($roles as $role)
                                         <option value="{{ $role->id }}" @selected(old('role_id',$admin->role_id) == $role->id)>{{ $role->name  }}</option>
                                         @endforeach
                                        </select>
                                        @error('role_id')
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
