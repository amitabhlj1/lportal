<section class="module-small">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="post">
          <div class="post-thumbnail"><img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $blogs[0]->image; ?>" alt="Blog Featured Image"/></div>
          <div class="post-header font-alt">
            <h1 class="post-title"><?php echo $blogs[0]->topic; ?></h1>
            <div class="post-meta">By&nbsp;<a href="#"><?php echo $blogs[0]->first_name." ".$blogs[0]->last_name ?></a>| <?php echo date('d F Y', strtotime($blogs[0]->created));?> | <a href="#">Photography, </a><a href="#">Web Design</a>
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
            <li class="clearfix">
              <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"/></a></div>
              <div class="widget-posts-body">
                <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                <div class="widget-posts-meta">23 january</div>
              </div>
            </li>
            <li class="clearfix">
              <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"/></a></div>
              <div class="widget-posts-body">
                <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                <div class="widget-posts-meta">15 February</div>
              </div>
            </li>
            <li class="clearfix">
              <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-3.jpg" alt="Post Thumbnail"/></a></div>
              <div class="widget-posts-body">
                <div class="widget-posts-title"><a href="#">Eco bag Mockup</a></div>
                <div class="widget-posts-meta">21 February</div>
              </div>
            </li>
            <li class="clearfix">
              <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-4.jpg" alt="Post Thumbnail"/></a></div>
              <div class="widget-posts-body">
                <div class="widget-posts-title"><a href="#">Bottle Mockup</a></div>
                <div class="widget-posts-meta">2 March</div>
              </div>
            </li>
          </ul>
        </div>
        <div class="widget">
          <h5 class="widget-title font-alt">Blog Types</h5>
          <div class="tags font-serif"><a href="#" rel="tag">Blog</a><a href="#" rel="tag">Photo</a><a href="#" rel="tag">Video</a><a href="#" rel="tag">Image</a><a href="#" rel="tag">Minimal</a><a href="#" rel="tag">Post</a><a href="#" rel="tag">Theme</a><a href="#" rel="tag">Ideas</a><a href="#" rel="tag">Tags</a><a href="#" rel="tag">Bootstrap</a><a href="#" rel="tag">Popular</a><a href="#" rel="tag">English</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>