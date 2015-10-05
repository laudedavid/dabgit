<?php
session_start();
require_once 'php-includes/connect.inc.php';
require_once 'classes/classes.php';
//require_once 'classes/classeslayers.php';

$display = new Display($db);
//$displaycakelayer = new DisplayCakeLayer($db);

if(isset($_POST['submit'])) {

    $id = 1;
    $name = 'atay';
    $layer1 = 0;
    $layer2 = 0;
    $layer3 = 0;
            
$stmt = $db->prepare("INSERT INTO cake (id, name, layer1, layer2, layer3) VALUES (?, ?, ?, ?, ?)");
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $name);
$stmt->bindParam(3 ,$layer1);
$stmt->bindParam(4 ,$layer2);
$stmt->bindParam(5 ,$layer3);
$stmt->execute();

$_SESSION['cakeid'] =$id;
echo $_SESSION['cakeid'];
        }




/* if(isset($_POST['submitview'])) {
     
}*/
                 
  
                if(isset($_POST['submitview'])) {
//echo 'out';
                    $stmt =$db->prepare("SELECT * FROM cake WHERE id = :id");
                    $stmt->bindParam(':id', $_SESSION['cakeid']);
                    $stmt->execute();
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);

                   echo '<input required  type = "text" id ="layer1" name = "layer1" value="' . $row['layer1']. '" />';
                    echo '<input required  type = "text" id ="layer2" name = "layer2" value="' . $row['layer2']. '" />';
                     echo '<input required  type = "text" id ="layer3" name = "layer3" value="' . $row['layer3']. '" />';

       /*       echo '<script type="text/javascript">'
   , 'makecake();'
   , '</script>'
;*/
                }
                else{
                       echo '<input required  type = "text" id ="layer1" name = "layer1" value="" />';
                    echo '<input required  type = "text" id ="layer2" name = "layer2" value="" />';
                    echo '<input required  type = "text" id ="layer3" name = "layer3" value="" />';

                }

            

                if(isset($_POST['deletecake'])) {

                    $stmt = $db->prepare( "DELETE FROM cake WHERE id=:id" );
                    $stmt->bindValue(":id",  $_SESSION['cakeid']);
                    $stmt->execute();
                    $_SESSION['cakeid'] =0;
                }





                if( isset($_POST['submitCategory']) )
                {
                   
                    $_SESSION['Category'] =$_POST['Category'];
                    

                }
?>



