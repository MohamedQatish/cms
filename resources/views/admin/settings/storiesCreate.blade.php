@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 15px auto;
            border: 1px solid #ddd;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
                            <h4>إضافة رأي جديد</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="name">الاسم الكامل</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="spec">الاختصاص/الوظيفة</label>
                            <input type="text" class="form-control @error('spec') is-invalid @enderror" id="spec"
                                name="spec" value="{{ old('spec') }}" required>
                            @error('spec')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="content">المحتوى</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                                required>{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="image">صورة الشخص</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                id="image" name="image" accept="image/*" required>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="avatar-preview mt-3">
                                <img src="{{ asset('storage/stories/placeholder.png') }}" alt="صورة افتراضية"
                                    id="imagePreview">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save ml-2"></i> حفظ
                            </button>
                            <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times ml-2"></i> إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
