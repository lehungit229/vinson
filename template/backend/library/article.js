$(document).ready(function(){
	if($('#article_catalogue').length){
		select2($('#article_catalogue'));
	}
	if(typeof catalogueid !='undefined'  ){
		pre_select2('article_catalogue',catalogueid);
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
		let formURL = 'article/ajax/article/status';
			$.post(formURL, {
				objectid: objectid},
				function(data){
					
				});
	});
});
