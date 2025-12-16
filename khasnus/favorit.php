<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    include 'favorit_guest.php';
} else {
    include 'favorit_user.php';
}
