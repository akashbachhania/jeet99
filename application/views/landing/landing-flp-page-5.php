<link href="<?php echo base_url(); ?>assets/css/bootstrap-combined.no-icons.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/style1.css" rel="stylesheet" />
<script src="<?=base_url('assets/jwplayer7/jwplayer.js')?>"></script>
<script>jwplayer.key="<?=$this->M_setting->get_jwplayer_key()?>";</script>
<link href="<?php echo base_url(); ?>assets/playermusic/css/jplayer.blue.monday.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/landing_page/landing_page11.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/landing_page/style05.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dist/viewer.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dist/css/main.css">
<script src="<?php echo base_url()?>assets/css/dist/viewer.js"></script>
<script src="<?php echo base_url()?>assets/css/dist/js/main.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/add-on/jplayer.playlist.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<div class="wrap bg-landing">
   
    
    <!--   profile Header   -->
    <div class="Myprof-style5">
        <?php if (!empty($users[0]->banner_image)) { ?>
            <img align="left" class="My-image-lg" src="<?php echo base_url(); ?>uploads/<?php echo $users[0]->id; ?>/photo/banner/<?php echo $users[0]->banner_image; ?>" alt="Profile image example"/>
        <?php } ?>
        <img align="left" class="My-image-profile thumbnail n5style" src="<?php echo $this->M_user->get_avata_flp($users[0]->id)?>" alt="Profile image example"/>
        <div class="My-profile-text">
            <h1><?php echo ucfirst($name); ?></h1>
            <p></p>
            <div class="SocialIco">
            <a href="<?php echo $users[0]->facebook_username; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="<?php echo $users[0]->twitter_username; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="<?php echo $users[0]->instagram_username; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="<?php echo $users[0]->youtube_username; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--  end Profile Header  -->
    <div class="col-md-12">
    <div class=" col-md-10 col-md-offset-1 col-xs-12  rm_padding mb_area">
        <div class="col-md-7 hp-detail-p">
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                    <h2><span class="bord_col"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png" /> AMP</span></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 rm_padding">
                    <?php echo $this->M_audio_song->get_shortcode_AMP($id)?>
                </div>
            </div>
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                    <h2><span class="bord_col"><a href="<?php echo base_url('artist/allblogs').'/'.$id; ?>"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png" /> RECENT BLOGS</span></a></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 rm_padding Scroll5Style3">
                <?php foreach ($blogs as $row) {
                        ?>
                    <div class="media blog5-list">
                        <a href="#"> <img class="img-responsive" src="<?php echo base_url('uploads/'.$row['user_id'].'/photo/blogs/'.$row['image_rep']) ?>"  alt=""/></a>
                             <div class="blog-text">
                             <a style="color:rgb(107,101,101);" href="<?php echo base_url('artist/blogs').'/'.$user_data['id']?>"><h3 class="h-t"><?php echo $row['title']?></h3></a>
                                <div class="entry-meta">
                                <h6 class="blg"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y', $row['time'])?></h6>
                                <div class="icons">
                                    <a href="#"><i class="fa fa-user"></i> <?php echo $this->M_user->get_name($row['user_id']);?></a>
                                        <a href="#"><i class="fa fa-comments-o"></i> <?php echo $row['blog_comments_count'];?></a>
                                        
                                </div>
                                 <div class="clearfix"></div>
                                    <p><?php 
                                        $text = strip_tags($row['introduction']);
                                    $desLength = strlen($text);
                                        //var_dump($desLength);exit;            
                                        $stringMaxLength = 120;
                                if ($desLength > $stringMaxLength) {
                                    $des = substr($text, 0, $stringMaxLength);
                                    $text = $des.'...';
                                    echo $text;
                                } else {
                                    echo $row['introduction'];
                                } ?></p>
                                 </div>
                            </div>
                        </div><br/>
                <?php } ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-5 box_land5_text">
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                    <h2><span class="bord_col"><a href="<?php echo base_url('photos');?>"><img class="icon_part"  src="<?php echo base_url(); ?>assets/images/icon/music_note.png"/>PHOTOS</span></a></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 re_padding Scroll5Style1">
                    <?php $count = count($photos);
                             if ($count) {
                                 $i = 0;
                                 foreach ($photos as $pt) {
                                     ?>
                    <div class="col-sm-3 col-xs-6 themp">
                <a href="#">
                    <img class="img-responsive portfolio-item" style="min-height:50px;" src="<?php echo base_url(); ?>uploads/<?php echo $pt['user_id']; ?>/photo/<?php echo $pt['filename']; ?>" alt="">
                </a>
            </div>
            <?php 
                 } }else {
                                 ?>
                        <div class="col-sm-3 col-xs-6 themp">
                            <a href="#">
                                <img class="img-responsive portfolio-item" src="<?php echo base_url(); ?>assets/images/default-img.gif" alt="">
                            </a>
                        </div>
                               <div class="col-sm-3 col-xs-6 themp">
                            <a href="#">
                                <img class="img-responsive portfolio-item" src="<?php echo base_url(); ?>assets/images/default-img.gif" alt="">
                            </a>
                        </div>
                        <div class="col-sm-3 col-xs-6 themp">
                            <a href="#">
                                <img class="img-responsive portfolio-item" style="min-height:50px;" src="<?php echo base_url(); ?>assets/images/default-img.gif" alt="">
                            </a>
                        </div>
                        <div class="col-sm-3 col-xs-6 themp">
                            <a href="#">
                                <img class="img-responsive portfolio-item" style="min-height:50px;" src="<?php echo base_url(); ?>assets/images/default-img.gif" alt="">
                            </a>
                        </div>
            <?php } ?>
                 
                </div>
            </div>
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style">
                <div class="box_land5_heading">
                    <h2><span class="bord_col"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png"/>STATS</span></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 rm_padding">
                    <div class="stats_lstyle5  stats_box">
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
            </div>
            <!--strat video section -->
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                    <h2><a href="<?php echo base_url('artist/allvideos').'/'.$id; ?>"><span class="bord_col"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png"/>VIDEOS</span></a>
                    </h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 re_padding Scroll5Style1">

                    <?php foreach ($videos as $video) {
                     if ($video['type'] == 'file') { $link_video = base_url().'uploads/'.$video['user_id'].'/video/'.$video['name_file'];}
                     elseif($video['type'] == 'link') { $link_video = $video['link_video']; }
                    elseif($video['type'] == 'link-vimeo') { 
                    $video_vimeo=basename($video['link_video']);
                    $get_link='http://vimeo.com/api/v2/video/'.$video_vimeo.'.php';
                     
                    $hash = unserialize(file_get_contents($get_link));
                    $url_id=$hash[0]['id'];
                    $link_video = 'https://player.vimeo.com/video/'.$url_id.'?title=0&byline=0&portrait=0'; }?>
                    <div class="col-sm-3 col-xs-6 themp">
                        <a class="vidth5style" href="#">
                         <img class="img-responsive portfolio-item" src="<?=$this->M_video->get_image_video($video['id'])?>" alt="">
                        <?php if(($video['type'] == 'file') || ($video['type'] == 'link')) { ?>
                        <span class="fa fa-play-circle-o vidcle5style" href="#videos" onclick="javascript:playvideo(<?php echo "'".$link_video."'"; ?>,$(this))" data-toggle="modal" data-target="#videos" ></span>
                         <?php } else { ?>
                        <span class="fa fa-play-circle-o vidcle5style" href="#vimeo_videos" onclick="javascript:play_vimeo_video(<?php echo "'".$link_video."'"; ?>,$(this))" data-toggle="modal" data-target="#vimeo_videos"></span>
                        <?php } ?>
                       </a>
                    </div>
                 <?php 
                    } ?>   
                </div>
            </div>
            <!--End video section -->
               <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                    <h2 ><span class="bord_cols"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png"/>QUICK ACTIONS</span></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 re_padding">
                   <div class="row text-center">
                            <ul class="list-inline list-unstyled">
                            <li>
                                <a class="quickcl href="#"><i class="fa fa-share"></i>Share</a>
                            </li>
                            <li>
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
                                </li>
                                </ul>
                                <?php
                                if ($users[0]->id != $user_data['id']) {
                                    ?>
                                    <div class="text-center" >
                                        <a class="btn btn-info clb5" data-toggle="modal" data-target="#invite-contact" style="color:#fff;">Add Contact Chat</a>
                                    </div>
                                    
                                    <?php
                                }
                                ?>                          
                        </div><!--  row  -->      
                </div>
            </div>
            <!--strat video section -->
            <div class="rm_padding col-md-12 part_session photos_session box_land5_style ">
                <div class="box_land5_heading">
                      <h2><span class="bord_col"><img class="icon_part" src="<?php echo base_url(); ?>assets/images/icon/music_note.png"/>COMMENTS</span></h2>
                </div>
                <span class="liner_landing"></span>
                <div class="col-md-12 re_padding">
                    <div class="cnts-list Scroll5Style2">
                    <?php  foreach ($comments as $comment) { ?>
                                        <?php $role = $this->M_user->get_user_role($comment['client']);
                                        ?>
                        <div class="media">
                           <p class="pull-right"><small><?php echo date('d M Y',strtotime($comment['time']));?></small></p>
                            <a class="media-left comm-media" href="#">
                              <img class="media-object" src="<?php if($role == '1'){ echo $this->M_user->get_avata($comment['client']);} else {echo $this->M_user->get_avata_flp($comment['client']);}?>" width="40" height="40" alt="">
                            </a>
                            <div class="media-body"> 
                              <h4 class="media-heading cu_name"><a href="<?php echo $this->M_user->get_home_page($comment['client']);?>"><?php echo $this->M_user->get_name($comment['client']);?></a></h4>
                               <?php echo ucfirst($comment['comment']); ?>
                              
                            </div>
                        </div>
                         <?php } ?> 
                   </div>
                    <div class="text-right" >
                        <a class="btn btn-info clb5" style="color:#fff;">comments</a>
                    </div>
     
                </div>
            </div><!--End comments section -->
        </div>
    </div> 

     </div>
 
      
    </div>
