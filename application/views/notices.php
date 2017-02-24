<meta name="twitter:title" content="Test Twitter" />
<meta name="twitter:description" content="Test Twitter Description" />
<meta name="twitter:domain" content="Title" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content="<?php echo $this->M_user->get_avata($user_data['id'])?>" />
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/crop-image/css/cropper.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/newrpk/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/newrpk/jquery.onoff.css">

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/playermusic/css/jplayer.blue.monday.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

 <style type="text/css">
    body{
        background: #2A3F54;
    }
    
 </style> 
<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo $this->M_user->get_avata($user_data['id'])?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span><?php echo $user_data['artist_name']?></span>
                            <h2><i class="fa fa-map-marker"></i> <?php echo $user_data['city']?></h2>
                        </div>
                    </div>
                        <!-- /menu profile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu"  class="main_menu_side hidden-print main_menu">
                        <div class="menu_section" >
                            <ul class="nav side-menu1" >
                               <li id="amper_register">
                                <a data-toggle="pill" href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_register');"><i class="fa fa-flag"></i> Request : To be an Affiliate</a>
                            </li>
                            <li id="affiliates">
                                <a  data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'affiliates');"><i class="fa fa-flag"></i> Request : Affiliate chat </a>
                            </li>
                            <li id="personal">
                                <a data-toggle="pill"  href="#affilates_register" onclick="get_data_by_type('<?php echo $user_data['id']?>', 'personal');" ><i class="fa fa-flag"></i> Request : Private chat </a>
                            </li>
                            <li id="band">
                                <a data-toggle="pill"  href="#affilates_register" onclick="get_data_by_type('<?php echo $user_data['id']?>', 'band');"><i class="fa fa-flag"></i> Request : Band chat </a>
                            </li>
                            <li id="tour">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'tour');"><i class="fa fa-flag"></i> Request : Tour chat </a>
                            </li>
                            <li id="group">
                                <a data-toggle="pill"  href="#affilates_register" onclick="get_data_by_type('<?php echo $user_data['id']?>', 'group');"><i class="fa fa-flag"></i> Request : Group chat </a>
                            </li>
                            <li id="amper_sales">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_sales');"><i class="fa fa-flag" ></i> Request : Songs sales </a>
                            </li>
                            <li id="invite">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'invite');"><i class="fa fa-flag" ></i> Request : Invites </a>
                            </li>
                            <li id="band_invite">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'band_invite');"><i class="fa fa-flag" ></i> Request : Band Invites </a>
                            </li>
                            <li id="tour_invite"> 
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'tour_invite');"><i class="fa fa-flag" ></i> Request : Tour Invites </a>
                            </li>
                            <li id="amper_unlocked">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_unlocked');"><i class="fa fa-flag" ></i> Request : Affiliate Unlock </a>
                            </li>
                            <li id="amper_locked">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_locked');"><i class="fa fa-flag" ></i> Request : Affiliate Lock </a>
                            </li>
                            <li id="amper_allow">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_allow');"><i class="fa fa-flag" ></i> Request : Affiliate Allowed </a>
                            </li>
                            <li id="amper_not_allow">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'amper_not_allow');"><i class="fa fa-flag" ></i> Request : Affiliate Not allowed </a>
                            </li>
                            <li id="memeber_comment">
                                <a data-toggle="pill"  href="#affilates_register"  onclick="get_data_by_type('<?php echo $user_data['id']?>', 'memeber_comment');"><i class="fa fa-flag" ></i> Request : Member Comment </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                            <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav>
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->
        <div class="tab-content">
            <!-- page content -->
            <div class="right_col tab-pane fade in active" role="main" id="affilates_register">
             <div class="home_page_div">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive" id="table_register_affiliates">
                <table class="table">
                    <tr>
                        <th>Sr No.</th>
                        <th>Message</th>
                        <th>Read</th>
                        <th>Delete</th>
                        <th>Time</th>
                    </tr>

                    <?php if(isset($register_affiliates)) {
                        $i = 1;
                        foreach ($register_affiliates as $row) {
                    ?>
                    <tr id="notification_<?=$row->id; ?>">
                        <td><?php echo $i;?></td>
                        <td><?=$row->messages?></td>
                        <td><input type="checkbox" name="read" id="notice_<?=$row->id; ?>" onclick="update_notification_read('<?=$row->id; ?>', '<?php echo $user_data['id']?>', '<?=$row->type; ?>')" <?php if($row->is_read == '1'){echo 'checked';}?>/></td>
                        <td><a href="javascript:void(0);" onclick="delete_notification('<?=$row->id; ?>', '<?php echo $user_data['id']?>', '<?=$row->type; ?>')"><i class="fa fa-trash-o"></i></a></td>
                        <td><?=date('H:i, d M Y', $row->time);?></td>
                    </tr>
                     <?php
                     $i++;
                    } 
                 }
                    ?>
                </table>
                <?php if(count($register_affiliates) > $per_page){ ?>
                    <div class="text-center"><?php echo $this->pagination->create_links();?></div>
               <?php } ?>
                </div>
        </div>
    </div>   
            </div>
        </div>
    </div>   
    </div> 
