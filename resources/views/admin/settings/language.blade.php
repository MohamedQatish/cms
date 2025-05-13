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
        .table td, .table th {
            vertical-align: middle;
        }
        .media {
            display: flex;
            align-items: center;
        }
        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 10px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .media-body {
            display: flex;
            flex-direction: column;
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
        .content-preview {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                        <h4>تحرير الكلمات متعددة اللغات</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-4 text-center">
                        <thead>
                            <tr>
                                <th>الكلمة</th>
                                @foreach($languages as $language)
                                    <th>{{ $language->name }}</th>
                                @endforeach
                                <th>تحرير</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_words as $word)
                                <form method="POST" action="{{ route('settings.edit_language') }}">
                                    @csrf
                                    <tr>
                                        <td class="align-middle">{{ $word->title }}</td>
                                        @foreach($languages as $language)
                                            @php $shortcut = $language->shortcut; @endphp
                                            <td>
                                                <textarea name="{{ $shortcut }}" style="width: 150px;">{{ $word->$shortcut }}</textarea>
                                            </td>
                                        @endforeach
                                        <td class="align-middle">
                                            <input type="hidden" name="id" value="{{ $word->id }}">
                                            <button type="submit" class="btn btn-success">{{ __('edit') }}</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
