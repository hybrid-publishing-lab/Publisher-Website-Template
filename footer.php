		</div> <!-- end #container -->
		<div style="clear:both;"></div>
		<div class="conainer-fluid footer-background navbar-bottom">
			<div class="footerContainer">
				<footer role="contentinfo">
						
						<nav class="clearfix">
							<div class="outerCenter">
							<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
							</div>
						</nav>
					
					<!--</div>  end #inner-footer -->
					
				</footer> <!-- end footer -->
			</div>	
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
		</div>

	</body>

</html>