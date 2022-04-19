<?php


if ($_SERVER['REQUEST_METHOD']=="POST"){
    if(!$conecte_databez=new mysqli("localhost","root" ,"","acount")){
        die('Could not connect');
    }
    $Create_an_account="";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['EMAIL'];


    if(!preg_match('/[\?\$\#\@\;\:\/\=\"\<\>\%\{\}\|\^\~\[\`\*\+0-9]+/',$_POST['name']) and !empty($_POST['name'])){
        $name=$_POST['name'];
    }
    if(!empty($_POST['age']) and $_POST['age']>=10 and $_POST['age']<=30){
        $age=$_POST['age'];
    }
    if(!empty($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    if(!empty($POST['EMAIL']) and preg_match('/[\W\]+@[a-zA-Z]+.[a-zA-Z]/',$_POST['EMAIL'])){
        $email=$_POST['EMAIL'];
    }
    if($_POST['name']!=NULL and $_POST['age'] !=NULL and $_POST['gender'] !=NULL and $_POST['EMAIL'] !=NULL){
        if($conecte_databez->query("INSERT INTO account(name , age, gender, email) VALUES ('$name' , '$age' , '$gender' , '$email')") ){
            $Create_an_account = "created";
        }else{
            echo " erorr";
        }
    }else{
        echo "creat my acount";
    }
}



?>


<form  method="post">
<p>name :  
    <input type="text" placeholder="enter your name " name="name">
</p>

<p>age &nbsp;  &nbsp;: 
    <input type="text" placeholder="enter your age " name="age">
</p>

<p>gender: 
    <!-- <input type="text" placeholder="enter your gender " name="gender"> -->
    <select  name="gender" >
        <option value="male" selected="">male</option>
        <option value="female">female</option>
    </select>
</p>

<p>email : 
    <input type="text" placeholder="enter your email " name="EMAIL">
</p>


<p> 
    <input type="submit" >

</form>