<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'besoin de titre');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Contenu requis');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'selectionnez le topic');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Un post existe déja avec ce titre');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Un post existe déja avec ce titre');
        }
    }

    return $errors;
}