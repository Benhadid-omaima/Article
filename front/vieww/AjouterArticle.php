<?php
require_once "../config.php";
require_once "../controller/ArticleC.php";
require_once "../model/article.php";

if (isset($_POST['save']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['date'])  && !empty($_POST['image']) && !empty($_POST['code'])) {

    $pdo = config::getConnexion();

    // verifie code existant ou pas 
    $query = $pdo->prepare('SELECT COUNT(*) FROM article WHERE codeS = ?');
    $query->execute(array($_POST['code']));

    if ($query->fetchColumn() != 0) {
        // verifie code existant  
        echo "<script>alert('Error: Code already exists. Please choose a different code.')</script>";
    } else {
        // verifie si date en future 
        $date = new DateTime($_POST['date']);
        $now = new DateTime();

        if ($date >= $now) {
            $article = new Article(
                $_POST['nom'],
                $_POST['description'],
                $_POST['date'],
                $_POST['image'],
                $_POST['code']
            );

            $articlec = new ArticleC();
            $articlec->ajouterarticle($article);

            header('Location:AfficherArticleFront.php');
            exit;
        } else {
            // date is in the past or today
            echo "<script>alert('Error: Date must be in the future.')</script>";
        }
    }
}
?>






<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
  <link rel="stylesheet" href="style.css">
</head>

  

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          
           

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Article /</span> Ajouter Article</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Ajouter Article </h5>
                    </div>
                    <div class="card-body">
                      <form action ="AjouterArticle.php" method="POST">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nom</label>
                          <input type="text" class="form-control" name = "nom" placeholder="nom du Article" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Description</label>           
                          <input type="text" class="form-control" name = "description" placeholder="Write your Description here ! " />

                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Date</label>
                          <input type="date" class="form-control" name = "date"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Code </label>
                          <input type="text" class="form-control" name ="code" placeholder="code du article" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Image </label>
                          <input type="file" class="form-control" name = "image" placeholder="image du article" />
                        </div>
                        <button type="submit" name ="save"  value="submit" class="btn btn-primary">Ajouter</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
           
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
