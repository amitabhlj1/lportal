<link href="<?php echo base_url(); ?>assets/css/addTags.css" rel="stylesheet">
<style>
    .select2-container .select2-selection {
      height: 33px; 
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: inherit !important;
        line-height: 29px;
    }
    .pac-container:after {
        background-image: none !important;
        height: 0px;
    }
    .card{
        margin: 5px;
        border:1px solid skyblue;
        border-radius: 5px;
        /*color: burlywood !important;*/
        color: rgb(241,50,200);
    }
    .card>.row>.col-md-4{
        text-align: center;
    }
    .card-header{
        font-weight: bold;
        margin-top: 3px;
        margin-bottom: 3px;
    }
    .job-title{
        text-align: center;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        color: #0010cf;
        text-transform: uppercase;
        font-weight: bold;
        width: 90%;
        margin-left: 2%;
        margin-right: 2%;
    }
    .job-lang{
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    .job-location{
        border-radius: 2px;
        color: rgb(75, 75, 75);
    }
    .card .fa{
        color: #000;
    }
    .easyPaginateNav{
        text-align: center;
    }
    .easyPaginateNav a {
        display:inline-block;
        padding:0.3em 1em;
        margin:0 0.3em 0.3em 0;
        border-radius:0.15em;
        box-sizing: border-box;
        text-decoration:none;
        font-family:'Roboto',sans-serif;
        text-transform:uppercase;
        font-weight:400;
        color:#FFFFFF;
        background-color:#3369ff;
        box-shadow:inset 0 -0.6em 0 -0.35em rgba(0,0,0,0.17);
        text-align:center;
        position:relative;
    }
    .easyPaginateNav a.current {
        font-weight:bold;
        text-decoration:underline;
        background-color: skyblue;
        color: white;
    }
    .card .fa-eye{
        font-size: 16px;
    }
    .page{
        animation:bouncy 5s infinite linear;
        position:relative;
    }
    .page:nth-child(3n+1){
        animation-delay:0.05s;
    }
    @keyframes bouncy {
        0%{top:0em}
        40%{top:0em}
        43%{top:-0.9em}
        46%{top:0em}
        48%{top:-0.4em}
        50%{top:0em}
        100%{top:0em;}
    }
</style>
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
<div class="main">&nbsp;</div><br/><br/>
    <section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/search.jpg">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-6">
            <div class="callout-text font-alt">
              <h3 class="callout-title">Search Jobs Or Projects</h3>
              <p>Just search and apply. It's that easy!</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2">
            &nbsp;
          </div>
        </div>
      </div>
    </section>
    <section class="module" style="padding:40px 0px;">
            <div class="container">
                <div class="row">
                    <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12">
                        <form action="<?php echo base_url(); ?>SearchJob/retrieve_jobs" method="post" name="searchf">
                            <fieldset>
                               <legend>Advance Search options:</legend>
                               <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                                <select name="language" class="form-control select2">
                                    <option value="">All Langs</option>
                                    <?php
                                        foreach($lang as $l){ ?>
                                        <option value="<?php echo $l->id; ?>"><?php echo $l->name; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                                <select name="sector" class="form-control select2">
                                    <option value="">All Sectors</option>
                                    <?php
                                        foreach($sectors as $s){ ?>
                                        <option value="<?php echo $s->id; ?>"><?php echo $s->cat_name; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                                   <input id="autocomplete" name="locationCombo" placeholder="Enter your address" type="text" class="form-control" />
                                </div>
                            <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                              <select name="experience" class="form-control select2">
                                <option value="">Experience</option>
                                <?php
                                    foreach( $this->config->item('job_exp') as $key => $exp)	
                                    {
                                ?>
                                    <option value="<?php echo $key; ?>"><?php echo $exp;?></option>
                                <?php } ?>		
                              </select>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12"> 
                              <input type='text' id="tags_1" name="keywords" value="" placeholder="Comma seperated keywords">
                            </div>
                            <div class="col-md-1 col-lg-1 col-xs-12 col-sm-12">
                              <input id="search_btn" type="submit" name="empsearchbutton" class="btn btn-block btn-round btn-d" value="" title="Click to Search">
                            </div>
                            </fieldset>
                          </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="module" style="padding:20px 0px;">
            <div class="container">
                <div class="row">
                    <div id="easyPaginate" class="col-md-12 col-lg-12 col-xs-12 col-sm-12 table-responsive">
                        <?php 
                            if(is_array($jobs)){ ?>
                                <?php
                                        foreach($jobs as $j){ ?>
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 element">
                                            <div class="card">
                                                <div class="row card-header">
                                                    <div class="col-md-4" title="Job Type">
                                                        <?php if($j->j_type == 1){echo "<i class='fa fa-briefcase'></i> Full/Part Time";}else{echo "<i class='fa fa-trophy'></i>Freelance/Project";} ?>
                                                    </div>
                                                    <div class="col-md-4" title="<?php echo strip_tags($j->company_name); ?>">
                                                        <?php echo "<i class='fa fa-building'></i> ".strip_tags(mb_substr($j->company_name,0,12,'utf-8')).".."; ?>
                                                    </div>
                                                    <?php
                                                        //Handling languages from jobs table
                                                        $lang=array();
                                                        //check if job has languages
                                                        if($j->languages){
                                                            //explode if it has many languages
                                                            foreach(explode(',', $j->languages) as $s){
                                                                $sk = $this->My_model->selectRecord('language', '*', array('id' => $s));
                                                                //push into new array
                                                                array_push($lang, $sk[0]->name);
                                                            }
                                                        } else {
                                                            $lang = array('N.A.');
                                                        }
                                                    ?>
                                                    <div class="col-md-4 job-lang" title="Language(s): <?php echo implode(",",$lang); ?>">
                                                        <?php echo "<i class='fa fa-language'></i> ".implode(",",$lang); ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="col-md-12 job-title">
                                                         <h4><?php echo strip_tags($j->title); ?></h4>
                                                     </div>   
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                       <span class="form-control job-location">
                                                        <?php 
                                                            if($j->address){
                                                                echo "<i class='fa fa-map-marker'></i> ".$j->address;
                                                            } else {
                                                                echo "<i class='fa fa-map-marker'></i> N.A.";
                                                            }
                                                        ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-4">&nbsp;</div>
                                                    <div class="col-md-4">
                                                        <?php 
                                                            if($j->j_type == 1){ ?>
                                                                <a rel="canonical" title="See Description" target="_blank" href="<?php echo base_url() ?>SearchJob/jobdesc/<?php echo $j->id; ?>"><button class="btn btn-xs form-control"><i class="fa fa-eye"></i></button></a>
                                                        <?php
                                                            } else { ?>
                                                                 <a rel="canonical" title="See Description" target="_blank" href="<?php echo base_url() ?>SearchProject/jobdesc/<?php echo $j->id; ?>"><button class="btn btn-xs form-control"><i class="fa fa-eye"></i></button></a>  
                                                        <?php
                                                            } 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php 
                                        } 
                                ?>
                        <?php         
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>