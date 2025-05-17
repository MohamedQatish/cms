@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <link href="{{ asset('summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote.js') }}"></script>
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
        .text-danger {
            color: #dc3545;
            font-size: 0.9em;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <br>
        <h4>{{ __('menu.add_page') }}</h4>

        <form method="POST" action="{{ route('admin.pages.store') }}" id="form" enctype="multipart/form-data">
            @csrf

            <table class="table">
                <tr>
                    <td>الصفحة الأب</td>
                    <td>
                        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            <option value="0" {{ old('parent_id') == 0 ? 'selected' : '' }}>لا يوجد أب</option>
                            @foreach ($pages as $page)
                                <option value="{{ $page->id }}" {{ old('parent_id') == $page->id ? 'selected' : '' }}>
                                    {{ $page->getTranslation('name', 'ar') }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>

                @foreach ($languages as $language)
                    <tr>
                        <td>اسم الصفحة ({{ $language->name }})</td>
                        <td>
                            <input type="text"
                                   name="name[{{ $language->shortcut }}]"
                                   class="form-control @error('name.' . $language->shortcut) is-invalid @enderror"
                                   value="{{ old('name.' . $language->shortcut) }}">
                            @error('name.' . $language->shortcut)
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                @endforeach

                @foreach ($languages as $index => $language)
                    <tr>
                        <td>محتوى الصفحة ({{ $language->name }})</td>
                        <td>
                            <textarea id="summernote{{ $index + 1 }}"
                                      name="content[{{ $language->shortcut }}]"
                                      class="form-control @error('content.' . $language->shortcut) is-invalid @enderror">{{ old('content.' . $language->shortcut) }}</textarea>
                            @error('content.' . $language->shortcut)
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2" class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> {{ __('menu.add') }}
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            @foreach ($languages as $index => $language)
                $('#summernote{{ $index + 1 }}').summernote({
                    placeholder: '',
                    tabsize: 2,
                    height: 200
                });
            @endforeach
        });
    </script>
@endsection
