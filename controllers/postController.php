<?php
// https://laravel.com/docs/5.6/controllers#resource-controllers
// C'est la liste des ressources/post
function index()

{
    include 'models/post.php';
    return [
        $posts = getAllPosts(),
        'view' => 'postIndex.php',
        'data' => ['pageTitle' => 'liste des posts',
            'posts' => $posts]
    ];
}

// Ca affiche le formulaire de création pour une ressource
function create()
{
    return [
        'view' => 'postCreate.php',
        'data' => []
    ];
}

// Enregistre la ressource dans la base de donnée
function store()
{
    header('location : index.php?a=show&r=post&id=1');
}

// Affiche une ressource par rapport à un identifiant
function show($id)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
    $id = $_GET['id'];
    include 'models/post.php';
    $post = getOnePost($id);
    return [
        'view' => 'postShow.php',
        'data' => [
            'pageTitle' => $post->title,
            'post' => $post
        ]
    ];
}

// Affiche le formulaire d'édition sur base d'un identifiant
function edit($id)
{
    return [
        'view' => 'postEdit.php',
        'data' => []
    ];
}

// Modifie le post dans la base de donnée, toujours par rapport à l'identifiant
function update($id)
{
    header('location : index.php?a=show&r=post&id=' . $id);
}

// supprime le post de la base de donnée
function destroy($id)
{
    header('location : index.php?a=index&r=post');
}
