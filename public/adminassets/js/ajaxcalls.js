$('#additemgroup').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        groupname: jQuery('#groupname').val(),
        groupcode: jQuery('#groupcode').val(),
    };
    $.ajax({
        type: "POST",
        url: 'additemgroup',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#groupname').val('');
            jQuery('#groupcode').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});


$(document).ready(function(){
$('#changebodycontentbox').on('click', function(e) {
    e.preventDefault();
    $("#origionalboxes").hide();
    $("#alternativeboxes").show();
});
});



$(document).ready(function(){
$('.itemgroupedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var itemgroupId = this.id;
    var formData = {
        itemgroupId: itemgroupId,
    };
    $.ajax({
        type: "POST",
        url: 'itemgroupEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#groupModal').modal('show');
            $("#itemgroupId").val(returnVal.id);
            $("#editgroupcode").val(returnVal.group_code);
            $("#editgroupname").val(returnVal.group_name);
            $('#modalForEdit').show();
        }
    });
});
});



$('#edititemgroup').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        groupname: jQuery('#editgroupname').val(),
        groupcode: jQuery('#editgroupcode').val(),
        itemgroupId: jQuery('#itemgroupId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'edititemgroup',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});






$('#adddepartment').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        department: jQuery('#department').val(),
        code: jQuery('#code').val(),
    };
    $.ajax({
        type: "POST",
        url: 'adddepartment',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#department').val('');
            jQuery('#code').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});




$(document).ready(function(){
$('.departmentedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var departmentId = this.id;
    var formData = {
        departmentId: departmentId,
    };
    $.ajax({
        type: "POST",
        url: 'departmentEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#departmentModal').modal('show');
            $("#departmentId").val(returnVal.id);
            $("#editdepartmentname").val(returnVal.name);
            $("#editcode").val(returnVal.code);
            $('#modalForEdit').show();
        }
    });
});
});




$('#editdepartment').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        department: jQuery('#editdepartmentname').val(),
        code: jQuery('#editcode').val(),
        departmentId: jQuery('#departmentId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editdepartment',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});









$('#addadmingroup').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        group: jQuery('#groupname').val(),
        code: jQuery('#groupcode').val(),
    };
    $.ajax({
        type: "POST",
        url: 'addgroup',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#groupname').val('');
            jQuery('#groupcode').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});




$(document).ready(function(){
$('.admingroupedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var groupId = this.id;
    var formData = {
        groupId: groupId,
    };
    $.ajax({
        type: "POST",
        url: 'groupEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#groupModal').modal('show');
            $("#groupId").val(returnVal.id);
            $("#editgroupname").val(returnVal.name);
            $("#editgroupcode").val(returnVal.code);
            $('#modalForEdit').show();
        }
    });
});
});




$('#editadmingroup').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        group: jQuery('#editgroupname').val(),
        code: jQuery('#editcode').val(),
        groupId: jQuery('#groupId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editgroup',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});



//casting input actions

$('#addcasting').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        item: jQuery('#item').val(),
        qty: jQuery('#qty').val(),
        remarks: jQuery('#remarks').val(),
    };
    $.ajax({
        type: "POST",
        url: 'addcasting',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#item').val('');
            jQuery('#qty').val('');
            jQuery('#remarks').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});




$(document).ready(function(){
$('.castingedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var castingId = this.id;
    var formData = {
        castingId: castingId,
    };
    $.ajax({
        type: "POST",
        url: 'castingEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#castingModal').modal('show');
            $("#castingId").val(returnVal.id);
            $("#edititem").val(returnVal.item);
            $("#editqty").val(returnVal.qty);
            $("#editremarks").val(returnVal.remarks);
            $('#modalForEdit').show();
        }
    });
});
});




$('#editcasting').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        item: jQuery('#edititem').val(),
        qty: jQuery('#editqty').val(),
        remarks: jQuery('#editremarks').val(),
        castingId: jQuery('#castingId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editcasting',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});

//casting input action ends


//casting output action starts



//casting actions
$('#addcastingoutput').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        item: jQuery('#item').val(),
        qty: jQuery('#qty').val(),
        units: jQuery('#units').val(),
    };
    $.ajax({
        type: "POST",
        url: 'addcastingoutput',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#item').val('');
            jQuery('#qty').val('');
            jQuery('#units').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});




