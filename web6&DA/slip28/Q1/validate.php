<?php 
/*
create the user table in pg admin and insert the record in it


CREATE TABLE IF NOT EXISTS public."user"
(
    id bigint ,
    username text COLLATE pg_catalog."default",
    password text COLLATE pg_catalog."default"
)
INSERT INTO public.user (id, username, password)
VALUES
    (1, 'gaurav', 123456789);
    

*/
$username = $_POST['username'];
$pass  = $_POST['password'];

$conn = pg_connect("host = localhost user=postgres password=tybcs dbname=sample2");
if($conn != null)
{
    $query = "select * from public.user where username = '$username' and password='$pass'";

    $rs = pg_query($conn , $query);
    $flag = false;
    while($row = pg_fetch_array($rs))
    {
        $flag = true;
    }
    if($flag){
        echo "OK";
    }
    else{
        echo "NO";
    }
}

