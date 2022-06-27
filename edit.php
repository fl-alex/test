<?php

   if (!isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $ob_article->displyaRecordById($editId);
  }
    include_once './header.php';
    include_once './Articles.php';
    include_once './Category.php';

    $ob_article = new Articles();
    $ob_category = new Category();
    $arr = $ob_category->get_data_for_select();
 
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $ob_article->displyaRecordById($editId);
  }

  elseif(isset($_POST['update'])) {
    $ob_article->updateRecord($_POST);
  }
  
  else {
      echo 'Error';
      exit();
  }

 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editing article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Editing Article: <?php echo $article['titul'];?></h4>
                </div>
                <div class="card-body bg-light">
                  <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label for="name">Titul:</label>
                      <input type="text" class="form-control" name="titul" 
                             value="<?php echo $article['titul']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="email">Opis</label>
                      <input type="text" class="form-control" name="opis" 
                             value="<?php echo $article['opis']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="salary">Status:</label>
                      <input type="text" class="form-control" name="status" 
                             value="<?php echo $article['status']; ?>" required="">
                    </div>
                      <div class="form-group">
                      <label for="category">Category:</label>
                      <select class="form-control" name="category"  required="">
                          <?php 
                          foreach ($arr as $key => $value) {
                            if ($value['id']==$article['category']){
                                echo "<option value=".$value['id']." selected>".$value['name']."</option>";
                            }  
                            else {
                                echo "<option value=".$value['id'].">".$value['name']."</option>";
                            }                         
                          }   
                          ?>
                      </select>        
                      </div>
                      <div class="form-group">
                      <label for="salary">Body:</label>
                      <input type="text" class="form-control" name="body" 
                             value="<?php echo $article['body']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                      <input type="submit" name="update" class="btn btn-primary" 
                             style="float:right;" value="Update">
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once './footer.php'; ?>
</body>
</html>