<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Users & Role
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['uid']))
                                  {
                                     $u= $this->db->get_where('user_registration',array('id'=>$_GET['uid']))->row();
                                ?>

                                <form action="<?=base_url();?>Users/UpdateUser" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="uid" value="<?=$u->id?>" />
                                        <label for="" class="py-2">User Role</label>
                                        <select class="form-control" name="user_role" required>
                                            <option value="">Select Role</option>
                                            <?php
                                              $role=$this->db->get('role_permission')->result(); 
                                              foreach($role as $r)
                                              {
                                             ?>
                                            <option value="<?=$r->id;?>"
                                                <?php if($u->rolid==$r->id){ echo "selected";}?>><?=$r->role_name;?>
                                            </option>
                                            <?php
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Full Name</label>
                                        <input type="text" class="form-control" value="<?=$u->name;?>" name="fullname"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">User Name(Email ID)</label>
                                        <input type="email" class="form-control" value="<?=$u->email;?>" name="username"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Password</label>
                                        <input type="password" class="form-control" value="<?=$u->password;?>"
                                            name="password" required />
                                    </div>
                                    <div class="form-group py-2">
                                        <input type="submit" class="btn btn-primary" value="Update Now" />
                                    </div>
                                </form>
                                <?php

                                  } 
                                  else 
                                  {
                                 ?>
                                <form action="<?=base_url();?>Users/CreateUser" method="post">
                                    <div class="form-group">
                                        <label for="" class="py-2">User Role</label>
                                        <select class="form-control" name="user_role" required>
                                            <option value="">Select Role</option>
                                            <?php
                                              $role=$this->db->get('role_permission')->result(); 
                                              foreach($role as $r)
                                              {
                                             ?>
                                            <option value="<?=$r->id;?>"><?=$r->role_name;?></option>
                                            <?php
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">User Name(Email ID)</label>
                                        <input type="email" class="form-control" name="username" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Password</label>
                                        <input type="password" class="form-control" name="password" required />
                                    </div>
                                    <div class="form-group py-2">
                                        <input type="submit" class="btn btn-primary" value="Create Now" />
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Username</th>
                                            <th>User Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $users = $this->db->get_where('user_registration')->result(); 
                                         $i=1;
                                         foreach($users as $u)
                                         {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$u->name;?></td>
                                            <td><?=$u->role;?></td>
                                            <td><?=$u->email;?></td>
                                            <td>
                                                <?php
                                                  if($u->delstatus==1)
                                                  {
                                                    echo "Active";
                                                  } 
                                                  else 
                                                  {
                                                    echo "Deactivate";
                                                  }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                  if($_SESSION['usertype']=='Admin')
                                                  { 
                                                ?>
                                                <a href="<?=base_url();?>Users?uid=<?=$u->id;?>"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="<?=base_url();?>Users/Deactivate?uid=<?=$u->id;?>"
                                                    class="btn btn-danger" title="deactivate"><i
                                                        class="fa fa-times"></i></a>
                                                <a href="<?=base_url();?>Users/Activate?uid=<?=$u->id;?>"
                                                    class="btn btn-success" title="deactivate"><i
                                                        class="fa fa-check"></i></a>
                                                <?php }else { echo 'Not Allowed to Change'; } ?>
                                            </td>
                                        </tr>
                                        <?php
                                          $i++;
                                         }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>