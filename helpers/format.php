<?php
class Format{
    public function formatDate($date){
        return date('F j, U, g:i a', strtotime($date));
    }
    //các đoạn text ngắn
    public function textShorten($text, $limit = 400)
    {
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,' '));
        $text = $text. ".....";
        return $text;
    }
    //Kiểm tra trống hay k
    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //server
    public function title()
    {
        $path = $ $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path,'.php');
        if($title == 'index')
        {
            $title = 'home';
        }elseif($title == 'contact')
        {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }
}
?>