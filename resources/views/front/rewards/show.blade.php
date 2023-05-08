<x-layouts.header title="{{ $reward->user->name }} Reward"/>
<x-layouts.app>
     <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">{{ $reward->user->name }} Reward</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.rewards.index') }}"></i>Rewards</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->

        @if (session()->has('success'))
        <div class="alert alert-dismissible fade show" role="alert">
            <strong><i class="icofont-check-circled m-2 "></i>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row g-3">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="mb-0 fw-bold ">{{ $reward->user->name }} Reward</h6>
                        <a  class="btn p-0" href="{{ route('company.rewards.edit',$reward->id) }}"><i class="icofont-edit text-primary fs-6"></i></a>
                    </div>
                    <div class="card-body  d-flex teacher-fulldeatil">
                        @if ($reward->user)

                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href={{ route('company.employees.show',$reward->user->id) }}">
                                <img src="{{ asset($reward->user->image) }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">Employee</h6>
                                <span class="text-muted small">{{ $reward->user->name }}</span>
                            </div>
                        </div>

                        @endif

                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <ul class="list-unstyled mb-0">
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Reward Date</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $reward->reward_date }}</span>
                                    </div>
                                </li>
                                <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Reward Value</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{$reward->reward_value}}</span>
                                    </div>
                                 </li>
                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Note</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $reward->note }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Replay</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $reward->replay }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Status</span>
                                    </div>
                                    <div class="col-8">
                                     <span @class(['badge','bg-success'=>$reward->getTranslation('status','en')=='approve',
                                         'bg-danger'=>$reward->getTranslation('status','en')=='rejected',
                                         'bg-info'=>$reward->getTranslation('status','en')=='waiting',
                                         ])>{{ $reward->status }}</span>
                                    </div>
                                 </li>
                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">Reward Type</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-muted">{{ $reward->rtype->name }}</span>
                                    </div>
                                 </li>

                                 <li class="row flex-wrap mb-3">
                                    <div class="col-4">
                                        <span class="fw-bold">File</span>
                                    </div>
                                    <div class="col-8">
                                        <a href="{{ route('company.rewards.file',$reward->id) }}" class="text-muted">{{ explode('/',$reward->file)[2]??null }}</a>
                                    </div>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
</x-layouts.app>
