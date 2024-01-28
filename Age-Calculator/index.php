<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Age Calculator</title>
    <style>
  
  @import url('https://fonts.googleapis.com/css2?family=Onest:wght@200&display=swap');
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
    body{
      background-color:#EEEEEA;
      font-family: 'Onest', sans-serif;
    }
    .main {
      display: flex;
      justify-content: center;
      margin-left:30%;
      margin-right:30%;
      margin-top: 40px;
      padding: 20px;
      width: 40%;
      height: 40%
    
    }
    .container {
      background-color: #DADBD1;
      box-shadow: 4px 4px #C3C3BE;
      border-radius:10px;
      padding: 20px;
      text-align: center;
    }

    .sub-main {
      margin-bottom: 20px;
    }
    btn btn-primary{
      color:#FFFFFF;
    }
    input::placeholder {
      color: #999; 
      font-style: italic;
      font-size: 14px; 
    }
    h2{
      font-weight: bold;
      color:#957777;
      padding-bottom: 5px;
    }
    .btn-custom {
      background-color:rgb(198,198,190,0.5);
      color: #fff;
      border: none;
      box-shadow:2px 2px 4px rgb(195,195,190);
    }

    .btn-custom:hover {
      background-color:rgb(198,198,190,0.9);
      color:#fff;
    }
  </style>
  <body>
    <?php
    $result = "Enter you Date of Birth 👀";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!empty($_POST["dob"])){
        $userdob = $_POST["dob"];
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $userdob)){
          list($year, $month, $day) = explode('-', $userdob);
          if (checkdate((int)$month, (int)$day, (int)$year)){
            $userdob = $_POST["dob"];
            $birthDate = new DateTime($userdob); 
            $currentDateObject = new DateTime(); 
            if(strtotime($userdob)>strtotime("now")){
                $result = "Date of Brith cannot be greater than current year 😒";
            }
            else{
                $interval = $birthDate->diff($currentDateObject); 
                $years = $interval->y; 
                $months = $interval->m;
                $days = $interval->d;
                $result = $years." years ". $months." months ". $days." days 📅";
            }
          }
          else{
            $result = "You've entered an invalid date 🥴";
          }
        }
        else{
        $result = "You've entered the date in wrong format 🤓";   
        }       
      }
      else{
        $result =  "Please enter the date 🤚";
      }   
    }
    ?>
    <div class="main">
        <div class="container">
          <div class="sub-main">
            <h2>Age Calculator</h2>
            <form action="" method="post">
              <div class="mb-3">
                <input type="text" name="dob" class="form-control" id="dob" placeholder="yyyy-mm-dd">
              </div>
           
              <center><button type="submit" class="btn btn-custom">Calculate Age</button></center>
            </form>
          </div>
          <hr> 
          <div class="result-box">
            <?php echo $result ?>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
