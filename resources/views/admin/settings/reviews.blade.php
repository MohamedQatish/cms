@extends('layouts.app')

@section('styles')
    <style>
        .not_seen {
            background: darkseagreen;
            color: #000;
        }
        .table thead th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
        .action-btns {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        .btn-delete:hover {
            background: #fdeaea;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12">
                            <br>
                            <h4> التقييمات</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>المنتج</th>
                                    <th>التعليق</th>
                                    <th>التقييم</th>
                                    <th>التفعيل</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $r)
                                    <tr class="{{ $r->approved == 0 ? 'not_seen' : '' }}">
                                        <td>{{ $r->id }}</td>
                                        <td>{{ $r->fullname }}</td>
                                        <td>{{ $r->product_name }}</td>
                                        <td>{{ $r->comment }}</td>
                                        <td>{{ $r->stars }}</td>
                                        <td>
                                            @if($r->approved == 0)
                                                <a href="{{ route('admin.reviews.approve', ['id' => $r->id, 'value' => 1]) }}">
                                                    <img src="{{ asset('images/icons/featured_on.png') }}" alt="مفضلة" />
                                                </a>
                                            @else
                                                <a href="{{ route('admin.reviews.approve', ['id' => $r->id, 'value' => 0]) }}">
                                                    <img src="{{ asset('images/icons/featured_off.png') }}" alt="غير مفضلة" />
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.reviews.delete', $r->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <img src="{{ asset('images/icons/delete.png') }}" alt="حذف" />
                                                </button>
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
    </div>
@endsection
