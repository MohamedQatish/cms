@extends('layouts.app')

@section('styles')
    <style>
        /* تخصيصات RTL */
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        /* تنسيق الجدول */
        .table-responsive {
            overflow-x: auto;
        }

        .table-bordered th,
        .table-bordered td {
            vertical-align: middle;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .btn-edit {
            background-color: #e1f0ff;
            color: #0062ff;
        }

        .btn-edit:hover {
            background-color: #0062ff;
            color: white;
        }

        .setting-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .setting-form textarea {
            min-height: 80px;
        }

        .img-preview {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
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
                            <h4>{{ __('menu.site_info') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">{{ __('menu.name') }}</th>
                                    <th width="50%">{{ __('menu.content') }}</th>
                                    <th width="20%">{{ __('menu.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->ar_name }}</td>
                                        <td>
                                            @if ($setting->type == 0)
                                                <form method="POST"
                                                    action="{{ route('admin.settings.update.post', $setting->id) }}"
                                                    class="setting-form"> @method('PUT')@csrf
                                                    <textarea name="content" class="form-control">{{ $setting->content }}</textarea>
                                                    <button type="submit" class="btn btn-success btn-sm">{{ __('menu.save') }}</button>
                                                </form>
                                            @elseif($setting->type == 1)
                                                <form method="POST"
                                                    action="{{ route('admin.settings.update.image.post', $setting->id) }}"
                                                    enctype="multipart/form-data" class="setting-form"> @csrf
                                                    @if ($setting->content)
                                                        <img src="{{ asset('storage/' . $setting->content) }}"
                                                            style="max-width: 300px; max-height: 200px; object-fit: contain; border: 1px solid #ddd; padding: 5px; border-radius: 4px;"
                                                            alt="{{ __('menu.setting_image') }}">
                                                    @endif

                                                    <input type="file" name="image" class="form-control-file">
                                                    <button type="submit" class="btn btn-success btn-sm">{{ __('menu.upload') }}</button>
                                                </form>
                                            @elseif($setting->type == 3)
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-{{ $setting->type == 0 ? 'info' : ($setting->type == 1 ? 'warning' : 'success') }}">
                                                {{ $setting->type == 0 ? __('menu.text') : ($setting->type == 1 ? __('menu.image') : __('menu.option')) }}
                                            </span>
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
