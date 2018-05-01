<div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">About Titan</h5>
                  <p>The languages only differ in their grammar, their pronunciation and their most common words.</p>
                  <p>Phone: +1 234 567 89 10</p>Fax: +1 234 567 89 10
                  <p>Email:<a href="#">somecompany@example.com</a></p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Recent Comments</h5>
                  <ul class="icon-list">
                    <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                    <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                    <li>Andy on <a href="#">Eco bag Mockup</a></li>
                    <li>Jack on <a href="#">Bottle Mockup</a></li>
                    <li>Mark on <a href="#">Our trip to the Alps</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Blog Categories</h5>
                  <ul class="icon-list">
                    <li><a href="#">Photography - 7</a></li>
                    <li><a href="#">Web Design - 3</a></li>
                    <li><a href="#">Illustration - 12</a></li>
                    <li><a href="#">Marketing - 1</a></li>
                    <li><a href="#">Wordpress - 16</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Popular Posts</h5>
                  <ul class="widget-posts">
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="#" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                        <div class="widget-posts-meta">23 january</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="#" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                        <div class="widget-posts-meta">15 February</div>
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
                <p class="copyright font-alt">&copy; 2017&nbsp;<a href="index.html">TitaN</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/wow/dist/wow.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script>
        // for profile page;
        //tab js//
        $(document).ready(function(e) {
        $('.form').find('input, textarea').on('keyup blur focus', function (e) {
          var $this = $(this),
              label = $this.prev('label');

              if (e.type === 'keyup') {
                    if ($this.val() === '') {
                  label.removeClass('active highlight');
                } else {
                  label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if( $this.val() === '' ) {
                    label.removeClass('active highlight'); 
                    } else {
                    label.removeClass('highlight');   
                    }   
            } else if (e.type === 'focus') {

              if( $this.val() === '' ) {
                    label.removeClass('highlight'); 
                    } 
              else if( $this.val() !== '' ) {
                    label.addClass('highlight');
                    }
            }

        });
        $('.tab a').on('click', function (e) {
          e.preventDefault();
          $(this).parent().addClass('active');
          $(this).parent().siblings().removeClass('active');
          target = $(this).attr('href');

          $('.tab-content > div').not(target).hide();

          $(target).fadeIn(600);

        });
        //canvas off js//
        $('#menu_icon').click(function(){
                if($("#content_details").hasClass('drop_menu'))
                {
                $("#content_details").addClass('drop_menu1').removeClass('drop_menu');
            }
                else{
                    $("#content_details").addClass('drop_menu').removeClass('drop_menu1');
                    }


            });

        });
    </script>
    <script>
        function show_state(x){
            var cid = x;
            //alert(cid);
            $.ajax({
                type: "POST",
                url: baseurl+ "expert/return_states",
                dataType: 'html',
                data: {country: cid},
                success: function(res)
                {
                    $("#states").html(res);		
                },
                error: function (request, status, error) 
                {
                    alert(request.responseText);
                }
            });
        }
        function show_cities(x){
            var stid = x;
            //alert(cid);
            $.ajax({
                type: "POST",
                url: baseurl+ "expert/return_cities",
                dataType: 'html',
                data: {state: stid},
                success: function(res)
                {
                    $("#cities").html(res);		
                },
                error: function (request, status, error) 
                {
                    alert(request.responseText);
                }
            });
        }
        function add_new_wh_form (){
            var form = document.getElementById('whistory');
            var new_element = '<form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/add_wh" method="post" ><fieldset class="well" style="display:block; width:90%;overflow:auto;margin-left:4%;background-color:#fff;"><legend style="color:#282f46;text-transform:uppercase;font-weight:bold;width:max-content;">Add New Work History</legend><div class="form-group col-md-12"><label class="col-md-10 control-label">Designation/Profile Name</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="designation" placeholder="Language translator" class="form-control" type="text" value="" required></div> </div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">Company/Organisation Name</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="company_name" placeholder="Name of the organisation you worked for" class="form-control" type="text" value="" required></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">From - To</label><div class="col-md-6 inputGroupContainer"><div class="input-group"><input name="y_from" class="form-control" type="date" value="" required></div></div><div class="col-md-6 inputGroupContainer"><div class="input-group"><input name="y_to" class="form-control" type="date" value="" required></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">Work description / Your responsibilities</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><textarea placeholder="What you used to do, what was your role in the organization?" class="form-control" name="work_description" required></textarea></div></div></div><div class="form-group col-md-12"><div class="col-md-12 inputGroupContainer"><div class="input-group"><input type="submit" class="btn btn-success" value="Save" /></div></div></div></fieldset></form>';
            form.innerHTML = "";
            form.innerHTML = new_element;
            document.getElementById('add_wh').style.display="none";
        }
        function add_new_edu_form(){
            var form = document.getElementById('edu_his');
            var new_element = '<form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/add_edu" method="post"><fieldset class="well" style="display:block; width:90%;overflow:auto;margin-left:4%;background-color:#fff;"><legend style="color:#282f46;text-transform:uppercase;font-weight:bold;width:max-content;">Add New Education History</button></legend><div class="form-group col-md-12"><label class="col-md-10 control-label">Exam name</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="exam_name" placeholder="Higher Secondary / Graduation / Bachelors / Masters" class="form-control" type="text" value=""></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">College / University name</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="college_name" placeholder="Name of your university / college" class="form-control" type="text" value=""></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">Passing Year</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="p_year" placeholder="year" class="form-control" type="text" value=""></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">Score / Mark</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><input name="marks" placeholder="Scored %age or CGPA" class="form-control" type="text" value=""></div></div></div><div class="form-group col-md-12"><label class="col-md-10 control-label">Remarks / Some Words</label><div class="col-md-12 inputGroupContainer"><div class="input-group"><textarea class="form-control" name="remarks"></textarea></div></div></div><div class="form-group col-md-12"><div class="col-md-12 inputGroupContainer"><div class="input-group"><input type="submit" class="btn btn-success" value="Save" /></div></div></div></fieldset></form>';
            form.innerHTML = "";
            form.innerHTML = new_element;
            document.getElementById('add_wh').style.display="none";
        }
        function delete_wh(x){
            var whid = x;
            var formid = "#wh"+x;
            var r = confirm("Are you sure you want to delete this entry?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: baseurl+ "expert/del_whistory",
                    dataType: 'html',
                    data: {id: whid},
                    success: function(res)
                    {
                        $(formid).hide();
                        $('#response_wh').show();
                        window.location.href = baseurl+'expert#work_history';
                    },
                    error: function (request, status, error) 
                    {
                        alert(request.responseText);
                    }
                });
            }
        }
        function del_edu(x){
            var edid = x;
            var formid = "#ed"+x;
            var r = confirm("Are you sure you want to delete this entry?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: baseurl+ "expert/delete_edu",
                    dataType: 'html',
                    data: {id: edid},
                    success: function(res)
                    {
                        $(formid).hide();
                        $('#response_ed').show();
                        window.location.href = baseurl+'expert#edu_history';
                    },
                    error: function (request, status, error) 
                    {
                        alert(request.responseText);
                    }
                });
            }
        }
    </script>
  </body>
</html>