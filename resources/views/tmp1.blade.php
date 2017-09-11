<html>
    <head>
        <title> asdasd </title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
         <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <table id= 'mytable'>
            <thead>
                <th>Name</th>
                <th>Percent</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        
        <script>           
            $(document).ready(function() {
                 $('#mytable').DataTable({
                    processing      : true,
                    serverSide      : true,
                    ajax            : '{{ URL::asset('/data') }}',
                    columns         : [
                        { data: 'name' , name: 'name'},
                        { data: 'percent' , name: 'percent'}
                    ]
                });
            });              
        </script>
    </body>
</html>