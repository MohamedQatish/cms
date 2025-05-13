@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .action-btns {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 6px;
            background: none;
            transition: background 0.2s;
            cursor: pointer;
            padding: 0;
        }
        .btn-edit {
            color: #0d6efd;
        }
        .btn-edit:hover {
            background: #e7f1ff;
        }
        .btn-delete {
            color: #dc3545;
        }
        .btn-delete:hover {
            background: #fdeaea;
        }
        .btn-print {
            color: #28a745;
        }
        .btn-print:hover {
            background: #e6f7eb;
        }
        .badge-warning {
            background-color: #fff4de;
            color: #ffa800;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .badge-info {
            background-color: #e1f0ff;
            color: #0062ff;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .badge-danger {
            background-color: #ffebee;
            color: #f44336;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .badge-success {
            background-color: #e8f5e9;
            color: #4caf50;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .date-filter {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 20px;
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
                            <br>
                            <h4>سجل المدفوعات</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('admin.payments.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus ml-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    إضافة دفعة جديدة
                                </a>
                                <span class="badge badge-info ml-2"> عدد المدفوعات: {{ $payments->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.payments.index') }}" class="date-filter">
                        <div class="form-group mb-0">
                            <input type="text"
                                   value="{{ request('start_date') }}"
                                   name="start_date"
                                   class="form-control"
                                   id="sandbox-container1"
                                   required
                                   autocomplete="off"
                                   placeholder="من تاريخ" />
                        </div>
                        <div class="form-group mb-0">
                            <input type="text"
                                   required
                                   value="{{ request('end_date') }}"
                                   name="end_date"
                                   class="form-control"
                                   id="sandbox-container2"
                                   autocomplete="off"
                                   placeholder="إلى تاريخ" />
                        </div>
                        <button type="submit" class="btn btn-success">بحث</button>
                        @if(request('start_date'))
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-danger">إلغاء الفلتر</a>
                        @endif
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">الرقم</th>
                                    <th class="text-center">الطالب</th>
                                    <th class="text-center">الدورة</th>
                                    <th class="text-center">المبلغ</th>
                                    <th class="text-center">الموظف</th>
                                    <th class="text-center">التاريخ</th>
                                    <th class="text-center">المبلغ المدفوع</th>
                                    <th class="text-center">المبلغ المتبقي</th>
                                    <th class="text-center">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                    <tr>
                                        <td class="text-center">{{ $payment->id }}</td>
                                        <td class="text-center">{{ $payment->first_name }} {{ $payment->last_name }}</td>
                                        <td class="text-center">{{ $payment->name }}</td>
                                        <td class="text-center">{{ $payment->amount }} $</td>
                                        <td class="text-center">{{ $payment->username }}</td>
                                        <td class="text-center">{{ date('Y-m-d', strtotime($payment->date)) }}</td>
                                        <td class="text-center">
                                            <span class="badge badge-success">{{ number_format($payment->total) }} $</span>
                                        </td>
                                        <td class="text-center">
                                            @if($payment->course_cost)
                                                @php
                                                    $remaining = $payment->course_cost - $payment->total;
                                                    $badgeClass = $remaining > 0 ? 'badge-danger' : 'badge-success';
                                                @endphp
                                                <span class="badge {{ $badgeClass }}">
                                                    {{ number_format($remaining) }} $
                                                </span>
                                            @else
                                                <span class="badge badge-warning">غير محدد</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                <a href="{{ route('admin.payments.edit', $payment->id) }}"
                                                    class="action-btn btn-edit" title="تعديل">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                                <button onclick="printDiv({{ $payment->id }})"
                                                    class="action-btn btn-print" title="طباعة">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                </button>
                                                <form action="{{ route('admin.payments.delete', $payment->id) }}" method="POST"
                                                    style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الدفعة؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn btn-delete" title="حذف">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">لا يوجد مدفوعات مسجلة</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#sandbox-container1').datepicker({
                dateFormat: 'yy-mm-dd',
                regional: 'ar'
            });

            $('#sandbox-container2').datepicker({
                dateFormat: 'yy-mm-dd',
                regional: 'ar'
            });
        });

        function printDiv(paymentId) {
            // يمكنك تطوير هذه الوظيفة حسب احتياجاتك
            window.open(`/payments/${paymentId}/print`, '_blank');
        }
    </script>
@endsection
