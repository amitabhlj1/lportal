<style>
    .card{
        padding: 2%;
        margin: 1%;
        border-radius: 3%;
        border: 1px solid #fff;
        -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.75);
        box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.75);
    }
    .card:hover{
        -webkit-box-shadow: 0px 8px 10px 0px rgba(153,69,153,0.88);
        -moz-box-shadow: 0px 8px 10px 0px rgba(153,69,153,0.88);
        box-shadow: 0px 8px 10px 0px rgba(153,69,153,0.88);
    }
    .panel-heading{
        font-weight: bold;
    } 
</style>
<section class="content">
    <div class="row">
       <div class="col-md-12">
            <section class="panel">
              <header class="panel-heading">Choose Your Plan</header>
            
            <div class="panel-body">
                <div class="row">
                   <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 card">
                       <div class="upper"><img src="<?php echo base_url(); ?>assets/images/silver.jpg" /></div>
                       <div class="lower">
                           <h3>Silver Plan</h3>
                           <div class="desc">This Plan will get you, <?php echo $this->config->config['rplan_cv'][1]; ?> Resumes in $<?php echo $this->config->config['rplan_price'][1] ?></div>
                           <button class="btn btn-primary form-control" onclick="payment_modal(1, <?php echo $this->config->config['rplan_price'][1] ?>)" data-toggle="modal" data-target="#myModal">Choose Silver Plan</button>
                        </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 card">
                       <div class="upper"><img src="<?php echo base_url(); ?>assets/images/gold.jpg" /></div>
                       <div class="lower">
                           <h3>Gold Plan</h3>
                           <div class="desc">This Plan will get you, <?php echo $this->config->config['rplan_cv'][2]; ?> Resumes in $<?php echo $this->config->config['rplan_price'][2] ?></div>
                           <button class="btn btn-primary form-control" onclick="payment_modal(2, <?php echo $this->config->config['rplan_price'][2] ?>)" data-toggle="modal" data-target="#myModal">Choose Gold Plan</button>
                        </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 card">
                       <div class="upper"><img src="<?php echo base_url(); ?>assets/images/diamond2.jpg" /></div>
                       <div class="lower">
                           <h3>Diamond Plan</h3>
                           <div class="desc">This Plan will get you, <?php echo $this->config->config['rplan_cv'][3]; ?> Resumes in $<?php echo $this->config->config['rplan_price'][3] ?></div>
                           <button class="btn btn-primary form-control" onclick="payment_modal(3, <?php echo $this->config->config['rplan_price'][3] ?>)" data-toggle="modal" data-target="#myModal">Choose Diamond Plan</button>
                         </div>
                   </div>                   
                </div>
            </div>
            </section>
        </div><!--end col-6 -->
    </div>
</section>

<script>
    function payment_modal(x, price){
        //alert('yep');
        if(x==1){
           var plan = "Silver";
        } else if(x==2){
            var plan = "Gold";
        } else if(x==3){
            var plan = "Diamond";
        } 
        document.getElementById('mhead').innerHTML = "You have Chosen: "+plan+" Plan. You have to pay: $"+price;
    }
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4 id="mhead"></h4>
        <label>Select Your Payment Option: </label>
        <button class='btn btn-sm btn-success'> Indian </button> 
        <button class='btn btn-sm btn-danger'> International </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>