<?php
class Components
{
    public static function showList($data)
    {
        foreach ($data as $value) {
            $Id = $value['Id'];
            $Name = $value['Title'];
            $Artist = $value['Artist'];
            $Location = $value['Location'];
            $Date = explode("-", explode(" ", $value['Date'])[0]);
            $month = self::frenchMonth($Date[1]);
            $day = $Date[2];
            $Hour = explode(" ", $value['Date'])[1];
            $Desc = $value['description'];
            $IdShow = $value["IdShow"];
            echo "<tr><td>
                        <div class=\"listingContainer\">
                            <div style=\"display:grid; grid-template-columns:1fr 1fr;\">
                                <img class=\"showImage\" src=\"/public/images/show/show$IdShow.jpg\">
                                <div style=\"margin-left:15px\">
                                    <h2>$day $month</h2>
                                    <h3>$Hour</h3>
                                </div>
                            </div>
                            <div style=\"display:grid; grid-template-columns:3fr 1fr;\">
                                <div style=\"position:relative;\">
                                    <h2>$Name</h2>
                                    <h3>$Artist &bull; $Location</h3>
                                    <div id=\"desc\" class=\"hide\"><h4>$Desc</h4></div>
                                    <i class=\"expand fas fa-chevron-down\"></i>
                                </div>
                                <div style=\"text-align:right; display:flex; justify-content:flex-end;align-items:center;\">
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
}
