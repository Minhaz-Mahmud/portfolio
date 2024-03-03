<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <title>Document</title>
</head>
<body>
    <div class="center">
        <h1>INSERT IN WORK SECTION</h1>
        <form action="add_db.php" method="post" enctype="multipart/form-data">
                <div class="work">

                   <div class="form-group">
                      <label for="h_work">Work Name</label>
                      <input type="text" name="work_name" class="textfield">
                    </div>

                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="uploadfile" class="textfield">
                    </div>


                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="des" class="textfield">
                    </div>
                    </div>
                    <input type="submit" class="btn" name="add_work" value="ADD">
          </form>

       </div>   
</body>
</html>