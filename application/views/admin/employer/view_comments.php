<style>
    .alt-features-item{
        margin: 20px 0px 0px 0px !important;
    }
    .messages{
        height: 30em;
        max-height: 50em;
        border: 1px solid;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .chat_div form{
        margin-top: 5px;
        border: 1px solid;
    }
    .left_div, .right_div{
        width: 100%;
    }
    
    .left_div>span, .right_div>span{
        background: #7872a5;
        color: #fff;
        width: max-content;
        padding: 2%;
    }
    .right_div{
        text-align: right;
    }
    .right_div>span{
        background: #3cb945;
    }
    #msg::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    #msg::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    #msg::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        background-image: -webkit-gradient(linear,
                                           left bottom,
                                           left top,
                                           color-stop(0.44, rgb(122,153,217)),
                                           color-stop(0.72, rgb(73,125,189)),
                                           color-stop(0.86, rgb(28,58,148)));
    }
</style>
<section class="content">

<!-- Main row -->
	<div class="row">
	   <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
				   <fieldset>
					   <legend>Message</legend>
					   <div class="chat_div"> <br/>
							<div class="messages" id="j_comm">
							<?php	
								if($comments)
								{	
									foreach($comments as $c){ 
										if($c->sender == 1){
											echo "<div class='right_div'><span><img width='30' height='30' class='img img-circle' src='".base_url()."assets/uploads/employer/".$this->session->userdata('logo')."'> &nbsp;$c->comment</span></div><br/>";
										} else {
											if($this->session->userdata('social_login') == 1){
												$eimg = $this->session->userdata('image');
											} else {
												if(!$this->session->userdata('image')){
													$eimg = base_url()."assets/1.png"; 
												} else {
													$eimg = base_url()."assets/uploads/expert/".$this->session->userdata('image');
												}
											}
											echo "<div class='left_div'><span>$c->comment &nbsp; <img class='img img-circle' width='30' height='30' src='$eimg'/></span></div><br/>";
										}
									}
								}
							?>
							</div>
							   <textarea class="form-control" id="comment" name="comment" placeholder="Your comment here.." maxlength="300"></textarea>
							   <p id='err_comm' style="color:red;"></p>
							   <input type="hidden" value="<?php echo $job_id;?>" name="job_id" id="job_id" />
							   <input type="hidden" value="<?php echo $exp_id;?>" name="exp_id" id="exp_id" />
							   <button class="form-control btn btn-primary" type="buttton" onclick="addComment();"><i class="fa fa-send"></i> Send</button>
					   </div>
				   </fieldset>
             </div>
			<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
				   <fieldset>
					   <legend>Applicants</legend>
					   <div class="chat_div"> <br/>
							<div class="messages" >
							<table>	
								<?php
								foreach($applicants as $apl)
								{
								?>
								<tr>
									<td><?php echo $apl->first_name;?></td>
									<td>
										<a href="<?php echo base_url();?>ado/Employer/viewAllComments/<?php echo $job_id;?>/<?php echo $apl->expert_id;?>">Comments
										</a>	 
									</td>
								</tr>
								<?php
								}
								?>	
								</table>
						    </div>
					   </div>
				   </fieldset>
             	</div>
	</div>	
</section><!-- /.content -->
<script>

function addComment()
{	
	
	$("#err_comm").html('');
	var comment = $("#comment").val();
	if(comment == '')
	{
		$("#err_comm").html('please enter your comment');		
		return false;
	}
	
	var job_id = $("#job_id").val();
	var exp_id = $("#exp_id").val();
	
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/addComment",
		dataType: 'html',
		data: {job_id:job_id,exp_id:exp_id,comment:comment},
		success: function(res)
		{
			$('#comment').val('');
			//console.log(res);
			//alert(res);	return false;		
			$("#j_comm").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
	
</script>
<script>
    var objDiv = document.getElementById("j_comm");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>