@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .table thead th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .content-preview {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .badge-info {
            background-color: #e1f0ff;
            color: #0062ff;
        }

        .action-btns {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .btn-delete:hover {
            background: #fdeaea;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4>{{ __('menu.messages') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('menu.name') }}</th>
                                    <th>{{ __('menu.email') }}</th>
                                    <th>{{ __('menu.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>

                                        <td>
                                            <div class="action-btns">
                                                <a href="{{ route('admin.contact_us.show', $message->id) }}"
                                                    class="btn btn-info btn-sm">{{ __('menu.view') }}</a>
                                                <form action="{{ route('admin.contact_us.delete', $message->id) }}"
                                                    method="POST" onsubmit="return confirm('{{ __('menu.delete_confirm') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('menu.delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('menu.no_messages') }}</td>
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
