<link href="<?php echo base_url(); ?>assets/css/addTags.css" rel="stylesheet">
<style>
    .select2-container .select2-selection {
      height: 33px; 
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: inherit !important;
        line-height: 29px;
    }
</style>
<div class="main">&nbsp;</div><br/><br/>
    <section class="module-small bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
            <div class="callout-text font-alt">
              <h3 class="callout-title">Search Your Favourite Jobs</h3>
              <p>We have a huge collection of jobs, Just search and apply. It's that easy!</p>
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
                              <select name="locationCombo" class="form-control select2">
                                    <option value="" selected="selected">All Locations</option>
                                    <?php
                                        foreach($city as $c){ ?>
                                        <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                                    <?php
                                        }
                                    ?>
                              </select>
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
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 table-responsive">
                        <?php 
                            if(is_array($jobs)){ ?>
                            <table id="job_table1" class="table table-hover">
                               <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Expr</th>
                                    <th>Location</th>
                                    <th>Company</th>
                                    <th>Date</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($jobs as $j){ ?>
                                            <tr>
                                                <td><?php echo $j->title; ?></td>
                                                <td><?php echo $this->config->config['job_exp'][$j->total_exp]; ?></td>
                                                <td><?php  
                                                    $cty = $this->My_model->selectRecord('cities', '*', array('id' => $j->j_city));
                                                    $cntry = $this->My_model->selectRecord('country', '*', array('id' => $j->j_country));
                                                    echo $cty[0]->name.", ".$cntry[0]->c_code;
                                                ?></td>
                                                <td><?php 
                                                    $cmp = $this->My_model->selectRecord('lang_company', '*', array('id' => $j->company_id));
                                                             echo $cmp[0]->company_name;
                                                ?></td>
                                                <td><?php echo $j->last_date; ?></td>
                                                <td><a href="<?php echo base_url() ?>searchjob/jobdesc/<?php echo $j->id; ?>"><button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button></a></td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php         
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>