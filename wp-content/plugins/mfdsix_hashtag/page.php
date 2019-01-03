<?php 
global $wpdb;


$vote_title = '';
$vote_description = '';

$vote = $wpdb->get_results("SELECT * FROM idn_votes ORDER BY id_vote DESC LIMIT 1");

if(!empty($_POST))
{
	if(!empty($_FILES))
	{
		if(isset($_FILES['foto'])){
			$errors= array();
			$file_name = date('H_YmdHis');
			$file_size =$_FILES['foto']['size'];
			$file_tmp =$_FILES['foto']['tmp_name'];
			$file_type=$_FILES['foto']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['foto']['name'])));

			move_uploaded_file($file_tmp,  $_SERVER['DOCUMENT_ROOT']."/idn/wp-content/uploads/hashtag/".$file_name.".".$file_ext);
		}
		$vote_img = $file_name.".".$file_ext;
	}
	$vote_title = $_POST['vote_title'];
	$vote_description = $_POST['vote_description'];

	$wpdb->insert('idn_votes', array('vote_title'=>$vote_title, 'vote_description'=>$vote_description, 'vote_image'=>$vote_img));
}

if(!empty($vote))
{
	$vote_title = $vote[0]->vote_title;
	$vote_description = $vote[0]->vote_description;
}


?>

<form class="wrap" method="post" enctype="multipart/form-data">
	<h1>Mfdsix Hashtag</h1>
	<hr>
	<h3>The Current Hashtag</h3>

	<div style="background: #fff; border: 2px solid red; padding: 20px">
		<div style="color: red; font-size: 20px; font-weight: bold;"><?php echo ($vote_title != '') ? $vote_title : 'Nothing Yet' ?></div>
		<br>
		<div style=""><?php echo ($vote_description != '') ?  $vote_description : 'Empty' ?></div>
	</div>

	<br>
	<h3>Input New</h3>
	<div id="titlediv">
		<div id="titlewrap">
			<label>The Title</label>
			<input type="text" name="vote_title" size="30" id="title" spellcheck="true" autocomplete="off">
		</div>
		<div id="titlewrap">
			<label>The Description</label>
			<textarea name="vote_description" required="" style="width: 100%; height: 200px"></textarea>
		</div>
		<div id="titlewrap">
			<label>The Thumbnail</label>
			<br>
			<input type="file" name="foto" required="">
		</div>
		<br>
		<div id="publishing-action">
			<span class="spinner"></span>
			<input name="original_publish" type="hidden" id="original_publish" value="Publish">
			<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish">
		</div>
	</div>
</form>