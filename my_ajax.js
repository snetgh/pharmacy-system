/*  Begin  */

/* For Sales Side */
var rolling_number_request = 0;
var rolling_number = 0;

$("#select_product").change(function(){

var product_id = $(this).val();
$("#valid_id").val(product_id);

$.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        product_id: product_id,
        find_product_cost: ''
    },
    success: function (response) {
        if (response.done == true) {
            $("#txt_quantity_avail").val(response.items_available);
            $("#txt_unit_price").val(response.unit_price);

        } else {
            alert('Error');

            $('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
        }
    }
});

})


$("#txt_quantity").keyup(function(){
    var entered_amount = $(this).val();
    var unit_cost = $("#txt_unit_price").val();

    var calculated_amount = (entered_amount*unit_cost);
    $("#txt_total").val(calculated_amount);
});

$("#txt_discount").keyup(function(){
    var discount_given = $(this).val();

    var entered_amount = $("#txt_quantity").val();
    var unit_cost = $("#txt_unit_price").val();

    var calculated_amount = (entered_amount*unit_cost);

    var discounted_amount = ((discount_given/100)*calculated_amount);
    var real_amount = calculated_amount-discounted_amount;
    $("#txt_total").val(real_amount);
});

$("#txt_customer_name").keyup(function(){
    var now_text = $(this).val();
    $("#customer_name").html(now_text);
    console.log(now_text);
})

$("#txt_amount_paid").keyup(function(){
    var get_total = $("#txt_total").val();
    var current_amount = $(this).val();

    if(get_total == current_amount){
        $("#btn_add_item").removeAttr('disabled');
    }else{
        $("btn_add_item").attr('disabled','disabled');
    }
})





$("#btn_add_item").on('click',function(){
    var item_description = $("#select_product :selected").text();
    var item_quantity = $("#txt_quantity").val();
    var item_price = $("#txt_unit_price").val();
    var total_amount = $("#txt_total").val();
    var selected_id = $("#valid_id").val();
    var discount_given = $("#txt_discount").val();
    var amount_paid = $("#txt_amount_paid").val();
    var inv_id = $("#product_invoice").text();
    var custo_name = $("#customer_name").text(); 

    if(discount_given == ""){
        var discount_given = 0;
    }

    rolling_number++;
    
 $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_description: item_description,
            button_id:rolling_number,
            item_quantity: item_quantity,
            item_price:item_price,
            total_amount:total_amount,
            selected_id:selected_id,
            discount_given:discount_given,
            amount_paid:amount_paid,
            inv_id:inv_id,
            custo_name:custo_name,
            add_transaction:''
        },
        success: function (response) {
            if (response.done == true) {        
                
                var insert_row_live = "<tr><td>"+item_description+"</td><td>"+item_quantity+"</td><td>"+item_price+"</td><td>"+total_amount+"</td></tr>";
                var insert_row = "<tr><td>"+item_description+"</td><td>"+item_quantity+"</td><td>"+item_price+"</td><td>"+total_amount+"</td><td><button class='del_trans_"+rolling_number+" btn btn-danger btn-md' id="+rolling_number+">Delete</button></td></tr>";
            
                $("#live_table_body").append(insert_row_live);
                $("#down_table_body").append(insert_row);
            
                if( typeof total_cost_array != "undefined"
                && total_cost_array != null
                && total_cost_array.length != null
                && total_cost_array.length > 0 &&
                typeof total_id_array != "undefined"
                && total_id_array != null
                && total_id_array.length != null
                && total_id_array.length > 0 &&
                typeof total_discount_array != "undefined"
                && total_discount_array != null
                && total_discount_array.length != null
                && total_discount_array.length > 0 &&
                typeof total_unit_cost_array != "undefined"
                && total_unit_cost_array != null
                && total_unit_cost_array.length != null
                && total_unit_cost_array.length > 0 &&
                typeof total_quantity_buying_array != "undefined"
                && total_quantity_buying_array != null
                && total_quantity_buying_array.length != null
                && total_quantity_buying_array.length > 0 &&
                typeof total_amount_pay_array != "undefined"
                && total_amount_pay_array != null
                && total_amount_pay_array.length != null
                && total_amount_pay_array.length > 0
            ){  
                total_discount_array.push(discount_given);
                total_id_array.push(selected_id);
                total_cost_array.push(total_amount);
                total_unit_cost_array.push(item_price);
                total_quantity_buying_array.push(item_quantity);
                total_amount_pay_array.push(amount_paid);
            
                }else{

                    total_discount_array = [];
                    total_id_array = [];
                    total_cost_array = [];
                    total_unit_cost_array = [];
                    total_quantity_buying_array = [];
                    total_amount_pay_array = [];
            
                    total_discount_array.push(discount_given);
                    total_id_array.push(selected_id);
                    total_cost_array.push(total_amount);
                    total_unit_cost_array.push(item_price);
                    total_quantity_buying_array.push(item_quantity);
                    total_amount_pay_array.push(amount_paid);
                }
            
                var new_total = 0;
                var new_discount = 0;
                var amount_pay = 0;
            
                for(var i = 0; i < total_cost_array.length; ++i) {
                     new_total += parseInt(total_cost_array[i]);
                }
            
                for(var i = 0; i < total_discount_array.length; ++i) {
                    new_discount += parseInt(total_discount_array[i]);
               }
            
               for(var i = 0; i < total_amount_pay_array.length; ++i) {
                amount_pay += parseInt(total_amount_pay_array[i]);
            }
            
               $(".txt_total_holder").html(new_total);
               $(".txt_discount_holder").html(new_discount);
               $(".txt_amount_paid_holder").html(amount_pay);
            
                $("#txt_quantity").val("");
                $("#txt_unit_price").val("");
                $("#txt_total").val("");
                $("#valid_id").val("");
                $("#txt_discount").val("");
                $("#txt_amount_paid").val("");
            
                $(".del_trans_"+rolling_number+"").bind('click',delete_item);
               
                $('#btn_add_item').attr('disabled','disabled');

                console.log('Success');
                console.log(new_discount);

        } else {
               alert("Items Are Less Than Quantity Remain");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });  

   

});


