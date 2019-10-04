$(document).ready(function () {
	(function($) {
		var numAllBtn = 0;
		var numBtnActive;
		var listChecked = [];
		var strFil = "";
		var ctl = $("table.dataTable").attr("controller");
		function delRecord(id, act) {
			urlDele = rootUrl+"admin/"+ctl+"/"+act+"/"+ id;
			$.ajax({
				url: urlDele,
				success: function (data) {
					if(data != 'error'){
						$('#row'+id).remove();
					}
				}
			})
		}

		function toggleRecord(id, status) {
			urlToggle = rootUrl+"admin/"+ctl+"/changestatus/"+ id+"/"+ status;
			$.ajax({
				url: urlToggle,
				success: function (data) {
					console.log(data);
					$('#toggle'+id+' i').attr({"class":(status=='0')?'fa fa-toggle-on':'fa fa-toggle-off'});
					$('#job_hot'+id).html((status=='0')?'Yes':'No');
					$('#toggle'+id).attr({"alt":(status=='0')?id+"_"+'1':id+"_"+'0'});
				}
			})
		}

		$('#btn_filter_'+ctl+'_table').on('click', function(){
			status= $('#select_list_'+ctl+'_status').val();
			type= $('#select_list_'+ctl+'_type').val();
			position= $('#select_list_'+ctl+'_position').val();
			page= $('#select_list_'+ctl+'_page').val();
			type= $('#select_list_'+ctl+'_type').val();
			content = '';
			if(status && status != 'all') content+='/status='+status;
			if(type && type != 'all') content+='/type='+type;
			if(position && position != 'all') content+='/position='+position;
			if(page && page != 'all') content+='/page='+page;
			if(type && type != 'all') content+='/type='+type;
			var url = rootUrl+ 'admin/'+ctl+'/index'+content;
		    window.location.replace(url);
		});

		$('#btn_filter_cvs_table').on('click', function(){
			status= $('#select_list_'+ctl+'_status').val();
			if(status && status != 'all'){
				var url = rootUrl+ 'admin/'+ctl+'/online/status='+status;
			}
			else{
				var url = rootUrl+ 'admin/'+ctl+'/online';
			}
		    window.location.replace(url);
		});

		$('tbody.records').on('click','td.btn-act button.del-record', function () {
			var isDel = confirm("Are you sure to delete this record???");
			if(isDel){
				idAct = $(this).attr('alt');
				delRecord(idAct, 'del');
			}
		});
		
		// ok
		$('tbody.records').on('click','td.btn-act button.toggle-status-record', function () {
			// var isToggle = confirm("Are you sure to change status this record?");
			// if(isToggle){
				data = $(this).attr('alt');
				arr = data.split('_');
				id = arr[0];
				status = arr[1];
				toggleRecord(id,status);
			// }
		});

		$('table.dataTable').on('click', '.checkAll input', function () {
			if($(this).prop('checked')) {
				listChecked = [];
				$('.checkboxRecord input').each(function() {
					listChecked.push($(this).attr('alt'));
					$(this).prop('checked', true);
				});
				$('.checkAll input').prop('checked', true);
			} else {
				$('.checkboxRecord input').each(function() {
					listChecked = [];
					$(this).prop('checked', false);
				});
				$('.checkAll input').prop('checked', false);
			}
		});

		//Check to delete
		$('table.dataTable').on('click', '.checkboxRecord input', function () {
			var idCheckBox = $(this).attr('alt');
			if($(this).prop('checked')) {
				listChecked.push(idCheckBox);
			} else {
				listChecked.splice($.inArray(idCheckBox, listChecked), 1);
				$('.checkAll input').prop('checked', false);
			}
		});

		//Click To Delete Record
		$('#delete-records').on('click', function () {
			if(listChecked.length > 0) {
				var isDel = confirm("Are you sure delete those records!");
				if(isDel){
					var ids = listChecked.toString(); 
					urlDel = rootUrl+"admin/"+ctl+"/delmany/ids="+ ids;
					$.ajax({
						url: urlDel,
						success: function (data) {
							if(data != 'error') {
								$.each(listChecked, function (k, v) {
									$('#row'+v).remove();
								});
								listChecked = [];
							}
						}
					})
				}
			} else {
				alert("Nobody to delete!");
			}
		});

		//Table Filter
		$('#table_filter input').on('keyup', function (e) {
			if(e.which == 13){
				strFil = $(this).val().trim();
			} 
		})
		$('#submit-search').off('click').on('click', function () {
			
		});

		$('#form-'+ctl+'-search').submit(function(e) {
			e.preventDefault(); 
			var content = $('#form-'+ctl+'-search').find('input[name="search"]').val();
			if(content === ''){
				window.location.replace(rootUrl+'admin/'+ctl+'');
			}else{
				var arr = window.location.href.split('/')
				var arr2 = window.location.href.split('/p=')
				var last = arr[arr.length-1].split('=');
				if(last[0] == 'p'){
					var url = arr2[0]+'/search='+content;//+'/p='+arr2[1];
				}else{
					var url = window.location.href+'/search='+content;
				}
				window.location.replace(url);
			}
		});

		$('tbody.records').on('click','.toggle-cv', function () {
			var isToggle = confirm("Are you sure to change status this cv?");
			if(isToggle){
				data = $(this).attr('alt').split('-');
				action = $(this).attr('action');
				id = data[0];
				status = data[1];
				urlToggle = rootUrl+"admin/"+ctl+"/"+action+"/"+ id +"/"+ status;
				let that = this;
				$.ajax({
					url: urlToggle,
					success: function (data) {
						$(that).removeClass(`fa-toggle-${status=='0'?'off':'on'}`);
						$(that).addClass(`fa-toggle-${status=='0'?'on':'off'}`)
						$(that).attr('alt',`${id}-${status=='0'?'1':'0'}`)
					},
					error: function (data) {
						alert("Error");
					}
				})
			}
		});


		$('.change-status-cv').on('change', function(){
			let id = $(this).attr('data')
			let status = $(this).val()
			url = rootUrl+"admin/cvs/changeCvOnlineStatus/"+id+"/"+status;
			$.ajax({
				url: url,
				success: function (data) {
					window.location.reload();
				},
				error: function (data) {
					alert("Error");
				}
			})
		})

		$('.tableCredit').on('click', '.editCreditCvUpload', function(){
			let id = $(this).attr('alt');
			let credit = $('#editCreditCvUpload'+id).val();
			url = rootUrl+"admin/cvs/editCreditCvUpload";
			$.ajax({
				url: url,
				data: {
					id,
					credit
				},
				method: 'post',
				success: function (data) {
					alert("Cập nhật thành công");
				},
				error: function (data) {
					alert("Error");
				}
			})
		})
		$('#export-records').on('click', function () {
			var isExp = confirm("Are you sure to export this data???");
			if(isExp){
				urlExp = rootUrl+"admin/"+ctl+"/exportdata/";
				console.log(urlExp);
				$.ajax({
					url: urlExp,
					success: function (data) {
						let tmpdata = JSON.parse(data);
						console.log('one',tmpdata[0]);
						JSONToCSVConvertor(tmpdata, " Data Report", true);
						function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel)  {
							var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
							var CSV = '';    
							CSV += ReportTitle + '\r\n\n';
							if (ShowLabel) {
								var row = "";
								for (var index in arrData[0]) {
									row += index + ',';
								}
								row = row.slice(0, -1);
								CSV += row + '\r\n';
							}
							for (var i = 0; i < arrData.length; i++) {
								var row = "";
								for (var index in arrData[i]) {
									row += '"' + arrData[i][index] + '",';
								}
								row.slice(0, row.length - 1);
								CSV += row + '\r\n';
							}
							if (CSV == '') {        
								alert("Invalid data");
								return;
							}   
							var fileName = `${ctl}`[0].toUpperCase() +  `${ctl}`.slice(1); 
							fileName += ReportTitle.replace(/ /g,"_");   
							var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
							var link = document.createElement("a");    
							link.href = uri;
							link.style = "visibility:hidden";
							link.download = fileName + ".csv";
							document.body.appendChild(link);
							link.click();
							document.body.removeChild(link);
						}
					}
				})
			}
		});
	
	})(jQuery);
	
});