<script>
  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */
      (document.getElementById('autocomplete')), {
        types: ['geocode']
      });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa0L27dpX-xgwglyvc9jtNZ2_sJt_JNq4&libraries=places&callback=initAutocomplete" async defer></script>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
		  <header class="panel-heading">Search language Experts</header>							
		<div class="panel-body">
           <form class="form-horizontal" action="" method="post" autocomplete="off">
               <div class="form-group">
                <label class="control-label col-sm-2" for="language">Language:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="language">
                      <option>Sort by Language</option>
                      <?php 
                        foreach($languages as $l){
                            echo "<option value='".$l->id."'>".$l->name."</option>";
                        }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="experience">Total Experience:</label>
                <div class="col-sm-10"> 
                  <select class="form-control" name="experience">
                      <option>Sort By Experience</option>
                      <?php
                            foreach( $this->config->item('job_exp') as $key => $exp)	
                            {
                        ?>
                            <option value="<?php echo $key; ?>"><?php echo $exp;?></option>
                        <?php } ?>	
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="location">Location:</label>
                <div class="col-sm-10"> 
                    <input name="location" class="form-control" id="autocomplete" placeholder='Eg: Delhi, New York...' />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="kwords">Keywords:</label>
                <div class="col-sm-10"> 
                    <input name="kwords" class="form-control" placeholder="comma seperated skills/keywords" maxlength='120'/>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                </div>
              </div>
           </form>
        </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->