$(document).ready(function(){
$('.castingoutputedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var castingoutputId = this.id;
    var formData = {
        castingoutputId: castingoutputId,
    };
    $.ajax({
        type: "POST",
        url: 'castingoutputEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#castingoutputModal').modal('show');
            $("#castingoutputId").val(returnVal.id);
            $("#edititem").val(returnVal.item);
            $("#editqty").val(returnVal.qty);
            $("#editunits").val(returnVal.units);
            $('#modalForEdit').show();
        }
    });
});
});




$('#editcastingoutput').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        item: jQuery('#edititem').val(),
        qty: jQuery('#editqty').val(),
        units: jQuery('#editunits').val(),
        castingoutputId: jQuery('#castingoutputId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editcastingoutput',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});

//casting action ends

//casting output action ends

$(document).ready(function(){
$('.useredit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var userId = this.id;
    var formData = {
        userId: userId,
    };
    $.ajax({
        type: "POST",
        url: 'userEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#userModal').modal('show');
            $("#userId").val(returnVal['user_data'].id);
            $("#name").val(returnVal['user_data'].name);
            $("#employee_code").val(returnVal['user_data'].employee_code);
            $("#user_id").val(returnVal['user_data'].user_id);
            $("#email").val(returnVal['user_data'].email);
            $("#mobile").val(returnVal['user_data'].mobile);
            $("#department").val(returnVal['user_data'].department);
            $("#departmentsFor").html(returnVal.departments);
            $('#modalForEdit').show();
        }
    });
});
});








$('#edituser').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        userId: jQuery('#userId').val(),
        name: jQuery('#name').val(),
        employee_code: jQuery('#employee_code').val(),
        user_id: jQuery('#user_id').val(),
        email: jQuery('#email').val(),
        mobile: jQuery('#mobile').val(),
        department: jQuery('#department').val(),
        password: jQuery('#password').val(),
    };
    $.ajax({
        type: "POST",
        url: 'edituser',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});







$('#additem').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        code: jQuery('#code').val(),
        name: jQuery('#name').val(),
        item_group: jQuery('#item_group').val(),
        unit: jQuery('#unit').val(),
        size: jQuery('#size').val(),
        weight: jQuery('#weight').val(),
        weight1: jQuery('#weight1').val(),
        weight2: jQuery('#weight2').val(),
        nickname: jQuery('#nickname').val(),
    };
    $.ajax({
        type: "POST",
        url: 'additem',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            if(returnVal.success === 0)
            {
               $("#response").html(returnVal.msg);    
            }
            else
            {
                $("#response").html(returnVal.msg);
                jQuery('#code').val('');
                jQuery('#name').val('');
                jQuery('#item_group').val('');
                jQuery('#unit').val('');
                jQuery('#size').val('');
                jQuery('#weight').val('');
                jQuery('#weight1').val('');
                jQuery('#weight2').val('');
                jQuery('#nickname').val('');
                window.setTimeout(function(){location.reload()},3000);
            }
        }
    });
});





$(function () {
    $('.edittrigger').on('click', function () {
        var currentTR = this.id;
        var currentTD = $(this).find('td');
        $.each(currentTD, function () {
          $(this).prop('contenteditable', true)
        });
        var lastChild = $(this).find(':last-child > span.editlink');
        $(this).find(':last-child').prop('contenteditable', false);
        lastChild.html("<a class='btn btn-primary savevalues' id='store#"+currentTR+"'>SAVE</a>");
        
        // $.ajax({
        //     url: 'Ajax/StatusUpdate.php',
        //     data: {
        //         text: $("textarea[name=Status]").val(),
        //         Status: Status
        //     },
        //     dataType : 'json'
        // });
    });
});


$(document).ready(function(){
    $('.savevalues').on('click', function () {
        var currentRowId = this.id;
        var RowId = currentRowId.split('#');
        alert(RowId);
        
        
        // var currentTD = $("#"+RowId[3]).find('td');
        // $.each(currentTD, function () {
        //   console.log($(this).html());
        // });
        
        // $.ajax({
        //     url: 'Ajax/StatusUpdate.php',
        //     data: {
        //         text: $("textarea[name=Status]").val(),
        //         Status: Status
        //     },
        //     dataType : 'json'
        // });
    });
});









