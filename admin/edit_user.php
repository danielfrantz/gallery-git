<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if (empty($_GET['id'])) {
  
   redirect("users.php");

} else { 
  
  
   $user = User::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {

        if ($user) {

            $user->username = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];

            if (empty($_FILES['user_image'])) {

              $user->save();
              redirect("users.php");
              $session->message("The user has been updated"); 

            } else {

              $user->set_file($_FILES['user_image']);
              $user->upload_photo();
              $user->save();

              redirect("users.php");
              $session->message("The user has been updated"); 
              // redirect("edit_user.php?id={$user->id}");


            }
            

        } 

    } 
}



// $users = user::find_all();



 ?>
 



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
           <?php include("includes/top_nav.php");  ?> 


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


            <?php include("includes/side_nav.php");  ?> 
            

            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Subheading</small>
                        </h1>    

                        <div class="col-md-6 user_image_box" >

                             <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" 
                                    src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></a>
                          
                          
                        </div>        


                           <form action="" method="post" enctype="multipart/form-data">

                                <div class="col-md-6 ">

                                    <div class="form-group">
                                        <!-- <label for="nome">Inserir Foto</label> -->
                                        <input type="file" name="user_image">
                                    </div>

                                    <div class="form-group">
                                        <label for="nome">Usuário</label>
                                        <input type="text" class="form-control" name="username" 
                                        value="<?php echo $user->username ?>">
                                    </div>                                   

                                    <div class="form-group">
                                        <label for="capt">Primeiro Nome</label>
                                    <input type="text" class="form-control" name="first_name"
                                    value="<?php echo $user->first_name ?>" >
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Último Nome</label>
                                        <input type="text" class="form-control" name="last_name"
                                        value="<?php echo $user->last_name ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Senha</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>

                                    <div class="form-group">

                                        <a class="delete_link btn btn-danger" id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>">Deletar</a>

                                        <button type="submit" name="update" class="btn btn-primary pull-right">Update</button>
                                    </div>


                                    
                                    

                                </div> <!-- fim do cadastro -->

                                                      


                        </form> 
                       







                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>