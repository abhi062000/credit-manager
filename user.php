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
        <a class="navbar-brand" href="/">Credit Manager</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allusers.php">Users</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php
        session_start();
        include('connection.php');

        if (isset($_GET['name']) && isset($_GET['id'])) {
            $_SESSION['senderid'] = $_GET['id'];
            $_SESSION['sendername'] = $_GET['name'];

            $name = $_GET['name'];
            $id = $_GET['id'];

            $sql = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($link, $sql);
            if (!$result) {
                echo "Error in Query user.php" . mysqli_error($link);
                exit;
            } else {
                if (mysqli_num_rows($result) != 1) {
                    echo "error";
                    exit;
                }
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $email = $row['email'];
                    $credit = $row['credit'];
                    $_SESSION['sendercredit'] = $row['credit'];
                    echo "
                    <div>
                        <div><strong>ID </strong>: $id</div>
                        <div><strong>Name </strong>: $name</div>
                        <div><strong>Email </strong>: $email</div>
                        <div><strong>Credit </strong>: $credit</div>
                    </div>
                    ";
                }
            }
        }
        ?>
        <hr>
        <div class="content">
            <div class="contentmessage"></div>

            <form method="POST">
                <label>Enter Amount of credits to be Transferred:</label>
                <input type="number" name="amount" min="1" required>
                <br><br>
                <label for="receiver">Choose whom you want to transfer credits</label>
                <select id="receiver" name="receiver">

                    <?php
                    include('connection.php');
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($link, $sql);
                    if (!$result) {
                        echo "Error in Query ";
                        exit;
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                // $_SESSION['id'] = $row['id'];

                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $credit = $row['credit'];
                                echo "<option value='$name'>$name</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <br><br>
                <input type="submit" value="Send" name="send" class="btn btn-primary send">
            </form>
        </div>
    </div>


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- external scipt -->
    <script src="transfer.js"></script>
</body>

</html>