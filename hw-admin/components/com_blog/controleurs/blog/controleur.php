<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addPost':
            addPost($_POST);
            break;
        case 'editPost':
            editPost($_POST);
            break;
        case 'deletePost':
            deletePost($_POST);
            break;
        case "enablePost":
            enablePost($_POST);
            break;
        case 'deletePosts' :
            deletePosts($_POST);
            break;
        case 'enablePosts' :
            enablePosts($_POST);
            break;
    }
}

function addPost($data)
{
    $indices = array("titre");
    if (validateBlog($data, $indices)) {
        if (buildBlog($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editPost($data)
{
    $indices = array("id", "titre");
    if (validateBlog($data, $indices)) {
        if (buildBlog($data, $data['id'])->edit() == 1) {
            /*$blogs = blog::findAll('en');
            foreach($blogs as $key => $blog){
                $blog->setSlug(blog::generateSlug($blog->getTitre(),$_SESSION['langue'],$blog->getId()));
                $blog->edit();
            }*/
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deletePost($data)
{
    $indices = array("id");
    if (validateBlog($data, $indices))
    {
        $id = $data["id"];
        $blog = blog::find($id, $_SESSION["langue"]);
        if ($blog->delete() == 1) {
            if(file_exists("../../../../images/blog/" . $blog->getPhoto())){
                @unlink("../../../../images/blog/" . $blog->getPhoto());
            }

            if(file_exists("../../../../images/blog/" . $blog->getPhotoBanniere())){
                @unlink("../../../../images/blog/" . $blog->getPhotoBanniere());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deletePosts($data)
{
    $indices = array("ids");
    if (validateBlog($data, $indices))
    {  
        $photos = blog::findPhotosName($data['ids']);
        if (blog::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/blog/" . $photo)){
                        @unlink("../../../../images/blog/" . $photo);
                    }
                }
                
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enablePost($data)
{
    $indices = array("id", "state");
    if (validateBlog($data, $indices))
    {
        $blog = new blog();
        $blog->setId($data['id']);
        $blog->setActive($data['state'] == "oui" ? 0 : 1);
        if ($blog->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enablePosts($data)
{
    $indices = array("ids", "active");
    if(validateBlog($data, $indices ))
    {
        $res = blog::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateBlog($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildBlog($data, $id = null)
{
    global $db;
    $blog = new blog();

    $photo = array();
    $photo_banniere = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/blog/',  array('jpg','jpeg','gif','png','svg','JPG','webp','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if(isset($_FILES['photo_banniere']) && $_FILES['photo_banniere']['name'][0]!=''){
        $photo_banniere = uploadFiles('photo_banniere','../../../../images/blog/',  array('jpg','jpeg','gif','png','svg','webp','JPG','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if($id){
        $blog->setId($id);
        if(isset($photo[0]) ) {
            $blog->setPhoto($photo[0]);
            if(file_exists("../../../../images/blog/" . blog::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/blog/" . blog::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $blog->setPhoto(blog::find($id, $_SESSION['langue'])->getPhoto());
        }

        if(isset($photo_banniere[0]) ) {
            $blog->setPhotoBanniere($photo_banniere[0]);
            if(file_exists("../../../../images/blog/" . blog::find($id, $_SESSION['langue'])->getPhotoBanniere())){
                @unlink("../../../../images/blog/" . blog::find($id, $_SESSION['langue'])->getPhotoBanniere());
            }
        } else {
            $blog->setPhotoBanniere(blog::find($id, $_SESSION['langue'])->getPhotoBanniere());
        }
        $slug = blog::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue'],$id);
        $data['slug'] = $slug;
    } else {
        if(isset($photo[0]) ) {
            $blog->setPhoto($photo[0]);
        } else {
            $blog->setPhoto(null);
        }

        if(isset($photo_banniere[0]) ) {
            $blog->setPhotoBanniere($photo_banniere[0]);
        } else {
            $blog->setPhotoBanniere(null);
        }
        $slug = blog::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue']);
        $data['slug'] = $slug;
    }

    $blog->setCategorie(categorie::find($data['id_categorie'],$_SESSION['langue']));
    $blog->setActive(isset($data['active']) ? 1 : 0);
    $blog->setTitre($data['titre']);
    $blog->setSlug($data['slug']);
    $blog->setSousTitre($data['sous_titre']);
    $blog->setExtrait($data['extrait']);
    $blog->setTexte($data['texte']);
    $blog->setSeoTitre($data['seo_titre']);
    $blog->setSeoDescription($data['seo_description']);
    $blog->setSeoKeyword(isset($data['seo_keyword']) ? $data['seo_keyword'] : '');
    $blog->setDateAdd(date("Y-m-d"));
    $blog->setLastEdit(date("Y-m-d"));
    $blog->setLangue($_SESSION['langue']);

    return $blog;
}