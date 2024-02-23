<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- First Bar Chart: New Registrations -->
      <?php
      include '../php/connection.php';

      $startDate = date('Y-m-d', strtotime('-7 days'));
      $endDate = date('Y-m-d');

      $query = "SELECT DATE(regDate) as regDate, COUNT(*) as new_registrations 
                FROM customer 
                WHERE DATE(regDate) BETWEEN '$startDate' AND '$endDate'
                GROUP BY DATE(regDate)";

      $stmt = $pdo->query($query);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $newRegistrationsData = [];
      $currentDate = $startDate;
      while ($currentDate <= $endDate) {
          $newRegistrationsData[$currentDate] = 0;
          $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
      }

      foreach ($result as $row) {
          $date = $row['regDate'];
          $newRegistrationsData[$date] = (int)$row['new_registrations'];
      }

      $newRegistrationsArray = [['Date', 'New Registrations']];
      foreach ($newRegistrationsData as $date => $count) {
          $newRegistrationsArray[] = [$date, $count];
      }
      $newRegistrationsJsonData = json_encode($newRegistrationsArray);
      ?>

      <script>
      google.charts.load('current', {'packages': ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable(<?php echo $newRegistrationsJsonData; ?>);

          var options = {
              title: 'New Registrations Over the Past 7 Days',
              hAxis: {
                  title: 'Date'
              },
              vAxis: {
                  title: 'Number of Registrations'
              }
          };

          var chart = new google.visualization.ColumnChart(
              document.getElementById('barchart_div'));
          chart.draw(data, options);
      }
      </script>

    <!-- Second Bar Chart: Tickets Added and Replied -->
    <?php
    $startDate = date('Y-m-d', strtotime('-7 days'));
    $endDate = date('Y-m-d');

    $ticketsQuery = "SELECT DATE(date) as creation_date, COUNT(*) as tickets_added 
                    FROM ticket 
                    WHERE DATE(date) BETWEEN '$startDate' AND '$endDate'
                    GROUP BY DATE(creation_date)";

    $stmt = $pdo->query($ticketsQuery);
    $ticketsResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $repliesQuery = "SELECT DATE(date) as reply_date, COUNT(*) as tickets_replied 
                    FROM reply 
                    WHERE DATE(date) BETWEEN '$startDate' AND '$endDate'
                    GROUP BY DATE(reply_date)";

    $stmt = $pdo->query($repliesQuery);
    $repliesResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $ticketData = [];
    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        $ticketData[$currentDate] = ['tickets_added' => 0, 'tickets_replied' => 0];
        $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
    }

    foreach ($ticketsResult as $row) {
        $date = $row['creation_date'];
        $ticketData[$date]['tickets_added'] = (int)$row['tickets_added'];
    }

    foreach ($repliesResult as $row) {
        $date = $row['reply_date'];
        $ticketData[$date]['tickets_replied'] = (int)$row['tickets_replied'];
    }

    $ticketDataArray = [['Date', 'Tickets Added', 'Tickets Replied']];
    foreach ($ticketData as $date => $counts) {
        $ticketDataArray[] = [$date, $counts['tickets_added'], $counts['tickets_replied']];
    }
    $ticketDataJsonData = json_encode($ticketDataArray);
    ?>

    <script>
    google.charts.load('current', {'packages': ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $ticketDataJsonData; ?>);

        var options = {
            title: 'Tickets Added and Replied Over the Past 7 Days',
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'Number of Tickets'
            }
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('columnchart_material'));
        chart.draw(data, options);
    }
    </script>

     <!--ticket bar chart-->
     <?php
      include '../php/connection.php';

      $query = "SELECT priority, COUNT(*) as count FROM ticket GROUP BY priority";
      $stmt = $pdo->query($query);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $counts = array();
      foreach ($result as $row) {
          $counts[$row["priority"]] = $row["count"];
      }

      $totalQuery = "SELECT COUNT(*) as totalCount FROM ticket";
      $totalStmt = $pdo->query($totalQuery);
      $totalResult = $totalStmt->fetch(PDO::FETCH_ASSOC);
      $totalCount = $totalResult['totalCount'];

      $newQuery = "SELECT COUNT(*) as newCount FROM ticket WHERE status = 'New'";
      $newStmt = $pdo->query($newQuery);
      $newResult = $newStmt->fetch(PDO::FETCH_ASSOC);
      $newCount = $newResult['newCount'];
    ?>


    <script>/* bar chart - daily registration*/
    google.charts.load('current', {'packages': ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $jsonData; ?>);

        var options = {
            title: 'New Registrations Over the Past 7 Days',
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'Number of Registrations'
            }
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('barchart_div'));
        chart.draw(data, options);
    }
