 <h1>Products</h1>
        <hr>
        <p>Create New Product.</p>
		<br>
		<form action="/createproduct.php" method="post"  enctype="multipart/form-data">
<span class="lableval">  Name: </span><input type="text" name="name" required><br>
<span class="lableval">  Description: </span><input type="text" name="description" required><br>
<span class="lableval">    Health: </span><input type="text" name="health" required><br>
<span class="lableval">  Status: </span><input type="text" name="status" required><br>
<span class="lableval">    Content: </span><input type="text" name="content" required><br>
<span class="lableval">  Nutrition: </span><input type="text" name="nutrition" required><br>
<span class="lableval">    Ingredients: </span><input type="text" name="ingredients" required><br>
<span class="lableval">  Allergens: </span>
<select name="allergens[]" multiple style="width: 169px;">
<?php
try{
include_once("db.php"); 

$sql = "SELECT * FROM allergies";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["name"]. '"> ' . $row["name"]. ' </option> ';
    }
	
} else {
    echo "";
}
}catch(Exception $e) {
  //echo 'Message: ' .$e->getMessage();
}
?>
</select><br>
<span class="lableval">  Product image: </span>
<input type="file" name="fileToUpload" id="fileToUpload">
    <br/> <br/>
  <input class="btn btn-success" type="submit">
  <br/><br/>
</form>