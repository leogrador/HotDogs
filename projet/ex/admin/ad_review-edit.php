<?php 
/**
 * Classified-ads-script
 * 
 * Admin area
 * 
 * @copyright  Copyright (c) Szilard Szabo
 * @license    GPL v3
 * @package    Admin
 */

include("./include/common.php");

$current_group_page['name'] = 'AdReview';
$current_sub_page['name']   = 'Edit';

$g_id   = isset( $_REQUEST['id'] ) ? (int) $_REQUEST['id'] : 0;

if ( ! User::is_logged_in() || User::get_id() != 1) {
	header( 'Location: index.php' );
	exit();
}

$adreview = AdReview::get_one( $g_id );

$exists = isset( $adreview['id'] );

if( $g_id > 0 && ! $exists ) {
	$success = false;
	$errors = array( $current_group_page['name'] . " not exist." );	
}

if( $exists ) {
	
	$p_ad_id   = $adreview['ad_id'];
	$p_user_id = $adreview['user_id'];
	$p_rate    = $adreview['rate'];
	$p_comment = $adreview['comment'];

	$current_sub_page['name'] .= " ( id: $g_id )"; 
}

if( isset( $_POST['reset'] ) ) unset( $_POST );

if( $exists && isset( $_POST['adreview_edit'] ) ) {	

	$p_rate = (int) $_POST['rate'];
	$p_comment = trim( strip_tags( $_POST['comment'] ) );
		
    $success = true;
    $errors = array();

	if( $p_rate < 1 || $p_rate > 5 ) {
		$success = false;
		array_push( $errors, "Please provide a valid rate." );
	}
			
	if( $p_comment == '' ) {
		$success = false;
		array_push( $errors, "The comment field is required!" );
	} 
	   
	if( $p_comment != '' && ! preg_match( '/^[\s\S]{0,500}$/u', $p_comment ) ) {
		$success = false;
		array_push( $errors, "The comment must be no more than 500 character long." );
	}
		   
    if ($success) {
						
		$update = array( 'rate' => $p_rate, 'comment' => $p_comment );
		
		AdReview::update( $g_id, $update);

		$adreview = AdReview::get_one( $g_id );
    }
}

include ("page-header.php"); 

?>

<div id="wrapper">

	<?php include( "page-left.php" ); ?>

	<div id="content">
			
		<form name="form_adreview_edit" id="form_adreview_edit" method="post" enctype='application/x-www-form-urlencoded' accept-charset="UTF-8" class="form">

			<h2><?php print 'Edit ' . $current_group_page['name'] . ($exists ? "<span class='note'>( id: $g_id )</span>" : ''); ?></h2>

			<br />

			<?php
			if (isset($success)) {
				if (!$success) {
					print "<ul class='errors'>";
					foreach ($errors as $err) print "<li>$err</li>";
					print "</ul>";
				} else print "<p class='success'>Ad review modified succesfuly.</p>";;
			}
			?>			

			<?php if( ! $exists ) { ?>

				<label for='id' class="required">Id</label>
				<input name='id' id='id' type='text' value='<?php if( isset( $g_id ) && $g_id > 0 ) print $g_id; ?>' />
				<br />

				<label for="adreview_get"></label>
				<input type="submit" name="adreview_get" value="Edit"/>
							
			<?php } else { ?>

				<input name='id' type='hidden' value='<?php if( isset( $g_id ) && $g_id > 0 ) print $g_id; ?>' />
							
				<label for='ad_id'>Ad id</label>
				<a href='ad-edit.php?id=<?=$adreview['ad_id']?>'><?=$adreview['ad_id']?></a>
				<br />
							
				<label for='user_id'>User id</label>
				<a href='user-edit.php?id=<?=$adreview['user_id']?>'><?=$adreview['user_id']?></a>
				<br />
							
				<label for='user_id'>User id</label>
				<a href='user-edit.php?id=<?=$adreview['user_id']?>'><?=$adreview['user_id']?></a>
				<br />

				<label for='rate' class="required">Rate</label>
				<input name='rate' type='radio' value="1" <?if($adreview['rate']==1) print "checked='checked'"?> />1
				<input name='rate' type='radio' value="2" <?if($adreview['rate']==2) print "checked='checked'"?> />2
				<input name='rate' type='radio' value="3" <?if($adreview['rate']==3) print "checked='checked'"?> />3
				<input name='rate' type='radio' value="4" <?if($adreview['rate']==4) print "checked='checked'"?> />4
				<input name='rate' type='radio' value="5" <?if($adreview['rate']==5) print "checked='checked'"?> />5
				<br />
													
				<label for='comment' class="required">Message</label>
				<textarea rows="20" cols="56" name='comment'><?php print $p_comment; ?></textarea>
				<br />
				<br />
				
				<label for='adreview_edit'></label>
				<input type='submit' name='adreview_edit' value='Modify'/>
				<span><input type="submit" name="reset" value="Reset" onclick="return confirm('Do you really want to reset the form?')" /></span>

			<?php } ?>
			
		</form>

	</div>

</div>

<?php include ("page-footer.php"); ?>
