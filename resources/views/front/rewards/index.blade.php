<x-layouts.header title="Reward"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Reward</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.rewards.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Reward</a>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
              <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Employee</th>
                                        <th>Reward Date</th>
                                        <th>Reward value</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $reward)

                                    <tr>
                                        <td>
                                            {{ $reward->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $reward->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$reward->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $reward->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $reward->reward_date }}
                                       </td>
                                       <td>
                                        {{ $reward->reward_value }}
                                       </td>

                                       <td>
                                        <span @class(['badge','bg-success'=>$reward->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$reward->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$reward->getTranslation('status','en')=='waiting',
                                            ])>
                                       {{ $reward->status }}</span>
                                       </td>

                                       <td>
                                       {{ $reward->rtype->name }}
                                       </td>
                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.rewards.edit',$reward->id) }}"><i class="icofont-edit text-success"></i></a>
                                            <a class="btn btn-outline-secondary" href="{{ route('company.rewards.show',$reward->id) }}"><i class="icofont-location-arrow"></i></a>
                                        </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
              </div>
            </div><!-- Row End -->
        </div>
    </div>


</x-layouts.app>
