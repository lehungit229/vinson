(function($) {
	"use strict";
    var HT = {};

    var time = 100;
	/* MAIN VARIABLE */

    var $window            		= $(window),
		$document           	= $(document),
		$owl					= $('.owl-slide .owl-carousel'),
		$preloader 				= $('#loading'),
		$prdGallery				= $('#prdGallery .swiper-container'),
		$cart					= $('#cart');

	// Check if element exists
    $.fn.elExists = function() {
        return this.length > 0;
    };

	/* PRELOADER */
	HT.Preloading = function () {
		if ($preloader.elExists()) {
			setTimeout(function(){
				$preloader.addClass('remove-preload');
			}, 1500);
		}
	}

	HT.prdGallery = function() {
		if($prdGallery.elExists()){
			var galleryTop = new Swiper('.product-gallery', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				spaceBetween: 10,
			})
			var galleryThumbs = new Swiper('.product-thumb', {
				direction: 'vertical',
				spaceBetween: 10,
				centeredSlides: true,
				slidesPerView: 10,
				touchRatio: 0.2,
				slideToClickedSlide: true
			})
			galleryTop.controller.control = galleryThumbs;
			galleryThumbs.controller.control = galleryTop;
		}
	}

	HT.owl = function() {
		let owl = $(this);
		$owl.each(function(key, value){
			let _this = $(this);
			let owlInit = _this.attr('data-option');
			owlInit = atob(owlInit);
			owlInit = JSON.parse(owlInit);
			_this.owlCarousel(owlInit);
		});
	}

  // Document ready functions
    $document.on('ready', function() {
		HT.owl();
		HT.Preloading();
		HT.prdGallery();

		var time;
		$(document).on('submit' , '.ajax-form', function(e){
	        e.preventDefault();
	        let _this = $(this);
	        let loader = _this.find('.bg-loader');
	        loader.show();
	        let modalTks = UIkit.modal("#md-thanks");
	        let validate = _this.attr('data-validate');
	        validate = JSON.parse(window.atob(validate)); //json_decode(base64_decode) => object

	        let data = $(this).serializeArray();
	        let obj = {
	            'data' : data,
	            'validate' : validate,
	        }
	        for(let i = 0; i < data.length; i++ ){
	           obj[validate[i].name] = data[i].value;
	        }

	        let ajaxUrl = 'contact/ajax/contact/save_info_contact';
	        // console.log(ajaxUrl); return false;
	        clearTimeout(time);
	        //gửi ajax
	        time = setTimeout(function(){
	            $.ajax({
	                method: "POST",
	                url: ajaxUrl,
	                data: obj,
	                dataType: "json",
	                cache: false,
	                success: function(json){
	                    console.log(json.html);
	                    loader.hide();
	                    if(json.error == ''){
	                        //không có lỗi ẩn error và show câu cảm ơn
	                        _this.find('.error').addClass('hidden');
	                        _this.find('.input-text').val('');
	                        _this.find('textarea').val('');
	                        modalTks.show();
	                    }else{
	                        _this.find('.error').removeClass('hidden');
	                        _this.find('.error .alert-danger').html(json.error);
	                    }
	                }
	            });
	        }, 300);
	        return false;
	    });
    });

})(jQuery);


