<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-4.5/css/bootstrap.min.css">
</head>
    <?php
    // file connect database
        include '../connect/conn.php';

        $name ='';
        $decs = '';
        $status = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // check submit on
            // flag validate
            $errors = array();
            
            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $errors[] = $_POST['name']; // if errors, put array Errors
            }
            
            if (!empty($_POST['decs'])) {
                $decs = $_POST['decs'];
            } else {
                $errors[] = $_POST['decs'];
            }

            if (!empty($_POST['an'])) {
                $status = $_POST['an'];
            } elseif(!empty($_POST['hien'])) {
                $status = $_POST['hien'];

            }else{
                $rerors[] = "loi";
            }
            
            // check errors[]
            if(!empty($errors)){
                echo 'loi';
            }else { // if not errors 
                // insert database
                $sql = "INSERT INTO `post`(`name`, `desc`, `status`) VALUES ('$name','$decs','$status')"; // query database,  mysql

                $query = mysqli_query($connect, $sql); // function performs a query against a database.


                // check result
                if($query){
                    echo "Thêm dữ liệu thành công";
                }else{
                    echo 'thai bai';
                }
            }
            
            
        }
        
    ?>
<body>
    <div class="container">
        <form class="mt-5" action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">ten bai viet</label>
                <input type="text" name ="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="ten bai viet">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">decs</label>
                <input type="text" name ="decs" class="form-control" id="exampleInputPassword1" placeholder="decs">
            </div>
            <div class="form-group row form-check">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name ="an" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="0">
                    <label class="form-check-label" for="inlineRadio1">Ẩn</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name ="hien" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="1">
                    <label class="form-check-label" for="inlineRadio2">Hiện</label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../bootstrap-4.5/js/bootstrap.min.js"></script>
</body>

</html>