<?php 
session_start();
error_reporting(0);
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <link rel="shortcut icon" href="favicon.ico" type="image/png">
        <meta name="description" content="-UPDATED-Front page is your one-stop Nigerian media platform that gives you update and keep you updated on trending news,  politics,  Entertainment,  health, sports and so much more.">  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="news-detail.css">
    <title>आम्हीच ते वेडे ज्यांना आस इतिहासाची</title>
  </head>

  <body>
  <?php include("header.php");?>
  <br>
   <div class="row">
                
          <div class="main">
                <div class="imgprops" style="height:auto;">
         
  <!-- Blog Post -->
  <?php 
        if($_GET['catid']!= ''){
$_SESSION['catid']=intval($_GET['catid']);
}
  

     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 4 ;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
          <div class="card mb-4">
            <div class="blog-main-article">
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="hero-article">
              <img class="blog-imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
              <h2 class="blog-txt"><?php echo htmlentities($row['posttitle']);?></h2>
              <p style="color: black;"><?php echo htmlentities($row['highlight']);?> <br> Read More &rarr;</p>
            </a>
            <div style="color: gold;">
              Posted on <?php echo htmlentities($row['postingdate']);?>
           
            </div>
            </div>
          </div>
<?php } ?>
               </div>
                 
                 </div>
                <div class="side">
                <h3 class="sb-heading">Related</h3>
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 4;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");

                            while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="blog-main-article">
                <a class="hero-article" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">

                  <img class="blog-imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h2 class="blog-txt"><?php echo htmlentities($row['posttitle']);?></h2>
                  <p><?php echo htmlentities($row['highlight']);?><br>Read More &rarr;</p>  
                </a>
                  
                </div>
                <?php } ?>
                              
                
                
                                                            
        
            
           
</div>

  <!-- Pagination -->

  <ul class="page-nav">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
<?php } ?>



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
  <?php include("footer.php");?>
</body>

</html>
