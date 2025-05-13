@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }
        .permission-card {
            border-left: 3px solid #4e73df;
            transition: all 0.3s;
        }
        .permission-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .section-title {
            position: relative;
            padding-right: 15px;
            color: #4e73df;
        }
        .section-title:after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 20px;
            background: #4e73df;
            border-radius: 3px;
        }
    </style>
@endsection

@section('content')
<div class="rtl-content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('menu.add_new_admin') }}</h1>
            <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> {{ __('menu.back_to_list') }}
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('menu.basic_info') }}</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.admins.store') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">{{ __('menu.username') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">{{ __('menu.password') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save"></i> {{ __('menu.save_data') }}
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo"></i> {{ __('menu.reset') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('menu.permissions_management') }}</h6>
                    </div>
                    <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                        <h6 class="section-title mb-3">{{ __('menu.available_permissions') }}</h6>

                        @foreach($menu as $m)
                        <div class="card mb-2 permission-card">
                            <div class="card-body py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           name="menu[]" value="{{ $m->id }}"
                                           id="menu_{{ $m->id }}">
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
</div>
@endsection