$(document).ready(function() {
    $("body").lazyScrollLoading({
        lazyItemSelector : ".w_content , .lazyloading",
        onLazyItemVisible : function(e, $lazyItems, $visibleLazyItems) {
            $visibleLazyItems.each(function() {
                $(this).addClass("show");
            });
        }
    });
});

 $(window).load(function() {


	$(document).on('change','#city',function(e, data){
		let _this = $(this);
		let param = {
			'parentid' : _this.val(),
			'select' : 'districtid',
			'table'  : 'vn_district',
			'trigger_district': (typeof(data) != 'undefined') ? true : false,
			'text'   : 'Chá»n Quáº­n/Huyá»‡n',
			'parentField'  : 'provinceid',
		}
		getLocation(param, '#district');
	});
	if(typeof(cityid) != 'undefined' && cityid != ''){
		$('#city').val(cityid).trigger('change', [{'trigger':true}]);
	}
	$(document).on('change','#district', function(e, data){
		let _this = $(this);
		let param = {
			'parentid' : _this.val(),
			'select' : 'wardid',
			'trigger_ward': (typeof(data) != 'undefined') ? true : false,
			'table'  : 'vn_ward',
			'text'   : 'Chá»n PhÆ°á»ng/XĂ£',
			'parentField'   : 'districtid',
		}
		getLocation(param, '#ward');
	});


	$(document).on('change','#city_receive',function(e, data){
		let _this = $(this);
		let param = {
			'parentid' : _this.val(),
			'select' : 'districtid',
			'table'  : 'vn_district',
			'trigger_district': (typeof(data) != 'undefined') ? true : false,
			'text'   : 'Chá»n Quáº­n/Huyá»‡n',
			'parentField'  : 'provinceid',
			'district' : districtid_receive,
			'ward' : wardid_receive,
		}

		getLocation(param, '#district_receive');
	});
	if(typeof(cityid_receive) != 'undefined' && cityid_receive != ''){
		$('#city_receive').val(cityid_receive).trigger('change', [{'trigger':true}]);
	}
	$(document).on('change','#district_receive', function(e, data){
		let _this = $(this);
		let param = {
			'parentid' : _this.val(),
			'select' : 'wardid',
			'trigger_ward': (typeof(data) != 'undefined') ? true : false,
			'table'  : 'vn_ward',
			'text'   : 'Chá»n PhÆ°á»ng/XĂ£',
			'parentField'   : 'districtid',
			'district' : districtid_receive,
			'ward' : wardid_receive,
		}
		getLocation(param, '#ward_receive');
	});

	// +++++++++++++hiá»ƒn thá»‹ láº¡i giĂ¡ cho sáº£n pháº©m+++++++++++++
	if($('#js_prd_info').length){
 		render_price()
 	}

 	// khi thay Ä‘á»•i phiĂªn báº£n thuá»™c tĂ­nh, sá»‘ lÆ°á»£ng, chÆ°Æ¡ng trĂ¬nh khuyáº¿n máº¡i
 	//  thĂ¬ cáº­p nháº­t láº¡i giĂ¡ cho sáº£n pháº©m
	$(document).on('click' ,'.js_addtribute .js_btn_choose' ,function(){
		let _this = $(this);
		_this.parent().find('.js_choose').removeClass('js_choose');
		_this.addClass('js_choose');
		render_price();
	})
	$(document).on('click' ,'.js_quantity_minus' ,function(){
		let _this = $(this);
		let qty = _this.parent().find('.js_quantity').val();
		if(qty == 0){
			return false;
		}
		_this.parent().find('.js_quantity').val(sub(qty, 1));
		render_price();
	})
	$(document).on('click' ,'.js_quantity_plus' ,function(){
		let _this = $(this);
		let qty = _this.parent().find('.js_quantity').val();
		_this.parent().find('.js_quantity').val(sum(qty, 1));
		render_price();
	})
	$(document).on('click change' ,'.js_quantity' ,function(){
		render_price()
	})
	$(document).on('change ' ,'.js_block_promotional input' ,function(){
		render_price()
	})

	// ++++++++++++++++Khi nháº¥n mua hĂ ng, thĂªm vĂ o giá» hĂ ng++++++++++++++++
	$(document).on('click touch' ,'.js_buy' ,function(){
		render_price()
		let _this = $(this);
		conditon = _this.attr('data-conditon');
		if(conditon == 'true'){
			let param = {
				'id' : _this.attr('data-id'),
				'quantity' : _this.attr('data-quantity'),
				'attrids'  : _this.attr('data-attrids'),
				'promotionalid': _this.attr('data-promotionalid'),
				'name': _this.attr('data-name'),
				'content': _this.attr('data-content'),
			}
			let ajax_url = 'cart/ajax/cart/addCart';
			$.ajax({
                url : ajax_url,
                type : "post",
                cache: 	false ,
                dataType:"text",
                data : {
                    content: param.content, name: param.name, quantity: param.quantity, attrids: param.attrids, promotionalid: param.promotionalid, id: param.id
                },
                	success : function (result){
                	let json = JSON.parse(result);
                	if(json.result == "true"){
	                	toastr.success('Thêm sản phẩm vào giỏ hàng thành công','');
	                	$('.js_total_item_cart').html(json.total_cart)
                	}else{
                		toastr.error('ÄĂ£ xáº£y ra lá»—i','');
                	}
                }
            });
            if(_this.attr('data-redirect') == "true"){
            	 window.location= "/thanh-toan";
            }
		}else{
			toastr.error('Bạn phải chọn chương trình khuyến mãi hoặc phiên bản (nếu có)','');
		}
		return false;
	});

	// +++++++++Khi thĂªm nhanh sáº£n pháº©m Ä‘Æ°á»£c táº·ng 100% vĂ o giá» hĂ ng+++++++++
	$(document).on('click' ,'.ajax_add_prd_gift' ,function(){
		let _this = $(this);
		let param = {
			'id' : _this.attr('data-id'),
			'quantity' : 1,
			'attrids'  : '',
			'promotionalid': '',
			'name': _this.attr('data-name'),
		}
		let ajax_url = 'cart/ajax/cart/addCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                name: param.name,quantity: param.quantity, attrids: param.attrids, promotionalid: param.promotionalid, id: param.id
            },
            	success : function (result){

            	toastr.success('Thêm sản phẩm vào giỏ hàng thành công','');
            	let ajax_url = 'cart/ajax/cart/refeshCart';
				$.ajax({
		            url : ajax_url,
		            type : "post",
		            cache: 	false ,
		            dataType:"text",
		            data : {},
		            	success : function (data){
		            		let json = JSON.parse(data);
		            		if(json.result == true){
								$('.list-item').html(json.list_item);
								$('.total_quantity b').html(json.total_quantity);
								$('.cart-total .content').html(json.cart_total);

		            		}else{
		            			toastr.error('Có lỗi xảy ra, vui lòng thử lại','');
		            		}
		            }
		        });
            }
        });
	})
	$(document).on('change','select[name=cityid], select[name=districtid]' , function(){
		let _this = $(this);
		let ajax_url = 'cart/ajax/cart/render_discount_ship';
		clearTimeout(time);
		var time = setTimeout(function(){
			$.ajax({
	            url : ajax_url,
	            type : "post",
	            cache: 	false ,
	            dataType:"text",
	            data : {
	            	cityid: $('select[name=cityid]').val(),
	            	districtid: $('select[name=districtid]').val(),
	            },
	            	success : function (result){
	        			$('.js_discount_ship').html('-'+addCommas(result)+'đ')
	        			$('.js_discount_ship').attr('data-val', result)

	        			 // tính lại giá cuối cùng
				        let discount_ship = $('.js_discount_ship').attr('data-val');
				        let ship = $('.js_ship').attr('data-val');
				        let totalCart = $('.js_cart_coupon').attr('data-val');
				        let totalShip = sub(ship, discount_ship);
				        if(totalShip < 0){
				        	totalShip = 0;
				        }
				        $('.js_total_ship').html('-'+addCommas(totalShip)+'đ');
				        $('.js_cart_coupon').html('<b>'+addCommas(sum(totalCart, totalShip))+'đ</b>');


	        			// toastr.success('Bạn được giảm '+addCommas(result)+' tiền ship','');
	            }
	        });
        }, 500);


	})

	$(document).on('change','select[name=cityid], select[name=districtid]' , function(){
		let _this = $(this);
		let ajax_url = 'cart/ajax/cart/render_ship';
		clearTimeout(time);
		var time = setTimeout(function(){
    		$.ajax({
	            url : ajax_url,
	            type : "post",
	            cache: 	false ,
	            dataType:"text",
	            data : {
	            	cityid: $('select[name=cityid]').val(),
	            	districtid: $('select[name=districtid]').val(),
	            },
	            	success : function (result){
	            		$('.js_ship').html(addCommas(result)+'đ')
            			$('.js_ship').attr('data-val', result)

            			 // tính lại giá cuối cùng
				        let discount_ship = $('.js_discount_ship').attr('data-val');
				        let ship = $('.js_ship').attr('data-val');
				        let totalCart = $('.js_cart_coupon').attr('data-val');
				        let totalShip = sub(ship, discount_ship);
				        if(totalShip < 0){
				        	totalShip = 0;
				        }
				        $('.js_total_ship').html('-'+addCommas(totalShip)+'đ');
				        $('.js_cart_coupon').html('<b>'+addCommas(sum(totalCart, totalShip))+'đ</b>');
	            }
	        });
		}, 500);
	})




	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	//+++++++++++++++++++++Xá»¬ LĂ á» TRANG DANH Má»¤C SP ++++++++++++++++++++++
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	// khi chá»n thuá»™c tĂ­nh ta tiáº¿n hĂ nh load ra dá»¯ liá»‡u má»›i
	$(document).on('click','.attr' , function(){
		if($(this).find('input[name="attr[]"]:checked').length){
			$(this).find('input[name="attr[]"]').prop('js_choose', false);
			$(this).find('label a').addClass('js_choose');
		}else{
			$(this).find('input[name="attr[]"]').prop('js_choose', true);
			$(this).find('label a').removeClass('js_choose');
		}
		let attr = '';
		$('input[name="attr[]"]:checked').each(function(key, index){
			let id= $(this).val();
			let text= $(this).parent('div').text();
			let attr_id= $(this).attr('data-keyword');
			attr = attr + attr_id + ';' + id + ';';
		});
		// console.log(attr);
		$('#choose_attr > input').val(attr).change();
	})
	var time;
	$(document).on('change','.filter', function(){
		// $("html, body").animate({ scrollTop: 0 }, "400");
		// console.log(2);
		$('.lds-css').removeClass('hidden');
		let page = $('.pagination .uk-active span').text();

		clearTimeout(time);
		time = setTimeout(function(){
			get_list_object(page);
			$('.lds-css').addClass('hidden');
		},500);
		return false;
	});
	$(document).on('click','.pagination li span', function(){
		$("html, body").animate({ scrollTop: 0 }, "400");

		$('.lds-css').removeClass('hidden');
		let page = $(this).text();
		clearTimeout(time);
		time = setTimeout(function(){
			get_list_object(page);
			$('.lds-css').addClass('hidden');
		},500);
		return false;
	});

	$(document).on('click','.list-time .btn-time', function(){
		let _this = $(this);
		if(_this.hasClass('disable')){
			return false;
		}
		_this.parents('.list-time').find('.btn-time').removeClass('choose');
		_this.addClass('choose')
		let id = _this.attr('data-id');
		$("input[name=input_time]").val(id);
	});


});

