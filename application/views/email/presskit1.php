<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Email Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body >
<table width="100%" style="font-family: Arial, 'Trebuchet MS', Verdana, sans-serif;">
<tr>
<td>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="670px" style="border-collapse: collapse;background-color:#F0F0F0;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:0 5px;" >
<tr>
<td>

	<table width="670px">
		<tr>
			<td height="10"></td>
		</tr>
	</table>

<!--
	<table width="670px" bgcolor="#0F95DD">
		<tr>
			<td align="center" style="color:#FFF;font-size:30px;font-weight:bolder">
				ELECTRONIC PRESS KIT
			</td>
		</tr>
	</table>
-->

	<table width="709px" bgcolor="#000">
		<tr>
			<td width="670px">
			 	<a href="<?php echo base_url()?>">
	                <img src="<?php echo base_url()?>assets/logos/logo-07.png" style="width:250px">
	            </a>
				
			</td>
			<td></td>
		</tr>
	</table>

	<table width="709" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">INFOMATION</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
		<tr>
			<td  width="180"> 
				
				<?php if ($photo != 'notfound') { ?>
                   <img width="150" height="150" style="border:4px solid black;" src="<?php echo base_url(); ?>uploads/<?php echo $photo['user_id']; ?>/photo/<?php echo $photo['filename']; ?>" />    
                <?php } else {     ?>
                    <img width="150" height="150" style="border:4px solid black;" src="<?php echo base_url(); ?>assets/images/default-img.gif"/>
                <?php }  ?>
			</td>
			<td  width="400">
				<p><b>Name :</b> <?php echo $res_data_artist['artist_name']?></p>
				<p><b>From :</b> <?php echo $res_data_artist['city']?> </p>
				<p><b>Genre :</b> <?php echo $genre['name'];?></p>
				
			</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		<?php 
	        if ($data_json->stats == 'on') {
        ?>
		<tr>
			<td style="font-size:16px;padding-left:10px;color:#10ABE4;">Age Breakdown</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td width="350">
							<table>
								<tr>
									<td width="50">13-17</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;width: <?php if($this->Member_model->stast_fan($fans, 13, 17) != '0.0'){ echo $this->Member_model->stast_fan($fans, 13, 17); }else{ echo 100; } ?>%">
									</td>
								</tr>
								<tr>
									<td width="50">18-24</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;width: <?php if($this->Member_model->stast_fan($fans, 18, 24) != '0.0'){ echo $this->Member_model->stast_fan($fans, 18, 24); }else{ echo 100; } ?>%">
									</td>
								</tr>
								<tr>
									<td width="50">25-34</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;width: <?php if($this->Member_model->stast_fan($fans, 25, 34) != '0.0'){ echo $this->Member_model->stast_fan($fans, 25, 34); }else{ echo 100; } ?>%">
									</td>
								</tr>
							</table>
							</td>
							<td width="350">
							<table>
								<tr>
									<td width="50">35-44</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;width:<?php if($this->Member_model->stast_fan($fans, 35, 44) != '0.0'){ echo $this->Member_model->stast_fan($fans, 35, 44); }else{ echo 100; } ?>% ">
									</td>
								</tr>
								<tr>
									<td width="50">45+</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;width: <?php if($this->Member_model->stast_fan($fans, 45, 200) != '0.0'){ echo $this->Member_model->stast_fan($fans, 45, 200); }else{ echo 100; } ?>%">
									</td>
								</tr>					
							</table>
						</td>
					</tr>
					<tr>
						<td height="20"></td>
					</tr>
					<tr align="center">
						<td colspan="2" style="color: #888889;">*Fan demographics represent 99Sound fans only</td>
						
					</tr>
					<?php } ?>
					<tr>
						<td height="10"></td>
					</tr>
				</table>
				<br/>								
		<!-- <tr>	
			<td width="445">

				<table border="0" style="border-collapse: collapse;" cellpadding="0" cellspacing="0">
					<tr >
						<th width="215">Gender Demographics</th>
						<th width="220">Age Breakdown</th>
					</tr>	
					<tr>
						<td align="center">
							<p>No Data Available</p>	
						</td>
						<td>
							<table>
								<tr>
									<td width="50">13-17</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;">
									</td>
								</tr>
								<tr>
									<td width="50">18-24</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;">
									</td>
								</tr>
								<tr>
									<td width="50">25-34</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;">
									</td>
								</tr>
								<tr>
									<td width="50">35-44</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;">
									</td>
								</tr>
								<tr>
									<td width="50">45+</td>
									<td width="150" style="background: rgba(22, 122, 198, 0.73); height: 17px;margin: 2px 0 0 45px;border-radius: 9px;">
									</td>
								</tr>
							</table>

						</td>
					</tr>	

					<tr align="center">
						<td>0  fans</td>
						<th>Fans Near</th>
					</tr>

					<tr align="center">
						<td></td>
						<td>No Data Available</td>
					</tr> -->

					

	<!--PHOTOS-->
	<?php 
                        if ($data_json->photo == 'on') {
                    ?>
	<table width="709" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">PHOTOS</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
		<?php  
                                if (!empty($photos)) {
                            ?>
                            <?php 
                                    $tdCounter = 1;
                                    $count = count($photos);
                                    // for ($i = 0; $i <= count($photos);++$i) 

                                    foreach ($photos as $key => $value) 
                                    {
                                        if($tdCounter%3==1)
                                        {
                                            echo "<tr>";
                                        }
                                     ?>
                                        <td style="padding: 1mm">
                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $value['user_id']; ?>/photo/<?php echo $value['filename']; ?>" alt="<?php echo $value['caption']; ?>" width="200" height="200" style="border:4px solid black;">
                                        </td>
                                    
                                     <?php
                                        if($tdCounter%3==0 || $tdCounter==$count)
                                        {
                                            echo "</tr>";
                                        }
                                        
                                        $tdCounter++;

                                    }
                                    ?>
		
		<?php 
                            } else { ?>
                            <table width="670">
                                <tr>
                                
                                    <td width="220">No content Avaliable</td>
                                    
                                </tr>
                            </table>
        <?php } ?>                    
		<tr>
			<td height="20"></td>
		</tr>
	</table><br/>
	<?php } ?>
	<!--END PHOTOS-->
	 <?php 
        if ($data_json->stats == 'on') {
            ?>
	<table width="709" border="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">STATS</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		
		<tr>
			<?php if($epk_display_info->song_counts)
                                            { ?> 
			<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px; padding-right:5px; ">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-music fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_songs?></td>
					</tr>

					<tr>
						<td>Songs Counts</td>
					</tr>
					
				</table>
			</td>
			<?php } if($epk_display_info->blog_counts) {?>
			<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px; ">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-rss fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_blogs?></td>
					</tr>

					<tr>
						<td>Blogs Counts</td>
					</tr>
					
				</table>
			</td>
			<?php } if($epk_display_info->video_counts) {?>
			<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px;">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-video-camera fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_video?></td>
					</tr>

					<tr>
						<td>Video Counts</td>
					</tr>
					
				</table>
			</td>
			<?php } ?>
		</tr>
		<tr>
		 <?php  if($epk_display_info->fan_counts) {?>
		<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px; padding-right:5px; ">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-users fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_fans?></td>
					</tr>

					<tr>
						<td>Fans Counts</td>
					</tr>
					
				</table>
			</td>
			<?php } if($epk_display_info->comments_counts) {?>
			<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px; ">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-comments fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_comments?></td>
					</tr>

					<tr>
						<td>Comments Counts</td>
					</tr>
					
				</table>
			</td>
			<?php } if($epk_display_info->show_counts) {?>
			<td width="100" style="background-color:#10ABE4; color:#fff; border-radius:10px;">
				<table align="center">
					<tr>
						<td  align="center"><i class="fa fa-calendar-o fa-2x"></i></td>
					</tr>
					<tr>
						<td  align="center"><?=$num_events?></td>
					</tr>

					<tr>
						<td>Events Counts</td>
					</tr>
					
				</table>
			</td>
			 <?php } ?>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
	</table>
	 <?php } ?>
	<br/>
	<!--end stats-->
	<?php 
        if ($data_json->video == 'on') { ?>
	<table width="709" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">VIDEOS</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
	
    <tr>
        <td align="center" valign="top" style="padding-bottom: 10px; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <?php $i = 1;
                $count=count($videos);
                    foreach ($videos as $row) {
                
                    if($i%3 == 1)
                    {
                        // echo "$i";
                        // echo ($i%3);
                        echo "<tr style='border:1px solid red;'>";
                        // echo "tr";
                    }

                ?>
                <td align="center" valign="top" style="padding-bottom: 0px; padding-left: 0px; padding-right: 10px; padding-top: 0px;">
                        <table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="border-collapse: collapse;">
                                  <a href="#" border="0"><img src="<?php echo $row['imageSrc'];?>" width="180" style="border:4px solid black;"></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #888889; font-size: 14px; font-weight: bold; line-height: 16px;   padding-top: 15px; ">
                                    <?php echo $row['name_video'];?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="three-col-cta" style="font-size: 14px; font-weight: normal; line-height: 16px; padding-bottom: 20px; padding-left: 0px; padding-top: 15px;">
                                    <a href="#" style="color: #1fa2ea; text-decoration: underline;"><a href="<?php echo base_url().'epk/'.$res_data_artist['home_page'];?>" style="color: #1fa2ea; text-decoration: underline;">View Video</a></a>
                                </td>
                            </tr>
                      </table>
                    </td>
                    <?php
                        if(($i%3 == 0) || $i==$count)
                        {
                            echo "</tr>";
                        }
                        
                        $i++;
                    }  ?>
                
          </table>
        </td>
    </tr>
	 	
		<tr>
			<td height="20"></td>
		</tr>
    </table>		
<?php

                    } ?> 
	<br/>
	<table width="670" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">BIO</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td>
				<table width="670px">
					<tr>
						<td width="190"><img src="<?php echo $this->M_user->get_avata($res_data_artist['id'])?>" width="170" height="170" style="border:4px solid black;"></td>
						<td width="480" style="color: #888889;font-weight:normal"><?php echo $epk_bio?>
						</td>
					</tr>
	             </table>
	        </td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>	
	</table><!--END BIOS-->	
	<br/>
	
	<?php  if ($data_json->song == 'on') { ?>
	<table width="670" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">SONG</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td>
				<table width="670px">
		<tr>
			<td width="650">
				<table border="0" style="border-collapse: collapse;line-height:25px;">
					<tr style="background:#345D7E;font-size:16px;line-height:28px;color:#FFF;">
						<th align="left" style="padding-left:10px" width="440">SONG</th>
						<th width="100">PRICE</th>
					</tr>
					<?php 
                        foreach ($songs as $row) {

                    ?>
					<tr align="center" style="background:#EFEFEF;">
						<td align="left" style="padding-left:10px"><a href="<?php echo base_url().'epk/'.$res_data_artist['home_page'];?>">
                                            <?=$row['song_name']?>
                                        </a></td>
						<td  ><?=$row['price']?></td>
					</tr>
					<?php } ?>  
			</table>
			</td>
			
		</tr>
	</table>
	        </td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>	
	</table>
	 <?php } ?>	
	<br/>
	<?php 
                        if ($data_json->press == 'on') {
                    ?>
	<table width="670" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">PRESS</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		 <?php
                                if($press) {
                                foreach ($press as $row) {
                                    ?>
		<tr>
			<td>

				<table width="670px">
					<tr>
						<td style="color: #888889;font-weight:normal"><?php echo $row['name']; ?></td>
						<td style="color: #888889;font-weight:normal">By ~ <?php echo $row['author']?></td>
					</tr>
					<tr>
						<td style="color: #888889;font-weight:normal"><?php echo $row['quote']?></td>
					</tr>
				</table>
	        </td>
		</tr>
		 <?php
                                    } 
                                } ?>
		<tr>
			<td height="20"></td>
		</tr>	
	</table>
	<?php } ?>
	<br/>
		<table width="670" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">BLOG</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td>
				<table width="670px">
				<?php foreach ($epk_blogs as $key => $blog) { 
                            ?>
					<tr>
						<td width="190"><img src="<?php echo base_url('uploads/'.$blog['user_id'].'/photo/blogs/'.$blog['image_rep']) ?>" width="170" height="170" style="border:4px solid black;"></td>
						<td width="480" style="color: #888889;font-weight:normal">
							<p>
						<span><h4><a style="color: #1fa2ea; text-decoration: underline;" href="<?php echo base_url('artist/allblogs').'/'.$blog['user_id'].'/'.$blog['id']?>"><?=$blog['title'] ?></a></h4></span></p>
						<p><?php 
                                                                    $text = strip_tags($blog['content']);
                                                                    $desLength = strlen($text);
                                                                    $stringMaxLength = 250;
                                                                    if ($desLength > $stringMaxLength) {
                                                                        $des = substr($text, 0, $stringMaxLength);
                                                                        $text = $des.'...';
                                                                        echo $text;
                                                                    } else {
                                                                        echo $blog['content'];
                                                                    } ?> </p></td>
					</tr>
					<?php
                                    } ?>
	             </table>
	        </td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>	
	</table>
	<br/>
	<?php if ($data_json->show == 'on') { ?>
	<table width="670" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;color:#10ABE4;">SHOWS</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		
	
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td>
				
				<table width="670px">
					<tr>
						<td>
							<table>
								
								<tr>
									<td>
										<table border="0" style="border-collapse:collapse;line-height:25px">
											<tr style="background:#345D7E;font-size:20px;line-height:30px;color:#FFF;">
												<th width="110">Date</th>
												<th width="350">Event</th>

												<th width="210">Venue</th>
											</tr>
											<?php $i = 0;
			                                 foreach ($events as $event) {
			                                    ?>
			                                    
											<tr style="<?php if($i % 2 == 0) { echo "background-color:#EFEFEF;"; }else{
			                                                            echo "background-color:#559ED5;"; } ?>;padding: 5px;">
												<td><?php echo date('D, d/m/y',strtotime($event['event_start_date']));?></td>
												<td><a href="<?=base_url('gigs_events/read/'.strtolower(str_replace(' ', '-', $event['event_title'])).'-'.$event['event_id'])?>"><?php echo ucfirst($event['event_title']); ?></a></td>
												<td><?php custom_echo_html($event['location'], 400);?></td>
											</tr>
											<?php 
			                                                        $i++;
			                            } ?>
											
										</table>
									</td>
									<td></td>
								</tr>
							</table>

							

						        </td>
							</tr>	
						</table>
		</td>
		</tr>	
	</table>
	<?php } ?>
	<br/>
	<table width="709" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="border-bottom: 6px solid #10ABE4;  box-shadow: 0px 5px 5px grey; padding:0 20px;">
		<tr>
			<td height="10"></td>
		</tr>
		
		<tr>
			<td>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					
						<tr>
							<td style="line-height:16px">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:10px;line-height:1.6;color:#333;font-weight:normal;text-align:center">
								<p style="margin-bottom:0">
									<a href="https://www.facebook.com/99sounds" target="_blank">
									<img alt="Facebook" height="26" src="https://ci4.googleusercontent.com/proxy/PVk28cKWOvOMVX9gp9u-_7_Rr-CNvmG4StZWwky9aKyu8yR_Ze0VYHlgktyk9n9Eq8WGjAPbJ1Y1Eiz3Jp0u58tv5hBcEZmdks0JnYpnvWDH1n7VyC0wtviet60VlgXbv7ZqRDF_xtHpl-ZEFhNbogPIWiuh9zh_r-jogXEvabH0e6BYp3H1VeLqwKMMbYBKUG_18QBtRbq_Vt3MJREQjjoCED16fgeM=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_facebook_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://twitter.com/SoundHouseInc" target="_blank">
									<img alt="Twitter" height="26" src="https://ci4.googleusercontent.com/proxy/WLs2AeRmZ4yZE-St0MLT7pbcWIHDS7ohgyzS2eAqDxotpErx5YQcgADgY3vs6zpr9MAQVrT9NZ-ZmUNcTutMm7SIBlLIgm9rPjDRDKUh7QP2nSKjEDGTi8a_wN7Ffl2B5BrI1Phqnbk2IM_d0jcRKYTo7OK7csOacLsRZi7iYsrXycKH3oqtK_A2iVpo7S_in-RvFukgbK6bzx0NihjbV8kHSiqaXbU=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_twitter_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://plus.google.com/104993070863948605840" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="gPlus" height="26" src="https://ci3.googleusercontent.com/proxy/QCwjjZ6gyUQlsTWOkQHCywnixjsVrQ3hTiNlAl1xTAYkV-NZBjhhhN3_sipcG9H2H3jtWx2Wvvq-I5x9SabBcHEfOrWXzOtS30sCmfoFeLOoR-nBp8Kn-o_UVvToyaayVtemol-iqpR3q6b09LyoHNVlIUHvfU-e9xbOPJKGeleEpR01Bik9l8bo3axF8E8f6ZThFNWwMpfm19i6cbLmYp2jr3Vb=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_gplus_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://www.youtube.com/channel/UCbx21T0l7_ttr26tZ9d2_Zw" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="YouTube" height="26" src="https://ci3.googleusercontent.com/proxy/RCnKYJH1Ni3KDEFfk4sMsHaMzIthkyD1yeJwCnk9mfy55E3Gwyy3nRlETsxjRuVhv9PKBqbpHwJg8fpxSUstcagoSsLHXXCoUT39b8jTaJMRmjkjSR7BfySVGdUUUtYgkKdhK3MkYlRM3n0jS9MxUVG6T1dKMwoD6H1fyjiOHPJYe-dEc_DR13KPsDGnets5BNOg7OrHMGbHstcunPmJhYmU4D_RneY=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_youtube_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://instagram.com/soundhousepromotions" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="Instagram" height="26" src="https://ci5.googleusercontent.com/proxy/nI1UDKboRctXOs7cYWiU5g8cuNNV0ASUu3LBvE2174gq8Gng2BfKU7olsUbqWORKu2ECFdqsgnC8k1d18u0okTgoLlGSbM0AHhzZjcPcR1_5G-5hFjWiL__sSh_BUJbD69Ht0Li43vUJWXeZQdkJSlkzVoLPp-uP8gIEoP0Nn464rffMM6K5MyAy4UXHguOOSicEH-p8fE-FykOLCYDQnNNGOboN82a68w=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_instagram_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
								</p>
							</td>
						</tr>
						<tr>
							<td style="line-height:0">&nbsp;</td>
						</tr>
					
							</table>
	        </td>
		</tr>
		<tr>
				<td>
					<table align="center" cellpadding="16" cellspacing="0" border="0" style="max-width:600px;margin-left:auto;margin-right:auto">
						
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									
									<tr>
										<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
											Your preferences are set to receive
											<strong>Booking Requests</strong>
											<i>daily</i>.<br>
											You can receive this email
											<a href="#" style="line-height:2;color:#666" target="_blank">instantly</a>
											or
											<a href="#" style="color:#666;line-height:2" target="_blank">unsubscribe</a>.
										</td>
									</tr>
									
								</table>
							</td>
						</tr>
						<tr>
				<td>
					<table align="center" cellpadding="16" cellspacing="0" border="0" style="max-width:600px;margin-left:auto;margin-right:auto">

						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									
										<tr>
											<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
												99Sound
											</td>
										</tr>
										<tr>
											<td style="line-height:8px">&nbsp;</td>
										</tr>
										<tr>
											<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
												<a href="<?=base_url()?>footer/privacy-policy" target="_blank">Privacy Policy</a>
											</td>
										</tr>
										<tr>
											<td style="line-height:16px">&nbsp;</td>
										</tr>
								
								</table>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
						
					</table>
				</td>
			</tr>	
	</table>
