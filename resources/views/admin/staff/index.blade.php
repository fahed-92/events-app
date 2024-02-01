@extends('admin.layouts.app')
@section('title', 'جميع العناصر')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            Staff
{{--                            {{ __('messages.Clients and partners') }}--}}
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Choose Excel File</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Staff
                    </h4>
                    <p class="card-title-desc">All Staff</p>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Full Name</th>
                                <th>Corner</th>
                                <th>Salary Per Day</th>
                                <th>Work Days</th>
                                <th>Absent Days</th>
                                <th>Salary</th>
                                <th>Date of join</th>
                                <th>Date of End</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $.get('staff/data', function (data) {
                generateTable(data);
            });
        });
        function generateTable(data) {
            var tableBody = $('#datatable tbody');
            tableBody.empty();
            function getStaffStatus(id) {
                $.get('staff/'+ id, function (data) {
                    console.log(data);
                });
                console.log("counts Is:", data);
            }
            $.each(data, function (index, row) {

                var counts=function getStaffStatus() {
                    var id = row.id
                    $.get('staff/'+ id, function (v) {
                        return v
                    });
                    console.log("counts Is:", v);
                    // console.log("Inner function variable:", innerVar);
                }
                var date1 = new Date(row.date_of_end).getDate();
                var date2 = new Date(row.date_of_join).getDate();
                var salaryPerDay = row.salary / 30; // Salary Per Day
                var workDays = String(date1 - date2); // Working Days
                var Salary = row.present_count * salaryPerDay ; // Main Salary
                // console.log(getStaffStatus());
                var rowHtml = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + row.full_name + '</td>' +
                    '<td>' + row.corner_id + '</td>' +
                    '<td>' + salaryPerDay.toFixed(2) + '</td>' +
                    '<td>' + row.present_count + '</td>' +
                    '<td>' + row.absent_count + '</td>' +
                    '<td>' + Salary.toFixed(2) + '</td>' +
                    '<td>' + row.date_of_join + '</td>' +
                    '<td>' + row.date_of_end + '</td>' +
                    '</tr>';

                tableBody.append(rowHtml);
            });
        }
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons {{ asset('admin') }}/examples -->
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <!-- Datatable init js -->
    <script src="{{ asset('admin') }}/assets/js/pages/datatables.init.js"></script>
    <script>
        $('.table').DataTable({
            "retl": true,
            "language": {
                "loadingRecords": "جارٍ التحميل...",
                "lengthMenu": "أظهر _MENU_ مدخلات",
                "zeroRecords": "لم يعثر على أية سجلات",
                "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "search": "ابحث:",
                "paginate": {
                    "first": "الأول",
                    "previous": "السابق",
                    "next": "التالي",
                    "last": "الأخير"
                },
                "aria": {
                    "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },
                "select": {
                    "rows": {
                        "_": "%d قيمة محددة",
                        "1": "1 قيمة محددة"
                    },
                    "cells": {
                        "1": "1 خلية محددة",
                        "_": "%d خلايا محددة"
                    },
                    "columns": {
                        "1": "1 عمود محدد",
                        "_": "%d أعمدة محددة"
                    }
                },
                "buttons": {
                    "print": "طباعة",
                    "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                    "pageLength": {
                        "-1": "اظهار الكل",
                        "_": "إظهار %d أسطر"
                    },
                    "collection": "مجموعة",
                    "copy": "نسخ",
                    "copyTitle": "نسخ إلى الحافظة",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "colvis": "إظهار الأعمدة",
                    "colvisRestore": "إستعادة العرض",
                    "copySuccess": {
                        "1": "تم نسخ سطر واحد الى الحافظة",
                        "_": "تم نسخ %ds أسطر الى الحافظة"
                    }
                },
                "searchBuilder": {
                    "add": "اضافة شرط",
                    "clearAll": "ازالة الكل",
                    "condition": "الشرط",
                    "data": "المعلومة",
                    "logicAnd": "و",
                    "logicOr": "أو",
                    "title": [
                        "منشئ البحث"
                    ],
                    "value": "القيمة",
                    "conditions": {
                        "date": {
                            "after": "بعد",
                            "before": "قبل",
                            "between": "بين",
                            "empty": "فارغ",
                            "equals": "تساوي",
                            "not": "ليس",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "number": {
                            "between": "بين",
                            "empty": "فارغة",
                            "equals": "تساوي",
                            "gt": "أكبر من",
                            "gte": "أكبر وتساوي",
                            "lt": "أقل من",
                            "lte": "أقل وتساوي",
                            "not": "ليست",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "string": {
                            "contains": "يحتوي",
                            "empty": "فاغ",
                            "endsWith": "ينتهي ب",
                            "equals": "يساوي",
                            "not": "ليست",
                            "notEmpty": "ليست فارغة",
                            "startsWith": " تبدأ بـ "
                        }
                    },
                    "button": {
                        "0": "فلاتر البحث",
                        "_": "فلاتر البحث (%d)"
                    },
                    "deleteTitle": "حذف فلاتر"
                },
                "searchPanes": {
                    "clearMessage": "ازالة الكل",
                    "collapse": {
                        "0": "بحث",
                        "_": "بحث (%d)"
                    },
                    "count": "عدد",
                    "countFiltered": "عدد المفلتر",
                    "loadMessage": "جارِ التحميل ...",
                    "title": "الفلاتر النشطة",
                    "showMessage": "إظهار الجميع",
                    "collapseMessage": "إخفاء الجميع"
                },
                "infoThousands": ",",
                "datetime": {
                    "previous": "السابق",
                    "next": "التالي",
                    "hours": "الساعة",
                    "minutes": "الدقيقة",
                    "seconds": "الثانية",
                    "unknown": "-",
                    "amPm": [
                        "صباحا",
                        "مساءا"
                    ],
                    "weekdays": [
                        "الأحد",
                        "الإثنين",
                        "الثلاثاء",
                        "الأربعاء",
                        "الخميس",
                        "الجمعة",
                        "السبت"
                    ],
                    "months": [
                        "يناير",
                        "فبراير",
                        "مارس",
                        "أبريل",
                        "مايو",
                        "يونيو",
                        "يوليو",
                        "أغسطس",
                        "سبتمبر",
                        "أكتوبر",
                        "نوفمبر",
                        "ديسمبر"
                    ]
                },
                "editor": {
                    "close": "إغلاق",
                    "create": {
                        "button": "إضافة",
                        "title": "إضافة جديدة",
                        "submit": "إرسال"
                    },
                    "edit": {
                        "button": "تعديل",
                        "title": "تعديل السجل",
                        "submit": "تحديث"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف",
                        "confirm": {
                            "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                            "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
                        }
                    },
                    "error": {
                        "system": "حدث خطأ ما"
                    },
                    "multi": {
                        "title": "قيم متعدية",
                        "restore": "تراجع"
                    }
                },
                "processing": "جارٍ المعالجة...",
                "emptyTable": "لا يوجد بيانات متاحة في الجدول",
                "infoEmpty": "يعرض 0 إلى 0 من أصل 0 مُدخل",
                "thousands": ".",
                "stateRestore": {
                    "creationModal": {
                        "columns": {
                            "search": "إمكانية البحث للعمود",
                            "visible": "إظهار العمود"
                        },
                        "toggleLabel": "تتضمن"
                    }
                },
                "autoFill": {
                    "cancel": "إلغاء الامر",
                    "fill": "املأ كل الخلايا بـ <i>%d<\/i>",
                    "fillHorizontal": "تعبئة الخلايا أفقيًا",
                    "fillVertical": "تعبئة الخلايا عموديا"
                },
                "decimal": ","
            }
        });
    </script>
@endpush
