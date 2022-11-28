<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('header', null, []); ?> 
      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => ''.e(route('students.list')).'','active' => 'request()->routeIs(\'students.list\')']]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('students.list')).'','active' => 'request()->routeIs(\'students.list\')']); ?>
          <?php echo e(__('All')); ?>

       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => ''.e(route('students.create')).'','active' => 'request()->routeIs(\'students.create\')']]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('students.create')).'','active' => 'request()->routeIs(\'students.create\')']); ?>
          <?php echo e(__('Create')); ?>

       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

       <?php $__env->endSlot(); ?>
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
    <?php if(Session::has('alert-message')): ?>
     <?php $alert = Session::get('alert-message'); ?>
     <div class="alert <?php echo e($alert['class']); ?>">
         <a href="#" class="close" data-dismiss="alert">&times;</a>
         <strong><?php echo e($alert['type']); ?>: </strong> <?php echo e($alert['text']); ?>

     </div>
     <?php if(!empty($has_put_error) ): ?>
     <?php if($has_put_error==1): ?>
     <?php Session::forget('alert-message'); ?>
     <?php endif; ?>
     <?php endif; ?>
     <?php endif; ?>
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
                    <?php if(!empty($students)): ?>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('students.show', [$student['id']])); ?>" ><?php echo e($student['id']); ?></a></td>
                        
                        <td><?php echo e($student['name']); ?></td>
                        <td><?php echo e($student['age']); ?></td>
                        <td><?php echo e($student['gender']); ?></td>
                        <td><?php echo e($student['reporting_teacher']); ?></td>
                        <td>
                          <a onClick="submit_form('<?php echo $student['id'];?>', 'edit')"><span style="font-size:16px;cursor:pointer;" class="icon icon-pencil">Edit </span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                          / <a onClick="submit_form('<?php echo $student['id'];?>', 'delete')"><span style="font-size:16px;color:red;cursor:pointer;" id="delete" class="icon icon-trash">Delete</span></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6">No details found</td>
                    </tr>
                    <?php endif; ?>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <form id="form-update" method="post" autocomplete="off" action="<?php echo e(route('students.edit')); ?>" target="_blank">
    <?php echo e(csrf_field()); ?>

    <input type="hidden"  name="update_type" id="update_type">
    <input type="hidden"  name="student_id" id="student_id">
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>

<script>



function submit_form(id, action) {

  document.getElementById('update_type').value = action;
  document.getElementById('student_id').value = id;

  document.getElementById('form-update').submit();

}


</script>
<?php /**PATH /home/shilpa/student-record/app/Modules/Students/Views/student-list.blade.php ENDPATH**/ ?>