<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if (empty($_GET['id'])) {

   redirect("photos.php");
  
}

$comments = comment::find_the_comments($_GET['id']);


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

                        <!-- 
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->

                         

                        
                        
                        <div class="col-md-10">
                            
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Autor</th>
                                        <th>Body</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    
                                    <?php foreach ($comments as $comment) : ?>

                                        <tr>
                                            <td><?php echo $comment->id; ?></td>
                                            <td><?php echo $comment->author; ?>
                                                <div class="picture_link">
                                                
                                                    <a class="delete_link" href="delete_comment_photo.php?id=<?php echo $comment->id; ?>">Deletar</a>
                                                    <a href="edit_comment.php?id=<?php echo $comment->id; ?>">Editar</a>
                                                    

                                                </div>
                                            </td>

                                            <td><?php echo $comment->body; ?></td>
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