<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

  </head>
  <body>


      <div class="card">
        <div class="card-body">

              <!--begin: Datatable -->


              <table class="table table-striped table-bordered" style="width:100%" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th> Creado</th>
                    <th> Area </th>
                    <th> Usuario </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tickets_registro as $tickets_registros)
                  <tr>
                    <td>{{$tickets_registros->id}}</td>
                    <td>{{$tickets_registros->create_time}}</td>
                    <td>{{$tickets_registros->title}}</td>
                    <td>{{$tickets_registros->customer_user_id}}</td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
              <!--end: Datatable -->

        </div>
      </div>




    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#myTable').DataTable();
} );

    </script>

  </body>
</html>
