$(document).ready(function(){
    $('#btnProducts').click(function(){
    $('.categoriesMenu').toggle("slow");
    });
    
$('#q').each(function() {
        var $this = $(this);
        var src = $this.data('action');

        $this.autocomplete({
            source: src,
            minLength: 2,
            select: function(event, ui) {
                $this.val(ui.item.value);
                $('#id').val(ui.item.id);
            }
        });
    });
    
//$('#addProduct').click(function() {
//    //      $('#footer_action_button1').text("Add");
//        $('.actionBtn1').addClass('btn-primary');
//        $('.actionBtn1').removeClass('btn-danger');
//     //   $('.actionBtn1').addClass('edit1');
//        $('.modal-title').text('Add Product');
//  //      $('.deleteContent').hide();
//        $('.form-horizontall').show();
//        $('#myModal1').modal('show');
//});   

    
// $('#btnSent').click(function() {
// //    $('#order_id').val($('#btnSent').data('id'));
//     
//        $.ajax({
//            type: 'POST',
//            url: '/admincp/orderSent',
//            data: {
//                '_token': $('input[name=_token]').val(),
//                'id': $("#order_id").val()
//            },
//            success: function(data) {
//                $('.btn btn-success btn' + data.id).replaceWith("<input data-id='" + data.id + "' type='submit' class='btn btn-danger btn'" + data.id +"' id='btnNotSent' value='Not Sent'>");
//            
//            }
//        });      
//    });    
//    
//  $('#btnNotSent').click(function() {
// //     $('#order_id').val($('#btnNotSent').data('id'));
//      
//        $.ajax({
//            type: 'post',
//            url: '/admincp/orderNotSent',
//            data: {
//                '_token': $('input[name=_token]').val(),
//                'id': $("#order_id").val()
//            },
//            success: function(data) {
//                 $('.btn btn-danger btn' + data.id).replaceWith("<input data-id='" + data.id + "' type='submit' class='btn btn-success btn'" + data.id +"' id='btnSent' value='Sent'>");
//                  
//            }
//        });      
//    });    
    
});   
    



function calculatePrice() {
    var currPrice = document.getElementById('priceCurrProduct').value;
    var quantity = document.getElementById('quantityCurrentProduct').value;
    var result = currPrice * quantity;
    
    document.getElementById('priceCurrentProduct').innerHTML = "<strong>" + result + "</strong>";
}



