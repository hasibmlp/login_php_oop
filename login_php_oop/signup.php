<?php include_once 'includes/header.php'; ?>

    <div class="form-container">
      <h2>Sighup</h2>
      <form class="form-form-container" action="inc/signup.php" method="POST">
        <input type="text" class="email" name="email" placeholder="email" />
        <input type="text" class="uid" name="uid"  placeholder="uid" />
        <input type="password" class="pass" name="pass"  placeholder="pass" />
        <input type="password" class="pass-rep" name="pass-re" placeholder="pass-rep" />
        <button type="submit" name="submit" class="submit-bt">submit</button>
      </form>
    </div>
  </body>
</html>
