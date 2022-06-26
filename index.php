<!DOCTYPE html>
<html>

<head>
    <title>It Works!</title>
</head>

<body>
    <?php
        spl_autoload_register(function($class_name) {

            $dirs = array(
                'START/', 
                'MODEL/',
                'MODEL/dto', 
                'CONTROLLER/',   
                'CONTROLLER/dao/',
                'CONTROLLER/dto/interface/',
                'SERVICE/',
                'factory/',
                'api/'
            );
            
            foreach( $dirs as $dir ) {
                echo $dir.$class_name.'.php';
                if (file_exists($dir.$class_name.'.php')) {
                    require_once($dir.$class_name.'.php');
                    return;
                }
            }
        });

        $creator = new Creator();
        $creator->create();


    ?>
</body>

</html>