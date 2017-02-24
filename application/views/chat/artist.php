<?php include APPPATH.'libraries/jchat/artist/loader.php';    ?>

<link href="<?php echo base_url()?>assets/css/chat/user_css.css" rel="stylesheet" media="screen" type="text/css" />
<script src="<?php echo base_url()?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/chat/jChat_artist.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/chat/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/chat/custom.js" type="text/javascript"></script> 
<link href="<?php echo base_url()?>assets/css/chat/jChat.css" rel="stylesheet" media="screen" type="text/css" />
<script type="text/javascript">
    link = "<?php echo base_url(); ?>"
</script>
<div class="chanenel_wp" >
<input type="hidden" value="<?php echo $with_id ?>" id="with_id"/>
<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" id="csrf" />
<!-- BOX -->
 <?php
    $current_session_time = $chat->get_session_time($chat->serverID);
    if ($current_session_time == true) {
        $session_time = '<span class="session_time">Last seen '.$current_session_time.'</span>';
    } else {
        $session_time = '<span class="session_time">Online</span>';
    }
?>
<div class="panel panel-success panel-height">
    <div class="panel-heading panel-succes spanel-height pancol">
        <h4 class="panel-title"><?php echo $chat->server; ?></h4></div>
    <div class="panel-body">
        <div class="chat-body">
            <ul class="chat-message">
                <li class="messages"></li>
            </ul>
        </div>
        <div id="emoticons" class="modal fade">
        
            <div class="modal-dialog">
                <div class="modal-header">
                    <h4 class="tt" style="color: #000 !important;">Emotions</h4>
                    <span class="liner"></span>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <a href="#" class="btn myButton" data-dismiss="modal">Close</a>
                </div> 
            </div> 
        </div>
    </div>
    <div class="panel-footer pancol">
        <!-- <div class="input-group">
           <input type="text" id="text-input-field" class="form-control" name="message" placeholder="Type your message here..."/> 
            <div class="send-group">
                <a href="#emoticons" data-option="emotions" class="attachEmotions" data-toggle="modal"></a>
                <input type="submit" name="send-message" id="sendMessage" class="btn myButton" value="Send" />
            </div>

        </div> -->
         <?php echo $session_time; ?><span id="sample"></span>
       
        <div class="message-entry ">
            <div class="send-group">
                <input type="text" id="text-input-field" class="input-send" name="message" placeholder="Type your message here..."> <a href="#emoticons" data-option="emotions" class="attachEmotions" data-toggle="modal"></a>
                <button class="btn btn-primary" id="sendMessage">Send</button>
            </div>
        </div>
    </div>
</div>

<!-- // END BOX -->
</div>

<script>
	$().Chat();
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>