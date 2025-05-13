@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .table thead th {
            vertical-align: middle;
            text-align: center;
        }

        .table td,
        .table th {
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

        .btn-success {
            color: #198754;
        }

        .btn-success:hover {
            background: #e6f7ee;
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-delete:hover {
            background: #fdeaea;
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
                            <h4>الأسئلة الشائعة</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="badge badge-info">عدد الأسئلة: {{ $faqs->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('admin.faqs.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered mb-4">
                            <tr>
                                <td colspan="2">
                                    <h3>إضافة سؤال جديد</h3>
                                </td>
                            </tr>

                            <tr>
                                <td>السؤال (عربي)</td>
                                <td><input type="text" name="ar_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (عربي)</td>
                                <td><input type="text" name="ar_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>السؤال (إنجليزي)</td>
                                <td><input type="text" name="en_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (إنجليزي)</td>
                                <td><input type="text" name="en_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>السؤال (فرنسي)</td>
                                <td><input type="text" name="fr_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (فرنسي)</td>
                                <td><input type="text" name="fr_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>السؤال (ألماني)</td>
                                <td><input type="text" name="de_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (ألماني)</td>
                                <td><input type="text" name="de_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>السؤال (تركي)</td>
                                <td><input type="text" name="tr_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (تركي)</td>
                                <td><input type="text" name="tr_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>السؤال (سواحلي)</td>
                                <td><input type="text" name="sw_qs" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الإجابة (سواحلي)</td>
                                <td><input type="text" name="sw_answer" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>الترتيب</td>
                                <td><input type="number" name="ordering" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-success">
                                        إضافة
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <!-- FAQ List Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th>السؤال (عربي)</th>
                                    <th>السؤال (إنجليزي)</th>
                                    <th>السؤال (فرنسي)</th>
                                    <th>السؤال (ألماني)</th>
                                    <th>السؤال (تركي)</th>
                                    <th>السؤال (سواحلي)</th>
                                    <th class="text-center" width="10%">الترتيب</th>
                                    <th class="text-center" width="15%">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $faq)
                                    <tr>
                                        <td class="text-center">{{ $faq->id }}</td>
                                        <td>{{ $faq->ar_qs }}</td>
                                        <td>{{ $faq->en_qs }}</td>
                                        <td>{{ $faq->fr_qs }}</td>
                                        <td>{{ $faq->de_qs }}</td>
                                        <td>{{ $faq->tr_qs }}</td>
                                        <td>{{ $faq->sw_qs }}</td>
                                        <td class="text-center">{{ $faq->ordering }}</td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                <form action="{{ route('admin.faqs.delete', ['faq' => $faq->id]) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا السؤال؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn btn-delete" title="حذف">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">لا يوجد أسئلة شائعة</td>
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
