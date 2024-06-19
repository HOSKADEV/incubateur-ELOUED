@php
    use App\Models\StudentGroup;
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

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
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{trans('project.label.name')}}</th>
                                            <th scope="col">{{ trans('project.status_project.status')}}</th>
                                            <th scope="col">{{trans('student.firstname')}} & {{trans('student.lastname')}}</th>
                                            <th scope="col">{{trans('student.groups')}}</th>
                                            <th scope="col">{{trans('commission.commission')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <th scope="row"><a href="{{ url('dashboard/project/'.$project->id) }}">{{ $project->name }}</a></th>
                                                <td>
                                                    <ul class="status-list">
                                                        <li class="{{ $project->status == 0 ? 'selected' : '' }}">
                                                            <label>
                                                                <input type="checkbox" class="form-check-input" {{ $project->status == 0 ? 'checked' : '' }} onclick="updateStatus({{ $project->id }}, 0)">
                                                                <span class="btn btn-sm {{ $project->status == 0 ? 'btn-danger' : 'btn-custom-gray' }}">{{ trans('project.status_project.rejected') }}</span>
                                                            </label>
                                                        </li>
                                                        <li class="{{ $project->status == 1 ? 'selected' : '' }}">
                                                            <label>
                                                                <input type="checkbox" class="form-check-input" {{ $project->status == 1 ? 'checked' : '' }} onclick="updateStatus({{ $project->id }}, 1)">
                                                                <span class="btn btn-sm {{ $project->status == 1 ? 'btn-secondary' : 'btn-custom-gray' }}">{{ trans('project.status_project.under_studying') }}</span>
                                                            </label>
                                                        </li>
                                                        <li class="{{ $project->status == 2 ? 'selected' : '' }}">
                                                            <label>
                                                                <input type="checkbox" class="form-check-input" {{ $project->status == 2 ? 'checked' : '' }} onclick="updateStatus({{ $project->id }}, 2)">
                                                                <span class="btn btn-sm {{ $project->status == 2 ? 'btn-success' : 'btn-custom-gray' }}">{{ trans('project.status_project.accepted') }}</span>
                                                            </label>
                                                        </li>
                                                        <li class="{{ $project->status == 3 ? 'selected' : '' }}">
                                                            <label>
                                                                <input type="checkbox" class="form-check-input" {{ $project->status == 3 ? 'checked' : '' }} onclick="updateStatus({{ $project->id }}, 3)">
                                                                <span class="btn btn-sm {{ $project->status == 3 ? 'btn-warning' : 'btn-custom-gray' }}">{{ trans('project.status_project.complete_project') }}</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                                <td>{{ $project->student->name }}</td>
                                                <td>
                                                    @php
                                                        $allStudents = \App\Models\StudentGroup::where('id_student', $project->student->id)->get();
                                                    @endphp
                                                    @if ($allStudents->count() == 1)
                                                        <span>{{ trans('project.member') }}</span>
                                                    @elseif ($allStudents->count() == 2)
                                                        <span>{{ trans('project.two_members') }}</span>
                                                    @elseif ($allStudents->count() > 2)
                                                        <span>{{ $allStudents->count() }} {{ trans('project.members') }}</span>   
                                                    @else
                                                        <span>{{ trans('project.no_members') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->id_commission)
                                                        {{ $project->commission->name_ar }}
                                                    @else
                                                        <a href="{{ route('dashboard.projects.add_commission', $project->id) }}" class="btn btn-primary btn-sm">{{ trans('commission.add_commission') }}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $projects->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        function updateStatus(projectId, status) {
            $.ajax({
                type: 'POST',
                url: '{{ route("dashboard.update_project_status") }}',  
                data: {
                    _token: '{{ csrf_token() }}',
                    project_id: projectId,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                    switch (response.status) {
                        case 0:
                            $('#project_status').css('background-color', 'red');
                            break;
                        case 1:
                            $('#project_status').css('background-color', 'yellow');
                            break;
                        case 2:
                            $('#project_status').css('background-color', 'green');
                            break;
                        case 3:
                            $('#project_status').css('background-color', 'blue');
                            break;
                        default:
                            break;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

         $(document).ready(function() {
             $.ajaxSetup({
                 headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                 },
             });
     
             $("#downloadCertificate").click(function(e) {
                 let url = $(this).attr('data-url');
                 var printWindow = window.open(url, '_blank', 'height=auto,width=auto');
                 printWindow.print();
             });
     
             $("#downloadReview").click(function(e) {
                 let url = $(this).attr('data-url');
                 var printWindow = window.open(url, '_blank', 'height=auto,width=auto');
                 printWindow.print();
             });
         });
     </script>
     
@endsection