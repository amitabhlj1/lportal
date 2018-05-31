<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark"  data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg" style="background-image: url("<?php echo base_url(); ?>assets/images/small_sections/blog.jpg");">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Create Blog Post</h3>
          <p>You can showcase your language skills here. We'll make sure that world see's your effort</p>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>Blogs/save_article" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Add New Blog Post</legend>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="topic">Blog Title</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input name="topic" type="text" class="form-control" id="" placeholder="A good title can catch reader's eye faster" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="keywords">Keywords for blog</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input name="keywords" type="text" class="form-control" id="" placeholder="Comma seperated meaningful words related with your article" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog Article</label>
                                <div class="col-sm-6 col-xs-12">
                                  <textarea name="article" rows="8" cols="45" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog type</label>
                                <div class="col-sm-6 col-xs-12">
                                  <select class="form-control select2" multiple name="type[]">
                                      <option>Type of this article</option>
                                      <?php
                                        foreach($type as $t){
                                            echo "<option value='$t->id'>$t->name</option>";
                                        }
                                      ?>
                                  </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog image</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input name="image" type="file" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="">&nbsp;</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input type="submit" name="submit" id="submit" class="btn btn-success btn-xs form-control" value="Save this Article">
                                </div>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>