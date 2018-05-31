<style>
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
<section class="module-small bg-dark"  data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg" style="background-image: url("<?php echo base_url(); ?>assets/images/small_sections/blog.jpg");">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Your Blog Post</h3>
          <p>All blogs written by you</p>
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
                    <legend>Blogs</legend>
                    <table class="table table-hover" id="user_blog">
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Keywords</th>
                                <th>Article</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($blogs as $b){ ?>
                                    <tr>
                                        <td><b><?php echo $b->topic; ?></b></td>
                                        <td><?php echo $b->keywords; ?></td>
                                        <td><?php echo mb_substr($b->article, 0, 150, 'utf-8') ?></td>
                                        <td><a href="" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> &nbsp; <a href="<?php echo base_url() ?>Blogs/edit/<?php echo $b->id; ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a></td>
                                    </tr>   
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</section>