</script>

    <!-- Pie Chart: Number of Tickets by Category -->
    <?php
      $categoryQuery = "SELECT category, COUNT(*) as ticket_count FROM ticket GROUP BY category";
      $stmt = $pdo->query($categoryQuery);
      $categoryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $categoryData = [];
      foreach ($categoryResult as $row) {
          $categoryData[] = [$row['category'], (int)$row['ticket_count']];
      }

      $categoryJsonData = json_encode($categoryData);
    ?>

    <script>
        google.charts.load('current', {'packages': ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $categoryJsonData; ?>);

            var options = {
                title: 'Number of Tickets by Category'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>


</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a style="text-decoration: none;color: black;" href="searchticket.php"><li>Search<br>Ticket</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>
    
            <div>
                <img src="../icons/logo.png" alt="logo" style="width:70px;height:70px;margin-top:10px;margin-left:20px">
            </div>
            <div style="width:400px;margin-top:20px;margin-left:-60px">
                    <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font><br>
                    <font style="font-size: 15px;">Technical Support Team</font>
            </div>

    
            <div style="margin-left: 350px;">
                <ul id="topnav">
                    <a href="tickets.php"><li>Create Ticket</li></a>
                    <li>Account</li>
                </ul>
            </div>
    </div>

      <!--action nav-->
    <div class="frame1" style="margin-left:190px;"> 
        <ul id="actionnav3">
            <a href="../admin.php"><li>All tickets : <?php echo $totalCount; ?></li></a>
            <a href="newfilterticket.php"><li>New tickets : <?php echo $newCount; ?></li></a>
            <div style="float:left">
                <a href="criticalfilter.php"><li style="background-color:#BA3140;color:white">Criticle Priority : <?php echo isset($counts['Critical']) ? $counts['Critical'] : 0; ?></li></a>
                <a href="highfilterticket.php"><li style="background-color:#D1C824;color:white">High Priority : <?php echo isset($counts['High']) ? $counts['High'] : 0; ?></li></a>
                <a href="mediumfilter.php"><li style="background-color:#202984;color:white">Medium Priority : <?php echo isset($counts['Medium']) ? $counts['Medium'] : 0; ?></li></a>
                <a href="lowfilter.php"><li style="background-color:#1A8419;color:white">Low Priority : <?php echo isset($counts['Low']) ? $counts['Low'] : 0; ?></li></a>
            </ul>
            </div>
    </div>

    <?php
    // Include the database connection file
    include '../php/connection.php';

    // Query to get the count of registered users
    $userCountQuery = "SELECT COUNT(*) as userCount FROM customer";
    $stmt = $pdo->query($userCountQuery);
    $userCountResult = $stmt->fetch(PDO::FETCH_ASSOC);
    $userCount = $userCountResult['userCount'];
    ?>

    <div class="frame1" style="margin-left:190px;"> 
        <ul id="actionnav3">
            <li style="background-color:#45b1e1">Number of registered Users : <?php echo $userCount; ?></li>
        </ul>
    </div>

    <div class="frame1" id="barchart_div" style="margin-right:20px"></div><!-- bar chart-->
    <div class="frame1" id="columnchart_material" style="margin-right:20px"></div><!--ticket bar chart-->
    <div class="frame1" id="chart_div" ></div><!-- pie chart-->

   <!-- <div id="ttable" class="frame1" style="float:right;margin-top:-240px;margin-right:100px;">
        <table style="width:500px;min-height:100px;">
            <thead>
                <th>Admin Id</th>
                <th>Admin Name</th>
                <th>#Replied Tickets</th>
            </thead>
            <tr>

            </tr>
        </table>
    </div> -->


    <div>
        <footer style="position:relative">
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>

    <script>
    window.onload = function() {
        var pageHeight = document.body.offsetHeight;

        document.getElementById('navdiv').style.height = pageHeight + 'px';
        };
    </script>
    
    
</body>



</html>