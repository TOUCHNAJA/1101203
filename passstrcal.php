<?php
    // เอาความยาวตัวอักษร*8bit แล้วเอาไปเป็นตัวยกกำลังของ2 แล้วหารด้วยความเร็วpc
    $passstgcal = $_POST['password'];
    $passarrcal = array();
    for ( $i = 0 ; $i < strlen($passstgcal) ; $i++ ) { 
        $passarrcal[] = $passstgcal[$i];
    }
    $passarrcotcal = count($passarrcal);
    if ( $passarrcotcal > 10 ) {
        // $multipass = $passarrcotcal*8
        $multipass = $passarrcotcal * 8;
        // $powkeypass = 2^$multipass = keyspace
        $powkeypass = bcpow('2', $multipass, 0);
        // CPU base 5 GHz
        $pow5pow = bcpow('10', '9', 0);
        $cpubase = 5 * $pow5pow;
        // keyspace ตัวตั้ง หารด้วยความเร็วของ CPU
        $cputopass = $powkeypass / $cpubase;
        // echo floor($cputopass);
        // time calculation
        $secon = $cputopass;
        function convertSecToTime($secon) {
            $date1 = new DateTime("@0");
            $date2 = new DateTime("$secon");
            $interval =  date_diff($date1, $date2);
            return $interval->format('%y Years, %m months, %d days, %h hours, %i minutes and %s seconds');
        }
        // echo convertSecToTime($secon);
        $echobrut = convertSecToTime($secon);
    }
?>