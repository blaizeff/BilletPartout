<?php
class Components
{
    public static function showList($data)
    {
        foreach ($data as $value) {
            $Id = $value['id'];
            $Name = $value['title'];
            $Artist = $value['artist'];
            $Location = $value['venueName'];
            $Date = explode("-", explode(" ", $value['Date'])[0]);
            $month = self::frenchMonth($Date[1]);
            $day = $Date[2];
            $Hour = explode(":", explode(" ", $value['Date'])[1])[0];
            $min =  explode(":", explode(" ", $value['Date'])[1])[1];
            $Desc = $value['description'];
            $basePrice = $value["basePrice"];
            $IdShow = $value["idShow"];
            echo "<tr><td>
                        <div class=\"listingContainer\">
                            <div style=\"display:grid; grid-template-columns:1fr 1fr;\">
                                <img class=\"showImage\" src=\"" . $_SERVER['basePath'] . "public/images/show/show$IdShow.jpg\">
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
                                <div style='text-align:right; display:flex; justify-content:flex-end;align-items:center;'>
                                    <a href=\"event-info?id=$Id\" ><div class=\"next\">À partir de $basePrice$</div></a>
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
    //Note: it doesn't change the key in array inside the param array. Use Change_keys instead
    public static function change_key($array, $old_key, $new_key)
    {
        if (!array_key_exists($old_key, $array))
            return $array;

        $keys = array_keys($array);
        $keys[array_search($old_key, $keys)] = $new_key;

        return array_combine($keys, $array);
    }

    //Change Multiple keys in a sub array
    public static function change_arrayKeys($data, $new_keys)
    {
        $result = array();
        foreach ($data as $row) {
            foreach ($new_keys as $key => $value) {
                $row = self::change_key($row, $key, $value);
            }
            $result[] = $row;
        }
        return $result;
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
    public static function dataValExist($data, $value)
    {
        echo array_key_exists($value, $data) ? $value : "";
    }
    public static function showFilterOptions()
    {
        echo '<select onchange="location = this.value" class="form-control customSelect custom-select">
                <option ' . self::filterSelected('') . ' value="list?' . self::buildGetURL('search', '') . '">Date</option>
                <option ' . self::filterSelected('nameA-Z') . " value=list?" . self::buildGetURL('order', 'nameA-Z') . '>Nom A-Z</option>
                <option ' . self::filterSelected('nameZ-A') . " value=list?" . self::buildGetURL('order', 'nameZ-A') . '>Nom Z-A</option>
            </select>';
    }
    private static function filterSelected($value)
    {
        if (isset($_GET['order']) && $_GET['order'] == $value) {
            return 'selected=""';
        }
    }

    public static function buildGetURL($key, $value)
    {
        $query = $_GET;
        unset($query['url']);
        $query[$key] = $value;
        return http_build_query($query);
    }
    public static function showMenuCategory()
    {
        require_once("./models/Show.php");
        $isMenu = true;
        $show = new Show();
        $html = "";
        $categories = $show->getAllCategory();
        foreach ($categories as $item) {
            $html .= "<a style='font-size:18' href=list?" . self::buildGetURL('category', $item['id']) . ">" . $item["value"] . "</a>";
        }
        return $html;
    }
    public static function showMainMenuCategory()
    {
        require_once("./models/Show.php");
        $isMenu = true;
        $show = new Show();
        $html = "";
        $categories = $show->getAllCategory();
        foreach ($categories as $item) {
            $html .= "<div class='menuOption' style='font-size:18' href=list?" . self::buildGetURL('category', $item['id']) . ">" . $item["value"] . "</div>";
        }
        return $html;
    }
    public static function showMainMenuCategoryButtons()
    {
        require_once("./models/Show.php");
        $isMenu = true;
        $show = new Show();
        $html = "";
        $categories = $show->getAllCategory();
        foreach ($categories as $item) {
            $html .= "<a class='categoryButton' style='font-size:18' href=/show/list?" . self::buildGetURL('category', $item['id']) . ">" . $item["value"] . "</a>";
        }


    public static function SectionList($sections)
    {
        $html = '<table>
        <tr>
            <th>Nom de la section</th>
            <th>Ratio Prix</th>
            <th>Couleur</th>
            <th>Capacité</th>
            <th></th>
        </tr>
        <tr>
            <td><input type="text" name="addSection[name]" class="form-control custominput"></td>
            <td><input type="number" name="addSection[priceRatio]" class="form-control custominput"></td>
            <td><input type="text" name="addSection[color]" class="form-control custominput"></td>
            <td><input type="number" name="addSection[capacity]" class="form-control custominput"></td>
            <td><button type="submit" class="btn btn-primary green">Ajouter</button> </td>
        </tr>';

        if (!empty($sections)) {

            foreach ($sections as $section) {
                $html .= '<tr>
            <td><input type="text" name="section' . $section["idSection"] . '[]" class="form-control customInputHidden" value=' . $section["name"] . '></td>
            <th><input type="text" name="section' . $section["idSection"] . '[]" class="form-control customInputHidden" value=' . $section["priceRatio"] . '></th>
            <th><input type="text" name="section' . $section["idSection"] . '[]" class="form-control customInputHidden" value=' . $section["color"] . '></th>
            <th><input type="text" name="section' . $section["idSection"] . '[]" class="form-control customInputHidden" value=' . $section["capacity"] . '></th>
            <td><button type="submit" onclick="deleteSection(' . $section["idSection"] . ')"class="btn btn-danger ">Supprimer</button></td>
            </tr>';
            }
        }

        $html .= '</table>';
        return $html;
    }
}
