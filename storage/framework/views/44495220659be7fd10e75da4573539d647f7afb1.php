<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">See Activities</div>
                <a class="nav-link" href="<?php echo e(route('admin.home')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data Management </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.createuser')); ?>">Add User</a>
                        <a class="nav-link" href="<?php echo e(route('admin.show')); ?>">View Users</a>
                        <a class="nav-link" href="<?php echo e(route('admin.departments')); ?>">Manage Departments</a>
                        <a class="nav-link" href="<?php echo e(route('admin.groups')); ?>">Manage Groups</a>
                    </nav>
                </div>
                
                
                
                
                
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsV" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Vendors
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsV" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.vendors')); ?>">Manage Vendors</a>
                    </nav>
                </div>
                



                <div class="sb-sidenav-menu-heading"> RAW MATERIAL </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts10" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    MANAGE RAW MATERIAL
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.rawmaterialinward')); ?>">RAW MATERIAL INWARD</a>
                    </nav>
                </div>
                
                <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.rawmaterialstock')); ?>">RAW MATERIAL STOCK</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.transferreport')); ?>">Transfer Report</a>
                    </nav>
                </div>
                
                
                
                
                
            
            
                <div class="sb-sidenav-menu-heading"> ITEMS </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage ITEMS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage ITEMS</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.itemgroups')); ?>">Manage ITEM GROUPS</a>
                    </nav>
                </div>
                
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.itemgrouprelation')); ?>">ITEM GROUP RELATIONSHIP</a>
                    </nav>
                </div>
                
                
                
                
                
                <div class="sb-sidenav-menu-heading"> CASTING IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage CASTING IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.casting')); ?>">Manage CASTING IN</a>
                        <a class="nav-link" href="<?php echo e(route('admin.castingoutput')); ?>">Manage CASTING OUT</a>
                        <a class="nav-link" href="<?php echo e(route('admin.transferreportcasting')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                 <div class="sb-sidenav-menu-heading"> MACHINING IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage MACHINING IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage MACHINING IN</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                
                 <div class="sb-sidenav-menu-heading">STORE IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage STORE IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage STORE IN</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                
                 <div class="sb-sidenav-menu-heading">PUMP IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage PUMP IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage PUMP IN</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                
                 <div class="sb-sidenav-menu-heading">GRINDER IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage GRINDER IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage GRINDER IN</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                <div class="sb-sidenav-menu-heading">NICKEL IN </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts7" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage NICKEL IN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts7" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage NICKEL IN</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                
                <div class="sb-sidenav-menu-heading">CP STORE </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage CP STORE
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage CP STORE</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                
                <div class="sb-sidenav-menu-heading">REJECTION </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage REJECTION
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts9" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Manage REJECTION</a>
                         <a class="nav-link" href="<?php echo e(route('admin.items')); ?>">Reporting</a>
                    </nav>
                </div>
                
                
                
                




            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo e(Auth::user()->name); ?>

        </div>
    </nav>
</div>
<?php /**PATH /home/jatin/Web/kops/resources/views/admin/includes/sidenav.blade.php ENDPATH**/ ?>