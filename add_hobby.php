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
<h1>ADD FOR HOBBY SECTION</h1>
<form action="insert_know.php" method="post" enctype="multipart/form-data">
                <div class="know_me">

                   <div class="form-group">
                      <label for="h_hooby">Hobby Name</label>
                      <input type="text" name="h_head" class="textfield">
                    </div>

                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="uploadfile" class="textfield">
                    </div>


                    <div class="form-group">
                      <label for="link">Link</label>
                      <input type="text" name="link" class="textfield">
                    </div>
                    </div>
                    <input type="submit" class="btn" name="add_hobby" value="ADD">
             </form>

             </div>
</body>
</html>