<?php 
/*
CREATE TABLE IF NOT EXISTS public.teacher
(
    id bigint,
    name text COLLATE pg_catalog."default",
    branch text COLLATE pg_catalog."default",
    exp integer
)
*/
$id = $_GET['id'];

$conn = pg_connect("host=localhost user=postgres password=tybcs dbname=sample1");
if($conn!=null)
{
    $query = "select * from public.emp where id = '$id'";
    $res = pg_query($conn , $query);
    while($row = pg_fetch_array($res))
    {
        echo "employee id : $row[0] <br>";
        echo "employee Name : $row[1] <br>";
        echo "employee  designation : $row[2] <br>";
        echo "employee salary : $row[3] <br>";

    }
}
else{
    echo "Connection is not enstablished";
}

