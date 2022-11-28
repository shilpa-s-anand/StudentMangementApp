<?php

namespace App\Modules\Students\Controllers;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Students\Models\Student;


class StudentController extends Controller
{
  public function create() {

    return view("Students::student-create");

  }

  public function store(Request $request) {

    $request->flash();

    $validator = Validator::make($request->all(), $this->rules(), $this->messages());

    if($validator->fails()) {

        $request->flash();

        $message = array('type' => 'Error', 'class' => 'alert-danger',  'text' => 'Please fix the errors.' );

        $request->flash();

        $request->session()->flash('alert-message', $message);

        return view("Students::student-create")->withErrors($validator);

    } else {

      $student = new Student();

      $student->first_name  = $request->first_name;

      $student->last_name   = $request->last_name;

      $student->status      = 1;

      $dob = '';

      if($request->dob != '') {

        $dob = Carbon::parse($request->dob)->format('Y-m-d');

      }

      $student->dob         = $dob;

      $student->gender      = $request->gender;

      $student->reporting_teacher = $request->reporting_teacher;

      $student->save();

      $message = array('type' => 'Success', 'class' => 'alert-success',  'text' => 'Student '.$student->first_name.' with student id '.$student->id.' successfully created!' );

      $request->session()->flash('alert-message', $message);

      return redirect(route('students.show', $student->id));


    }

  }

  public function show(Request $request, $id) {

    $student = Student::find($id);

    if($student) {

      return view('Students::student-show', compact('student'));

    } else {

      $message = array('type' => 'Error', 'class' => 'alert-danger',  'text' => 'Oops! No such student!' );

      $request->session()->flash('alert-message', $message);

      return redirect(route('students.list'));

    }

  }

  public function rules() {

    $valdation_error_messages =  [

        'first_name'        => 'required|min:2|max:50',
        'last_name'         => 'required|max:50',
        'dob'               => 'required' ,
        'gender'            => 'required',
        'reporting_teacher' => 'required'

    ];

    return $valdation_error_messages;

  }

  public function messages() {

    return [

      'first_name.required'         => 'First Name is required.',
      'first_name.min'              => 'First Name must be at least 2 characters.',
      'first_name.max'              => 'First Name may not be greater than 50 characters.',
      'last_name.required'          => 'Last Name is required.',
      'last_name.max'               => 'Last Name may not be greater than 50 characters.',
      'dob.required'                => 'DOB is required.',
      'gender.required'             => 'Gender is required.',
      'reporting_teacher.required'  => 'Feild is required.',
    ];

  }

  public function index(Request $request) {

      $search_string = trim($request->search_string);

      $request->flash();

      $student_table = (new Student())->getTable();

      $retreive_students =  Student::selectRaw($student_table.'.id, '.$student_table.'.first_name, '.$student_table.'.last_name, '
      .$student_table.'.gender, '.$student_table.'.dob, '.$student_table.'.reporting_teacher');

      if($search_string != "") {

          $retreive_students = $retreive_students->where(function ($query) use ($search_string, $student_table) {

                              $query->orWhere($student_table.'.id', 'like', $search_string . '%')
                              ->orWhere($student_table.'.first_name', 'like', $search_string . '%')
                              ->orWhere($c_table.'.last_name', 'like', $search_string . '%');
                  });

      }

      $retreive_students = $retreive_students->orderBy('id', 'DESC')->get();

      $students = [];

      $gender_list = config('smconstants.gender');

      $reporting_teachers = config('smconstants.reporting_teachers');

      foreach($retreive_students as $key => $student) {

        $selected_gender = $gender_list[$student->gender];

        $selected_dob = Carbon::parse($student->dob)->year;

        $current_year = Carbon::now()->year;

        $age = $current_year - $selected_dob;

        $reporting_teacher = $reporting_teachers[$student->reporting_teacher];

        $students[] = [   "id" => $student->id, "name" => $student->first_name.' '.$student->last_name,
        "gender" => $selected_gender, "age" => $age, "reporting_teacher" => $reporting_teacher];

      }

      return view('Students::student-list', compact('students'));

    }

    public function edit(Request $request) {

        if($request->update_type == 'edit') {

            $action = 'edit';

            $id = $request->student_id;

            $student = Student::find($id);

            return view('Students::student-edit', compact('student'));

        } else if($request->update_type == 'delete') {

            $id = $request->student_id;

            $student = Student::where('id', $id)->delete();

            $message = array('type' => 'Success', 'class' => 'alert-success',  'text' => 'Student sucessfully deleted' );

            $request->session()->flash('alert-message', $message);

            return redirect(route('students.list'));


        }

    }

    public function update(Request $request) {


        $id = $request->student_id;

        $student = Student::find($id);

        if(!empty($student)) {

          $student->first_name = $request->first_name;

          $student->last_name = $request->last_name;

          $student->gender = $request->gender;

          $student->dob = $request->dob;

          $student->reporting_teacher = $request->reporting_teacher;

          $student->save();

          $message = array('type' => 'Success', 'class' => 'alert-success',  'text' => 'Student '.$student->first_name.' with student id '.$student->id.' successfully updated!' );

          $request->session()->flash('alert-message', $message);

          return redirect(route('students.list'));


        }


    }

    public function add_marks() {

      $students = Student::selectRaw('id, concat(ifnull(first_name,""), " ", ifnull(last_name,"")) AS name')->get()->keyBy('id')->toArray();

     return view("Students::student-add-marks", compact('students'));


    }

}
