<div class="tab-pane fade active in" id="profile">
	<div class="container">
		<div class="col-sm-11" style="float:left;">
		   <h4 class="rlabel" style="margin-left:-30px; margin-top:0px;"><i class="fa fa-file-text-o"></i> Mini Resume</h4>
			<div class="module-subtitle font-serif" style="margin-bottom:0px; text-align:center;">
				<p><?php if(!empty($usr[0]->about_me)) {echo $usr[0]->about_me;} else {echo "Please update your profile for better visibility / Click on Edit Profile Button";} ?></p>
			</div>
		</div>
		<!--col-sm-12 close-->
		<br clear="all" />
		<div class="row">
		   <div class="col-md-11 table-responsive">
				<h4 class="rlabel"><i class="fa fa-columns"></i> Basic Details</h4>
				<div class="row" style="margin-left:12px;text-align:left;">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
						<i class="fa fa-envelope"></i> <?php if($usr[0]->email == ''){echo "<span style='color:red;'>Not Available</span>";} else {echo $usr[0]->email;}; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
						<i class="fa fa-phone"></i> <?php if($usr[0]->mobile == ""){echo "<span style='color:red;'>Not Available</span>"; }else{echo $usr[0]->mobile;}; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
					   <?php
							if(!empty($usr[0]->fid)){
								echo "<i class='fa fa-facebook-square'></i> <a href='".$usr[0]->fid."'>Facebook <i class='fa fa-external-link-square'></i></a>";
							} else {
								echo "<i class='fa fa-facebook-square'></i> Not Updated Yet";
							}
						?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
					   <?php
							if(!empty($usr[0]->tid)){
								echo "<i class='fa fa-twitter-square'></i> <a href='".$usr[0]->tid."'>Twitter <i class='fa fa-external-link-square'></i></a>";
							} else {
								echo "<i class='fa fa-twitter-square'></i> Not Updated Yet";
							}
						?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
					   <?php
						if(!empty($usr[0]->qid)){
								echo "<i class='fa fa-quora'></i> <a href='".$usr[0]->qid."'>Quora <i class='fa fa-external-link-square'></i></a>";
							} else {
								echo "<i class='fa fa-quora'></i> Not Updated Yet";
							}
					   ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
					   <?php
						if(!empty($usr[0]->lid)){
								echo "<i class='fa fa-linkedin-square'></i> <a href='".$usr[0]->lid."'>Linkedin <i class='fa fa-external-link-square'></i></a>";
							} else {
							echo "<i class='fa fa-linkedin-square'></i> Not Updated Yet";
						}
						?>
					</div>
				</div>
			</div>
			<div>
			<div class="col-md-6 table-responsive">
				<h4 class="rlabel" style="width:100%;border-right:4px solid gold;"><i class="fa fa-graduation-cap"></i> Education</h4>
				<?php 
					if($education){ 
						foreach($education as $edu){
				?>
						<table class="table" style="width:100%">
							<thead>
								<tr>
									<th><?php echo $edu->exam_name ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $edu->college_name; ?></td>
								</tr>
								<tr>
									<td>Passing Year: <?php echo $edu->p_year; ?> | Scored: <?php echo $edu->marks ?></td>
								</tr>
								<tr>
									<td><b>My view: </b><?php echo $edu->remarks; ?></td>
								</tr>
							</tbody>
						</table>
				<?php    
						}
					} else {
						echo "<div class='text-center'>Education Details have not been updated yet! Please update your profile soon, to achieve better visibility</div>";
					}
				?>
			</div>
			<div class="col-md-6 table-responsive">
				<h4 class="rlabel" style="width:100%;border-right:4px solid gold;text-align:right;"><i class="fa fa-suitcase"></i> Work Experience</h4>
				<?php 
					if($work_history){ 
						foreach($work_history as $wh){
				?>
						<table class="table">
							<thead>
								<tr>
									<th><?php echo $wh->company_name ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $wh->designation ?></td>
								</tr>
								<tr>
									<td><?php echo $wh->work_description ?></td>
								</tr>
								<tr>
									<td><?php echo $wh->y_from." to ".$wh->y_to; ?></td>
								</tr>
							</tbody>
						</table>
				<?php    
						}
					} else{
						echo "<div class='text-center'>Work history not found! Please update your profile soon, to achieve better visibility</div>";
					}
				?>
			</div>
			</div>
			<!--col-md-11 close-->
		</div>
		<!--row close-->




	</div>
	<!--container close-->
</div>
<!--tab-pane close-->
