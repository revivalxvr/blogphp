<?php
include "header.php";
 
if($_POST["ngapain"] == 'insert') {
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["image"]["name"]);
   move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
   $title = $_POST['title'];
   $content = $_POST['content'];
   $image = $_FILES["image"]["name"];
   $conn->query("INSERT INTO Post set title='$title', content='$content', image='$image'");
   if(isset($_POST["ngapain"]) && $_POST["ngapain"] == 'insert') {
}
 
 
 
$posts = $conn->query("SELECT * FROM Post");
?>
<a href="insert.php">Buat artikel</a>
<?php
while($post = $posts->fetch_object()) {
 ?>
   <div class="card">
       <a href="post.php?id=<?php echo $post->id ?>"><h2><?php echo $post->title; ?></h2></a>
       <h5><?php echo $post->createdAt; ?></h5>
       <div><img src="../uploads/<?php echo $post->image?>"width="30%"></</div>
       <a href="update.php?id=<?php echo $post->id ?>">Edit</a>
       <a href="index.php?delete=artikel&id=<?php echo $post->id ?>">delete</a>
   </div>
   <?php
}
?>
<?php include "footer.php" ?>