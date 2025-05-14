@extends('layouts.app')

@section('content')
    <div class="rtl-content" style="direction: rtl; text-align: right;">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <br>
                    <h4>إضافة سلايدر جديد</h4>
                </div>
                <div class="widget-content widget-content-area">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <label for="image">الصورة</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
