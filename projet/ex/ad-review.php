<?php 
/**
 * Classified-ads-script
 * 
 * @copyright  Copyright (c) Szilard Szabo
 * @license    GPL v3
 * @package    Frontend
 */

include( "./admin/include/common.php" );

$r_id = isset( $_REQUEST['id']) ? (int) $_REQUEST['id'] : 0; 

$exists = Ad::exists( $r_id, array( "active" => 1 ) );

if( $exists ) {
	
	$ad = Ad::get_one( $r_id );

	if ( isset( $_POST['send'] ) && User::is_logged_in() ) {

		$success = true;
		$errors  = array();

		$p_rate	   = isset( $_POST['rate'] ) ? (int) $_POST['rate'] : 0;
		$p_comment = strip_tags( $_POST['comment'] );

		if( AdReview::exists( $r_id, User::get_id() ) ) {
			$success = false;
			array_push( $errors, "You have already reviewed this ad." );			
		
		} else {
			
			if( $p_rate < 1 || $p_rate > 5 ) {
				$success = false;
				array_push( $errors, "Please provide a valid rate." );
			}
			   
			if( $p_comment != '' && ! preg_match( '/^[\s\S]{0,200}$/u', $p_comment ) ) {
				$success = false;
				array_push( $errors, "The comment must be no more than 200 character long." );
			}
			
			if( $success ) {

				AdReview::create( array( 'ad_id' => $r_id, 'user_id' => User::get_id(), 'rate' => $p_rate, 'comment' => $p_comment ) );
			}
		}
	}
}

include ("./templates/ad-review.php");

?>
