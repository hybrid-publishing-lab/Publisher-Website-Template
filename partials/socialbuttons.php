<div class="social-buttons">
	<div class="fb-button">
		<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>/&title=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800');return false;" target="_blank" title="Share on Facebook">
			<img src="<?php echo get_bloginfo('template_directory')."/images/icons/fb_big.png";?>" width="125" height="50" alt="share on facebook" class="social-icon" />
		</a>
	</div>
	<div class="twitter-button">
		<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank">
			<img src="<?php echo get_bloginfo('template_directory')."/images/icons/tweet_big.png";?>" width="124" height="50" alt="tweet on twitter" class="social-icon" />
		</a>
	</div>
</div>