function delete_item(){
    alert('Removed');
    $(this).closest ('tr').remove();
    var item_id = $(this).attr('id');

    var transaction_id = $("#product_invoice").text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
           transaction_id:transaction_id,
           item_id:item_id,
           del_transaction_item:''
        },
        success: function (response) {
            if (response.done == true) {
                console.log(response);
                $('#btn_add_item').attr('disabled','disabled');

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    }); 



    var item_to_be_deleted = 3+parseInt(item_id);

    removeLive(item_to_be_deleted);

    var item_index = item_id - 1;

    total_discount_array.splice(item_index);
    total_id_array.splice(item_index);
    total_cost_array.splice(item_index);
    total_unit_cost_array.splice(item_index);
    total_quantity_buying_array.splice(item_index);
    total_amount_pay_array.splice(item_index);

    var new_total = 0;
    var new_discount = 0;
    var amount_pay = 0;

    for(var i = 0; i < total_cost_array.length; ++i) {
         new_total += parseInt(total_cost_array[i]);
    }

    for(var i = 0; i < total_discount_array.length; ++i) {
        new_discount += parseInt(total_discount_array[i]);
   }

   for(var i = 0; i < total_amount_pay_array.length; ++i) {
    amount_pay += parseInt(total_amount_pay_array[i]);
}

   $(".txt_total_holder").html(new_total);
   $(".txt_discount_holder").html(new_discount);
   $(".txt_amount_paid_holder").html(amount_pay);


  
} 

function removeLive(item_id){
    console.log( $('table#live_table tr:nth-child('+parseInt(item_id)+')').remove() );
}

