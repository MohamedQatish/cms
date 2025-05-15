@extends('layouts.app')

@section('styles')
    <style>
        /* إعداد اتجاه الصفحة RTL */
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        /* تخصيص الجدول */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        /* تخصيص الأزرار */
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        /* تخصيص سويتش التفعيل */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <br>
                    <h4>{{ __('اللغات') }}</h4>
                    <a href="{{ route('admin.languages.create') }}" class="btn btn-primary btn-sm">{{ __('إضافة جديدة') }}</a>
                </div>
                <div class="widget-content widget-content-area">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('الاسم') }}</th>
                                <th>{{ __('العلم') }}</th>
                                <th>{{ __('الاختصار') }}</th>
                                <th>{{ __('مفعل') }}</th>
                                <th>{{ __('رئيسية') }}</th>
                                <th>{{ __('الإجراءات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $language->name }}</td>
                                    <td>
                                        @if ($language->flag)
                                            <img src="{{ asset('storage/' . $language->flag) }}" alt="{{ $language->name }}"
                                                style="width: 50px; height: auto;">
                                        @else
                                            <span>{{ __('لا يوجد علم') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $language->shortcut }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="toggle-active" data-id="{{ $language->id }}"
                                                {{ $language->active ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="main_language" class="toggle-main"
                                            data-id="{{ $language->id }}" {{ $language->main ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.languages.destroy', $language->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm">{{ __('حذف') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // CSRF Token لإستخدامه في Ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // تحديث حالة active
            $('.toggle-active').change(function() {
                var languageId = $(this).data('id');
                var isActive = $(this).is(':checked') ? 1 : 0;
                var $switch = $(this);

                $.ajax({
                    url: "/admin/settings/languages/" + languageId + "/toggle-active",
                    method: 'PATCH',
                    data: {
                        active: isActive
                    },
                    success: function(response) {
                        if (response.success) {
                            $switch.prop('checked', response.active);
                            Swal.fire({
                                icon: 'success',
                                title: 'نجاح',
                                text: response.message,
                                confirmButtonText: 'حسناً'
                            });
                        } else {
                            $switch.prop('checked', !isActive);
                            showError(response.message);
                        }
                    },
                    error: function(xhr) {
                        $switch.prop('checked', !isActive);
                        showError(xhr.responseJSON?.message || 'حدث خطأ غير متوقع');
                    }
                });
            });

            // تحديث اللغة الرئيسية
            $('.toggle-main').change(function() {
                var languageId = $(this).data('id');
                var $radio = $(this);

                Swal.fire({
                    title: 'تأكيد التغيير',
                    text: "هل أنت متأكد من تغيير اللغة الرئيسية؟",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، تغيير',
                    cancelButtonText: 'إلغاء'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/settings/languages/" + languageId + "/toggle-main",
                            method: 'PATCH',
                            success: function(response) {
                                if (response.success) {
                                    $('.toggle-main').prop('checked', false);
                                    $radio.prop('checked', true);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'نجاح',
                                        text: response.message,
                                        confirmButtonText: 'حسناً'
                                    });
                                } else {
                                    $radio.prop('checked', false);
                                    showError(response.message);
                                }
                            },
                            error: function(xhr) {
                                $radio.prop('checked', false);
                                showError(xhr.responseJSON?.message ||
                                    'حدث خطأ غير متوقع');
                            }
                        });
                    } else {
                        $radio.prop('checked', false);
                    }
                });
            });

            function showError(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ',
                    text: message,
                    confirmButtonText: 'حسناً'
                });
            }
        });
    </script>
@endsection
