<?include('./templates/layout/page-top.php')?>

<?
if($ad_exists):	
	if(isset($_POST['extension'])):		
		if($success):
			$panels = array(array(
				'legend'=>'Information',
				'body'  =>"<p class='success'>Your ad's expiry has been succesfuly extended.</p>"
			));			
		else:
			$body = "<ul class='errors'>";
			foreach($errors as $err) $body .= "<li>$err</li>";
			$body .= "</ul>";
			
			$panels = array(array(
				'legend'=>'Please correct the following errors',
				'body'=>$body
			));		
		endif;
	endif;
else:
	$panels = array(array(
		'legend'=>'Error',
		'body'=>"<ul class='errors'>The requested Ad is not exist or inactive.</ul>"
	));
endif;

$expiries = Expiry::get_all(); 
?>

<div id="middle">
	
	<?include('./templates/parts/panels.php')?>
	
	<?if($ad_exists)include('./templates/forms/ad-extension-form.php')?>

	<br />

</div>

<?include('./templates/layout/page-right.php')?>

<?include('./templates/layout/page-footer.php')?>