</td>
</tr>
</table>
	<!--STATS-->
	<!-- <table width="672px">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">STATS</td>
		</tr>
	</table>

	<table width="670px" style="font-size:18px">
		<tr>
			<th>Fan Demographics</th>
		</tr>
		<tr align="center">
			<td>Top Demographics is Females (age 13-60)</td>
		</tr>
		<tr align="center">
			<td>
				<table  style="border-collapse: collapse;border-radius:5px 5px 0 0;line-height:25px">
					<tr style="background:#345D7E;font-size:20px;line-height:30px;color:#FFF;">
						<th width="150">Female</th>
						<th width="150">Age</th>
						<th width="150">Male</th>
					</tr>

					<tr align="center" style="background:#EFEFEF;">
						<td>0.0%</td>
						<td>13-17</td>
						<td>0.0%</td>
					</tr>

					<tr align="center" style="background:#559ED5;">
						<td>0.0%</td>
						<td>18-24</td>
						<td>0.0%</td>
					</tr>
					<tr align="center" style="background:#EFEFEF;">
						<td>0.0%</td>
						<td>25-34</td>
						<td>0.0%</td>
					</tr>
					<tr align="center" style="background:#559ED5;">
						<td>0.0%</td>
						<td>35-44</td>
						<td>0.0%</td>
					</tr>
					<tr align="center" style="background:#EFEFEF;">
						<td>0.0%</td>
						<td>45-54</td>
						<td>0.0%</td>
					</tr>
					<tr align="center" style="background:#559ED5;">
						<td>0.0%</td>
						<td>55+</td>
						<td>0.0%</td>
					</tr>
					<tr align="center" style="background:#EFEFEF;">
						<td>0.0%</td>
						<td>n/a</td>
						<td>0.0%</td>
					</tr>
			</table>
			</td>
		</tr>
	</table> -->
	<!--END STATS-->

	<!--VIDEOS-->