function get_list_object(page){
	let keyword = $('.keyword').val();
	let perpage = $( ".js_perpage option:selected" ).text();
	if(perpage == 'undefined' || perpage == '' ){
		perpage = $('.js_perpage').val();
	}

	sort = $('.js_sort').val();
	if(sort == 'undefined' || sort == '' ){
		let sort = $( ".js_sort option:selected" ).text();
	}

	let catalogueid = $('#choose_attr').attr('data-catalogueid');

	let attr = $('input[name="attr"]').val();
	let brand = [];
	$('input[name="brand[]"]:checked').each(function(){
		brand.push($(this).val());
	});
	let min_price = $('#min_price').val();
	let length_min = min_price.length;
	min_price = min_price.substr(0, length_min - 1);
	min_price = min_price.replace(/\./gi, "");



	let max_price = $('#max_price').val();
	let length_max = max_price.length;
	max_price = max_price.substr(0, length_max - 1);
	max_price = max_price.replace(/\./gi, "");

	let param = {
		'page'    : page,
		'keyword' : keyword,
		'perpage' : perpage,
		'catalogueid' : catalogueid,
		'attr' : attr,
		'brand' : brand,
		'sort' : sort,
		'min_price' : min_price,
		'max_price' : max_price,
	}

	let pathname = window.location.pathname;
	// ?mod=course&view=main
	let href = pathname+'?';
	$.each( param, function( key, value ) {
		if(value != '' && value != undefined){
			href = href+key+'='+value+'&';
		}
	});
    history.pushState('', 'New URL: '+href, href);
	let ajaxUrl = 'product/ajax/frontend/get_list_prd_cat';
	$.get(ajaxUrl, {
		page: param.page,
		keyword: param.keyword,
		perpage: param.perpage,
		catalogueid: param.catalogueid,
		attr: param.attr,
		brand: param.brand,
		sort: param.sort,
		min_price: param.min_price,
		max_price: param.max_price,
		},
		function(data){
			let json = JSON.parse(data);
			$('#ajax-content').html(json.html);
			$('.pagination').html(json.pagination);
			$('.total_row').html(json.total_row);
			$('.from').html(json.from);
			$('.to').html(json.to);
			HT.countDown();
	});
};

