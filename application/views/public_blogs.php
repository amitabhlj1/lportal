<style>
    .tags{
        display: inline-block;
    }
    .tags a{
        margin: 0 2px 5px 0;
        padding: 5px 7px;
        border: 1px solid #e9e9e9;
        color: #777;
        background-color: white;
    }
    .tags a:hover{
        color: white;
        background-color: #000;
        border: 1px solid #8ea0b7;
    }
    .active a{
        background-color: limegreen !important;
        color: white !important;
    }
    #blog_list{
        padding: 20px 0px;
    }
</style>
 <section class="module bg-dark-60 blog-page-header" data-background="<?php echo base_url() ?>assets/images/small_sections/blog.png">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2 class="module-title font-alt">Blog Grid</h2>
        <div class="module-subtitle font-serif">Discover something new</div>
      </div>
    </div>
  </div>
</section>

 <section class="module" id="blog_list">
  <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            Langjobs Blog tags : <div class="tags <?php if(!$type) echo "active" ?>">
                <a href="<?php echo base_url('Blogs/v'); ?>">All</a>
            </div>
            <?php
                foreach($btype as $bt){ ?>
                    <div class='tags <?php if($bt->id == $type) echo "active"; ?>'>
                        <a rel='canonical' href='<?php echo base_url()."Blogs/v/".$bt->id ?>#blog_list'><?php echo $bt->name; ?></a>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
    <hr/>
    <div class="row multi-columns-row post-columns">
     <?php if($blogs){ 
        foreach($blogs as $b){
     ?>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="post">
              <div class="post-thumbnail"><a rel="canonical" href="<?php echo base_url() ?>Blogs/view/<?php echo $b->id; ?>-<?php echo implode('-', explode(' ', $b->topic)); ?>"><img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $b->image; ?>" alt="Blog-post Thumbnail"/></a></div>
              <div class="post-header font-alt">
                <h2 class="post-title"><a rel="canonical" href="<?php echo base_url() ?>Blogs/view/<?php echo $b->id; ?>-<?php echo implode('-', explode(' ', $b->topic)); ?>"><?php echo $b->topic; ?></a></h2>
                <div class="post-meta">By&nbsp;<a href="<?php echo base_url() ?>All_experts/profile/<?php echo $b->written_by; ?>"><?php echo $b->first_name." ".$b->last_name ?></a>&nbsp;| <?php echo date('d F Y', strtotime($b->created));?> 
                </div>
              </div>
              <div class="post-entry">
                <p><?php echo mb_substr($b->article, 0, 85, 'utf-8')."...."; ?></p>
              </div>
              <div class="post-more"><a class="more-link" rel="canonical" href="<?php echo base_url() ?>Blogs/view/<?php echo $b->id; ?>-<?php echo implode('-', explode(' ', $b->topic)); ?>">Read more</a></div>
            </div>
          </div>
        <?php
        }
        } else {
            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2>Oops, It seems like we don't have any blogs written for this category yet, come back later. We might cook something up for you till then.</h2></center></div>";
        } ?>      
    </div>
  </div>
</section>