<!-- 	<table width="672">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">VIDEOS</td>
		</tr>
	</table>
<table width="670px" border="0" cellspacing="0" cellpadding="0" >

</table>
<table width="670px" border="0" cellspacing="0" cellpadding="0" >
    <tr>
        <td align="center" valign="top" style="padding-bottom: 10px; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" valign="top" style="padding-bottom: 0px; padding-left: 0px; padding-right: 10px; padding-top: 0px;">
                        <table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="border-collapse: collapse;">
                                  <a href="#" border="0"><img src="avatar2.png" width="180" style="border:4px solid black;"></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #888889; font-size: 14px; font-weight: bold; line-height: 16px;   padding-top: 15px; ">
                                    The Walking Dead
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-description" style="color: #c1c4c6; font-size: 14px; line-height: 16px;  padding-top: 15px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. 
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-cta" style="font-size: 14px; font-weight: normal; line-height: 16px; padding-bottom: 20px; padding-left: 0px; padding-top: 15px;">
                                    <a href="#" style="color: #1fa2ea; text-decoration: underline;">View Video</a>
                                </td>
                            </tr>
                      </table>
                    </td>
                    <td align="center" valign="top" style="padding-bottom: 0px; padding-left: 0px; padding-right: 10px; padding-top: 0px;">
                        <table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="border-collapse: collapse;">
                                  <a href="#" border="0"><img src="avatar3.png" width="180" style="border:4px solid black;"></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #888889; font-size: 14px; font-weight: bold; line-height: 16px;   padding-top: 15px; ">
                                    The Walking Dead
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-description" style="color: #c1c4c6; font-size: 14px; line-height: 16px;  padding-top: 15px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. 
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-cta" style="font-size: 14px; font-weight: normal; line-height: 16px; padding-bottom: 20px; padding-left: 0px; padding-top: 15px;">
                                    <a href="#" style="color: #1fa2ea; text-decoration: underline;">View Video</a>
                                </td>
                            </tr>
                      </table>
                    </td>
                    <td align="center" valign="top" style="padding-bottom: 0px; padding-left: 0px; padding-right: 10px; padding-top: 0px;">
                        <table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="border-collapse: collapse;">
                                  <a href="#" border="0"><img src="avatar.png" width="180" style="border:4px solid black;"></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #888889; font-size: 14px; font-weight: bold; line-height: 16px;   padding-top: 15px; ">
                                    The Walking Dead
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-description" style="color: #c1c4c6; font-size: 14px; line-height: 16px;  padding-top: 15px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. 
                                </td>
                            </tr>
                            <tr>
                                <td class="three-col-cta" style="font-size: 14px; font-weight: normal; line-height: 16px; padding-bottom: 20px; padding-left: 0px; padding-top: 15px;">
                                    <a href="#" style="color: #1fa2ea; text-decoration: underline;">View Video</a>
                                </td>
                            </tr>
                      </table>
                    </td>
                </tr>
          </table>
        </td>
    </tr>
 </table> -->
	<!-- <table width="670" style="margin:15px 0">
		<tr align="center">
			<td width="155" style="font-weight:bolder">TOTAL :</td>
			<td width="155">15 VIDEOS</td>
			<td width="155">15256 VIEWS</td>
			<td width="155">745 COMMENTS</td>
		</tr>
	</table> -->

	<!--END VIDEOS-->



	<!--BIOS-->
	<!-- <table width="672px">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">BIOS</td>
		</tr>
	</table>

	<table width="670px">
		<tr>
			<td width="190"><img src="avatar.png" width="170" height="170" style="border:4px solid black;"></td>
			<td width="480" style="color: #888889;font-weight:normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
		</tr>
	</table> -->
	<!--END BIOS-->

	<!--SONG-->
	<!-- table width="672px">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">SONG</td>
		</tr>
	</table>

	<table width="670px">
		<tr>
			<td width="450">
				<table border="0" style="border-collapse: collapse;line-height:25px;">
					<tr style="background:#345D7E;font-size:20px;line-height:28px;color:#FFF;">
						<th width="350">SONG</th>
						<th width="100">VIEWS</th>
					</tr>

					<tr align="center" style="background:#EFEFEF;">
						<td align="left" style="padding-left:10px">MAOKAI</td>
						<td>5555</td>
					</tr>

					<tr align="center" style="background:#559ED5;">
						<td align="left" style="padding-left:10px">FIORA</td>
						<td>444</td>
					</tr>
					<tr align="center" style="background:#EFEFEF;">
						<td align="left" style="padding-left:10px">KARMA</td>
						<td>333</td>
					</tr>
					<tr align="center" style="background:#559ED5;">
						<td align="left" style="padding-left:10px">MORGANA</td>
						<td>222</td>
					</tr>
					<tr align="center" style="background:#EFEFEF;">
						<td align="left" style="padding-left:10px">THRESH</td>
						<td>111</td>
					</tr>

			</table>
			</td>
			<td width="150">
				<table align="center">
					<tr>
						<td>150 SONGS</td>
					</tr>
					<tr>
						<td>250,000 VIEWS</td>
					</tr>
				</table>
			</td>
		</tr>
	</table> -->
	<!--END SONG-->

	<!--PRESS-->
	<!-- <table width="672px">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">PRESS</td>
		</tr>
	</table>

	<table width="670px">
		<tr>
			<td style="color: #888889;font-weight:normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
		
		</tr>
	</table> -->
	<!--END PRESS-->

	<!--SHOWS-->
	<!-- <table width="672px">
		<tr>
			<td style="border-left:4px solid #337AB7;font-size:22px;padding-left:10px;background: #EFEFEF;color:#000;margin:10px 0">SHOWS</td>
		</tr>
	</table>

	<table width="670px">
		<tr>
			<td>
				<table>
					<tr>
						<th width="670" style="font-size:22px" >UPCOMING SHOWS</th>
						
					</tr>
					<tr>
						<td>
							<table border="0" style="border-collapse:collapse;line-height:25px">
								<tr style="background:#345D7E;font-size:20px;line-height:30px;color:#FFF;">
									<th width="110">Date</th>
									<th width="350">Event</th>
									<th width="210">Venue</th>
								</tr>
								<tr style="background:#EFEFEF;">
									<td>Mo, 04/11/16</td>
									<td>ROCK TOURNAMENT</td>
									<td>ABC ZS, Toronto, ON</td>
								</tr>
								<tr style="background:#559ED5;"> 
									<td>Tu, 04/12/16</td>
									<td>DANCE TOURNAMENT</td>
									<td>lio, Los Angles, CL</td>
								</tr>
								<tr style="background:#EFEFEF;">
									<td>We, 04/13/16</td>
									<td>Marathon AKIZ</td>
									<td>lio, Los Angles, CL</td>
								</tr>
							</table>
						</td>
						<td></td>
					</tr>
				</table>

				<table style="margin:15px 0">
					<tr>
						<th width="670" style="font-size:22px" >PAST SHOWS</th>
						
					</tr>
					<tr>
						<td>
							<table border="0" style="border-collapse:collapse;line-height:25px">
								<tr style="background:#345D7E;font-size:20px;line-height:30px;color:#FFF;">
									<th width="110">Date</th>
									<th width="350">Event</th>
									<th width="210">Venue</th>
								</tr>
								<tr style="background:#EFEFEF;">
									<td>Mo, 04/11/16</td>
									<td>ROCK TOURNAMENT</td>
									<td>ABC ZS, Toronto, ON</td>
								</tr>
								<tr style="background:#559ED5;"> 
									<td>Tu, 04/12/16</td>
									<td>DANCE TOURNAMENT</td>
									<td>lio, Los Angles, CL</td>
								</tr>
								<tr style="background:#EFEFEF;">
									<td>We, 04/13/16</td>
									<td>Marathon AKIZ</td>
									<td>lio, Los Angles, CL</td>
								</tr>
							</table>
						</td>
						<td></td>
					</tr>
				</table>

			</td>
		</tr>
	</table> -->
	<!--END SHOW-->

	<!--FOOTER-->
	<!-- <table align="center" cellpadding="16" cellspacing="0" border="0" style="max-width:600px;margin-left:auto;margin-right:auto">			
		<tr>
			<td>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					
						<tr>
							<td style="line-height:16px">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:10px;line-height:1.6;color:#333;font-weight:normal;text-align:center">
								<p style="margin-bottom:0">
									<a href="https://www.facebook.com/99sounds" target="_blank">
									<img alt="Facebook" height="26" src="https://ci4.googleusercontent.com/proxy/PVk28cKWOvOMVX9gp9u-_7_Rr-CNvmG4StZWwky9aKyu8yR_Ze0VYHlgktyk9n9Eq8WGjAPbJ1Y1Eiz3Jp0u58tv5hBcEZmdks0JnYpnvWDH1n7VyC0wtviet60VlgXbv7ZqRDF_xtHpl-ZEFhNbogPIWiuh9zh_r-jogXEvabH0e6BYp3H1VeLqwKMMbYBKUG_18QBtRbq_Vt3MJREQjjoCED16fgeM=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_facebook_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://twitter.com/SoundHouseInc" target="_blank">
									<img alt="Twitter" height="26" src="https://ci4.googleusercontent.com/proxy/WLs2AeRmZ4yZE-St0MLT7pbcWIHDS7ohgyzS2eAqDxotpErx5YQcgADgY3vs6zpr9MAQVrT9NZ-ZmUNcTutMm7SIBlLIgm9rPjDRDKUh7QP2nSKjEDGTi8a_wN7Ffl2B5BrI1Phqnbk2IM_d0jcRKYTo7OK7csOacLsRZi7iYsrXycKH3oqtK_A2iVpo7S_in-RvFukgbK6bzx0NihjbV8kHSiqaXbU=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_twitter_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://plus.google.com/104993070863948605840" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="gPlus" height="26" src="https://ci3.googleusercontent.com/proxy/QCwjjZ6gyUQlsTWOkQHCywnixjsVrQ3hTiNlAl1xTAYkV-NZBjhhhN3_sipcG9H2H3jtWx2Wvvq-I5x9SabBcHEfOrWXzOtS30sCmfoFeLOoR-nBp8Kn-o_UVvToyaayVtemol-iqpR3q6b09LyoHNVlIUHvfU-e9xbOPJKGeleEpR01Bik9l8bo3axF8E8f6ZThFNWwMpfm19i6cbLmYp2jr3Vb=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_gplus_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://www.youtube.com/channel/UCbx21T0l7_ttr26tZ9d2_Zw" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="YouTube" height="26" src="https://ci3.googleusercontent.com/proxy/RCnKYJH1Ni3KDEFfk4sMsHaMzIthkyD1yeJwCnk9mfy55E3Gwyy3nRlETsxjRuVhv9PKBqbpHwJg8fpxSUstcagoSsLHXXCoUT39b8jTaJMRmjkjSR7BfySVGdUUUtYgkKdhK3MkYlRM3n0jS9MxUVG6T1dKMwoD6H1fyjiOHPJYe-dEc_DR13KPsDGnets5BNOg7OrHMGbHstcunPmJhYmU4D_RneY=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_youtube_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
									<a href="https://instagram.com/soundhousepromotions" style="display:inline-block;border:0;text-decoration:none" target="_blank">
									<img alt="Instagram" height="26" src="https://ci5.googleusercontent.com/proxy/nI1UDKboRctXOs7cYWiU5g8cuNNV0ASUu3LBvE2174gq8Gng2BfKU7olsUbqWORKu2ECFdqsgnC8k1d18u0okTgoLlGSbM0AHhzZjcPcR1_5G-5hFjWiL__sSh_BUJbD69Ht0Li43vUJWXeZQdkJSlkzVoLPp-uP8gIEoP0Nn464rffMM6K5MyAy4UXHguOOSicEH-p8fE-FykOLCYDQnNNGOboN82a68w=s0-d-e1-ft#https://gp1.wac.edgecastcdn.net/802892/production_static/20151104151831/images/email/icons_social_media/social-icon_instagram_light.png?1446651957" style="border:none" width="26" class="CToWUd">
									</a>
								</p>
							</td>
						</tr>
						<tr>
							<td style="line-height:0">&nbsp;</td>
						</tr>
					
							</table>
							</td>
						</tr>

					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table align="center" cellpadding="16" cellspacing="0" border="0" style="max-width:600px;margin-left:auto;margin-right:auto">
						
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									
									<tr>
										<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
											Your preferences are set to receive
											<strong>Booking Requests</strong>
											<i>daily</i>.<br>
											You can receive this email
											<a href="#" style="line-height:2;color:#666" target="_blank">instantly</a>
											or
											<a href="#" style="color:#666;line-height:2" target="_blank">unsubscribe</a>.
										</td>
									</tr>
									
								</table>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table align="center" cellpadding="16" cellspacing="0" border="0" style="max-width:600px;margin-left:auto;margin-right:auto">

						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									
										<tr>
											<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
												99Sound
											</td>
										</tr>
										<tr>
											<td style="line-height:8px">&nbsp;</td>
										</tr>
										<tr>
											<td style="font-family:Roboto,'Helvetica Neue',Arial,sans-serif;font-size:12px;line-height:1.4;color:#999;font-weight:normal;text-align:center">
												<a href="<?=base_url()?>footer/privacy-policy" target="_blank">Privacy Policy</a>
											</td>
										</tr>
										<tr>
											<td style="line-height:16px">&nbsp;</td>
										</tr>
								
								</table>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
		
	</table> -->
	<!--END FOOTER-->

</body>
</html>