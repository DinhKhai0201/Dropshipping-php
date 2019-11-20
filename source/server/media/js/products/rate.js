function rate(data, RootREL) {
     let tmp ='';
     tmp +=` <div id="comments-wrapper-${data.id}" style="padding-top: 20px;">
                <div class="comment clearfix">
                    <img src="${RootREL}media/upload/users/${(data.users_avata && data.users_avata != '') ? data.users_avata : 'no_image.png'}" alt="" class="profile_pic">
                    <div class="comment-details">
                        <span class="comment-name">${data.users_firstname}</span>
                        <span class="comment-date">${data.created}</span>
                        <div class="row" style="margin-left:0px">
                            `;
    switch (parseInt(data.rating))
    {
        case 0 : {
            tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="0">
                        <i id="1" class="ratingstar far fa-star"></i>
                        <i id="2" class="ratingstar far fa-star"></i>
                        <i id="3" class="ratingstar far fa-star"></i>
                        <i id="4" class="ratingstar far fa-star"></i>
                        <i id="5" class="ratingstar far fa-star"></i>
                    </div>
            `;
            break;
        }
        case 1 : {
             tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="1">
                        <i id="1" class="ratingstar fa-star fas"></i>
                        <i id="2" class="ratingstar far fa-star"></i>
                        <i id="3" class="ratingstar far fa-star"></i>
                        <i id="4" class="ratingstar far fa-star"></i>
                        <i id="5" class="ratingstar far fa-star"></i>
                    </div>
            `;
            break;
        }
        case 2 : {
             tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="2">
                        <i id="1" class="ratingstar fa-star fas"></i>
                        <i id="2" class="ratingstar fa-star fas"></i>
                        <i id="3" class="ratingstar far fa-star"></i>
                        <i id="4" class="ratingstar far fa-star"></i>
                        <i id="5" class="ratingstar far fa-star"></i>
                    </div>
            `;
            break;
        }
        case 3 : {
             tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="3">
                        <i id="1" class="ratingstar fa-star fas"></i>
                        <i id="2" class="ratingstar fa-star fas"></i>
                        <i id="3" class="ratingstar fa-star fas"></i>
                        <i id="4" class="ratingstar far fa-star"></i>
                        <i id="5" class="ratingstar far fa-star"></i>
                    </div>
            `;
            break;
        }
        case 4 : {
            tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="4">
                        <i id="1" class="ratingstar fa-star fas"></i>
                        <i id="2" class="ratingstar fa-star fas"></i>
                        <i id="3" class="ratingstar fa-star fas"></i>
                        <i id="4" class="ratingstar fa-star fas"></i>
                        <i id="5" class="ratingstar far fa-star"></i>
                    </div>
            `;
            break;
        }
        case 5 : {
              tmp +=`<div id="156${data.id}" class="ratingbar" data-rating-value="5">
                        <i id="1" class="ratingstar fa-star fas"></i>
                        <i id="2" class="ratingstar fa-star fas"></i>
                        <i id="3" class="ratingstar fa-star fas"></i>
                        <i id="4" class="ratingstar fa-star fas"></i>
                        <i id="5" class="ratingstar fa-star fas"></i>
                    </div>
            `;
            break;
        }
        default : {
             tmp +=`<p>Something when wrong</p>
            `;
        }
    }
    tmp+= `
                        </div>
                        <p>${data.contents}</p>
                    </div>
                </div>
            </div>`;
     return tmp;
 }
function pagi(data) {
    let tmp = '';
    let nopages = Math.ceil(parseInt(data.norecords) / parseInt(data.nopp));
    tmp += `
        <div class="pager">

        <div class="pages">
            <ol>
                <li class="page previous " id="table_previous" style="cursor:pointer">
                    <span style="display:${(parseInt(data.curp) == 1) ? 'none' : 'block'}" tabindex="" data-dt-idx="${parseInt(data.curp) - 1}"><i class="fas fa-chevron-left"></i></span>
                </li>`;
    let start = 1;
    if (parseInt(data.curp) > 2 && parseInt(nopages) > 3) {
        tmp += `<li class="page" style="cursor:pointer">
                        <span tabindex="0">1</span>
                    </li>
                    <li class="page disabled" style="cursor:pointer">
                        <span href="javascript:void(0);">...</span>
                    </li>`;
    }
    start = (parseInt(data.curp) - 1) < 1 ? 1 : (parseInt(data.curp) - 1);
    let end = (parseInt(data.curp) + 1) > parseInt(nopages) ? parseInt(nopages) : (parseInt(data.curp) + 1);
    for (let index = start; index <= end; index++) {
        tmp += `<li class="page ${(index == parseInt(data.curp)) ? 'current' : ''}" style="cursor:pointer">
                        <span data-dt-idx="${index}" tabindex="0">${index}</span>
                    </li>`;

    }
    end = nopages;
    if (end - parseInt(data.curp) > 1 && parseInt(nopages) > 3) {
        tmp += ` <li class="page disabled">
                        <span href="javascript:void(0);">...</span>
                    </li>
                    <li class="page" style="cursor:pointer">
                        <span tabindex="0" data-dt-idx="${parseInt(nopages)}">${parseInt(nopages)}</span>
                    </li> `;
    }
    tmp += `
                <li class="page next " id="table_next" style="cursor:pointer">
                    <span style="display:${(parseInt(data.curp) == parseInt(nopages)) ? 'none' : 'block'}" aria-controls="example1" data-dt-idx="${parseInt(data.curp) + 1}" tabindex="0"><i class="fas fa-chevron-right"></i>
                    </span>
                </li>

            </ol>
        </div>

    </div>
    `;
    return tmp;
}
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
                        toastr.error("Rating error");
                    }
                    $('#review_field').val('');
                    $('.add-review').hide('slow');
                    toastr.success("Rating ok");
                    
                }
            });
        }
    });
    $('#tab_review_tabbed_contents').on('click', '.page', function () {
        let product_id = $('#product_id').val();
        let no = $(this).children().attr('data-dt-idx');
        $.ajax({
            url: rootUrl + "product/fetch_rating",
            method: "POST",
            data: {
                id_p: product_id,
                page: no
            },
            success: function (data) {
                let res = JSON.parse(data);
                let html = '';
                res.data.forEach(element => {
                    html += rate(element, RootREL);
                });
                html += pagi(res);
                $('.rating-display').html(html);
                // location.href = "#href-comment";
            }
        });

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