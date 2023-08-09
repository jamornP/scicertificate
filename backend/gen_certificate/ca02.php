<?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/vendor/autoload.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/function/function.php"; ?>
<?php

use App\Model\Certificate\Data;

$personObj = new Data;


// print_r($_REQUEST);
$project = $_POST['project'];
$bg = $_POST['bg'];
$select = $_POST['select'];
if(isset($_POST['excample'])){
    $person = $personObj->getDataByProjectOne($project);
    switch ($select) {
        case 1: // มีโรงเรียน
            $i = 0;
    
            $date_at = datethaifull($person['date_at']);
            $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            // set font
            $pdf->SetFont('thsarabun', '', 14, '', true);
            // set page margin
            $pdf->SetMargins(0, 0, 0, 0);
        
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
            $i++;
        
            $name = $person['title'] . $person['name'] . " " . $person['surname'];
            // $name = "จามร";
            // add a page
            $pdf->AddPage();
            // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/'.$bg;
            $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
            //ลายเซ็นต์ CA
            $img_ca = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/ca/susu.png';
            $pdf->Image($img_ca, 110, 147, 0, 50, '', '', '', false, 300, '', false, false, 0);
            // Print a text
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(36);
            $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
            $pdf->SetFontSize(28);
            $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);
        
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(24);
            $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetFontSize(36);
            $pdf->SetTextColor(28, 46, 75);
            // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
            $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 78);
        
            $pdf->SetFont('thsarabun', '');
            $pdf->SetFontSize(28);
            $pdf->MultiCell(0, 0, 'โรงเรียน' . $person['school'], 0, 'C', 0, 1, 0, 92);
        
            $pdf->SetFont('thsarabun', 'B');
            // $pdf->SetTextColor(0,98,133);
            $pdf->SetFontSize(34);
            $pdf->MultiCell(0, 0, $person['award'], 0, 'C', 0, 1, 0, 110);
            // $pdf->SetFont('thsarabun', 'B');
            // $pdf->SetTextColor(28,46,75);
            // $pdf->SetFontSize(30);
            // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(30);
            $pdf->MultiCell(0, 0, $project, 0, 'C', 0, 1, 0, 127);
        
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(28);
            $pdf->MultiCell(0, 0, 'วันที่ ' . $date_at, 0, 'C', 0, 1, 0, 142);
        
        
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(18);
            $pdf->MultiCell(0, 0, '(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)', 0, 'C', 0, 1, 0, 182);
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(18);
            $pdf->MultiCell(0, 0, 'คณบดี คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 188);
        
        
            
            $style = [
                'border' => 1,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => [0, 0, 0],
                'bgcolor' => [247, 247, 247],
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            ];
            // QRCODE,M : QR-CODE Medium error correction
            $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/', 'QRCODE,M', 20, 172, 30, 30, $style, 'N');
        
            //สร้าง pdf
            $pdf->Output('preview.pdf', 'I');
            
        
            $pdf->Close();
        break;
        case 2:
            $i = 0;
    
            $date_at = datethaifull($person['date_at']);
            $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            // set font
            $pdf->SetFont('thsarabun', '', 14, '', true);
            // set page margin
            $pdf->SetMargins(0, 0, 0, 0);
        
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
            $i++;
        
            $name = $person['title'] . $person['name'] . " " . $person['surname'];
            // $name = "จามร";
            // add a page
            $pdf->AddPage();
            // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/'.$bg;
            $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
            //ลายเซ็นต์ CA
            $img_ca = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/ca/susu.png';
            $pdf->Image($img_ca, 110, 135, 0, 50, '', '', '', false, 300, '', false, false, 0);
            // Print a text
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(36);
            $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
            $pdf->SetFontSize(28);
            $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);
        
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(24);
            $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetFontSize(36);
            $pdf->SetTextColor(28, 46, 75);
            // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
            $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 82);
        
            // $pdf->SetFont('thsarabun', '');
            // $pdf->SetFontSize(28);
            // $pdf->MultiCell(0, 0, 'โรงเรียน' . $person['school'], 0, 'C', 0, 1, 0, 92);
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(34);
            $pdf->MultiCell(0, 0, $person['award'], 0, 'C', 0, 1, 0, 105);
            // $pdf->SetFont('thsarabun', 'B');
            // $pdf->SetTextColor(28,46,75);
            // $pdf->SetFontSize(30);
            // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(30);
            $pdf->MultiCell(0, 0, $project, 0, 'C', 0, 1, 0, 122);
        
        
            $pdf->SetFont('thsarabun', 'B');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(28);
            $pdf->MultiCell(0, 0, 'วันที่ ' . $date_at, 0, 'C', 0, 1, 0, 137);
        
        
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(18);
            $pdf->MultiCell(0, 0, '(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)', 0, 'C', 0, 1, 0, 172);
            $pdf->SetFont('thsarabun', '');
            $pdf->SetTextColor(0, 98, 133);
            $pdf->SetFontSize(18);
            $pdf->MultiCell(0, 0, 'คณบดี คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 178);
        
        
            
            $style = [
                'border' => 1,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => [0, 0, 0],
                'bgcolor' => [247, 247, 247],
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            ];
            // QRCODE,M : QR-CODE Medium error correction
            $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/', 'QRCODE,M', 20, 172, 30, 30, $style, 'N');
        
            //สร้าง pdf
            $pdf->Output('preview.pdf', 'I');
            
        
            $pdf->Close();
        break;
    }
}

