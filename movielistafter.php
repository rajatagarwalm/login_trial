<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Movie List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        nav{
            padding-left: 100px!important;
            padding-right: 100px!important;
            background: #6665ee;
            font-family: 'Poppins', sans-serif;
        } 
        nav a.navbar-brand{
            color: #fff;
            font-size: 30px!important;
            font-weight: 500;
        }
        button a{
            color: #6665ee;
            font-weight: 500;
        }
        button a:hover{
            text-decoration: none;
        }
        .dropdown {
        position: relative;
        display: inline-block;
        }
        
        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        }
        .footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}
        
        .footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}


        .dropdown:hover .dropdown-content {
        display: block; 
        }

    </style>
</head>
<body>
    
    <nav class="navbar">
        <a class="navbar-brand" href="#">MyLists</a>
        <div class="dropdown">
                <span class="btn btn-light">Lists</span>
                <div class="dropdown-content">
                    <button type="button" class="btn btn-light"><a href="./booklistafter.php">MyBookList</a></button>
                    <button type="button" class="btn btn-light"><a href="./movielistafter.php">MyMovieList</a></button>
                </div>
            </div>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
        <h4>Welcome <?php echo $fetch_info['name'] ?></h4>
    </nav>
    <div class="container mt-4">
    <h1 class="display-4 text-center">
      <i class="fas fa-book-open text-primary"></i> My<span class="text-primary">Movie</span>List</h1>
      <form id="book-form">
        <div class="form-group">
          <label for="title">Movie Name</label>
          <input type="text" id="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="author">Actor</label>
          <input type="text" id="author" class="form-control">
        </div>
        <div class="form-group">
          <label for="isbn">Actress</label>
          <input type="text" id="isbn" class="form-control">
        </div>
        <input type="submit" value="Add Movie" class="btn btn-primary btn-block">
      </form>
      <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th>Movie name</th>
            <th>Actor</th>
            <th>Actress</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="book-list"></tbody>
      </table>
  </div>
  <div class="footer-dark" style="padding: 50px 0; color:#f0f9ff; background-color:#282d32;">
        <footer>
            <div class="container"style="text-align: center;">
                <div class="row">
                    <div class="col-sm-6 col-md-2 item">
                        <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;" >Services</h3>
                        <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0; ">
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Web design</a></li>
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Development</a></li>
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2 item">
                        <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">About</h3>
                        <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0;">
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Company</a></li>
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Team</a></li>
                            <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Careers</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2 item">
                      <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">Join Us</h3>
                      <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0;">
                          <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="./signup-user.php">Sign-up</a></li>
                          <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="./login-user.php">Sign-in</a></li>
                      </ul>
                  </div>
                    <div class="col-md-6 item text">
                        <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">Contact Us</h3>
                        <p><b>Address:</b> B-19 Anand Nagar, Makrana<br>Nagaur, Rajasthan<br><b>Website:</b><a href="#"> www.idearoute.com</a></p>
                    </div>
                    <div class="col item social">
                      <p style="text-align: center;"><img src="./img/logo.jpeg" width="100px" height="100px" style="border-radius: 50px ;"></p><br>
                      <a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    </div>
                </div>
                <p class="copyright">IdeaRoute © 2018</p>
            </div>
        </footer>
    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Book Class: Represents a Book
// Book Class: Represents a Book
class Book {
  constructor(title, author, isbn) {
    this.title = title;
    this.author = author;
    this.isbn = isbn;
  }
}

// UI Class: Handle UI Tasks
class UI {
  static displayBooks() {
    const books = Store.getBooks();

    books.forEach((book) => UI.addBookToList(book));
  }

  static addBookToList(book) {
    const list = document.querySelector('#book-list');

    const row = document.createElement('tr');

    row.innerHTML = `
      <td>${book.title}</td>
      <td>${book.author}</td>
      <td>${book.isbn}</td>
      <td><a href="#" class="btn btn-danger btn-sm delete">X</a></td>
    `;

    list.appendChild(row);
  }

  static deleteBook(el) {
    if(el.classList.contains('delete')) {
      el.parentElement.parentElement.remove();
    }
  }

  static showAlert(message, className) {
    const div = document.createElement('div');
    div.className = `alert alert-${className}`;
    div.appendChild(document.createTextNode(message));
    const container = document.querySelector('.container');
    const form = document.querySelector('#book-form');
    container.insertBefore(div, form);

    // Vanish in 3 seconds
    setTimeout(() => document.querySelector('.alert').remove(), 3000);
  }

  static clearFields() {
    document.querySelector('#title').value = '';
    document.querySelector('#author').value = '';
    document.querySelector('#isbn').value = '';
  }
}

// Store Class: Handles Storage
class Store {
  static getBooks() {
    let books;
    if(localStorage.getItem('books') === null) {
      books = [];
    } else {
      books = JSON.parse(localStorage.getItem('books'));
    }

    return books;
  }

  static addBook(book) {
    const books = Store.getBooks();
    books.push(book);
    localStorage.setItem('books', JSON.stringify(books));
  }

  static removeBook(isbn) {
    const books = Store.getBooks();

    books.forEach((book, index) => {
      if(book.isbn === isbn) {
        books.splice(index, 1);
      }
    });

    localStorage.setItem('books', JSON.stringify(books));
  }
}

// Event: Display Books
document.addEventListener('DOMContentLoaded', UI.displayBooks);

// Event: Add a Book
document.querySelector('#book-form').addEventListener('submit', (e) => {
  // Prevent actual submit
  e.preventDefault();

  // Get form values
  const title = document.querySelector('#title').value;
  const author = document.querySelector('#author').value;
  const isbn = document.querySelector('#isbn').value;

  // Validate
  if(title === '' || author === '' || isbn === '') {
    UI.showAlert('Please fill in all fields', 'danger');
  } else {
    // Instatiate book
    const book = new Book(title, author, isbn);

    // Add Book to UI
    UI.addBookToList(book);

    // Add book to store
    Store.addBook(book);

    // Show success message
    UI.showAlert('Movie Added', 'success');

    // Clear fields
    UI.clearFields();
  }
});

// Event: Remove a Book
document.querySelector('#book-list').addEventListener('click', (e) => {
  // Remove book from UI
  UI.deleteBook(e.target);

  // Remove book from store
  Store.removeBook(e.target.parentElement.previousElementSibling.textContent);

  // Show success message
  UI.showAlert('Movie Removed', 'success');
});
    </script>
</body>
</html>