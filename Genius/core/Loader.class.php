<?php
    class Loader {
        // Load library classes
        
        // loader helper functions. Naming conversion is xxx_library.php;
        public function library($lib) {
            include LIB_PATH . "{$lib}_library.php";
        }
    
        // loader helper functions. Naming conversion is xxx_helper.php;
        public function helper($helper) {
            include HELPER_PATH . "{$helper}_helper.php";
        }

        // loader helper functions. Naming conversion is xxx_view.php;
        public  function view($view) {
            include CURRENT_VIEW_PATH."{$view}_view.php";
        }
    }
?>