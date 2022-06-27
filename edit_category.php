<?php

   if (!isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $category = $ob_category->displyaRecordById($editId);
  }
    include_once './header.php';   
    include_once './Category.php';

  $ob_category = new Category();
  
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $category = $ob_category->displyaRecordById($editId);
  }

  
  elseif(isset($_POST['update'])) {
    $ob_category->updateRecord($_POST);
  }
  
  else {
      echo 'Error';
      exit();
  }

  include_once './header.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editing category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Editing category: <?php echo $category['name'];?></h4>
                </div>
                <div class="card-body bg-light">
                  <form action="edit_category.php" method="POST">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $category['name']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="Full_name">Full name</label>
                      <input type="text" class="form-control" name="full_name" value="<?php echo $category['full_name']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="descript">Description:</label>
                      <input type="text" class="form-control" name="descript" value="<?php echo $category['descript']; ?>" required="">
                    </div>
                      
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once './footer.php';?>
</body>
</html>