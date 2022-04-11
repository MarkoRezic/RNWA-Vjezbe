<?php
//postaviti u xampp htdocs folder
header("Access-Control-Allow-Origin: *");
$db = mysqli_connect("localhost:3306","root","","hr");

if($db) {

    $result2 = mysqli_select_db($db, "hr") or die("Doslo je do problema prilikom odabira baze...");
    $sql2="SELECT * FROM employees";

    $result2 = mysqli_query($db, $sql2) or die("Doslo je do problema prilikom izvrsavanja upita...");
    $n = mysqli_num_rows($result2);
    echo "<table class='data-table'>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Actions</th>
    </tr>";
    if ($n > 0){
        while ($myrow = mysqli_fetch_row($result2)){
                echo "<tr>";
                echo "<td>" . $myrow[1] . "</td>";
                echo "<td>" . $myrow[2] . "</td>";
                echo "<td>
                    <a href='#details'>DETAILS</a>
                    <a href='#update'>UPDATE</a>
                    <a href='#delete'>DELETE</a>
                </td>";
                echo "</tr>";
                
            }
        }
    else {
        echo "<tr><td colspan='3'>Nema rezultata</td></tr>";
    }	
    echo "</table>";
}
else {
    echo "<br>Nije proslo spajanje<br>";
}

?>