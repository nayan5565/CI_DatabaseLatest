
<?php

require(APPPATH . 'libraries\MultipartCompress.php');

class CreateZip extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
    }

    

    public function zipArchive() {
        $email = 'nayan5565@gmail.com';
        $domain = strstr($email, '@');


        $user = strstr($email, '@', true); // As of PHP 5.3.0
        $this->load->library('zip');
//        $this->load->library('MultipartCompress');
        $path = "./" . $user . "/";
        $files = get_filenames($path);




        foreach ($files as $f) {
//            echo '<pre>', print_r($files), '</pre>';
            $this->zip->read_file($path . $f, TRUE);
            $fileSize = filesize($path . $f) / 1024;
//
            echo ' file name : ' . $fileSize . '</br>';
        }
        $zip_file = $this->zip->archive("./image3/Download_all_file.zip");

        // download zip file
//        $this->zip->download('Download_all_file');
    }

}


