<?php 

/*
Template Name: Questions Page
*/ 

?>

<?php get_header() ?>

<div class="idn-wrap">
	<div class="idn-flex">
		<div class="idn-left">
			<br>
			<br>
			<br>
			<?php 
			$quests = $wpdb->get_results("SELECT * FROM idn_questions ORDER BY id_question DESC");
			?>
			<div class="quest-wrap" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
				<?php 
				foreach ($quests as $k => $v) :
					?>

					<div class="sing-quest" style="border-radius: 10px; padding: 10px 20px;background: #fff; border: 1px solid #ddd; width: 32%; box-sizing: border-box; margin-bottom: 20px">
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
							<?php endif ?>
							<div style="padding: 10px; font-weight: bold;"><span id="votes<?php echo $v->id_question ?>"><?php echo $v->quest_votes ?></span> votes</div>
						</div>

						<?php 
					endforeach;
					?>
				</div>
				<br>			
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

		<?php get_footer() ?>