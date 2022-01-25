<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Student | Rendezvous </title>
</head>
<body>

   <?php include'inc/nav.php';

   $error =  "";
$id = mysqli_real_escape_string($conn, $_GET['id']);
   if(isset($_POST['submit'])){
       $name= mysqli_real_escape_string($conn, $_POST['name']);
       $campus= mysqli_real_escape_string($conn, $_POST['campus']);
       $section= mysqli_real_escape_string($conn, $_POST['section']);
       $team= mysqli_real_escape_string($conn, $_POST['team']);
       $chest= mysqli_real_escape_string($conn, $_POST['chest']);
      $card= mysqli_real_escape_string($conn, $_POST['card']);

       $mysql = "UPDATE students SET name='$name', campus='$campus', section='$section', team='$team', chest='$chest', card_no='$card' WHERE id = $id";
       
       if(mysqli_query($conn, $mysql)){
           $error = '<div class="alert alert-success" role="alert">
           Student updated successfully!
         </div>';
       }else{
        $error = '<div class="alert alert-danger" role="alert">Failed to update student!
        
       </div>';
           echo mysqli_error($conn);
       }
   }
   
   
   
   ?>

<div class="centerCard card">
    <?php echo $error; 
    $viewSql = "SELECT * FROM students WHERE id = $id";
    $viewRes = mysqli_query($conn, $viewSql);

   $row = mysqli_fetch_assoc($viewRes);
    
    ?>
    
    <form action="" method="post">
        <h3>Fill the student details</h3> <br>
        <!-- Student Name -->
        <div class="input-group mb-3">
<input type="text"  class="form-control"  name="name" id="name" placeholder="Student Name" value="<?php echo $row['name']; ?>" autocomplete="off" required>
</div>
<!-- Campus Name -->
<select class="form-select" aria-label="Campus"  name="campus" id="campus" required>
  <option  value=""  <?php if($row['campus']==""){echo "selected";}?>>Campus</option>
  <option value="mnc"  <?php if($row['campus']=="mnc"){echo "selected";}?>>Madeenathunnoor</option>

  <option value="mir" <?php if($row['campus']=="mir"){echo "selected";}?>>Imam Rabbani Kanthapuram</option>
  <option value="dhic" <?php if($row['campus']=="dhic"){echo "selected";}?>>Darul Hidaya Engapuzha</option>
  <option value="isb" <?php if($row['campus']=="isb"){echo "selected";}?>>Imam Shafi Busthanabad</option>
  <option value="isv" <?php if($row['campus']=="isv"){echo "selected";}?>>Isra Vadanappally</option>
  <option value="mne" <?php if($row['campus']=="mne"){echo "selected";}?>>Markaz Najath Ekarool</option>
  <option value="mbc" <?php if($row['campus']=="mbc"){echo "selected";}?>>Markaz Al Bilal Cherippur</option>
  <option value="dhp" <?php if($row['campus']=="dhp"){echo "selected";}?>>Darul Hikam Panavally</option>
  <option value="amk" <?php if($row['campus']=="amk"){echo "selected";}?>>Al Munawwara Kollam</option>
  <option value="irsc" <?php if($row['campus']=="irsc"){echo "selected";}?>>Irsunnabavi Calicut</option>
  <option value="bin" <?php if($row['campus']=="bin"){echo "selected";}?>>Baithul Izza Narikkuni</option>
  <option value="msm" <?php if($row['campus']=="msm"){echo "selected";}?>>Muassasa Mananthavadi</option>
  <option value="dqm" <?php if($row['campus']=="dqm"){echo "selected";}?>>Darul Quran Muzhippoth</option>
  <option value="jmc" <?php if($row['campus']=="jmc"){echo "selected";}?>>Jamalullaily Chelari</option>
  <option value="msw" <?php if($row['campus']=="msw"){echo "selected";}?>>Markazu Swahaba</option>
  <option value="seo" <?php if($row['campus']=="seo"){echo "selected";}?>>Shuahada Edu Omanoor</option>
  <option value="azt" <?php if($row['campus']=="azt"){echo "selected";}?>>Al Zahra Tharuvana</option>
  <option value="dkk" <?php if($row['campus']=="dkk"){echo "selected";}?>>Dalailul Khairath Kakkidippuram</option>


</select> <br>
<!-- Group Name -->
<select class="form-select" aria-label="Section"  name="section" id="section" required>
  <option   value="" <?php if($row['section']==""){echo "selected";}?>>Section</option>
  <option value="pr" <?php if($row['section']=="pr"){echo "selected";}?>>Primary</option>
  <option value="sc" <?php if($row['section']=="sc"){echo "selected";}?>>Secondary</option>
  <option value="sj" <?php if($row['section']=="sj"){echo "selected";}?>>Sub Junior</option>
  <option value="jr" <?php if($row['section']=="jr"){echo "selected";}?>>Junior</option>
  <option value="sr" <?php if($row['section']=="sr"){echo "selected";}?>>Senior</option>
  <option value="gn" <?php if($row['section']=="gn"){echo "selected";}?>>General</option>
</select>
<br>
<!-- Section -->
<select class="form-select" aria-label="Group" name="team" id="team" required>
<option  value="" disabled <?php if($row['team']==""){echo "selected";}?>>Group</option> 
<?php 
$grpSQL = "SELECT * FROM team";
$grpRES = mysqli_query($conn, $grpSQL);
while($r = mysqli_fetch_assoc($grpRES)){
  echo' <option value="'.$r['code'].'"'; if($row['team']==$r['code']){echo "selected";}
  echo'>'.$r['name'].'</option> ';
}

?>
</select> <br>
<!-- Chest Number -->

<div class="input-group mb-3">
<input type="number"  class="form-control"  value="<?php echo $row['chest']; ?>" name="chest" id="chest" placeholder="Chest Number" required>
</div>
<div class="input-group mb-3">
<input type="text"  class="form-control"  value="<?php echo $row['card_no']; ?>" name="card" id="card" placeholder="Card Number" >
</div>
<div style="float: right; margin-right:10px;">
<input type="submit" value="Update Student" name="submit"   class="btn btn-primary" >
<button class="btn btn-danger"
type="button"
onclick="deleteStudent(<?php echo $_GET['id']; ?>)">Delete Student</button>
</div>


    </form>
</div>
<script>
  function deleteStudent(id){
    if(confirm('Do you want to delete this student?')){
      window.location.href="inc/deleteStudent.php?id="+id;
  }
}
</script>
</body>
</html>