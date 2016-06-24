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
                <label class="btn btn-default exWidth"><input required name="<?php echo $name; ?>"
                                                              value="<?php echo $data[0] ?>"
                                                              type="radio"> <?php echo $data[0] ?> </label>
                <?php

        }
        fclose($handle);
    }
}