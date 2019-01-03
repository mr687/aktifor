<?php 

/*
Template Name: Votes Page
*/ 

if(isset($_POST) && !empty($_POST))
{
	global $wpdb;
	$id = $_POST['vote'];
	$vote = $wpdb->get_results("SELECT * FROM idn_questions WHERE id_question = '$id' ")[0];

	$votes = (int)$vote->quest_votes +1;

	$user = wp_get_current_user()->ID;

	$wpdb->update('idn_questions', array('quest_votes'=>$votes), array('id_question'=>$id));
	$wpdb->insert('idn_voters', array('id_user'=> $user, 'id_quest'=>$id));

	echo $votes;
}

?>