<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark"  data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg" style="background-image: url("<?php echo base_url(); ?>assets/images/small_sections/blog.jpg");">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Edit Blog Post</h3>
          <p>Her you can improve your already posted blog</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        &nbsp;
      </div>
    </div>
  </div>
</section>
<?php
    $blog = $this_blog[0];
?>
<section class="module" style="padding:40px 0px;">
    <div class="container">
        <div class="row">
            <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12 table-responsive">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>Blogs/update_article" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Edit Blog Post</legend>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="topic">Blog Title</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input type="hidden" name="id" value="<?php echo $blog->id; ?>" ?>
                                  <input name="topic" type="text" class="form-control" id="" placeholder="A good title can catch reader's eye faster" value="<?php echo $blog->topic; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="keywords">Keywords for blog</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input name="keywords" type="text" class="form-control" id="" placeholder="Comma seperated meaningful words related with your article" value="<?php echo $blog->keywords; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog Article</label>
                                <div class="col-sm-6 col-xs-12">
                                  <textarea name="article" rows="8" cols="45" class="form-control" required><?php echo $blog->article; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog type</label>
                                <div class="col-sm-6 col-xs-12">
                                 <?php $bt = explode(',', $blog->type); ?>
                                  <select class="form-control select2" multiple name="type[]">
                                      <option>Type of this article</option>
                                      <?php
                                        foreach($type as $t){ ?>
                                            <option value='<?php echo $t->id; ?>' <?php if(in_array($t->id, $bt)){echo "selected";} ?> ><?php echo $t->name; ?></option>
                                      <?php
                                        }
                                      ?>
                                  </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="article">Blog image</label>
                                <div class="col-sm-2 col-xs-12">
                                  <input name="image" type="file" class="form-control" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <b>Current blog image: </b><img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $blog->image; ?>" width="40">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-xs-12" for="">&nbsp;</label>
                                <div class="col-sm-6 col-xs-12">
                                  <input type="submit" name="submit" id="submit" class="btn btn-success btn-xs form-control" value="Update this Blog Post">
                                </div>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>