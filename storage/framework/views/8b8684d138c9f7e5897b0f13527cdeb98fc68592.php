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
                    <?php echo $__env->make('admin.includes.materialManagement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                        MATERIAL RECEIVED  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW
                                </a></span>
                        </div>
                        
                       <div class="row">
                            <div class="col-md-12">
                            <form action="<?php echo e(route('admin.rawmaterialinward')); ?>" method="get" id="searchForm">
                              <div class="form-row">
                                <div class="col-4">
                                  <input type="text" class="form-control" id="daterange" value="" placeholder="Select Date" >
                                </div>
                                 <input type="hidden" name="start_date" id="start_date"> 
                                 <input type="hidden" name="end_date" id="end_date">
                                <div class="col-2">
                                   <input type="submit" value="Serch" class="bg-success form-control">
                                </div>
                                <div class="col-2">    
                                   <input type="button" id="clearSearch" value="Clear" class="bg-info form-control">
                                </div>
                              </div>
                            </form>                                                             
                            </div>
                        </div> 
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Material</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addrminward">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productcode"><?php echo e(__('Item Code')); ?></label>
                                                                <input value="PRO<?php echo e($lastid); ?>" id="code"  type="text" class="py-4 form-control <?php if ($errors->has('code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('code'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('code')); ?>" name="code" readonly autocomplete="code" autofocus>
                        
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
                                                                <label class="small mb-1" for="productName"><?php echo e(__('Product Name')); ?></label>
                                                                <input id="product_name" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('product_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="product_name"
                                                                    value="<?php echo e(old('product_name')); ?>" autocomplete="product_name" autofocus>
                        
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
                                                                <label class="small mb-1" for="productType"><?php echo e(__('Product Type')); ?></label>
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
                                                                <label class="small mb-1" for="productPrice"><?php echo e(__('Product Price')); ?></label>
                                                                <input id="price" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="price"
                                                                    value="<?php echo e(old('price')); ?>" autocomplete="price" autofocus>
                        
                                                                <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
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
                                                                <label class="small mb-1" for="itemWeight"><?php echo e(__('Item Weight')); ?></label>
                                                                <input id="weight" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('weight')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('weight'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="weight"
                                                                    value="<?php echo e(old('weight')); ?>" autocomplete="weight" autofocus>
                        
                                                                <?php if ($errors->has('weight')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('weight'); ?>
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        
                        
                                                            </div>
                                                            <select id="weight_dimension"><option value="pcs">PCS</option><option value="kg">KG</option></select>
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
                                                        </div>
                                  
                                  
                                  
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            <?php echo e(__('Add Product')); ?>

                                                        </button></div>
                                            <span id="response"></span>
                                            </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
                            
                            
                            
                            <div style="display:none;" id="modalForEdit">
                                <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="rminwardModal" tabindex="-1" role="dialog" aria-labelledby="rminwardModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="rminwardModal">Edit Product</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editrminward">
                                                 <input type="hidden" name="rminwardId" id="rminwardId">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productcode"><?php echo e(__('Product Code')); ?></label>
                                                                <input id="editcode" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editcode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editcode'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editcode"
                                                                    value="<?php echo e(old('code')); ?>" autocomplete="editcode" autofocus readonly>
                        
                                                                <?php if ($errors->has('editcode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editcode'); ?>
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
                                                                <label class="small mb-1" for="productName"><?php echo e(__('Product Name')); ?></label>
                                                                <input id="editproduct_name" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editproduct_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editproduct_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editproduct_name"
                                                                    value="<?php echo e(old('editproduct_name')); ?>" autocomplete="name" autofocus>
                        
                                                                <?php if ($errors->has('editproduct_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editproduct_name'); ?>
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
                                                                 <select id="editvendor"  name="editvendor[]" class="form-control <?php if ($errors->has('editvendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editvendor'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('editvendor')); ?>" autocomplete="editvendor" autofocus multiple>
                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                        
                                                                <?php if ($errors->has('editvendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editvendor'); ?>
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
                                                                <label class="small mb-1" for="productType"><?php echo e(__('Product Type')); ?></label>
                                                                <input id="editproduct_type" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editproduct_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editproduct_type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editproduct_type"
                                                                    value="<?php echo e(old('editproduct_type')); ?>" autocomplete="editproduct_type" autofocus>
                        
                                                                <?php if ($errors->has('editproduct_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editproduct_type'); ?>
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
                                                                <label class="small mb-1" for="productPrice"><?php echo e(__('Product Price')); ?></label>
                                                                <input id="editprice" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editprice')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editprice'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editprice"
                                                                    value="<?php echo e(old('editprice')); ?>" autocomplete="editprice" autofocus>
                        
                                                                <?php if ($errors->has('editprice')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editprice'); ?>
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
                                                                <label class="small mb-1" for="itemWeight"><?php echo e(__('Item Weight')); ?></label>
                                                                <input id="editweight" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editweight')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editweight'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editweight"
                                                                    value="<?php echo e(old('editweight')); ?>" autocomplete="editweight" autofocus>
                        
                                                                <?php if ($errors->has('editweight')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editweight'); ?>
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        
                        
                        <select id="editweight_dimension"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty"><?php echo e(__('Quantity')); ?></label>
                                                                <input id="editqty" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('editqty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editqty'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="editqty"
                                                                    value="<?php echo e(old('editqty')); ?>" autocomplete="editqty" autofocus>
                        
                                                                <?php if ($errors->has('editqty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('editqty'); ?>
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
                                                            <?php echo e(__('Update Product')); ?>

                                                        </button></div>
                                            <span id="responseedit"></span>
                                            </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                            
                            
                            

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Vendor</th>
                                            <th>Product Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Vendor</th>
                                            <th>Product Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $rminwards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rminward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="$rminward#<?php echo e($rminward->id); ?>" class="edittrigger">
                                            <td><?php echo e($rminward->code); ?></td>
                                            <td><?php echo e($rminward->product_name); ?></td>
                                            <td><?php echo e($rminward->price); ?></td>
                                            <td><?php echo e($rminward->weight); ?> <?php echo e($rminward->weight_dimension); ?></td>
                                            <td><?php echo e($rminward->qty); ?></td>
                                            
                                            <td>
                                    <?php
                                    if($rminward->vendor!="") {
                                    if($vendorun = unserialize($rminward->vendor)) {
                                    $Vendorssss = DB::table('vendors')->whereIn('id',$vendorun)->get();
                                        foreach($Vendorssss as $Vendor)
                                        {
                                            echo $Vendor->name,", ";
                                        }
                                    }
                                    }
                                                
                                            ?>
                                                
                                                
                                                </td>
                                            
                                            <td><?php echo e($rminward->product_type); ?></td>
                                            </td>
                                            <td><a href="rminward/<?php echo e($rminward->id); ?>" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                        <a style="margin-top:5px;" class="btn btn-primary rminwardedit" id="Rminward#<?php echo e($rminward->id); ?>">Edit</a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </tbody>
                                </table>
                                <?php echo e($rminwards->links()); ?>

                            </div>
                        </div>
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<script type="text/javascript">

$('input[id="daterange"]').daterangepicker(
{
    autoUpdateInput: false,
    locale: {
      format: 'DD-MM-YYYY'
    },
   locale: {
          cancelLabel: 'Clear'
      }
});

 $('input[id="daterange"]').on('apply.daterangepicker', function(ev, picker) {
    $('#start_date').val(picker.startDate.format('Y-M-D'));
    $('#end_date').val(picker.endDate.format('Y-M-D'));  
    $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
  });

  $('input[id="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      $('#start_date').val('');
      $('#end_date').val(''); 
  });

$("#clearSearch").on("click", function(){
   $('#daterange').val('');
     $('#start_date').val('');
     $('#end_date').val('');  
     $("#searchForm").submit();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jatin/Web/kops/resources/views/admin/rawmaterial_inward.blade.php ENDPATH**/ ?>