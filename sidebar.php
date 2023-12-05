  <div class="col-md-14" >

          <!-- Search Widget -->
          <div class="card mb-4">
            <h3 class="card-header">SEARCH </h3>
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="search-control" placeholder="Search for..." required>
                
                  <button class="search-btn" type="submit">Go!</button>
                
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h3 class="card-header">Categories: </h3>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="cat-list">
<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                      <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                    </li>
<?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h3 class="card-header">Sub-Category:</h3>
            <div class="card-body">
                      <ul class="cat-list">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li >
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
