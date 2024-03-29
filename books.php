<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="limsys";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
session_start();

$member_id=$_SESSION["member_id"];
$date=date("y-m-d");
$sql=$conn->query("select book_name,issue_date,return_date from issue_data where admission_number='$member_id'");
$books_issued=$sql->fetch_all();
if(isset($_POST["search"])){
    $book_name=$_POST["search"];
    $add = "INSERT INTO `search_data`(`admission_number`, `book_name`, `date`) VALUES (\"$member_id\",\"$book_name\",\"$date\");";
    $conn->query($add);
    $_SESSION['search-name']=$book_name;
    echo "<script> location.replace('search_pg.php') </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<link rel="stylesheet" href="books.css">
<link rel="stylesheet" href="universal.css">
<body>
    <div class="navbar">
        <div class="nav1">
            <img src="limsys_logo.png" alt="" class="limsys_logo">
            <h1 class="nav-name">Limsys</h1>
            <form action="" method="POST" name="searchInput">
                <input type="text" placeholder="Search" class="search-bar" name="search" id="search">
                <button class="form-button">
                    <div class="search-btn">
                        <img src="search-icon.png" alt="" class="search-icon">
                    </div>
                </button>
            </form>
        </div>
        <div class="nav2">
            <div class="nav-tabs">
                <a class="tab" href="homepage.php">HOME</a>
                <a class="tab" href="profile.php">PROFILE</a>
                <a class="tab" href="books.php" style="color: black;font-weight:600">ISSUED</a>
                <a class="tab" href="history.php">HISTORY</a>
                <a class="tab" href="about.php">ABOUT</a>
            </div>
        </div>
    </div>
    <div class="box">
        <h1>Books Issued</h1>
        <div class="box1">
            <h3 class="bn">Book Name</h3>
            <h3 class="isd">Issue Date</h3>
            <h3 class="rtd">Return Date</h3>
        </div>
        <div class="books-data" id="data">
        </div>
        <?php
        for($i=0;$i<count($books_issued);$i++)
        {
            echo "<script>var dt=document.createElement('div');</script>";
            echo "<script>dt.classList.add('data');</script>";
            echo "<script>var bn=document.createElement('h3');</script>";
            echo "<script>bn.classList.add('bookName');</script>";
            echo "<script>bn.innerHTML='".$books_issued[$i][0]."';</script>";
            echo "<script>var isd=document.createElement('h3');</script>";
            echo "<script>isd.classList.add('issueDate');</script>";
            echo "<script>isd.innerHTML='".$books_issued[$i][1]."';</script>";
            echo "<script>var rd=document.createElement('h3');</script>";
            echo "<script>rd.classList.add('returnDate');</script>";
            echo "<script>rd.innerHTML='".$books_issued[$i][2]."';</script>";
            echo "<script>var box=document.getElementById('data');</script>";
            echo "<script>dt.appendChild(bn);</script>";
            echo "<script>dt.appendChild(isd);dt.appendChild(rd);</script>";
            echo "<script>box.appendChild(dt);</script>";
        }
        ?>
    </div>
    <div class="footer">
        <div class="foo1">
            <img src="limsys_logo.png" alt="" class="footer_logo">
            <h1 class="foo-name">Limsys</h1>
            <div class='social-logo'>
                <a href="https://www.instagram.com/pillaiscollege/"><img src="https://www.nicepng.com/png/full/356-3563301_instagram-instagram-circle-icon.png" alt="" class="insta-logo"/></a>
                <a href="https://twitter.com/pillaiscollege"><img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/twitter_circle-512.png" alt="" class="twitter-logo"/></a>
                <a href="https://www.facebook.com/pillaicollege"><img src="https://www.edigitalagency.com.au/wp-content/uploads/Facebook-logo-blue-circle-large-transparent-png.png" alt="" class="facebook-logo"/></a>
            </div>
        </div>
        <div class="foo2">
            <div class="projectby">
                <p class="foo2-head">Project By</p>
                <p class="foo2-item" style="margin-top: 10px;">Deepraj Pagare</p>
                <!-- <p class="foo2-item">Shruti Patil</p>
                <p class="foo2-item">Swaraj Naralkar</p> -->
            </div>
            <div class="projectby">
                <p class="foo2-head">Support</p>
                <p style="margin-top: 10px;"><a href="mailto:dpagare21comp@student.mes.ac.in" class="foo2-item">dpagare21comp@student.mes.ac.in</a></p>
                <!-- <p><a href="mailto:shrutis21comp@student.mes.ac.in" class="foo2-item">shrutis21comp@student.mes.ac.in</a></p>
                <p><a href="mailto:snaralkar21comp@student.mes.ac.in" class="foo2-item">snaralkar21comp@student.mes.ac.in</a></p> -->
            </div>
            <div class="projectby" style="width: 37%;">
                <p class="foo2-head">Location</p>
                <p style="margin-top: 10px;width:90%"><a href="https://goo.gl/maps/568aA67ydMaCWZhr9" class="foo2-item">Pratik Gardens CHS, Sector 34, Kamothe, Navi Mumbai, 410209</a></p>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15087.936761976285!2d73.0874641!3d19.0204183!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c2789bd9cd07%3A0x369836fb513895ba!2sPratik%20Gardens!5e0!3m2!1sen!2sin!4v1676001548568!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
    </div>
</body>
</html>