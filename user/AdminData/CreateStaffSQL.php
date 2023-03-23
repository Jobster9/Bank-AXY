    <?php 
function CreateStaff (){

    // Create a new PDO connection object
    include("../../DB config.php");

    date_default_timezone_set('Europe/London');

    $stmt = $pdo->prepare('INSERT INTO Bank_Employees (User_ID, User_Role, First_Name, Last_Name, Email, Password, Last_Active, Branch, Department) VALUES (:User_ID, :role, :fname, :lname, :email, :password, :active, :branch, :department)');

    $rand = rand(100, 999);


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];

    $active = date('d/m/Y H:i');

    $role = "Staff";
    $UserID = strtoupper(substr($fname, 0 ,1) . substr($lname, 0, 1). "001". $rand);


    $stmt->bindParam(':User_ID', $UserID, PDO::PARAM_STR);

    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':active',  $active, PDO::PARAM_STR);
    $stmt->bindParam(':branch',  $branch, PDO::PARAM_STR);
    $stmt->bindParam(':department',  $department, PDO::PARAM_STR);


    $stmt->execute();

    return "yes";

}




?>