$(document).ready(function(){
$('.itemedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var itemId = this.id;
    var formData = {
        itemId: itemId,
    };
    $.ajax({
        type: "POST",
        url: 'itemEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#itemModal').modal('show');
            $("#itemId").val(returnVal.id);
            $("#editcode").val(returnVal.code);
            $("#editname").val(returnVal.name);
            $("#edititem_group").val(returnVal.item_group);
            $("#editunit").val(returnVal.unit);
            $("#editsize").val(returnVal.size);
            $("#editweight").val(returnVal.weight);
            $("#editweight1").val(returnVal.weight1);
            $("#editweight2").val(returnVal.weight2);
            $("#editnickname").val(returnVal.nickname);
            $('#modalForEdit').show();
        }
    });
});
});







$('#edititem').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        itemId: jQuery('#itemId').val(),
        code: jQuery('#editcode').val(),
        name: jQuery('#editname').val(),
        item_group: jQuery('#edititem_group').val(),
        unit: jQuery('#editunit').val(),
        size: jQuery('#editsize').val(),
        weight: jQuery('#editweight').val(),
        weight1: jQuery('#editweight1').val(),
        weight2: jQuery('#editweight2').val(),
        nickname: jQuery('#editnickname').val(),
    };
    $.ajax({
        type: "POST",
        url: 'edititem',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});







$(document).ready(function(){
$('.itemselection').on('change', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var groupId = this.id;
    var itemValue = $(this).val();
    var formData = {
        groupId: groupId,
        itemValue : itemValue,
    };
    $.ajax({
        type: "POST",
        url: 'itemRelation',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#success").html(returnVal.msg);
        }
    });
});
});






//inward items add
$('#addrminward').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        code: jQuery('#code').val(),
        product_name: jQuery('#product_name').val(),
        // price: jQuery('#price').val(),
        qty: jQuery('#qty').val(),
        weight_dimension: jQuery('#weight_dimension').val(),
        vendor: jQuery('#vendor').val(),
        product_type: jQuery('#product_type').val(),
        adddate: jQuery('#adddate').val(),
        request_by: jQuery('#request_by').val(),
        voucher_slip: jQuery('#voucher_slip').val(),
    };
    $.ajax({
        type: "POST",
        url: 'addrminward',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            if(returnVal.success === 0)
            {
               $("#response").html(returnVal.msg);    
            }
            else
            {
                $("#response").html(returnVal.msg);
                jQuery('#code').val('');
                jQuery('#product_name').val('');
                jQuery('#price').val('');
                jQuery('#adddate').val('');
                jQuery('#qty').val('');
                jQuery('#weight_dimension').val('');
                jQuery('#vendor').val('');
                jQuery('#request_by').val('');
                jQuery('#voucher_slip').val('');
                jQuery('#product_type').val('');
                window.setTimeout(function(){location.reload()},3000);
            }
        }
    });
});








$(document).ready(function(){
$('.relationshipdetails').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var relationshipId = this.id;
    var formData = {
        relationshipId: relationshipId,
    };
    $.ajax({
        type: "POST",
        url: 'relationshipEdit',
        data: formData,
        success: function( returnVal ) {
            $('#modalForRelationship').show();
            $('#relationshipModal').modal('show');
            $('#relationshipBody').html(returnVal);
            
        }
    });
});
});








$(document).ready(function(){
$('.rminwardedit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var rminwardId = this.id;
    var formData = {
        rminwardId: rminwardId,
    };
    $.ajax({
        type: "POST",
        url: 'rminwardEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#rminwardModal').modal('show');
            $("#rminwardId").val(returnVal.id);
            $("#editqty").val(returnVal.qty);
            $("#editcode").val(returnVal.code);
            $("#editproduct_name").val(returnVal.product_name);
            $("#editprice").val(returnVal.price);
            $("#editweight").val(returnVal.weight);
            $("#editproduct_type").val(returnVal.product_type);
            $("#editweight_dimension").val(returnVal.weight_dimension);
            $("#editvendor").val(returnVal.vendor);
            $('#modalForEdit').show();
        }
    });
});
});




