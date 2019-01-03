<?php get_header(); ?>

<?php if (is_page() || is_single()): ?>
<div class="idn-wrap">
	<div class="idn-flex">
		<div class="idn-left">
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="idn-single">
						<div class="bread">
							<div class="cat">
								<?php $category = get_the_category(); 
								echo "<a href='".get_category_link($category[0]->term_id)."'>".$category[0]->cat_name."</a>";
								?> > <span>AOPO</span>
							</div>
							<div class="tgl">
								<?php the_time('d F Y') ?>
							</div>
						</div>
						<div class="ttl"><?php the_title() ?></div>
						<br>
						<div class="idn-content">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} 
							?>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif ?>
		</div>
		<div class="idn-right">
			<br>
			<br>
			<br>
			<div class="idn-head">
				<span class="idn-httl" style="font-size: 22px;">TRENDING</span>
			</div>
			<br>
			<ul class="idn-mlist">
				<?php
				$args = array( 'numberposts' => '5', 'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => 'post-format-aside',
						'operator' => 'NOT IN'
					), 
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => 'post-format-image',
						'operator' => 'NOT IN'
					)
				) );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   ( __($recent["post_title"])).'</a> </li> ';
				}
				wp_reset_query();
				?>
			</ul>
			<ul class="idn-menu2">
				<li>
					<a href="">ABOUT US</a>
				</li>
				<li>
					<a href="">CAREER</a>
				</li>
				<li>
					<a href="">PRIVACY & POLICY</a>
				</li>
				<li>
					<a href="">PEDOMAN MEDIA SIBER</a>
				</li>
				<li>
					<a href="">CONTACT US</a>
				</li>
				<div class="idn-credit">
					<div class="soc">
						FOLLOW US : F G Y T
					</div>
					<br>
					<hr>
					<br>
					<div class="text">
						© 2018 IDN Media | All Rights Reserved
						"The Voice of Millennials and Gen Z"
						#DIVERSITYISBEAUTIFUL
					</div>
				</div>
			</ul>
		</div>
	</div>
	<?php elseif(is_category()): ?>
		<div class="idn-wrap">
			<div class="idn-flex">
				<div class="idn-left">
					<div class="bread">
						<div class="cat">
							Showing posts in <b><?php single_cat_title() ?></b> category
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="idn-car">
			<div class="owl-carousel" id="owl-carousel1">
				<?php if (have_posts()): ?>
					<?php $count = 0; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if ($count < 5): ?>
							<div data-hash="car-<?php echo $count ?>">
								<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} 
								?>
								<div class="idn-content">
									<div class="idn-tgl"><?php the_time('d F Y') ?> | 
										<?php $category = get_the_category(); 
										echo $category[0]->cat_name;
										?>
									</div>
									<a class="idn-ttl" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php endif ?>
						<?php $count++; ?>
					<?php endwhile; ?>
				<?php endif ?>
			</div>
			<div class="owl-carousel2">
				<?php if (have_posts()): ?>
					<?php $count = 0; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if ($count < 5): ?>
							<a href="#car-<?php echo $count ?>">
								<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} 
								?>
								<div class="idn-content">
									<div class="idn-ttl"><?php the_title(); ?></div>
								</div>
							</a>
						<?php endif ?>
						<?php $count++; ?>
					<?php endwhile; ?>
				<?php endif ?>
			</div>
		</div>
		<br>

		<div class="idn-wrap">

			<div class="idn-flex">
				<div class="idn-left">
					<div class="idn-head">
						<span class="idn-httl">THE LATEST</span>
					</div>
					<br>

					<?php if (have_posts()): ?>
						<?php $count = 0; ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php if ($count < 10): ?>
								<div class="idn-list <?php echo ($count < 2) ? 'big' : '' ;?>">
									<div class="idn-img">
										<?php 
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} 
										?>
									</div>
									<div class="idn-content">
										<div class="idn-tgl"><?php the_time('d F Y') ?> | 
											<?php $category = get_the_category(); 
											echo $category[0]->cat_name;
											?>
										</div>
										<a class="idn-ttl" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
									</div>
								</div>
							<?php endif ?>
							<?php $count++; ?>
						<?php endwhile; ?>
					<?php endif ?>
					<br>
					<a href="" class="dashicons-before dashicons-loading"></a>
					<br>
				</div>

				<div class="idn-right">
					<ul class="idn-menu2">
						<li>
							<a href="">ABOUT US</a>
						</li>
						<li>
							<a href="">CAREER</a>
						</li>
						<li>
							<a href="">PRIVACY & POLICY</a>
						</li>
						<li>
							<a href="">PEDOMAN MEDIA SIBER</a>
						</li>
						<li>
							<a href="">CONTACT US</a>
						</li>
						<div class="idn-credit">
							<div class="soc">
								FOLLOW US : F G Y T
							</div>
							<br>
							<hr>
							<br>
							<div class="text">
								© 2018 IDN Media | All Rights Reserved
								"The Voice of Millennials and Gen Z"
								#DIVERSITYISBEAUTIFUL
							</div>
						</div>
					</ul>
				</div>

			</div>


		</div>

	<?php endif ?>

	<?php get_footer(); ?>