function GetURLParameter(sParam){
	var sPageURL = window.location.search.substring(1);

    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}
function render_price(){
	let price = $('#js_prd_info').attr('data-price');
	let price_contact = $('#js_prd_info').attr('data-price_contact');
	let price_sale = $('#js_prd_info').attr('data-price_sale');
	let id = $('#js_prd_info').attr('data-id');
	let name = $('#js_prd_info').attr('data-name');
	var info = $('#js_prd_info').attr('data-info');
	info = window.atob(info);
	let json = JSON.parse(info);
	let quantity = $('.js_quantity').val();
	if(quantity == 'undefined' || quantity == '' ){
		quantity = 1;
	}

	attrids=new Array();
	let data_cart = '';
	let promotionalid = [];
	let conditionChoose = 1;
	let product_versionId = '';
	let wholesale = false;
	let content = '';
	if($('.js_addtribute .js_btn_choose').length){
		$('.js_addtribute .js_choose').each(function() {
			let attrid = $(this).attr('data-id');
			// console.log(attrid);
			let version = $(this).attr('data-version');
			if(typeof $(this).attr('data-content') != 'undefined' ){
				content = content + '</br>' + $(this).attr('data-content');
			}
			if(version == 0){
				return;
			}
			if(typeof attrid != 'undefined' ){
				if(attrid.indexOf('-') != -1){
					attrids = attrid.split('-');
				}else{
					attrids.push(attrid) ;
				}
			}

		});
		console.log(attrids);
		$('.js_addtribute option:selected').each(function() {
			let attrid = $(this).attr('data-id');
			let version = $(this).attr('data-version');
			content = content + '</br>' + $(this).attr('data-content');
			if(version == 0){
				return;
			}
			if(attrid.indexOf('-') != -1){
				attrids = attrid.split('-');
			}else{
				attrids.push(attrid);
			}
			// console.log(attrids);
		});

		if(attrids.length >=1){
			let product_version = json.product_version;
			if(product_version != ''){
				if(attrids.length == 1){
					product_version.forEach(function(item, index, array) {
						// console.log(item);
						// console.log(attrids);
					    if(item.attribute1 == attrids[0] || item.attribute2 == attrids[0]	){
					     	price = item.price_version;
					     	product_versionId = item.id;
					    }
					});
					price = price.trim();
				}else{
					product_version.forEach(function(item, index, array) {
						console.log(item);
						console.log(attrids);
					    if((item.attribute1 == attrids[0] && item.attribute2 == attrids[1]) || (item.attribute2 == attrids[0] && item.attribute1 == attrids[1])){
					     	price = item.price_version;
					     	product_versionId = item.id;
					    }
					});
					price = price.trim();
				}

			}
		}
	}
	if($('.js_wholesale .js_btn_choose').length){
		let quantity_start = '';
		json.product_wholesale.forEach(function(item, index, array) {
		   	if( parseFloat(quantity) >= item.quantity_start && parseFloat(quantity) <= item.quantity_end){
		   		price = item.price_wholesale;
		   		quantity_start = item.quantity_start
		   	}else{
		   		if(parseFloat(quantity) >= item.quantity_end){
		   			price = item.price_wholesale;
			   		quantity_start = item.quantity_start
		   		}
		   	}
		   	if(parseFloat(quantity) >= item.quantity_start){
		   		$('.js_block_promotional').find('input').prop('disabled', true);
		   		conditionChoose = 1;
		   		wholesale = true;
		   	}
		});
	 	$('.js_wholesale .js_btn_choose').removeClass('js_choose_wholesale')
		$('.js_wholesale .js_btn_choose').each(function() {
			let li_qty_start= $(this).attr('data-quantity_start');
			if(li_qty_start == quantity_start){
				$(this).addClass('js_choose_wholesale')
			}
		});
	}
	if(wholesale != true){
		if($('.js_block_promotional').length){
			let data = $('.js_block_promotional input:checked').attr('data-id');
			if(data != undefined){
				if(data.indexOf('-') != -1){
					promotionalid = data.split('-');
				}else{
					promotionalid.push(data)
				}
				let promotional = json.promotional;
				price_old = price.replace(/\./gi, "");
				price = price.replace(/\./gi, "");
				price = parseFloat(price);
				promotionalid.forEach(function(item, index, array) {
					promotional.forEach(function(item1, index1, array1) {
					  	if(item == item1.promotionalid){
					  		if(item1.condition_type_1 == 'condition_quantity'){
					  			let condition_quantity = parseFloat(item1.condition_value_1);
					  			if(parseFloat(quantity) >= condition_quantity){
					  				let discount_value = parseFloat(item1.discount_value);
							  		if(item1.discount_type == 'price'){

							  			price = price - discount_value;
							  		}
									if(item1.discount_type == 'same'){
							  			price = discount_value;
							  		}
							  		if(item1.discount_type == 'percent'){
							  			price = price - price_old*(discount_value)/100;
							  			price = Math.round(price);
							  		}
					  			}
					  		}

					  	}
					});
				});
				conditionChoose = 1;
			}else{
				conditionChoose = 0;
			}
		}
	}
	// console.log(conditionChoose);

	if( ( conditionChoose == 1) || ($('.js_addtribute ul ').length == 0 && $('.js_block_promotional').length == 0 )){
		$('.js_buy').attr('data-id', id);
		$('.js_buy').attr('data-conditon', 'true');
		$('.js_buy').attr('data-quantity', quantity);
		$('.js_buy').attr('data-attrids', attrids);
		$('.js_buy').attr('data-promotionalid', promotionalid);
		$('.js_buy').attr('data-name', name);
		$('.js_buy').attr('data-content', content);
	}
	if(price_contact == 1){
		$('.js_newprice').html('').html('GiĂ¡ liĂªn há»‡');
	}else{
		if(price_sale == 0){
			// console.log(price);
			$('.js_newprice').html('').html(addCommas(price) + '<sup>Ä‘</sup>');
		}else{
			$('.js_newprice').html('').html(addCommas(price_sale) + '<sup>Ä‘</sup>');
		}
	}
};

