<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'downloadContact' :
            // include PHPExcel
            include_once('PHPExcel.php');
            downloadContact();
            break;
        case 'uploadContact' :
            // include PHPExcel
            include_once('PHPExcel.php');
            uploadContact();
            break;
        case 'viewContact' :
            viewContact($_POST);
            break;
        case 'deleteContact' :
            deleteContact($_POST);
            break;
    }
}

/* -------------------------------- downloadContact -------------------------------- */
function downloadContact(){
    global $db;
    $SQLselect = "SELECT * FROM " . __prefixe_db__ . "contact";
    $result = $db->queryS($SQLselect);


// create new PHPExcel object
    $objPHPExcel = new PHPExcel;

// set default font
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');

// set default font size
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

// create the writer
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");



    /**

     * Define currency and number format.

     */

// currency format, € with < 0 being in red color
    $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

// number format, with thousands separator and two decimal points.
    $numberFormat = '#,#0.##;[Red]-#,#0.##';



// writer already created the first sheet for us, let's get it
    $objSheet = $objPHPExcel->getActiveSheet();

// rename the sheet
    $objSheet->setTitle('Emails report');


// insertion automatique

// L'entête
    $header = array(
        "ID",
        "Nom",
        "Date",
        "Confimé",
    );

    $c = 0;
    foreach($header as $item => $h){
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($c, 1, $h);
        $style['red_text'] = array(
            'name' => 'Arial',
            'color' => array(
                'rgb' => 'FF0000'
            )
        );
        $objPHPExcel->getActiveSheet()
            ->getStyleByColumnAndRow($c, 1)
            ->getFont()
            ->applyFromArray($style['red_text']);

        $c++;
    }

// Le corps
    $row = 2;
    foreach($result as $data) {
        $n = new contact($data["id"], $db);

        $row_email = array(
            $n->getId(),
            $n->getNom(),
            normaldate($n->getDateAdd()),
            ($n->isConfirm())? "Oui" : "Non",
        );

        $col = 0;
        foreach($row_email as $key => $value){
            $type = PHPExcel_Cell_DataType::TYPE_STRING;
            $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $row)->setValueExplicit($value, $type);
            $col++;
        }
        $row++;
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Contact_'.date('d-m-Y_H-i-s').'.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit;
}

/* -------------------------------- uploadContact -------------------------------- */
function uploadContact(){
    global $db, $siteURL;
    if(isset($_FILES['fichier']) && $_FILES['fichier']['name'][0]!='') {
        $file_nom = $_FILES['fichier']['name'];
        $file_nom_tmp = $_FILES['fichier']['tmp_name'];
        $file_ext = pathinfo($file_nom)['extension'];
        $file_nom = "file_".date("Y-m-d-h-i-s");
        $file = "../../../../uploads/".$file_nom.".".$file_ext;
        if(@move_uploaded_file($file_nom_tmp, $file)){
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $data = array();

            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                $highestRow         = $worksheet->getHighestRow();
                $highestColumn      = $worksheet->getHighestColumn();
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                for ($row = 1; $row <= $highestRow; ++ $row) {
                    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                        $cell = $worksheet->getCellByColumnAndRow($col, $row);
                        $val = $cell->getValue();
                        $data[$row][$col] = $val;
                    }
                }
            }
            unset($data[1]); // supprimer le header

            foreach($data as $value){
                $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, template, date_add, confirm) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($value[0], "text"),
                    GetSQLValueString($value[1], "text"),
                    GetSQLValueString(date('Y-m-d'), "date"),
                    GetSQLValueString($value[2], "int"));
                $db->query($insertSQL);
            }
            @unlink($file); // Suppression du fichier xlsx après remplir la bd
            header("Location: ".$siteURL."hw-admin/index.php?option=com_contact"); // redirection
        }else{
            echo '0';
        }
    }
}

/* -------------------------------- viewContact -------------------------------- */
function viewContact($data){
    global $db;
    if(isset($data['id']) && !empty($data['id'])){
        $id = intval($data['id']);
        $contact = new contact($id,$db);
        $SQLupdate = "UPDATE ".__prefixe_db__."contact set confirm = 0 WHERE id = $id";
        $db->query($SQLupdate);
        echo $contact->getTemplate();
    }
    else
        echo '';
}

/* -------------------------------- deleteContact -------------------------------- */
function deleteContact($data){
    global $db;
    if(isset($data['id']) && !empty($data['id'])){
        $id = intval($data['id']);
        $SQLdelete = "DELETE FROM ".__prefixe_db__."contact WHERE id = $id";
        if(!$db->query($SQLdelete)){
            echo '1';
        }else {
            echo '2';
        }
    }
    else
        echo '0';
}

?>