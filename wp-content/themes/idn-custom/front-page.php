
<?php get_header(); ?>


<?php 

$vote = $wpdb->get_results("SELECT * FROM idn_votes ORDER BY id_vote DESC LIMIT 1");

?>

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

	<div class="idn-head">
		<span class="idn-httl">TRENDING</span>
	</div>
	<br>

	<div class="owl-carousel owl-theme" id="owl-carousel2">
		<?php if (have_posts()): ?>
			<?php $count = 0; ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php if ($count < 10): ?>
					<div class="item">
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
	<br>

	<div class="idn-head">
		<span class="idn-httl"><?php echo $vote[0]->vote_title ?></span>
	</div>
	<br>

	<div class="hashtag">
		<div class="photo">
			<img src="<?php echo bloginfo('url').'/wp-content/uploads/hashtag/'.$vote[0]->vote_image ?>">
		</div>
		<div class="text">
			<div class="desc"><?php echo $vote[0]->vote_description ?></div>
			<div class="link">
				<a href="" >Tulis Pertanyaan Disini ....</a>
			</div>
		</div>

	</div>
	<br>
	<?php 
	$quests = $wpdb->get_results("SELECT * FROM idn_questions ORDER BY id_question DESC LIMIT 7");
	?>
	<div class="owl-carousel owl-theme" id="owl-carouselhash">
		<?php 
		foreach ($quests as $k => $v) :
			?>

			<div class="sing-quest" style="border-radius: 10px; padding: 10px 20px;background: #fff; border: 1px solid #ddd; width: 80%;">
				<div class="head" style="background: #fff; padding: 10px 0; display: flex; align-items: center;">
					<span class="dashicons dashicons-before dashicons-admin-users" style="background: #ddd; border-radius: 50% ; padding: 10px"></span> 
					<b> &nbsp;&nbsp;<?php echo get_user_by('ID', $v->id_user2) ?></b>
				</div>
				<div class="content" style="background: <?php echo $v->quest_back ?>; color: #fff; padding: 30px 20px; font-size: 18px; max-height: 150px; overflow-y: scroll; border-radius: 10px">
					<?php echo $v->quest_content ?>
				</div>
				<br>
				<?php 
						$user = wp_get_current_user();
						$sql = "SELECT * FROM idn_voters WHERE id_user = " .$user->ID. " AND id_quest = " . $v->id_question;
						$have = $wpdb->get_results($sql);
						?>
						<?php if (count($have) > 0): ?>
						<div style="width: 100%; box-sizing: border-box;background: green; padding: 10px; text-align: center;" vote="<?php echo $v->id_question ?>" id="vwrap<?php echo $v->id_question ?>">
							<a vote="<?php echo $v->id_question ?>" style="color: #fff">Sudah di vote</a>
						</div>
							<?php else: ?>
				<div style="width: 100%; box-sizing: border-box;background: #eaeaea; padding: 10px; text-align: center;" vote="<?php echo $v->id_question ?>" id="vwrap<?php echo $v->id_question ?>">
					<a onclick="voteThis(this)" vote="<?php echo $v->id_question ?>" style="color: #333">Vote Pertanyaan Ini</a>
				</div>
			<?php endif; ?>
				<div style="padding: 10px; font-weight: bold;"><span id="votes<?php echo $v->id_question ?>"><?php echo $v->quest_votes ?></span> votes</div>
			</div>

			<?php 
		endforeach;
		?>
		<div style="height: 280px; border: 1px solid #ddd; border-radius: 10px; display: flex; align-items: center;justify-content: center; text-align: center;">
			<a href="<?php echo bloginfo('url')."/questions" ?>">Lihat Semua <br>
				<b style="font-size: 60px; margin-left: -40px" class="dashicons dashicons-arrow-right"></b>
			</a>
		</div>
	</div>


	<br>

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
			<a href="" class="idn-more">I NEED MORE !</a>
			<br>
			<?php 
			$cats = get_categories(); 
			foreach ($cats as $cat) {
				$cat_id= $cat->term_id;
				?>
				<div class="idn-head">
					<span class="idn-httl"><?php echo $cat->name ?></span>
				</div>
				<br>
				<?php 
				query_posts("cat=$cat_id&posts_per_page=100");
				$count = 0;
				if (have_posts()) : while (have_posts()) : the_post(); ?>
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
					<?php 
				endwhile; 
			endif
			;?>
		<?php };?>

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


<script type="text/javascript">
	function voteThis(me)
	{
		<?php if (is_user_logged_in()) : ?>
		$.ajax({
			url : '<?php echo bloginfo("url")."/votes" ?>',
			method : 'POST',
			data : { vote : me.getAttribute('vote') },
			success : function(data)
			{
				$("#votes"+me.getAttribute('vote')).html(data);
			}
		});
		$("div[vote='"+me.getAttribute('vote')+"']").css('background', "green");
		$("a[vote='"+me.getAttribute('vote')+"']").css('color', "#fff");
		$("a[vote='"+me.getAttribute('vote')+"']").html('Sudah di vote');
		$("a[vote='"+me.getAttribute('vote')+"']").removeAttr('onclick');
		<?php else: ?>
			window.location.href = '<?php echo bloginfo("url") ?>'+"/login";
	<?php endif; ?>
	}
</script>

<?php get_footer(); ?>