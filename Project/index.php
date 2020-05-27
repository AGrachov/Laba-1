<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        function __construct($arr) {
            $this->login = $arr["login"];
            $this->password = $arr["password"];
            $this->name = $arr["name"];
            $this->surname = $arr["surname"];
            $this->role = $arr["role"];
        }
        function getInfo(){
            switch($this->role){
                case"Manager":
                     echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
                      ". Вы можете на сайте изменять, удалять и создавать клиентов.";
                     break;
                case"Сlient":
                     echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
                        ". Вы можете на сайте просматривать информацию доступную пользователям.";
                     break;
                case"Admin":
                    echo "Здравствуйте"." ".$this->role." ".$this->name." ".$this->surname.
                        ". Вы можете на сайте делать всё.";
                    break;
            }
        }
        
        };
        class ManagerClass extends Visiter{
            function isManager(){
                return $this->role === 'manager';
            }
        };
        class ClientClass extends Visiter{
            function isClient(){
                return $this->role === 'client';
            }
        };
        class AdminClass extends Visiter{
            function isAdmin(){
                return $this->role === 'admin';
            }
        };
         
        $pass = $_POST["password"];
        $log = $_POST["login"];

    ?>
    <p>Введите логин и пароль:</p>
    <form method="post">
        <p>Логин: <input type="text" name="login" > </p>
        <p>Пароль: <input type="text" name="password" > </p>
        <input type="submit" value="Ввести">
    </form>
    <div style="margin: 0 auto; border: 2px solid crimson; width: 300px; height: 200px">
    <?php
    if($pass || $log){
    foreach($arr as $k =>$v){
    if(($arr[$k]["login"] ==  $log) ||($arr[$k]["password"] == $pass) ){
        $counter;
        switch ($k) {
            case "Manager":
                $mane = new ManagerClass($v);
                $mane->getInfo();
                $counter++;
                break;
            case "Сlient":
                $cli = new ClientClass($v);
                $cli->getInfo();
                $counter++;
                break;
            case "Admin":
                $adm = new AdminClass($v);
                $adm->getInfo();
                $counter++;
                break;
        };
        }; 
    };
    if($counter == 0) {
        echo "Вы неправильно ввели логин или пароль или вы не зарегестрированы";
};
    };
        ?>
        </div>
</body>
</html>