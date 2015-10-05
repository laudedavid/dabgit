<?php

class DisplayCakeLayer

{
    private $db;

    function __construct($db) { 
        $this->db = $db;
    }

public function cake() {
                    $stmt =$db->prepare("SELECT * FROM cake WHERE id = :id");
                    $stmt->bindParam(':id', $_SESSION['cakeid']);
                    $stmt->execute();
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);

                    /*if($row['layer1']==1)
                    {
                         addShape( roundedRectShape, extrudeSettings,  0x804000, -150, 0, 0, 300, 0, 0, 1 );
                    }*/

                }
 }
                
?>