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
                    

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            MATERIAL RECEIVED  <span style="float:right;"></span>
                        </div>
                        
                        
                        
                            
                            
                            
                            
                            
                            

                        <div class="card-body">
                            <form method="POST" action="#" id="addrminward">
                                                    <?php echo csrf_field(); ?>
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty"><?php echo e(__('Date')); ?></label>
                                                                <input id="adddate" type="date"
                                                                    class="py-4 form-control <?php if ($errors->has('adddate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('adddate'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="adddate"
                                                                    value="<?php echo e(old('adddate')); ?>" autocomplete="adddate" autofocus>
                        
                                                                <?php if ($errors->has('adddate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('adddate'); ?>
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
                                                                <label class="small mb-1" for="Productcode"><?php echo e(__('Item Code')); ?></label>
                                        
                                        <select class="itemsselect form-control name="code" id="code">
                                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->code); ?>" proid="<?php echo e($item->id); ?>"><?php echo e($item->code); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>             
                                                                
                                                                
                        
                                                                <?php if ($errors->has('code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('code'); ?>
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
                                                                <label class="small mb-1" for="productName"><?php echo e(__('Item Name')); ?></label>
                                         <select class="itemsselect form-control name="product_name" id="product_name">
                                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option procode="<?php echo e($item->code); ?>" value="<?php echo e($item->id); ?>" ><?php echo e($item->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
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
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="vendor"><?php echo e(__('Vendor')); ?></label>
                                                                 <select id="vendor"  name="vendor[]" class="form-control <?php if ($errors->has('vendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vendor'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('vendor')); ?>" autocomplete="vendor" autofocus multiple>
                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                        
                                                                <?php if ($errors->has('vendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vendor'); ?>
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
                                                                <label class="small mb-1" for="productType"><?php echo e(__('Item Type')); ?></label>
                                                                <input id="product_type" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('product_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product_type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="product_type"
                                                                    value="<?php echo e(old('product_type')); ?>" autocomplete="product_type" autofocus>
                        
                                                                <?php if ($errors->has('product_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product_type'); ?>
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
                                                                <label class="small mb-1" for="Productqty"><?php echo e(__('Quantity')); ?></label>
                                                                <input id="qty" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('qty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('qty'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="qty"
                                                                    value="<?php echo e(old('qty')); ?>" autocomplete="qty" autofocus>
                        
                                                                <?php if ($errors->has('qty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('qty'); ?>
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        
                        
                                                            </div>
                                                        </div>
                                                        
                                                        <!--<div class="col-md-6">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        <label class="small mb-1" for="productPrice"><?php echo e(__('Item Price')); ?></label>-->
                                                        <!--        <input id="price" type="text"-->
                                                        <!--            class="py-4 form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="price"-->
                                                        <!--            value="<?php echo e(old('price')); ?>" autocomplete="price" autofocus>-->
                        
                                                        <!--        <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>-->
                                                        <!--            <span class="invalid-feedback" role="alert">-->
                                                        <!--                <strong><?php echo e($message); ?></strong>-->
                                                        <!--            </span>-->
                                                        <!--        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>-->
                        
                        
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="Productqty"><?php echo e(__('UNIT')); ?></label>
                                                            <select id="weight_dimension" class="form-control"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty">Request By</label>
                                        
                                        
                                        <select class="form-control" name="request_by" id="request_by">
                                              <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>" ><?php echo e($department->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                            
                                            
                        
                                                                <?php if ($errors->has('requestby')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requestby'); ?>
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
                                                                <label class="small mb-1" for="Productqty"><?php echo e(__('Voucher Number')); ?></label>
                                                                <input id="voucher_slip" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('voucher_slip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('voucher_slip'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="voucher_slip"
                                                                    value="<?php echo e(old('voucher_slip')); ?>" autocomplete="voucher_slip" autofocus>
                        
                                                                <?php if ($errors->has('vouchernumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vouchernumber'); ?>
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        
                        
                                                            </div>
                                                        </div>
                                    </div>
                                  
                                  
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            <?php echo e(__('Add Product')); ?>

                                                        </button></div>
                                            <span id="response"></span>
                                            </form>
                        </div>
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jatin/Web/kops/resources/views/admin/addrawmaterial_inward.blade.php ENDPATH**/ ?>