<?php 
      
      include 'header.php';
      include 'config.php';
      include 'Database.php';

?>

<?php

 $db = new Database();
 $query = "SELECT * FROM php_user";
 $read = $db->select($query); 

?>
<?php

    if(isset($_GET['msg'])){
        echo "<span style='color:green'>".$_GET['msg']."</span>";
    }

?>


<table class="tmain">
<tr>
<th>SL</th>
<th>Name</th>
<th>Email</th>
<th>Skill</th>
<th>Action</th>
</tr>

<?php
if($read) {?>
<?php 
$sl=1;
while($row = $read->fetch_assoc()) {?>

<tr>
<td><?php echo $sl++ ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['skill']; ?></td>
<td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
</tr>
<?php
}
?>

<?php
} else{
?>
<p>Theres no data</p>

<?php
}
?>

</table>
<a href="create.php">create data</a>


<?php include "footer.php"; ?>