	<div id="sidebar">
		<div id="random-posts" class="scroller widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Random Posts</h1>
			<ul class="posts-list-sidebar">
				<div>

				<?php
					$randPosts = new WS_Query(array(
						'orderby' => 'rand'
					));

					while( $randPosts->have_posts() ) : $randPosts->the_post()
				?>
					<li>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
						<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
						<p>Post by <a href="<?php the_author_posts_url() ?>"><?php the_author() ?></a> 07/09/2013</p>
					</li>
				<?php endwhile ?>
				<!--
					<li>
						<a href="#"><img src="images/sidebar_1.jpg" alt="nature layout" /></a>
						<h4><a href="#">PSD sang HTML – NATURE LAYOUT</a></h4>
						<p>Post by <a href="#">Tommy</a> 07/09/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_2.jpg" alt="newbie" /></a>
						<h4><a href="#">Base64 image – Lợi hại ?</a></h4>
						<p>Post by <a href="#">Võ Minh Mẫn</a> 04/06/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_3.jpg" alt="newbie" /></a>
						<h4><a href="#">Biết nhẫn nại và kiên trì</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 22/09/2008</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_4.png" alt="newbie" /></a>
						<h4><a href="#">Co ban HTML - Phan 4</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 25/10/2009</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_5.jpg" alt="newbie" /></a>
						<h4><a href="#">Co ban PHP - Phan 1</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 18/03/2013</p>
					</li>
					<li>
						<a href="#"><img src="images/sidebar_1.jpg" alt="nature layout" /></a>
						<h4><a href="#">PSD sang HTML – NATURE LAYOUT</a></h4>
						<p>Post by <a href="#">Tommy</a> 07/09/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_2.jpg" alt="newbie" /></a>
						<h4><a href="#">Base64 image – Lợi hại ?</a></h4>
						<p>Post by <a href="#">Võ Minh Mẫn</a> 04/06/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_3.jpg" alt="newbie" /></a>
						<h4><a href="#">Biết nhẫn nại và kiên trì</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 22/09/2008</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_4.png" alt="newbie" /></a>
						<h4><a href="#">Co ban HTML - Phan 4</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 25/10/2009</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_5.jpg" alt="newbie" /></a>
						<h4><a href="#">Co ban PHP - Phan 1</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 18/03/2013</p>
					</li>
				-->
				</div>
			</ul>
		</div>

		<div id="recent-posts" class="scroller widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Recent Posts</h1>
			<ul class="posts-list-sidebar">
				<div>
					<li>
						<a href="#"><img src="images/sidebar_1.jpg" alt="nature layout" /></a>
						<h4><a href="#">PSD sang HTML – NATURE LAYOUT</a></h4>
						<p>Post by <a href="#">Tommy</a> 07/09/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_2.jpg" alt="newbie" /></a>
						<h4><a href="#">Base64 image – Lợi hại ?</a></h4>
						<p>Post by <a href="#">Võ Minh Mẫn</a> 04/06/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_3.jpg" alt="newbie" /></a>
						<h4><a href="#">Biết nhẫn nại và kiên trì</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 22/09/2008</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_4.png" alt="newbie" /></a>
						<h4><a href="#">Co ban HTML - Phan 4</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 25/10/2009</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_5.jpg" alt="newbie" /></a>
						<h4><a href="#">Co ban PHP - Phan 1</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 18/03/2013</p>
					</li>

					<li>
						<a href="#"><img src="images/sidebar_1.jpg" alt="nature layout" /></a>
						<h4><a href="#">PSD sang HTML – NATURE LAYOUT</a></h4>
						<p>Post by <a href="#">Tommy</a> 07/09/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_2.jpg" alt="newbie" /></a>
						<h4><a href="#">Base64 image – Lợi hại ?</a></h4>
						<p>Post by <a href="#">Võ Minh Mẫn</a> 04/06/2013</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_3.jpg" alt="newbie" /></a>
						<h4><a href="#">Biết nhẫn nại và kiên trì</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 22/09/2008</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_4.png" alt="newbie" /></a>
						<h4><a href="#">Co ban HTML - Phan 4</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 25/10/2009</p>
					</li>
					
					<li>
						<a href="#"><img src="images/sidebar_5.jpg" alt="newbie" /></a>
						<h4><a href="#">Co ban PHP - Phan 1</a></h4>
						<p>Post by <a href="#">Demon Warlock</a> 18/03/2013</p>
					</li>
				</div>
			</ul>
		</div>

		<div id="recent-comments" class="widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Recent Comments</h1>
			<ul class="posts-list-sidebar">
				<li>
					<a href="#"><img src="images/sidebar_1.jpg" alt="nature layout" /></a>
					<h4>Demon Warlock on <a href="#">PSD sang HTML – NATURE LAYOUT</a></h4>
					<p>Xin chào tất cả các bạn, rất vui được gặp lại các bạn trên izwebz, mình là Tommy. <a href="#">Tommy</a> comments góp ý cũng như ủng hộ [...]</p>
				</li>
				
				<li>
					<a href="#"><img src="images/sidebar_2.jpg" alt="newbie" /></a>
					<h4><a href="#">Tobias Rauscher</a> on <a href="#">Base64 image – Lợi hại ?</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a egestas augue, nec sagittis purus. Etiam vel luctus odio, quis venenatis odio. Praesent quis congue justo. Donec aliquam [...]</p>
				</li>
				
				<li>
					<a href="#"><img src="images/sidebar_3.jpg" alt="newbie" /></a>
					<h4>Consectetur on <a href="#">Biết nhẫn nại và kiên trì</a></h4>
					<p>Mauris erat arcu, molestie ac neque sed, bibendum molestie dolor. Vivamus vehicula, lacus at dictum aliquam, velit est consectetur lacus, at condimentum [...]</p>
				</li>
				
				<li>
					<a href="#"><img src="images/sidebar_4.png" alt="newbie" /></a>
					<h4><a href="#">Quang Tin</a> on <a href="#">Co ban HTML - Phan 4</a></h4>
					<p>Integer et pretium velit. Morbi rutrum augue eu nibh iaculis, eget commodo libero pellentesque. Integer lacinia [...]</p>
				</li>
				
				<li>
					<a href="#"><img src="images/sidebar_5.jpg" alt="newbie" /></a>
					<h4><a href="#">Tommy</a> on <a href="#">Co ban PHP - Phan 1</a></h4>
					<p>Vivamus euismod sed enim nec mollis. Duis sagittis diam ut consequat auctor. Fusce sapien magna, egestas sed ultricies ac, faucibus ac neque. Nullam sed turpis viverra, vulputate [...]</p>
				</li>
			</ul>
		</div>

		<div id="store-sidebar" class="widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Izwebz Store</h1>
			<img src="images/store.jpg" alt="widget image" />
		</div><!--end #store-sidebar-->

		<div id="categories-list" class="widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Categories</h1>
			
			<div>
				<ul>
					<li><a href="#">Modern Fingerpicking</a></li>
					<li><a href="#">All About The Bass</a></li>
					<li><a href="#">Thumbnail Slapping Technique</a></li>
					<li><a href="#">World Of Harmonics</a></li>
					<li><a href="#">Performing Body Percussion</a></li>
				</ul>
			</div>
		</div><!--end #tabs-nav-sidebar-->
		
		<div id="tabs-nav-sidebar" class="widget-sidebar radius-shadow-box">
			<h1 class="widget-title">Tabs Navigation</h1>
			<ul id="tab-buttons">
				<li><a data-tab="random" href="#">Random</a></li>
				<li><a data-tab="popular" href="#">Popular</a></li>
				<li><a data-tab="basic" href="#">Basic</a></li>
			</ul>
			
			<div class="tab-lists">
				<ul>
					<li><a href="#">HTML co ban</a></li>
					<li><a href="#">Tao trang web dau tien</a></li>
					<li><a href="#">PSD - HTML</a></li>
					<li><a href="#">Su dung div</a></li>
					<li><a href="#">CSS selector</a></li>
					<li><a href="#">Wordpress template</a></li>
					<li><a href="#">Tao login form</a></li>
					<li><a href="#">jQuery tabbed navgation</a></li>
					<li><a href="#">Photoshop can ban</a></li>
					<li><a href="#">Loi thuong gap voi IE6</a></li>
				</ul>
			</div>

			<div class="tab-lists">
				<ul>
					<li><a href="#">HTML co ban</a></li>
					<li><a href="#">Tao trang web dau tien</a></li>
					<li><a href="#">PSD - HTML</a></li>
					<li><a href="#">Su dung div</a></li>
					<li><a href="#">CSS selector</a></li>
					<li><a href="#">Wordpress template</a></li>
					<li><a href="#">Tao login form</a></li>
					<li><a href="#">jQuery tabbed navgation</a></li>
					<li><a href="#">Photoshop can ban</a></li>
					<li><a href="#">Loi thuong gap voi IE6</a></li>
				</ul>
			</div>

			<div class="tab-lists">
				<ul>
					<li><a href="#">HTML co ban</a></li>
					<li><a href="#">Tao trang web dau tien</a></li>
					<li><a href="#">PSD - HTML</a></li>
					<li><a href="#">Su dung div</a></li>
					<li><a href="#">CSS selector</a></li>
					<li><a href="#">Wordpress template</a></li>
					<li><a href="#">Tao login form</a></li>
					<li><a href="#">jQuery tabbed navgation</a></li>
					<li><a href="#">Photoshop can ban</a></li>
					<li><a href="#">Loi thuong gap voi IE6</a></li>
				</ul>
			</div>
		</div><!--end #tabs-nav-sidebar-->
	</div><!--end #sidebar-->