<?include('./templates/layout/page-top.php')?>

<?

$panels = array(); 
	
if($exists):	

	$fields = array(
		array('id'       ,'Id'),
		array('pricec'   ,'Price'),
		array('telephone','Telephone'),
		array('weblink'  ,'Webpage'),
		array('postedon' ,'Posted on'),
		array('expiry'   ,'Expires on')
	);

	$row = array();

	foreach($fields as $field):
		if($ad[$field[0]]!='') $row[] = array('title'=>$field[1],'value'=>$ad[$field[0]]);
	endforeach;

endif;
?>

<div id="middle">

	<?if($exists):?>

		<div id='ad-view'>
			<p>
				<?if($ad['sub_region']==''):?><a href="ad-list.php?<?=build_query_string(array('region'=>$ad['main_region_slug'],'id'=>-1))?>"><?=$ad['main_region']?></a> &gt; <?endif?>
				<?if($ad['sub_region']!=''):print '<a href="ad-list.php?region=' . build_query_string(array('region'=>$ad['sub_region_slug'],'id'=>-1)) . '">' . substr($ad['sub_region'],0,50) . '</a> &gt; ';endif?>
				<a href="ad-list.php?<?=build_query_string(array('category'=>$ad['main_category_slug'],'id'=>-1))?>"><?=$ad['main_category']?></a>
				<?if($ad['sub_category']!=''):print ' &gt <a href="ad-list.php?' . build_query_string(array('category'=>$ad['sub_category_slug'],'id'=>-1)) . '">' . substr($ad['sub_category'],0,50) . '</a>';endif?>
			</p>
			
			<h3><?=$ad['title']?></h3>
				
			<div class='ad-data'>
				
				<div class='current-picture'>

					<a href="<?=$ad['picture']?>">
						<img src="<?=$ad['thumb']?>" />
						<p>(click on image for original size)</p>
					</a>

				</div>

				<div class='description'>
					
					<?=nl2br($ad['description'])?>
					
				</div>
							
			</div>
			
			<div class='ad-data'>
				
				<div class="fleft">

					<table>	
						<?foreach ($row as $r):?>
						<tr>
							<td><?=$r['title']?></td>
							<td><?=$r['value']?></td>
						</tr>
						<?endforeach?>
						<tr>
							<td>Posted by</td>
							<td>
								<?php 
									if($ad['user_id']>0)echo"<a href='user-view.php?id=" . $ad['user_id'] . "'>" . $ad['name'] . "</a>";
									else echo $ad['name'];
								?>
							</td>
						</tr>
					</table>
			
				</div>
				
				<?$qry = build_query_string(array('id'=>$ad['id']))?>	
				<div class="usertools">	
					<a href="ad-print.php?<?=$qry?>">Print</a>
					<a href="ad-sending.php?<?=$qry?>">Send by Email</a>
					<a href="ad-respond.php?<?=$qry?>">Respond</a>
					<a href="ad-review.php?<?=$qry?>">Review</a>
					
					<?if(! $is_favourite):?>
						<a href="user-favourites.php?<?=$qry?>">Add to favourites</a>
					<?else:?>
						<a href="user-favourites.php?remove=1&amp;<?=$qry?>">Remove from favourites</a>		
					<?endif?>

					<p>
						<a href="ad-report.php?<?=$qry?>">Report abuse</a>
										
						<?if(User::is_logged_in() && (User::get_email()==$ad['email'] || User::get_id()==1)): 
							$qry = build_query_string(array('id'=>$ad['id'],'code'=>$ad['code']));
						?>
							<a href="ad-modification.php?<?=$qry?>">Modify</a>
							<a href="ad-extension.php?<?=$qry?>">Extend</a>
							<a onclick="return confirm('Are you sure you want to remove?')" href="ad-removal.php?<?=$qry?>">Remove</a>				
							<?if(User::get_id()==1):?> 
								<a onclick="return confirm('Are you sure you want to ban this user?')" href="user-ban.php?id=<?=$ad['user_id']?>">Ban user</a>				
							<?endif?>	
						<?endif?>	
					</p>				
				</div>
							
			</div><!-- end of ad-data -->
						
		</div><!-- end of ad-view -->
		
		<br class="clear" />

		<?php include('./templates/parts/reviews.php') ?>
						
	<?else:
			
		$panels = array(array(
			'legend' => 'Error',
			'body'   => "<ul class='errors'>The requested Ad is inactive or not exist.</ul>",
		) );
		
		include('./templates/parts/panels.php');
		
	endif?>
		
	<br />

</div>

<?include ('./templates/layout/page-right.php')?>

<?include ('./templates/layout/page-footer.php')?>
