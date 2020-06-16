<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab_1</title>
</head>
<body>
    <?php
      $arr = [
        "Manager"=> ["name"=>"Иван","surname"=>"Иванов","role"=>"Manager", "login"=>"ivan65", "password"=>"es43"],
        "Сlient"=>["name"=>"Афанасий","surname"=>"Авдотьев","role"=>"Сlient", "login"=>"Avd734", "password"=>"vbw76"],
        "Admin"=> ["name"=>"Ада ","surname"=>"Байрон","role"=>"Admin", "login"=>"ada646", "password"=>"dg793"]
     ];
    class Visiter{
        protected $login; 
        protected $password;
        protected $name;
        protected $surname;
        protected $role;

        function __construct($user) {
            $this->login = $user["login"];
            $this->password = $user["password"];
            $this->role = $user["role"];
            $this->name = $user["name"];
            $this->surname = $user["surname"];
        }
    };
    class ClientClass extends Visiter{
        function getInfo(){
            echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
            ". Вы можете на сайте просматривать информацию доступную пользователям.";
        }
    };
    class ManagerClass extends Visiter{
        function getInfo(){
            echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
            ". Вы можете на сайте изменять, удалять и создавать клиентов.";
        }
    };
    class AdminClass extends Visiter{
        function getInfo(){
             echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
            ". Вы можете на сайте делать всё.";
        }
    };
?>
    <p>Введите логин и пароль:</p>
    <form method="post">
        <p>Логин: <input type="text" name="login" > </p>
        <p>Пароль: <input type="text" name="password" > </p>
        <input type="submit" value="Ввести">
    </form>
    <div style=" border: 1px solid green; width: 300px; height: 200px">
<?php
    $password = $_POST["password"];
    $login = $_POST["login"];

    if($password || $login){
        foreach($arr as $k =>$v){
        if(($arr[$k]["login"] ==  $login) && ($arr[$k]["password"] == $password) ){
            $counter;
            $visiter;
            switch ($k) {
                case "Manager":
                    $visiter = new ManagerClass($v);
                    $counter++;
                    break;
                case "Сlient":
                    $visiter = new ClientClass($v);
                    $counter++;
                    break;
                case "Admin":
                    $visiter = new AdminClass($v);
                    $counter++;
                    break;
            };
        }; 
    };
        if($counter == 0) {
            echo "Вы неправильно ввели логин или пароль или вы не зарегестрированы";
        }else{
            echo $visiter->getInfo();
        };
    };
?>
        </div>
</body>
</html>
