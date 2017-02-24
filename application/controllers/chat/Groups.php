<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Groups extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_photo');
        $this->load->model('M_user');
        $this->load->model('M_notify');
        $this->load->model('M_channel');
        if ($this->session->userdata('loged_in') == false) {
            redirect('account/login');
        }
        $ac = $this->session->userdata('access');
      
         $data['redirect_url']=$this->curPageURL();
        if (!isset($ac) && !in_array($ac, $this->config->item('access_password'))) {
           
            redirect("access?redirect_url=".$data['redirect_url']);
        }
    }
    public function curPageURL() {
 $pageURL = 'http';
 if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
    $pageURL .= "s";
}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
 
}
    /**
     * View chat groups.
     *
     * @param int $id_user
     */
    public function index($id)
    {
        $user_data = $this->session->userdata('user_data');
        $data_group = $this->db->where('id='.$id)->get('groups_chat')->row_array();
        $id_members = $this->M_user->member_group($id);
        if (in_array($user_data['id'], $id_members)) {
            $data['with_id'] = $id;
            $data['user_data'] = $user_data;
            $data['members'] = $this->db->select('id,role,artist_name,fan_name')
                ->where_in('id', $id_members)
                ->get('users')->result_array();
            $_SESSION['jChat_username'] = $data_group ['name'];
            $_SESSION['jChat_nameclient'] = $this->M_user->get_name($data['user_data']['id']);
            $_SESSION['jChat_idclient'] = $data['user_data']['id'];
            $this->load->view('includes/header', $data);
            $this->load->view('chat/groups', $data);
        } else {
            redirect('chat/dashboard');
        }
    }
    /**
     * Ajax load messages.
     *
     * @param int $with_id
     */
    public function ajax_messages($with_id)
    {
        include APPPATH.'libraries/jchat/groups/loader.php';
        $post = $this->input->post('clientID');

        if (isset($post)) {
            // Get The Messages ID of the logged in clientID (user_id) and the one he sends to serverID (receiver)
            $messages_ids = $chat->get_messages_id($chat->clientID, $chat->serverID);
            if (!empty($messages_ids)) {
                foreach ($messages_ids as $message_id) {
                    if ($message_id['user_id'] == $chat->clientID) {
                        $class = 'client';
                        $user_id = $chat->clientID;
                        $username = $chat->client;
                        $class_new = 'right';
                        $class_new_image = 'profile-photo-sm  pull-right';
                    } elseif ($message_id['user_id'] == $chat->serverID) {
                        $class = 'server';
                        $user_id = $chat->serverID;
                        $username = $chat->server;
                        $class_new = 'left';
                        $class_new_image = 'profile-photo-sm  pull-left';
                    }
                    if($this->M_user->get_user_role($user_id) == 1)
                    {
                        $avata = $this->M_user->get_avata($user_id);
                    }
                    else{
                        $avata = $this->M_user->get_avata_flp($user_id);
                        } ?>
                    <!-- <li class="<?php echo $class; ?>" id="<?php echo $message_id['id']; ?>">
                        <a href="#" title=""><img class="img img-circle" alt="" width="50" height="50" src="<?php echo $avata; ?>" /> </a>   
                        <div class="message-area">
                            <span class="pointer"></span>
                            <div class="info-row">
                                <span class="user-name"><a href="#"><strong><?php echo $username; ?></strong></a> says:</span>
                                <span class="time" id="<?php echo $message_id['id']; ?>"><?php echo $chat->get_messages_time($message_id['id']); ?></span>
                                <div class="clear"></div>
                            </div>
                            <p>
                                <?php echo $chat->get_messages($message_id['id']); ?>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </li> -->
                    <li class="<?php echo $class_new; ?>" id="<?php echo $message_id['id']; ?>"> 
                        <img src="<?php echo $avata; ?>" alt="" class="<?php echo $class_new_image; ?>" />
                        <div class="chat-item">
                            <div class="chat-item-header">
                                <h5 style="text-align:justify;"><?php echo $username; ?></h5>
                                <small class="text-muted"><?php echo $chat->get_messages_time($message_id['id']); ?></small>
                            </div>
                            <p><?php echo $chat->get_messages($message_id['id']); ?></p>
                        </div>
                    </li>
                    <?php

                }
            }
        }
    }
     /**
      * Ajax update messages.
      *
      * @param int $with_id
      */
     public function ajax_update($with_id)
     {
         include APPPATH.'libraries/jchat/groups/loader.php';
         $post = $this->input->post('update');
         if (!empty($post)) {
             // Get Last Message
            $message = $chat->get_last_message();
            //var_dump($message);die;
            if (!isset($_SESSION['Group_requested_id'][$with_id])) {
                $_SESSION['Group_requested_id'][$with_id] = 0;
            }
            //echo $chat->clientID;
            //var_dump ($chat->clientID);           
            if (strlen($message['id']) !== 0 && $_SESSION['Group_requested_id'][$with_id] !== $message['id']) {
                // Get Messages
                $messages_ids = $chat->get_messages_id($chat->clientID, $chat->serverID);

                // Check if is client or server
                if (!empty($messages_ids)) {
                    foreach ($messages_ids as $message_id) {
                        if ($message['id'] == $message_id['id']) {
                            if ($message_id['user_id'] == $chat->clientID) {
                                $class = 'client';
                                $user_id = $chat->clientID;
                                $username = $chat->client;
                 $class_new = 'right';
                                $class_new_image = 'profile-photo-sm pull-right';
                            } else {
                                $class = 'server';
                                $user_id = $message_id['user_id'];
                                $username = $this->M_user->get_name($user_id);
                                $class_new = 'left';
                                $class_new_image = 'profile-photo-sm pull-left';
                            }
                        }
                    }
                    if($this->M_user->get_user_role($user_id) == 1)
                    {
                        $avata = $this->M_user->get_avata($user_id);
                    }
                    else{
                        $avata = $this->M_user->get_avata_flp($user_id);
                        }
                    echo
                    '
                    <li class="'.$class_new.'" id="'.$message['id'].'"> 
                        <img src="'.$avata.'" alt="" class="'.$class_new_image.'" />
                        <div class="chat-item">
                            <div class="chat-item-header">
                                <h5 style="text-align:justify;">'.$username.'</h5>
                                <small class="text-muted">'.$chat->get_messages_time($message['id']).'</small>
                            </div>
                            <p>'.$chat->get_messages($message['id']).'</p>
                        </div>
                        
                    </li>
                    ';
                }
            }
             $_SESSION['Group_requested_id'][$with_id] = $message['id'];
         }
     }
     /**
      * Ajax post messages.
      *
      * @param int $with_id
      */
     public function ajax_send($with_id)
     {
         include APPPATH.'libraries/jchat/groups/loader.php';
         $post = $this->input->post('message');
         
         $group_info = $this->M_channel->get_group_name($with_id);

         if (isset($post)) {
             // Insert Message
            $message = $post;
             $message_set_id = $chat->set_message($post);
            // Get Messages
            $messages_ids = $chat->get_messages_id($chat->clientID, $chat->serverID);
            $user_ids = array();
            // Check if is client or server
            if (!empty($messages_ids)) {
                foreach ($messages_ids as $message_id) {
                    $user_ids[] = $message_id['user_id'];
                    if ($message_id['id'] == $message_set_id) {
                        if ($message_id['user_id'] == $chat->clientID) {
                            $class = 'client';
                            $user_id = $chat->clientID;
                            $username = $chat->client;
                            $class_new = 'right';
                            $class_new_image = 'profile-photo-sm pull-right';
                        } else {
                            $class = 'server';
                            $user_id = $message_id['user_id'];
                            $username = $this->M_user->get_name($user_id);
                            $class_new = 'left';
                            $class_new_image = 'profile-photo-sm pull-left';    
                        }
                    }
                }
                $user_ids = array_unique($user_ids);
                if($group_info)
                {
                    foreach ($user_ids as $key => $value) {
                        if($chat->clientID != $value)
                        {
                            
                            $messages = 'There is a new message in '.$group_info['name'].' Channel';
                            $this->M_notify->addnotify($value, $messages, 'group');
                        }
                    }
                }
                if($this->M_user->get_user_role($user_id) == 1)
                {
                    $avata = $this->M_user->get_avata($user_id);
                }
                else
                {
                    $avata = $this->M_user->get_avata_flp($user_id);
                }
                echo
                '
                <li class="'.$class_new.'" id="'.$message_set_id.'"> 
                    <img src="'.$avata.'" alt="'.$username.'" class="'.$class_new_image.'" />
                    <div class="chat-item">
                        <div class="chat-item-header">
                            <h5 style="text-align:justify;">'.$username.'</h5>
                            <small class="text-muted" id="'.$message_set_id.'">'.$chat->get_messages_time($message_set_id).'</small>
                        </div>
                        <p>'.$chat->get_messages($message_set_id).'</p>
                    </div>
                </li>
                ';
            }
         }
     }
}
