<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="paymentform.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    
</head>

<body>


 <section class="header">

                <nav>
                    <a href="index.html"><img src="images/photo3.jpg"></a>
                    <div class="nav-links">

                        <ul>
                            <li><a href="enrol.html">Home</a></li>
                            <li><a href="About.html">About</a></li>
                            <li><a href="enrollment.php">Enrollment</a></li>
                            <li><a href="details.html">Details</a></li>
                            <li><a href="Contactus.html">Contactus</a></li>



                        </ul>




                    </div>
                </nav>

    <div class="container" id="forprint">
    <div class="wrapper">
        <h2>Payment Form
            <br> 
            <BR> PEBBLES ACADEMY</h2>

            
        <!-- <form method="GET" action="" id="myform"> -->
        <form method="POST" action="enrollment.php">
            <h4>Account</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" id="fname" placeholder="Full Name" required class="name" name="fname">
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="reg" placeholder="Registration Number" required class="name" name="rnumber">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" id="guard" placeholder="Gurdian Name" required class="name" name="gname">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <input type="text" id="grade" placeholder="Grade" required class="name" name="grade">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <input type="text" id="addr" placeholder=" Address" required class="name" name="address">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <h4> Date of Payment</h4>
                    <input type="text" id="d" placeholder="DD" class="dob" name="day">
                    <input type="text" id="m" placeholder="MM" class="dob" name="month">
                    <input type="text" id="y" placeholder="YYYY" class="dob" name="year">
                </div>
                <div class="input-box">
                    <h4> Gender</h4>
                    <input type="radio" id="b1" checked class="radio" name="gender" value="Male">
                    <label for="b1">Male</label>
                    <input type="radio" id="b2" class="radio" name="gender" value="Female">
                    <label for="b2">Female</label>
                </div>
            </div>

            <div class="input-group">
                <h4> Bank slip attachement</h4>
                <div class="input-box">
                    <input type="file" id="file" name="file" accept="image/png, image/jpg , image/jpeg">
                    <div id="display_image"> </div>
                </div>
            </div>
            
          
            <div class="input-group" id="getRec">
                <div class="input-box">
                    <!-- <button type="submit">Get Receipts</button> -->
                    <input type="submit" name="submit" >Get Receipts</button>
                </div>
            </div>
            
    </table>

        </form>

        </div>
    </div>

        <script>

        function printDiv() {
        var fname = document.getElementById("fname").value;
        var reg = document.getElementById("reg").value;
        var guard = document.getElementById("guard").value;
        var grade = document.getElementById("grade").value;
        var addr = document.getElementById("addr").value;
        var d = document.getElementById("d").value;
        var m = document.getElementById("m").value;
        var y = document.getElementById("y").value;
        var file =document.getElementById("file").value;
        
        var ele = document.getElementsByName('gender');
            for (i = 0; i < ele.length; i++) {
                if (ele[i].checked)
                    var gender = ele[i].value;
            }
            

         var divContents = document.getElementById("forprint").innerHTML;
         var a = window.open('', '', 'height=700, width=700');
         a.document.write('<html>');
         a.document.write('<head> <link rel="stylesheet" href="style.css" type="text/css" media="all" />');
         a.document.write('<body><center><h1 style="padding-top:4rem;color:#A9B40A";>Pebbles Academy</h1>');
         a.document.write('<body><center><h4 style="color:#A9B40A">Payment Details</h4>');
         a.document.write('<body><div style="padding-top:2rem;"><center><h3 style="color:#A9B40A">Full Name: </h3><h3>' + fname + '<br></h3><br>');
         a.document.write('<body><center><h3 style="color:#A9B40A">Guardian: </h3><h3>' + guard + '<br></h3><br>');
         a.document.write('<body><center><h3 style="color:#A9B40A">Grade: </h3><h3>' + grade + '<br></h3><br>');
         a.document.write('<body><center><h3 style="color:#A9B40A">Address: </h3><h3>' + addr + '<br></h3><br>');
         a.document.write('<body><center><h3 style="color:#A9B40A">Date of Payment: </h3><h3>' + d+', '+m+', '+y + '<br></h3><br>');
         a.document.write('<body><center><h3 style="color:#A9B40A">Gender: </h3><h3>' + gender + '<br></h3><br>');
         a.document.write('<body><center><h3>' + file + '<br></h3><br>');

         a.document.write('</head></body></html>');
         a.document.close();
         a.print();
        }
        </script> -->
<?php
$con = mysqli_connect('localhost', 'root', '', 'enrollment');

if (!$con) {
    die('Connection Error' . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $FNAME = mysqli_real_escape_string($con, $_POST["fname"]);
    $REGISTAR = mysqli_real_escape_string($con, $_POST["rnumber"]);
    $GARDIAN = mysqli_real_escape_string($con, $_POST["gname"]);
    $GRADE = mysqli_real_escape_string($con, $_POST["grade"]);
    $ADDRESS = mysqli_real_escape_string($con, $_POST["address"]);
    $DAY = mysqli_real_escape_string($con, $_POST["day"]);
    $MONTH = mysqli_real_escape_string($con, $_POST["month"]);
    $YEAR = mysqli_real_escape_string($con, $_POST["year"]);
    $GENDER = mysqli_real_escape_string($con, $_POST["gender"]);
    $FILE = mysqli_real_escape_string($con, $_POST["file"]);


    $query = "INSERT INTO registar(name, r_num, gardian, grade, address, day, month, year, gender, file) 
    VALUES('$FNAME','$REGISTAR','$GARDIAN',' $GRADE','$ADDRESS','$DAY','$MONTH','$YEAR','$GENDER','$FILE')";

    if (mysqli_query($con, $query)) {
        echo '<script type="text/javascript">';
        echo 'function func() {';
        echo '  alert("  Successfully filled ;.");';
        echo 'window.location.href="enrollment.php"';
        echo '}';
        echo 'func();';
        echo '</script>';
        exit();
    } else {
        echo 'Error: ' ;
    }
}

mysqli_close($con);
?>

</section>
</body>

</html>