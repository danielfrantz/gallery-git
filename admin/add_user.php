<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


 $user = new User();

 if (isset($_POST['create'])) {


        if ($user) {

            $user->username = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];

            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
            $session->message("The user {$user->username} has been added"); 
            $user->save();
            redirect("users.php");

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
                            Usuários
                            <small>Adicione uma foto para o usuário</small>
                        </h1>             


                           <form action="" method="post" enctype="multipart/form-data">

                                <div class="col-md-4 col-md-offset-4">

                                    <div class="form-group">
                                        <!-- <label for="nome">Inserir Foto</label> -->
                                        <input type="file" name="user_image">
                                    </div>

                                    <div class="form-group">
                                        <label for="nome">Usuário</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>                                   

                                    <div class="form-group">
                                        <label for="capt">Primeiro Nome</label>
                                    <input type="text" class="form-control" name="first_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Último Nome</label>
                                        <input type="text" class="form-control" name="last_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Senha</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>

                                    
                                    <button type="submit" name="create" class="btn btn-primary pull-right">Salvar</button>

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