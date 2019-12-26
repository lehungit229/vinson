$(document).ready(function(){
	if($('#page_catalogue').length){
		select2($('#page_catalogue'));
	}
	if(typeof catalogueid !='undefined'  ){
		pre_select2('page_catalogue',catalogueid);
	}
	
	
	if($('#tag').length){
		select2($('#tag'));
	}
	
	if(typeof tag !='undefined'  ){
		clearTimeout(time);
		time = setTimeout(function(){
			pre_select2('tag',tag)
		},100);
	}
	$(document).on('change','.publish',function(){
		let _this = $(this);
		let objectid = _this.attr('data-id');
		let formURL = 'page/ajax/page/status';
			$.post(formURL, {
				objectid: objectid},
				function(data){
					
				});
	});
});
