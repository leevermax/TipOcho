<?php
    require "blocksite/sessions-init.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flappy Bird - Funny Game - TipOcho Studio</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/basic/logo-title.gif" />

    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Base tag  -->
    <base href="public/">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main-style.css">

    <!-- HOME CSS -->
    <link rel="stylesheet" href="assets/css/home-style.css">

    <link rel="stylesheet" href="assets/css/home-style.css">

    <script src="assets/js/jquery-3.4.1.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Teko:700" rel="stylesheet">
    <style>        
        canvas{
            border: 1px solid #000;
            display: block;
            margin: 0 auto;
        }
        .wapContGame{
            width: 330px;
            margin: auto;
            overflow: auto;
            position: relative;
        }
        .wrapHeightCore{
            width: 90px;
            overflow: auto;
            position: absolute;
            top: 0.5px;
            right: 0px;
        }
        .coreTable{
            color: red;
        }
        h5 {
            display: block;
            font-size: 0.93em;
            margin-block-start: 0.1em!important;
            margin-block-end: 0.1em!important;
            font-weight: bold;
        }
        .formName{
            background-color: green;
            padding: 5px;
        }
    </style>
</head>
<body class="wrapPage">
    <section class="blockSection">
        <?php
            require "blocksite/header.php";
            require "blocksite/get-name-gamer.php";
        ?>
    </section>
    
    <section class="blockSection">
        <div class="row bodyHomeSite">
            <div class="wapContGame">
                <canvas id="bird" width="320" height="480"></canvas>
                <div class="wrapHeightCore">
                    <h5 id="hCore">Điểm Cao:</h5>
                    <div class="coreTable" id="coreTable" style="max-height: 95px; overflow: hidden;"></div>
                </div>
                <form id="formName" method="POST" class="formName">
                  <small id="emailHelp" class="form-text text-muted">Nhập Tên:</small>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nameGamer" id="nameGamer" placeholder="Nhập Tên">
                  </div>
                  <button type="submit" name="btnNamePost" class="btn btn-primary">Submit</button>
                </form>
                <span id="text"></span>
            </div>
        </div>
    </section>
    <section class="blockSection">
        
    </section>
    <input type="hidden" name="hidName" id="nameGamer" value="<?php echo $_SESSION["nameBird"]; ?>">

    <script src="game/jssp.js"></script>
    <script src="game/game.js"></script>

    <!--   jquery -->
    <script src="assets/js/main-js.js"></script>

    <!--  Home jquery -->
    <script src="assets/js/home-js.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>