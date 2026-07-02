<?php if (isset($_GET['book']) && !empty($_GET['book'])) { ?>

    <?php
    $book = $_GET['book'];
    $file = "../" . $book;
    if (file_exists($file)) {
        ?>

        <!DOCTYPE html>
        <html>

        <head>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

            <link rel="stylesheet" type="text/css" href="css/flipbook.style.css">
            <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

            <script src="js/flipbook.min.js"></script>

            <script type="text/javascript">

                $(document).ready(function () {
                    $("#container").flipBook({
                        pdfUrl: "<?= $file;?>",
						tilt: -13, // pour l'effet d'inclinaison
                    });

                })
            </script>

        </head>

        <body>
        <div id="container">

        </div>

        </body>

        </html>

    <?php } else { ?>
        <h1>Not Found : error 404</h1>
    <?php } ?>
<?php } else { ?>
    <h1>Nothing to show !</h1>
<?php } ?>
