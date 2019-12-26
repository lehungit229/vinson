$(document).ready(function(){
	
	/* LẤY LIST DANH SÁCH THEO USER */
	$(document).on('change','.user-catalogue',function(){
		let _this = $(this);
		let keyword = $('.keyword').val();
		keyword = $.trim(keyword);
		let catalogueid = _this.val();
		get_list_user({'keyword' : keyword,'catalogueid' : catalogueid, 'page': 1});
	});
	
	
	
	/* RESET MẬT KHẨU */
	$(document).on('click','.p-reset',function(){
		let _this = $(this);
		let userID = _this.attr('data-userid');
		if(userID == 0){
			sweet_error_alert('Có vấn đề xảy ra','Bạn phải chọn thành viên để thực hiện thao tác này');
		}else{
			swal({
				title: "Hãy chắc chắn rằng bạn muốn thực hiện thao tác này?",
				text: "Mật khẩu sẽ được cài về giá trị mặc định là : 123456xyz sau thao tác này",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Thực hiện!",
				cancelButtonText: "Hủy bỏ!",
				closeOnConfirm: false,
				closeOnCancel: false },
				function (isConfirm) {
					if (isConfirm) {
						let ajaxUrl = 'user/ajax/user/reset_password';
						$.post(ajaxUrl, {
							userID: userID},
							function(data){
								let json = JSON.parse(data);
								if(json.flag == 1){
									sweet_error_alert('Có vấn đề xảy ra',json.message);
								}else{
									swal("Cập nhật thành công!", "Reset mật khẩu thành công.", "success");
								}
							});
						
					} else {
						swal("Hủy bỏ", "Thao tác bị hủy bỏ", "error");
					}
				});
		}
	});
	
	
	/* CLICK VÀO THÀNH VIÊN*/
	$(document).on('click','.choose',function(){
		let _this = $(this);
		$('.choose').removeClass('bg-choose');
		_this.toggleClass('bg-choose');
		let data  = _this.attr('data-info');
		data = window.atob(data);
		let json = JSON.parse(data);
		setTimeout(function(){
			$('.loader').hide();
			$('.p-reset').attr('data-userid',json.id);
			$('.fullname').html('').html(json.fullname);
			$('#image').attr('src', json.avatar);
			$('.phone').html('').html(json.phone);
			$('.email').html('').html(json.email);
			$('.address').html('').html(json.address);
			$('.last-login').html('').html(json.last_login);
			$('.group-title').html('').html(json.group_title);
		}, 100);
	});
	/* END USER */
	
});
