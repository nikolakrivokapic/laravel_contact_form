<?php namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail;


class ContactForm extends Controller {

    public function index()
    {

 		 return view('contact');

    }



    public function send()
    {

 		
       $name = Input::get('name');
      $surname = Input::get('surname');
      $email = Input::get('email');
      $message = Input::get('message');
      



     $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
    if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image!\n";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
 //   echo "Sorry, file already exists.\n";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["filetoupload"]["size"] > 800000) {
    echo "Image too large.\n";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//error
} else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
//success
 $pathToFile= "/images/".basename($_FILES["filetoupload"]["name"]);

    } else {
        echo "error.\n";
    }
}



if($email && $name && $surname && $message) {

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
return view('invalidemail');
}

  Mail::raw($message, function($message)
{
    $message->from(Input::get('email'), 'User contact');

    $message->to('nikolakrivokapic84@gmail.com'); //admin email

    $message->attach("images/".basename($_FILES["filetoupload"]["name"]));
}); 



		return view('thankyou');

}
else {
return view('empty');

}


}
 		



}