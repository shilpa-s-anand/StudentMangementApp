<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
      <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <title>Students Data</title>
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__(' Student Enrolment Details')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

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
                        Student Details
                     </div>
                     <div class="card-body">
                       <form method="GET" action="<?php echo e(route('students.list')); ?>" enctype="multipart/form-data">

                            <div class="form-group">
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" readonly id="first_name" name="first_name" value="<?php echo e($student->first_name); ?>">
                              <?php if($errors->has('first_name')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('first_name')); ?></small>
                              <?php endif; ?>
                            </div>

                            <div class="form-group">
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" readonly id="last_name" name="last_name" value="<?php echo e($student->last_name); ?>">
                              <?php if($errors->has('email')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('email')); ?></small>
                              <?php endif; ?>
                            </div>

                             <div class="form-group">
                               <label for="last_name">DOB</label>
                              <input type="date"class="form-control"id="dob" readonly name="dob" value="<?php echo e($student->dob); ?>">
                              <?php if($errors->has('dob')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('dob')); ?></small>
                              <?php endif; ?>
                              </div>


                            <div class="col-md-4 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                              <label for="gender" class="srequired">Gender</label>
                              <div class="form-control" style="border: none; padding-left: 0px;">
                              <?php $gender_list = config('smconstants.gender');
                              $old_gender = $student->gender; //dd($gender_list,$old_gender);?>
                              <?php $__currentLoopData = $gender_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $checked = ""; if(old('gender',$old_gender)==$k) { $checked = "checked";} ?>
                              <input type="radio" <?php echo e($checked); ?> readonly name="gender" value="<?php echo e($k); ?>"> <?php echo e($v); ?> &nbsp;
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <?php if($errors->has('gender')): ?>
                              <small class="has-error help-block"><?php echo e($errors->first('gender')); ?></small>
                              <?php endif; ?>
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
                                  <?php $__currentLoopData = $reporting_teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php $selected = ""; if(old('reporting_teacher',$reporting_teacher)==$k) { $selected = 'selected="selected"';} ?>
                                    <option <?php echo e($selected); ?> value="<?php echo e($key); ?>" ><?php echo e($value); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/shilpa/student-record/app/Modules/Students/Views/student-show.blade.php ENDPATH**/ ?>