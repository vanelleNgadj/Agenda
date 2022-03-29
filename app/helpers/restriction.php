<?php

// fonction pour utilisateur uniquement
function usersOnly($redirect = '/blog.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'Vous devez d’abord vous connecter';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}


// fonction pour administrateur uniquement
function adminOnly($redirect = '/blog.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'Vous n’êtes pas autorisé';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

// fonction pour administrateur uniquement
function orgonly($redirect = '/blog.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['org'])) {
        $_SESSION['message'] = 'Vous n’êtes pas autorisé';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

// fonction pour administrateur et organisateur uniquement
function adminorg($redirect = '/blog.php')
{
    if (empty($_SESSION['id']) || (empty($_SESSION['org']) && empty($_SESSION['admin']))) {
        $_SESSION['message'] = 'Vous n’êtes pas autorisé';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

// fonction pour invité ou visiteur du site uniquement
function guestsOnly($redirect = '/blog.php')
{
    if (isset($_SESSION['id'])) {
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }    
}