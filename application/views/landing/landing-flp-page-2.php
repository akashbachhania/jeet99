

<!-- Start header  -->

 <link href="<?php echo base_url();?>assets/css/landing_page/99sound2.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/landing_page/style002.css" rel="stylesheet" type="text/css">
<!-- player css/js-->

<script>jwplayer.key="<?=$this->M_setting->get_jwplayer_key()?>";</script>
<script src="<?=base_url('assets/jwplayer7/jwplayer.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/add-on/jplayer.playlist.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/landing_page/landing_page1.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/landing_page/style002.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/playermusic/css/jplayer.blue.monday.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/hover-min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<!-- End-->
<header>
	<div class="ProfilePic2" style=" background:url(<?php if(!empty($users[0]->banner_image)){echo base_url().'uploads/'.$users[0]->id.'/photo/banner/'.$users[0]->banner_image; }else{ echo base_url().'assets/demotemp/images/profile-pic.jpg';} ?>) no-repeat center center; background-size:100% 100%;">
	    <div class="ProfileTranc2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="ProfileInfo">
                            <div class="ProfilePicZoom">
                                <img src="<?php echo $this->M_user->get_avata($users[0]->id); ?>" alt="">
                            </div>
                            <h2><?php echo ucfirst($name); ?> <br /><span><?php if(isset($genres[0]['name'])) echo ucfirst($genres[0]['name']); ?>  <?php echo ucfirst($city); if (!empty($country_code[0]['countrycode'])) { echo ', '.ucfirst($country_code[0]['countrycode']); }?></span></h2>
                            <div class="ProfileSocial">
                                <ul>
                                     <li><a href="<?php echo $users[0]->facebook_username; ?>" target="_blank" class="fa fb"><i class="fa fa-fw fa-facebook"></i></a></li>
                                     <li><a href="<?php echo $users[0]->twitter_username; ?>" target="_blank" class="fa tw"><i class="fa fa-fw fa-twitter"></i></a></li>
                                     <li><a href="<?php echo $users[0]->youtube_username; ?>" target="_blank" class="fa gp"><i class="fa-fw fa-youtube"></i></a></li>
                                     <li><a href="<?php echo $users[0]->instagram_username; ?>" target="_blank" class="fa in"><i class="fa fa-fw fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div><!--  ProfileInfo -->
                    </div>
                </div><!-- row  -->
            </div><!-- container  -->
        </div><!-- ProfileTranc2  -->
    </div><!-- ProfilePic2   -->
</header>
<!--  End header  -->

<!-- Start Section  -->
    <section id="SectionGrid">
