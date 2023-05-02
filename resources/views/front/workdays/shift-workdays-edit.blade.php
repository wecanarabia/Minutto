<x-layouts.app>
         <!-- Body: Body -->
         <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">{{$shift->name}}</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">{{$shift->name}}</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('company.shifts.workdays.update',$shift->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-3 align-items-center">

                                    <input type="hidden" name="id" value="{{$shift->id}}" />
                               
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

                                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                                </form>
                            </div>
                        </div>


                    </div>
                </div><!-- Row end  -->

            </div>
        </div>
</x-layouts.app>
