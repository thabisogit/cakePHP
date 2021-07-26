<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="/webroot/css/datatables.css" rel="stylesheet">
    <link href="/webroot/css/twitter-bootstrap.css" rel="stylesheet">
    <link href="/webroot/css/bootstrap.css" rel="stylesheet">

    <script src="/webroot/js/jquery.js"></script>
    <script src="/webroot/js/datatables.js"></script>
    <script src="/webroot/js/bootstrap.js"></script>
    <script type="text/javascript" src="/webroot/js/bootstrap2.js"></script>



    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link("Learners", ['controller' => 'Learners', 'action' => 'index'], array('class' => 'nav-link')) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link("Schools", ['controller' => 'Schools', 'action' => 'index'], array('class' => 'nav-link')) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link("Provinces", ['controller' => 'Provinces', 'action' => 'index'], array('class' => 'nav-link')) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
