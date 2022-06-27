<?php

  include 'Category.php';
  $ob_category = new Category();
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $ob_category->deleteRecord($deleteId);
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
  <h2>Category
    <a href="add_category.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Full_name</th>
        <th>Descript</th>     
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
        <?php 
          $categories = $ob_category->display_rec();
          if (is_array($categories)){
              
          
          foreach ($categories as $category) {
        ?>
        <tr>
          <td><?php echo $category['id'] ?></td>
          <td><?php echo $category['name'] ?></td>
          <td><?php echo $category['full_name'] ?></td>
          <td><?php echo $category['descript'] ?></td>        
          <td>
            <button class="btn btn-primary mr-2"><a href="edit_category.php?editId=<?php echo $category['id'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="v_category.php?deleteId=<?php echo $category['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
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
