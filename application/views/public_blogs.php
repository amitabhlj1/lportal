<style>
    #blog_list{
        padding: 20px 0px;
    }
    .effect1{
	-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;
	   -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;
	        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;
    }
</style>
 <section class="module bg-dark-60 blog-page-header" data-background="<?php echo base_url() ?>assets/images/small_sections/blog.png">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2 class="module-title font-alt">Blog Grid</h2>
        <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
      </div>
    </div>
  </div>
</section>

 <section class="module" id="blog_list">
  <div class="container">
    <div class="row multi-columns-row post-columns">
     <?php if($blogs){ 
        foreach($blogs as $b){
     ?>
        <div class="col-sm-6 col-md-3 col-lg-3 effect1">
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
            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>No blog posts are present yet, come back later. We might cook something up for you till then.</div>";
        } ?>      
    </div>
  </div>
</section>