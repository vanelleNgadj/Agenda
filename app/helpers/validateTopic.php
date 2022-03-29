<?php

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Nom de la catégorie');
    }

    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Cette catégorie existe déja');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Cette catégorie existe déja');
        }
    }

    return $errors;
}
