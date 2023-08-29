<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'Mark Attendance') {
        print_r($_POST);
    }
}