</div> <!-- coontainer -->




<script src="<?php echo base_url(); ?>assets/crop-image/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/playermusic/dist/add-on/jplayer.playlist.js"></script>
<script src="<?=base_url('assets/js/ckeditor/ckeditor.js')?>"></script>
<script src="<?php echo base_url()?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

<script src="<?php echo base_url()?>assets/js/newrpk/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/newrpk/jquery.onoff.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/notification/noticification.js"></script>
<script type="text/javascript"> 

    var base_url = "<?php echo base_url(); ?>";
    var user_id = <?php echo $user_data['id']?>;
    function get_notification_type()
    {
        var type_data = localStorage.getItem('notice_type');
        console.log(type_data);
        get_data_by_type(user_id, type_data);
        var li_id = "#"+type_data;
        $(li_id).addClass("active");
    }
    get_notification_type();
    function get_data_by_type(user_id, type)
    {
        $.ajax({
        url:base_url+'Notices/get_data_by_type/'+user_id+'/'+type,
       success: function(data){
        console.log(data);
            $('div #table_register_affiliates').empty();
            $('div #table_register_affiliates').html(data);
            }
        });
    }

    function update_notification_read(notice_id, user_id, type)
    {
        $.ajax({
        url:base_url+'Notices/update_notification_status',
        data:{
            'user_id' : user_id,
            'notification_id' : notice_id,
            "<?=$this->security->get_csrf_token_name();?>":"<?=$this->security->get_csrf_hash();?>"
        },
        type:'post',
        success: function(data){
            console.log(data);
                get_data_by_type(user_id, type);
                get_ajax_notification(user_id);
            }
        });
    }

    function get_ajax_notification(user_id)
    {
        $.ajax({
        url:base_url+'Notices/get_notify_by_type',
        data:{
            'user_id' : user_id,
            "<?=$this->security->get_csrf_token_name();?>":"<?=$this->security->get_csrf_hash();?>"
        },
        type:'post',
        success: function(data){
            var data = JSON.parse(data);
               setTimeout(function() {
                    // alert("call");
                            get_ajax_notification(user_id);
                        }, 5000);
                $("#notify_nav").empty();
                $("#notice_count").empty();
                if(data.count != 0)
                {
                    $("#notify_nav").html(data.count);
                    $("#notice_count").html(data.count);
                }
                
               
            }

        });
    }
    get_ajax_notification(user_id);

    function delete_notification(notification_id, user_id, type)
    {
        swal({
              title: "Are you sure?",
              text: "You want to delete notification!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:base_url+'Notices/remove',
                    data:{
                        'notification_id':notification_id,
                        "<?=$this->security->get_csrf_token_name();?>":"<?=$this->security->get_csrf_hash();?>"
                    },
                    type:'post',
                    success: function(data){
                        get_data_by_type(user_id, type);
                        swal("Deleted!", "Your notification has been deleted.", "success");
                        }

                    });
              
        });
         
    }
  
</script>
</body> 