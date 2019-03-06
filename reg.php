<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("error");
    }
    
    $name=$_POST['name'];
    $password=$_POST['pwd'];
    $password1=$_POST['pwd1'];
    if($password!=$password1)
    {
    	echo 'Passwords does not match!';
        exit;
    }

    include('connect.php');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try{
		$sql = "select * from user where username = '$name'";
		$res = $pdo->query($sql);
		if($res){
			if($res->rowCount()!=0){
				echo "User name already exists";
				exit;
    		}else{
    			$password = md5($password);
        		$sql="insert into user(username,password) values (?,?)";
        		$ps = $pdo->prepare($sql);
        		$ps->bindParam(1,$name);
        		$ps->bindParam(2,$password);
        		if($ps->execute()){
            		echo 'success';
        		}
    		}
		}
	}catch (Exception $e)
	{
		echo "illegal input";
	}
    $pdo = NULL;
?>