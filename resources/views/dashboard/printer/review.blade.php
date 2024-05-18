<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>{{ trans('print.title_print.trainee_notebook') . '_' . $account->name }} </title>
    <style>
        /* Define your styles for the print page here */
        body {}

        .print-page {
            font-family: Arial, sans-serif;
            margin: 15px auto;
            width: 90%
        }

        .print-page .header-print-page {
            margin-top: 15px;
        }

        .print-page .main-print-page .review_information {
            padding: 10px 100px;
            /* widows: ; */
        }

        .print-page .main-print-page .review_information table {
            overflow: visible;
            /* widows: ; */
        }



        .print-page .main-print-page .review_information th,
        .print-page .main-print-page .review_information th td {
            text-align: center;
            border: 2px solid #191818;
        }



        .title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
            /* margin: 20px auto; */
        }

        table {

            margin-top: 25px;
            width: 100%;
            border-collapse: collapse;
            border-top: none;
            border-bottom: none;

        }

        .table-print {
            width: 100%;
            text-align: center;
        }

        .table thead th {
            border-top: 2px solid #191818;
        }

        /* .table td, .table th{
            border-top: none;
        } */
        th,
        td {

            /* border:none; */
            /* border-top: none;
            border-bottom: none; */
            border: 2px solid #191818;
            padding: 2px;
            text-align: center;
        }



        th {
            /* background-color: #f2f2f2; */
            border-top: 1px solid red;

        }


        .student_table_information table,
        .student_table_information table th,
        .student_table_information table td {
            border: none;
            padding: 0px 0;

        }

        @page {
            margin-top: 0;
            margin-bottom: 0;

        }

        @page: first {
            margin-top: 0;
        }

        @page: first {
            margin-top: 0;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        @media print {
            table {
                overflow-x: auto;
                white-space: nowrap;
                width: 100%;
            }

            table td,
            table th {
                word-break: break-word;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div style="" class="print-page">
        <div class="header-print-page">
            <div class="row">
                <div class="col-3 text-right">
                    <img style="height: 100px; width:200px" src="{{ asset('assets/logo/logo-print.jpg') }}"
                        alt="" srcset="">
                </div>
                <div class="col-6">
                    <h3 class="text-center title">{{ trans('print.title.trainee_notebook') }}</h3>
                </div>
                <div class="col-3">
                    <img style="height: 100px; width:200px" src="{{ asset('assets/logo/kaid-logo.png') }}"
                        alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="main-print-page">
            <div class="student_table_information">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-right">
                                <h5>{{ trans('print.student.title_ar') }} :</h5>
                            </td>
                            <td class=""></td>
                            <td class="text-left">
                                <h5>{{ ': ' . trans('print.student.title_fr') }}</h5>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right"> {{ trans('print.student.firstname_ar') }} :
                                {{ $account->firstname_ar }}
                            </td>
                            <td class=""></td>
                            <td class="text-left"> {{ trans('print.student.firstname_fr') }} :
                                {{ $account->firstname_fr }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.lastname_ar') }} :
                                {{ $account->lastname_ar }}
                            </td>
                            <td></td>
                            <td class="text-left"> {{ trans('print.student.lastname_fr') }} :
                                {{ $account->lastname_fr }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.birthday_place_of_birth_ar') }} : </td>
                            <td>{{ $account->birthday }} {{ $account->place_of_birth }} </td>
                            <td class="text-left"> {{ ': ' . trans('print.student.birthday_place_of_birth_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.promotion_ar') }} : </td>
                            <td>{{ $promotion }} </td>
                            <td class="text-left"> {{ ': ' . trans('print.student.promotion_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.branch_ar') }} : </td>
                            <td>{{ $branch }}</td>
                            <td class="text-left"> {{ ': ' . trans('print.student.branch_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.specialization_ar') }} : </td>
                            <td>{{ $specialization }} </td>
                            <td class="text-left"> {{ ': ' . trans('print.student.specialization_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.groupe_ar') }} : </td>
                            <td>{{ $account->group }} </td>
                            <td class="text-left"> {{ ': ' . trans('print.student.groupe_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.matricule_ar') }} : </td>
                            <td>{{ $account->registration_number }} </td>
                            <td class="text-left"> {{ ': ' . trans('print.student.matricule_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right pr-5"> {{ trans('print.student.residence') }} : الوادي</td>
                            <td></td>
                            <td class=" text-left pl-5"> {{ trans('print.student.phone') }} : {{ $account->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.student.email') }} : </td>
                            <td> {{ $account->email }} </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <h5>{{ trans('print.suivi.title_ar') }} :</h5>
                            </td>
                            <td></td>
                            <td class="text-left">
                                <h5>{{ ': ' . trans('print.suivi.title_fr') }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.suivi.teacher_charge_ar') }} : </td>
                            <td>هيئة التدريب لمجمع القائد للإعلام
                                المتمثلة في مديرها العام
                            </td>
                            <td class="text-left"> {{ ': ' . trans('print.suivi.teacher_charge_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.suivi.person_charged_ar') }} : </td>
                            <td> أسامة قديري – إكرام توانسة </td>
                            <td class="text-left"> {{ ': ' . trans('print.suivi.person_charged_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <h5>{{ trans('print.host_institution.title_ar') }} :</h5>
                            </td>
                            <td>
                                (مجمع القائد للإعلام ) جريدة القائد نيوز
                            </td>
                            <td class="text-left">
                                <h5>{{ ': ' . trans('print.host_institution.title_fr') }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.host_institution.adresse_ar') }} : </td>
                            <td> حي أول نوفمبر 1954 الوادي</td>
                            <td class="text-left"> {{ ': ' . trans('print.host_institution.adresse_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.host_institution.phone_ar') }} : </td>
                            <td>{{ $phone }}</td>
                            <td class="text-left"> {{ ': ' . trans('print.host_institution.phone_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.host_institution.fax_ar') }} : </td>
                            <td>{{ $fax }}</td>
                            <td class="text-left"> {{ ': ' . trans('print.host_institution.fax_fr') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"> {{ trans('print.host_institution.email_ar') }} : </td>
                            <td>{{ $email }}</td>
                            <td class="text-left"> {{ ': ' . trans('print.host_institution.email_fr') }}</td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <h5>{{ trans('print.duration_of_stage.title_ar') }} :</h5>
                            </td>
                            <td></td>
                            <td class="text-left">
                                <h5>{{ ': ' . trans('print.duration_of_stage.title_fr') }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <h5>{{ trans('print.duration_of_stage.from_ar') }} :</h5>
                            </td>
                            <td>
                                {{ trans('print.duration_of_stage.duration_date') . $account->start_date->format('d-m-Y') . ' ' . trans('print.duration_of_stage.to') . ' ' . $account->end_date->format('d-m-Y') }}
                            </td>
                            <td class="text-left">
                                <h5>{{ ': ' . trans('print.duration_of_stage.from_fr') }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="3">
                                <h6>{{ trans('print.review.title_ar') }}</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="3">
                                <h6>{{ trans('print.review.title_fr') }}</h6>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                {{ trans('print.review.firstname_lastname_student_ar') }} :
                            </td>
                            <td>
                                {{ $account->name }}
                            </td>
                            <td class="text-left">
                                {{ ': ' . trans('print.review.firstname_lastname_student_fr') }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                {{ trans('print.review.firstname_lastname_teacher_ar') }} :
                            </td>
                            <td>
                                منير طاهر عباس
                            </td>
                            <td class="text-left">
                                {{ ': ' . trans('print.review.firstname_lastname_teacher_fr') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                {{ trans('print.review.notes_teacher_ar') }} : منير طاهر عباس
                            </td>
                            <td></td>
                            <td class="text-left">
                                {{ trans('print.review.notes_teacher_fr') }} : Mounir Taher Abbes
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="3">
                                {{-- طالب متيمز في دفعته --}}
                                @if ($account->notes)
                                    {{ $account->notes->note }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="review_information">

                <div class="table-responsive text-nowrap">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50px;">{{ trans('print.review.ID') }}
                                </th>
                                <th style="">
                                    {{ trans('print.review.subject_name') }}</th>
                                <th style="width:
                                    100px;">
                                    {{ trans('print.review.coef') }}</th>
                                <th style="width: 120px;">
                                    {{ trans('print.review.rate') }}</th>
                                <th style="width: 200px">
                                    {{ trans('print.review.total_marks') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($account->tests as $key => $test)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td style="text-align: right">{{ $test->subject->name }}</td>
                                    <td>{{ $test->subject->coef }}</td>
                                    <td>{{ $test->rate }}</td>
                                    <td>{{ $test->result }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td style="border: none;"></td>
                                <td class="row h-100 "
                                    style="border: none;padding: 0;
                                    margin: 0">
                                    <div class="d-flex justify-content-between" style="height: 50px;width:100%">
                                        <div class=" d-flex justify-content-start"></div>
                                        <div class="d-flex justify-content-end text-center"
                                            style="width: 50%;border-bottom:2px solid #191818;border-right:2px solid #191818;height: 51px;padding: 10px;">
                                            <div class="full-height h6 text-center">
                                                {{ trans('evaluation.total_coef') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $account->total_coef }}</td>
                                <td></td>
                                <td>{{ $account->note }}</td>
                            </tr>
                            <tr style="">
                                <td colspan="5" style="border :none;">
                                    <div></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none;"></td>
                                <td style="border: none"></td>
                                <td style="border: 2px solid #191818;" colspan="2">{{ trans('evaluation.moyen') }}
                                </td>
                                <td style="border: 2px solid #191818;">{{ number_format($account->moyen, 2) }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="footer" style="margin-top: 25px">
                <div class="table-responsive student_table_information text-nowrap ">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-right" style="padding-bottom: 20px">
                                    {{ trans('print.review.date_ar') }} :
                                </td>
                                <td class=""></td>
                                <td class="text-left">
                                    {{ ': ' . trans('print.review.date_fr') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" style="padding-bottom: 40px">
                                    {{ trans('print.review.signature_ar') }} :
                                </td>
                                <td class=""></td>
                                <td class="text-left">
                                    {{ trans('print.review.signature_fr') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    {{ trans('print.review.notes_ar') }} :
                                </td>
                                <td class=""></td>
                                <td class="text-left">
                                    {{ trans('print.review.notes_fr') }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>

    <script>
        // JavaScript to remove the print page link
        window.onload = function() {
            var links = document.getElementsByTagName("a");
            for (var i = 0; i < links.length; i++) {
                if (links[i].getAttribute("href") === "javascript:window.print()") {
                    links[i].parentNode.removeChild(links[i]);
                    break;
                }
            }
        };
    </script>

</body>

</html>
