<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <link rel="shortcut icon" href="favicon.ico" type="image/png">
        <link rel="apple-touch-icon" href="favicon.ico">
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="news-detail.css">
    <title>Blog</title>

    
  </head>

  <body>

    <!-- Navigation -->
   
<!--top navigation -->
<?php include('header.php');?>

<!-- Page Content -->
   <div class="row">
                
          <div class="main1">
                <div class="imgprops" style="height:auto;">
 <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              

 <img style="width:100%" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
  
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
              <div class="card-cat"><span>Category : <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </span>
                <span>Sub Category : <?php echo htmlentities($row['subcategory']);?></span> <span> Posted on : <?php echo htmlentities($row['postingdate']);?></span></p>
                <!-- <hr /> -->
</div>
             
            </div>
            <div class="card-footer text-muted">
             
           
            </div>
          </div>
<?php } ?>
       

</div>
<div class="imgprops" style="height:auto;">
<!---Comment Section --->
<div class="row"  >
   <div class="card">
<div class="card">
            <h3 class="card-header">Leave a Comment:</h3>
            <div class="card-body">
              <form name="Comment" method="post" class="form">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
  <h3>Enter Your Name:</h3>
<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
</div>

 <div class="form-group">
 <h3>Enter Your Email:</h3>

 <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
 </div>


                <div class="form-group">
                <h3>Comment:</h3>
                  
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment Here" required></textarea>
                </div>
                <button type="submit" class="form-btn" name="submit">Submit</button>
              </form>
            </div>
          </div>

  <!---Comment Display Section --->

 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="ads">

</div>
<div class="comment">
  <h3>Reader's Comments</h3>
  <div class="comment-body">
    <div class="comment-user">

      <img style="border: 50%" src="./assets/usericon.png" alt="image">
      <h5 class="mt-0"><?php echo htmlentities($row['name']);?> 
      <span ><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
    </h5>
    </div>
           <div class="comment-txt">

             <?php echo htmlentities($row['comment']);?>            
           </div>
            </div>
          </div>
<?php } ?>

        </div>
      </div>
    
                </div> 
                 </div>
                 
                <div class="side">
                 
                  <div class="imgprops" style="height:auto;">
                 <!-- Sidebar Widgets Column -->
                 <div>

                 </div>
                </div>
                <h2><a href="category.php?catid=2" class="News-heading">READ MORE</a></h2>
                 <div class="imgprops" style="height:auto;">
                  <!-- Blog Post -->
   <?php 
   
   if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 3;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<!-- <h6 style="border-top: 2px solid #aaa; color: grey;  font-family: Berlin Sans FB;"> -->
  <!-- </h6>          -->
  <div  class=" blog-main-article">
   <?php echo time_elapsed_string($row['postingdate']);?>      
  
  <span style="float:right" ><i>Category : </i> <a style="color:gold; text-decoration: none;" href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </span>
  <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="hero-article">
<img class="blog-imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

          <h2 class="blog-txt"><?php echo htmlentities($row['posttitle']);?></h2>              
          <p><?php echo htmlentities($row['highlight']);?><br>Read More &rarr;</p>
        
      </a>
      </div>
<?php } ?>


<?php 
         function time_elapsed_string($datetime, $full = false){
           $now = new DateTime;
           $ago = new DateTime($datetime);
           $diff = $now->diff($ago);

           $diff->w = floor($diff->d / 7);
           $diff->d -= $diff->w * 7;

           $string = array(
             'y' => 'year',
             'm' => 'month',
             'w' => 'week',
             'd' => 'day',
             'h' => 'hour',
             'i' => 'minute',
             's' => 'second',
           );
           foreach( $string as $k => &$v){
             if ($diff->$k) {
               $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
             } else {
               unset($string[$k]);
             }
             
           }
           if(!$full) $string = array_slice($string, 0, 1);
           return $string ? implode(', ', $string) . ' ago' : 'just now';
         }
         ?>
  </div>
                 <div class="imgprops" style="height:auto;"></div>
              </div> 
            
           
</div>
      <!-- /.row -->
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
      <?php include('footer.php');?>



  </body>

</html>
