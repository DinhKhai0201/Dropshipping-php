 
jQuery(function ($) { 
    var rating = 0;
    var id;
    var error =false;
    var modal = document.querySelector(".modaly");
    var closeButton = document.querySelector(".close-button");
    function setratingstars(id, rating){
        $('#' + id + ' .ratingstar').removeClass('fas'); 
        $('#' + id + ' .ratingstar').addClass('far');
        for (i = 0; i <= rating; i++) {
            $('#' + id + ' #' + i).removeClass('far');
            $('#' + id + ' #' + i).addClass('fas');
        }
    }
    // Event-Listener for click stars
    $('#ratingForm .ratingstar').click(function() { 
        rating = $(this).attr('id') 
        id = $(this).parent().attr('id');
        $('#ratingForm #error-rating').hide();
        setratingstars(id, rating);
    });
     $('.ratingbar').each(function(){
            setratingstars($(this).attr('id'),$(this).data('rating-value'));
    });
    $('.rating-bt').click(function() {
        if (parseInt(rating) == 0) {
            $('#ratingForm #error-rating').show();
        } else {
            let review = $('#review_field').val();
            console.log(id);
            console.log(rating);
            console.log(review);
           
            $.ajax({
                url: rootUrl + "product/rate",
                method: "POST",
                data: {
                    product_id: id,
                    rating: rating,
                    contents: review
                },
                success: function (data) {
                    let res = JSON.parse(data);
                    if (res == false) {
                        alert("Rating error");
                    }
                    $('#review_field').val('');
                    $('.add-review').hide('slow');
                    modal.classList.toggle("show-modaly");
                    
                }
            });
        }
    });
    // modal
    $('.open-bt').click(function(){
        $('.add-review').toggle('slow');
    });
	function toggleModal() {
		modal.classList.toggle("show-modaly");
	}
	function windowOnClick(event) {
		if (event.target === modal) {
			toggleModal();
		}
	}
	closeButton.addEventListener("click", toggleModal);
	window.addEventListener("click", windowOnClick);
})