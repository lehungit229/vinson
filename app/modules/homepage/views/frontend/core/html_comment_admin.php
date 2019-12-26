<div class="block-comment">
	<?php 
	// print_r($listComment);die;
	 ?>
	<?php if(isset($listComment) && is_array($listComment) && count($listComment)){?>
	<ul class="list-comment uk-list uk-clearfix">
			<?php foreach($listComment as $key => $val){?>
				<li>
					<div class="comment">
						<div class="uk-flex uk-flex-space-between">
							<div class="cmt-profile">
								<div class="uk-flex">
									<div class="_cmt-avatar"><img src="template/avatar.png" alt="" class="img-sm"></div>
									<div class="_cmt-info">
										<div class="uk-flex uk-flex-middle">
											<div class="_cmt-name"><?php echo $val['fullname']?></div>
											<div class="label label-primary _cmt-tag">Khách hàng</div>
										</div>
										<div class="_cmt-phone"><?php echo (isset($val['phone']) && $val['phone'] != '')? substr($val['phone'], 0, -3).'xxx' : ''; ?></div>
									</div>
								</div>
							</div>
							<div class="switch uk-flex uk-flex-center">
								<div class="onoffswitch">
									<input type="checkbox" <?php echo ($val['publish'] == '1')? 'checked':'';?> class="onoffswitch-checkbox publish" data-id="<?php echo $val['id'];?>" id="publish-<?php echo $val['id'];?>">
									<label class="onoffswitch-label" for="publish-<?php echo $val['id'];?>">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
							
						</div>
						<div class="cmt-content">
							<p><?php echo $val['comment'];?></p>
							<?php $album = json_decode($val['image']);?>
							
							<?php if(isset($album) && is_array($album) && count($album)){?>
								<div class="gallery-block mb10">
									<ul class="uk-list uk-flex uk-flex-middle clearfix lightBoxGallery">
										<?php foreach($album as $k => $v){?>
											<li>
												<div class="thumb">
													<a href="<?php echo $v;?>" title="" data-gallery="#blueimp-gallery-<?php echo $val['id'];?>"><img src="<?php echo $v;?>" class="img-md"></a>
												</div>
											</li>
										<?php }?>
									</ul>
								</div>
							<?php }?>
							
							<div class="_cmt-reply">
								<a href="" title="" class="btn-reply" data-comment="1" data-id="<?php echo $val['id'];?>" data-module ="<?php echo $val['module'];?>" data-detailid = "<?php echo $val['detailid'];?>">Trả lời</a> <span class="mr5 num-reply" data-num="<?php echo isset($val['child'])? count($val['child']) : 0;?>">(<?php echo isset($val['child'])? count($val['child']) : 0;?>)</span> <span class="rating order-1 rt-cmt" data-stars="5" data-default-rating="<?php echo $val['rate'];?>" disabled ></span>
								<span class="dash">-</span>
								<span class="cmt-time">
									<i class="fa fa-clock-o"></i>
									<time class="timeago meta" datetime="<?php echo $val['created'];?>"></time>
								</span>
							</div>
							<div class="show-reply">
								<!-- đổ cấu trúc comment vào đây -->
							</div>
							<div class="wrap-list-reply">
								<ul class="list-reply list-comment uk-list uk-clearfix" id="reply-to-<?php echo $val['id'];?>">
									<!-- hiển thị câu trả lời vào đây -->
									<?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){?>
										<?php foreach($val['child'] as $keyChild => $valChild){?>
											<li>
												<div class="comment">
													<div class="uk-flex uk-flex-space-between">
														<div class="cmt-profile">
															<div class="uk-flex uk-flex-middle">
																<div class="_cmt-avatar"><img src="template/avatar.png" alt="" class="img-sm"></div>
																<div class="_cmt-name"><?php echo $valChild['fullname'];?></div>
																<i>QTV</i>
															</div>
														</div>
														<div class="uk-flex uk-flex-middle toolbox-cmt">
															<div class="edit-cmt"><a type="button" title="" class="btn-edit" data-info="<?php echo base64_encode(json_encode($valChild)); ?>" data-id="<?php echo $valChild['id'];?>" data-table="comment">Sửa</a></div>
															<div class="delete-cmt">
																<a type="hidden" title="" class="ajax-delete" data-title="Lưu ý: Dữ liệu sẽ không thể khôi phục. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!" data-id = "<?php echo $valChild['id'];?>" data-table = "comment" data-closest="li" ></a>
																<a type="button" title="" class="btn-delete" style="color: #e74c3c;">Xóa</a>
															</div>
														</div>
													</div>
													<div class="cmt-content">
														<p><?php echo $valChild['comment'];?></p>
														<?php $albumReply = json_decode($valChild['image']);?>
														<?php if(isset($albumReply) && is_array($albumReply) && count($albumReply)){ ?>
															<div class="gallery-block mb10">
																<ul class="uk-list uk-flex uk-flex-middle clearfix lightBoxGallery">
																	<?php foreach($albumReply as $kR => $vR){?>
																		<li>
																			<div class="thumb">
																				<a href="<?php echo $vR;?>" title="" data-gallery="#blueimp-gallery-<?php echo $val['id'].'-'.$valChild['id'];?>"><img src="<?php echo $vR;?>" class="img-md"></a>
																			</div>
																		</li>
																	<?php }?>
																</ul>
															</div>
														<?php }?>
														<i class="fa fa-clock-o"></i>
														<time class="timeago meta" datetime="<?php echo $valChild['created'];?>"></time>
													</div>
												</div>
											</li>
										<?php }?>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
				</li>
			<?php }?>
		</ul>
		<div class="loadmore-cmt"><a href="" title="" class="btn-loadmore" data-module="<?php echo $module;?>" data-detailid="<?php echo $detailid;?>" data-start="1" data-limit="5" data-total="<?php echo $totalComment ?>" data-permissionComment="<?php echo $this->permissionComment; ?>">Xem thêm</a></div>
	<?php }else{?>
		<span>Chưa có bình luận</span>
	<?php }?>
</div>