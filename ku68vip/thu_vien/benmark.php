<?php
//Tính thời gian thực thi trang php của bạn.
//Cách sử dụng:
//$ControlTimeLoad = new CaculatorScript_Timer();
//$ControlTimeLoad->start();
//echo $ControlTimeLoad;
//$ControlTimeLoad->stop();
 
class benmark {
     
    var $start_time = 0;
    var $end_time = 0;
     
    public function Timer($start=0) {
        if($start) $this->start();
    }
     
    public function start() {
        $timeparts = explode(' ',microtime());
        $this->start_time = $timeparts[1].substr($timeparts[0],1);
    }
     
    public function stop($show=1, $decimal_place=8) {
        $timeparts = explode(" ",microtime());
        $this->end_time = $timeparts[1].substr($timeparts[0],1);
         
        if($show)return  $this->display($decimal_place);
    }
     
    public function display($decimal_place=8) {
        return number_format(bcsub($this->end_time, $this->start_time,6), $decimal_place) . ' (s)';
    }
     
}
?>