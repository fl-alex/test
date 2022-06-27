<?php

include_once './Category.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$ob_category = New Category();

  if(isset($_POST['submit'])) {
    $ob_category->insert_rec($_POST);
  }  
  include_once './header.php';
  
  ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Adding new category</h4>
                </div>
                <div class="card-body bg-light">
                  <form action="add_category.php" method="POST">
                    <div class="form-group">
                      <label for="titul">Name:</label>
                      <input type="text" class="form-control" name="name" 
                             placeholder="titul..." required="">
                    </div>
                    <div class="form-group">
                      <label for="opis">Full_name</label>
                      <input type="text" class="form-control" name="full_name" 
                             placeholder="opis..." required="">
                    </div>
                    <div class="form-group">
                      <label for="status">Descript:</label>
                      <input type="text" class="form-control" name="descript" 
                             placeholder="status..." required="">
                    </div>
                      
                    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once './footer.php'; ?>
</body>
</html>