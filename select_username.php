<?php
session_start();

$select_username =$_POST['select_username'];
$_SESSION['select_username']= $select_username;

$role = $_POST['role'];
$_SESSION['role']= $role;


?>

<script type="text/javascript">
window.location.replace("admin_edit-user.php");
</script>
