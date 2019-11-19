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
                                    <img src="https://en.es-static.us/upl/2018/12/comet-wirtanen-Jack-Fusco-dec-2018-Anza-Borrego-desert-CA-e1544613895713.jpg" alt="" class="profile_pic">
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
                    $(html).insertAfter('.comment-append hr');
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
                                    <img src="https://en.es-static.us/upl/2018/12/comet-wirtanen-Jack-Fusco-dec-2018-Anza-Borrego-desert-CA-e1544613895713.jpg" alt="" class="profile_pic">
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
   
    $('body').on('click','.reply-btn',function(){
         $(this).parent().children('.show-reply').toggle('slow');
    });
   
})