<?php

include_once './Articles.php';
include_once './Category.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$ob_article = New Articles();
$ob_category = New Category();
$arr = $ob_category->get_data_for_select();
 
  if(isset($_POST['submit'])) {
    $ob_article->insert_rec($_POST);// filtering POST make in class
  }
  include_once './header.php';
  ?>


<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Adding new article</h4>
                </div>
                <div class="card-body bg-light">
                  <form action="add.php" method="POST">
                    <div class="form-group">
                      <label for="titul">Titul:</label>
                      <input type="text" class="form-control" name="titul" 
                             placeholder="titul..." required="">
                    </div>
                    <div class="form-group">
                      <label for="opis">Opis</label>
                      <input type="text" class="form-control" name="opis" 
                             placeholder="opis..." required="">
                    </div>
                    <div class="form-group">
                      <label for="status">Status:</label>
                      <input type="text" class="form-control" name="status" 
                             placeholder="status..." required="">
                    </div>
                        <div class="form-group">
                      <label for="category">Category:</label>
                      <select class="form-control" name="category"  required="">
                          <option value="0">Select category...</option>
                          <?php 
                          foreach ($arr as $key => $value) {                       
                                echo "<option value=".$value['id'].">".$value['name']."</option>";
                            }   
                          ?>
                      </select>        
                      </div>
                    <div class="form-group">
                      <label for="body">Body:</label>
                      <input type="text" class="form-control" name="body" 
                             placeholder="body..." required="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" 
                           style="float:right;" value="Submit">
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once './footer.php'; ?>
</body>
</html>