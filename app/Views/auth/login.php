<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Optional CSS for styling */
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 400px;
      margin-top: 100px;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <h2 class="text-center mb-4">Sign In</h2>
    <form action="<?= base_url('Auth/login'); ?>" method="post">
    <?= csrf_field();?>

    <?php if(!empty(session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
      <?php endif ?>

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder=" Email" value="<?= set_value('name'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email'): ''?></span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password'): ''?></span>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign In</button><br>
      <a href="<?= site_url('Auth/register') ?>">I don't have account, Register Now !</a>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies (Optional, for Bootstrap features like modals, etc.) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
