<?php

class UserLogin {
    
    protected $db_connect;
            
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $dbPassword = '';
        $dbName = 'pd_blog';
        
        $this -> db_connect = mysqli_connect($host_name, $user_name, $dbPassword, $dbName);
        
        if(!$this -> db_connect){
            die('Connection Failed'.mysqli_error($this -> db_connect));
        }
    }
    
    public function user_login($data){
        $user_password = md5($data['user_pass']);
        $sql = "SELECT * FROM user_login WHERE 	user_email = '$data[user_mail]' and user_pass = '$user_password'";
    
       $sql_query_result = mysqli_query($this -> db_connect, $sql);
       $admin_info = mysqli_fetch_assoc($sql_query_result);
       
       if($admin_info == true){
           
           session_start();
           $_SESSION['user_id'] = $admin_info['user_id'];
           $_SESSION['user_name'] = $admin_info['user_name'];

           header('Location: admin-panel.php');
       } else {
           header('Location: index.php');
       }
    }
    
    public function user_logout(){
        unset ($_SESSION['user_id']);
        unset ($_SESSION['user_name']);
        
        header('Location: index.php');
    }
    
    
    
}











?>