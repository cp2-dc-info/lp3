<?php

    class HomeCtrl {

        public function doPost() {

        }

    }

    $controller = new HomeCtrl();
    if(!empty($_POST)) {
        $controller->doPost();
    } else {
        header('Location: LoginView.php');
        exit();
    }

?>