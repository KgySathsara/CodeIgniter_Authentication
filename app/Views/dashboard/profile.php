<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>
        <h4><?= $title;?></h4>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <th scope="row">1</th>
                <td><?= ucfirst( $userInfo['username']); ?></td>
                <td><?= $userInfo['email']; ?></td>
                <td><a href="<?= site_url('Auth/logout'); ?>">LogOut</a></td>
                </tr>
            </tbody>
            
        </table>

    </body>
</html>