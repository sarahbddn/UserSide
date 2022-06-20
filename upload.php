<?php namespace ProcessWire;

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$email .= $_REQUEST['email'];

if (isset($_POST['submit']) and isset($_POST['email']) and isset($_POST['comments']) and isset($_FILES) ) {

    //image upload begin
    $upload_path = $config->paths->assets . "files/useruploads/";
    // create the dir if it doesn't exist
    if(!is_dir($upload_path)) wireMkdir($upload_path);
    $user_image = new WireUpload('user_image'); // References the name of the field in the HTML form that uploads the photo

    $user_image->setMaxFiles(5);
    $user_image->setOverwrite(false);
    $user_image->setDestinationPath($upload_path);
    $user_image->setValidExtensions(array('jpg', 'jpeg', 'png', 'gif'));

    // execute upload and check for errors
    $files = $user_image->execute();
    //image upload end

    $to = 'sarah.bedreddine.via@gmail.com';
    $subject = 'Feedback from my site';
    $message = 'Name: ' . $sanitizer->text($input->post->name) . "\r\n\r\n";
    $message .='Email: ' . $sanitizer->email($input->post->email)  . "\r\n\r\n";
    $comments = $sanitizer->entities($sanitizer->textarea($input->post->comments));
    $message .= 'Comments: ' . $comments;

    $success = $email;
    $success .= $message;

    $mail = wireMail();
    $mail->to($to)->from('me@email.com');
    $mail->subject($subject);
    $mail->body($message);
    $mail->attachment($upload_path . $files[0]);
    $mail->send();
}
?>

<html>
<head>
    <meta charset="utf-8" />
</head>
<body>

<form id="option3form" action="./email-with-attachment" method="post" enctype="multipart/form-data">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name">
    <label for="email">Email:  </label>
    <input type="email" name="email" id="email"><br /><br />
    <label for="comments">Comments: </label>
    <textarea name="comments" id="comments"></textarea><br /><br />
    <p>Click the "Choose File" button below to upload your image.</p>
    <input type="file" name="user_image" />
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>