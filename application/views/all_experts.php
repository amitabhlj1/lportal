<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<style>
    .well{
        background-image: url('https://www.planwallpaper.com/static/images/Alien_Ink_2560X1600_Abstract_Background_1.jpg');
        background-size: contain;
        font-family: 'Anton', sans-serif;
        padding: 2px;
        margin: 2px;
        height: 16em;
    }
    .well .profile, .well .name, .well .exp, .well .view_more, .well .skill{
        text-align: center;
    }
    .well .name{
        font-size: 22px;
        letter-spacing: 3px;
        color: #4b4b58;
    }
    .well .profile{
        letter-spacing: 4px;
    }
    .well .exp{
    }
    
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Langjobs Language Experts</h3>
          <p>End of your search for language experts</p>
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
<!--
                    <table class="table table-hover" id="jhistory">
                        <thead>
                            <tr>
                                <th>Expert Name</th>
                                <th>Current Profile</th>
                                <th>Experience</th>
                                <th>Skills</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($experts){
                                    foreach($experts as $e){
                                        echo "<tr>";
                                        echo "<td>".strtoupper($e->last_name." ".mb_substr($e->first_name, 0, 1, 'utf-8')).".</td>";
                                        echo "<td>".$e->profile_name."</td>";
                                        echo "<td>".$this->config->config['job_exp'][$e->total_exp]."</td>";
                                        echo "<td>".$e->skills."</td>";
                                        echo "<td align='center'><a href='".base_url()."All_experts/profile/".$e->id."'><button class='btn btn-xs btn-info'>View More</button></a></td>";
                                        echo "</tr>";
                                    }   
                                } else {
                                    echo "<tr><td colspan='5'>Retreiving list of experts now...</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
-->
                <div class="row">
                    <?php
                        foreach($experts as $e){ ?>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 well">
                            <div class="eimg">
                                <?php
                                    if($e->social_login == 1){
                                        $eimg = $e->image;
                                    } else {
                                        if(!$e->image){
                                            $eimg = base_url()."assets/1.png"; 
                                        } else {
                                            $eimg = base_url()."assets/uploads/experts/".$e->image;
                                        }
                                    }              
                                ?>
                                <img src="<?php echo $eimg; ?>" height="40" width="40" class="img-rounded"/>
                            </div>
                            <div class="name">
                                <?php echo strtoupper($e->last_name." ".mb_substr($e->first_name, 0, 1, 'utf-8')); ?>
                            </div>
                            <div class="profile">
                                <?php echo $e->profile_name; ?>
                            </div>
                            <div class="exp">
                                <?php echo $this->config->config['job_exp'][$e->total_exp]; ?>
                            </div>
                            <div class="skill">
                                <?php if($e->skills){echo $e->skills;} else {echo "Language Expert";}; ?>
                            </div>
                            <div class="view_more">
                               <?php echo "<a href='".base_url()."All_experts/profile/".$e->id."'><button class='btn btn-xs btn-success'>View More</button></a>"; ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                </fieldset>
            </div>
        </div>
    </div>
</section>