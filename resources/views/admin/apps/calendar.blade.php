@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <link rel="stylesheet" href="{{ asset('plugins/src/fullcalendar/fullcalendar.min.css') }}">
    @vite(['resources/scss/light/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/light/assets/components/modal.scss'])

    @vite(['resources/scss/dark/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/dark/assets/components/modal.scss'])
@endsection

@section('content')
    <div class="row layout-top-spacing layout-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="calendar-container">
                <div class="calendar"></div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">الاسم العربي</th>
                    <th scope="col">الاسم الإنجليزي</th>
                    <th scope="col">الصورة</th>
                    <th scope="col">التصنيف الأب</th>
                    <th scope="col">الترتيب</th>
                    <th scope="col">إخفاء</th>
                    <th scope="col">الأكثر شيوعاً</th>
                    <th scope="col">منتجاتنا</th>
                    <th class="text-center" scope="col">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <!-- مثال لصف واحد - يمكن تكراره مع بيانات حقيقية -->
                <tr>
                    <td>1</td>
                    <td>أجهزة كهربائية</td>
                    <td>Electrical Appliances</td>
                    <td>
                        <img src="/images/categories/electrical.jpg" alt="أجهزة كهربائية" width="50" height="50">
                    </td>
                    <td>الرئيسية</td>
                    <td>2</td>
                    <td>
                        <span class="badge badge-light-success">ظاهر</span>
                    </td>
                    <td>
                        <span class="badge badge-light-danger">لا</span>
                    </td>
                    <td>
                        <span class="badge badge-light-success">نعم</span>
                    </td>
                    <td class="text-center">
                        <div class="action-btns">
                            <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                data-placement="top" title="عرض">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                data-placement="top" title="تعديل">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-2">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                data-placement="top" title="حذف">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- صف إضافي كمثال -->
                <tr>
                    <td>2</td>
                    <td>ملابس رجالية</td>
                    <td>Men's Clothing</td>
                    <td>
                        <img src="/images/categories/mens-clothing.jpg" alt="ملابس رجالية" width="50" height="50">
                    </td>
                    <td>الرئيسية</td>
                    <td>1</td>
                    <td>
                        <span class="badge badge-light-danger">مخفي</span>
                    </td>
                    <td>
                        <span class="badge badge-light-success">نعم</span>
                    </td>
                    <td>
                        <span class="badge badge-light-success">نعم</span>
                    </td>
                    <td class="text-center">
                        <div class="action-btns">
                            <!-- نفس أزرار الإجراءات -->
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- زر إضافة تصنيف جديد -->
    <div class="mt-4">
        <a class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            إضافة تصنيف جديد
        </a>
    </div>
    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
    <script src="{{ asset('plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/uuid/uuid4.min.js') }}"></script>
    <script src="{{ asset('plugins/src/fullcalendar/custom-fullcalendar.js') }}"></script>
@endsection
