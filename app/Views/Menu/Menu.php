<?php

use CodeIgniter\Session\Session;

$db = \config\Database::connect();
$queryuser = " SELECT * FROM user";
$querymodule = " SELECT * FROM module";
$queryaccess = " SELECT * FROM role_module";
$setinguser = $db->query($queryuser);

$setingmodule = $db->query($querymodule);
$setingaccess = $db->query($queryaccess);
?>
<?php
$role = session()->getFlashdata('editrole');
$name = session()->getFlashdata('editname');
$delete = session()->getFlashdata('delete');
$new = session()->getFlashdata('add');
$error1 = Session()->getFlashdata('error1');
$error2 = session()->getFlashdata('error2');
if (!empty($role)) { ?>
    <div class="alert alert-success" role="alert">
        Role changed successfully!
    </div>
<?php }
if (!empty($delete)) { ?>
    <div class="alert alert-success" role="alert">
        User Deleted successfully!
    </div>
<?php }
if (!empty($new)) { ?>
    <div class="alert alert-success" role="alert">
        New User added!
    </div>
<?php }
if (!empty($error1)) { ?>
    <div class="alert alert-danger" role="alert">
        You cannot change this user's Role
    </div>
<?php }
if (!empty($error2)) { ?>
    <div class="alert alert-danger" role="alert">
        You cannot Delete This User
    </div>
<?php }
if (!empty($name)) { ?>
    <div class="alert alert-success" role="alert">
        Username Changed successfully
    </div>
<?php }
?>

<div class="row">
    <div class="col-md">
        <h1 class="text-center">menu for Admin</h1>
        <hr>
    </div>
</div>
<div class="container">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Role management
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col col-lg-8">

                            <table class="table table-hover">
                                <thead class="thead-dark">

                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Roleid</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <a href="/Home/Adduser" class="btn btn-danger">Add User</a>
                                    <?php foreach ($setinguser->getResultArray() as $su) : ?>
                                        <tr>
                                            <th scope="row">#</th>
                                            <td><?= $su['Username']; ?></td>
                                            <td><?= $su['Roleid']; ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <a href="/Process/update/<?= $su['Userid']; ?>/<?= $su['Roleid']; ?>" class="btn btn-danger">Ubah Role User</a>
                                                    <a href="/Process/delete/<?= $su['Userid']; ?>" class="btn btn-danger">Delete User</a>
                                                    <a href="/Home/Editname/<?= $su['Userid']; ?>" class="btn btn-danger">Edit Username</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Manajemen Menu
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col col-lg-8">

                            <table class="table table-hover">
                                <thead class="thead-dark">

                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Module id</th>
                                        <th scope="col">Module Name</th>
                                        <th scope="col">Module Url</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($setingmodule->getResultArray() as $sm) : ?>
                                        <tr>
                                            <th scope="row">#</th>
                                            <td><?= $sm['Moduleid']; ?></td>
                                            <td><?= $sm['Modulename']; ?></td>
                                            <td><?= $sm['Moduleurl']; ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <a href="#" class="btn btn-danger">Ubah Access</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            manajemen Akses
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">

                                <tr>

                                    <th scope="col">#</th>
                                    <th scope="col">Role id</th>
                                    <th scope="col">Module Id</th>
                                    <th scope="col">Module Url</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php foreach ($setingaccess->getResultArray() as $sa) : ?>
                                    <tr>
                                        <th scope="row">#</th>
                                        <td><?= $sa['Roleid']; ?></td>
                                        <td><?= $sa['Moduleid']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <a href="#" class="btn btn-danger">Ubah Access</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
    </body>

    </html>