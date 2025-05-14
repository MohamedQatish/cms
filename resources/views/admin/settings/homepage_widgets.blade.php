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

        .table tbody td:nth-child(3),
        .table tbody td:nth-child(4),
        .table tbody td:nth-child(5) {
            text-align: center;
            vertical-align: middle;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .input-style,
        .select-style {
            width: 160px;
            padding: 6px 10px;
            margin: 0 auto;
            display: block;
            text-align: center;
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: 1px solid #bbb;
            border-radius: 6px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
            background-color: #f9faff;
        }

        .input-style:focus,
        .select-style:focus {
            border-color: #409eff;
            outline: none;
            box-shadow: 0 0 5px rgba(64, 158, 255, 0.5);
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
        }

        .btn-edit:hover {
            background: #e7f1ff;
        }

        .btn-delete:hover {
            background: #fdeaea;
        }

        /* Toggle Switch CSS */
        .switch {
            position: relative;
            display: inline-block;
            width: 46px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        /* Notification style */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4BB543;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            z-index: 1000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .notification.show {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <br>
                    <h4>{{ __('menu.home_sections') }}</h4>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('menu.name') }}</th>
                                    <th>{{ __('menu.order') }}</th>
                                    <th>{{ __('menu.effect') }}</th>
                                    <th>{{ __('menu.effect_duration') }}</th>
                                    <th>{{ __('menu.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($homepageWidgets as $widget)
                                    <tr>
                                        <td>{{ $widget->id }}</td>
                                        <td>{{ $widget->name }}</td>
                                        <td>
                                            <input type="text" class="input-style" value="{{ $widget->ordering }}"
                                                onchange="changeOrdering('homepage_widgets', {{ $widget->id }}, this.value)">
                                        </td>
                                        <td>
                                            <select class="select-style"
                                                onchange="changeEffect(this.value, {{ $widget->id }})">
                                                @foreach ($effects as $effect)
                                                    <option value="{{ $effect->id }}"
                                                        {{ $widget->effect_id === $effect->id ? 'selected' : '' }}>
                                                        {{ $effect->effect_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <input type="text" class="input-style" value="{{ $widget->duration }}"
                                                onchange="changeEffectDuration({{ $widget->id }}, this.value)">
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" {{ $widget->active ? 'checked' : '' }}
                                                    onchange="updateStatus({{ $widget->id }}, this.checked ? 1 : 0)">
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">{{ __('menu.no_data') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Notification container --}}
    <div id="notification" class="notification"></div>
@endsection

@section('scripts')
    <script>
        function showNotification(message, duration = 3000) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.classList.add('show');
            setTimeout(() => {
                notification.classList.remove('show');
            }, duration);
        }

        function updateStatus(id, value) {
            axios.post("{{ route('admin.homepage_widgets.update_status') }}", {
                id,
                status: value
            }).then(() => {
                showNotification("{{ __('menu.status_updated') }}");
            }).catch(error => {
                console.error(error);
                showNotification("حدث خطأ أثناء تحديث الحالة", 4000);
            });
        }

        function changeOrdering(table, id, value) {
            axios.post("{{ route('admin.homepage_widgets.change_ordering') }}", {
                table,
                id,
                value
            }).then(() => {
                showNotification("{{ __('menu.order_updated') }}");
            }).catch(error => {
                console.error(error);
                showNotification("حدث خطأ أثناء تحديث الترتيب", 4000);
            });
        }

        function changeEffect(value, id) {
            if (!value || !id) {
                showNotification('بيانات غير صالحة', 4000);
                return;
            }

            axios.post("{{ route('admin.homepage_widgets.change_effect') }}", {
                id: id,
                effect_id: value
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                showNotification(response.data.message);
            }).catch(error => {
                console.error('Error:', error);
                showNotification('حدث خطأ أثناء التحديث: ' + (error.response?.data?.message || error.message), 4000);
            });
        }

        function changeEffectDuration(id, value) {
            axios.post("{{ route('admin.homepage_widgets.change_effect_duration') }}", {
                id,
                duration: value
            }).then(() => {
                showNotification("{{ __('menu.duration_updated') }}");
            }).catch(error => {
                console.error(error);
                showNotification("حدث خطأ أثناء تحديث زمن الحركة", 4000);
            });
        }
    </script>
@endsection
