<?php
session_start();
$_SESSION['location'] = '';

global $db_location;
global $cnxn;

$db_location = '';
//include 'php/nav_bar.php';
include 'db_picker.php';
include $db_location;


// get user email, id and password from db
$email = "";
$pass = "";



if ($_SERVER["REQUEST_METHOD"] == "POST" && ! empty($_POST)) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sqlUserPass = "SELECT `user_id`, `email`, password FROM users WHERE `email`='$email' AND `password`='$pass' AND `users`.is_deleted = 0 ";

    $result = mysqli_query($cnxn, $sqlUserPass);

    if(mysqli_num_rows($result)===1) {
        $row = mysqli_fetch_assoc($result);

        if($row['email']===$email && $row['password']===$pass){
//            echo "Logged in!";
            $_SESSION['user_id'] = $row['user_id'];
            header("Location:https://dragonfly.greenriverdev.com/sprint5/index.php");
            exit();
        }else{

        }



    } else {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Login Page</title>
                <!-- Load theme from localstorage -->
                <script src='js/themescript.js'></script>
                <!-- Latest compiled and minified CSS -->
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                <!-- Font awesome -->
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
                <link rel='stylesheet' href='styles/styles.css'/>
                <!-- Latest compiled JavaScript -->
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
            </head>
            <body>
            <main>
                <div class='container p-3' id='main-container'>
                    <h3 class='form-header'>Login</h3>
                    <div class='form-container'>
                        <div class='form-body'>
                    <form id='login-form' class='p-5' method='POST' action='#'>
                        <p style='color: red'>Incorrect email or password, please try again.</p>
                        <div class='mb-4'>
                            <label for='input-email' class='form-label'>Email*</label>
                            <input type='email' class='form-control' id='input-email' name='email' placeholder='e.g. example@email.com' required>
                        </div>
                        
                        <div class='mb-4'>
                            <label for='input-password' class='form-label'>Password*</label>
                            <input type='password' class='form-control' id='input-password' name='password' minlength='8' maxlength='16' required>
                        </div>
                        
                        <button type='submit' class='submit-btn'>Submit</button>
                    </form>
                </div>
            </main>
        ";
    }
} else {
    echo "
        <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Login Page</title>
                <!-- Load theme from localstorage -->
                <script src='js/themescript.js'></script>
                <!-- Latest compiled and minified CSS -->
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                <!-- Font awesome -->
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
                <link rel='stylesheet' href='styles/styles.css'/>
                <!-- Latest compiled JavaScript -->
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
            </head>
        <body>
        <main>
            <div class='container p-3' id='main-container'>
                <h3 class='form-header'>Login</h3>
                <div class='form-container'>
                    <div class='form-body'>
                <form id='login-form' class='p-5' method='POST' action='#'>
                  
                    <div class='mb-4'>
                        <label for='input-email' class='form-label'>Email*</label>
                        <input type='email' class='form-control' id='input-email' name='email' placeholder='e.g. example@email.com' required>
                    </div>
                    
                    <div class='mb-4'>
                        <label for='input-password' class='form-label'>Password*</label>
                        <input type='password' class='form-control' id='input-password' name='password' minlength='8' maxlength='16' required>
                    </div>
                    
                    <button type='submit' class='submit-btn'>Submit</button>
                </form>
            </div>
        </main>
        ";
}

echo"
            </body>
        </html>
    ";
?>

<?php include 'php/footer.php'?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="js/contactscript.js"></script>
<script src="js/main.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>