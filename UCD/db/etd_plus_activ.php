<?php 
    require "../FPDF/fpdf.php";
    $db = new PDO('mysql:host=localhost;dbname=LPABD_LOUKILI_JAOUANI','root','');
    class myPDF extends FPDF{
        function header(){
            $this->Image('..\img\UCD_LOGO.jpg',10,6);
            $this->SetFont('Arial','B',14);
            $this->Cell(450,5,'',0,0,'C');
            $this-> Ln();
            $this->SetFont('Arial','B',14);
            $this->Cell(450,5,'Universite Chouaib Doukkali',0,0,'C');
            $this-> Ln(10);
            $this->SetFont('Arial','',10);
            $this->Cell(450,5,'Avenue Jabran Khalil Jabrani',0,0,'C');
            $this-> Ln();
            $this->Cell(450,5,'B.P 299-24000',0,0,'C');
            $this-> Ln();
            $this->Cell(450,5,'El jadida Grand-Casablanca Maroc',0,0,'C');
            $this-> Ln(30);
            $sql = "
            SELECT  CONCAT( etudiant.nometd,' ',etudiant.prenometd) as nc,COUNT(pret.id_emp) FROM pret,etudiant WHERE pret.cne_etd = etudiant.cne_etd  GROUP BY etudiant.nometd ORDER BY COUNT(pret.id_emp) LIMIT 1
            ";
            include "db_conn.php";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $ouv = $row['nc'];
    
            }
            $this->SetFont('Times','U',16);
            $this->Cell(100,0,"L'etudiant avec le plus nombres d'emprunts",0,0,'C');

            $this->SetFont('Times','U',20);
            $this->Cell(60,0,$ouv,0,0,'C');
            $this->Ln(10);

        }
        
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Times','B',8);
            
            $this->Cell(0,0,'Les ouvrages le plus demandes',0,0,'C');
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
        }
        function headerTable(){
            $this->SetFillColor(255,0,0);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('Times','B',16);
            $this->Cell(140,10,'NOM COMPLET D\'ETUDIANT',1,0,'C');
            $this->Cell(140,10,'NOMBRES D\'EMPRUNTS',1,0,'C');


            $this->Ln();
        }
        function ViewTable($db){
            $this->SetFont('Times','',12);
            $sql = "
            SELECT  CONCAT( etudiant.nometd,' ',etudiant.prenometd) as nc,COUNT(pret.id_emp) as nbr FROM pret,etudiant WHERE pret.cne_etd = etudiant.cne_etd  GROUP BY etudiant.nometd ORDER BY COUNT(pret.id_emp) LIMIT 10
            ";
            $stmt = $db->query($sql);
            while($data=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                $this->Cell(140,10,$data->nc,1,0,'C');
                $this->Cell(140,10,$data->nbr,1,0,'C');
                $this->Ln();
            }

        }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();

    $pdf->AddPage('L','A4',0);
    $pdf->Line(0,45,900,45);

    $pdf->headerTable();
    $pdf->ViewTable($db);
    $pdf->Output();

?>