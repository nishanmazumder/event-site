<?php

namespace App\Model;

// include __DIR__."/../traits/Singleton.php";

// use APP\Trait\Singleton;

class Format {

   // use Singleton;

    // Date
    public function dateFormat($time) {
        return date('j M, Y', strtotime($time));
    }

    public function timeFormat($time) {
        return date('h:i a', strtotime($time));
    }

    public function timeFormatDay($time) {
        return date('h:i a, D', strtotime($time));
    }

    // Date Time
    public function timeFm($time) {
        if ($time == 1) {
            return '1.00';
        } elseif ($time == 2) {
            return '2.00';
        } elseif ($time == 3) {
            return '3.00';
        } elseif ($time == 4) {
            return '4.00';
        } elseif ($time == 5) {
            return '5.00';
        } elseif ($time == 6) {
            return '6.00';
        } elseif ($time == 7) {
            return '7.00';
        } elseif ($time == 8) {
            return '8.00';
        } elseif ($time == 9) {
            return '9.00';
        } elseif ($time == 10) {
            return '10.00';
        } elseif ($time == 11) {
            return '11.00';
        } elseif ($time == 12) {
            return '12.00';
        }
    }

    // Event's time count
    public function timeEveCount($time) {
        if ($time == 1) {
            return '01';
        } elseif ($time == 2) {
            return '02';
        } elseif ($time == 3) {
            return '03';
        } elseif ($time == 4) {
            return '04';
        } elseif ($time == 5) {
            return '05';
        } elseif ($time == 6) {
            return '06';
        } elseif ($time == 7) {
            return '07';
        } elseif ($time == 8) {
            return '08';
        } elseif ($time == 9) {
            return '09';
        } elseif ($time == 10) {
            return '10';
        } elseif ($time == 11) {
            return '11';
        } elseif ($time == 12) {
            return '12';
        }
    }

    // Date Name
    public function dateName($name) {
        if ($name == 1) {
            return "JAN";
        } elseif ($name == 2) {
            return "FEB";
        } elseif ($name == 3) {
            return "MAR";
        } elseif ($name == 4) {
            return "APR";
        } elseif ($name == 5) {
            return "MAY";
        } elseif ($name == 6) {
            return "JUN";
        } elseif ($name == 7) {
            return "JUL";
        } elseif ($name == 8) {
            return "AUG";
        } elseif ($name == 9) {
            return "SEP";
        } elseif ($name == 10) {
            return "OCT";
        } elseif ($name == 11) {
            return "NOV";
        } elseif ($name == 12) {
            return "DES";
        }
    }

    // Text limit
    public function textLimit($text, $limt = NULL) {
        $text = $text . " ";
        $text = substr($text, 0, $limt);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "...";
        return $text;
    }

    // Text Validation
    public function validation($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    // Change to Home
    public function title() {
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        $title = str_replace('-', ' ', $title);

        if ($title == 'index') {
            $title = 'home';
        } elseif ($title == 'contact') {
            $title = 'contact';
        }

        return $title = ucwords($title);
    }

    // File Error
    public function fileUploadErr($file) {
        $fileUploadError = array(
            0 => 'There is no error, the file uploaded with success.',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
            3 => 'The uploaded file was only partially uploaded.',
            4 => 'No file was uploaded.',
            6 => 'Missing a temporary folder. Introduced in PHP 5.0.3.',
            7 => 'Failed to write file to disk. Introduced in PHP 5.1.0.',
            8 => 'Extension stopped'
        );
    }

    // Random Token
    function random_token($length_of_string) {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $rand = substr(str_shuffle($str_result), 0, $length_of_string);
        return $rand;
    }

    // User Role

    function userRole($role){
        if($role == 1){
            return 'Admin';
        }elseif ($role == 2) {
            return 'Editor';
        }elseif ($role == 3) {
            return 'Customer';
        }elseif ($role == 4) {
            return 'New User';
        }

        return $role;
    }

}
