jQuery('#new_doing').on('click', function() {
    if(jQuery('#isSearch').attr('checked')) {
        jQuery('#exampleModal').modal('show');
    } else {
        toastr.warning('Xin vui lòng bật chế độ "Cho phép nhà tuyển dụng tìm kiếm" trước khi làm mới.');
    }
})

jQuery('#update_search_records').on('click', function() {
    jQuery.ajax({
        method: 'POST',
        url: rootURL + 'cv/updateRecords',
        data: {idUserCv},
        dataType: 'json',
    }).done( function( result ){
        if(result.success) {
            console.log('sdf')
            jQuery('#exampleModal').modal('hide');
            setTimeout(function(){
                toastr.success(result.messege);
            }, 500)
        }
    }).fail( function( err ){

    }).always( function() {

    })
})

jQuery('#isSearch').on( 'click', function(){
    var status = 0;
    jQuery(this).attr('checked') ? status = 1 : status;

    jQuery.ajax({
        method: 'POST',
        url: rootURL + 'cv/updateStatus',
        data: {idUserCv, status},
        dataType: 'json',
    }).done( function( result ){
        if(result.success) {
            toastr.success(result.messege);
        }
    }).fail( function( err ){

    }).always( function() {

    })
})

getListCV();

function getListCV() {
    jQuery.ajax({
        url: rootURL + 'cv/get_cv_templates',
        dataType: 'json'
    }).done(function(result) {
        list_cv = result.data;
        for (var i = 0; i < result.data.length; i++) {
            var html_append =
                `<div class="col-md-3 col-sm-4">
                        <div class="thumbnail" style="max-height: 320px; overflow: hidden;">
                            <a alt="` + result.data[i].id + `" href="`+ rootURL + `cv/add?cv=` + result.data[i].id + `" class="preview-cv-image">
                                <img src="` + uploadURI + 'cv_templates/' +result.data[i].preview_image + `" alt="preview image">
                            </a>
                        </div>
                    </div>`;
            jQuery('.list-cv-step').append(html_append);
        }
        if (selected_cv_id) {
            setTemplate(selected_cv_id);
        }
    });
}

jQuery('#modalCV').on('click', '.cv-delete-button', function(){
    let id = jQuery(this).attr('data')
    let isDelete = confirm("Bạn chắc chắn muốn xóa CV này");
    if(isDelete){
        jQuery.ajax({
            type: "POST",
            url: rootURL + 'jobseeker/cv/deleteCvUpload',
            data: {
                cv_file_id: id
            }, 
            success: function(data)
            {
                jQuery('#cv-item-'+id).remove();
                toastr.error("CV đã được xóa!");
            },
            error:function(err){
            }
        });
    }
})

jQuery('#modalCV').on('click', '.cv-status', function(){
    let id = jQuery(this).attr('data')
    let isDelete = confirm("Bạn chắc chắn muốn kích hoạt CV này");
    if(isDelete){
        jQuery.ajax({
            type: "POST",
            url: rootURL + 'jobseeker/cv/activeCvUpload',
            data: {
                cv_file_id: id
            }, 
            success: function(data)
            {
                toastr.success("Kích hoạt thành công!");
            },
            error:function(err){
            }
        });
    }
})

jQuery('.btn-upload-cv').on('click', function(){
  
    jQuery.ajax({
        url: rootURL + 'jobseeker/cv/uploadCvUpload',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
            let item = JSON.parse(response).data;

            let html = `
                <tr id="cv-item-${item.id}">
                    <td>${item.message}</td>
                    <td>${item.created}</td>
                    <td>
                        <input class="cv-status" data="${item.id}" type="radio" name="status" ${item.status=='1'?"checked":''} />
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary cv-delete-button" data="${item.id}">Xóa</button>
                    </td>
                </tr>
            `;
            jQuery('.table-cv').append(html);

            toastr.success("Tải lên file CV thành công !");
        },
        error: function(){
            toastr.warning("Tải lên không thành công !");
        }
    });
})

jQuery('.candidate-cv-categories').on('change', function(e){
    categories_cv = jQuery(this).val().join(',');
    form_data.append('categories_cv', categories_cv);
})

document.getElementById("cv_file").onchange = function() {
    var file_data = jQuery('#cv_file').prop('files')[0];   
    form_data.append('cv_file', file_data);
}