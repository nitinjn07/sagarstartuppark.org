<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Resource
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['editid']))
                                  {
                                    $where =array('id'=>$_GET['editid']);
                                    $res = $this->db->get_where('resouces',$where)->row();
                                ?>
                                <form action="<?=base_url();?>Resources/updateResource?updateid=<?=$res->id;?>"
                                    method="post">
                                    <div class="form-group my-2">
                                        <label for="">Resource Type </label>
                                        <input type="radio" name="r_type" value="Free"
                                            <?php if($res->type='Free'){ echo "checked"; }?> required /> Free
                                        <input type="radio" name="r_type" value="Paid"
                                            <?php if($res->type='Paid'){ echo "checked"; }?> required /> Paid
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Select Category</label>
                                        <select name="catid" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <?php
                                               $category= $this->db->get_where('resource_category',array('delstatus'=>1))->result(); 
                                               foreach($category as $c)
                                               {
                                            ?>
                                            <option value="<?=$c->id;?>"
                                                <?php if($res->catid==$c->id){echo "selected"; }?>><?=$c->cat_name;?>
                                            </option>
                                            <?php 
                                               }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control py-2"
                                            placeholder="Enter title" value="<?=$res->title;?>" required />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Link</label>
                                        <input type="url" name="link" value="<?=$res->link;?>" class="form-control py-2"
                                            placeholder="Enter Link" required />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control py-2"
                                            required><?=$res->description;?></textarea>
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Update Resource" />
                                    </div>
                                </form>

                                <?php
                                  }
                                  else 
                                  {
                                 ?>
                                <form action="<?=base_url();?>Resources/saveResource" method="post">
                                    <div class="form-group my-2">
                                        <label for="">Resource Type </label>
                                        <input type="radio" name="r_type" value="Free" required /> Free
                                        <input type="radio" name="r_type" value="Paid" required /> Paid
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Select Category</label>
                                        <select name="catid" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <?php
                                               $category= $this->db->get_where('resource_category',array('delstatus'=>1))->result(); 
                                               foreach($category as $c)
                                               {
                                            ?>
                                            <option value="<?=$c->id;?>"><?=$c->cat_name;?></option>
                                            <?php 
                                               }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control py-2"
                                            placeholder="Enter title" required />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Link</label>
                                        <input type="url" name="link" class="form-control py-2" placeholder="Enter Link"
                                            required />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control py-2" required></textarea>
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Add Resouce" />
                                    </div>
                                </form>


                                <?php
                                  } 
                                ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Link</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php 
                                    $resouce = $this->db->get_where('resouces',array('delstatus'=>1))->result();
                                    $i=1;
                                    foreach($resouce as $r)
                                    {
                                  ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?php 
                                           $cat = $this->db->get_where('resource_category',array('id'=>$r->catid))->row();
                                           echo $cat->cat_name;
                                        ?></td>
                                        <td><?=$r->type;?></td>
                                        <td><?=$r->link;?></td>
                                        <td><?=$r->title;?></td>
                                        <td><?=$r->description;?></td>
                                        <td>
                                            <a href="<?=base_url();?>Resources/deleteResource?delid=<?=$r->id;?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete');"><i
                                                    class="fa fa-trash"></i></a>
                                            <a href="<?=base_url();?>Resources?editid=<?=$r->id;?>"
                                                class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>