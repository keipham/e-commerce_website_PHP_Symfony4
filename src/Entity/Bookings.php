<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Bookings;
/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingsRepository")
 */
class Bookings
{
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $customerId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $formulaId;

    /**
     * @ORM\Column(type="integer")
     */
    private $gamesId;
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  

        
        $content='<div id="calendar" style="margin: 0px auto; 
                                            padding: 0px; 
                                            width: 602px; 
                                            font-family: Helvetica, "Times New Roman", Times, serif;">'.
                        '<div class="box" style="position: relative; 
                                                 top: 0px;
                                                 left: 0px;
                                                 width: 100%;
                                                 height: 40px;
                                                 background-color: #787878;">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content" style="1px solid #787878;
                                                         border-top-color: rgb(120, 120, 120);
                                                         border-top-style: solid;
                                                         border-top-width: 1px;">'.
                                '<ul class="label" style="float: left;
                                                          margin: 0px;
                                                          0px;padding: 0px;
                                                          margin-top: 5px;
                                                          margin-left: 5px;">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear" style="clear: both;"></div>';     
                                $content.='<ul class="dates" style="float: left; 
                                                                    margin: 0px;
                                                                    padding: 0px;
                                                                    margin-left: 5px;
                                                                    margin-bottom: 5px;">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                        
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear" style="clear: both;"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         
        return '<li style="color:black;
                    margin: 0px;
                    margin-top: 0px;
                    margin-right: 0px;
                    padding: 0px;
                    margin-right: 5px;
                    margin-top: 5px;
                    line-height: 80px;
                    vertical-align: middle;
                    float: left;
                    list-style-type: none;
                    width: 80px;
                    height: 80px;
                    font-size: 25px;
                    background-color: #DDD;
                    text-align: center;" 
                id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"> <a style="color: black;" href="/bookings/'.$this->currentYear.'/'.$this->currentMonth.'/'.$cellContent.'">'.$cellContent.'</a></li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header" style="line-height: 40px;
                                        vertical-align: middle;
                                        position: absolute;
                                        left: 11px;
                                        top: 0px;
                                        width: 582px;
                                        height: 40px;
                                        text-align: center;">'.
                '<a class="prev" style="left: 0px;
                                        position: absolute;
                                        top: 0px;
                                        height: 17px;
                                        display: block;
                                        cursor: pointer;
                                        text-decoration: none;
                                        color: #FFF;"
                 href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                    '<span class="title" 
                    style="color: #FFF;
                           font-size: 18px;">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" style="right: 0px;
                                        position: absolute;
                                        top: 0px;
                                        height: 17px;
                                        display: block;
                                        cursor: pointer;
                                        text-decoration: none;
                                        color: #FFF;" 
                href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title" 
            style="margin: 0px;
            margin-top: 0px;
            padding: 0px;
            margin-right: 5px;
            margin-top: 5px;
            line-height: 80px;
            float: left;
            list-style-type: none;
            width: 80px;
            height: 80px;
            font-size: 25px;
            background-color: #DDD;
            text-align: center;">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getFormulaId(): ?int
    {
        return $this->formulaId;
    }

    public function setFormulaId(int $formulaId): self
    {
        $this->formulaId = $formulaId;

        return $this;
    }

    public function getGamesId(): ?int
    {
        return $this->gamesId;
    }

    public function setGamesId(int $gamesId): self
    {
        $this->gamesId = $gamesId;

        return $this;
    }
}
