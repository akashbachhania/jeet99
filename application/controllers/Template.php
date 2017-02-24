<?php
/**
 * More_ttt File Doc Comment.
 *
 * @category More_Ttt
 *
 * @author   99sound <admin@99sound.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link     http://www.99Sound.com/
 */
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * More_ttt Class Doc Comment.
 *
 * @category More_Ttt
 *
 * @author   99sound <admin@99sound.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link     http://www.99Sound.com/
 */
class Template extends CI_Controller
{
    /**
     * Function constructor to initiate values & load data.
     * 
     * @return nothing.
     */
    public function __construct()
    {
        parent::__construct();
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

      public function template1(){

        $this->load->view('html_template/template1');
      }

      public function template2(){
       
        $this->load->view('html_template/template2');
      }
    
   }