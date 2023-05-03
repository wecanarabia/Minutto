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
                           <form method="post" action="{{ route('company.company-settings.shift-workdays.store') }}">
                               @csrf
                               <div class="row g-3 align-items-center">
                                   @foreach ($days as $i => $day)
                                   <div class="col-md-4">
                                       <label>
                                           <input type="checkbox" class="chk-box" name="{{ $day['en'] }}" value="{{ $i+1 }}" @if(collect(old($day['en']))->contains($i+1)) checked @endif>    {{ $day[Illuminate\Support\Facades\App::getLocale()] }}
                                       </label><br>
                                   </div>
                                   <div class="col-md-4">

                                   <label class="form-label">From</label>
                                   <input type="time" class="form-control" name="{{ $day['en'] }}-from" value="{{ old($day['en'].'-from') }}" >
                                   </div>

                                   <div class="col-md-4">

                                   <label class="form-label">To</label>
                                   <input type="time" class="form-control" name="{{ $day['en'] }}-to" value="{{ old($day['en'].'-to') }}" >
                                   </div>
                                   @endforeach





                               </div>
                               <a href="{{ route('company.company-settings.department.create') }}" class="btn btn-dark mt-4">Back</a>
                               <input type="submit" value="Submit" class="btn btn-primary mt-4">
                           </form>
                       </div>
                   </div>


               </div>
           </div><!-- Row end  -->

       </div>
   </div>
</x-layouts.app>