$('#delete_transaction').on('click',function(){

    var transaction_id = $("#product_invoice").text();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
           transaction_id:transaction_id,
           del_transaction:''
        },
        success: function (response) {
            if (response.done == true) {
                window.location.reload();
                console.log(response);

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
    });  


});



/* End Sales Side */

$("#form_make_payment").submit(function(e){
    e.preventDefault();
   var get_supplier = $("#hidden_supplier").val();
   var get_product_selected = $("#selected_product_name_due").val();
   var get_amount_due = $("#txt_amount_due").val();
   var get_amount_payed = $("#txt_amount_paying").val();
   var hidden_payed = $("#hidden_payed").val();

   if(get_amount_due == 0){

    alert("Sorry, Nothing To Pay For");

   }else{

    $.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        
        get_supplier:get_supplier,
        get_product_selected:get_product_selected,
        get_amount_due_to_pay:get_amount_due,
        get_amount_payed:get_amount_payed,
        hidden_payed:hidden_payed,

        make_payment: ''
    },
     success: function (response) {
            if (response.done == true) {
               alert("Saved Successfully");
               window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
});  

} 

});



$("#selected_product_name_due").change(function(){
    var supplier_id = $("#hidden_supplier").val();
    var product_selected = $(this).val();

     $.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        
        supplier_id:supplier_id,
        product_selected:product_selected,

        get_amount_due: ''
    },
     success: function (response) {
            if (response.done == true) {
                $("#hidden_payed").val(response.amount_payed);
                if(response.amount_due == null){$("#txt_amount_due").val("0")}else{$("#txt_amount_due").val(response.amount_due);}
               
        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
});     


})

$("#txt_quantity_buying").keyup(function(){
    $("#txt_total_cost").val("");

    var unit_cost = $("#txt_unit_cost").val();
    var quantity_buying = $(this).val();

    var total_cost = unit_cost * quantity_buying;

    $("#txt_total_cost").val(total_cost);

})

$("#form_order_product").submit(function(e){
    e.preventDefault();
   var get_supplier = $("#hidden_supplier").val();
   var get_unit_cost = $("#txt_unit_cost").val();
   var get_product_selected = $("#selected_product_name").val();
   var get_total_cost = $("#txt_total_cost").val();
   var get_product_description = $("#txt_item_description").val();
   var get_amount_payed = $("#txt_amount_payed").val();
   var get_quantity_buying = $("#txt_quantity_buying").val();

    $.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        
        get_supplier:get_supplier,
        get_unit_cost:get_unit_cost,
        get_product_selected:get_product_selected,
        get_total_cost:get_total_cost,
        get_product_description:get_product_description,
        get_amount_payed:get_amount_payed,
        get_quantity_buying:get_quantity_buying,

        make_order: ''
    },
     success: function (response) {
            if (response.done == true) {
               alert("Saved Successfully");
               window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
});     
});

$("#form_add_supplier").submit(function(e){
    e.preventDefault();
    var selected_products = $("#my_selected").val();
    var corrected_products = JSON.stringify(selected_products);

    var supplier_name = $("#txt_company_name").val();

    var contact_name = $("#txt_contact_name").val();
    var contact_tel = $("#txt_contact_number").val();
    var contact_address = $("#txt_contact_address").val();
    var contact_email = $("#txt_contact_email").val();
    var contact_website = $("#txt_contact_website").val();

    $.ajax({
    type: 'post',
    url: '../ajax.php',
    dataType: 'JSON',
    data: {
        
        selected_products: corrected_products,
        supplier_name:supplier_name,
        contact_name:contact_name,
        contact_tel:contact_tel,
        contact_address:contact_address,
        contact_email:contact_email,
        contact_website:contact_website,

        add_supplier: ''
    },
     success: function (response) {
            if (response.done == true) {
               alert("Saved Successfully");
               window.location.reload();

        } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
            alert("failed");
                console.log(response);
            }
});     
});


