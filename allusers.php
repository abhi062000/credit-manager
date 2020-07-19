<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- external css -->
    <link rel="stylesheet" href="style.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Credit manager</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Credit Manager</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Users</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center my-2">List of Users</h2>
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Credits</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                include('connection.php');
                $sql = "SELECT * FROM users";
                $result = mysqli_query($link, $sql);
                if (!$result) {
                    echo "Error in Query ";
                    exit;
                } else {
                    // $id = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            // $_SESSION['id'] = $row['id'];

                            $id = $row['id'];
                            $name = $row['name'];
                            // $_SESSION[$name] = $row['name'];
                            // echo $_SESSION[$name];
                            $email = $row['email'];
                            $credit = $row['credit'];
                            echo "
                                <tr>                                    
                                    <td class='id_num'>$id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$credit</td>
                                    <td><a href='user.php?name=$name&id=$id' class='btn btn-info view'>View</a></td>
                                    
                                </tr>
                            ";
                        }
                    }
                }



                ?>
            </tbody>

        </table>
    </div>


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- external scipt -->
    <script src="script.js"></script>
</body>

</html>