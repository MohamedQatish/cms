@extends('layouts.app')

@section('title', 'عرض الرسالة')

@section('styles')
<style>
    .rtl-content {
        direction: rtl;
        text-align: right;
    }
    .table th, .table td {
        text-align: right;
        vertical-align: middle;
    }
    .widget-header h4 {
        font-weight: bold;
        text-align: center;
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
                        <h4>عرض الرسالة</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center bg-primary text-white">تفاصيل الرسالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>الرقم</td>
                            <td>{{ $message->id }}</td>
                        </tr>
                        <tr>
                            <td>الاسم</td>
                            <td>{{ $message->name }}</td>
                        </tr>
                        <tr>
                            <td>عنوان الرسالة</td>
                            <td>{{ $message->subject }}</td>
                        </tr>
                        <tr>
                            <td>البريد الإلكتروني</td>
                            <td>{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <td>الهاتف</td>
                            <td>{{ $message->phone }}</td>
                        </tr>
                        <tr>
                            <td>الرسالة</td>
                            <td>{{ $message->message }}</td>
                        </tr>
                        <tr>
                            <td>التاريخ</td>
                            <td>{{ $message->date }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <a href="{{ route('admin.contact_us.index') }}" class="btn btn-success">رجوع</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
