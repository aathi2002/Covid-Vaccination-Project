    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost">Covid Vaccination <?php
                                                                                session_start();
                                                                                if (isset($_SESSION['username'])) {
                                                                                    echo "<small>| " . $_SESSION['role'] . ": " . $_SESSION['username'] . "</small>";
                                                                                }
                                                                                ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse show" id="navbarDark">

                <ul class="navbar-nav me-auto mb-2 mb-xl-0">

                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="http://localhost/components/applied.php">Applied users</a>
                    </li>';
                    }
                    ?>

                </ul>


                <form class="d-flex" action="http://localhost">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search center" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>

                    <?php

                    if (isset($_SESSION['role'])) {
                        echo '<a class="btn text-white" href="http://localhost/components/logout.php" >Logout</a>';
                    } else {
                        echo '<a class="btn text-white" href="http://localhost/components/login.php" >Login</a>';
                    }
                    ?>



                </form>

            </div>
        </div>
    </nav>