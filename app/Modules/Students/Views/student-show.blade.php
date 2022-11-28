<x-app-layout>
    <x-slot name="header">
      <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <title>Students Data</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Student Enrolment Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="container mt-4">
                   @if(session('status'))
                     <div class="alert alert-success">
                         {{ session('status') }}
                     </div>
                   @endif
                   @if(Session::has('alert-message'))
                    <?php $alert = Session::get('alert-message'); ?>
                    <div class="alert {{ $alert['class'] }}">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>{{ $alert['type'] }}: </strong> {{ $alert['text'] }}
                    </div>
                    @if(!empty($has_put_error) )
                    @if($has_put_error==1)
                    <?php Session::forget('alert-message'); ?>
                    @endif
                    @endif
                    @endif
                   <div class="card">
                     <div class="card-header text-center font-weight-bold">
                        Student Details
                     </div>
                     <div class="card-body">
                       <form method="GET" action="{{ route('students.list') }}" enctype="multipart/form-data">

                            <div class="form-group">
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" readonly id="first_name" name="first_name" value="{{$student->first_name}}">
                              @if ($errors->has('first_name'))
                              <small class="has-error help-block">{{ $errors->first('first_name') }}</small>
                              @endif
                            </div>

                            <div class="form-group">
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" readonly id="last_name" name="last_name" value="{{$student->last_name}}">
                              @if ($errors->has('email'))
                              <small class="has-error help-block">{{ $errors->first('email') }}</small>
                              @endif
                            </div>

                             <div class="form-group">
                               <label for="last_name">DOB</label>
                              <input type="date"class="form-control"id="dob" readonly name="dob" value="{{$student->dob}}">
                              @if ($errors->has('dob'))
                              <small class="has-error help-block">{{ $errors->first('dob') }}</small>
                              @endif
                              </div>


                            <div class="col-md-4 col-sm-6 col-xs-12 form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                              <label for="gender" class="srequired">Gender</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                              <?php $gender_list = config('smconstants.gender');
                              $old_gender = $student->gender; //dd($gender_list,$old_gender);?>
                              @foreach($gender_list as $k => $v)
                              <?php $checked = ""; if(old('gender',$old_gender)==$k) { $checked = "checked";} ?>
                              <input type="radio" {{$checked}} readonly name="gender" value="{{$k}}"> {{$v}} &nbsp;
                              @endforeach
                              </div>
                              @if ($errors->has('gender'))
                              <small class="has-error help-block">{{ $errors->first('gender') }}</small>
                              @endif
                            </div>
                            <?php
                                $reporting_teachers = config('smconstants.reporting_teachers');
                                $reporting_teacher = $student->reporting_teacher;
                            ?>
                            <div class="form-group">
                              <label for="reporting_teacher">Reporting Teacher</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                                <select readonly name="reporting_teacher" class="form-control"id ="designation_id">
                                  <option value>SELECT</option>
                                  @foreach ($reporting_teachers as $key => $value)
                                  <?php $selected = ""; if(old('reporting_teacher',$reporting_teacher)==$k) { $selected = 'selected="selected"';} ?>
                                    <option {{$selected}} value="{{$key}}" >{{$value}}</option>
                                  @endforeach
                                    </select>
                              </div>
                            </div>

                         <button type="submit" class="btn btn-primary">List</button>
                       </form>
                     </div>
                   </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
