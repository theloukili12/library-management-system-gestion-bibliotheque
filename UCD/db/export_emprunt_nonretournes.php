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
            $sql = "Select count(*) as nbr FROM pret WHERE dateretour is NULL AND DATE_ADD(dateaccord, INTERVAL 2 DAY) < DATE(NOW())";
            include "db_conn.php";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $nbrp = $row['nbr'];
    
            }
            $this->SetFont('Times','B',16);
            $this->Cell(250,0,'Nombre des Livres non retournees : '.$nbrp.' Livres',0,0,'C');
            $this->Ln(10);

        }
        
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
        }
        function headerTable(){
            $this->SetFillColor(255,0,0);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('Times','B',16);
            $this->Cell(55,10,'Titre Livre',1,0,'C');
            $this->Cell(55,10,'CNI Admin',1,0,'C');
            $this->Cell(55,10,'CNE Etudiant',1,0,'C');
            $this->Cell(55,10,'Date Emprunt',1,0,'C');
            $this->Cell(55,10,'Date Retour',1,0,'C');

            $this->Ln();
        }
        function ViewTable($db){
            $this->SetFont('Times','',12);
            $stmt = $db->query("
            Select l.titreliv ,p.cinadm , etd.cne_etd ,p.dateretour, p.dateaccord from pret p , exemplaire e , livre l , etudiant etd where etd.cne_etd=p.cne_etd and
             p.codexp = e.codexp && l.codliv = e.codliv AND p.dateretour is null AND DATE_ADD(p.dateaccord, INTERVAL 2 DAY) < DATE(NOW())            ");
            while($data=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                $this->Cell(55,10,$data->titreliv,1,0,'C');
                $this->Cell(55,10,$data->cinadm,1,0,'C');
                $this->Cell(55,10,$data->cne_etd,1,0,'C');
                $this->Cell(55,10,$data->dateaccord,1,0,'C');
                if($data->dateretour==""){
                    $this->Cell(55,10,'Pas encore',1,0,'C');

                }else{
                    $this->Cell(55,10,$data->dateretour,1,0,'C');

                }
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