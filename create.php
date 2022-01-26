<?php 
    // Include database connection
    include 'connection.php'; 

    if(isset($_POST['createuser'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);

        //Set zone time
        date_default_timezone_set('America/Mexico_City');
        $time = date('h:i:s a', time());

        //Validate no empty fields
        if(!isset($name) || $name == '' || !isset($lastname) || $lastname == '' || !isset($email) || $email == '' || 
        !isset($phone) || $phone == '' ){
            $error = "Please fill empty fields";
        }else{
            $query = "INSERT INTO users (name, last_name, email, phone) VALUES 
            ('$name','$lastname','$email','$phone')";

            //Validate query executed
            if(!mysqli_query($connection, $query)){
                die('Error: ' . mysqli_error($connection));
                $error = "Couldn't create user. Try again!";
            }else{
                $message = "User created successfully.";
                header('Location: index.php?message='.urlencode($message));
                exit();
            }
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
                <h2>Create User</h2>
            </div>
        </div>

        <div class="row">
            <!--alerts-->
            <?php if(isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="col-sm-6 offset-3">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php if(isset($error)){ echo $name; } ?>" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter your lastname" value="<?php if(isset($error)){ echo $lastname; }?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php if(isset($error)){ echo $email; }?>">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter your phone" value="<?php if(isset($error)){ echo $phone; } ?>">
                    </div>
            
                    <button type="submit" class="btn btn-success w-100" name="createuser">Create</button>
                </form>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>