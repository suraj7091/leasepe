<?php
$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];
$parent = $_REQUEST['parent'];
$userid = $_REQUEST['userid'];
$id = $_REQUEST['id'];

require "connection.php";
if ($parent == -1) {
    $parent1 = -1;
} else {
    $result1 = mysqli_query($con, "SELECT * FROM $id where id='$parent'");
    $row = mysqli_fetch_array($result1);
    $parent1 = $row['parent'];
    if ($parent1 == -1) {
        $parent1 = $row['id'];
    }
}
mysqli_query($con, "INSERT INTO $id(name, comments,parent,userid) VALUES('$name','$comments','$parent1','$userid')");

$result = mysqli_query($con, "SELECT * FROM $id ORDER BY date_publish ASC");

while ($row = mysqli_fetch_array($result)) {

    if ($row['parent'] == -1) {
        echo "<hr>";
        echo "<div class='comments_content'>";
        echo "<h4><a href='deletechat.php?id=" . $row['id'] . "&adid=" . $_GET['id'] . "'> X</a></h4>";
        echo "<p>" . $row['name'] . "&nbsp ";
        echo $row['date_publish'] . "</p>";
        echo "<h3 style='margin-left:5%;'>" . $row['comments'] . "</h3>";
        $k = "die" . $row['id'];
        echo "<p style='margin-left:5%;'  onClick='reply(" . '"' . $k . '"' . ")'>reply</p>";
        echo "<div class='comment_input' id='die" . $row['id'] . "' style='display:none;'> <form name='form'><textarea name='comments' id='" . $row['id'] . "' placeholder='Leave Comments Here...' style='width:635px; height:100px;'></textarea></br></br> <a href='#' onClick='commentSubmit2(" . $row['id'] . ")' class='button'>Post</a></br></form></div>";
        echo "</div>";
        $p = $row['id'];
        $result1 = mysqli_query($con, "SELECT * FROM $id where parent='$p' ORDER BY date_publish ASC");
        while ($row1 = mysqli_fetch_array($result1)) {
            echo "<div class='comments_content' style='margin-left:10%;'>";
            echo "<h4><a href='deletechat.php?id=" . $row1['id'] . "&adid=" . $_GET['id'] . "'> X</a></h4>";
            echo "<p>" . $row1['name'] . "&nbsp";
            echo $row1['date_publish'] . "</p>";
            echo "<h3 style='color:black;margin-left:5%;'>" . $row1['comments'] . "</h3>";
            $k = "die" . $row1['id'];
            echo "<p style='margin-left:5%;' onClick='reply(" . '"' . $k . '"' . ")'>reply</p>";
            echo "<div class='comment_input' id='die" . $row1['id'] . "' style='display:none;'> <form name='form'><textarea name='comments' id='" . $row1['id'] . "' placeholder='Leave Comments Here...' style='width:635px; height:100px;'></textarea></br></br> <a href='#' onClick='commentSubmit2(" . $row1['id'] . ")' class='button'>Post</a></br></form></div>";
            echo "</div>";
        }

    }
}
mysqli_close($con);
?>
<script type="text/javascript">alert("mai yha ytha");</script>