$(document).on('click','.edit_suppliers',function(){
    $('#txt_supplier_name').val("");
               
    $("#txt_contact_name").val("");
    $("#txt_contact_number").val("");
    $("#txt_contact_address").val("");
    $("#txt_contact_email").val("");
    $("#txt_contact_website").val("");

    var supplier_name_id = $(this).attr("id");
    $("#hidden_text").val(supplier_name_id);

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            supplier_name_id: supplier_name_id,
            edit_supplier: ''
        },
        success: function (response) {
            if (response.done == true) {

                $('#txt_supplier_name').val(response.orgname);
               
                $("#txt_contact_name").val(response.name);
                $("#txt_contact_number").val(response.tel);
                $("#txt_contact_address").val(response.address);
                $("#txt_contact_email").val(response.email);
                $("#txt_contact_website").val(response.website);

                $("#edit_suppliers_modal").modal("show");

                var products_array = response.send_products;
                for (var i = products_array.length - 1; i >= 0; i--) {
                    console.log(products_array[i]);
                    $("#my_selected option[value="+products_array[i]+"]").attr("selected",true).select2().val(products_array[i]).trigger("change.select2");
                }
            } else {
                alert('Error');
                console.log(response);
            }
        }
    });
});

$(document).on('click','#btn_dismiss',function(){
    window.location.reload();
})

$('#form_edit_suppliers').submit(function () {

    var selected_products = $("#my_selected").val();
    var corrected_products = JSON.stringify(selected_products);

    var supplier_name = $("#txt_supplier_name").val();

    var contact_name = $("#txt_contact_name").val();
    var contact_tel = $("#txt_contact_number").val();
    var contact_address = $("#txt_contact_address").val();
    var contact_email = $("#txt_contact_email").val();
    var contact_website = $("#txt_contact_website").val();

    var supplier_id = $("#hidden_text").val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            supplier_name: supplier_name,
            contact_name: contact_name,
            contact_tel:contact_tel,
            contact_address:contact_address,
            contact_email:contact_email,
            contact_website:contact_website,
            corrected_products:corrected_products,
            supplier_id:supplier_id,
            update_supplier:''
        },
        success: function (response) {
            if (response.done == true) {
                $("#edit_product_modal").modal("hide");
              alert("Success");
              window.location.reload();                

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});




$(document).on('click','.edit_products',function(){
    $("#edit_product_modal").modal("show");

    var product_id = $(this).attr("id");
    $("#hidden_text").val(product_id);

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_id: product_id,
            edit_product: ''
        },
        success: function (response) {
            if (response.done == true) {
            
                $('#txt_item_name').val(response.product_name);
                $('#selected_category').html(response.product_category);
                $('#selected_category').val(response.product_category_id);                                  
                $('#txt_unit_price').val(response.product_unit_price); 
                $('#txt_item_available').val(response.product_item_avail); 
                $('#txt_expiry').val(response.product_expiry); 
            } else {
                alert('Error');
                console.log(response);
            }
        }
    });
});

$(document).on('change','#select_item_category',function(){
    var selected_item = $(this).val();
    $('#txt_category_hidden').val(selected_item);
});


$('#form_edit_product').submit(function () {
    var item_name = $('#txt_item_name').val();
    var item_category = $('#select_item_category').val();
    var item_unit_price = $('#txt_unit_price').val();
    var item_quantity_avail = $('#txt_item_available').val();
    var item_expiry = $('#txt_expiry').val();

    var product_id = $("#hidden_text").val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_name: item_name,
            item_category: item_category,
            item_unit_price:item_unit_price,
            item_quantity_avail:item_quantity_avail,
            item_expiry:item_expiry,
            product_id:product_id,
            update_product:''
        },
        success: function (response) {
            if (response.done == true) {
                $("#edit_product_modal").modal("hide");
              alert("Success");
              window.location.reload();                

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});


$(document).on('click','.delete_products',function(){
    $("#delete_products_modal").modal("show");

    var product_id = $(this).attr("id");
    $("#hidden_text_del").val(product_id);
});


$('#form_delete_product').submit(function () {
    var product_id = $('#hidden_text_del').val();  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_id:product_id,
            delete_product:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#delete_products_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});


$(document).on('click','.edit_me',function(){
    $("#edit_category_modal").modal("show");

    var category_id = $(this).attr("id");
    $("#hidden_text").val(category_id);

     $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_id: category_id,
            edit_category_name: ''
        },
        success: function (response) {
            if (response.done == true) {
                $('#txt_category').val(response.category_name);                                
            } else {
                alert('Error');
            }
        }
    });
});

