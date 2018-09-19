<?php include("includes/header.php"); ?>

<?php 

$users = User::find_all();


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
                        <p class="bg-success">
                            <?php echo $message; ?>
                        </p>
                        <h1 class="page-header">
                            Usuários
                            <small></small>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->

                         <div class="row">

                            <div class="col-md-2">
                                
                                <a href="add_user.php" class="btn btn-primary">Novo Usuário</a>
                            </div>

                        </div>

                        

                        <div class="col-md-10">
                            
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Foto</th>
                                        <th>Usuário</th>
                                        <th>Primeiro Nome</th>
                                        <th>Último Nome</th>                                        
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    
                                    <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>

                                            <td><?php echo $user->username; ?>
                                                <div class="picture_link">
                                                
                                                    <a class="delete_link" href="delete_user.php?id=<?php echo $user->id; ?>">Deletar</a>
                                                    <a href="edit_user.php?id=<?php echo $user->id; ?>">Editar</a>
                                                    

                                                </div>
                                            </td>

                                            <td><?php echo $user->first_name; ?></td>
                                            <td><?php echo $user->last_name; ?></td>                    
                                            <td><?php echo $user->email; ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                
                            </table>

                        </div> <!-- fim da tabela usuarios -->


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>