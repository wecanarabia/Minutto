<x-layouts.header title="Edit Reward"/>
<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Edit Reward</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.rewards.index') }}"></i>Departments</a>
                                <a class="btn btn-dark btn-set-task w-sm-100 mx-2 " href="{{ route('company.rewards.show',$reward->id) }}"></i>{{ $reward->name }}</a>

                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Edit Reward</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.rewards.update',$reward->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $reward->id }}">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label class="form-label">Reward Date</label>
                                            <input type="date" class="form-control" name="reward_date" value="{{ old('reward_date',$reward->reward_date) }}" required>
                                            @error('reward_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Reward Value</label>
                                            <input type="text" class="form-control" name="reward_value" value="{{ old('reward_value',$reward->reward_value) }}" required>
                                            @error('reward_value')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-12">
                                            <label class="form-label">Note</label>
                                            <textarea  class="form-control" name="note" rows="3">{{ old('note',$reward->note) }}</textarea>
                                            @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                       </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Replay</label>
                                            <textarea  class="form-control" name="replay" rows="3">{{ old('replay',$reward->replay) }}</textarea>
                                            @error('replay')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                         </div>


                                         <div class="col-md-6">
                                            <label class="form-label">Employee</label>
                                            <select class="default-select form-control" name="user_id">
                                             <option Selected disabled>Employee</option>
                                             @foreach ($employees as $employee)
                                             <option value="{{ $employee->id }}" @selected(old('user_id',$reward->user_id) == $employee->id)>{{ $employee->name  }}</option>
                                             @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>
                                         <div class="col-md-6">
                                            <label class="form-label">Type</label>
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
                                            <label class="form-label">Status</label>
                                            <select class="default-select form-control" name="status">
                                             <option Selected disabled>Type</option>
                                             @foreach ($allStatus as $status)
                                                <option value="{{ json_encode($status) }}" @selected(old('status',$reward->status)==json_encode($status))>
                                                {{$status[Illuminate\Support\Facades\App::getLocale()] }}</option>
                                            @endforeach
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                         </div>
                                         <div class="col-md-6">
                                            <label class="form-label">File</label>
                                            <input type="file" class="form-control" name="file">
                                            @error('file')
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
