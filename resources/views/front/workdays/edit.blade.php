<x-layouts.header title="Edit Workdays"/>
<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-3">
       <div class="container-xxl">
           <div class="row align-items-center">
               <div class="border-0 mb-4">
                   <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                       <h3 class="fw-bold mb-0">Edit Workday</h3>
                   </div>
               </div>
           </div> <!-- Row end  -->

           <div class="row align-item-center">
               <div class="col-md-12">
                   <div class="card mb-3">
                       <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                           <h6 class="mb-0 fw-bold ">Edit Workday</h6>
                           <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.workdays.index') }}"></i>Workdays</a>
                            <a class="btn btn-dark btn-set-task w-sm-100 mx-2 " href="{{ route('company.workdays.show',$workday->shift->id) }}"></i>{{ $workday->shift->name }} Workdays</a>
                        </div>
                       </div>
                       <div class="card-body">
                        <form method="post" action="{{ route('company.workdays.update',$workday->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $workday->id }}">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="firstname" class="form-label">From</label>
                                        <input type="time" class="form-control" id="firstname" name="from" value="{{ old('from',date('H:i', strtotime($workday->from))) }}" required>
                                        @error('from')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lastname" class="form-label">To</label>
                                        <input type="time" class="form-control" name="to" value="{{ old('to',date('H:i', strtotime($workday->to))) }}" id="lastname" required>
                                        @error('to')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput546565" class="form-label">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input flexRadioDefault44" name="status" type="radio" value="1"
                                                @checked(old('status',$workday->status)===1)>
                                            <label class="form-check-label">
                                                Work Day
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input flexRadioDefault44" name="status" type="radio" value="0"
                                                @checked(old('status',$workday->status)===0)>
                                            <label class="form-check-label">
                                                Holiday
                                            </label>
                                        </div>
                                        @error('status')
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
