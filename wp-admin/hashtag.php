<?php
/**
 * Dashboard Administration Screen
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

/** Load WordPress dashboard API */
require_once(ABSPATH . 'wp-admin/includes/dashboard.php');

wp_dashboard_setup();

wp_enqueue_script( 'dashboard' );

if ( current_user_can( 'install_plugins' ) ) {
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
}
if ( current_user_can( 'upload_files' ) )
	wp_enqueue_script( 'media-upload' );
add_thickbox();

if ( wp_is_mobile() )
	wp_enqueue_script( 'jquery-touch-punch' );

$title = __('Mfdsix Hashtag');
$parent_file = 'hashtag.php';


include( ABSPATH . 'wp-admin/admin-header.php' );

$user = wp_get_current_user();

$vote = $wpdb->get_results("SELECT * FROM idn_votes ORDER BY id_vote DESC LIMIT 1");
$questions = $wpdb->get_results("SELECT * FROM idn_questions ORDER BY id_question DESC");
if(!empty($vote))
{
	$vote_title = $vote[0]->vote_title;
	$vote_description = $vote[0]->vote_description;
}
if(!empty($_POST))
{


	$vote_id = $vote[0]->id_vote;
	$user_id = $user->ID;

	$wpdb->insert('idn_questions', array('id_vote'=>$vote_id, 'id_user'=>$user_id, 'quest_date'=>date('Y-m-d H:i:s'), 'quest_content'=>$_POST['quest_content'], 'quest_back'=>$_POST['quest_back'], 'quest_votes'=>0));
	print_r($wpdb->show_errors());
}
?>

<form class="wrap" method="post">
	<h1><?php echo esc_html( $title ); ?></h1>
	<hr>
	<br>
	<div style="background: #fff; border: 2px solid red; padding: 20px">
		<div style="color: red; font-size: 20px; font-weight: bold;">
			<?php echo ($vote_title != '') ? $vote_title : 'Nothing Yet' ?>
		</div>
		<br>
		<div style="">
			<?php echo ($vote_description != '') ?  $vote_description : 'Empty' ?>
		</div>
	</div>
	<br>
	<div id="titlewrap">
		<textarea name="quest_content" id="quest_content" style="resize: none; width: 100%; height: 300px; background: #ec6363; color: #fff; padding: 20px; font-size: 18px">Tulis Pertanyaan Disini ...</textarea>
	</div>
	<br>
	<div id="publishing-action">
		<span class="spinner"></span>
		<input name="original_publish" type="hidden" id="original_publish" value="Publish">
		<div class="button button-large button-success" onclick="makeRed()" style="background: #ec6363"> </div>
		<div class="button button-large button-success" onclick="makeBlue()" style="background: #63b1ec"> </div>
		<div class="button button-large button-success" onclick="makeGreen()" style="background: #55bb8b"> </div>
		<div class="button button-large button-success" onclick="makeYellow()" style="background: #deb14a"> </div>
		<input type="hidden" name="quest_back" value="#ec6363" id="quest_back">
		<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish">
	</div>
	<br>

	<form><!-- wrap -->
		<br>
		<hr>
		<div class="wrap">
			<h3>My Questions</h3>
			<div style="display: flex;justify-content: space-between; flex-wrap: wrap;">
				<?php 
				if(!empty($questions))
				{
					foreach ($questions as $k => $v) {
						?>

						<div class="sing-quest" style="width: 32%; border-radius: 10px;box-sizing: border-box;margin-bottom: 20px; padding: 10px 20px;background: #fff; border: 1px solid #ddd">
							<div class="head" style="background: #fff; padding: 10px 0; display: flex; align-items: center;">
								<span class="dashicons dashicons-before dashicons-admin-users" style="background: #ddd; border-radius: 50% ; padding: 10px"></span> 
								<b> &nbsp;&nbsp;<?php echo $user->data->user_login ?></b>
							</div>
							<div class="content" style="background: <?php echo $v->quest_back ?>; color: #fff; padding: 30px 20px; font-size: 18px; border-radius: 10px">
								<?php echo $v->quest_content ?>
							</div>
							<div style="padding: 10px; font-weight: bold;"><?php echo $v->quest_votes ?> votes</div>
						</div>

						<?php 
					}
				}
				?>
			</div>
		</div>

		<script type="text/javascript">
			function makeRed()
			{
				document.getElementById('quest_content').style.background = "#ec6363";
				document.getElementById('quest_back').value = "#ec6363";
			}
			function makeBlue()
			{
				document.getElementById('quest_content').style.background = "#63b1ec";
				document.getElementById('quest_back').value = "#63b1ec";
			}
			function makeGreen()
			{
				document.getElementById('quest_content').style.background = "#55bb8b";
				document.getElementById('quest_back').value = "#55bb8b";
			}
			function makeYellow()
			{
				document.getElementById('quest_content').style.background = "#deb14a";
				document.getElementById('quest_back').value = "#deb14a";
			}
		</script>

		<?php
		wp_print_community_events_templates();

		require( ABSPATH . 'wp-admin/admin-footer.php' );
