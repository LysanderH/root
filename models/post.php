<?php
include 'model.php';

function getAllPosts()
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts';
    $pst = $cx->query($sql);
    return $pst->fetchAll();
}

function getOnePost($id)
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts WHERE id = :id';
    $pst = $cx->prepare($sql);
    $pst->execute([':id' => $id]);
    return $pst->fetch();
}