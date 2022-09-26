<!DOCTYPE html>
<html lang="en">
  <head>
    <title>1.3 Create / Modify / Delete</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="">Create an account.</div>
    <form action="" method="POST">
      <input name="email1" type="text" placeholder="Enter email..." required>
      <input name="password1" type="password" placeholder="Enter password..." required>
      <input name="password2" type="password" placeholder="Re-enter password..." required>
      <button type="submit" name="submit1">Submit</button>
    </form>
    <br><br> 
    <div class="result1"></div>
    <div class="">Modify an account.</div>
    <form action="" method="POST">
      <input name="email2" type="text" placeholder="Enter email..." required>
      <input name="password3" type="password" placeholder="Enter password..." required>
      <input name="email3" type="text" placeholder="New email..." required>
      <button type="submit" name="submit2">Submit</button>
    </form>
    <br><br> 
    <div class="result2"></div>
    <div class="">Delete an account.</div>
    <form action="" method="POST">
      <input name="email4" type="text" placeholder="Enter email..." required>
      <input name="password4" type="password" placeholder="Enter password..." required>
      <input name="password5" type="password" placeholder="Re-enter password..." required>
      <button type="submit" name="submit3">Submit</button>
    </form>
    <br><br> 
    <div class="result3"></div>
    <script>
      const result1 = document.querySelector('.result1');
      const result2 = document.querySelector('.result2');
      const result3 = document.querySelector('.result3');

      fetch('users.json').then(response => {
        return response.json();
      }).then(UserData => {
        var Data = UserData.data;

        <?php if(isset($_POST['submit1'])) { 
            $pass1 = $_POST['password1']; $pass2 = $_POST['password2'];
            if ($pass1 == $pass2){ ?>
                result1.innerHTML = Data.status;
            <?php } else {?>
                result1.innerHTML = `Can't create an account.`;  
        <?php } } else { ?>
            result1.innerHTML = `Invalid.`;  
        <?php } ?>

        <?php if(isset($_POST['submit2'])) { 
            $email1 = $_POST['email2']; $email2 = $_POST['email3'];
            if ($email1 != $email2){ ?>
                result2.innerHTML = Data.status;
            <?php } else {?>
                result2.innerHTML = `Email can't be old email.`;  
        <?php } } else { ?>
            result2.innerHTML = `Invalid.`;  
        <?php } ?>

        <?php if(isset($_POST['submit3'])) { 
            $pass3 = $_POST['password4']; $pass4 = $_POST['password5'];
            if ($pass3 == $pass4){ ?>
                result3.innerHTML = Data.status;
            <?php } else {?>
                result3.innerHTML = `Can't delete an account.`;  
        <?php } } else { ?>
            result3.innerHTML = `Invalid.`;  
        <?php } ?>
        console.log(Data);
      }).catch(error => {
        console.log(error);
      });
    </script>
  </body>
</html>