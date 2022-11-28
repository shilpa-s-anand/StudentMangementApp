<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 

      <title>Students create</title>
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => ''.e(route('students.list')).'','active' => 'request()->routeIs(\'students.list\')']]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('students.list')).'','active' => 'request()->routeIs(\'students.list\')']); ?>
          <?php echo e(__('List')); ?>

       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>
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
                   <?php if(session('status')): ?>
                     <div class="alert alert-success">
                         <?php echo e(session('status')); ?>

                     </div>
                   <?php endif; ?>
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
                   <div class="card">
                     <div class="card-header text-center font-weight-bold">
                         Student Enrolment
                     </div>
                     <div class="card-body">
                       <form method="POST" action="<?php echo e(route('students.create')); ?>" enctype="multipart/form-data">

                         <?php echo csrf_field(); ?>

                            <div class="form-group <?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>" >
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" id="first_name" name="first_name">
                              <?php if($errors->has('first_name')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('first_name')); ?></small>
                              <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" id="last_nameme" name="last_name">
                              <?php if($errors->has('last_name')): ?>
                              <small  class="has-error help-block"><?php echo e($errors->first('last_name')); ?></small>
                              <?php endif; ?>
                            </div>

                            <div class="form-group">
                               <label for="last_name">DOB</label>
                               <input type="date"class="form-control"id="dob" name="dob">
                                <?php if($errors->has('dob')): ?>
                                <small class="has-error help-block"><?php echo e($errors->first('dob')); ?></small>
                                <?php endif; ?>
                              </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                              <label for="gender" class="srequired">Gender</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                              <?php $gender_list = config('smconstants.gender');?>
                              <?php $__currentLoopData = $gender_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $checked = ""; if(old('gender')==$k) { $checked = "checked";} ?>
                              <input type="radio" <?php echo e($checked); ?> name="gender" value="<?php echo e($k); ?>"> <?php echo e($v); ?> &nbsp;
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <?php if($errors->has('gender')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('gender')); ?></small>
                              <?php endif; ?>
                            </div>
                            <?php
                                $reporting_teachers = config('smconstants.reporting_teachers');
                            ?>
                            <div class="form-group  <?php echo e($errors->has('reporting_teacher') ? ' has-error' : ''); ?>">
                              <label for="reporting_teacher">Reporting Teacher</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                                <select name="reporting_teacher" class="form-control"id ="reporting_teacher">
                                  <option value>SELECT</option>
                                  <?php $__currentLoopData = $reporting_teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('reporting_teacher')): ?>
                                <small class="has-error help-block"><?php echo e($errors->first('reporting_teacher')); ?></small>
                                <?php endif; ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/shilpa/student-record/app/Modules/Students/Views/student-create.blade.php ENDPATH**/ ?>