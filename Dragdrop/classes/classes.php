<?php

class Display

{
    private $db;

    function __construct($db) { 
        $this->db = $db;
    }

    
    public function box($colour) {
        $output = "";
        $cakeid=$_SESSION['cakeid'];
        $category=$_SESSION['Category'];

        if($colour=='orange'){
             if($category=='BaseLayer'){
        $stmt = $this->db->prepare("SELECT * FROM layer WHERE box = :colour AND BaseLayer > 0");
        $stmt->bindParam(':colour', $colour);
        $stmt->execute();  


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $output .= "\t\t\t<div id='" . $row["id"] . "'>" . '<img height="100" width="100" src="data:image;base64,'.$row['image'].' "> ' .
            "</div>\n";
        }}

         }

         elseif($colour=="blue")
         {
        $stmt = $this->db->prepare("SELECT * FROM cake WHERE id = :id");
        $stmt->bindParam(':id', $cakeid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        //if ang layer nga column sa db greater than 0 ,so naay sud
        if($row['layer3']>0){

        $stmt = $this->db->prepare("SELECT * FROM layer WHERE id = :id");
        $stmt->bindParam(':id', $row['layer3']);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $output .= "\t\t\t<div id='" . $row["id"] . "'>" . '<img height="100" width="100" src="data:image;base64,'.$row['image'].' "> ' .
            "</div>\n";
        }



        }



         }
          elseif($colour=="red")
         {
        $stmt = $this->db->prepare("SELECT * FROM cake WHERE id = :id");
        $stmt->bindParam(':id', $cakeid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        if($row['layer2']>0){

        $stmt = $this->db->prepare("SELECT * FROM layer WHERE id = :id");
        $stmt->bindParam(':id', $row['layer2']);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $output .= "\t\t\t<div id='" . $row["id"] . "'>" . '<img height="100" width="100" src="data:image;base64,'.$row['image'].' "> ' .
            "</div>\n";
        }



        }



         }
           elseif($colour=="green")
         {
        $stmt = $this->db->prepare("SELECT * FROM cake WHERE id = :id");
        $stmt->bindParam(':id', $cakeid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        if($row['layer1']>0){

        $stmt = $this->db->prepare("SELECT * FROM layer WHERE id = :id");
        $stmt->bindParam(':id', $row['layer1']);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $output .= "\t\t\t<div id='" . $row["id"] . "'>" . '<img height="100" width="100" src="data:image;base64,'.$row['image'].' "> ' .
            "</div>\n";
        }



        }



         }
        /*else{
        $id=$_SESSION['cakeid'];
        $stmt = $this->db->prepare("SELECT * FROM cake WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row["layer1"]==2)
            {
                $picid=$row["layer1"];
        $stmt = $this->db->prepare("SELECT * FROM layer WHERE id = :picid");
        $stmt->bindParam(':picid', $picid);
        $stmt->execute();  

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $output .= "\t\t\t<div id='" . $row["id"] . "'>" . '<img height="100" width="100" src="data:image;base64,'.$row['image'].' "> ' .
            "</div>\n";
        }

            }

        }

        }*/



//echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';


        return $output;
    }    


    
}

?>