<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <title>jQuery drag and drop to multiple destinations</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
        <script src="scripts/dragndrop.js"></script>
    </head> 
    
    <body>
    <script src="build/three.min.js"></script>
    <script src="js/libs/stats.min.js"></script>
    <script src="js/Detector.js"></script>

    
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="require-validation" method="post">
<br><br><br>
  <select name="Category">
    <option value="BaseLayer" selected>Base Layer</option>
    <option value="TopLayer">Top Layer</option>
    <option value="Borders" >Borders</option>
    <option value="Topers">Topers</option>
  </select>
 <button class='form-control btn btn-primary submit-button' type='submit' name='submitCategory'>Category</button>

    <br><button class='form-control btn btn-primary submit-button' type='submit' name='submit'>Create Cake</button>
    <button class='form-control btn btn-primary submit-button' type='submit' name='submitview'>View Cake</button>
     <button class='form-control btn btn-primary submit-button' type='submit' name='deletecake'>Delete Cake</button>
      <p>

  

   <?php $colours = array('orange', 'blue', 'green', 'red'); 
        foreach ($colours as $colour) { 
            echo "\t\t<div class='box' id='" . $colour . "'>\n" .
            $display->box($colour) . "\t\t</div>\n";
        } ?>

  </form>
      <!--   <h1>jQuery drag and drop to multiple destinations</h1> -->

   <!--  <input required  type = "text" id ="layer1" name = "layer1" value="0" />
    <input required  type = "text" id ="layer2" name = "layer2" value="0" />
    <input required  type = "text" id ="layer3" name = "layer3" value="0" />


         -->
       




    
    </body>

    <script>

         

            var container, stats;

            var camera, scene, renderer;

            var group;

            var targetRotation = 0;
            var targetRotationOnMouseDown = 0;

            var mouseX = 0;
            var mouseXOnMouseDown = 0;

            var windowHalfX = window.innerWidth / 2;
            var windowHalfY = window.innerHeight / 2;

            init();
            animate();

            function init() {

                container = document.createElement( 'div' );
                document.body.appendChild( container );

                var info = document.createElement( 'div' );
                info.style.position = 'absolute';
                info.style.top = '10px';
                info.style.width = '100%';
                info.style.textAlign = 'center';
                info.innerHTML = 'Simple procedurally generated 3D shapes<br/>Drag to spin';
                container.appendChild( info );

                scene = new THREE.Scene();

                camera = new THREE.PerspectiveCamera( 30, window.innerWidth / window.innerHeight, 20, 1000 );
                camera.position.set( 0, 150, 800 );
                scene.add( camera );

                var light = new THREE.PointLight( 0xffffff, 0.8 );
                camera.add( light );

                group = new THREE.Group();
                group.position.y = 0;
                group.position.x = 0;


                scene.add( group );



                //var material = new THREE.MeshPhongMaterial( {  color: 0xffffff, transparent: true, opacity: 0.5 } );
                //var 2material = new THREE.MeshPhongMaterial( { map: THREE.ImageUtils.loadTexture('textures/rope.jpg') } );

              
               
               
                //group.add( mesh );
                var texture = THREE.ImageUtils.loadTexture( "textures/top3.png" );
                texture.wrapS = texture.wrapT = THREE.RepeatWrapping; 
                texture.repeat.set( 0.007, 0.007 );


                function addShape( shape, extrudeSettings, color, x, y, z, rx, ry, rz, s ) {

                    //var points = shape.createPointsGeometry();
                    //var spacedPoints = shape.createSpacedPointsGeometry( 50 );

                    

                    // 3d shape

                    
                    var geometry = new THREE.ExtrudeGeometry( shape, extrudeSettings );

                    var mesh = new THREE.Mesh( geometry, new THREE.MeshPhongMaterial( {  side: THREE.DoubleSide, color: color,map: texture, ambient: color } ) );
                    mesh.position.set( x, y, z  );
                    mesh.rotation.set( rx, ry, rz );
                    mesh.scale.set( s, s, s );
                    group.add( mesh );



                        // flat shape with texture
                    // note: default UVs generated by ShapeGemoetry are simply the x- and y-coordinates of the vertices
                    //var texture = THREE.ImageUtils.loadTexture( "textures/top2.jpg" );
                   /* var geometry = new THREE.ShapeGeometry( shape );

                    var mesh = new THREE.Mesh( geometry, new THREE.MeshPhongMaterial( {  side: THREE.DoubleSide, map: texture,transparent: true } ) );
                    mesh.position.set( x, y, z - 175 );
                    mesh.rotation.set( rx, ry, rz );
                    mesh.scale.set( s, s, s );
                    group.add( mesh );*/

                    
                    //toper
                                                    // l    h   w
                var geometry = new THREE.CubeGeometry( 40, 40, 1);
                var material = new THREE.MeshPhongMaterial( { map: THREE.ImageUtils.loadTexture('textures/trypic.png'),transparent: true } );
                mesh = new THREE.Mesh(geometry, material );
                mesh.position.x = -75;
                mesh.position.y = 75;
                mesh.position.z = -75;
                group.add( mesh );



                }


                // Heart
/*
                heartShape.moveTo( x + 25, y + 25 );
                heartShape.bezierCurveTo( x + 25, y + 25, x + 20, y, x, y );
                heartShape.bezierCurveTo( x - 30, y, x - 30, y + 35,x - 30,y + 35 );
                heartShape.bezierCurveTo( x - 30, y + 55, x - 10, y + 77, x + 25, y + 95 );
                heartShape.bezierCurveTo( x + 60, y + 77, x + 80, y + 55, x + 80, y + 35 );
                heartShape.bezierCurveTo( x + 80, y + 35, x + 80, y, x + 50, y );
                heartShape.bezierCurveTo( x + 35, y, x + 25, y + 25, x + 25, y + 25 );*/

                var x = 0, y = 0;
                //heart
                var heartShape = new THREE.Shape(); // From http://blog.burlock.org/html5/130-paths
                heartShape.moveTo( x + 25, y + 25 );
                heartShape.bezierCurveTo( x + 25, y + 25, x + 20, y, x, y );
                heartShape.bezierCurveTo( x - 30, y, x - 30, y + 35,x - 30,y + 35 );
                heartShape.bezierCurveTo( x - 30, y + 55, x - 10, y + 77, x + 25, y + 95 );
                heartShape.bezierCurveTo( x + 60, y + 77, x + 80, y + 55, x + 80, y + 35 );
                heartShape.bezierCurveTo( x + 80, y + 35, x + 80, y, x + 50, y );
                heartShape.bezierCurveTo( x + 35, y, x + 25, y + 25, x + 25, y + 25 );
                var extrudeSettingsheart = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 1 };

                //cirlce
                var circleRadius = 80;
                var circleShape = new THREE.Shape();
                circleShape.moveTo( 0, circleRadius );
                circleShape.quadraticCurveTo( circleRadius, circleRadius, circleRadius, 0 );
                circleShape.quadraticCurveTo( circleRadius, -circleRadius, 0, -circleRadius );
                circleShape.quadraticCurveTo( -circleRadius, -circleRadius, -circleRadius, 0 );
                circleShape.quadraticCurveTo( -circleRadius, circleRadius, 0, circleRadius );
                var extrudeSettingsCircleL = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 10 };

                var circleRadiusmid = 60;
                var circleShapemid = new THREE.Shape();
                circleShapemid.moveTo( 0, circleRadiusmid );
                circleShapemid.quadraticCurveTo( circleRadiusmid, circleRadiusmid, circleRadiusmid, 0 );
                circleShapemid.quadraticCurveTo( circleRadiusmid, -circleRadiusmid, 0, -circleRadiusmid );
                circleShapemid.quadraticCurveTo( -circleRadiusmid, -circleRadiusmid, -circleRadiusmid, 0 );
                circleShapemid.quadraticCurveTo( -circleRadiusmid, circleRadiusmid, 0, circleRadiusmid );
                var extrudeSettingsCircleM = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 8 };

                 var circleRadiusS = 40;
                var circleShapeS = new THREE.Shape();
                circleShapeS.moveTo( 0, circleRadiusS );
                circleShapeS.quadraticCurveTo( circleRadiusS, circleRadiusS, circleRadiusS, 0 );
                circleShapeS.quadraticCurveTo( circleRadiusS, -circleRadiusS, 0, -circleRadiusS );
                circleShapeS.quadraticCurveTo( -circleRadiusS, -circleRadiusS, -circleRadiusS, 0 );
                circleShapeS.quadraticCurveTo( -circleRadiusS, circleRadiusS, 0, circleRadiusS );
                var extrudeSettingsCircleS = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 5 };



                    //Rounded rectanglesmall
                    var roundedRectShapesmall = new THREE.Shape();

                ( function roundedRect( ctx, x, y, width, height, radius ){

                    ctx.moveTo( x, y + radius );
                    ctx.lineTo( x, y + height - radius );
                    ctx.quadraticCurveTo( x, y + height, x + radius, y + height );
                    ctx.lineTo( x + width - radius, y + height) ;
                    ctx.quadraticCurveTo( x + width, y + height, x + width, y + height - radius );
                    ctx.lineTo( x + width, y + radius );
                    ctx.quadraticCurveTo( x + width, y, x + width - radius, y );
                    ctx.lineTo( x + radius, y );
                    ctx.quadraticCurveTo( x, y, x, y + radius );

                } )( roundedRectShapesmall, 0, 0, 80, 80, 20 );

                var extrudeSettingssmall = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 5 };
                    


                //Rounded rectanglemid
                var roundedRectShapemid = new THREE.Shape();

                ( function roundedRect( ctx, x, y, width, height, radius ){

                    ctx.moveTo( x, y + radius );
                    ctx.lineTo( x, y + height - radius );
                    ctx.quadraticCurveTo( x, y + height, x + radius, y + height );
                    ctx.lineTo( x + width - radius, y + height) ;
                    ctx.quadraticCurveTo( x + width, y + height, x + width, y + height - radius );
                    ctx.lineTo( x + width, y + radius );
                    ctx.quadraticCurveTo( x + width, y, x + width - radius, y );
                    ctx.lineTo( x + radius, y );
                    ctx.quadraticCurveTo( x, y, x, y + radius );

                } )( roundedRectShapemid, 0, 0, 100, 100, 20 );

                var extrudeSettingsmid = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 8 };
                    
    

                // Rounded rectangle Large

                var roundedRectShape = new THREE.Shape();

                ( function roundedRect( ctx, x, y, width, height, radius ){

                    ctx.moveTo( x, y + radius );
                    ctx.lineTo( x, y + height - radius );
                    ctx.quadraticCurveTo( x, y + height, x + radius, y + height );
                    ctx.lineTo( x + width - radius, y + height) ;
                    ctx.quadraticCurveTo( x + width, y + height, x + width, y + height - radius );
                    ctx.lineTo( x + width, y + radius );
                    ctx.quadraticCurveTo( x + width, y, x + width - radius, y );
                    ctx.lineTo( x + radius, y );
                    ctx.quadraticCurveTo( x, y, x, y + radius );

                } )( roundedRectShape, 0, 0, 150, 150, 20 );

                var extrudeSettings = { amount: 8, bevelEnabled: true, bevelSegments: 2, steps: 2, bevelSize: 1, bevelThickness: 10 };



              

         




                // addShape( shape, color, x, y, z, rx, ry,rz, s );

                
                //   addShape( shape, extrudeSettings,            color,  x,   y, z, rx, ry, rz,s ) 

               


                   /*             $.ajax({
                  url: 'dragdrop.php',
                  type: 'GET',
                  data: 'twitterUsername=jquery4u',
                  success: function(data) {
                    //called when successful
                    $('#ajaxphp-results').html(data);
                  },
                  error: function(e) {
                    //called when there is an error
                    //console.log(e.message);
                  }
                });*/


                /*addShape( roundedRectShape, extrudeSettings,  0x804000, -150, 0, 0, 300, 0, 0, 1 );

                addShape( roundedRectShapemid,extrudeSettingsmid, 0x804000,-125,26, -26, 300, 0, 0, 1 );
                
                addShape( roundedRectShapesmall,extrudeSettingssmall, 0x804000,-115,50, -36, 300, 0, 0, 1 );*/

                //addShape( heartShape,       extrudeSettingsheart, 0xf00000,   -50,  160, -80, 0, 0, Math.PI, 1 );
                
                //

                   /* if(atay=2)
                    {   alert('This is an alert from JavaScript!');
                          addShape( roundedRectShape, extrudeSettings,  0x804000, -150, 0, 0, 300, 0, 0, 1 );
                    }


*/                 
                         //addShape( circleShapeS, extrudeSettingsCircleS, 0x804000,  -75,  50, -75, 300, 0, 0, 1 );
                     //addShape( circleShape,      extrudeSettingsCircleL, 0x804000,  -75,  0, -75, 300, 0, 0, 1 );
                    var layer1 = document.getElementById("layer1").value;
                     var layer2 = document.getElementById("layer2").value;
                      var layer3 = document.getElementById("layer3").value;
                                    //darkwhite:#FFFF99 brown:0x804000
                                //addShape( shape, extrudeSettings,       color,  x,   y, z, rx, ry, rz,s )   
                        if(layer1==2)//large
                    {  
                          addShape( roundedRectShape, extrudeSettings,  0xFFFF99,-150, 0, 0, 300, 0, 0, 1 );
                    }
                        else if(layer1==1)
                   {
                        addShape( circleShape, extrudeSettingsCircleL, 0x804000,  -75,  0, -75, 300, 0, 0, 1 );
                   }else{}

                          if(layer2==2)//Mid
                    {       
                           addShape( roundedRectShapemid,extrudeSettingsmid, 0xFFFF99,-125,26, -26, 300, 0, 0, 1 );
                    }
                        else if(layer2==1)
                    {
                         addShape( circleShapemid, extrudeSettingsCircleM, 0x804000,  -75,  26, -75, 300, 0, 0, 1 );
                    }else{}
                    

                          if(layer3==2)//smalL
                    {  
                         addShape( roundedRectShapesmall,extrudeSettingssmall, 0xFFFF99,-115,50, -36, 300, 0, 0, 1 );
                    } else if(layer3==1)
                    {
                            addShape( circleShapeS, extrudeSettingsCircleS, 0x804000,  -75,  50, -75, 300, 0, 0, 1 );
                    }else{}
                                    
                        

                renderer = new THREE.WebGLRenderer( { antialias: true } );
                renderer.setClearColor( 0xf0f0f0 );
                renderer.setPixelRatio( window.devicePixelRatio );
                renderer.setSize( window.innerWidth, window.innerHeight );
                container.appendChild( renderer.domElement );

                stats = new Stats();
                stats.domElement.style.position = 'absolute';
                stats.domElement.style.top = '0px';
                container.appendChild( stats.domElement );

                document.addEventListener( 'mousedown', onDocumentMouseDown, false );
                document.addEventListener( 'touchstart', onDocumentTouchStart, false );
                document.addEventListener( 'touchmove', onDocumentTouchMove, false );

                //

                window.addEventListener( 'resize', onWindowResize, false );

            }

            function onWindowResize() {

                windowHalfX = window.innerWidth / 2;
                windowHalfY = window.innerHeight / 2;

                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();

                renderer.setSize( window.innerWidth, window.innerHeight );

            }

            //

            function onDocumentMouseDown( event ) {

               // event.preventDefault(); //ako gi comment ky d mo dagan ang dropdownbox

                document.addEventListener( 'mousemove', onDocumentMouseMove, false );
                document.addEventListener( 'mouseup', onDocumentMouseUp, false );
                document.addEventListener( 'mouseout', onDocumentMouseOut, false );

                mouseXOnMouseDown = event.clientX - windowHalfX;
                targetRotationOnMouseDown = targetRotation;

            }

            function onDocumentMouseMove( event ) {

                mouseX = event.clientX - windowHalfX;

                targetRotation = targetRotationOnMouseDown + ( mouseX - mouseXOnMouseDown ) * 0.02;

            }

            function onDocumentMouseUp( event ) {

                document.removeEventListener( 'mousemove', onDocumentMouseMove, false );
                document.removeEventListener( 'mouseup', onDocumentMouseUp, false );
                document.removeEventListener( 'mouseout', onDocumentMouseOut, false );

            }

            function onDocumentMouseOut( event ) {

                document.removeEventListener( 'mousemove', onDocumentMouseMove, false );
                document.removeEventListener( 'mouseup', onDocumentMouseUp, false );
                document.removeEventListener( 'mouseout', onDocumentMouseOut, false );

            }

            function onDocumentTouchStart( event ) {

                if ( event.touches.length == 1 ) {

                    event.preventDefault();

                    mouseXOnMouseDown = event.touches[ 0 ].pageX - windowHalfX;
                    targetRotationOnMouseDown = targetRotation;

                }

            }

            function onDocumentTouchMove( event ) {

                if ( event.touches.length == 1 ) {

                    event.preventDefault();

                    mouseX = event.touches[ 0 ].pageX - windowHalfX;
                    targetRotation = targetRotationOnMouseDown + ( mouseX - mouseXOnMouseDown ) * 0.05;

                }

            }

            //

            function animate() {

                requestAnimationFrame( animate );

                render();
                stats.update();

            }

            function render() {

                group.rotation.y += ( targetRotation - group.rotation.y ) * 0.05;
                renderer.render( scene, camera );

            }
        </script>

</html>