<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   

    <title>Prueva conexion local con archivo de datatables </title>
</head>
<body>
<button id="print" onclick="printContent('id name of your div');" >Print</button>
<!-- <meta http-equiv="refresh" content="120 "> -->
@include('layouts/scripts/scriptsGuest')
@yield('scripts')
@include('layouts/scripts/scripts')
    <h3>Prueva de codigo js </h3>
    <table id="ejemplotab" class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th>Prueva</tr> 
        </tr>
               
    </thead>
    <tbody>
        <tr>
        <td>Prueva de datatable</td>
        </tr>
        
    </tbody>
    </table>
<script> 
$(document).ready(function(){
    $('ejemplotab').DataTavle({});
});




</script>


<script>

function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>



</body>

</html>