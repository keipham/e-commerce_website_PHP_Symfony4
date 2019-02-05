<?php

namespace App\Controller;

use DateTime as DT;
use App\Entity\Users;
use DateTimeInterface;
use App\Entity\Bookings;
use App\Form\BookingsType;
use App\Repository\BookingsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/bookings")
 */
class BookingsController extends AbstractController
{
    private $booking;
       
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;

    private $idUser;
     
    /********************* PUBLIC **********************/  
      
    public function __construct (BookingsRepository $booking){
        $this->booking = $booking;
    }

    /**
    * print out the calendar
    */
    public function showCalendar(Users $user) {
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
                                        $content.=$this->_showDay($i*7+$j, $user);
                                        
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
    private function _showDay($cellNumber, Users $user){
        
        $this->idUser = $user->getId();

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
            $abc = $this->showBookingStatus($this->currentDate);
            if ($this->showBookings($this->currentDate) != NULL && $abc[0]['status'] == "Reservé"){
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
                    background-color: orange;
                    text-align: center;" 
                id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"> <a style="color: black;" href="#">'.$cellContent.'</a></li>';
            }
            else if ($this->showBookings($this->currentDate) == NULL){
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
                id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"> <a style="color: black;" href="/bookings/'.$this->idUser.'/'.$this->currentYear.'/'.$this->currentMonth.'/'.$cellContent.'/new">'.$cellContent.'</a></li>';
            }
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
                id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"> <a style="color: black;" href="/bookings/'.$this->idUser.'/'.$this->currentYear.'/'.$this->currentMonth.'/'.$cellContent.'/new">'.$cellContent.'</a></li>';
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
    
    /**
     * @Route("/calendar/{id}", name="calendar", methods={"GET"})
     */
    public function calendar(Users $user): Response
    {
        $form = $this->showCalendar($user);
        return $this->render('calendrier.html.twig', [
            'calendar' => $form,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/index/{id}", name="bookings_index", methods={"GET"})
     */
    public function index(BookingsRepository $bookingsRepository, Users $user): Response
    {
        return $this->render('bookings/indexBook.html.twig', [
            'bookings' => $bookingsRepository->findAllById($user->getId())
        ]);
    }

    /**
     * @Route("/{id}/{year}/{month}/{day}/new", name="bookings_new", methods={"GET","POST"})
     */
    public function new(Request $request, Users $user, $year, $month, $day, \Swift_Mailer $mailer): Response
    {
        $booking = new Bookings($user);
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $booking->setStatus('Reservé');
            $date1 = $year.'-'.$month.'-'.$day;
            $date2 = "00:00:00";
            $booking->setBeginAt(\DateTime::createFromFormat('Y-m-d H:i:s', $date1.' '.$date2));
            $booking->setEndAt(\DateTime::createFromFormat('Y-m-d H:i:s', $date1.' '.$date2));
            //Je contrôle le nombre de jeux sélectionnés en fonction de la formule choisie
            if ($this->checkFormulaGames($booking->getFormulaName(), $booking->getGamesName()) == true){
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($booking);
                $entityManager->flush();

                $messageToAdmin= (new \Swift_Message('Nouvelle demande de réservation'))
                ->setFrom('projetnetescape@gmail.com')
                ->setTo('projetnetescape@gmail.com')
                ->setBody(
                    $this->renderView('contact/booking_notification.html.twig',
                        ['user' => $user,
                        'year' => $year,
                        'month' => $month,
                        'day' => $day
                        ]
                    ),'text/html');
                $mailer->send($messageToAdmin);

                $checkAdmin = $user->getRoles();
                if ($checkAdmin[0] == "ROLE_ADMIN"){
                    $this->addFlash('success', 'Votre demande de réservation a bien été enregistrée.');
                    return $this->redirectToRoute('admin_bookings_index');
                }
                else if ($checkAdmin[0] == "ROLE_USER"){
                    $this->addFlash('success', 'Votre demande de réservation a bien été enregistrée.');
                    return $this->redirectToRoute('games_index');
                }
            }
            
        }

        return $this->render('bookings/new.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
            'id' => $user->getId(),
            'year' => $year,
            'month' => $month,
            'day' => $day,
        ]);

    }

    /**
     * @Route("/{id}", name="bookings_show", methods={"GET"})
     */
    public function show(Bookings $booking): Response
    {
        return $this->render('bookings/show.html.twig', [
            'booking' => $booking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bookings_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bookings $booking): Response
    {
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->checkFormulaGames($booking->getFormulaName(), $booking->getGamesName()) == true){
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Vos modifications ont bien été enregistrées.');
                return $this->redirectToRoute('bookings_index', [
                    'id' => $booking->getId(),
                ]);
            }
        }

        return $this->render('bookings/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bookings_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bookings $booking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
        }
        $this->addFlash('success', 'Votre réservation a bien été supprimée.');
        return $this->redirectToRoute('admin_bookings_index');
    }

    public function showBookings ($date)
    {
        $mydate = $this->booking->findAllByDate($date);
        return $mydate;
    }

    public function showBookingStatus ($date)
    {
        $mydate = $this->booking->findBookingStatus($date);
        return $mydate;
    }

    public function checkFormulaGames ($formulaName, $gamesName){
        if ($formulaName == "Basique"){
            switch ($gamesName) {
                case "Jumanji":
                    return true;
                    break;
                case "Voodoo":
                    return true;
                    break;
                case "Assassin":
                    return true;
                    break;
                case "The Cabin":
                    return true;
                    break;
                default:
                    echo "Vous devez choisir une option parmi la catégorie Basique";
                break;
            }
        } else if ($formulaName == "Duo"){
            switch ($gamesName) {   
                case "Jumanji & Voodoo":
                    return true;
                    break;
                case "Jumanji & Assassin":
                    return true;
                    break;
                case "Jumanji & The Cabin":
                    return true;
                    break;
                case "Voodoo & Assassin":
                    return true;
                    break;
                case "Voodoo & The Cabin":
                    return true;
                    break;
                case "Assassin & The Cabin":
                    return true;
                    break;
                default:
                    echo "Vous devez choisir une option parmi la catégorie Duo";
                break;
            }
        } else if ($formulaName == "Trio"){
            switch ($gamesName) {   
                case "Jumanji & Voodoo & Assassin":
                    return true;
                    break;
                case "Jumanji & Voodoo & The Cabin":
                    return true;
                    break;
                case "Jumanji & Assassin & The Cabin":
                    return true;
                    break;
                case "Voodoo & Assassin & The Cabin":
                    return true;
                    break;
                default:
                    echo "Vous devez choisir une option parmi la catégorie Trio";
                break;
            }
        } else if ($formulaName == "La Totale"){
            switch ($gamesName) {   
                case "Jumanji & Voodoo & Assassin & The Cabin":
                    return true;
                    break;
                default:
                    echo "Vous devez choisir une option parmi la catégorie La Totale.";
                break;
            }
        }
    }
}