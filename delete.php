<?php 
    // Include database connection
    include 'connection.php'; 

    // Get ID from URL
    $userId = $_GET['id'];

    // Select id in table
    $query = "SELECT * from users where id='".$userId."'";

    // Execute query
    $user = mysqli_query($connection, $query) or die (mysqli_error($connection));

    // User data array
    $row = mysqli_fetch_assoc($user);

    if(isset($_POST['deleteuser'])){
        
        $query = "DELETE FROM users WHERE id='$userId'" ;
        
        //Validate query executed
        if(!mysqli_query($connection, $query)){
            die('Error: ' . mysqli_error($connection));
            echo "Couldn't edit user. Try again!";
        }else{
            $message = "User deleted";
            header('Location: index.php?message='.urlencode($message));
            exit();
            }
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Php & MySql</title>
  </head>
  <body>
    <h1 class="text-center mt-4 mb-4">CRUD PHP MYSQL</h1>

    <div class="container">
        <div class="row">
            <div class="col-a">
                <h2>Delete User</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 offset-3">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $row['name']; ?>" readonly aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter your lastname" value="<?php echo $row['last_name']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $row['email']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter your phone" value="<?php echo $row['phone']; ?>" readonly>
                    </div>
            
                    <button type="submit" class="btn btn-danger w-100" name="deleteuser">Delete</button>
                </form>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>