@extends('layouts/contentNavbarLayout')

@section('title', trans('student.title-dashboard'))

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <style>
        .btn-custom-gray {
            background-color: #d3d3d3;
        }

        .status-list li {
            padding-bottom: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">{{ trans('commission.dashboard') }} /</span> {{ trans('project.projects') }}
                        </h4>
                    </div>
                </h5>
                <hr class="my-0">
                <div class="card-body pt-0">
                    <div class="card-body">
                        <div class="card">
                            <h5 class="card-header pt-0 mt-1">
                                {{-- <div class="row">
                                    <div class="form-group col-md-6 px-1 mt-4">
                                        <a href="{{ route('dashboard.projects.edit_all_dates') }}" class="btn btn-primary text-white">
                                            <span class="tf-icons bx bx-plus"></span>&nbsp; {{ trans('project.add_deadline') }}
                                        </a>
                                    </div>
                                </div> --}}
                            </h5>
                            <div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{trans('project.label.name')}}</th>
                                            <th scope="col">{{trans('project.project_tracking')}}</th>
                                            <th scope="col">{{trans('project.status_project_tracking')}}</th>
                                            <th scope="col">{{trans('app.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <th scope="row"><a href="{{ url('dashboard/project/'.$project->id) }}">{{ $project->name }}</a></th>
                                                <td>
                                                    @if($project->project_tracking == 1)
                                                        {{trans('auth/project.project_tracking.configuration_stage')}}
                                                    @elseif($project->project_tracking == 2)
                                                        {{trans('auth/project.project_tracking.create_bmc')}}    
                                                    @elseif($project->project_tracking == 3)
                                                        {{trans('auth/project.project_tracking.the_stage_of_preparing_the_prototype')}}    
                                                    @elseif($project->project_tracking == 4)
                                                        {{trans('auth/project.project_tracking.discussion_stage')}}
                                                    @else
                                                        {{trans('auth/project.project_tracking.labelle_innovative_project')}}
                                                    @endif    
                                                </td>
                                                <td>
                                                    @if($project->project_tracking == 1)
                                                        @if($project->status_project_tracking == 1)
                                                            <span class="text-warning">{{trans('auth/project.status_project_tracking.practice')}} </span>
                                                        @elseif($project->status_project_tracking == 2)
                                                            <span class="text-success">{{trans('auth/project.status_project_tracking.complete')}} </span>
                                                        @else
                                                            <span class="text-danger">{{trans('auth/project.status_project_tracking.not_yet')}} </span>
                                                        @endif
                                                    @elseif($project->project_tracking == 2 || $project->project_tracking == 3)
                                                        @if($project->status_project_tracking == 1)
                                                            <span class="text-warning">{{trans('auth/project.status_project_tracking.development_mode')}} </span>
                                                        @elseif($project->status_project_tracking == 2)
                                                            <span class="text-success">{{trans('auth/project.status_project_tracking.accomplished')}} </span>
                                                        @else
                                                            <span class="text-danger">{{trans('auth/project.status_project_tracking.not_completed')}} </span>
                                                        @endif
                                                        
                                                    @elseif($project->project_tracking == 4)
                                                        @if($project->status_project_tracking == 2)
                                                            <span class="text-success">{{trans('auth/project.status_project_tracking.discuss')}} </span>
                                                        @else
                                                            <span class="text-danger">{{trans('auth/project.status_project_tracking.not_discussed')}} </span>
                                                        @endif
                                                    @else
                                                        @if($project->status_project_tracking == 1)
                                                            <span class="text-warning">{{trans('auth/project.status_project_tracking.did_not_happen')}} </span>
                                                        @elseif($project->status_project_tracking == 2)
                                                            <span class="text-success">{{trans('auth/project.status_project_tracking.get')}} </span>
                                                        @else
                                                            <span class="text-light bg-dark">{{trans('auth/project.status_project_tracking.exclusion_or_waiver_of_the_student')}} </span>
                                                        @endif
                                                    @endif    
                                                    
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if($project->project_tracking == 0)
                                                                <a class="dropdown-item" href="{{ url('dashboard/project/'.$project->id.'/add-project-tracking') }}">{{ trans('project.project_tracking') }}</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ url('dashboard/project/'.$project->id.'/edit-project-tracking') }}">{{ trans('project.edit_project_tracking') }}</a>
                                                            @endif
                                                            <a class="dropdown-item" href="{{ url('dashboard/project/'.$project->id.'/edit-status-project-tracking') }}">{{ trans('project.edit_status_project_tracking') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{trans('project.add_project_tracking')}}: {{ $project->name }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('dashboard/project/'.$project->id.'/add-project-tracking') }}">
                        @csrf

                        <div class="form-group">
                            <label for="project_tracking" class="form-label">{{ trans('auth/project.project_trackingg') }}</label>
                            <select name="project_tracking" id="project_tracking" class="form-control @error('project_tracking') is-invalid @enderror">
                                <option value="">{{ trans('auth/project.project_tracking.select_a_stage') }}</option>
                                <option value="1">{{ trans('auth/project.project_tracking.configuration_stage') }}</option>
                                <option value="2">{{ trans('auth/project.project_tracking.create_bmc') }}</option>
                                <option value="3">{{ trans('auth/project.project_tracking.the_stage_of_preparing_the_prototype') }}</option>
                                <option value="4">{{ trans('auth/project.project_tracking.discussion_stage') }}</option>
                                <option value="5">{{ trans('auth/project.project_tracking.labelle_innovative_project') }}</option>
                            </select>
                            @error('project_tracking')
                            <small class="text-danger d-block">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection