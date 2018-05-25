<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.css"/>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Job History</h3>
          <p>List of all the jobs on which you have shown your interest on</p>
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
            <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12 table-responsive">
                <fieldset>
                    <legend>
                        View Job History
                    </legend>
                    <table class="table table-hover" id="jhistory">
                        <thead>
                            <tr>
                                <th>Job Type</th>
                                <th>Job Title</th>
                                <th>Apply Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($total_jobs as $tj){
                                    echo "<tr>";
                                    if($tj->j_type == 1){
                                        echo "<td>Full/Part-time</td>";
                                        echo "<td>".$tj->title."</td>";
                                        echo "<td>".$tj->apply_date."</td>";
                                        echo "<td><a href='".base_url()."SearchJob/jobdesc/".$tj->job_id."'><button class='btn btn-xs btn-info'><i class='fa fa-eye'></i></button></a></td>";
                                    } else if($tj->j_type == 2) {
                                        echo "<td>Freelance/Project</td>";
                                        echo "<td>".$tj->title."</td>";
                                        echo "<td>".$tj->apply_date."</td>";
                                        echo "<td><a href='".base_url()."SearchProject/jobdesc/".$tj->job_id."'><button class='btn btn-xs btn-info'><i class='fa fa-eye'></i></button></a></td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</section>