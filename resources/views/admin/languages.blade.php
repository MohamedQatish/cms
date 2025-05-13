@extends('layouts.app')

@section('styles')
<style>
    /* تخصيصات RTL */
    .rtl-content {
        direction: rtl;
        text-align: right;
    }

    /* زر إضافة جديد */
    .btn-new-page {
        background-color: #4361ee;
        color: white;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .btn-new-page:hover {
        background-color: #3a56d4;
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        color: white;
    }
    .btn-new-page svg {
        margin-left: 8px;
        width: 18px;
        height: 18px;
    }
</style>
@endsection

@section('content')
<br><br>

<div class="rtl-content">
    <div class="d-flex justify-content-end mb-4">
        <a  class="btn-new-page">
            <span>Search</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </a>
    </div>

    <div id="entriesSearch" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>جدول البحث</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>العربية</th>
                                <th>English</th>
                                <th>Deutsch</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- محتوى الجدول هنا -->
                            <tr>
                                <td>محمد أحمد</td>
                                <td>مرحبا</td>
                                <td>Hello</td>
                                <td>Hallo</td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm">
                                        تعديل
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>سارة محمد</td>
                                <td>وداعا</td>
                                <td>Goodbye</td>
                                <td>Auf Wiedersehen</td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm">
                                        تعديل
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- Scripts Here --}}
@endsection