$(document).on('click','.delete_me',function(){
    $("#delete_category_modal").modal("show");

    var category_id = $(this).attr("id");
    $("#hidden_text_del").val(category_id);
});


$('#form_delete_category').submit(function () {
    var category_id = $('#hidden_text_del').val();  
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_id:category_id,
            delete_category:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#delete_category_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Cannot Be Delete Because It Is Connected To Another Database Table");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});


$('#form_edit_category').submit(function () {
    var category_name = $('#txt_category').val();
    var category_id = $('#hidden_text').val();
    
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_name: category_name,
            category_id:category_id,
            update_category:''
        },
        success: function (response) {
            if (response.done == true) {
            $("#edit_category_modal").modal("hide");
              alert("Success");
            window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});


$('#form_add_category').submit(function () {
    var category_name = $('#txt_category').val();
    
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            category_name: category_name,
            add_new_category:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
            window.location.reload();
            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});


$('#form_add_product').submit(function () {
    var item_name = $('#txt_item_name').val();
    var item_category = $('#select_item_category').val();
    var item_unit_price = $('#txt_unit_price').val();
    var item_quantity_avail = $('#txt_item_available').val();
    var item_expiry = $('#txt_expiry').val();
   
    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_name: item_name,
            item_category: item_category,
            item_unit_price:item_unit_price,
            item_quantity_avail:item_quantity_avail,
            item_expiry:item_expiry,
            add_new_product:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
              window.location.reload();                

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});


$(document).on('change','#select_request_item',function(){
    var product_id = $(this).val();

     $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            product_id: product_id,
            get_product_detail:''
        },
        success: function (response) {
            if (response.done == true) {
              $('#txt_item_available').val(response.product_remain);           

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
});


$('#form_request_product').submit(function () {
    var item_name = $('#select_request_item').val(); 
    var quantity_avail = $('#txt_item_available').val();
    var quantity_sent = $('#txt_quantity').val(); 
    var receivers_name = $('#txt_receivers_name').val();

    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            item_name:item_name,
            quantity_avail:quantity_avail,
            quantity_sent:quantity_sent,
            receivers_name:receivers_name,
            transfer_items:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
                window.location.reload();
            } else {
               alert(response.data);
               window.location.reload();
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});


$(document).on('change','#selected_person_name',function(){
    var get_person_id = $(this).val();
    var item_id = $("#hidden_item_id").val();

     $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            get_person_id: get_person_id,
            item_id:item_id,
            get_person_detail:''
        },
        success: function (response) {
            if (response.done == true) {
              $('#txt_quantity_given').val(response.get_quantity_given);           

            } else {
               alert("Error");
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });

    return false;
})


$('#form_save_return_product').submit(function () {
    var person_id = $('#selected_person_name').val(); 
    var item_id = $('#hidden_item_id').val();
    var quantity_returned = $('#txt_quantity_return').val();
    var quantity_due = $('#txt_quantity_given').val();



    $.ajax({
        type: 'post',
        url: '../ajax.php',
        dataType: 'JSON',
        data: {
            person_id:person_id,
            item_id:item_id,
            quantity_returned:quantity_returned,
            quantity_due:quantity_due,
            save_return:''
        },
        success: function (response) {
            if (response.done == true) {
              alert("Success");
                window.location.reload();
            } else {
               alert(response.data);
               window.location.reload();
               console.log(response);
            }
        },
         error: function(response){
                console.log(response);
            }
    });
    return false;
});







/*      End           */


