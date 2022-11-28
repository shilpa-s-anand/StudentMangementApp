<x-app-layout>

    <x-slot name="header">
      <x-nav-link href="{{ route('students.list') }}" active="request()->routeIs('students.list')">
          {{ __('All') }}
      </x-nav-link>
      <x-nav-link href="{{ route('students.create') }}" active="request()->routeIs('students.create')">
          {{ __('Create') }}
      </x-nav-link>

      </x-slot>
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #dddddd;
    }
    </style>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <table>
                    <tr>
                      <th>Student Id</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Reporting Teacher</th>
                      <th>Action</th>
                    </tr>
                    <?php $sl_no = 1; ?>
                    @if(!empty($students))
                    @foreach($students as $key => $student)
                    <tr>
                        <td><a href="{{ route('students.show', [$student['id']]) }}" >{{ $student['id'] }}</a></td>
                        
                        <td>{{$student['name']}}</td>
                        <td>{{$student['age']}}</td>
                        <td>{{$student['gender']}}</td>
                        <td>{{$student['reporting_teacher']}}</td>
                        <td>
                          <a onClick="submit_form('<?php echo $student['id'];?>', 'edit')"><span style="font-size:16px;cursor:pointer;" class="icon icon-pencil">Edit </span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                          / <a onClick="submit_form('<?php echo $student['id'];?>', 'delete')"><span style="font-size:16px;color:red;cursor:pointer;" id="delete" class="icon icon-trash">Delete</span></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">No details found</td>
                    </tr>
                    @endif
                  </table>
                </div>
            </div>
        </div>
    </div>
    <form id="form-update" method="post" autocomplete="off" action="{{ route('students.edit') }}" target="_blank">
    {{ csrf_field() }}
    <input type="hidden"  name="update_type" id="update_type">
    <input type="hidden"  name="student_id" id="student_id">
    </form>
</x-app-layout>

<script>



function submit_form(id, action) {

  document.getElementById('update_type').value = action;
  document.getElementById('student_id').value = id;

  document.getElementById('form-update').submit();

}


</script>
