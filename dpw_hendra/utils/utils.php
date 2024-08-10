<?php
    function show_option($values) {
        for ($i=0; $i < count($values); $i++) {
            echo "<option value='$values[$i]'>$values[$i]</option>";
        }
    }
?>