<section class="module-small">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="post">
          <div class="post-thumbnail"><img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $blogs[0]->image; ?>" alt="Blog Featured Image"/></div>
          <div class="post-header font-alt">
            <h1 class="post-title"><?php echo $blogs[0]->topic; ?></h1>
            <div class="post-meta">By&nbsp;<a href="#"><?php echo $blogs[0]->first_name." ".$blogs[0]->last_name ?></a>| <?php echo date('d F Y', strtotime($blogs[0]->created));?> | 
            <?php 
                $typs = $blogs[0]->type;
                $artyp = explode("," ,$typs);
                $artp = array();
                for($i=0; $i<count($artyp); $i++){
                    $index = $artyp[$i];
                    array_push($artp, $btype[$index-1]->name);
                }
                echo implode(", ", $artp);
            ?>
            </div>
          </div>
          <div class="post-entry">
            <?php echo $blogs[0]->article; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
        <div class="widget">
          <h5 class="widget-title font-alt">Recent Posts</h5>
          <ul class="widget-posts">
           <?php
                //using array slice here so that whatever the number of blogs are, only 3 are going to be listed
                //Basically an alternative to "LIMIT"
                foreach(array_slice($recent_blogs, 0, 3) as $rb){ 
                ?>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="<?php echo base_url()."assets/uploads/blog/".$rb->image; ?>" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#"><?php echo mb_substr($rb->topic,0,24, "utf-8"); ?></a></div>
                        <div class="widget-posts-meta"><?php echo date('d F Y', strtotime($rb->created)); ?></div>
                      </div>
                    </li>
            <?php
                }
            ?>
          </ul>
        </div>
        <div class="widget">
          <h5 class="widget-title font-alt">Langjob's Blog Tags</h5>
          <div class="tags font-serif">
          <?php
             foreach($btype as $b){
                 echo "<a href='".base_url()."Blogs/v/".$b->id."#blog_list'>$b->name</a>";
             } 
          ?>
          <a href="#" rel="tag">Blog</a><a href="#" rel="tag">Photo</a><a href="#" rel="tag">Video</a><a href="#" rel="tag">Image</a><a href="#" rel="tag">Minimal</a><a href="#" rel="tag">Post</a><a href="#" rel="tag">Theme</a><a href="#" rel="tag">Ideas</a><a href="#" rel="tag">Tags</a><a href="#" rel="tag">Bootstrap</a><a href="#" rel="tag">Popular</a><a href="#" rel="tag">English</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>