function addCommas(nStr){
	nStr = String(nStr);

	nStr = nStr.replace(/\./gi, "");
	let str ='';
	for (i = nStr.length; i > 0; i -= 3){
		a = ( (i-3) < 0 ) ? 0 : (i-3);
		str= nStr.slice(a,i) + '.' + str;
	}
	str= str.slice(0,str.length-1);
	return str;
}
function getLocation(param, object){
	let tempWard = wardid;
	let tempDistrict = districtid;
	if(typeof param.district != 'undefined'){
		tempDistrict = param.district;
	}
	if(typeof param.ward != 'undefined'){
		tempWard = param.ward;
	}

	if(typeof tempDistrict == 'undefined' || tempDistrict == ''  || param.trigger_district == false) tempDistrict = 0;
	if(typeof tempWard == 'undefined' || tempWard == ''  || param.trigger_ward == false) tempWard = 0;

	let formURL = 'dashboard/ajax/dashboard/getLocation';
	$.post(formURL, {
		parentid: param.parentid, select: param.select, table: param.table, text: param.text, parentField: param.parentField},
		function(data){
			let json = JSON.parse(data);
			if(param.select == 'districtid'){
				if(param.trigger_district == true){
					$(object).html(json.html).val(tempDistrict).trigger('change', [{'trigger':true}]);
				}else{
					$(object).html(json.html).val(tempDistrict).trigger('change');
				}
			}else if(param.select == 'wardid'){
				$(object).html(json.html).val(tempWard);
			}
		});
}


