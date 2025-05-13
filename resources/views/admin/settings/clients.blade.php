@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lg-zoom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lg-thumbnail.css') }}">
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .table thead th {
            vertical-align: middle;
            text-align: center;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .client-image {
            width: 200px;
            height: auto;
            border-radius: 4px;
            transition: transform 0.3s;
        }

        .client-image:hover {
            transform: scale(1.05);
        }

        .gallery-item {
            cursor: pointer;
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

        .btn-delete {
            color: #dc3545;
        }

        .btn-delete:hover {
            background: #fdeaea;
        }

        .form-section {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .form-section h3 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
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
                            <h3>إدارة العملاء</h3>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-section">
                        <h3>إضافة عميل جديد</h3>
                        <form method="post" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="table">
                                <tr>
                                    <td width="20%">الاسم</td>
                                    <td>
                                        <input type="text" name="name" class="form-control" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>الرابط</td>
                                    <td>
                                        <input type="text" name="link" class="form-control" />
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>الصورة</td>
                                    <td>
                                        <input type="file" name="image" class="form-control-file" required />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus ml-2"></i> إضافة
                            </button>
                        </form>
                    </div>

                    <hr />

                    <div class="table-responsive" id="clients-gallery">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th width="10%">الرقم</th>
                                    <th width="25%">الاسم</th>
                                    <th width="45%">الصورة</th>
                                    <th width="20%">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>
                                            <a href="{{ asset('uploads/clients/' . $client->image) }}" class="gallery-item">
                                                <img src="{{ asset('uploads/clients/' . $client->image) }}"
                                                    alt="{{ $client->name }}" class="client-image">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                                <form action="{{ route('admin.clients.delete', $client->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا العميل؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn btn-delete" title="حذف">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="22" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17"></line>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">لا يوجد عملاء مسجلين</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/lg-thumbnail.umd.js') }}"></script>
    <script src="{{ asset('js/plugins/lg-zoom.umd.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize lightGallery
            lightGallery(document.getElementById('clients-gallery'), {
                selector: '.gallery-item',
                download: false,
                counter: false
            });

            // تغيير ترتيب العناصر
            window.changeOrdering = function(ordering, clientId) {
                $.ajax({
                    type: "PUT",
                    url: "{{ route('admin.client.change-ordering') }}",
                    data: {
                        'ordering': ordering,
                        'client_id': clientId,
                        '_token': '{{ csrf_token() }}'
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
            };

            // تغيير عدد البرامج
            window.changeProgramsCount = function(count, clientId) {
                $.ajax({
                    type: "PUT",
                    url: "{{ route('admin.client.change-programs-count') }}",
                    data: {
                        'count': count,
                        'client_id': clientId,
                        '_token': '{{ csrf_token() }}'
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
            };

            // عرض/إخفاء العنصر حسب النوع
            window.displayItem = function(type) {
                const element = document.getElementById("cat_id_title");
                if (element) {
                    element.style.display = (type == 1 || type == 2) ? "block" : "none";
                }
            };

            // تهيئة Toast notifications
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });
    </script>
@endsection
