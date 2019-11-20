function cmt(data, RootREL, reply) {
    let tmp ='';
    tmp +=`
         <div id="comments-wrapper-${data.id}">
            <div class="comment clearfix">
                <img src=${RootREL}media/upload/users/${(data.users_avata && data.users_avata != '') ? data.users_avata : 'no_image.png'} alt="" class="profile_pic">
                <div class="comment-details">
                    <span class="comment-name">${data.users_firstname}</span>
                    <span class="comment-date">${data.created}</span>
                    <p>${data.contents}</p>
                    <a class="reply-btn" href="javascript:void(0)">reply</a> <br>
                    <div class="clearfix show-reply show-replay-${data.id}" style="display:none">
                        <textarea type="text" placeholder="Post your reply" id="comment_reply" class="comment_reply_${data.id} form-control input-text" cols="30" rows="3"></textarea>
                        <a key_p="${data.product_id}" key_c="${data.id}" href="javascript:void(0)" class="button btn btn-primary btn-sm pull-right reply-bt" id="submit_reply">Submit reply</a>
                       
                    </div>`;
    if (reply) {
        reply.forEach(rep => {
            if (rep.comment_id == data.id) {
                tmp += ` <div class="comment reply-c reply-${data.id} clearfix">
                                <div class="clearfix cm-rl-${rep.id}">
                                    <img src="${RootREL}media/upload/users/${(rep.users_avata && rep.users_avata != '') ? rep.users_avata : 'no_image.png'}" alt="" class="profile_pic">
                                    <div class="comment-details">
                                        <span class="comment-name">${rep.users_firstname}</span>
                                        <span class="comment-date">${rep.created}</span>
                                        <p>${rep.content}</p>
                                    </div>
                                </div>

                            </div>`;
            }
        });
    }
    
    tmp+=`       
                </div>
            </div>
        </div>
    `;
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
   $('.comment-bt').click(function() {
        let id =$(this).attr('key_p');
        var content = $(this).parent().children('#comment_text').val();
        console.log(content);
        $.ajax({
                url: rootUrl + "product/comment",
                method: "POST",
                data: {
                    id: id,
                    content: content
                  
                },
                success: function (data) {
                   let res = JSON.parse(data);
                   res.forEach(element => {
                       html =`<div id="comments-wrapper-${element.id}">
                                 <div class="comment clearfix">
                                    <img src="${RootREL}media/upload/users/${(element.users_avata && element.users_avata != '') ? element.users_avata : 'no_image.png'}" alt="" class="profile_pic">
                                    <div class="comment-details">
                                        <span class="comment-name">${element.users_firstname}</span>
                                        <span class="comment-date">${element.created}</span>
                                        <p>${element.contents}</p>
                                        <a class="reply-btn" href="javascript:void(0)" >reply</a>
                                        <div class ="clearfix show-reply show-replay-${element.id}" style ="display:none">
                                            <textarea type ="text"  placeholder ="Post your reply" id="comment_reply" class="comment_reply_${element.id} form-control input-text" cols="30" rows="3" ></textarea>
                                            <a  key_p ="${element.product_id}"  key_c ="${element.id}" href ="javascript:void(0)" class="button btn btn-primary btn-sm pull-right reply-bt" id="submit_reply">Submit reply</a>
                                        </div>
                                    </div>
                                </div>
                        </div>`;
                    });
                    
                    $('.comment-display').prepend(html);
                    $('#comment_text').val('');
                    $('#comments_count').html( parseInt($('#comments_count').html()) + 1);
                   
                }
            });
    });
     $('body').on('click','.reply-bt',function(){
          let id_c =$(this).attr('key_c');
        let id_p =$(this).attr('key_p');
        var contentr = $(this).parent().children('#comment_reply').val();
        $.ajax({
                url: rootUrl + "product/reply",
                method: "POST",
                data: {
                    id_p: id_p,
                    id_c: id_c,
                    content: contentr
                },
                success: function (data) {
                   let res = JSON.parse(data);
                   console.log(res)
                   res.forEach(element => {
                       html =`<div class="comment reply-c reply-${element.comment_id} clearfix">
                                 <div class ="clearfix cm-rl-${element.id}">
                                    <img src="${RootREL}media/upload/users/${(element.users_avata && element.users_avata != '') ? element.users_avata : 'no_image.png'}" alt="" class="profile_pic">
                                    <div class="comment-details">
                                        <span class="comment-name">${element.users_firstname}</span>
                                        <span class="comment-date">${element.created}</span>
                                        <p>${element.content}</p>
                                    </div>
                                     </div>
                                </div>`;
                    }); 

                    $('.comment_reply_'+res[0].comment_id).val('');
                    $('.show-replay-'+res[0].comment_id).hide();
                    $(html).insertAfter('.show-replay-'+res[0].comment_id);
                    // $('.reply-'+res[0].comment_id).prepend(html);
                   
                }
            });
     }); 
    $('.open-bt-cm').click(function () {
        $('.comment-display').toggle('slow');
    });
    $('.comments-section').on('click','.page',function() {
        let product_id = $('#product_id').val();
        let no = $(this).children().attr('data-dt-idx');
        $.ajax({
            url: rootUrl + "product/fetch_comment",
            method: "POST",
            data: {
                id_p: product_id,
                page: no
            },
            success: function (data) {
                let res = JSON.parse(data);
                let html ='';
                res.comment.forEach(element => {
                    html += cmt(element, RootREL, res.replies);
                });
                html += pagi(res);
                $('.comment-display').html(html);
                location.href = "#href-comment";
            }
        });
        
    });
    $('body').on('click','.reply-btn',function(){
         $(this).parent().children('.show-reply').toggle('slow');
    });
   
})