function sum(a = 0 ,b = 0){
	return parseFloat(a) + parseFloat(b);
}
function sub(a = 0 ,b = 0){
	return parseFloat(a) - parseFloat(b);
}





 $(window).load(function() {

 	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++Xá»¬ LI GIá» HĂ€NG CART++++++++++++++++++++++++++++++
 	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	// +++++++++++++++++++++++xĂ³a sáº£n pháº©m+++++++++++++++++++++++
	$(document).on('click' ,'.js_del_prd' ,function(){
		let _this = $(this);
		let param = {
			'rowid' : _this.parents('.js_data_prd').attr('data-rowid'),
			'quantity' :0,
		}
		let ajax_url = 'cart/ajax/cart/refeshCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                param: param
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success('XĂ³a sáº£n pháº©m thĂ nh cĂ´ng','');
            			resultResfeshCart(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error('CĂ³ lá»—i sáº£y ra','');
            		}
            }
        });
	})

	// +++++++++++++++++++++++Cáº­p nháº­t sá»‘ lÆ°á»£ng+++++++++++++++++++++++
	$(document).on('change' ,'.js_update_quantity' ,function(){
		let _this = $(this);
		let param = {
			'rowid' : _this.parents('.js_data_prd').attr('data-rowid'),
			'quantity' : _this.val(),
		}
		let ajax_url = 'cart/ajax/cart/refeshCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                param: param
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success('Cáº­p nháº­t sá»‘ lÆ°á»£ng thĂ nh cĂ´ng','');
						resultResfeshCart(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error('CĂ³ lá»—i sáº£y ra','');
            		}

            }
        });
	})
	// +++++++++++++++++++++++cáº­p nháº­p sá»‘ lÆ°á»£ng vá» 0+++++++++++++++++++++++
	$(document).on('click' ,'.js_refesh_quantity' ,function(){
		let _this = $(this);
		let param = {
			'rowid' : _this.parents('.js_data_prd').attr('data-rowid'),
			'quantity' : 1,
		}
		let ajax_url = 'cart/ajax/cart/refeshCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                param: param
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success('Cáº­p nháº­t sá»‘ lÆ°á»£ng thĂ nh cĂ´ng','');
						resultResfeshCart(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error('CĂ³ lá»—i sáº£y ra','');
            		}

            }
        });
	})

	// +++++++++++++++++++++++ThĂªm mĂ£ coupn+++++++++++++++++++++++
	$(document).on('click' ,'.js_btn_coupon' ,function(){
		let _this = $(this);
		let code_cp = $('.js_input_coupon').val();
		let ajax_url = 'cart/ajax/cart/refeshCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                type:'add', code_cp: code_cp
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success(json.notifi,'');
						resultResfeshCart(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error(json.notifi,'');
            		}
            	}
        });
	})

	// +++++++++++++++++++++++XĂ³a mĂ£ coupn+++++++++++++++++++++++
	$(document).on('click' ,'.js_del_coupon' ,function(){
		let _this = $(this);
		let code_cp = _this.attr('data-coupon');
		let ajax_url = 'cart/ajax/cart/refeshCart';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                type:'del_coupon', code_cp: code_cp
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success(json.notifi,'');
						resultResfeshCart(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error(json.notifi,'');
            		}
            	}
        });
	})



	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++Xá»¬ LĂ TRANG THANH TOĂN PAYMENT+++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



	// +++++++++++++++++++XĂ³a mĂ£ Coupon+++++++++++++++++++
	$(document).on('click' ,'.js_del_coupon_payment' ,function(){
		let _this = $(this);
		let code_cp = _this.attr('data-coupon');
		let ajax_url = 'cart/ajax/cart/refeshPayment';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                type:'del_coupon', code_cp: code_cp
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success(json.notifi,'');
						resultResfeshPayment(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error(json.notifi,'');
            		}
            	}
        });
	})


	//  +++++++++++++++++++++ThĂªm mĂ£ Coupon+++++++++++++++++++++
	$(document).on('click' ,'.js_btn_coupon_payment' ,function(){
		let _this = $(this);
		let code_cp = $('.js_input_coupon_payment').val();
		let ajax_url = 'cart/ajax/cart/refeshPayment';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType:"text",
            data : {
                type:'add', code_cp: code_cp
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
            			toastr.success(json.notifi,'');
						resultResfeshPayment(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error(json.notifi,'');
            		}
            	}
        });
	})


	// ++++++++++++++++++++++++Cáº­p nháº­t sá»‘ lÆ°á»£ng++++++++++++++++++++++++
	$(document).on('change' ,'.js_update_quantity_payment' ,function(){
		let _this = $(this);
		let param = {
			'rowid' : _this.parents('.js_data_prd').attr('data-rowid'),
			'quantity' : _this.val(),
		}
		let ajax_url = 'cart/ajax/cart/refeshPayment';
		$.ajax({
            url : ajax_url,
            type : "post",
            cache: 	false ,
            dataType :"text",
            data : {
                param : param,
            },
            	success : function (data){
            		_this.val('');
            		let json = JSON.parse(data);
            		if(json.result == 'true'){
						resultResfeshPayment(json);
						return false;
            		}
            		if(json.result == 'false'){
            			toastr.error(json.notifi,'');
            		}
            	}
        });
	})
	$(document).on('click' ,'.js_del_prd_payment' ,function(){
        let _this = $(this);
        let param = {
            'rowid' : _this.parents('.js_data_prd').attr('data-rowid'),
            'quantity' :0,
        }
        let ajax_url = 'cart/ajax/cart/refeshPayment';
        $.ajax({
            url : ajax_url,
            type : "post",
            cache:  false ,
            dataType :"text",
            data : {
                param : param,
            },
                success : function (data){
                    _this.val('');

                    let json = JSON.parse(data);
                    if(json.result == 'true'){
                        resultResfeshPayment(json);
                        return false;
                    }
                    if(json.result == 'false'){
                        toastr.error(json.notifi,'');
                    }
                }
        });
    })


	// +++++++++++++++tÄƒng giáº£m sá»‘ lÆ°á»£ng thĂªm 1 Ä‘Æ¡n vá»‹+++++++++++++++
	$(document).on('click' ,'.btn-abatement' ,function(){
		let _this = $(this);
		let quantity = _this.parent().find('input').val();
		_this.parent().find('input').val(sum(quantity, 1)).trigger('change');
		return false;
	})
	$(document).on('click' ,'.btn-augment' ,function(){
		let _this = $(this);
		let quantity = _this.parent().find('input').val();
		_this.parent().find('input').val(sub(quantity, 1)).trigger('change');
		return false;
	})
	$(document).on('click' ,'.js_post_payment_1' ,function(){
		$('.js_post_payment').trigger('click');
	})

});


