<?php

  include_once 'Articles.php';
  $ob_article = new Articles();

  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $ob_article->deleteRecord($deleteId);
  }
  include_once './header.php';
  
?>

<div class="container">
  
  <?php
    if (isset($_GET['msg'])){
        $msg = stripcslashes($_GET['msg']);
        
        switch ($msg) {
            case 'insert':
                echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Added ok!
            </div>";
                break;
            case 'update':
                echo "<div class='alert alert-warning alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Updated ok!
            </div>";
                break;
            case 'delete':
                echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Deleted ok!
            </div>";
                break;

            default:
                break;
        }
        
    }  
   
  ?>
  <h2>Lista Artikulow
    <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titul</th>
        <th>Opis</th>
        <th>Status</th>
        <th>Category</th>
        <th>Body</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
        <?php 
          $articles = $ob_article->display_rec();
          if (is_array($articles)){
              
          
          foreach ($articles as $article) {
        ?>
        <tr>
          <td><?php echo $article['id'] ?></td>
          <td><?php echo $article['titul'] ?></td>
          <td><?php echo $article['opis'] ?></td>
          <td><?php echo $article['status'] ?></td>
          <td><?php echo $article['category'] ?></td>
          <td><?php echo $article['body'] ?></td>
          <td>
            <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $article['id'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $article['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            </a></button>
          </td>
        </tr>
      <?php }
          }
 else {             
              
 }
          ?>
    </tbody>
  </table>
</div>
<?php include_once './footer.php';?>

</body>
</html>
