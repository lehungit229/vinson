$(document).ready(function(){
	//===================album ảnh===================
	//đoạn js này để kéo thả ảnh
	$( function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});
	
	$(document).on('click','.delete-image', function(){
		console.log(1);
		let _this = $(this);
		_this.parents('li').remove();
		if($('.upload-list li').length <= 0){
		console.log(2);
			$('.click-to-upload').removeClass('hidden');
			$('.upload-list').addClass('hidden');
		}
		return false;
	});

	
	
	$(document).on('change','.publish',function(){
		let _this = $(this);
		let objectid = _this.attr('data-id');
		let formURL = 'article/ajax/catalogue/status';
			$.post(formURL, {
				objectid: objectid},
				function(data){
					
				});
	});
	
	
	
	
});
