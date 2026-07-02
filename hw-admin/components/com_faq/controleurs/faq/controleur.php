<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addFaq':
            addFaq($_POST);
            break;
        case 'editFaq':
            editFaq($_POST);
            break;
        case 'deleteFaq':
            deleteFaq($_POST);
            break;
        case "enableFaq":
            enableFaq($_POST);
            break;
        case 'deleteFaqs' :
            deleteFaqs($_POST);
            break;
        case 'enableFaqs' :
            enableFaqs($_POST);
            break;
    }
}

function addFaq($data)
{
    $indices = array("titre","texte");
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

function editFaq($data)
{
    $indices = array("id", "titre","texte");
    if (validateBlog($data, $indices)) {
        if (buildBlog($data, $data['id'])->edit() == 1) {
            $faqs = faq::findAll('fr');
            foreach($faqs as $key => $faq){
                $faq->edit();
            }
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteFaq($data)
{
    $indices = array("id");
    if (validateBlog($data, $indices))
    {
        $id = $data["id"];
        $faq = faq::find($id, $_SESSION["langue"]);
        if ($faq->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteFaqs($data)
{
    $indices = array("ids");
    if (validateBlog($data, $indices))
    {  
        if (faq::deleteMultiple($data) == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableFaq($data)
{
    $indices = array("id", "state");
    if (validateBlog($data, $indices))
    {
        $faq = new faq();
        $faq->setId($data['id']);
        $faq->setActive($data['state'] == "oui" ? 0 : 1);
        if ($faq->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableFaqs($data)
{
    $indices = array("ids", "active");
    if(validateBlog($data, $indices ))
    {
        $res = faq::enableMultiple($data);
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
    $faq = new faq();

    if($id){
        $faq->setId($id);
    }
    $faq->setService(service::find($data['id_service'],$_SESSION['langue']));
    $faq->setActive(isset($data['active']) ? 1 : 0);
    $faq->setTitre($data['titre']);
    $faq->setTexte($data['texte']);
    $faq->setDateAdd(date("Y-m-d"));
    $faq->setLastEdit(date("Y-m-d"));
    $faq->setLangue($_SESSION['langue']);

    return $faq;
}