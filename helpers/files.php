<?php

/** get file list and show it in the radio
 *
 * @param $name
 * @param $dataFolder
 */
function get_file($name, $dataFolder) {
    if (($handle = fopen($dataFolder . "/" . $name . ".csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle))) {
                ?>
                <div class="radio-btn"><input required name="<?php echo $name; ?>"
                    value="<?php echo $data[0] ?>"
                    type="radio"> <?php echo $data[0] ?>
                    </div>
                <?php

        }
        fclose($handle);
    }
}
