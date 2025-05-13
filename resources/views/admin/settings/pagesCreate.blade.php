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
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <h4>إضافة صفحة جديدة</h4>

        <form method="POST" action="{{ route('admin.pages.store') }}" id="form" enctype="multipart/form-data">
            @csrf

            <table class="table">
                <!-- الحقل الخاص بالصفحة الرئيسية -->
                <tr>
                    <td>الصفحة الأب</td>
                    <td>
                        <select name="parent_id" class="form-control">
                            <option value="0">لا يوجد أب</option>
                            @foreach ($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->ar_name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <!-- الحقول الخاصة بالأسماء -->
                @foreach ($languages as $language)
                    <?php $name = $language->shortcut . '_name'; ?>
                    <tr>
                        <td>اسم الصفحة ({{ $language->name }})</td>
                        <td>
                            <input type="text"
                                   name="{{ $name }}"
                                   class="form-control"
                                   value="{{ old($name) }}">
                        </td>
                    </tr>
                @endforeach

                <!-- الحقول الخاصة بالمحتوى -->
                @foreach ($languages as $index => $language)
                    <?php $content = $language->shortcut . '_content'; ?>
                    <tr>
                        <td>محتوى الصفحة ({{ $language->name }})</td>
                        <td>
                            <textarea id="summernote{{ $index + 1 }}"
                                      name="{{ $content }}"
                                      class="form-control">{{ old($content) }}</textarea>
                        </td>
                    </tr>
                @endforeach

                <!-- زر الحفظ -->
                <tr>
                    <td colspan="2" class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> {{ __('messages.add') }}
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
