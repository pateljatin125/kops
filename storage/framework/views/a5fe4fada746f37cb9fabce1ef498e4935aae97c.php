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
TRANSFER MATERIAL
                        </div>
                        
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="showtransferModal" tabindex="-1" role="dialog" aria-labelledby="showtransferModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="showtransferModal">All Transfers</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" id="transfersBody">
                                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                        
                        
                        
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="transferModal">Do Transfer</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addtransfer" enctype='multipart/form-data'>
                                                <input type="hidden" id="productId" name="productId">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Department"><?php echo e(__('Request By')); ?></label>
                                        <select id="department"  name="department" class="form-control <?php if ($errors->has('department')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('department'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('department')); ?>" autocomplete="department" autofocus>
                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                        
                                        <?php if ($errors->has('department')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('department'); ?>
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
                                                                <label class="small mb-1" for="qty"><?php echo e(__('Quantity')); ?></label>
                                                                <input id="qty" type="text" name="qty"
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
                                        <select id="weight_dimension" class="form-control"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="requestby"><?php echo e(__('Date')); ?></label>
                                                                <input id="adddate" name="adddate" type="date"
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
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="voucher_slip"><?php echo e(__('Voucher Number')); ?></label>
                                                                <input id="voucher_slip" type="text" name="voucher_slip"
                                                                    class="py-4 form-control <?php if ($errors->has('voucher_slip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('voucher_slip'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="voucher_slip"
                                                                    value="<?php echo e(old('voucher_slip')); ?>" autocomplete="voucher_slip" autofocus>
                        
                                                                <?php if ($errors->has('voucher_slip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('voucher_slip'); ?>
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
                                                            <?php echo e(__('Add Transfer')); ?>

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
                            
                             <div class="row">
                            <div class="col-md-12">
                            <form action="<?php echo e(route('admin.rawmaterialstock')); ?>" method="get" id="searchForm">
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Code</th>
                                            <th>product_name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Units</th>
                                            <!--<th>Department</th>-->
                                            <!--<th>Voucher Slip</th>-->
                                             <th>Date</th>
                                             <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Units</th>
                                             <th>Date</th>
                                             <th>Total qty</th>
                                            <!--<th>Department</th>-->
                                            <!--<th>Voucher Slip</th>-->
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $totalQuantity = 0; 
                                                  $totalvalue = 0;
                                        ?>
                                        <?php $__currentLoopData = $rminwards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rminward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="$rminward#<?php echo e($rminward->id); ?>" class="edittrigger">
                                            <?php $totalQuantity += $rminward->qty; ?>
                                            <td><?php echo e($rminward->code); ?></td>
                                            <td><?php echo e($rminward->item_name); ?></td>
                                            <td><?php echo e($rminward->qty); ?></td>
                                            <td><?php echo e($rminward->price); ?></td>
                                            <td><?php echo e($rminward->weight_dimension); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($rminward->created_on))); ?></td>
                                           <td><?php echo $totalvalue += $rminward->price*$rminward->qty;?></td>
                                            <!--<td><?php echo e($rminward->price); ?></td>-->
                                            <!--<td><?php echo e($rminward->price*$rminward->qty); ?></td>-->
                                            
                                            <td>
                                        <a style="margin-top:5px;" class="btn btn-primary addtransfer" id="transfer#<?php echo e($rminward->id); ?>">Transfer</a>  <a style="margin-top:5px;" class="btn btn-primary transferall" id="transfer#<?php echo e($rminward->id); ?>">Transfer Detail</a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </tbody>
                                </table>
                                 <span><b>Total Quantity: <?php echo $totalQuantity;?> Kg/Pcs </b></span>
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
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jatin/Web/kops/resources/views/admin/rawmaterial_stock.blade.php ENDPATH**/ ?>