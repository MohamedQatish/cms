@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>إضافة دفعة جديدة</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('admin.payments.store') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="student_name">اسم الطالب</label>
                            <input type="text" class="form-control @error('student_name') is-invalid @enderror"
                                id="student_name" name="student_name" onkeyup="fetch_students(this.value)" autocomplete="off">
                            @error('student_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <select id="student_id" name="student_id" class="form-control mt-2">
                                <!-- خيارات الطالب ستظهر هنا -->
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="course_name">الدورة</label>
                            <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                                id="course_name" name="course_name" onkeyup="fetch_courses(this.value)" autocomplete="off">
                            @error('course_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <select id="course_id" name="course_id" class="form-control mt-2">
                                <!-- خيارات الدورة ستظهر هنا -->
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="amount">المبلغ</label>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" name="amount" autocomplete="off">
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="date">التاريخ</label>
                            <input type="text" name="date" class="form-control" style="width: 300px;" id="sandbox-container" autocomplete="off">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">
                                إضافة
                            </button>
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#sandbox-container').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        function fetch_students(name) {
            $.ajax({
                type: "POST",
                url: "{{ route('fetch_students') }}",
                data: {'name': name, '_token': '{{ csrf_token() }}'}
            }).done(function (msg) {
                $('#student_id').html(msg);
            });
        }

        function fetch_courses(name) {
            $.ajax({
                type: "POST",
                url: "{{ route('fetch_courses') }}",
                data: {'name': name, '_token': '{{ csrf_token() }}'}
            }).done(function (msg) {
                $('#course_id').html(msg);
            });
        }
    </script>
@endsection
