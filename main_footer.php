<div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">About Langjobs</h5>
                    <p>We are Language Yogis, Our mission is to unite the world through language.</p>
                    <p>Email: <a href="mailto:info@langjobs.com">info@langjobs.com</a></p>
                    <a href="<?php echo $base_url; ?>contact.php" style="color:#fff;"><button class="btn btn-lg" style="background-color:red;">CONTACT US</button></a>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">In the News</h5>
                  <ul class="icon-list">
                    <li>multilingual.com <a href="assets/img/multilingual20100102.jpg">considers us as India's 1st specialized language consultancy.</a></li>
                    <li>livehindustan.com <a href="https://www.livehindustan.com/news/tayaarinews/tayaarinews/article1-story-67-67-116909.html">LangJobs as Language Jobs Marketplace.</a></li>
                    <li>businesstoday.in<a href="https://www.businesstoday.in/moneytoday/cover-story/temporary-relief/story/8843.html">Article on Temporary Relief.</a></li>
                    <li>Winning Edge <a href="assets/img/Langjobs.jpg">LangJobs as Innovative Websites from India.</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Linked Links</h5>
                  <ul class="icon-list">
                    <li><a href="http://langecole.com/">Langecole</a> - One of a kind Institute, which deals in language teaching and training.</li>
                    <li><a href="https://www.liveecole.com/">Liveecole</a> - A P2P Language learning web portal.</li>
                    <li><a href="http://www.langschool.com">Langschool</a> - A Portal to help schools in teaching different languages to their students</li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Other Links</h5>
                  <ul class="widget-posts">
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="https://www.ndtv.com/video/mindspace/heads-up/career-in-solar-energy-make-the-most-out-of-the-sun-315747"><img src="assets/img/Amitabh.PNG"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="https://www.ndtv.com/video/mindspace/heads-up/career-in-solar-energy-make-the-most-out-of-the-sun-315747">Skills required for Language experts</a></div>
                        <div class="widget-posts-meta">3rd April 2014</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="http://langecole.com/cultural_center"><img src="assets/img/Cultural_center.JPG" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="http://langecole.com/cultural_center">Cultural Centers</a></div>
                        <div class="widget-posts-meta">January 2018</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="divider-d">
        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2018&nbsp;<a href="index.html">langjobs.com</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="https://www.facebook.com/langjobs.india"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/langjobs"><i class="fa fa-twitter"></i></a><a href="https://www.linkedin.com/groups/706847/profile"><i class="fa fa-linkedin-square"></i></a><a href="skype:amitabh216?call"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.js"></script>
<!--
    <script src="assets/js/jquery.tagsinput.js"></script>
    <script>
        $('#tags_1').tagsInput({
            'height' : '33px',
            'width' : '100%',
            'defaultText' : 'comma seperated values'
        });
    </script>
-->
    <script src="assets/js/res/Obj.js"></script>
    <script src="assets/js/addTags.js"></script>
    <script>
        $("#tags_1").addTags();
        $(document).ready(function() {
            //console.log('awesome');
            $('#job_table1').DataTable({
                language: {
                    searchPlaceholder: "Quick Search in table"
                }
            });
        } );
    </script>
    <script>
        //ajax code to validate and verify some part of the langjobs
        function check_availability(lid){
            var msg = document.getElementById('err1');
            if(lid.length == 0){
                msg.innerHTML = "*UserID is required";
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        msg.innerHTML = this.responseText;
                    } else {
                        msg.innerHTML = "Something went wrong!! come back little later."
                    }
                };
                xmlhttp.open("GET", "regular_functions.php?sign_up=1&logid=" + lid, true);
                xmlhttp.send();
            }
        }
        function checkpass(p1, p2){
            var msg2 = document.getElementById('err2');
            if(p1.length<6){
               msg2.innerHTML = "*Minimum 6 characters are required!";
            } else {
                if(p1 == p2){
                    msg2.innerHTML = "<i class='fa fa-check-circle-o'></i>";
                } else {
                    msg2.innerHTML = "<i class='fa fa-times-circle-o'></i> Passwords are not matching. Please recheck.";
                }
            }
        }
        function verifycode(x){
            var v = document.getElementById('vcode');
            var im = document.getElementById('vimg');
            var btn = document.getElementById('signup_submit');
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 1){
                        v.style.display = "none";
                        im.style.display = "none";
                        im.insertAdjacentHTML( 'afterend', "<i class='fa fa-check-circle-o'></i> Verified" );
                        btn.disabled = false;
                        
                    } else {
                        v.value="";
                        v.style.border = "1px solid red";
                    }
                } 
            };
            xmlhttp.open("GET", "regular_functions.php?verify=" + x, true);
            xmlhttp.send();
        }
    </script>

  </body>
</html>