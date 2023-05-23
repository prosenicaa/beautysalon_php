<?php

require 'dbBroker.php';
require 'models/Client.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" href="img/logo2.png">
    <link rel="stylesheet" href="css/main.css">
    <title>Appointments</title>
</head>
<body>

<?php include('templates/header.php'); ?>

<div class="container mt-5">
        <div class="row">
            <form class="col-sm-5" id="myform">
                <h3 class="alert-warning text-center p-2">
                    Add/Update Appointments
                </h3>
                <div>
                    <input type="text" class="form-control" id="apid" disabled/>
                    <label for="fullnameid" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="fullnameid"/>
                </div>
                <div>
                    <label for="dateid" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateid"/>
                </div>
                <div>
                    <label for="serviceid" class="form-label">Service</label>
                    <input type="text" class="form-control" id="serviceid"/>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" id="btnadd">
                        Save
                    </button>
                </div>
                <div id="msg"> </div>
            </form>

            <div class="col-sm-7 text-center">
                <h3 class="alert-warning p-2">Show Appointments</h3>
                <div style="text-align:center;">

            <input type="text" id="myInput" class="btn" placeholder="Find your appointment" onkeyup="search()">

        </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col"><button class="btn" onclick="sort()"><img src="img/arrowup1.png" style="width: 25px;height: 25px;"></button>Full name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Service</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
        </div>


<?php include('templates/footer.php'); ?>


<script>
   function search() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbody");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");

    var found = false;
    for (j = 1; j < td.length; j++) {
      txtValue = td[j].textContent || td[j].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        found = true;
        break;
      }
    }

    tr[i].style.display = found ? "" : "none";
  }
}


function sort() {
            var table, tableRows, change, i, el1, el2, rotate;
            table = document.getElementById("tbody");
            change = true;

            while (change) {
                change = false;
                tableRows = table.rows;
                for (i = 1; i < (tableRows.length - 1); i++) {
                    rotate = false;
                    el1 = tableRows[i].getElementsByTagName("td")[1];
                    el2 = tableRows[i + 1].getElementsByTagName("td")[1];
                    if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                        rotate = true;
                        break;
                    }
                }
                if (rotate) {
                    tableRows[i].parentNode.insertBefore(tableRows[i + 1], tableRows[i]);
                    change = true;
                }
            }
        }



</script>


<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>
</html>