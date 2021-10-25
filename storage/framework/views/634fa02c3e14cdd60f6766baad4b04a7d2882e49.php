
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
                    <!--<?php echo $__env->make('admin.includes.castingManagement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
                    

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            <!--CASTING 1 INPUTS REPORT  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                            <!--        ADD NEW CASTING-->
                            <!--    </a></span>-->
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                            <form action="<?php echo e(route('admin.casting')); ?>" method="get" id="searchForm">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Casting</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addcasting">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="item"><?php echo e(__('Item')); ?></label>
                                                                
                                        <select class="itemselection" name="item" id="item" style="width:100%;" class="py-4 form-control <?php if ($errors->has('item')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('item'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" ><?php echo e($item->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            
                                            
                        
                                                                <?php if ($errors->has('item')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('item'); ?>
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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Code"><?php echo e(__('Quantity')); ?></label>
                                                                <input id="qty" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('qty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('qty'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="qty"
                                                                    value="<?php echo e(old('qty')); ?>" required autocomplete="qty" autofocus>
                        
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
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Code"><?php echo e(__('Units')); ?></label>
                                                                <input id="remarks" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('remarks')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('remarks'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="remarks"
                                                                    value="<?php echo e(old('remarks')); ?>" required autocomplete="remarks" autofocus>
                        
                                                                <?php if ($errors->has('remarks')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('remarks'); ?>
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
                                                            <?php echo e(__('Add Casting')); ?>

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
                            
                            
                            
                            
                            
                            
                            <div id="">
                                  <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="castingModal" tabindex="-1" role="dialog" aria-labelledby="castingModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="castingModal">Edit CASTING</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editcasting">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="castingId" id="castingId">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="edititem"><?php echo e(__('ITEM')); ?></label>
                                                                <select class="itemselection" name="edititem" id="edititem" style="width:100%;" class="py-4 form-control <?php if ($errors->has('edititem')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('edititem'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" ><?php echo e($item->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                        
                                                                <?php if ($errors->has('item')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('item'); ?>
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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Qty"><?php echo e(__('Quantity')); ?></label>
                                                                <input id="editqty" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('qty')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('qty'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="qty"
                                                                    value="<?php echo e(old('qty')); ?>" required autocomplete="qty" autofocus>
                        
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
                        
                        
                        
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Remarks"><?php echo e(__('Units')); ?></label>
                                                                <input id="editremarks" type="text"
                                                                    class="py-4 form-control <?php if ($errors->has('remarks')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('remarks'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="remarks"
                                                                    value="<?php echo e(old('remarks')); ?>" required autocomplete="remarks" autofocus>
                        
                                                                <?php if ($errors->has('remarks')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('remarks'); ?>
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
                                                            <?php echo e(__('Edit Casting')); ?>

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
                                <table class="table table-bordered" id="dataTableCasting" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                              <th>Create Date</th>
                                            <!--<th>Actions</th>-->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                            <th>Create Date</th>
                                            <!--<th>Actions</th>-->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $totalQuantity = 0; ?>
                                        <?php $__currentLoopData = $castings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($casting->itemName); ?></td>
                                            <?php $totalQuantity += $casting->qty; ?>
                                            <td><?php echo e($casting->qty); ?></td>
                                            <td><?php echo e($casting->weight_dimension); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($casting->created_on))); ?></td>
                                            <!--<td>&nbsp;</td>-->
                                            <!--<td><a href="castingdestroy/<?php echo e($casting->id); ?>" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>-->
                                    <!--<a style="margin-top:5px;" class="btn btn-primary castingedit" id="castingt#<?php echo e($casting->id); ?>">Edit</a></td>-->
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </tbody>
                                </table>
                                <?php echo e($castings->links()); ?>

                                
                                <span><b>Total Quantity: <?php echo $totalQuantity;?> Kg/Pcs </b></span>
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
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jatin/Web/kops/resources/views/admin/casting.blade.php ENDPATH**/ ?>