function resultResfeshCart(json =''){
	$('.js_list_prd').html(json.list_prd);
	$('.js_total_prd').html(json.total_quantity);
	$('.js_total_cart').html(json.total_cart);
	$('.js_cart_promo').html(json.cart_promo);
	$('.js_cart_coupon').html(json.cart_coupon);
	$('.js_list_promo').html(json.list_promo);
	$('.js_list_coupon').html('');
	$('.js_list_coupon').html(json.list_coupon);

	return true;
}


function resultResfeshPayment(json =''){
	$('.js_list_prd').html(json.list_prd);
	$('.js_total_prd').html(json.total_quantity);
	$('.js_total_cart').html(json.total_cart);
	$('.js_cart_promo').html(json.cart_promo);
	$('.js_cart_coupon').html(json.cart_coupon);
	$('.js_cart_coupon').attr('data-val', json.cart_coupon_val);
	$('.js_list_promo').html(json.list_promo);
	$('.js_discount_promo').html(json.discount_promo);
	$('.js_discount_coupon').html(json.discount_coupon);
	$('.js_list_coupon').html('');
	$('.js_list_coupon').html(json.list_coupon);
	$('.js_total_item_cart').html(json.total_quantity)
	$('select[name=cityid]').trigger('change');
	$('select[name=districtid]').trigger('change');
	return true;
}
