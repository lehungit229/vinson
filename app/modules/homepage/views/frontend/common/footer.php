<?php $this->load->view('homepage/frontend/common/partner'); ?>

<footer class="footer">
   <div class="uk-container uk-container-center">
   		<div class="footer-upper">
   			<div class="uk-grid uk-grid-medium">
   				<div class="uk-width-large-1-2">
   					<div class="ft-information">
   						<div class="ft-heading">Thông tin liên hệ</div>
   						<p class="ft-company"><?php echo $this->general['homepage_company'] ?></p>
   						<p><strong>Địa chỉ</strong>: <?php echo $this->general['contact_address'] ?></p>
   						<p><strong>Hotline</strong>: <?php echo $this->general['contact_hotline'] ?></p>
   						<p><strong>Email</strong>: <?php echo $this->general['contact_email'] ?></p>
   						<p><strong>Web</strong>: <?php echo $this->general['contact_website'] ?></p>
   					</div>
   				</div>
   				<div class="uk-width-large-1-2">
   					<div class="ft-map">
   						<div class="ft-heading">Fanpage Facebook</div>
   						<div class="fb-page" data-href="<?php echo $this->general['social_facebook']; ?>" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
	<div class="ft-copyright">
		<div class="uk-container uk-container-center">
			Copyright 2019 - Degisn By <a target="_blank" href="http://webchuanseoht.com/">HT Website Việt Nam</a>
		</div>
	</div>
</footer>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=103609027035330&autoLogAppEvents=1"></script>
