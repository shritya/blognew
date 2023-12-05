<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <link rel="shortcut icon" href="favicon.ico" type="image/png">
  <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="search.css">
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="author" content="Shri">

    <title>Search Page</title>
  </head>
  
  <body>
      <?php include('header.php');?>
      <section class="search-main">
        <div class="search-main1">
        <?php 
          if($_POST['searchtitle']!=''){
            $st=$_SESSION['searchtitle']=$_POST['searchtitle'];
          }
            $st;  
                      if (isset($_GET['pageno'])) {
                              $pageno = $_GET['pageno'];
                          } else {
                              $pageno = 1;
                          }
                          $no_of_records_per_page = 5;
                          $offset = ($pageno-1) * $no_of_records_per_page;


                          $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                          $result = mysqli_query($con,$total_pages_sql);
                          $total_rows = mysqli_fetch_array($result)[0];
                          $total_pages = ceil($total_rows / $no_of_records_per_page);
                  $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");
                  $rowcount=mysqli_num_rows($query);
                  if($rowcount==0)
                  {
                  echo "No record found";
                  }
                  else {
                  while ($row=mysqli_fetch_array($query)) {


                  ?>
                  <div class="cards mb-4">
            <div class="card-body">
             <!-- <img style="width:90%" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>"> -->
             <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="card-link-side">

              <h2 class="card-title-s"><?php echo htmlentities($row['posttitle']);?></h2>
              <p style="color: black;"><?php echo htmlentities($row['highlight']);?><br> Read More &rarr;</p>
            </a>
              <div style="color: gold;">
                Posted on <?php echo htmlentities($row['postingdate']);?>
              </div>
            </div>
          </div>
        <?php } ?>
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
        </div>
        <div class="search-main2">
          <?php include('sidebar.php');?>
        </div>
      </section>  
      <?php include('footer.php');?>
  </body>

</html>
