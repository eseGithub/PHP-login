<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error");
    }
    
    include('connect.php');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $name = $_POST['name'];
        $password = $_POST['pwd'];
        if ($name && $password){
                $password = md5($password);
                $sql = "select * from user where username = '$name' and password='$password'";
                $res = $pdo->query($sql);
                if($res->rowCount()!=0){
                    header("refresh:1;url=welcome.html");
                    exit;
                }else{
                	echo "Incorrect username or password";
                    exit;
                    }
                    
        }else{
            echo "NULL is username or password";
            exit;
        }
    }catch (Exception $e){
        echo "illegal input";
    }
    $pdo = NULL;
?>