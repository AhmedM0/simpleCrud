<?php 
      
      include 'header.php';
      include 'config.php';
      include 'Database.php';

?>

<?php

 $db = new Database();
 if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

    if($name == '' || $email == '' || $skill == ''){
        $error = "Enter The info";
    } else {

        $query = "INSERT INTO php_user(name, email, skill) Values ('$name', '$email', '$skill')";
        $create = $db->insert($query);

    }
 }   
?>

<?php

    if(isset($error)) {
        echo "<span style='color:red'>".$error."</span>";
    }

?>


<form action="create.php" method="post">
<table class="tmain">

 
<tr>
<td>name</td>
<td><input type="text" name="name" placeholder="please enter name"></td>
</tr>

<tr>
<td>email</td>
<td><input type="text" name="email" placeholder="please enter email"></td>
</tr>

<tr>
<td>skills</td>
<td><input type="text" name="skill" placeholder="please enter skills"></td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="submit" value="submit">
<input type="reset"  value="cancel">
</td>
</tr>

</table>
</form>
<a href="index.php">Go Back</a>

<?php include "footer.php"; ?>