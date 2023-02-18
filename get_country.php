<?php
    require_once 'dbconnect.php';


    if(!empty($_REQUEST["bid"])) {

    $query ="SELECT DISTINCT(roomnumber) FROM tbl_availability WHERE buildingname =" . "'" . mysqli_escape_string($conn, $_POST["bid"] ) ."' ORDER BY roomnumber ASC";
    //echo $query ="SELECT * FROM geo WHERE Region =" . "'" . $_POST["region_id"] ."'";

    $result = mysqli_query($conn, $query);
?>
    <option value="">Select Room</option>

<?php
    while($row2=mysqli_fetch_assoc($result)){

        //var_dump($row2);
        if($bul2[$row2['roomnumber']] != true && $row2['roomnumber'] != 'roomnumber' || 1)        { ?>
            <option value="<?php echo $row2['roomnumber']; ?>"><?php echo     $row2['roomnumber']; ?>  </option>
 <?php
         $bul2[$row2['Country']] = true;
         }
     }
    }
?>
