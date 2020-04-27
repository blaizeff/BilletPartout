<?php
class Components
{
    public static function showList($data)
    {
        foreach ($data as $value) {
            $Id = $value['id'];
            $Name = $value['title'];
            $Artist = $value['artist'];
            $Location = $value['location'];
            $Date = explode("-", explode(" ", $value['Date'])[0]);
            $month = self::frenchMonth($Date[1]);
            $day = $Date[2];
            $Hour = explode(":", explode(" ", $value['Date'])[1])[0];
            $min =  explode(":", explode(" ", $value['Date'])[1])[1];
            $Desc = $value['description'];
            $IdShow = $value["idShow"];
            echo "<tr><td>
                        <div class=\"listingContainer\">
                            <div style=\"display:grid; grid-template-columns:1fr 1fr;\">
                                <img class=\"showImage\" src=\"/public/images/show/show$IdShow.jpg\">
                                <div style=\"margin-left:15px\">
                                    <h2>$day $month</h2>
                                    <h3>" . $Hour . "h" . $min . "</h3>
                                </div>
                            </div>
                            <div style=\"display:grid; grid-template-columns:3fr 1fr;\">
                                <div style=\"position:relative;\">
                                    <h2>$Name</h2>
                                    <h3>$Artist &bull; $Location</h3>
                                    <div id=\"desc\" class=\"hide\"><h4>$Desc</h4></div>
                                    <i class=\"expand fas fa-chevron-down\"></i>
                                </div>
                                <div>
                                    <a href=\"/show/event-info?id=$Id\"><div class=\"next\">Voir Billets</div></a>
                                </div>
                                </div>
                            </div>
                    </td></tr>";
        }
    }

    public static function frenchMonth($intMonth)
    {
        $month = [
            1 => "Janvier", 2 => "Février", 3 => "Mars", 4 => "Avril", 5 => "Mai", 6 => "Juin", 7 => "Juillet", 8 => "Aout", 9 => "Septembre", 10 => "Octobre", 11 => "Novembre", 12 => "Décembre"
        ];

        foreach ($month as $key => $value) {
            if ($key == $intMonth)
                return $value;
        }
        return "Mois invalide";
    }

    //change key or an array
    //Note: it doesn't change the key in array inside the param array
    public static function change_key($array, $old_key, $new_key)
    {
        if (!array_key_exists($old_key, $array))
            return $array;

        $keys = array_keys($array);
        $keys[array_search($old_key, $keys)] = $new_key;

        return array_combine($keys, $array);
    }

    //return if the input contain a illegal char
    public static function validCharacter($input)
    {
        $charInvalid = ["<", ">", ";", "|", "\"", "'", "/"];

        foreach ($charInvalid as $char) {
            if (strpos($input, $char) === true) {
                return false;
            }
        }
        return true;
    }

    //Note: the input[file] need to have an id named image
    public static function uploadImage($imageFolder, $upload_file_name)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                //First, Validate the file name
                if (empty($_FILES['image']['name'])) {
                    exit;
                }

                //Too long file name
                if (strlen($upload_file_name) > 100) {
                    exit;
                }

                //replace any non-alpha-numeric cracters in th file name
                $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

                //set a limit to the file upload size
                if ($_FILES['image']['size'] > 1000000) {
                    exit;
                }

                //Save the file
                $dest = __DIR__ . '/../public/images/' . $imageFolder . "/" . $upload_file_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
                }
            }
        }
    }

    //Verify is post value is set and not null
    public static function verifyPostValue($array)
    {
        foreach ($array as $item) {
            if (!(isset($_POST[$item]) && $_POST[$item] != '')) {
                return false;
            }
        }
        return true;
    }

    //echo nothing if value is undefined
    public static function dataValExist($data,$value)
    {
        echo array_key_exists($value,$data) ? $value : "";
    }
}
