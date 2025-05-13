<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentsCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $payments = Payment::with(['student', 'course', 'user'])
            ->filterByDate($request)
            ->orderByDesc('id')
            ->get()
            ->each(function ($payment) {
                $this->calculatePaymentTotals($payment);
                $this->getCourseCost($payment);
            });

        return view('admin.settings.payments', [
            'payments' => $payments,
            'catName' => 'tables',
            'title' => 'إدارة المديرين',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function create()
    {
        return view('admin.settings.paymentsEdit', [
            'catName' => 'tables',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ['Tables', 'Bootstrap'],
            'scrollspy' => 1,
            'simplePage' => 0,
        ]);
    }


    public function edit($id)
    {
        $payment = Payment::with('student', 'course')
            ->findOrFail($id);

        return view('admin.settings.paymentsCreate', [
            'payment' => $payment,
            'catName' => 'tables',
            'title' => 'تعديل الدفعة',
            'breadcrumbs' => ['الدفعات', 'تعديل'],
            'scrollspy' => 1,
            'simplePage' => 0,
        ]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('admin.settings.payments')->with('error', 'الدفع غير موجود');
        }

        $payment->amount = $request->input('amount');
        $payment->date = $request->input('date');
        $payment->save();

        return redirect()->route('admin.settings.payments')->with('success', 'تم تعديل الدفعة بنجاح');
    }


    public function fetchStudents(Request $request)
    {
        $students = Student::where('name', 'like', '%' . $request->name . '%')->get();
        $output = '<option value="">اختر الطالب</option>';
        foreach ($students as $student) {
            $output .= '<option value="' . $student->id . '">' . $student->name . '</option>';
        }
        return response()->json($output);
    }

    public function fetchCourses(Request $request)
    {
        $courses = Course::where('name', 'like', '%' . $request->name . '%')->get();
        $output = '<option value="">اختر الدورة</option>';
        foreach ($courses as $course) {
            $output .= '<option value="' . $course->id . '">' . $course->name . '</option>';
        }
        return response()->json($output);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $payment = new Payment();
        $payment->student_id = $request->student_id;
        $payment->course_id = $request->course_id;
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        // $user_id = $this->session->userdata('admin_user_id');

        $payment->save();

        return redirect()->route('payments.index')->with('success', 'تم إضافة الدفعة بنجاح');
    }


    protected function calculatePaymentTotals($payment)
    {
        $payment->total = Payment::where('student_id', $payment->student_id)
            ->where('id', '<=', $payment->id)
            ->sum('amount');
    }

    protected function getCourseCost($payment)
    {
        $payment->course_cost = StudentsCourse::where('student_id', $payment->student_id)
            ->where('course_id', $payment->course_id)
            ->value('amount');
    }
}
