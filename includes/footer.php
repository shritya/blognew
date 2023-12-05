
    <footer>
      
                <h2 class="brand" style="margin-top:5px;"><a href="index.php"> ۞आम्हीच ते वेडे ज्यांना आस इतिहासाची۞</a></h2>
                <div id="clockbox" style="color:#aaa;text-align:center;"></div>
                <script type="text/javascript">
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
document.getElementById('clockbox').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>
                <div class="footer-main-container">
                  <div>
                    <a href="javascript:void(0)" class="sub-container">Useful links</a>
                    <hr>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia, quidem. </a> <br>      
                    
                   <a href="Our-Terms.php"> Terms & Conditions </a>|<a href="Privacy-policy.php"> Privacy policy</a> <br>

                    Contact us: Feedback is very much appreciated! <br>
                   <a href="mailto:info@frontpage.com">Email: mail@gmail.com</a>  </p>
                  </div>
                  <div>
                  <a href="javascript:void(0)" class="sub-container">Useful links</a>
                  <hr>
                  <a href="index.php"> Home</a><br>
                  <a href="category.php?catid=20"> Trending</a>  <br>
                  <a href="category.php?catid=16"> Jilha</a> <br>           
                  <a href="category.php?catid=17"> Rajya</a><br>
                  <a href="category.php?catid=18"> Desh</a><br>
                  <a href="category.php?catid=19"> Videsh</a><br>
                  <!-- <a href="category.php?catid=3"> Sports</a><br>
                  <a href="category.php?catid=9"> Health</a> <br>
                  <a href="category.php?catid=10"> International</a><br>
                  <a href="category.php?catid=12"></i> Biographies</a><br> -->
                </div>
                
                <div>
                  <a href="javascript:void(0)" class="sub-container"> Sub Container</a><br>
                  <hr>
                  <a href="category.php?catid=8">1</a> <br>
                  <a href="category.php?catid=8">2</a><br>
                </div>
                <div>
                  <a href="javascript:void(0)" class="sub-container"> Socials</a><br>
                  <hr>
                  <a href="https://www.facebook.com/Amhichtevede" class="facb"><i class="fa fa-facebook"></i> Facebook</a><br>
                  <a href="https://www.instagram.com/veda.abhishek/" class="insg"><i class="fa fa-instagram"></i> Instagram</a><br>
                  <a href="https://twitter.com/abhishek3208" class="twit"><i class="fa fa-twitter"></i> Twitter</a><br>
                </div>
                <div>
                  <a href="javascript:void(0)" class="sub-container"> Help & Support</a><br>
                  <hr>
                  <a href="contact-us.php"> Contact Us</a><br>
                  <a href="about-us.php"> About Us</a><br>
                  <a href="Advertise-with-us.php"> Advertise With Us</a><br>
                  <a href="Write-for-us.php"> Write for Us</a>
                </div>
                
                <!-- <div>
                  <a href="javascript:void(0)" class="sub-container"> Translate</a><br>
                  <hr>
                  <div id="ytWidget"></div><script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=dark&autoMode=false" type="text/javascript"></script>
                  
                </div>
                <div> -->
                  <hr>
                   </div>
                
                </div>
                <p class="footer-terms">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Shri. All right reserved</p>
              </footer>