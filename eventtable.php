<link rel="stylesheet" href="./css/eventtable.css">

<div class="container">
    <div class="table-responsive">
      <table class="table" style="width:100%">
        <thead>
          <tr>
            <th scope="col">NGO Name</th>
            <th scope="col">Event Name</th>
            <th scope="col">Date</th>
            <th scope="col">Venue</th>
          </tr>
        </thead>
        <tbody>
            <?php
              
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "ngoDB";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT * FROM ngoevent";
              $result = $conn->query($sql);

              while($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $event = $row["event"];
                $date = $row["date"];
                $venue = $row["venue"];
                echo "<tr>";
                echo "<td class=\"noBorder\">$name</td>";
                echo "<td class=\"noBorder\">$event</td>";
                echo "<td class=\"noBorder\">$date</td>";
                echo "<td class=\"noBorder\">$venue</td>";
                echo "</tr>";
              }

            ?>
        </tbody>
      </table>
    </div>
  </div>