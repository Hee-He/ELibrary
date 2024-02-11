<?php
        
        require('../database/connect.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $user = 
        $stmt = $conn->prepare("SELECT * FROM issuedbook");
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->num_rows;

        if ($rows === 0) {
            echo "<h1>No Issued Books</h1>";
        } else {
            echo ("<table border='2'>
                <tr>
                    <td>Semester</td>
                    <td>Books</td>
                    <td>Issued Date</td>
                    <td>Return Date</td>
                </tr>");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['semester'] . "</td>
                    <td>" . $row['book1'] . "<br>" . $row['book2'] . "<br>" . $row['book3'] . "<br>" . $row['book4'] . "<br>" . $row['book5'] . "</td>
                    <td>" . $row['issuedate'] . "</td>
                    <td class='danger'>" . $row['returndate'] . "</td>
                </tr>";
            }
            $stmt = $conn->prepare("SELECT *, DATEDIFF(returndate, issuedate) AS date_difference FROM issuedbook");
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                $dateDifference = $row['date_difference'];
                if ($dateDifference < 10) {
                    echo "<style> .danger{background-color: red;}</style>";
                }
            }
            
        
        }  
        $conn->close();
        ?>