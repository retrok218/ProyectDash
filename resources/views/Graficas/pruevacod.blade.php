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
        public function __construct($t,$des){
            $this->numerodetkt = $t;
            $this->descripicontkt = $des;

        }
        public function __destruct(){
            
        }
 }
 foreach($tktts as $ticket){
    

     $nombretkt = $ticket->tn;
     $contenidotkt = $ticket->title;
    $tkt = new ticketdefinitivo($nombretkt,$contenidotkt); 
    echo $tkt->numerodetkt.'<br> '.$tkt->descripicontkt.'<br>';
 }   
 
 
@endphp 




    
</body>
</html>