if(isset($_POST['create'])){
    $dirf = "../upload/certificate/{$_POST['folder']}";
    // echo $dirf;
    //window
    if (is_dir($dirf)) {
    } else {
        mkdir("$dirf", 0777);
        $ck = $personObj->addGenCer($_POST['folder'],$_POST['project']);
    }
    $persons = $personObj->getDataByProject($_POST['project']);
    switch ($select){
        case 1 : 
            $i = 0;
            foreach ($persons as $person) {
                $date_at = datethaifull($person['date_at']);
                $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                // set font
                $pdf->SetFont('thsarabun', '', 14, '', true);
                // set page margin
                $pdf->SetMargins(0, 0, 0, 0);
        
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
                $i++;
        
                $name = $person['title'] . $person['name'] . " " . $person['surname'];
                // $name = "จามร";
                // add a page
                $pdf->AddPage();
                // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/'.$bg;
                $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
                //ลายเซ็นต์ CA
                $img_ca = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/ca/susu.png';
                $pdf->Image($img_ca, 110, 135, 0, 50, '', '', '', false, 300, '', false, false, 0);
                // Print a text
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(36);
                $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
                $pdf->SetFontSize(28);
                $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);
        
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(24);
                $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetFontSize(36);
                $pdf->SetTextColor(28, 46, 75);
                // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
                $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 78);
        
                $pdf->SetFont('thsarabun', '');
                $pdf->SetFontSize(28);
                $pdf->MultiCell(0, 0, 'โรงเรียน' . $person['school'], 0, 'C', 0, 1, 0, 92);
        
                $pdf->SetFont('thsarabun', 'B');
                // $pdf->SetTextColor(0,98,133);
                $pdf->SetFontSize(34);
                $pdf->MultiCell(0, 0, $person['award'], 0, 'C', 0, 1, 0, 110);
                // $pdf->SetFont('thsarabun', 'B');
                // $pdf->SetTextColor(28,46,75);
                // $pdf->SetFontSize(30);
                // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(30);
                $pdf->MultiCell(0, 0, $project, 0, 'C', 0, 1, 0, 127);
        
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(28);
                $pdf->MultiCell(0, 0, 'วันที่ ' . $date_at, 0, 'C', 0, 1, 0, 142);
        
        
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(18);
                $pdf->MultiCell(0, 0, '(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)', 0, 'C', 0, 1, 0, 182);
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(18);
                $pdf->MultiCell(0, 0, 'คณบดี คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 188);
                //สร้างไฟล์
                $fol = "\\sci-certificate\\upload\\certificate\\{$_POST['folder']}\\";//window
                // $fol = "/sci-certificate/upload/certificate/{$_POST['folder']}"; //linux
                $filename = "{$_POST['folder']}-{$person['id']}-{$person['num']}.pdf";
                $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //windows
                // $filelocation = "/home/jamorn" . $fol; //Linux
        
                $fileNL = $filelocation . "\\" . $filename; //Windows
                // $fileNL = $filelocation . "/" . $filename; //Linux
        
                $serv = "/certificate/" . $_POST['folder'] . "/" . $filename;
                //QR Code
                $style = [
                    'border' => 1,
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => [0, 0, 0],
                    'bgcolor' => [247, 247, 247],
                    'module_width' => 1, // width of a single module in points
                    'module_height' => 1 // height of a single module in points
                ];
                // QRCODE,M : QR-CODE Medium error correction
                $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/upload/certificate/' . $_POST['folder'] . '/' . $filename, 'QRCODE,M', 20, 172, 30, 30, $style, 'N');
        
                //สร้าง pdf
                $pdf->Output($fileNL, 'F');
                $dataU['id'] = $person['id'];
                $dataU['file_cer'] = $serv;
                $show = $i.". ".$person['name']." ".$person['surname'];
                echo "{$show}<br>";
                $up = $personObj->updateCer($dataU);
            }
            $pdf->Close();
            header("refresh: 10; url=/sci-certificate/pages/m_certificate.php");
            exit(0);
        break;
        case 2 :
            $i = 0;
            foreach ($persons as $person) {
                $date_at = datethaifull($person['date_at']);
                $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                // set font
                $pdf->SetFont('thsarabun', '', 14, '', true);
                // set page margin
                $pdf->SetMargins(0, 0, 0, 0);
        
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
                $i++;
        
                $name = $person['title'] . $person['name'] . " " . $person['surname'];
                // $name = "จามร";
                // add a page
                $pdf->AddPage();
                // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/'.$bg;
                $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
                //ลายเซ็นต์ CA
                $img_ca = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/ca/susu.png';
                $pdf->Image($img_ca, 110, 135, 0, 50, '', '', '', false, 300, '', false, false, 0);
                // Print a text
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(36);
                $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
                $pdf->SetFontSize(28);
                $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);
        
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(24);
                $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetFontSize(36);
                $pdf->SetTextColor(28, 46, 75);
                // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
                $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 85);
        
                // $pdf->SetFont('thsarabun', '');
                // $pdf->SetFontSize(28);
                // $pdf->MultiCell(0, 0, 'โรงเรียน' . $person['school'], 0, 'C', 0, 1, 0, 92);
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(34);
                $pdf->MultiCell(0, 0, $person['award'], 0, 'C', 0, 1, 0, 105);
                // $pdf->SetFont('thsarabun', 'B');
                // $pdf->SetTextColor(28,46,75);
                // $pdf->SetFontSize(30);
                // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(30);
                $pdf->MultiCell(0, 0, $project, 0, 'C', 0, 1, 0, 122);
        
        
                $pdf->SetFont('thsarabun', 'B');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(28);
                $pdf->MultiCell(0, 0, 'วันที่ ' . $date_at, 0, 'C', 0, 1, 0, 137);
        
        
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(18);
                $pdf->MultiCell(0, 0, '(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)', 0, 'C', 0, 1, 0, 172);
                $pdf->SetFont('thsarabun', '');
                $pdf->SetTextColor(0, 98, 133);
                $pdf->SetFontSize(18);
                $pdf->MultiCell(0, 0, 'คณบดี คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 178);
                //สร้างไฟล์
                $fol = "\\sci-certificate\\upload\\certificate\\{$_POST['folder']}\\";//window
                // $fol = "/sci-certificate/upload/certificate/{$_POST['folder']}"; //linux
                $filename = "{$_POST['folder']}-{$person['id']}-{$person['num']}.pdf";
                $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //windows
                // $filelocation = "/home/jamorn" . $fol; //Linux
        
                $fileNL = $filelocation . "\\" . $filename; //Windows
                // $fileNL = $filelocation . "/" . $filename; //Linux
        
                $serv = "/certificate/" . $_POST['folder'] . "/" . $filename;
                //QR Code
                $style = [
                    'border' => 1,
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => [0, 0, 0],
                    'bgcolor' => [247, 247, 247],
                    'module_width' => 1, // width of a single module in points
                    'module_height' => 1 // height of a single module in points
                ];
                // QRCODE,M : QR-CODE Medium error correction
                $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/upload/certificate/' . $_POST['folder'] . '/' . $filename, 'QRCODE,M', 20, 172, 30, 30, $style, 'N');
        
                //สร้าง pdf
                $pdf->Output($fileNL, 'F');
                $dataU['id'] = $person['id'];
                $dataU['file_cer'] = $serv;
                $show = $i.". ".$person['name']." ".$person['surname'];
                echo "{$show}<br>";
                $up = $personObj->updateCer($dataU);
            }
            $pdf->Close();
            header("refresh: 3; url=/sci-certificate/pages/m_certificate.php");
            exit(0);
        break;
    }
    
}
?>