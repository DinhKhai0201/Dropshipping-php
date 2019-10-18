$(document).ready(function(){
    if(logged==='0') return;
    function notify(){
        $('.notifies-msg').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        $.ajax({
            method: 'get',
            url: rootURL+'notifications/index',
            dataType: 'json',
        }).done(function (result) {
            let notifies = [];
            let isShowNotify = false;
            if(!result.data || result.data.length === 0){
                let html = `
                    <li class="text-center"> 
                        <a class="" alt="">Không có thông báo nào</a>
                    </li>
                `
                localStorage.setItem("notifies_html", html);
                $('.notifies-msg').html(html);
                return;
            }
            if(result.role==="employer"){
                let applyJobIds = [];
                result.data.map(item=>{
                    if(!applyJobIds.includes(item.job_id)) applyJobIds.push(item.job_id);
                })
                applyJobIds.map(item=>{
                    let count = 0;
                    let msg = '';
                    let job_id = '';
                    result.data.map(tmp=>{
                        if(tmp.job_id === item && result.type[tmp.type] === 'hasApply'){
                            msg = tmp.description;
                            job_id = item;
                            count ++;
                        }
                        if(tmp.status == '1') isShowNotify = true;
                    })
                    msg = msg.replace("Bạn có một", "Bạn có "+ count);
                    if(msg != '') notifies.push({
                        msg,
                        link: "employer/jobs/index/active",
                        job_id,
                        type: 'hasApply'
                    })
                
                })
                result.data.map(tmp=>{
                    if(tmp.status == '1') isShowNotify = true;
                    if(result.type[tmp.type] === 'approvedPostJob'){
                        notifies.push({
                            msg: tmp.description,
                            link: "employer/jobs/index/active",
                            type: 'approvedPostJob'
                        })
                    }
                    if(result.type[tmp.type] === 'rejectedPostJob'){
                        notifies.push({
                            msg: tmp.description,
                            link: "employer/jobs/index/unactive",
                            type: 'rejectedPostJob'
                        })
                    }
                })
                let html = '';
                notifies.map(item=>{
                    if(item.type === 'hasApply'){
                        html += `
                            <li> 
                                <a class="ViewedAll ViewCvListForJob" alt="${item.job_id}" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }else if(item.type === 'approvedPostJob'){
                        html += `
                            <li> 
                                <a class="ViewedAll" alt="" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }else if(item.type === 'rejectedPostJob'){
                        html += `
                            <li> 
                                <a class="ViewedAll" alt="" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }
                  
                })
                html += `
                    <li class="text-center"> 
                        <a class="DeleteAll" alt="">Xóa tất cả</a>
                    </li>
                `
                localStorage.setItem("notifies_html", html);
                $('.notifies-msg').html(html);
                if(html !== '' && isShowNotify) $('.isShowNotify').removeClass('hide');
                else $('.isShowNotify').addClass('hide');
            }else if(result.role==="candidate"){
                result.data.map(tmp=>{
                    if(tmp.status == '1') isShowNotify = true;
                    if(result.type[tmp.type] === 'updateProfile'){
                        notifies.push({
                            msg: tmp.description,
                            link: "jobseeker/records/record_steps",
                            type: 'updateProfile'
                        })
                    }
                    if(result.type[tmp.type] === 'rejectCv'){
                        notifies.push({
                            msg: tmp.description,
                            link: "jobseeker/records/index",
                            type: 'rejectCv'
                        })
                    }
                    if(result.type[tmp.type] === 'hasViewMyCv'){
                        notifies.push({
                            msg: tmp.description,
                            link: "",
                            type: 'hasViewMyCv'
                        })
                    }
                })
                let html = '';
                notifies.map(item=>{
                    if(item.type === 'updateProfile'){
                        html += `
                            <li> 
                                <a class="ViewedAll" alt="" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }else if(item.type === 'rejectCv'){
                        html += `
                            <li> 
                                <a class="ViewedAll" alt="" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }else if(item.type === 'hasViewMyCv'){
                        html += `
                            <li> 
                                <a class="ViewedAll" alt="" href="${rootURL+item.link}">${item.msg}</a>
                            </li>
                        `
                    }
                  
                })
                html += `
                    <li class="text-center"> 
                        <a class="DeleteAll" alt="">Xóa tất cả</a>
                    </li>
                `
                localStorage.setItem("notifies_html", html);
                $('.notifies-msg').html(html);
                if(html !== '' && isShowNotify) $('.isShowNotify').removeClass('hide');
                else $('.isShowNotify').addClass('hide');
            }
            
        }).fail(function (err) {
        }).always(function () {
        });
    }
    notify();

    setInterval(() => {
        notify();
    }, 30000);
    let notifies_html = localStorage.getItem('notifies_html');
    if(notifies_html){
        $('.notifies-msg').html(notifies_html);
    }

    $('.notifies-msg').on('click', '.ViewedAll', function(){
        $.ajax({
            method: 'post',
            url: rootURL+'notifications/viewedall',
            dataType: 'json',
        }).done(function (result) {
        }).fail(function (err) {
        }).always(function () {
        });
    })

    $('.notifies-msg').on('click', '.DeleteAll', function(){
        $.ajax({
            method: 'post',
            url: rootURL+'notifications/deleteAll',
            dataType: 'json',
        }).done(function (result) {
        }).fail(function (err) {

        }).always(function () {
            $('.notifies-msg').html(`
                <li class="text-center"> 
                    <a class="" alt="">Không có thông báo nào</a>
                </li>
            `);
            localStorage.removeItem('notifies_html');
            $('.isShowNotify').addClass('hide');
        });
    })

    $('.notifies-msg').on('click', '.ViewCvListForJob', function(){
        localStorage.setItem('job_id', $(this).attr('alt'));
        window.location.href=$(this).attr('href');
    })

    let job_id = localStorage.getItem('job_id');
    if(job_id) {
        $('#modalShowApply'+job_id).modal('show');
        var id = job_id;
        urlGetApplicants = rootURL+"employer/"+ctl+"/getApplicantsByJob?id_job="+ id;
        $('.ListApplicants').html('');
        $.ajax({
          type:"GET",
          url: urlGetApplicants,
          success: function (data) {
            let list = JSON.parse(data).data
            let html = '';
            list.map((item, index)=>{ 
              if(item.cv_user_id && item.user_id !== '0')
              url=rootREL+'cv/export_cv/'+item.cv_user_id;
              else url=baseUrlAws+'cv/'+item.cv_file
              html += `
                <tr>
                  <td>${index+1}</td>
                  <td>${item.created}</td>
                  <td>${item.user.name}</td>
                  <td>${item.user.email}</td>
                  <td><a href="${url}"><b>Xem CV</b></a></td>
                </tr>
              `;
            })
            $('.ListApplicants').append(html);
          }
        })
    }

    $('.JobManager #job-posting').click(function(){
        localStorage.removeItem('job_id');
    })

    function notifyAdmin(){
        $('.notifies-msg').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        $.ajax({
            method: 'get',
            url: rootURL+'notifications/getNotifyAdmin',
            dataType: 'json',
        }).done(function (result) {
            let notifies = [];
            let isShowNotify = false;
            let html ="";
            if(!result.data || result.data.length === 0){
                let html = `
                    <li class="text-center"> 
                        <a class="" alt="">Không có thông báo nào</a>
                    </li>
                `
                localStorage.setItem("notifies_html", html);
                $('.notifies-msg').html(html);
                return;
            }
            else{
                if(result.data.length < 5){
                    result.data.map(item => {
                        href = rootURL + 'admin/consulting_jobs/view/'+item.consulting_id;
                        html += `
                        <li class="text-center"> 
                            <a href='${href}' class="" alt="">${item.description}</a>
                        </li>
                    `
                    })
                }else{
                     result.data.map((item,index) => {
                        href = rootURL + 'admin/consulting_jobs/view/'+item.consulting_id;
                        html += `
                        <li class="text-center"> 
                            <a href='${href}' class="" >${item.description}</a>
                        </li>
                    `
                    })
                    html += `
                    <li class="text-center"> 
                        <a href='${rootURL}admin/consulting_jobs/index' class="" alt="">Xem tất cả</a>
                    </li>
                `
                }

                html += `
                    <li class="text-center"> 
                        <a href='${rootURL}notifications/deleteAllConsulting' class="DeleteAll" alt="">Xóa tất cả</a>
                    </li>
                `
                localStorage.setItem("notifies_html", html);
                $('.notifies-msg').html(html);
                if(html !== '' && isShowNotify) $('.isShowNotify').removeClass('hide');
                else $('.isShowNotify').addClass('hide');
            }

            

        })
    }

    notifyAdmin();

    setInterval(() => {
        notifyAdmin();
    }, 3000);
});