
<x-app-layout>
    <x-slot name="header">

      <title>Marks Enrollment</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      <x-nav-link href="{{ route('students.list') }}" active="request()->routeIs('students.list')">
          {{ __('All') }}
      </x-nav-link>
      <x-nav-link href="{{ route('students.list') }}" active="request()->routeIs('students.list')">
          {{ __('List') }}
      </x-nav-link>
    </x-slot>
<style>
.help-block{

  color:red;
}
</style>
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
                         Student Marks Enrolment
                     </div>
                     <div class="card-body">
                       <form method="POST" action="{{ route('students.create') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group  {{ $errors->has('student') ? ' has-error' : '' }}">
                           <label for="student">Students</label>
                           <div class="form-control" style="border: none; padding-left: 0px;">
                             <select name="student" class="form-control"id ="student">
                               <option value>SELECT</option>
                               @foreach ($students as $key => $value)
                               <option value="{{$key}}">{{$value['name']}}</option>
                               @endforeach
                             </select>
                             @if ($errors->has('student'))
                             <small class="has-error help-block">{{ $errors->first('student') }}</small>
                             @endif
                           </div>
                         </div>
                         <?php $terms = config('smconstants.terms');?>
                         <div class="form-group  {{ $errors->has('term') ? ' has-error' : '' }}">
                           <label for="term">Term</label>
                           <div class="form-control" style="border: none; padding-left: 0px;">
                             <select name="term" class="form-control"id ="term">
                               <option value>SELECT</option>
                               @foreach ($terms as $key => $value)
                               <option value="{{$key}}">{{$value}}</option>
                               @endforeach
                             </select>
                             @if ($errors->has('term'))
                             <small class="has-error help-block">{{ $errors->first('term') }}</small>
                             @endif
                           </div>
                         </div>




                            <div class=" form-group" >
                              <div class="col-md-4  {{ $errors->has('first_name') ? ' has-error' : '' }}" >
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" id="first_name" name="first_name">
                              @if ($errors->has('first_name'))
                              <small class="has-error help-block">{{ $errors->first('first_name') }}</small>
                              @endif
                            </div>
                              <div class="col-md-4  {{ $errors->has('first_name') ? ' has-error' : '' }}" >

                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                                @if ($errors->has('first_name'))
                                <small class="has-error help-block">{{ $errors->first('first_name') }}</small>
                                @endif

                              </div>
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('first_name') ? ' has-error' : '' }}" >

                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" id="first_name" name="first_name">
                              @if ($errors->has('first_name'))
                              <small class="has-error help-block">{{ $errors->first('first_name') }}</small>
                              @endif

                            </div>

                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" id="last_nameme" name="last_name">
                              @if ($errors->has('last_name'))
                              <small  class="has-error help-block">{{ $errors->first('last_name') }}</small>
                              @endif
                            </div>

                            <div class="form-group">
                               <label for="last_name">DOB</label>
                               <input type="date"class="form-control"id="dob" name="dob">
                                @if ($errors->has('dob'))
                                <small class="has-error help-block">{{ $errors->first('dob') }}</small>
                                @endif
                              </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                              <label for="gender" class="srequired">Gender</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                              <?php $gender_list = config('smconstants.gender');?>
                              @foreach($gender_list as $k => $v)
                              <?php $checked = ""; if(old('gender')==$k) { $checked = "checked";} ?>
                              <input type="radio" {{$checked}} name="gender" value="{{$k}}"> {{$v}} &nbsp;
                              @endforeach
                              </div>
                              @if ($errors->has('gender'))
                              <small class="has-error help-block">{{ $errors->first('gender') }}</small>
                              @endif
                            </div>
                            <?php
                                $reporting_teachers = config('smconstants.reporting_teachers');
                            ?>
                            <div class="form-group  {{ $errors->has('reporting_teacher') ? ' has-error' : '' }}">
                              <label for="reporting_teacher">Reporting Teacher</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                                <select name="reporting_teacher" class="form-control"id ="reporting_teacher">
                                  <option value>SELECT</option>
                                  @foreach ($reporting_teachers as $key => $value)
                                  <option value="{{$key}}">{{$value}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('reporting_teacher'))
                                <small class="has-error help-block">{{ $errors->first('reporting_teacher') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                       </form>
                     </div>
                   </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
