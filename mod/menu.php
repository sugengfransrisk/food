<?php

$_SESSION['idPesanan'][] = $idPesanan;
$intArray = array_map(function($nilai){return (int) $nilai;},$_SESSION['idPesanan']);