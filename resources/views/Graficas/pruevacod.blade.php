





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Prueva de codigo objetos  </h1>


@php




class ticketdefinitivo {
     public $numerodetkt;
     public $descripicontkt;
        

// Metodp de contruccion 
        public function __construct($t,$des,$fech,$que){
            $this->numerodetkt = $t;
            $this->descripicontkt = $des;
            $this->fechacreacion = $fech;
            $this->statustkt = $que;

        }
        public function __destruct(){
            
        }

 }



 foreach($tktts as $ticket){
    

     $nombretkt = $ticket->tn;
     $contenidotkt = $ticket->title;
     $fechacreacion = $ticket->create_time;
     $statustkt = $ticket->queue_id;

    $tkt = new ticketdefinitivo($nombretkt,$contenidotkt,$fechacreacion,$statustkt); 
    echo $tkt->numerodetkt,'  '.$tkt->descripicontkt.'  '.$tkt->fechacreacion.' -> '.$tkt->statustkt.'<br>'; 
    
 }   

 var_dump($tkt);

 
 
@endphp 

<!--$tktts contiene el primer ticket dentro de el campo ticket en la db -->
    
</body>
</html>