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
        .table td, .table th {
            vertical-align: middle;
        }
        .media {
            display: flex;
            align-items: center;
        }
        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 10px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .media-body {
            display: flex;
            flex-direction: column;
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
        .badge-warning {
            background-color: #fff4de;
            color: #ffa800;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .badge-info {
            background-color: #e1f0ff;
            color: #0062ff;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: normal;
        }
        .content-preview {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                            <h4>{{ __('menu.opinions') }}</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('admin.stories.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus ml-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    {{ __('menu.add') }}
                                </a>
                                <span class="badge badge-info ml-2">{{ __('menu.opinions_count') }}: {{ $stories->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">{{ __('menu.data') }}</th>
                                    <th width="20%">{{ __('menu.specialization') }}</th>
                                    <th width="35%">{{ __('menu.content') }}</th>
                                    <th class="text-center" width="15%">{{ __('menu.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stories as $story)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="media">
                                                <div class="avatar">
                                                    <img src="{{ $story->image ? asset('storage/'.$story->image) : asset('storage/stories/placeholder.png') }}"
                                                        alt="{{ $story->name }}"
                                                        onerror="this.src='{{ asset('storage/stories/placeholder.png') }}'">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $story->name }}</h6>
                                                    <span class="text-muted">{{ $story->email ?? '' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">{{ $story->spec }}</span>
                                        </td>
                                        <td class="content-preview" title="{{ $story->content }}">
                                            {{ Str::limit($story->content, 50) }}
                                        </td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                <a href="{{ route('admin.stories.edit', $story->id) }}"
                                                    class="action-btn btn-edit" title="{{ __('menu.edit') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                                <form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST"
                                                    style="display:inline;" onsubmit="return confirm('{{ __('menu.delete_confirm') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn btn-delete" title="{{ __('menu.delete') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">{{ __('menu.no_opinions') }}</td>
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
