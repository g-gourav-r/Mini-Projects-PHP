<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <?php
  $result="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(!empty($_POST["isbn"]) && !empty($_POST["status"])){
        $isbn = $_POST["isbn"];
        $status = $_POST["status"];
        $libraryJson = file_get_contents('library.json');
        $library = json_decode($libraryJson);
    
        $bookToDelete = null;
        foreach ($library as $key => $book) {
            if ($book->isbn === $isbn) {
                $bookToDelete = $key;
                break;
            }
        }
    
        if ($bookToDelete !== null) {
            switch ($status) {
                case "1": // Returned
                    $library[$bookToDelete]->availability = true;
                    $result = '<div class="alert alert-success" role="alert">Book set to Available.</div>';
                    break;
                case "2": // Borrowed
                    $library[$bookToDelete]->availability = false;
                    $result = '<div class="alert alert-info" role="alert">Book set to Not Available.</div>';
                    break;
                case "3": // Delete
                    unset($library[$bookToDelete]);
                    $library = array_values($library); // Re-index the array
                    $result = '<div class="alert alert-danger" role="alert">Successfully removed the book.</div>';
                    break;
                default:
                    echo "Invalid status selected.";
                    break;
            }
    
            $updatedLibraryJson = json_encode($library, JSON_PRETTY_PRINT);
            file_put_contents('library.json', $updatedLibraryJson);
        } else {
            $result = '<div class="alert alert-danger" role="alert"> Book with ISBN $isbn not found.</div>';
        }
    }else{
      $result = '<div class="alert alert-danger" role="alert">Please fill all the fields</div>';
    }
  }
  ?>
  

  <style>
    .container{
      margin-top:20px;
    }
    .result-box{
      margin-top:20px;
    }
  </style>
  <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                  </svg>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active" aria-current="page" >Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addbook.php">Add a Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="removebook.php">Change status</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="GET" action="searchbook.php">
                    <input class="form-control me-2" type="search" name="isbn" placeholder="ISBN of the book" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <form class="row gx-3 gy-2 align-items-center" method="post">
      <div class="col-sm-3">
        <div class="input-group">
          <div class="input-group-text">ISBN</div>
          <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="ISBN of the book" name="isbn">
        </div>
      </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="specificSizeSelect">Preference</label>
        <select class="form-select" id="specificSizeSelect" name="status">
          <option selected disabled>Status</option>
          <option value="1">Returned</option>
          <option value="2">Borrowed</option>
          <option value="3">Delete</option>
        </select>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </form>
    <div class="result-box">
       <?php echo $result ?>
    </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>