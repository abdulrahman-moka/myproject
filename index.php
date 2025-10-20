<?php 
include './inc/form.php';

$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1' ;
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include_once './parts/header.php';?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    
<div class="container">



    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">اربح مع عبدالرحمن</h1>
      <p class="lead fw-normal">باقي على فتح التسجيل</p>
      <p id="demo"></p>
      <p class="lead fw-normal">للسحب على ربح نسخة مجانية من برنامج</p>
    </div>
   
  </div>

<ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشر على صفحتي على فيسبوك بالتاريخ مذكور اعلاه</li>
  <li class="list-group-item">سأقوم ببث مباشر لمدة ساعة عبارة عن اسئلة واجوبة حرة للجميع</li>
  <li class="list-group-item">خلال فترة الساعه سيتم  فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك وايميلك</li>
  <li class="list-group-item">بنهاية البث سيتم اختيار اسم واحد من قواعد البيانات بشكل عشوائي</li>
  <li class="list-group-item">الرابح سيحصل على نسخة مجانية من برنامج كامتازيا</li>
</ul>

          
 





 <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">

<form class="mt-5" action="index.php" method="POST">
    <h3>الرجاء ادخال معلوماتك</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الاسم الاول</label>
    <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" value="<?php echo $firstName ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error "><?php echo $errors['firstNameError'] ?></div>
  </div>
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الاسم الاخير</label>
    <input type="text"  name="lastName" class="form-control" id="exampleInputEmail1" value="<?php echo $lastName ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['lastNameError'] ?></div>
  </div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['emailError'] ?></div>
  </div>

  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>     
</form>
 </div>   
  </div>

</div>

<div class="d-grid gap-2 col-6 mx-auto my-5">

<div class="loader-con">
<div id ="loader">
<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  اختيار الرابح
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         
        <h5 class="modal-title" id="exampleModalLabel">الرابح في المسابقة</h5>
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php foreach ($users as $user) : ?>   
<h1><?php echo htmlspecialchars($user['firstName']) . htmlspecialchars($user['lastName']) ; ?></h1>
        <?php endforeach; ?>
         
         
         

      </div>
      
    </div>
  </div>
</div>




<div id="cards" class= "row mb-5 pb-5" >
    <?php foreach ($users as $user) : ?>
<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($user['firstName']) . '<br>' . htmlspecialchars($user['lastName']) . '<br>' . htmlspecialchars($user['email']);    ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($user['firstName']) . '<br>' . htmlspecialchars($user['lastName']) . '<br>' . htmlspecialchars($user['email']);    ?></p>
        </div>
</div>
</div>
<?php endforeach; ?>

<!--  z
<form action="index.php" method="POST"> 
    <input type="text" name="firstName" id="firstName" placeholder="First Name">
    <input type="text" name="lastName" id="lastName" placeholder="Last Name">
    <input type="text" name="email" id="email" placeholder="Email">
    <input type= "submit" name="submit" value="send">
</form>
-->


<?php include_once './parts/footer.php';   ?>

<script src="./js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="./js/script.js" ></script>
</body>
</html>