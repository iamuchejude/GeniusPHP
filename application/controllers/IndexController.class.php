<?php
    class IndexController {
        protected $loader;

        public function __construct() {
            // Construct Function
            $this->loader = new Loader();
        }

        public function indexAction() {
            $this->loader->view('header/index');
            $this->loader->view('index');
            $this->loader->view('footer/index');
        }

        public function aboutAction() {
            $this->loader->view('header/index');
            $this->loader->view('about');
            $this->loader->view('footer/index');
        }

        public function contactAction() {
            $this->loader->view('header/index');
            $this->loader->view('contact');
            $this->loader->view('footer/index');
        }
    }
?>