@extends('frontend/layouts.main')

@section('title')
    Home
@endsection

@section('content')
        @foreach ($homeWidgets as $h)
            <div data-aos="{{ ($h->effect->effect_name ) ?? null}}" data-aos-duration="{{ ($h->duration) ?? null}}">
                @if(View::exists('frontend.home.' . $h->file_name))
                    @include('frontend.home.' . $h->file_name)
                @endif
            </div>
        @endforeach
@endsection
