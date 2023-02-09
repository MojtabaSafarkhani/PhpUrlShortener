<?php

include "template/header.php";


?>

    <div class="container">
        <div class="row justify-content-center ">
            <form action="src/getData.php" method="get">

                <div class="row justify-content-center ">
                    <div class="col-5 align-self-center ">

                        <input id="url" type="text" class="form-control" name="url">

                    </div>
                    <div class="col-1 align-self-center ">
                        <input class="btn btn-sm btn-dark" id="submit" type="submit" name="submit" value="Send!">
                    </div>
                </div>

                <div class="row  justify-content-center">
                    <div class="col-6">
                        <?php if (isset($_GET['error'])): ?>
                            <span class="text-danger form-text fw-bold "><?= $_GET['error'] ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php if (isset($_GET['url_first'], $_GET['url_second'])): ?>
    <div class="container">
        <div class="row justify-content-center my-2">
            <div class="col-5 text-center text-break">
                <label for="url_first" class="fw-bold my-2">First Url:</label>
                <p id="url_first" class="fw-bold"><?= $_GET['url_first'] ?></p>
            </div>
        </div>
        <div class="row justify-content-center my-2">
            <div class="col-5 text-center text-break">
                <label for="second_url" class="fw-bold my-2">Second Url:</label>
                <p id="second_url" class="fw-bold">http://localhost/UrlShortener/<?= $_GET['url_second'] ?></p>
            </div>
        </div>

    </div>

<?php endif; ?>

<?php include "template/footer.php"; ?>