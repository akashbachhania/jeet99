

<!-- Start header  -->
 <link href="<?php echo base_url();?>assets/css/landing_page/99sound2.css" rel="stylesheet" type="text/css">

<!-- player css/js-->
<script>jwplayer.key="<?=$this->M_setting->get_jwplayer_key()?>";</script>
<script src="<?=base_url('assets/jwplayer7/jwplayer.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/add-on/jplayer.playlist.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/landing_page/landing_page1.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/playermusic/css/jplayer.blue.monday.min.css" rel="stylesheet" />
<script type="text/javascript">
    $(".effect_slide").click(function(){
        $(this).parent().parent().find("img").click();
    })

    $(document).ready(function(){
        $(".Comment2").click(function(){
            $(".CommentForm-2").slideToggle();
        });
    });
</script>
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
    	<div class="col-md-8">
            <?php if (!empty($users[0]->status)){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"><a href=""><h2><i class="fa fa-check-square-o"></i> STATUS</h2></a></div>
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
                	<div class="BoxTitle"><a href="<?php echo base_url().$name; ?>/photos"><h2><i class="fa fa-picture-o"></i> PHOTOS</h2></a></div>
                        <div class="BoxGrid2">
                    	<div class="row">
                            <?php $count = count($photos);
                            if ($count == 3) {
                                $i = 0;
                                foreach ($photos as $pt) {
                                    ?>
                                    <div class="col-md-4 col-xs-4">
                                        <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                        <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" class="img-responsive Photo-Border"/>

                                    </div>
                                    <?php ++$i;
                                }
                            } elseif ($count == 2) {
                                $i = 0;
                                foreach ($photos as $pt) {
                                    ?>
                                    <div class="col-md-4 col-xs-4">
                                        <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                        <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>"class="img-responsive Photo-Border"/>

                                    </div>
                                    <?php ++$i;
                                } ?>
                                <li class="col-md-4 col-xs-4">
                                    <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                    <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>assets/images/default-img.gif" class="img-responsive Photo-Border"/>

                                </li>
                            <?php } elseif ($count == 1) { foreach ($photos as $pt) { ?>
                                <li class="col-md-4 col-xs-4">
                                    <div class="image_fix_value" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>');"></div>
                                    <img width="1px" style="width: 1px !important;" data-original="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" class="img-responsive Photo-Border"/>

                                </li>
                            <?php } ?>
                                <div class="col-md-4 col-xs-4">
                                    <img width="100" src="<?php echo base_url(); ?>assets/images/default-img.gif"  class="img-responsive Photo-Border"/>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img width="100" src="<?php echo base_url(); ?>assets/images/default-img.gif"class="img-responsive Photo-Border"/>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-4 col-xs-4">
                                    <img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img src="<?php echo base_url(); ?>assets/images/default-img.gif" class="center-block PhotoPic img-responsive"/>
                                </div>
                            <?php } ?>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            <?php if (isset($album_songs) && count($album_songs) > 0) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"> <a href="<?php echo base_url('artist/allsong').'/'.$id; ?>"><h2><i class="fa fa-music" aria-hidden="true"></i> SONGS</h2></a></div>
                        <div class="BoxGrid2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group" id="accordion">
                                        <?php $i = 1; foreach ($album_songs as $album_song) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                                            Album <?php echo $album_song['name']; ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php if ($i == 1) {
                                                    echo 'in';
                                                } ?>">
                                                    <div class="panel-body remove_padding">
                                                        <?php $video_by_albums = $this->M_audio_song->get_songs_by_album($album_song['id']); ?>

                                                        <script type="text/javascript">
                                                            $(document).ready(function(){

                                                                new jPlayerPlaylist({
                                                                    jPlayer: "#jquery_jplayer_<?php echo $album_song['id']; ?>",
                                                                    cssSelectorAncestor: "#jp_container_<?php echo $album_song['id']; ?>"
                                                                }, [
                                                                    <?php
                                                                    foreach ($video_by_albums as $video_by_album) {
                                                                    $array_avai = explode(',', $video_by_album['availability']); ?>
                                                                    {
                                                                        title:"<?php echo $video_by_album['song_name'] ?>",
                                                                        mp3:"<?php echo 'http://d2c1n1yejcka7l.cloudfront.net/uploads/'.$id.'/audio/'.$video_by_album['audio_file'] ?>",
                                                                        poster: "<?php echo base_url().'uploads/'.$id.'/img_playlist/'.$album_song['image_file']; ?>",
                                                                        <?php
                                                                        if (in_array('2', $array_avai)) {
                                                                        ?>
                                                                        link_download: "<?=base_url('artist/downloadsong/'.$video_by_album['id'])?>",
                                                                        download: true
                                                                        <?php

                                                                        } ?>
                                                                    },
                                                                    <?php
                                                                    } ?>
                                                                ], {
                                                                    swfPath: "<?php echo base_url('assets/playermusic/dist/jplayer') ?>",
                                                                    supplied: "webmv, ogv, m4v, oga, mp3",
                                                                    useStateClassSkin: true,
                                                                    autoBlur: false,
                                                                    smoothPlayBar: true,
                                                                    keyEnabled: true,
                                                                    audioFullScreen: true
                                                                });
                                                            });
                                                        </script>
                                                        <div id="jp_container_<?php echo $album_song['id']; ?>" class="jp-video jp-video-270p" role="application" aria-label="media player">
                                                            <div class="jp-type-playlist">
                                                                <div id="jquery_jplayer_<?php echo $album_song['id']; ?>" class="jp-jplayer"></div>
                                                                <div class="jp-gui">
                                                                    <div class="jp-video-play">
                                                                        <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                                                                    </div>
                                                                    <div class="jp-interface">
                                                                        <div class="jp-progress">
                                                                            <div class="jp-seek-bar">
                                                                                <div class="jp-play-bar"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                                                        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                                                        <div class="jp-controls-holder">
                                                                            <div class="jp-controls">
                                                                                <button class="jp-previous" role="button" tabindex="0">previous</button>
                                                                                <button class="jp-play" role="button" tabindex="0">play</button>
                                                                                <button class="jp-next" role="button" tabindex="0">next</button>
                                                                                <button class="jp-stop" role="button" tabindex="0">stop</button>
                                                                            </div>
                                                                            <div class="jp-volume-controls">
                                                                                <button class="jp-mute" role="button" tabindex="0">mute</button>
                                                                                <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                                                                <div class="jp-volume-bar">
                                                                                    <div class="jp-volume-bar-value"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="jp-toggles">
                                                                                <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                                                                <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
                                                                                <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="jp-details">
                                                                            <div class="jp-title" aria-label="title">&nbsp;</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="jp-playlist">
                                                                    <ul>
                                                                        <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                                                                        <li>&nbsp;</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="jp-no-solution">
                                                                    <span>Update Required</span>
                                                                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php ++$i; } ?>

                                    </div>
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                    </div>
                </div><!-- row -->
            <?php } ?>
            <?php if (isset($videos) && count($videos) > 0) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"><a href="<?php echo base_url('artist/allvideos').'/'.$id; ?>"><h2><i class="fa fa-video-camera" aria-hidden="true"></i> VIDEOS</h2></a></div>
                        <div class="BoxGrid2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="carousel-info">
                                        <?php foreach ($videos as $video) {
                                            if ($video['type'] == 'file') { $link_video = base_url().'uploads/'.$video['user_id'].'/video/'.$video['name_file'];}
                                            else { $link_video = $video['link_video']; } ?>
                                            <div class="wp_content_list">
                                                <div class="col-md-4 col-xs-4">
                                                    <a href="#videos" onclick="javascript:playvideo(<?php echo "'".$link_video."'"; ?>,$(this))" data-toggle="modal" data-target="#videos">
                                                        <div class="image_fix_value_video" style="background: url('<?=$this->M_video->get_image_video($video['id'])?>');"></div>
                                                    </a>
                                                </div>
                                                <div class="pull-left">
                                                    <span class="testimonials-name content_video_title"><?php echo $video['name_video']; ?></span>
                                                </div>
                                                <!--<div class="col-xs-8 col-md-8 remove_padding">
                                            <span class="col-xs-12 content_video_title"><?php echo $video['name_video']; ?></span>
                                        </div>-->
                                                <div class="clearfix_check"></div>
                                            </div>
                                        <?php } ?>
                                    </div><!--  carousel-info  -->
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                    </div>
                </div><!-- row -->
            <?php } ?>
            <?php if (isset($events) && count($events) > 0){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"><h2><i class="fa fa-calendar" aria-hidden="true"></i> EVENTS</h2></div>
                        <div class="BoxGrid2">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($events as $event) {?>
                                        <div class="carousel-info">
                                            <a href="#" class="show_ev item" data-event="<?=$event['event_id']; ?>" style="font-size: 16px;text-decoration: none;" data-toggle="modal" data-target="#showEvent">
                                                <img class="pull-left"  src="<?php if (!empty($event['event_banner'])) { echo base_url().'uploads/'.$event['user_id'].'/photo/banner_events/'.$event['event_banner']; } ?>" />
                                            </a>
                                            <div class="pull-left">
                                                <span class="testimonials-name"><?php echo ucfirst($event['event_title']); ?></span>
                                                <span class="testimonials-post"><?php  custom_echo_html($event['event_desc'], 400); ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                    </div>
                </div><!-- row -->
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
        	        <div class="BoxTitle"><a href="<?php echo base_url('artist/allcomment').'/'.$id;?>"><h2><i class="fa fa-comments-o" aria-hidden="true"></i> COMMENT</h2></a></div>
                    <div class="BoxGrid2">
            	        <div class="row">
                            <div class="col-md-12">
                                <?php if (empty($comments)) { ?>
                                    <span class="col-md-12" style="font-size: 16px;">No Comment.</span>
                                <?php }foreach ($comments as $comment) { ?>
                                    <div class="carousel-info">
                                        <a href="<?php echo $this->M_user->get_home_page($comment['client']);?>">
                                            <img alt="" src="<?php echo $this->M_user->get_avata($comment['user_id']);?>" class="pull-left">
                                        </a>
                                        <div class="pull-left">
                                            <span class="testimonials-name"><a href="<?php echo $this->M_user->get_home_page($comment['client']);?>"><?php echo $this->M_user->get_name($comment['client']);?></a></span>
                                            <span class="testimonials-post"><?php echo ucfirst($comment['comment']); ?></span>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3 col-md-offset-9">
                                <button class="ShareBut-2 center-block Comment2"><i class="fa fa-comments-o" aria-hidden="true"></i> COMMENT</button>
                            </div>
                            <div class="col-md-12">
                    	        <div class="CommentForm-2">
                                    <div class="col-md-12">
                                        <form method="post" action="<?php echo base_url().'artist/membercomment'?>">
                                            <h2>Add a Comment</h2>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                            <input type="hidden" name="id_artist" value="<?=$id?>" />
                                            <textarea class="CommentText-2" rows="3" name="comment" placeholder="Enter Your Comment" required></textarea>
                                            <div class="CoButG">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                                <button class="btn btn-sm btn-default Comment2"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
        </div><!--  col-md-8 -->
        <div class="col-md-4">
        	<div class="row">
                <div class="col-md-12">
                <div class="BoxTitle"><h2><i class="fa fa-play" aria-hidden="true"></i> AMP</h2></div>
                    <div class="BoxGrid2">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $this->M_audio_song->get_shortcode_AMP($id)?>
                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
        	        <div class="BoxTitle"><a href="<?php echo base_url('social_media');?>"><h2><i class="fa fa-share-alt" aria-hidden="true"></i> QUICK ACTION</h2></a></div>
                    <div class="BoxGrid2">
            	        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <button class="ShareBut-2 center-block">Share</button>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <?php $home_page = $this->uri->segment(1);
                                $results = $this->db->where('home_page', $home_page)->get('users')->result_array();
                                foreach ($results as $result) { $user_i = $result['id']; }
                                $isset = $this->db->where('user_id', $user_i)->where('fan_id', $user_id)->get('fans')->num_rows();
                                ?>
                                <a href="<?php if ($isset > 0) { echo '#'; } else { echo base_url().'artist/comefan/'.$user_id.'/'.$home_page; } ?>" class="ShareBut-2 center-block" style="<?php if ($isset > 0) {
                                    echo 'cursor: no-drop;';
                                } ?>">Become A Fan</a>
                                <?php
                                if ($users[0]->id != $user_data['id']) {
                                    ?>
                                    <div class="col-md-12 searchform">
                                        <a class="btn btn-default col-xs-12" href="#" style="margin-top: 20px;padding: 15px;" data-toggle="modal" data-target="#invite-contact">Add Contact Chat</a>
                                    </div>
                                    <?php

                                }
                                ?>

                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
        	        <div class="BoxTitle"><a href="<?php echo base_url('social_media');?>"><h2><i class="fa fa-clock-o" aria-hidden="true"></i> STATS</h2></a></div>
                    <div class="BoxGrid2">
            	        <div class="row">
                            <div class="col-md-12">
                                <div class="StarLink-2">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i> Song Plays<span><?php echo $num_songs;?></span></a></li>
                                        <li><a href="#"><i class="fa fa-file-video-o"></i> Video Plays<span><?php echo $num_videos;?></span></a></li>
                                        <li><a href="#"><i class="fa fa-users"></i> Total Fans<span><?php echo $num_fands; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-hand-rock-o"></i> Total Events<span><?php echo $num_events; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-bookmark"></i> Total Blogs<span><?php echo $num_blogs; ?></span></a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> Total Comments<span><?php echo $num_comments; ?></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--  row  -->
                    </div><!--  BoxGrid2 -->
                </div>
            </div><!-- row -->

            <?php if (isset($fans) && count($fans) > 0) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="BoxTitle"><a href="<?php echo base_url('artist/allfans').'/'.$id; ?>"><h2><i class="fa fa-user-plus" aria-hidden="true"></i> FANS</h2></a></div>
                        <div class="BoxGrid2">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $i = 0; foreach ($fans as $fan) { ?>
                                    <div class="carousel-info">
                                        <a href="<?php echo base_url().$fan['home_page']; ?>">
                                            <img title="<?php echo $fan['artist_name']; ?>" alt=""
                                                 src="<?php if (!empty($fan['avata'])) { echo base_url().'uploads/'.$users[0]->id.'/photo/'.$fan['avata'];}
                                                 else { echo base_url().'assets/images/default-img.gif'; } ?>" class="pull-left">
                                        </a>
                                    </div><!--  carousel-info  -->
                                    <?php $i++ ; } ?>
                                </div>
                            </div><!--  row  -->
                        </div><!--  BoxGrid2 -->
                    </div>
                </div><!-- row -->
            <?php } ?>

            <div class="row">
            <div class="col-md-12">
        	<div class="BoxTitle"><h2><i class="fa fa-users" aria-hidden="true"></i> MEMBER</h2></div>
            <div class="BoxGrid2">
            	<div class="row">
                    <div class="col-md-12">
                    	    <?php foreach($members as $member){ 
                            
                            ?>
                        
                        <div class="carousel-info">
                            <img alt="" src="<?php echo base_url(); ?>uploads/<?php echo $member['artist_id'];?>/image_member/<?php echo $member['member_image'];?>" class="pull-left">
                            <div class="pull-left">
                                <span class="testimonials-name"><a href="#"><?php echo $member['name_member']; ?></a></span>
                                <span class="testimonials-post"><?php echo $member['contribution'];?></span>
                            </div>
                        </div>
                        <?php } ?>
                       </div><!--  carousel-info  -->
                    </div>
                </div><!--  row  -->
            </div><!--  BoxGrid2 -->
            </div>
            </div><!-- row -->
        </div><!--  col-md-4  -->
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

                <h4 class="tt" id="myModalevent">Add a Comment</h4>
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
<script src="<?php echo base_url(); ?>assets/landing-page/js/landing-page-1.js"></script>
