@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/switchery.min.css') }}" rel="stylesheet">
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
            background-color: #f8f9fa;
        }
        .fieldset-custom {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .legend-custom {
            width: auto;
            padding: 0 10px;
            font-size: 1.1rem;
            border-bottom: none;
        }
        .form-table {
            width: 100%;
            margin-bottom: 0;
        }
        .form-table td {
            padding: 8px;
        }
    </style>
@endsection

@section('content')
<div class="rtl-content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- نموذج إضافة قائمة جديدة -->
                <fieldset class="fieldset-custom">
                    <legend class="legend-custom">قائمة جديدة</legend>
                    <form method="POST" action="{{ route('admin.top-menu.store') }}">
                        @csrf
                        <table class="form-table">
                            <tr>
                                <td>
                                    <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                                </td>
                                <td>
                                    <input type="text" name="url" class="form-control" placeholder="الرابط" required>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus ml-2"></i> إضافة
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>

                <!-- جدول عرض القوائم -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>الرابط</th>
                                <th>الاسم</th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topMenus as $menu)
                                <tr>
                                    <td>{{ $menu->url }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        <input type="checkbox" class="js-switch" data-id="{{ $menu->id }}"
                                            {{ $menu->active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.top-menu.destroy', $menu->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                                <i class="fas fa-trash ml-2"></i> حذف
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

@section('scripts')
    <script src="{{ asset('js/switchery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize switches
            const switches = document.querySelectorAll('.js-switch');
            switches.forEach(switcher => {
                const switchery = new Switchery(switcher, {
                    color: '#26B99A',
                    secondaryColor: '#f44336',
                    jackColor: '#fff',
                    jackSecondaryColor: '#fff',
                    size: 'small'
                });

                // Handle status change
                switcher.addEventListener('change', function() {
                    const menuId = this.dataset.id;
                    const isActive = this.checked ? 1 : 0;

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('admin.top-menu.status') }}",
                        data: {
                            id: menuId,
                            active: isActive,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message || 'حدث خطأ ما'
                            });
                        }
                    });
                });
            });

            // Initialize Toast
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
@endsection
