<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Optional CSS for styling */
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 400px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <h2 class="text-center mb-4">Register</h2>
    <form action="<?= base_url('Auth/save'); ?>" method="post">
      <?= csrf_field();?>

      <?php if(!empty(session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?>></div>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('success'))):?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif ?>

      <div class="form-group">
        <label for="username">Full Name</label>
        <input type="text" class="form-control" placeholder="Enter your full name" name="name" value="<?= set_value('name'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name'): ''?></span>
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= set_value('email'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email'): ''?></span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password'): ''?></span>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" value="<?= set_value('confirmPassword'); ?>">
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmPassword'): ''?></span>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button><br>
      <a href="<?= site_url('Auth') ?>">I already have account, login now !</a>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies (Optional, for Bootstrap features like modals, etc.) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
