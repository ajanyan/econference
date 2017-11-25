<html>
  <head>
    <meta charset="utf-8">
    <title>Submit Paper</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../php/viewpapers.php">Submitted Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/completedpapers.php">Completed Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/viewsubadmin.php">Manage Reviewer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/acceptedpapers.php">Accepted Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/rejectedpapers.php">Rejected Papers</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="../php/trashedpapers.php">Trash</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../php/up.php">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/changepassword.php">Change Password</a>
      </li>

    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>

  </nav>

    <div class="container">
      <form enctype="multipart/form-data" action="../upload.php" method="post" id="paper-submission-form">
        <div class="input-grp">
          <span class="icon">
            <i class="material-icons">perm_identity</i>
          </span>
          <input type="name" name="name" placeholder="Name" class="input-txt" required>
        </div>

        <div class="input-grp">
          <span class="icon">
            <i class="material-icons">mail_outline</i>
          </span>
          <input type="email" name="email" placeholder="Email" class="input-txt" required>
        </div>

        <div class="input-grp">
          <span class="icon">
            <i class="material-icons">label_outline</i>
          </span>
          <input type="text" name="title" placeholder="Title of Paper" class="input-txt" required>
        </div>

        <div class="input-grp">
          <span class="icon">
            <i class="material-icons">content_paste</i>
          </span>
          <div class="input-file">
            <input type="file" accept="application/pdf" name="paper_pdf" class="file hidden" required>
            <input type="text" class="input-txt" placeholder="Select a PDF file" readonly>
            <button type="button" class="btn-primary btn-upload small">
              <i class="material-icons md-18">file_upload</i>
              <span class="text">Select Paper</span>
            </button>
          </div>
        </div>

        <div class="input-grp">
          <span class="icon">
            <i class="material-icons">content_paste</i>
          </span>
          <div class="input-file">
            <input type="file" name="paper_source" class="file hidden">
            <input type="text" class="input-txt" placeholder="Select a Word/LaTex file" readonly>
            <button type="button" class="btn-primary btn-upload small">
              <i class="material-icons md-18">file_upload</i>
              <span class="text">Select Paper</span>
            </button>
          </div>
        </div>

        <div class="input-grp justify-center">
          <button class="btn-primary">
            <i class="material-icons md-18">check</i>
            <span class="text">Submit</span>
          </button>
        </div>

      </form>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../script.js"></script>
  </body>
</html>
