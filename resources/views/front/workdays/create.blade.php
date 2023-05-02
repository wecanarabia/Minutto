<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add Workdays</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Add Workdays</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.workdays.store') }}">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label for="addnote" class="form-label">Shift</label>
                                            <select class="default-select form-control" name="shift_id">
                                             <option  data-display="Select">
                                                 @if($shifts->count()==0)
                                                 There is <b>no</b> shift in this company, please add shifts to select from
                                                 @else
                                                 shift
                                                 @endif</option>
                                             @foreach ($shifts as $shift)
                                             <option value="{{ $shift->id }}" @selected(old('shift_id') == $shift->id)>{{ $shift->name}}</option>
                                             @endforeach
                                         </select>
                                            @error('shift_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @foreach ($days as $i => $day)
                                        <div class="col-md-4">
                                            <label>
                                                <input type="checkbox" class="chk-box" name="{{ $day['en'] }}" value="{{ $i+1 }}" @if(collect(old('day'))->contains($i+1)) checked @endif>    {{ $day[Illuminate\Support\Facades\App::getLocale()] }}
                                            </label><br>
                                        </div> 
                                        <div class="col-md-4">

                                        <label class="form-label">From</label>
                                        <input type="time" class="form-control" name="{{ $day['en'] }}-from" value="{{ old('from') }}" >
                                        </div>
                                        
                                        <div class="col-md-4">

                                        <label class="form-label">To</label>
                                        <input type="time" class="form-control" name="{{ $day['en'] }}-to" value="{{ old('to') }}" >
                                        </div>
                                        @endforeach
                                      


                                        

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
