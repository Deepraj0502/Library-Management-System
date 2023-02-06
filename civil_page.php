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

	$sql1="select book_name,author,img from books_data;";
	$result1=$conn->query($sql1);
    $data=$result1->fetch_all();
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
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <link rel="stylesheet" href="computer_page.css">
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
                <a class="tab" href="homepage.php" style="color: black;font-weight:600">HOME</a>
                <a class="tab" href="profile.php">PROFILE</a>
                <a class="tab" href="books.php">ISSUED</a>
                <a class="tab" href="history.php">HISTORY</a>
                <a class="tab" href="about.php">ABOUT</a>
            </div>
        </div>
    </div>
        <script>
            function navigate(to){
                window.location.href='issuePage.php?name='+to;
            }
        </script>
        <div class="main-box">
            <h1 class="head-text">CIVIL ENGINEERING BOOKS</h1>
            <div class="sem1">
                <h3 class="sem1-head">SEM - I</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;" onclick="navigate('<?php echo $data[0][0] ?>')">
                        <img src="<?php echo $data[0][2] ?>.jpg" alt="" class="card-img">
                        <h1 class="book-name"><?php echo $data[0][0] ?></h1>
                        <h3 class="author-name"><?php echo $data[0][1] ?></h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=1; $i < 10; $i++) { 
                        echo ('<div class="book-card"  onclick="navigate(\''.$data[$i][0].'\')">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - II</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;" onclick="navigate('<?php echo $data[6][0] ?>')">
                        <img src="<?php echo $data[6][2] ?>.jpg" alt="" class="card-img">
                        <h1 class="book-name"><?php echo $data[6][0] ?></h1>
                        <h3 class="author-name"><?php echo $data[6][1] ?></h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=7; $i < 18; $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - III</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;" onclick="navigate('<?php echo $data[0][0] ?>')">
                        <img src="<?php echo $data[0][2] ?>.jpg" alt="" class="card-img">
                        <h1 class="book-name"><?php echo $data[0][0] ?></h1>
                        <h3 class="author-name"><?php echo $data[0][1] ?></h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=1; $i < 6; $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - IV</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;">
                        <img src="instrumentation_systems.jpg" alt="" class="card-img">
                        <h1 class="book-name">Intrumentation Systems</h1>
                        <h3 class="author-name">M.D.Bhagat</h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=0; $i < count($data); $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - V</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;">
                        <img src="instrumentation_systems.jpg" alt="" class="card-img">
                        <h1 class="book-name">Intrumentation Systems</h1>
                        <h3 class="author-name">M.D.Bhagat</h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=0; $i < count($data); $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - VI</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;">
                        <img src="instrumentation_systems.jpg" alt="" class="card-img">
                        <h1 class="book-name">Intrumentation Systems</h1>
                        <h3 class="author-name">M.D.Bhagat</h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=0; $i < count($data); $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - VII</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;">
                        <img src="instrumentation_systems.jpg" alt="" class="card-img">
                        <h1 class="book-name">Intrumentation Systems</h1>
                        <h3 class="author-name">M.D.Bhagat</h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=0; $i < count($data); $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
            <div class="sem1">
                <h3 class="sem1-head">SEM - VIII</h3>
                <div class="sem1-card">
                    <div class="book-card" style="margin-left: 5px;">
                        <img src="instrumentation_systems.jpg" alt="" class="card-img">
                        <h1 class="book-name">Intrumentation Systems</h1>
                        <h3 class="author-name">M.D.Bhagat</h3>
                        <img src="counter-icon.png" alt="" class="counter-icon">
                        <p class="counter-number">11001</p>
                    </div>
                    <?php
                    for ($i=0; $i < count($data); $i++) { 
                        echo ('<div class="book-card">');
                        echo('<img src="'.$data[$i][2].'.jpg" alt="" class="card-img">');
                        echo('<h1 class="book-name">'.$data[$i][0].'</h1>');
                        echo('<h3 class="author-name">'.$data[$i][1].'</h3>');
                        echo('<img src="counter-icon.png" alt="" class="counter-icon">');
                        echo('<p class="counter-number">11001</p>');
                        echo('</div>');
                    }
                    ?>
                </div>
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
                    <p class="foo2-item">Shruti Patil</p>
                    <p class="foo2-item">Swaraj Naralkar</p>
                </div>
                <div class="projectby">
                    <p class="foo2-head">Support</p>
                    <p style="margin-top: 10px;"><a href="mailto:dpagare21comp@student.mes.ac.in" class="foo2-item">dpagare21comp@student.mes.ac.in</a></p>
                    <p><a href="mailto:shrutis21comp@student.mes.ac.in" class="foo2-item">shrutis21comp@student.mes.ac.in</a></p>
                    <p><a href="mailto:snaralkar21comp@student.mes.ac.in" class="foo2-item">snaralkar21comp@student.mes.ac.in</a></p>
                </div>
                <div class="projectby" style="width: 37%;">
                    <p class="foo2-head">Location</p>
                    <p style="margin-top: 10px;width:90%"><a href="https://goo.gl/maps/568aA67ydMaCWZhr9" class="foo2-item">Dr. K. M. Vasudevan Pillai Campus, Plot No. 10, Sector 16, New Panvel East, Navi Mumbai, Maharashtra 410206</a></p>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.669434283395!2d73.12548141489991!3d18.990200987137168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e866de88667f%3A0xc1c5d5badc610f5f!2sPillai%20College%20of%20Engineering%2C%20New%20Panvel!5e0!3m2!1sen!2sin!4v1674372496022!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        </div>
    </body>
</html>