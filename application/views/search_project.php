<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.css"/>
<style>
    .to_show{
        display: none;
    }
    .table-hover thead tr th{
        font-size: 100%;
        letter-spacing: 0px;
    }
    @media only screen and (max-width: 500px) {
        .table thead tr th{
            display: none;
        }
        .table tbody tr td{
            display: block;
            border-top: none;
        }
        .table tbody tr{
            padding: 2px;
            box-shadow: 2px 4px #888888;
        }
        .to_show{
            display: inline-block;
            font-weight: bold;
        }
        .dataTables_length{
            display: none;
        }
    }
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Get yourself a freelancing project</h3>
          <p>Working from home and getting a project was never this easy</p>
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
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 table-responsive">
                <fieldset>
                    <legend>Freelance Projects</legend>
                    <table id="job_table1" class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-info-circle"></i> Project Title</th>
                                <th><i class="fa fa-language"></i> Language</th>
                                <th><i class="fa fa-list-alt"></i> Description</th>
                                <th><i class="fa fa-dollar"></i> Rate</th>
                                <th><i class="fa fa-calendar-o"></i> Date</th>
                                <th><i class="fa fa-wrench"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       <?php
							if($jobs)
							{
								foreach($jobs as $j)
								{
							?>
                        	<tr>
                            <td><span class="to_show"><i class="fa fa-info-circle"></i> Project Title :</span> <?php echo $j->title; ?></td>
                            <td><span class="to_show"><i class="fa fa-language"></i> Languages :</span> 
                               <?php 
                                if($j->from_language || $j->to_language){
                                    $lang1 = $this->My_model->selectRecord('language', '*', array('id' => $j->from_language));
                                    $lang2 = $this->My_model->selectRecord('language', '*', array('id' => $j->to_language));
                                    echo $lang1[0]->name." to ". $lang2[0]->name;
                                } else {
                                    echo "Not specified";
                                } 
                                ?>
                            </td>
                            <td><span class="to_show"><i class="fa fa-list-alt"></i> Description :</span> <?php echo $j->description; ?></td>
                            <td><span class="to_show"><i class="fa fa-dollar"></i> Rate :</span> <?php echo "$".$j->work_rate."/".$this->config->config['job_units'][$j->unit_name]." for ".$j->unit_numbers." ".$this->config->config['job_units'][$j->unit_name]; ?></td>
                            <td><span class="to_show"><i class="fa fa-calendar-o"></i> Date :</span> <?php echo $j->last_date; ?></td>
                            <td><a href="<?php echo base_url() ?>searchproject/jobdesc/<?php echo $j->id; ?>"><button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button></a></td>
                        </tr>
                        <?php
                            }
						}
                        ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</section>