<?php
set_include_path(BASEPATH.'../includes');
include('Mustache.php');

class Program extends Mustache {

    public function current_user() {
       return $this->currentUser; 
    }

    public function current_facebook_id() {
        return $this->currentFacebookID;
    } 
    
    public function programs_feed() {

        return $this->programs; 
    }

    public function init($programsFromModel, $user,
        $facebook_id, $programDetails='') {
        $this->programs = $programsFromModel;
        $this->currentUser = $user[0]['name']; 
        $this->programDetails = $programDetails;
    }
    public function programDetails(){
        //     $tmp=$this->programDetails;
        // var_dump($tmp);
        return $this->programDetails;
    }
    protected function _convertTime($value) {
        if(!empty($value)) {
            // Convert ts of the message
            $value['ts'] = $this->_getRelativeTime($value['ts']);

            // Convert ts of replies
            foreach($value as $key => $v) {
                // Find the replies array
                if($key == 'replies' && count($value[$key]) > 0) {
                    // Iterate through each reply if we found some
                    foreach($v as $r => $r_v) {
                      $value[$key][$r]['ts'] = $this->_getRelativeTime($r_v['ts']);
                    }
                }
            }
        }

        return $value;
    }

    // Facebook like timestamps
    protected function _getRelativeTime($timestamp){ 
        $difference = time() - $timestamp; 
        $periods = array("sec", "min", "hour", "day", "week", 
            "month", "years", "decade"); 
        $lengths = array("60","60","24","7","4.35","12","10"); 

        if ($difference > 0) { // this was in the past 
            $ending = "ago"; 
        } else { // this was in the future 
            $difference = -$difference; 
            $ending = "to go"; 
        }        

        for($j = 0; $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j]; 
        }

        $difference = round($difference); 
        if($difference != 1) $periods[$j].= "s"; 
        $text = "$difference $periods[$j] $ending"; 
        return $text; 
    } 

}
