<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- Q. 1) Create TEACHER table as follows TEACHER(tno, tname, qualification, salary). Write Ajax 
program to select a teachers name and print the selected teachers details -->

    <select id="selectName">
        <option value="0">Select employee Name</option>
        <?php
             $conn = pg_connect("host=localhost user=postgres password=tybcs dbname=sample1");

             if($conn)
             {
                $query = "select * from emp";
                $res = pg_query($conn , $query);
                while($row = pg_fetch_array($res))
                {
                    echo "<option value= $row[0] >$row[1]</option>";
                }
             }
             else{
                echo "Something went wrong";
             }
        ?>
    </select>

    <div id="showDetails">

    </div>

    <script>
        $(document).ready(function(){
            $("#selectName").change(function(){

                $.ajax({
                    type:'GET',
                    url:"main.php",
                    data:{
                        id:$(this).val()
                    },
                    success:function(res)
                    {
                        $("#showDetails").html(res);
                    }
                })
               
            })
        })
    </script>
</body>
</html>

<!--
CREATE TABLE IF NOT EXISTS public.emp
(
    id BIGINT,
    name TEXT COLLATE pg_catalog."default",
    designation TEXT COLLATE pg_catalog."default",
    salary INTEGER
);

INSERT INTO public.emp (id, name, designation, salary)
VALUES
    (1, 'John Doe', 'Computer Science', 50000),
    (2, 'Jane Smith', 'Mathematics', 80000),
    (3, 'Alice Johnson', 'Physics', 100000);-->
