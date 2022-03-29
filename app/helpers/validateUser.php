<?php

function validateUser($user)
{
    $errors = array();
// si le nom est vide
    if (empty($user['username'])) {
        array_push($errors, 'besoin de nom utilisateur');
    }
// si le mail est vide
    if (empty($user['email'])) {
        array_push($errors, 'Adresse mail requis ');
    }
// si le mot de passe est vide
    if (empty($user['password'])) {
        array_push($errors, 'entrez un mot de passe');
    }
// si le mot de passe et le la confirmation sont dfférent
    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'les deux mots de passe ne matchent pas');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email existe déja');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email déja utilsé');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'nom utilisateur requis');
    }

    if (empty($user['password'])) {
        array_push($errors, 'mot de passe requis');
    }

    return $errors;
}