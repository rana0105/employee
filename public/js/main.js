$( document ).ready(function() {
    // flash message auto remove
    	window.setTimeout(function() {
    		 $(".alert").fadeTo(500, 0).slideUp(500, function(){
    		 $(this).remove(); 
    				 });
    	}, 4000);
    // end flash message
    $(function () {
        $('[data-toggle="popover"]').popover()
      })

    //start dependent dropdown for subcategory

    	$('select[name="itpc_id"]').on('change', function()  {
    		// when select parent category on change -> name=itpc_id
            var categoryID = $(this).val();
            if(categoryID) {
                $.ajax({
                    url: '/getcategoryDrop/'+categoryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[name="itsub_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="itsub_id"]').append('<option value="'+ key +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="itsub_id"]').empty();
            }
        });

    //end dependent dropdown for subcategory

    //start dependent dropdown for shelf and level with purchase

        $('select[name="swp_shelf"]').on('change', function()  {
            // when select parent category on change -> name=wp_shelf
            var shellevelID = $(this).val();
            if(shellevelID) {
                $.ajax({
                    url: '/getshelflevelDrop/'+shellevelID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[name="swp_level"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="swp_level"]').append('<option value="'+ key +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="swp_level"]').empty();
            }
        });

    //end dependent dropdown for shelf and level with purchase

    //start dependent dropdown for Item and Quantity and unit Price with Stock

        $('select[name="item_id"]').on('change', function()  {
            // when select parent category on change -> name=wp_shelf
            var itemID = $(this).val();
            if(itemID) {
                $.ajax({
                    url: '/getitemquantityDrop/'+itemID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="s_quantity"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="s_quantity"]').append('<option value="'+ value +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="s_quantity"]').empty();
            }
        });

        $('select[name="item_id"]').on('change', function()  {
            // when select parent category on change -> name=wp_shelf
            var qupID = $(this).val();
            if(qupID) {
                $.ajax({
                    url: '/getquantitypriceDrop/'+qupID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[name="u_price"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="u_price"]').append('<option value="'+ value +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="u_price"]').empty();
            }
        });

    //end dependent dropdown for Item and Quantity and unit Price with Stock

    // start Add row for purchase item
        calculation();

        $('#discount_input').on('keyup', function(){
            ntotal();
        });

        $('#payment_input').on('keyup', function(){
            due();
        });

        $('.addRow').on('click', function(){
            var pro = $('#pro').val();
            addRow(pro);
            
        });

        $(".livesearch").chosen();

        $('.remove').live('click', function(){
            var len = $('tbody tr').length;     
                $(this).parent().parent().remove();
                total();
                ntotal();
                due();      
        });

    // end Add row for purchase item


    // start Add row for sale item
        calculations();

        $('#discount_input').on('keyup', function(){
            ntotals();
        });

        $('#payment_input').on('keyup', function(){
            dues();
        });

        $('.addRows').on('click', function(){
            var pros = $('#pros').val();
            // alert(pros);
            addRows(pros);
            
        });

        $(".livesearch").chosen();

        $('.removes').live('click', function(){
            var len = $('tbody tr').length;     
                $(this).parent().parent().remove();
                totals();
                ntotals();
                dues();      
        });

    // end Add row for sale item

    $('.p-check').change(function () {
        var pid = $('#p-id').val();
        // alert(pid);
        var qtnp = $('.qtn-p').val(); // this is the quantity
        if (!/^[1-9]\d?$/.test(qtnp)){
            alert('Stock Unavailable!');
            return false; // don't continue
        }    
        $.ajax({
            url: '/getcheckItem/'+pid,
            type: 'GET',    
            data: {
                pid: pid,
                qtnp: qtnp
            },
            success: function (data) {
                console.log(data);

            }
        });
    });

});

// start Add row for purchase item

    function addRow(pro)
        {
            var tr='<tr>'+
                        '<td>'+
                        '<select class="livesearch form-control product-name"  name="it_name[]" >'+
                            '<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>';
                            $.each( JSON.parse(pro), function( key, value ) {
                               tr +='<option value="'+ value['id'] +'">'+value['it_name'] +'</option>';
                             });    
                      tr +=  '</select>'+ 
                        '</td>'+
                        '<td><input type="text" name="qtn[]" class="form-control qtn"></td>'+
                        '<td><input type="text" name="u_price[]" class="form-control u_price"></td>'+
                        '<td><input type="text" name="s_total[]" class="form-control s_total"></td>'+
                        '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
                        '</tr>';
                $('tbody').append(tr);
                $(".livesearch").chosen();
                calculation();
                
        };

        function calculation(){

            $('.qtn,.u_price').keyup(function(){
                var tr = $(this).parent().parent();
                var qtn = tr.find('.qtn').val();
                var u_price = tr.find('.u_price').val();
                var  s_total = qtn*u_price;
                
                tr.find('.s_total').val(s_total);

                total();            
                ntotal();
                due();
                addRow();    
            });
        }

        function total(){
            var total = 0;
            $('.s_total').each(function(i,e){
                var s_total = $(this).val()-0;
                total +=s_total;
            })
            $('.total').html(total.toFixed(2));
        }

        function ntotal(){
            var ntotal = 0;
            var tamount = 0;

            $('.s_total').each(function(i,e){
                var s_total = $(this).val()-0;
                tamount += s_total;
            });

            var discount = $('#discount_input').val(); 
            if(discount == 0){
                ntotal = tamount;
            }else{
                ntotal = tamount - discount;
            } 

            $('.ntotal').val(ntotal.toFixed(2));
        }

        function due(){
            var due = 0;
            var payment = 0;
            var ntotal = $('#ntotal').val();
            var payment = $('#payment_input').val();
            if(payment==0){
                due = due;
            }else{
                due = ntotal - payment;
            }

            $('.due').val(due.toFixed(2));
        }


// end Add row for purchase item

// start Add row for sale item

    function addRows(pros)
        {
            var tr='<tr>'+
                        '<td>'+
                        '<select class="livesearch form-control p-check" id="p-id"  name="it_name[]" >'+
                            '<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>';
                            $.each( JSON.parse(pros), function( key, value ) {
                               tr +='<option value="'+ value['item_id'] +'">'+value['it_name'] +'</option>';
                             });    
                      tr +=  '</select>'+ 
                        '</td>'+
                        '<td><input type="text" name="qtn[]" class="form-control qtn"></td>'+
                        '<td><input type="text" name="u_price[]" class="form-control u_price"></td>'+
                        '<td><input type="text" name="s_total[]" class="form-control s_total"></td>'+
                        '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
                        '</tr>';
                $('tbody').append(tr);
                $(".livesearch").chosen();
                calculations();
                
        };

        function calculations(){

            $('.qtn,.u_price').keyup(function(){
                var tr = $(this).parent().parent();
                var qtn = tr.find('.qtn').val();
                var u_price = tr.find('.u_price').val();
                var  s_total = qtn*u_price;
                
                tr.find('.s_total').val(s_total);

                totals();            
                ntotals();
                dues();
                addRows();    
            });
        }

        function totals(){
            var total = 0;
            $('.s_total').each(function(i,e){
                var s_total = $(this).val()-0;
                total +=s_total;
            })
            $('.total').html(total.toFixed(2));
        }

        function ntotals(){
            var ntotal = 0;
            var tamount = 0;

            $('.s_total').each(function(i,e){
                var s_total = $(this).val()-0;
                tamount += s_total;
            });

            var discount = $('#discount_input').val(); 
            if(discount == 0){
                ntotal = tamount;
            }else{
                ntotal = tamount - discount;
            } 

            $('.ntotal').val(ntotal.toFixed(2));
        }

        function dues(){
            var due = 0;
            var payment = 0;
            var ntotal = $('#ntotal').val();
            var payment = $('#payment_input').val();
            if(payment==0){
                due = due;
            }else{
                due = ntotal - payment;
            }

            $('.due').val(due.toFixed(2));
        }


// end Add row for sale item


