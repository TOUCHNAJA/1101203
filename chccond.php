<?php // This is pure php file :)

    $passstg = $_POST['password'];
    $passarr = array();
    for ( $i = 0 ; $i < strlen($passstg) ; $i++ ) { 
        $passarr[] = $passstg[$i];
    }
    $passarrcot = count($passarr);
    //echo $passarrcot;
    $passarrnewcot = $passarrcot - 3;
    //echo $passarrnewcot;
    //echo $passarr[0];
    if ( ($passarrcot > 10) && ($passarrcot < 18) ) {
        //echo "I'm in";
        // Component checker

        // lowercase
        $locheck = range('a', 'z');
        for ( $xi = 0 ; $xi < $passarrcot ; $xi++ ) {
            for ( $cxi = 0 ; $cxi <= 26 ; $cxi++ ) {
                if ( $passarr[$xi] == $locheck[$cxi] ) {
                    $locpass = 1;
                    break 2;
                }
            }
        }
        // uppercase
        $upcheck = range('A', 'Z');
        for ( $xi = 0 ; $xi < $passarrcot ; $xi++ ) {
            for ( $cxi = 0 ; $cxi <= 26 ; $cxi++ ) {
                if ( $passarr[$xi] == $upcheck[$cxi] ) {
                    $upcpass = 1;
                    break 2;
                }
            }
        }
        // special char
        $spcheck = array('/', '*', '-', '+', '.', '|', '?', '<', '>', ':', ';', '(', ')', '{', '}', '[', ']', '!', '@', '#', '$', '%', '^', '&', '_');
        $spcon = count($spcheck);
        for ( $xi = 0 ; $xi < $passarrcot ; $xi++ ) {
            for ( $cxi = 0 ; $cxi < $spcon ; $cxi++ ) {
                if ( $passarr[$xi] == $spcheck[$cxi] ) {
                    $spcpass = 1;
                    break 2;
                }
            }
        }
        // num
        $nucheck = range(0, 9);
        for ( $xi = 0 ; $xi < $passarrcot ; $xi++ ) {
            for ( $cxi = 0 ; $cxi < 10 ; $cxi++ ) {
                if ( $passarr[$xi] == $nucheck[$cxi] ) {
                    $nucpass = 1;
                    break 2;
                }
            }
        }

        // Component checker end
        // My Standard Classification

        // Variable format for checking parameter : pc | Class variable | [1 to infinite]Sub-Class variable | con
        // Example : numberic Sorting-Class password condition = $pcsostnumcon
        // Variable = 1 or 0 ONLY

        // Ending of part comment format : Layer number | Class or Sub-Class | end
        // Layer number : 1 to infinite (large to small)
        // Example : ending of Sorting-Class part = 1sostend

        // Class Description comment format : [Class name] Class (Class or Sub-Class variable), end : [Ending of part format]

        /* Class types : 
            Main Class = [Name] Class
            Sub-Class = [ 1 to infinite (large to small) ]-Sub-Class
        */

        // Sorting-Class (sost), end : 1sostend
        // 0-9 or 9-0 1-Sub-Class (This is prototype) (num), end : 2numend
        $numconta = range(0, 9);
        //if ( in_array( $numconta , $passarr ) ) {
            for ( $xi = 0 ; $xi < $passarrnewcot ; $xi++ ) {
                $xi1 = ++$xi;
                $passarrp1 = ++$passarr[$xi];
                $passarrm1 = --$passarr[$xi];
                if ( ($passarr[$xi1] == $passarrp1) 
                    || ($passarr[$xi1] == $passarrm1)
                    || ($passarr[$xi1] == $passarr[$xi]) ) {
                    $pcsostnumcon = 1; // This variable use in parameter
                    //echo "Hello";
                    break 1;
                }
            }
        //}
        // 2numend

        // Alphabet and Keyboard layout 1-Sub-Class (alkl), end : 2alklend 
        $charcontalow = range('a', 'z');
        $charcontaup = range('A', 'Z');
        //if ( (in_array( $charcontalow , $passarr)) || (in_array( $charcontaup , $passarr)) ) {
            // a-z or A-Z or Z-A or z-a or A-z or Z-a 2-Sub-Class (This is prototype) (alphul), end : 3alphulend
            for ( $xi = 0 ; $xi < $passarrnewcot ; $xi++ ) {
                $xi1 = ++$xi;
                $xi2 = $xi + 2;
                for ( $axi = 0 ; $axi < 25 ; $axi++ ) {
                    $axim1 = --$axi;
                    $axim2 = $axi - 2;
                    $axip1 = ++$axi;
                    $axip2 = $axi + 2;
                    if ( ($passarr[$xi] == $charcontalow[$axi]) || ($passarr[$xi] == $charcontaup[$axi]) ) {
                        if ( $axi > 1 ) {
                            if ( ( ($passarr[$xi1] == $charcontalow[$axim1]) && ($passarr[$xi2] == $charcontalow[$axim2]) )
                                || ( ($passarr[$xi1] == $charcontaup[$axim1]) && ($passarr[$xi2] == $charcontaup[$axim2]) ) 
                                || ( ($passarr[$xi1] == $charcontalow[$axim1]) && ($passarr[$xi2] == $charcontaup[$axim2]) )
                                || ( ($passarr[$xi1] == $charcontaup[$axim1]) && ($passarr[$xi2] == $charcontalow[$axim2]) ) ) {
                                $pcsostalklalphulcon = 1;
                                break 2;
                            }
                        }
                        if ( $axi < 24 ) {
                            if ( ( ($passarr[$xi1] == $charcontalow[$axip1]) && ($passarr[$xi2] == $charcontalow[$axip2]) )
                                || ( ($passarr[$xi1] == $charcontaup[$axip1]) && ($passarr[$xi2] == $charcontaup[$axip2]) )
                                || ( ($passarr[$xi1] == $charcontalow[$axip1]) && ($passarr[$xi2] == $charcontaup[$axip2]) )
                                || ( ($passarr[$xi1] == $charcontaup[$axip1]) && ($passarr[$xi2] == $charcontalow[$axip2]) ) ) {
                                $pcsostalklalphulcon = 1;
                                break 2;
                            }
                        }
                    }
                }
            }
            // 3alphulend

            // Keyslider 2-Sub-Class (This is prototype) (kysl), end : 3kyslend
        //  $kblcontanum = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
            $kblcontalow = array(
                             //0    1    2    3    4    5    6    7    8    9
            /* 0 */     array('q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'),
            /* 1 */     array('a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'),
            /* 2 */     array('z', 'x', 'c', 'v', 'b', 'n', 'm')
            );
            $kblcontaup = array(
                             //0    1    2    3    4    5    6    7    8    9
            /* 0 */     array('Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'),
            /* 1 */     array('A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'),
            /* 2 */     array('Z', 'X', 'C', 'V', 'B', 'N', 'M')
            );
            for ( $xi = 0 ; $xi < $passarrnewcot ; $xi++ ) {
                $xi1 = ++$xi;
                $xi2 = $xi + 2;
                for ( $yxi = 0 ; $yxi < 2 ; $yxi++ ) {
                    $yxim1 = --$yxi;
                    $yxim2 = $yxi -2;
                    $yxip1 = ++$yxi;
                    $yxip2 = $yxi + 2;
                    if ( $yxi == '0' ) {
                        for ( $xxi = 0 ; $xxi < 9 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( $xxi < 8 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxi]) && ($passarr[$xi2] == $kblcontalow[$yxip2][$xxi]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxip1][$xxi]) && ($passarr[$xi2] == $kblcontaup[$yxip2][$xxi]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxi]) && ($passarr[$xi2] == $kblcontaup[$yxip2][$xxi]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxip1][$xxi]) && ($passarr[$xi2] == $kblcontalow[$yxip2][$xxi]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                                elseif ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                            if ( ($xxi > 1) && ($xxi < 9) ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxip2][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxip1][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxip2][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxip2][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxip1][$xxim1] && ($passarr[$xi2] == $kblcontalow[$yxip2][$xxim2])) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                            if ( $xxi > 1 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                    elseif ( $yxi == '1' ) {
                        for ( $xxi = 0 ; $xxi < 8 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( $xxi < 7) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                            if ( $xxi > 2 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                    elseif ( $yxi == '2' ) {
                        for ( $xxi = 0 ; $xxi < 6 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxi]) && ($passarr[$xi2] == $kblcontalow[$yxim2][$xxi]) )
                                || ( ($passarr[$xi1] == $kblcontaup[$yxim1][$xxi]) && ($passarr[$xi2] == $kblcontaup[$yxim2][$xxi]) )
                                || ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxi]) && ($passarr[$xi2] == $kblcontaup[$yxim2][$xxi]) )
                                || ( ($passarr[$xi1] == $kblcontaup[$yxim1][$xxi]) && ($passarr[$xi2] == $kblcontalow[$yxim2][$xxi]) )
                                || ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxim2][$xxip2]) )
                                || ( ($passarr[$xi1] == $kblcontaup[$yxim1][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxim2][$xxip2]) )
                                || ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxim2][$xxip2]) )
                                || ( ($passarr[$xi1] == $kblcontaup[$yxim1][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxim2][$xxip2]) ) ) {
                                $pcsostalklkyslcon = 1;
                                break 3;
                            }
                            if ( $xxi > 1 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxim2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxim1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxim2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                            if ( $xxi < 5 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontalow[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontaup[$yxi][$xxip2]) )
                                    || ( ($passarr[$xi1] == $kblcontaup[$yxi][$xxip1]) && ($passarr[$xi2] == $kblcontalow[$yxi][$xxip2]) ) ) {
                                    $pcsostalklkyslcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }
            // 3kyslend

            // Character Repeater (chrp), end : 3chrpend
            $charcontalow = range('a', 'z');
            $charcontaup = range('A', 'Z');
            for ( $xi = 0 ; $xi < $passarrnewcot ; $xi++ ) {
                $xi1 = ++$xi;
                $xi2 = $xi + 2;
                for ( $axi = 0 ; $axi < 25 ; $axi++ ) {
                    if ( ( ($passarr[$xi] == $charcontalow[$axi]) || ($passarr[$xi] == $charcontaup[$axi]) )
                        && ( ($passarr[$xi1] == $charcontalow[$axi]) || ($passarr[$xi1] == $charcontaup[$axi]) )
                        && ( ($passarr[$xi2] == $charcontalow[$axi]) || ($passarr[$xi2] == $charcontaup[$axi]) ) ) {
                        $pcsostalklchrpcon = 1;
                        break 2;
                    }
                }
            }
            // 3chrpend

            // Key zigzag 2-Sub-Class (This is prototype) (kyzz), end : 3kyzzend
            // This part use $kblcontalow and $kblcontaup as layout
            for ( $xi = 0 ; $xi < $passarrnewcot ; $xi++ ) {
                $xi1 = ++$xi;
                $xi2 = $xi + 2;
                $xi3 = $xi + 3;
                for ( $yxi = 0 ; $yxi < 2 ; $yxi++ ) {
                    $yxim1 = --$yxi;
                    $yxim2 = $yxi -2;
                    $yxip1 = ++$yxi;
                    $yxip2 = $yxi + 2;
                    if ( $yxi == '0' ) {
                        for ( $xxi = 0 ; $xxi < 9 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( $xxi < 8) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxi]) || ($passarr[$xi1] == $kblcontaup[$yxip1][$xxi]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxip1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxip1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxip1][$xxip1]) || ($passarr[$xi3] == $kblcontaup[$yxip1][$xxip1]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                            }
                            if ( $xxi > 1 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxim1]) || ($passarr[$xi1] == $kblcontaup[$yxip1][$xxim1]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxim1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxim1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxip1][$xxim2]) || ($passarr[$xi3] == $kblcontaup[$yxip1][$xxim2]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                    elseif ( $yxi == '1' ) {
                        for ( $xxi = 0 ; $xxi < 8 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( $xxi < 8 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxip1]) || ($passarr[$xi1] == $kblcontaup[$yxim1][$xxip1]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxip1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxip1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxim1][$xxip2]) || ($passarr[$xi3] == $kblcontaup[$yxim1][$xxip2]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                                if ( $xxi < 6 ) {
                                    if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxi]) || ($passarr[$xi1] == $kblcontaup[$yxip1][$xxi]) )
                                        && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxip1]) || ($passarr[$xi2] == $kblcontalow[$yxi][$xxip1]) )
                                        && ( ($passarr[$xi3] == $kblcontalow[$yxip1][$xxip1]) || ($passarr[$xi3] == $kblcontalow[$yxip1][$xxip1]) ) ) {
                                        $pcsostalklkzzlcon = 1;
                                        break 3;
                                    }
                                }
                                if ( $xxi > 1) {
                                    if ( ( ($passarr[$xi1] == $kblcontalow[$yxip1][$xxim1]) || ($passarr[$xi1] == $kblcontaup[$yxip1][$xxim1]) )
                                        && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxim1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxim1]) )
                                        && ( ($passarr[$xi3] == $kblcontalow[$yxip1][$xxim2]) || ($passarr[$xi3] == $kblcontaup[$yxip1][$xxim2]) ) ) {
                                        $pcsostalklkzzlcon = 1;
                                        break 3;
                                    }
                                }
                            }
                            if ( $xxi > 0) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxi]) || ($passarr[$xi1] == $kblcontaup[$yxim1][$xxi]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxim1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxim1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxim1][$xxim1]) || ($passarr[$xi3] == $kblcontaup[$yxim1][$xxim1]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                    elseif ( $yxi == '2' ) {
                        for ( $xxi = 0 ; $xxi < 6 ; $xxi++ ) {
                            $xxim1 = --$xxi;
                            $xxim2 = $xxi - 2;
                            $xxip1 = ++$xxi;
                            $xxip2 = $xxi + 2;
                            if ( $xxi > 0 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxi]) || ($passarr[$xi1] == $kblcontaup[$yxim1][$xxi]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxim1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxim1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxim1][$xxim1]) || ($passarr[$xi3] == $kblcontaup[$yxim1][$xxim1]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                            }
                            if ( $xxi < 6 ) {
                                if ( ( ($passarr[$xi1] == $kblcontalow[$yxim1][$xxip1]) || ($passarr[$xi1] == $kblcontaup[$yxim1][$xxip1]) )
                                    && ( ($passarr[$xi2] == $kblcontalow[$yxi][$xxip1]) || ($passarr[$xi2] == $kblcontaup[$yxi][$xxip1]) )
                                    && ( ($passarr[$xi3] == $kblcontalow[$yxim1][$xxip2]) || ($passarr[$xi3] == $kblcontaup[$yxim1][$xxip2]) ) ) {
                                    $pcsostalklkzzlcon = 1;
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }
            // 3kyzzend

            // 2alklend

            // 1sostend

            // Vocabulary-Class (vcbd), end : 1vcbdend
            // use vocabdb (database) : vocabtb (table)
            // column : onlyvocab
            include("connectdb.php");
            for ( $xi = 0 ; $xi < $passarrcot ; $xi++) {
                for ( $voxi = 1 ; $voxi < $passarrcot ; $voxi++ ) {
                    $vocaspt = str_split($passstg, $voxi);
                    $vocasptcot = count($vocaspt);
                    for ( $vnxi = 0 ; $vnxi < $vocasptcot ; $vnxi++ ) {
                        $sql_select = "SELECT * FROM vocabtb WHERE onlyvocab='$vocaspt[$vnxi]'" or die("Error:" . mysqli_error());
                        $result = mysqli_query($conn, $sql_select);
                        $cont = 1;
                        while($rs = mysqli_fetch_array($result)) {
                            $cont--;
                        }
                        if ( $cont == 0 ) {
                            $pcvcbdcon = 1;
                            break 3;
                        }
                    }
                }
            }

            //1vcbdend

            // // Sensitive Numberic-Class (snum), end : 1snumend

            // // Telephone Number 2-Sub-Class (tlnm), end : 2tlnmend
            // $telepref1 = 0;
            // $telepref2 = array('6', '8', '9');
            // //$telepref3 = range(0, 9);
            // $passarr10cot = $passarrcot - 9;
            // for ( $xi = 0 ; $xi < $passarr10cot ; $xi++) {
            //     $xi1 = ++$xi;
            //     $xi2 = $xi + 2;
            //     $xi3 = $xi + 3;
            //     $xi4 = $xi + 4;
            //     $xi5 = $xi + 5;
            //     $xi6 = $xi + 6;
            //     $xi7 = $xi + 7;
            //     $xi8 = $xi + 8;
            //     $xi9 = $xi + 9;
            //     if ( $passarr[$xi] == $telepref1 ) {
            //         for ( $t2i = 0 ; $t2i < 3 ; $t2i++ ) {
            //             if ( $passarr[$xi1] == $telepref2[$t2i] ) {
            //                 if ( is_numeric($passarr[$xi2]) ) {
            //                     if ( (is_numeric($passarr[$xi3]))
            //                         && (is_numeric($passarr[$xi4])) 
            //                         && (is_numeric($passarr[$xi5]))
            //                         && (is_numeric($passarr[$xi6]))
            //                         && (is_numeric($passarr[$xi7]))
            //                         && (is_numeric($passarr[$xi8]))
            //                         && (is_numeric($passarr[$xi9])) ) {
            //                         $pcsnumtlnmcon = 1;
            //                         break 2;
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }
            // // 2tlnmend

            // // Calendar 2-Sub-Class (cldr), end : 2cldrend
            // $dayn1 = array('0', '1', '2', '3');
            // // $dayn2 = range(0, 9);
            // $monn1 = array('0', '1');
            // // $monn2 = range(0, 9);
            // // $yrnm1 = range(0, 9);
            // // $yrnm2 = range(0, 9);
            // // $yrnm3 = range(0, 9);
            // // $yrnm4 = range(0, 9);
            // $passarr8cot = $passarrcot - 7;
            // for ( $xi = 0 ; $xi < $passarr8cot ; $xi++) {
            //     $xi1 = ++$xi;
            //     $xi2 = $xi + 2;
            //     $xi3 = $xi + 3;
            //     $xi4 = $xi + 4;
            //     $xi5 = $xi + 5;
            //     $xi6 = $xi + 6;
            //     $xi7 = $xi + 7;
            //     if ( (is_numeric($passarr[$xi]))
            //         && (is_numeric($passarr[$xi1]))
            //         && (is_numeric($passarr[$xi2]))
            //         && (is_numeric($passarr[$xi3]))
            //         && (is_numeric($passarr[$xi4]))
            //         && (is_numeric($passarr[$xi5]))
            //         && (is_numeric($passarr[$xi6]))
            //         && (is_numeric($passarr[$xi7])) ) {
            //     // formats
            //     // DMY
            //         for ( $d1i = 0 ; $d1i < 4 ; $d1i++) {
            //             if ( ($passarr[$xi] == $dayn1[$d1i]) && (is_numeric($passarr[$xi1])) ) {
            //                 for ( $m1i = 0 ; $m1i < 2 ; $m1i++ ) {
            //                     if ( ($passarr[$xi2] == $monn1[$m1i]) && (is_numeric($passarr[$xi3])) ) {
            //                         if ( (is_numeric($passarr[$xi4]))
            //                             && (is_numeric($passarr[$xi5]))
            //                             && (is_numeric($passarr[$xi6]))
            //                             && (is_numeric($passarr[$xi7])) ) {
            //                             $pcsnumcldrcon = 1;
            //                             break 3;
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //         // YMD
            //         if ( (is_numeric($passarr[$xi]))
            //             && (is_numeric($passarr[$xi1]))
            //             && (is_numeric($passarr[$xi2]))
            //             && (is_numeric($passarr[$xi3])) ) {
            //             for ( $m1i = 0 ; $m1i < 2 ; $m1i++ ) {
            //                 if ( ($passarr[$xi4] == $monn1[$m1i]) && (is_numeric($passarr[$xi5])) ) {
            //                     for ( $d1i = 0 ; $d1i < 4 ; $d1i++) {
            //                         if ( ($passarr[$xi6] == $dayn1[$d1i]) && (is_numeric($passarr[$xi7])) ) {
            //                             $pcsnumcldrcon = 1;
            //                             break 3;
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //         // MDY
            //         for ( $m1i = 0 ; $m1i < 2 ; $m1i++ ) {
            //             if ( ($passarr[$xi] == $monn1[$m1i]) && (is_numeric($passarr[$xi1])) ) {
            //                 for ( $d1i = 0 ; $d1i < 4 ; $d1i++) {
            //                     if ( ($passarr[$xi2] == $dayn1[$d1i]) && (is_numeric($passarr[$xi3])) ) {
            //                         if ( (is_numeric($passarr[$xi4]))
            //                             && (is_numeric($passarr[$xi5]))
            //                             && (is_numeric($passarr[$xi6]))
            //                             && (is_numeric($passarr[$xi7])) ) {
            //                             $pcsnumcldrcon = 1;
            //                             break 3;
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }
            // // 2cldrend

            // // 1snumend

        //}
        // Condition Checker
        if ( (isset($pcsostalklalphulcon))
        || (isset($pcsostalklkyslcon))
        || (isset($pcsostalklkzzlcon))
        || (isset($pcsostnumcon))
        || (isset($pcvcbdcon))
        || (isset($pcsostalklchrpcon))
        || (isset($pcsnumtlnmcon))
        || (isset($pcsnumcldrcon))
        || (!isset($locpass))
        || (!isset($upcpass))
        || (!isset($spcpass))
        || (!isset($nucpass)) ) {
            if ( (isset($pcsostalklalphulcon))
            || (isset($pcsostalklkyslcon))
            || (isset($pcsostalklkzzlcon))
            || (isset($pcsostnumcon))
            || (isset($pcvcbdcon))
            || (isset($pcsostalklchrpcon))
            || (isset($pcsnumtlnmcon))
            || (isset($pcsnumcldrcon)) ) {
                if ( isset($pcsostalklalphulcon) ) {
                    // alphabets
                    //echo "<br>" . "Warning : Alphabetize? a,b,c,...,z? Try harder." . "<br>";
                    $echoalb = "Warning : Alphabetize? a,b,c,...,z? Try harder.";
                }
                if ( isset($pcsostalklkyslcon) ) {
                    // sorting keyboard layout
                    //echo "<br>" . "Warning : Did you slide the keyboard for your password? It seems complicated for Brute Force attack, but not for us. (ex. qwerty)" . "<br>";
                    $echoskl = "Warning : Did you slide the keyboard for your password? It seems complicated for Brute Force attack, but not for us. (ex. qwerty)";
                }
                if ( isset($pcsostalklkzzlcon) ) {
                    // zigzag keyboard layout
                    //echo "<br>" . "Warning : Did you just zigzag your finger? Sorry, we knew those patterns. (ex. qawsed)" . "<br>";
                    $echozzk = "Warning : Did you just zigzag your finger? Sorry, we knew those patterns. (ex. qawsed)";
                }
                if ( isset($pcsostnumcon) ) {
                    // ตัวเลข
                    //echo "<br>" . "Warning : Don't use these patterns in your password, please. Patterns : 123456... or 1111122222... or 987654..." . "<br>";
                    $echonms = "Warning : Don't use these patterns in your password, please. Patterns : 123456... or 1111122222... or 987654...";
                }
                if ( isset($pcvcbdcon) ) {
                    // คำศัพท์
                    //echo "<br>" . "Warning : Which dictionary did you just use? Your password contains vocabulary. (Vocabulary)" . "<br>";
                    $echovcb = "Warning : Which dictionary did you just use? Your password contains vocabulary. (Vocabulary)";
                }
                if ( isset($pcsostalklchrpcon) ) {
                    // repeater
                    //echo "<br>" . "Warning : Repeat your characters are pretty easy right? No please. (ex. aaa or bbb or zzz)" . "<br>";
                    $echorpt = "Warning : Repeat your characters are pretty easy right? No please. (ex. aaa or bbb or zzz)";
                }
                // if ( isset($pcsnumtlnmcon) ) {
                //     // phone num
                //     echo "Hello7";
                // }
                // if ( isset($pcsnumcldrcon) ) {
                //     // calendar
                //     echo "Hello8";
                // }
            }
            if ( (!isset($locpass))
                || (!isset($upcpass))
                || (!isset($spcpass))
                || (!isset($nucpass)) ) {
                    if ( !isset($locpass) ) {
                        $echoloc = "Do not have lowercase(a,b,c,...,z)";
                    }
                    if ( !isset($upcpass) ) {
                        $echoupc = "Do not have uppercase(A,B,C,...,Z)";
                    }
                    if ( !isset($spcpass) ) {
                        $echospc = "Do not have special characters(/, *, -, +, ., |, ?, <, >, :, ;, (, ), {, }, [, ], !, @, #, $, %, ^, &, _)";
                    }
                    if ( !isset($nucpass) ) {
                        $echonuc = "Do not have numbers(1,2,3,...,9)";
                    }
            }
        }
        else {
            //echo "<br>" . "Your password is STONK. ༼ つ ͡° ͜ʖ ͡° ༽つ FOR US (▀̿Ĺ̯▀̿ ̿) " . "<br>";
            $echopaspas = "You shall pass. ༼ つ ͡° ͜ʖ ͡° ༽つ FOR US (▀̿Ĺ̯▀̿ ̿) ";
        }
    }
    else {
        
        // False number of characters for password
        //echo "<br>" . "Password length : more than 10 characters and less than 18 characters." . "<br>";
        $echolen = "Password length : more than 10 characters and less than 18 characters.";

    }
    //echo "This mean it was success.";
?>