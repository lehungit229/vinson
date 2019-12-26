$(document).ready(function(){
	if($('#tag_catalogue').length){
		select2($('#tag_catalogue'));
	}
	if(typeof catalogueid !='undefined'  ){
		pre_select2('tag_catalogue',catalogueid);
	}
	
	// Cập nhật trạng thái
	
	$(document).on('change','.publish',function(){
		let _this = $(this);
		let objectid = _this.attr('data-id');
		let formURL = 'tag/ajax/tag/status';
			$.post(formURL, {
				objectid: objectid},
				function(data){
					
				});
	});
	
});
