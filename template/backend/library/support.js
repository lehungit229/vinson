$(document).ready(function(){
	
	
	$(document).on('change','.publish',function(){
		let _this = $(this);
		let objectid = _this.attr('data-id');
		let formURL = 'support/ajax/support/status';
		$.post(formURL, {
			objectid: objectid},
			function(data){

			});
	});
	
	/* XÓA RECORD */
	$(document).on('click','.ajax-delete',function(){
		let _this = $(this);
		let param = {
			'title' : _this.attr('data-title'),
			'name'  : _this.attr('data-name'),
			'module': _this.attr('data-module'),
			'id'    : _this.attr('data-id'),
			'router' : _this.attr('data-router'),
			'child'  : _this.attr('data-child')
		}
		let parent = _this.attr('data-parent');
		swal({
			title: "Hãy chắc chắn rằng bạn muốn thực hiện thao tác này?",
			text: param.title,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Thực hiện!",
			cancelButtonText: "Hủy bỏ!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function (isConfirm) {
				
				if (isConfirm) {
					let ajax_url = 'support/ajax/support/ajax_delete';
					
					$.post(ajax_url, {
						module: param.module, id: param.id, router: param.router, child: param.child},
						function(data){
							if(data == 0){
								sweet_error_alert('Có vấn đề xảy ra','Vui lòng thử lại')
							}else{
								if(typeof parent != 'undefined'){
									_this.parents('.'+parent+'').hide().remove();
								}else{
									_this.parents('.col-lg-4').hide().remove();
								}
								swal("Xóa thành công!", "Hạng mục đã được xóa khỏi danh sách.", "success");
							}
						});

				} else {
					swal("Hủy bỏ", "Thao tác bị hủy bỏ", "error");
				}
			});
	});
	
});