</div>
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
<!-- Modal comment -->
<div class="modal fade new_modal_style" id="addComment" tabindex="-1" role="dialog" aria-labelledby="myModalcomment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" action="<?php echo base_url().'artist/membercomment'?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <input type="hidden" name="id_artist" value="<?=$id?>" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="tt">Add Comment</h4>
                    <span class="liner"></span>
                </div>            
                <div class="modal-body">
                    <div class="form-group">     
                        <label class="form-input col-md-2">Comment</label>
                        <div class="input-group col-md-9">
                        <textarea class="form-control" name="comment" rows="6" required="" ></textarea>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer searchform">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Add</button>
                </div> 
            </form>      
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
<div class="modal fade" id="videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="video"></div>
        <div class="close-pop"><a href="#" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div>
    </div>
</div>
<div class="modal fade" id="vimeo_videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <iframe id="vimeo_video"  width="640" height="337" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        
        <div class="close-pop"><a href="#" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div>
    </div>
</div>
<!--MODAL video-->

<!--MODAL photo-->
<div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog text-center" role="document">
    <img src="<?php echo base_url(); ?>assets/images/adaptable.jpg" width="500" height="400"/>
    </div> 
</div>  
<script type="text/javascript">
  var url = "<?php echo base_url(); ?>";

    (function($){
        $(window).load(function(){
            console.log('inside funtion');
            $("Scroll5Style3,.Scroll5Style2,Scroll5Style1").mCustomScrollbar({theme:"minimal-dark"});
        });
        })(jQuery);
</script> 
<script src="<?php echo base_url(); ?>assets/landing-page/js/landing-page-3.js"></script>
