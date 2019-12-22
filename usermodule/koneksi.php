<?php
$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
if (!$conn) {
    die('Tidak dapat tersambung dengan database');
}
