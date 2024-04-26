<?php
require_once ('pdatabase.php');
function display_data()
{
    global $conn;
    $query="select * from placements ";
    $result=mysqli_query($conn,$query);
    return $result;
    

}


?>