$('#editrminward').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        rminwardId: jQuery('#rminwardId').val(),
        code: jQuery('#editcode').val(),
        qty: jQuery('#editqty').val(),
        product_name: jQuery('#editproduct_name').val(),
        price: jQuery('#editprice').val(),
        weight: jQuery('#editweight').val(),
        weight_dimension: jQuery('#editweight_dimension').val(),
        vendor: jQuery('#editvendor').val(),
        product_type: jQuery('#editproduct_type').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editrminward',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});






//transfers
$(document).ready(function(){
$('.addtransfer').on('click', function(e) {
    e.preventDefault();
    var productId = this.id;
    $('#transferModal').modal('show');
    $('#productId').val(productId);
});
});




//transfers
$(document).ready(function(){
$('.transferall').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var productId = this.id;
    var formData = {
        productId: productId,
    };
    $.ajax({
        type: "POST",
        url: 'viewtransfer',
        data: formData,
        success: function( returnVal ) {
            $('#showtransferModal').modal('show');
            $('#transfersBody').html(returnVal);
        }
    });
    
});
});






$('#addtransfer').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var fd = new FormData( this );
    $.ajax({
        type: "POST",
        url: 'addtransfer',
        mimeType: "multipart/form-data",
        processData: false,
        contentType: false,
        data: fd,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});




//vendors

$('#addvendor').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        name: jQuery('#vendor').val(),
        address: jQuery('#address').val(),
        vendor_code: jQuery('#vendor_code').val(),
        contact: jQuery('#contact').val(),
        contact2: jQuery('#contact2').val(),
        contact3: jQuery('#contact3').val(),
    };
    $.ajax({
        type: "POST",
        url: 'addvendor',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#response").html(returnVal.msg);
            jQuery('#vendor').val('');
            jQuery('#address').val('');
            jQuery('#vendor_code').val('');
            jQuery('#contact').val('');
            jQuery('#contact2').val('');
            jQuery('#contact3').val('');
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});




$(document).ready(function(){
$('.vendoredit').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var vendorId = this.id;
    var formData = {
        vendorId: vendorId,
    };
    $.ajax({
        type: "POST",
        url: 'vendorEdit',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $('#vendorModal').modal('show');
            $("#vendorId").val(returnVal.id);
            $("#editvendor").val(returnVal.name);
            $("#editvendor_code").val(returnVal.vendor_code);
            $("#editaddress").val(returnVal.address);
            $("#editcontact").val(returnVal.contact);
            $("#editcontact2").val(returnVal.contact2);
            $("#editcontact3").val(returnVal.contact3);
            
            $('#modalForEdit').show();
        }
    });
});
});




$('#editvendorr').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        name: jQuery('#editvendor').val(),
        vendor_code: jQuery('#editvendor_code').val(),
        address: jQuery('#editaddress').val(),
        contact: jQuery('#editcontact').val(),
        contact2: jQuery('#editcontact2').val(),
        contact3: jQuery('#editcontact3').val(),
        
        
        vendorId: jQuery('#vendorId').val(),
    };
    $.ajax({
        type: "POST",
        url: 'editvendor',
        data: formData,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responseedit").html(returnVal.msg);
            window.setTimeout(function(){location.reload()},3000);
        }
    });
});


















//casting output transfer

//transfers
$(document).ready(function(){
$('.addtransfercasting').on('click', function(e) {
    e.preventDefault();
    var productId = this.id;
    $('#transferModalcasting').modal('show');
    $('#productId').val(productId);
});
});




//transfers
$(document).ready(function(){
$('.transferallcasting').on('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var productId = this.id;
    var formData = {
        productId: productId,
    };
    $.ajax({
        type: "POST",
        url: 'viewtransfercasting',
        data: formData,
        success: function( returnVal ) {
            $('#showtransferModalcasting').modal('show');
            $('#transfersBodycasting').html(returnVal);
        }
    });
    
});
});






$('#addtransfercasting').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var fd = new FormData( this );
    $.ajax({
        type: "POST",
        url: 'addtransfercasting',
        mimeType: "multipart/form-data",
        processData: false,
        contentType: false,
        data: fd,
        dataType: 'JSON',
        success: function( returnVal ) {
            $("#responsecasting").html(returnVal.msg);
            //window.setTimeout(function(){location.reload()},3000);
        }
    });
});
//casting output stock transfer ends