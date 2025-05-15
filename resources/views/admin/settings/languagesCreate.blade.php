@extends('layouts.app')

@section('styles')
    <style>
        /* إعداد اتجاه الصفحة RTL */
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        /* تخصيص الحقول */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        .btn-success {
            width: 100%;
            display: block;
        }

        /* تحسين الزر */
        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* رسائل الخطأ */
        .invalid-feedback {
            color: #dc3545;
            display: block;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <br>
                    <h4>{{ __('إضافة لغة جديدة') }}</h4>
                </div>
                <div class="widget-content widget-content-area">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.languages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- حقل الاسم -->
                        <div class="form-group">
                            <label for="name">{{ __('الاسم') }}</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="أدخل اسم اللغة"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- حقل العلم -->
                        <div class="form-group">
                            <label for="flag">{{ __('العلم') }}</label>
                            <input type="file" id="flag" name="flag"
                                class="form-control @error('flag') is-invalid @enderror" accept="image/*" required>
                            @error('flag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- حقل الاختصار -->
                        <div class="form-group">
                            <label for="shortcut">{{ __('الاختصار') }}</label>
                            <input type="text" id="shortcut" name="shortcut"
                                class="form-control @error('shortcut') is-invalid @enderror"
                                placeholder="أدخل اختصار اللغة (مثلاً: ar)" value="{{ old('shortcut') }}" required>
                            @error('shortcut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- حقل الفعالية -->
                        <!-- حقل الفعالية -->
                        <div class="form-group">
                            <div class="form-check">
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" id="active" name="active" class="form-check-input" value="1"
                                    {{ old('active', false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">{{ __('فعالة') }}</label>
                            </div>
                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- زر الحفظ -->
                        <button type="submit" class="btn btn-success">{{ __('حفظ') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
