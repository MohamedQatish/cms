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

        .table td,
        .table th {
            vertical-align: middle;
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

        .btn-edit {
            color: #0d6efd;
        }

        .btn-edit:hover {
            background: #e7f1ff;
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-delete:hover {
            background: #fdeaea;
        }

        .permission-card {
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .permission-card .card-body {
            padding: 10px 15px;
        }

        .permissions-container {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 6px;
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
                            <h4>{{ __('menu.edit_user') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.admins.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mb-4">
                                    <label for="username">{{ __('menu.username') }}</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username', $user->username) }}"
                                        required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password">{{ __('menu.password') }} ({{ __('menu.password_leave_empty') }})</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">{{ __('menu.permissions_management') }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="section-title mb-3">{{ __('menu.available_permissions') }}</h6>
                                        <div class="permissions-container">
                                            @foreach ($menu as $m)
                                                <div class="card mb-2 permission-card">
                                                    <div class="card-body py-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                                value="{{ $m->id }}" id="menu_{{ $m->id }}"
                                                                @if (in_array($m->id, $userPermissions)) checked @endif>
                                                            <label class="form-check-label" for="menu_{{ $m->id }}">
                                                                {{ $m->ar_title }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-save ml-2">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                                {{ __('menu.save_changes') }}
                            </button>
                            <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x ml-2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                {{ __('menu.cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
