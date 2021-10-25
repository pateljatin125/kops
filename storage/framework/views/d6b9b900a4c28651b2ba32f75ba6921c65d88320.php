<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5">

                    <div class="card-body">
                        <div class="box-body">
                            <?php if($message = Session::get('success')): ?>
                                <?php Session::forget('success'); ?>
                                <h5 class="error_success" style="color:red;"><?php echo e($message); ?></h5>
                            <?php endif; ?>
                        </div>


                        <form method="POST" action="<?php echo e(route('admin.register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName"><?php echo e(__('Name')); ?></label>
                                        <input id="name" type="text"
                                            class="py-4 form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name"
                                            value="<?php echo e(old('name')); ?>" autocomplete="name" autofocus>

                                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>


                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmployeeCode"><?php echo e(__('Employee Code')); ?></label>
                                        <input id="employee_code" type="text"
                                            class="py-4 form-control <?php if ($errors->has('employee_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('employee_code'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="employee_code"
                                            value="EMP<?php echo e($lastid); ?>" readonly  autocomplete="employee_code" autofocus>

                                        <?php if ($errors->has('employee_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('employee_code'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>


                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress"><?php echo e(__('E-Mail Address')); ?></label>
                                <input id="email" type="email"
                                    class="py-4 form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email"
                                    value="<?php echo e(old('email')); ?>" autocomplete="email">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                <label class="small mb-1" for="inputUserId"><?php echo e(__('User Id')); ?></label>
                                <input id="user_id" type="text"
                                    class="py-4 form-control <?php if ($errors->has('user_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('user_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="user_id"
                                    value="<?php echo e(old('user_id')); ?>" autocomplete="user_id">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            </div>
                            
                            </div>

                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputPhone"><?php echo e(__('Phone')); ?></label>-->
                            <!--    <input id="phone" type="text"-->
                            <!--        class="py-4 form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="phone"-->
                            <!--        value="<?php echo e(old('phone')); ?>" required autocomplete="phone">-->

                            <!--    <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong><?php echo e($message); ?></strong>-->
                            <!--        </span>-->
                            <!--    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputAddress"><?php echo e(__('Address')); ?></label>-->
                            <!--    <input id="address" type="text"-->
                            <!--        class="py-4 form-control <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="address"-->
                            <!--        value="<?php echo e(old('addresss')); ?>" required autocomplete="address">-->

                            <!--    <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong><?php echo e($message); ?></strong>-->
                            <!--        </span>-->
                            <!--    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputCompanyname"><?php echo e(__('Company Name')); ?></label>-->
                            <!--    <input id="company_name" type="text  "-->
                            <!--        class="py-4 form-control <?php if ($errors->has('company_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="company_name"-->
                            <!--        value="<?php echo e(old('company_name')); ?>" required autocomplete="company_name">-->

                            <!--    <?php if ($errors->has('company_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_name'); ?>-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong><?php echo e($message); ?></strong>-->
                            <!--        </span>-->
                            <!--    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputIndustry"><?php echo e(__('Industry')); ?></label>-->
                            <!--    <input id="industry" type="text"-->
                            <!--        class="py-4 form-control <?php if ($errors->has('industry')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('industry'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="industry"-->
                            <!--        value="<?php echo e(old('industry')); ?>" required autocomplete="industry">-->

                            <!--    <?php if ($errors->has('industry')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('industry'); ?>-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong><?php echo e($message); ?></strong>-->
                            <!--        </span>-->
                            <!--    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->

                            <!--</div>-->


                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputGooglelocation"><?php echo e(__('Google Location')); ?></label>-->
                            <!--    <input id="google_location" type="text"-->
                            <!--        class="py-4 form-control <?php if ($errors->has('google_location')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('google_location'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="google_location"-->
                            <!--        value="<?php echo e(old('google_location')); ?>" required autocomplete="google_location">-->

                            <!--    <?php if ($errors->has('google_location')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('google_location'); ?>-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong><?php echo e($message); ?></strong>-->
                            <!--        </span>-->
                            <!--    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->

                            <!--</div>-->
                            
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label class="small mb-1" for="inputGooglelocation"><?php echo e(__('Select Group')); ?></label>
                                <select id="customer_group"
                                    class="form-control <?php if ($errors->has('customer_group')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('customer_group'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="customer_group">
                                    <option value="">Select Group</option>
                                    <?php $__currentLoopData = $admingroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admingroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($admingroup->id); ?>"><?php echo e($admingroup->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('customer_group')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('customer_group'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="small mb-1" for="inputGooglelocation"><?php echo e(__('Select Department')); ?></label>
                                <select id="department"
                                    class="form-control <?php if ($errors->has('department')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('department'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="department[]"  multiple>
                                    <option value="">Select Department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('customer_group')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('customer_group'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            </div>
                            
                            </div>




                             <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword"><?php echo e(__('Mobile Number')); ?></label>
                                        <input id="mobile" type="text"
                                            class="py-4 form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            name="mobile" autocomplete="new-mobile">

                                        <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword"><?php echo e(__('Password')); ?></label>
                                        <input id="password" type="password"
                                            class="py-4 form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            name="password" autocomplete="new-password">

                                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1"
                                            for="inputConfirmPassword"><?php echo e(__('Confirm Password')); ?></label>
                                        <input id="password-confirm" type="password" class="py-4 form-control"
                                            name="password_confirmation" autocomplete="new-password">


                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jatin/Web/kops/resources/views/admin/createuser.blade.php ENDPATH**/ ?>