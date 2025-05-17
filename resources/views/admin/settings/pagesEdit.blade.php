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

        .invalid-feedback {
            display: block;
            color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <br>
        <h4>{{ __('menu.edit_page') }}</h4>

        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">

                <tr>
                    <td>الصفحة الأب</td>
                    <td>
                        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            <option value="0" {{ old('parent_id', $page->parent_id ?? 0) == 0 ? 'selected' : '' }}>لا
                                يوجد أب</option>
                            @foreach ($parentPages as $parent)
                                <option value="{{ $parent->id }}"
                                    {{ old('parent_id', $page->parent_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->getTranslation('name', 'ar') }}
                                </option>
                            @endforeach
                        </select>

                        @error('parent_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

                {{-- أسماء الصفحات --}}
                @foreach ($languages as $language)
                    <tr>
                        <td>اسم الصفحة ({{ $language->name }})</td>
                        <td>
                            <input type="text" name="name[{{ $language->shortcut }}]"
                                value="{{ old('name.' . $language->shortcut, $page->name[$language->shortcut] ?? '') }}"
                                class="form-control @error('name.' . $language->shortcut) is-invalid @enderror">
                            @error('name.' . $language->shortcut)
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                @endforeach

                {{-- محتوى الصفحات --}}
                @foreach ($languages as $language)
                    <tr>
                        <td>محتوى الصفحة ({{ $language->name }})</td>
                        <td>
                            <textarea id="content_{{ $language->shortcut }}" name="content[{{ $language->shortcut }}]"
                                class="form-control @error('content.' . $language->shortcut) is-invalid @enderror">{{ old('content.' . $language->shortcut, $page->content[$language->shortcut] ?? '') }}</textarea>
                            @error('content.' . $language->shortcut)
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
                .create(document.querySelector('#content_{{ $language->shortcut }}'), {
                    language: '{{ $language->shortcut === 'ar' ? 'ar' : 'en' }}',
                    direction: '{{ $language->shortcut === 'ar' ? 'rtl' : 'ltr' }}'
                })
                .catch(error => {
                    console.error(error);
                });
        @endforeach
    </script>
@endsection
