$(document).ready(function () {
    let type = $('#input-type').val();
    if (type == 0) {
        $('.process-type-percent-js').show();
        $('.process-type-fixvalue-js').hide();
    
    } 
    if (type == 1) {
        $('.process-type-fixvalue-js').show();
        $('.process-type-percent-js').hide();
    }
    console.log("a",type);
    $('#input-type').on('change', function() {
        let a = $(this).val();
        console.log(a);
        if (a == 0) {
            $('.process-type-percent-js').show();
            $('.process-type-fixvalue-js').hide();
        
        } 
        if (a == 1) {
            $('.process-type-fixvalue-js').show();
            $('.process-type-percent-js').hide();
        }
    })
  
});