GET Method
<form action="" method="get">  
Name: <input type="text" name="name"/>  
<input type="submit" value="visit"/>  
</form>  
<?php  
$name=$_GET["name"];//receiving name field value in $name variable  
echo "Welcome, $name";  
?>  

<br>
<br>

POST method
<form action="" method="post">   
<table>   
<tr><td>Name:</td><td> <input type="text" name="name"/></td></tr>  
<tr><td>Password:</td><td> <input type="password" name="password"/></td></tr>   
<tr><td colspan="2"><input type="submit" value="login"/>  </td></tr>  
</table>  
</form>

<?php  
$name=$_POST["name"];//receiving name field value in $name variable  
$password=$_POST["password"];//receiving password field value in $password variable  
  
echo "Welcome: $name, your password is: $password";  
?>