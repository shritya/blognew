<?php 
    session_start();
    include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    
    <title>Document</title>
  </head>
  <body>
    <header>
      <nav>
        <!-- <img class="logo" src="./logo" alt="logo" /> -->
        <h1>۞आम्हीच ते वेडे</h1>
        <ul>
          <li><a href="category.php?catid=16">Jilah</a></li>
          <li><a href="category.php?catid=17">Rajya</a></li>
          <li><a href="category.php?catid=18">Desh</a></li>
          <li><a href="category.php?catid=19">Videsh</a></li>
        </ul>
        <div class="col-md-14" >
          <div class="card mb-4">
            <!-- <h3 class="card-header">SEARCH </h3> -->
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
              <input type="text" name="searchtitle" class="search-control" placeholder="Search for..." required>
                  <button class="search-btn" type="submit">Go</button>
              </form>
              </div>
            </div>
          </div>
      </nav>
    </header>
    <section class="body-link-left">
      <a href=""><img src="./assets/facebook.png" alt="facebook"></a>
      <a href=""><img src="./assets/instagram.png" alt="instagram"></a>
      <a href=""><img src="./assets/twitter.png" alt="twitter"></a>
    </section>
    <section class="body-link-right">
    
    </section>
    <section class="hero">
      <section class="hero-edit">
        <div class="hero-content">
          <div class="slideshow-container">
            <!-- <h2>Latest<img src="./assets/latest.svg" alt="latest"></h2> -->
            <div>

            <span>

              <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=17 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                              ?>
                <div class="hero-ss" >
                     <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="mySlides fade">
                    <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                  </a>
                </div>
                
                                                            <?php } ?>
                            </span>
                <span>

                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=16 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="hero-ss" >
                     <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="mySlides fade">
                    <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                  </a>
                </div>
                            </span>
                
                                                            <?php } ?>
                  <span>

                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=18 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="hero-ss" >
                     <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="mySlides fade">
                    <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                  </a>
                </div>
                            </span>
                
                                                            <?php } ?>
                <span>
                  
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=19 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="hero-ss" >
                     <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="mySlides fade">
                    <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                  </a>
                </div>
                
                                                            <?php } ?>
             </div>
                
                            </span>
            </div>

          <br />

          
          <script src="./app.js"></script>
        </div>
        <div class="hero-trending">
          <!-- <h2>Trending  <img src="./assets/trending.svg" alt="trending"></h2> -->
          <!-- <br> -->
          <br>
          <ul >
            <li>
              <div>
                <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=16 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                              ?>
                <div class="all">
                  <a style="text-decoration: none;" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                  <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                </a>
              </div>
              
                <?php } ?>

              </div>
              <br>
                              
            <div>

              <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=17 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                              ?>
                <div class="all">
                  <a style="text-decoration: none;" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                  <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                </a>
                </div>
                
                <?php } ?>
              </div>
              </li>
              
              <br>

            <li>
                    <div>

                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=18 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                              ?>
                <div class="all">
                  <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="text-decoration: none;">

                  <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                </a>
                </div>
                
                
                <?php } ?>
              </div>
              <br>
                <div>

                <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 1;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=19 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row=mysqli_fetch_array($query)) {
                              ?>
                <div class="all">
                  <a style="text-decoration: none;" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                  <img class="imgs" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <h3 class="banner-txt"><?php echo htmlentities($row['posttitle']);?></h3>
                </a>
                </div>
                
                <?php } ?>
            </div>
              <br>

            </li>
            

            
              
          </ul>
        </div>
      </section>
    </section>
    <section class="ads">
      
      <img src="https://picsum.photos/100/100" alt="ADS" />
    </section>

    <section class="blogs-main">
      <section class="blogedit">
        <div class="sub-blog">
          <h3 class="sb-heading">Jilha</h3>
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 2;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=16 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
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
        <div class="sub-blog">
          <h3 class="sb-heading">Rajya</h3>
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 2;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=17 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
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
        <div class="sub-blog">
          <h3 class="sb-heading">Desh</h3>
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 2;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=18 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
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
        <div class="sub-blog">
          <h3 class="sb-heading">Videsh</h3>
                    <?php 
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 2;
                            $offset = ($pageno-1) * $no_of_records_per_page;


                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                            $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory, tblposts.highlight as highlight, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=19 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
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
      </section>
      <div class="ads">
        
      </div>
    </section>

    <footer>
      <h1 style="text-align: center">۞आम्हीच ते वेडे ज्यांना आस इतिहासाची۞</h1>
      
      <div class="f-tabs">
        <p>
          <span style="color: gold">About Me: </span>Lorem, ipsum dolor sit amet
          consectetur adipisicing elit. Placeat officiis doloremque ut veniam
          fugit autem cumque soluta dolorem quo impedit, consectetur, vitae
          delectus non deleniti asperiores necessitatibus quam obcaecati quis.
          
        </p>
        <ul>
        <li><h3>Contact Me / Socials:</h3></li>
          <li><a href="facebook">Facebook</a></li>
          <li><a href="facebook">Instagram</a></li>
          <li><a href="facebook">Twitter</a></li>
          <li><a href="facebook">Mail</a></li>
          
          
        </ul>
      </div>
      <div class="col-md-18" >
            <div class="card mb-4">
              <!-- <h3 class="card-header">SEARCH </h3> -->
              <div class="card-body">
                <div class="input-group"> <center>

                  <form name="search" action="search.php" method="post">
                    <input type="text" name="searchtitle" class="search-control" placeholder="Search for..." required>
                    <button class="search-btn" type="submit">Go!</button>
                  </form>
                </center>
                </div>
              </div>
            </div>
    </footer>
  </body>
</html>
