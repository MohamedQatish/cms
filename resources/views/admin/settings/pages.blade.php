@extends('layouts.app')

@section('styles')
    <style>
        .rtl-content {
            direction: rtl;
            text-align: right;
        }

        .ordering-input {
            width: 60px;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="rtl-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <br>
                    <h4>{{ __('menu.pages') }}</h4>
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-success">
                        {{ __('menu.new_page') }}
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                @foreach ($languages as $language)
                                    <th>{{ $language->name }}</th>
                                @endforeach
                                <th>{{ __('menu.useful_links') }}</th>
                                <th>{{ __('menu.top_menu') }}</th>
                                <th>{{ __('menu.ordering') }}</th>
                                <th>{{ __('menu.options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    @foreach ($languages as $language)
                                        <td>{{ $page[$language->shortcut . '_name'] }}</td>
                                    @endforeach
                                    <td>
                                        <input type="checkbox" @if ($page->useful_links) checked @endif
                                            class="js-switch"
                                            onchange="toggleUsefulLink({{ $page->id }}, {{ $page->useful_links ? 0 : 1 }})">
                                    </td>
                                    <td>
                                        <input type="checkbox" @if ($page->top_menu) checked @endif
                                            class="js-switch"
                                            onchange="toggleTopMenu({{ $page->id }}, {{ $page->top_menu ? 0 : 1 }})">
                                    </td>
                                    <td>
                                        <input type="text" class="ordering-input form-control"
                                            value="{{ $page->ordering }}"
                                            onchange="changeOrdering(this.value, {{ $page->id }})">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning">
                                                {{ __('menu.edit') }}
                                            </a>
                                            <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST"
                                                onsubmit="return confirm('{{ __('menu.delete_page_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('menu.delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toggleUsefulLink(id, value) {
            $.post("{{ route('admin.pages.useful-links') }}", {
                    id: id,
                    value: value,
                    _token: "{{ csrf_token() }}"
                })
                .done(function(response) {
                    if (response.success) {
                        alert(response.message || '{{ __('menu.useful_links_updated') }}');
                    } else {
                        alert('{{ __('menu.update_failed') }}');
                    }
                })
                .fail(function() {
                    alert('{{ __('menu.update_error') }}');
                });
        }

        function toggleTopMenu(id, value) {
            $.ajax({
                url: "{{ route('admin.pages.top-menu') }}",
                method: "POST",
                data: {
                    id: id,
                    value: value,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message || '{{ __('menu.top_menu_updated') }}');
                },
                error: function() {
                    alert('{{ __('menu.update_error') }}');
                }
            });
        }

        function changeOrdering(ordering, id) {
            $.ajax({
                url: "{{ route('admin.pages.change-ordering') }}",
                method: "POST",
                data: {
                    ordering: ordering,
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message || '{{ __('menu.ordering_updated') }}');
                },
                error: function() {
                    alert('{{ __('menu.update_error') }}');
                }
            });
        }
    </script>
@endsection