<div class="container">
	<div class="row">
    	<div class="col-md-7">
            <?php if (!empty($users[0]->status)){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"><a href=""><h2 class="animated rubberBand"><i class="fa fa-check-square-o"></i> STATUS</h2></a></div>
                        <div class="BoxGrid2">
                            <div class="row">
                                <div class="col-md-12">
                                     <p> <?php echo $users[0]->status; ?> </p>
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                    </div>
                </div><!-- row -->
            <?php }?>
        	<div class="row">
                <div class="col-md-12">
                	
                    <div class="BoxTitle"> <a  href="<?php echo base_url().$name; ?>/photos"><h2 class="animated rubberBand"><i class="fa fa-picture-o" aria-hidden="true"></i> PHOTOS</h2></a></div>
                        <div class="BoxGrid2 text-center">
                       <div class="ScrollStyle1">
                    	<div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                                <a class="thumbnail hvr-grow" href="#">
                                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                                </a>
                            </div>
                            <?php $count = count($photos);
                            if ($count == 3) {
                                $i = 0;
                                foreach ($photos as $pt) {
                                    ?>
                                  <!--   <div class="col-md-4 col-xs-4">
                                        <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                        <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" class="img-responsive Photo-Border"/>

                                    </div> -->
                                    <?php ++$i;
                                }
                            } elseif ($count == 2) {
                                $i = 0;
                                foreach ($photos as $pt) {
                                    ?>
                               <!--      <div class="col-md-4 col-xs-4">
                                        <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                        <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>"class="img-responsive Photo-Border"/>

                                    </div> -->
                                    <?php ++$i;
                                } ?>
                                <!-- <li class="col-md-4 col-xs-4">
                                    <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                    <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>assets/images/default-img.gif" class="img-responsive Photo-Border"/>

                                </li> -->
                            <?php } elseif ($count == 1) { foreach ($photos as $pt) { ?>
                                <<!-- li class="col-md-4 col-xs-4">
                                    <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                    <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" class="img-responsive Photo-Border"/>

                                </li> -->
                            <?php } ?>
                                <div class="col-md-4 col-xs-4 ">
                                    <!-- <img width="100" src="<?php echo base_url(); ?>assets/images/default-img.gif"  class="img-responsive Photo-Border"/> -->
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img width="100" src="<?php echo base_url(); ?>assets/images/default-img.gif"class="img-responsive Photo-Border"/>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-4 col-xs-4">
                                    <<!-- img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/> -->
                                </div>
                                <div class="col-md-4 col-xs-4">
                                   <!--  <img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/> -->
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <!-- <img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/> -->
                                </div>
                            <?php } ?>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="BoxTitle"><h2 class="animated rubberBand"><i class="fa fa-play" aria-hidden="true"></i> AMP</h2></div>
                    <div class="BoxGrid2">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $this->M_audio_song->get_shortcode_AMP($id)?>
                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
        </div><!--  col-md-8 -->
        <div class="col-md-5">
        	<div class="row">
                <div class="col-md-12">
                <div class="BoxTitle"><h2 class="animated rubberBand"><i class="fa fa-rss" aria-hidden="true"></i>blog</h2></div>
                    <div class="BoxGrid2">
                    <div class="thumbnail">
                                <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                                <div class="caption-full caption-area">
                                    <h4><a href="#">Product Name</a>
                                    </h4>
                                    <p>
                                      <i class="fa fa-user"></i> by <a href="#">John</a> 
                                      | <i class="fa fa-calendar"></i> jan 16th, 2017
                                     
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                </div> 
                            </div>
                        
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
        	        <div class="BoxTitle"><a href="<?php echo base_url('social_media');?>"><h2 class="animated rubberBand"><i class="fa fa-share-alt" aria-hidden="true"></i> QUICK ACTION</h2></a></div>
                    <div class="BoxGrid2">
            	        <div class="row qa-area">
                            <div class="col-md-5 col-xs-12 text-center">
                                <a class="quickcl href="#"><i class="fa fa-share"></i>Share</a>
                            </div>
                            <div class="col-md-7 col-xs-12 ">
                                <?php $home_page = $this->uri->segment(1);
                                if($home_page == 'amp')
                                {
                                    $home_page = $this->uri->segment(2);
                                }
                                $results = $this->db->where('home_page', $home_page)->get('users')->result_array();
                                foreach ($results as $result) { $user_i = $result['id']; }
                                $isset = $this->db->where('user_id', $user_i)->where('fan_id', $user_id)->get('fans')->num_rows();
                                ?>
                                <a href="<?php if ($isset > 0) { echo '#'; } else { echo base_url().'artist/comefan/'.$user_id.'/'.$home_page; } ?>" class="quickcl" style="<?php if ($isset > 0) {
                                    echo 'cursor: no-drop;';
                                } ?>"><i class="fa fa-user"></i> Become A Fan</a>
                                </div>
                                <?php
                                if ($users[0]->id != $user_data['id']) {
                                    ?>
                                    <div class="col-md-12 searchform text-center">
                                        <a class="btn btn-default buttanquck" href="#" style=" margin: 20px auto;padding: 15px; background-color:rgb(91,201,138);" data-toggle="modal" data-target="#invite-contact">Add Contact Chat</a>
                                    </div>
                                    <?php

                                }
                                ?>

                           
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
        	        <div class="BoxTitle"><a href="<?php echo base_url('social_media');?>"><h2 class="animated rubberBand"><i class="fa fa-clock-o" aria-hidden="true"></i> STATS</h2></a></div>
                    <div class="BoxGrid2">
            	        <div class="row">
                            <div class="col-md-12">
                                <div class="StarLink-2 StarLink-3 ">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music tb"></i> Song Plays<span class="tb pull-right"><?php echo $num_songs;?></span></a></li>
                                        <li><a href="#"><i class="fa fa-file-video-o tb"></i> Video Plays<span><?php echo $num_videos;?></span></a></li>
                                        <li><a href="#"><i class="fa fa-users tb"></i> Total Fans<span><?php echo $num_fands; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-hand-rock-o tb"></i> Total Events<span><?php echo $num_events; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-bookmark tb"></i> Total Blogs<span><?php echo $num_blogs; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-comments tb"></i> Total Comments<span><?php echo $num_comments; ?></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            </div><!-- row -->
        </div><!--  col-md-4  -->
        <div class="row video-area">
        <div class="col-md-12">
         <div class="BoxTitle"><h2 class="animated rubberBand"><i class="fa fa-file-video-o" aria-hidden="true"></i>videos</h2></div>
            <div class="BoxGrid3">
                <div class="col-md-8 col-sm-12 ">
                     <iframe width="100%" height="315" src="//www.youtube.com/embed/ac7KhViaVqc" allowfullscreen=""></iframe>
                     <div>
                                <p>
                                      <i class="fa fa-user"></i> by <a href="#">John</a> 
                                      | <i class="fa fa-calendar"></i> jan 16th, 2017
                                      | <i class="fa fa-comment"></i> <a href="#">3 Comments</a>
                                      | <i class="fa fa-share"></i> <a href="#">39 Shares</a>
                                    </p>
                                <h4><a href="#">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item See more snippets like this online store item</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="thumbnail ScrollStyle2">
                    <div class="BoxGrid2 ">
                            <div class="row">
                                <div class="col-md-12">
                                <?php foreach ($videos as $video) {
                                            if ($video['type'] == 'file') { $link_video = base_url().'uploads/'.$video['user_id'].'/video/'.$video['name_file'];}
                                            else { $link_video = $video['link_video']; } ?>
                                     <div class="col-md-12 brod">
                                        <div class="col-xs-12 col-md-5 vht text-center">
                                                    <img src="<?=$this->M_video->get_image_video($video['id'])?>" alt="bootsnipp"
                                                        class="img-rounded img-responsive" />
                                        </div>
                                        <div class="col-xs-12 col-md-7 section-box">
                                            <h4><strong><a href="#videos" onclick="javascript:playvideo(<?php echo "'".$link_video."'"; ?>,$(this))" data-toggle="modal" data-target="#videos"><?php echo $video['name_video']; ?></a></strong></h4>
                                            <p> <i class="fa fa-calendar"></i> jan 16th, 2017</p>
                                            <p>
                                                 Design elements fhgjh dgfhgj xgdf
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                        </div>
                </div>
            </div>
        </div>
    </div><!--  row  -->

    <div class="row comm-area">
        <div class="col-md-12">
        <div class="BoxTitle"><a href="<?php echo base_url('artist/allcomment').'/'.$id;?>"><h2 class="animated rubberBand"><i class="fa fa-comments-o" aria-hidden="true"></i> COMMENT</h2></a></div>
            <div class="BoxGrid3">
                
            <div class="col-md-4">
                 <div class="thumbnail">
                           <div class="panel  post">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-responsive" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>Ryan Haywood</b></a>
                                    made a post.
                                </div>
                                <h6 class="text-muted time">1 minute ago</h6>
                            </div>
                        </div> 
                        <div class="post-description"> 
                            <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                            <div class="stats">
                                <a href="#" class="stat-item">
                                    <i class="fa fa-thumbs-up icon"></i>2
                                </a>
                                <a href="#" class="stat-item">
                                    <i class="fa fa-thumbs-down icon"></i>12
                                </a>
                                
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            <div class="col-md-4">
                 <div class="thumbnail">
                           <div class="panel  post">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-responsive avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>Ryan Haywood</b></a>
                                    made a post.
                                </div>
                                <h6 class="text-muted time">1 minute ago</h6>
                            </div>
                        </div> 
                        <div class="post-description"> 
                            <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                            <div class="stats">
                                <a href="#" class=" stat-item">
                                    <i class="fa fa-thumbs-up icon"></i>2
                                </a>
                                <a href="#" class=" stat-item">
                                    <i class="fa fa-thumbs-down icon"></i>12
                                </a>
                                
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                           <div class="panel  post">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-responsive" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>Ryan Haywood</b></a>
                                    made a post.
                                </div>
                                <h6 class="text-muted time">1 minute ago</h6>

                            </div>
                        </div> 
                        <div class="post-description meta"> 
                            <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                             <div class="stats">
                                <a href="#" class="stat-item">
                                    <i class="fa fa-thumbs-up icon"></i>2
                                </a>
                                <a href="#" class="stat-item">
                                    <i class="fa fa-thumbs-down icon"></i>12
                                </a>
                                
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            <div class="text-right" >
                        <a class="btn  clb2">comments</a>
                    </div>
        </div>
    </div><!--  row  --> 
    </div><!--  row  -->


      
</div><!--  container  -->	
</section>
<!-- End section  -->
<!-- Modal showEvent -->
<div class="modal fade new_modal_style" id="showEvent" tabindex="-1" role="dialog" aria-labelledby="myModalcomment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                <h4 class="tt" id="myModalevent">Add Comment</h4>
                <span class="liner"></span>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <img id="event_banner" src="" width="535" />
                </div>
                <div class="col-md-12 text-center" style="margin-top: 10px;">
                    <span id="cat" style="font-weight: bold; font-size: 18px;"></span>
                </div>
                <div class="col-md-12" style="padding:10px 30px  0px 15px;">
                    <span style="float: left;">Start Date: <span id="start" ></span></span>
                    <span style="float: right;">End Date: <span id="end" style="color: red;"></span></span>
                </div>
                <div class="col-md-12" style="padding: 20px 30px">
                    <span id="des"></span>
                </div>
                <div class="col-md-12">
                    <span>Post By: <span id="post-b" style="font-weight: bold;"></span></span>
                </div>
                <div class="col-md-12">
                    <span>Location: <span id="lo" style="font-weight: bold;"></span></span>
                </div>
            </div>
            <div class="modal-footer searchform" style="border-top: none;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Invite Contact -->
<div class="modal fade" id="invite-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Invite Contact (<?=$this->M_user->get_name($users['0']->id)?>)</h4>
            </div>
            <form class="form form-signup" action="<?php echo base_url()?>chat/invite_contact" method="post"  >
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-input col-md-3">Messages</label>
                        <div class="input-group col-md-8">
                            <input type="hidden" name ="user_invite" value="<?php echo $user_data['id']?>" />
                            <input type="hidden" name ="user_to" id="user_id2" value="<?php echo $users['0']->id?>" />
                            <textarea class="form-control" rows="5" name="messages_invite">Hi <?=$this->M_user->get_name($users['0']->id)?>, I'd like to add you as a contact.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add to Contacts</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--MODAL video-->
<div class="modal fade" id="videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="video"></div>
        <div class="close-pop"><a href="#" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div>
    </div>
</div>

<div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog text-center" role="document">
        <img src="<?php echo base_url(); ?>assets/images/adaptable.jpg" width="500" height="400"/>
    </div>
</div>
</div>
<script type="text/javascript">
    var url = "<?php echo base_url(); ?>";
   
</script>
<script src="<?php echo base_url()?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>


<script type="text/javascript">
    $(".effect_slide").click(function(){
        $(this).parent().parent().find("img").click();
    })

    $(document).ready(function(){
        $(".Comment2").click(function(){
            $(".CommentForm-2").slideToggle();
        });
    });
     (function($){
        $(window).load(function(){
            console.log('inside funtion');
            $(".ScrollStyle1,.ScrollStyle2").mCustomScrollbar({theme:"minimal-dark"});
        });
        })(jQuery);
</script>
<script src="<?php echo base_url(); ?>assets/landing-page/js/landing-page-1.js"></script>


