<?php require_once 'code.php';?>
<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>



<select id="mySelect">
<option value="" disabled selected id="choose" >Choose an option</option>
    <?php
        $sql = "SELECT * FROM illness;";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<option value=".$row['illness_code']." data-description=".$row['illness_desc'].">".$row['illness_code']."</option>";
        }
    ?>
</select>
<?php echo "<p id='description'></p>";?>
     
<script>    
        $('#mySelect').change(function(){
            var $selected = $(this).find(':selected');

            $('#description').html($selected.data('description'));
        }).trigger('change'); // run handler immediately
</script> 

</body>
</html>
