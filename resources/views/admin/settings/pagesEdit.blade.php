@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .editor-container {
            min-height: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <h4>تعديل الصفحة: {{ $page->ar_name }}</h4>

        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <!-- الحقول الخاصة بالأسماء -->
                @foreach ($languages as $language)
                    <tr>
                        <td>اسم الصفحة ({{ $language->name }})</td>
                        <td>
                            <input type="text"
                                   name="{{ $language->shortcut }}_name"
                                   value="{{ old($language->shortcut . '_name', $page[$language->shortcut . '_name']) }}"
                                   class="form-control @error($language->shortcut . '_name') is-invalid @enderror">
                            @error($language->shortcut . '_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                @endforeach

                <!-- الحقل الخاص بالصفحة الرئيسية -->
                <tr>
                    <td>الصفحة الأب</td>
                    <td>
                        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            <option value="0">لا يوجد أب</option>
                            @foreach ($parentPages as $parent)
                                <option value="{{ $parent->id }}" {{ $page->parent_id == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->ar_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

                <!-- الحقول الخاصة بالمحتوى -->
                @foreach ($languages as $language)
                    <tr>
                        <td>محتوى الصفحة ({{ $language->name }})</td>
                        <td>
                            <textarea id="{{ $language->shortcut }}_content"
                                      name="{{ $language->shortcut }}_content"
                                      class="form-control @error($language->shortcut . '_content') is-invalid @enderror">
                                {{ old($language->shortcut . '_content', $page[$language->shortcut . '_content']) }}
                            </textarea>
                            @error($language->shortcut . '_content')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> حفظ التعديلات
                </button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> إلغاء
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        @foreach ($languages as $language)
            ClassicEditor
                .create(document.querySelector('#{{ $language->shortcut }}_content'), {
                    language: '{{ $language->shortcut === "ar" ? "ar" : "en" }}',
                    direction: '{{ $language->shortcut === "ar" ? "rtl" : "ltr" }}'
                })
                .catch(error => {
                    console.error(error);
                });
        @endforeach
    </script>
@endsection
