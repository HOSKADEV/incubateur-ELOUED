@extends('layouts/contentNavbarLayout')

@section('title', trans('student.title'))

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ trans('student.dashboard') }} /</span> {{ trans('student.students') }}
    </h4>
    <div class="card">
        {{-- <h5 class="card-header pt-0 mt-1">
            <form action="" method="GET" id="filterStudentForm" class="">
                <div class="row">
                    @if (auth('admin')->check())
                        <div class="form-group col-md-2 px-1 mt-4">
                            <a href="{{ route('dashboard.students.create') }}" class="btn btn-primary text-white">
                                <span class="tf-icons bx bx-plus"></span>&nbsp
                                ; {{ trans('student.create') }}
                            </a>
                        </div>
                    @endif

                    <div class="form-group col-md-3 mb-2" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="search" class="form-label">{{ trans('app.label.name') }}</label>
                        <input type="text" id="search" name="search" value="{{ Request::get('search') }}"
                            class="form-control input-solid"
                            placeholder="{{ Request::get('search') != '' ? '' : trans('app.placeholder.name') }}">
                    </div>
                    <div class="form-group col-md-3 mb-2" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="registration_number"
                            class="form-label">{{ trans('student.label.registration_number') }}</label>
                        <input type="text" id="registration_number" name="registration_number"
                            value="{{ Request::get('registration_number') }}" class="form-control input-solid"
                            placeholder="{{ Request::get('registration_number') != '' ? '' : trans('student.placeholder.registration_number') }}">
                    </div>

                    <div class="form-group col-md-2 mb-2 mb-2" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="batch" class="form-label">{{ trans('student.label.batch') }}</label>
                        <select class="form-select" id="batch" name="batch" aria-label="Default select example">
                            @if (Request::get('batch') != null)
                                <option value="{{ Request::get('batch') }}">
                                    {{ trans('app.batchs.' . Request::get('batch')) }}</option>
                            @else
                                <option value="">{{ trans('app.select.batch') }}</option>
                            @endif
                            <option value="">{{ trans('app.all') }}</option>
                            <option value="1">{{ trans('app.batchs.1') }}</option>
                            <option value="2">{{ trans('app.batchs.2') }}</option>
                            <option value="3">{{ trans('app.batchs.3') }}</option>
                            <option value="4">{{ trans('app.batchs.4') }}</option>
                            <option value="5">{{ trans('app.batchs.5') }}</option>
                            <option value="6">{{ trans('app.batchs.6') }}</option>
                            <option value="7">{{ trans('app.batchs.7') }}</option>
                            <option value="8">{{ trans('app.batchs.8') }}</option>
                            <option value="9">{{ trans('app.batchs.9') }}</option>
                            <option value="10">{{ trans('app.batchs.10') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="group" class="form-label">{{ trans('student.label.group') }}</label>
                        <select class="form-select" id="group" name="group" aria-label="Default select example">
                            @if (Request::get('group') != null)
                                <option value="{{ Request::get('group') }}">
                                    {{ trans('app.groups.' . Request::get('group')) }}</option>
                            @else
                                <option value="">{{ trans('attendence.select.group') }}</option>
                            @endif
                            <option value="">{{ trans('app.all') }}</option>

                            @for ($group = 1; $group <= $groups; $group++)
                                <option value="{{ $group }}">{{ trans('app.groups.' . $group) }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group col-md-3 mb-2" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="start_date" class="form-label">{{ trans('student.label.start_date') }}</label>
                        <input type="date" class="form-control input-solid" placeholder="YYYY-MM-DD"
                            style="background-color: #ffffff" name="start_date" id="start_date"
                            value="{{ Request::get('start_date') }}" />
                    </div>
                    <div class="form-group col-md-3" dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        <label for="end_date" class="form-label">{{ trans('student.label.end_date') }}</label>
                        <input type="date" class="form-control input-solid" placeholder="YYYY-MM-DD"
                            style="background-color: #ffffff" name="end_date" id="end_date"
                            value="{{ Request::get('end_date') }}" />
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="year" class="form-label">{{ trans('app.label.year') }}</label>
                        <select class="form-select" id="year" name="year" aria-label="Default select example">
                            <option value="">{{ trans('app.select.year') }}</option>
                            <option value="">{{ trans('app.option.year_all') }}</option>
                            @for ($i = $start_date; $i <= \Carbon\Carbon::now()->format('Y'); $i++)
                                <option value="{{ $i }}" {{ Request::get('year') == $i ? 'selected' : '' }}>
                                    {{ trans('app.year') . ' ' . $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <label for="rank" class="form-label">{{ trans('app.label.rank') }}</label>
                        <select class="form-select" id="rank" name="rank" aria-label="Default select example">
                            <option value="">{{ trans('app.select.rank') }}</option>
                            <option value="all" {{ Request::get('rank') == 'all' ? 'selected' : '' }}>{{ trans('app.option.rank_all') }}</option>
                            <option value="1" {{ Request::get('rank') == 1 ? 'selected' : '' }}>
                                {{ trans('app.ranks.1') }}</option>
                            <option value="2"{{ Request::get('rank') == 2 ? 'selected' : '' }}>
                                {{ trans('app.ranks.2') }}</option>
                            <option value="3"{{ Request::get('rank') == 3 ? 'selected' : '' }}>
                                {{ trans('app.ranks.3') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <label for="passport" class="form-label">{{ trans('app.label.passport') }}</label>
                        <select class="form-select" id="passport" name="passport" aria-label="Default select example">
                            <option value="">{{ trans('app.select.passport') }}</option>
                            <option value="0" {{ Request::get('passport') == 0 ? 'selected' : '' }}>
                                {{ trans('app.no_passport') }}</option>
                            <option value="1"{{ Request::get('passport') == 1 ? 'selected' : '' }}>
                                {{ trans('app.have_passport') }}</option>

                        </select>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label for="perPage" class="form-label">{{ trans('app.label.perPage') }}</label>
                        <select class="form-select" id="perPage" name="perPage" aria-label="Default select example">
                            <option value="">{{ trans('app.select.perPage') }}</option>
                            <option value="{{ $students->count() *$students->perPage() }}">{{ trans('app.all') }}</option>
                            <option value="10" {{ Request::get('perPage') == 10 ? 'selected' : '' }}>
                                10</option>
                            <option value="50"{{ Request::get('perPage') == 50 ? 'selected' : '' }}>
                                50</option>
                                <option value="100"{{ Request::get('perPage') == 100 ? 'selected' : '' }}>
                                    100</option>
                        </select>
                    </div>
                    {{-- perPage  
                </div>
            </form>
            <div class="row">
                @if (count($students))
                    <div class="form-group col-md-2 mt-4">
                        <button target="_blank" id="printStudent"
                            data-url="{{ route('dashboard.print.students', [
                                'batch' => Request::get('batch'),
                                'group' => Request::get('group'),
                                'search' => Request::get('search'),
                                'registration_number' => Request::get('registration_number'),
                                'week'  => Request::get('week'),
                                'month' => Request::get('month'),
                                'year'  => Request::get('year'),
                                'rank'  => Request::get('rank'),
                                'passport'   => Request::get('passport'),
                                'start_date' => Request::get('start_date'),
                                'end_date'   => Request::get('end_date'),
                                'perPage'    => Request::get('perPage'),
                            ]) }}"
                            class="btn
                        btn-primary text-white mr-2">
                            <span class="bx bxs-printer"></span>&nbsp; {{ trans('app.print') }}
                        </button>
                    </div>
                @endif
            </div>
        </h5> --}}
        <div class="table-responsive text-nowrap">
            <table class="table mb-2">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>{{ trans('student.name') }}</th>
                        <th>{{ trans('student.email') }}</th>
                        <th>{{ trans('student.phone') }}</th>
                        <th>{{ trans('student.birthday') }}</th>
                        <th>{{ trans('student.state_place_of_birth') }}</th>
                        <th>{{ trans('student.gender') }}</th>
                        <th>{{ trans('student.registration_number') }}</th>
                        <th>{{ trans('student.group') }}</th>
                        {{-- <th>Created</th> --}}
                        @if (auth('admin')->check())
                            <th>{{ trans('app.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $key => $student)
                        @php
                            $rowNumber = ($students->currentPage() - 1) * $students->perPage() + $loop->index + 1;
                        @endphp
                        <tr>
                           

                            <th scope="row">{{ $rowNumber }}</th>
                            <td>
                                <a href="{{ url('dashboard/students/' . $student->id . '/profile') }}">{{ $student->name }}</a>

                            </td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->birthday }}</td>
                            <td>{{ $student->state_of_birth }} -{{ $student->place_of_birth }}</td>
                            <td>{{ $student->gender == 1 ? trans('student.male') : trans('student.female') }}</td>
                            <td>{{ $student->registration_number }}</td>
                            <td>{{ $student->group }}</td>
                            {{-- <td>{{ $student->createdBy->name }}</td> --}}
                            @if (auth('admin')->check())
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.students.edit', $student->id) }}">
                                                <i class="bx bx-edit-alt me-2"></i>
                                                {{ trans('student.edit') }}
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#deleteStudentModal{{ $student->id }}">
                                                <i class="bx bx-trash me-2"></i>
                                                {{ trans('student.delete') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        @include('dashboard.student.delete')
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-danger"><em>@lang('لا يوجد سجلات.')</em></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $students->appends(request()->all())->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $('#group').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#start_date').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#end_date').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#batch').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#year').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });


            $('#rank').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#passport').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            $('#perPage').on('change', function(event) {
                timer = setTimeout(function() {
                    submitForm();
                }, 1000);

            });
            //perPage


            // $('#search').on('keyup', function(event) {
            //     // console.log('search' , $('#search').val());
            //     $("#search").focus();
            //     timer = setTimeout(function() {
            //         submitForm();
            //     }, 4000);

            // })
            $('#search').on('keyup', function(event) {
                $("#search").focus();
                timer = setTimeout(function() {
                    submitForm();
                }, 4000);

            })
            $('#registration_number').on('keyup', function(event) {
                $("#registration_number").focus();
                timer = setTimeout(function() {
                    submitForm();
                }, 4000);

            })

            function submitForm() {
                $("#filterStudentForm").submit();
            }
            $("#printStudent").click(function(e) {
                let url = $(this).attr('data-url');
                var printWindow = window.open(url, '_blank', 'height=auto,width=auto');
                printWindow.print();
            });
        });
    </script>
@endsection
