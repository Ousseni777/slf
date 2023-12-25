<?php

//*****************************************************************************

// Copyright 2002 by A J Marston http://www.tonymarston.net

// Distributed under the GNU General Public Licence

//*****************************************************************************



//

// Calculate interest rate and produce loan amortisation schedule.

//

// This will accept any 3 of the 4 components of the calculation,

// calculate the missing component, then produce a repayment schedule

// showing the split between interest and principle for each payment.



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd>

<html>

<head>

    <title>Loan Amortisation Schedule</title>

    <meta http-equiv='Content-type' content='text/html; charset=UTF-8'>

    <style type="text/css">
        P.error {
            margin-top: 0pt;
            color: red;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div align="center">

        <h1>Loan Amortisation Schedule</h1>





        <?php

        session_start();
        // look for no POST entries, or the RESET button
        
        if (count($_POST) == 0 or @$_POST['reset']) {



            // POST array is empty - set initial values
        
            $principal = 484411.01;

            $number = isset($_SESSION['Pagos']) ? $_SESSION['Pagos'] : 0; // Set initial value of $number
        
            $rate = isset($_SESSION['TINT']) ? $_SESSION['TINT'] : 0;

            $payment = 28242.11;

            $Date_debut = date('y-m-d');

            $Date_fin = date('y-m-d');

            $R_Value = $principal * 1 / 100;



        } else {

            // retrieve values from POST array
        
            $principal = $_POST['principal'];

            $number = isset($_SESSION['Pagos']) ? $_SESSION['Pagos'] : 0;

            $rate = isset($_SESSION['TINT']) ? $_SESSION['TINT'] : 0;

            $payment = $_POST['payment'];

            $Date_debut = date($_POST['Date_debut']);

            $Date_fin = date($_POST['Date_fin']);

            $R_Value = $_POST['R_Value'];

        } // if
        
        // validate all fields
        
        $error = array();

        if (!empty($principal)) {

            if (!is_numeric($principal)) {

                $error['principal'] = "must be numeric";

            } elseif ($principal < 0) {

                $error['principal'] = "must be > zero";

            } else {

                $principal = (float) $principal;    // convert to floating point
        
            } // if
        
        } // if
        


        if (!empty($number)) {

            if (!preg_match('/^[0-9]+$/', $number)) {

                $error['number'] = "must be an integer";

            } else {

                $number = (int) $number;    // convert to integer
        
            } // if
        
        } // if
        


        if (!empty($rate)) {

            if (!is_numeric($rate)) {

                $error['rate'] = "must be numeric";

            } elseif ($rate < 0) {

                $error['rate'] = "must be >= zero";

            } else {

                $rate = (float) $rate;    // convert to floating point
        
            } // if
        
        } // if
        


        if (!empty($payment)) {

            if (!is_numeric($payment)) {

                $error['payment'] = "must be numeric";

            } elseif ($payment < 0) {

                $error['payment'] = "must be > zero";

            } else {

                $payment = (float) $payment;    // convert to floating point
        
            } // if
        
        } // if
        
        if (!empty($R_Value)) {

            if (!is_numeric($R_Value)) {

                $error['R_Value'] = "must be numeric";

            } elseif ($R_Value < 0) {

                $error['R_Value'] = "must be > zero";

            } else {

                $R_Value = (float) $R_Value;    // convert to floating point
        
            } // if
        

        } //
        
        if (count($error) == 0) {

            // no errors - perform requested action
        
            if (isset($_POST['button1'])) {

                $principal = calc_principal($number, $rate, $payment);

            } // if
        
            if (isset($_POST['button2'])) {

                $number = calc_number($principal, $rate, $payment);

            } // if
        
            if (isset($_POST['button3'])) {

                $rate = calc_rate($principal, $number, $R_Value, $payment);

            } // if
        
            if (isset($_POST['button4'])) {

                $payment = calc_payment($principal, $number, $rate, $R_Value, 2);

            } // if
        
            if (isset($_POST['button7'])) {

                $number = calc_periode($Date_debut, $Date_fin);

            } // if
        
        } // if
        
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <table border="1">

                <colgroup align="right">

                    <colgroup align="left">

                        <colgroup align="center">

                        <tr>

                            <td>Principal</td>
                            <td><input type="text" name="principal" value="<?php echo $principal ?>">

                                <?php

                                if (isset($error['principal'])) {

                                    echo '<p class="error">' . $error['principal'] . '</p>';

                                } // if
                                
                                ?>

                            </td>
                            <td><input type="submit" name="button1" value="calculate Principal"></td>

                        </tr>

                    <tr>

                        <td>Number of Payments</td>
                        <td><input type="text" name="number" value="<?php echo $number ?>">

                            <?php

                            if (isset($error['number'])) {

                                echo '<p class="error">' . $error['number'] . '</p>';

                            } // if
                            
                            ?>

                        </td>
                        <td><input type="submit" name="button2" value="calculate Number "></td>

                    </tr>

                <tr>

                    <td>Interest Rate (%) per Payment</td>
                    <td><input type="text" name="rate" value="<?php echo $rate ?>">

                        <?php

                        if (isset($error['rate'])) {

                            echo '<p class="error">' . $error['rate'] . '</p>';

                        } // if
                        
                        ?>

                    </td>
                    <td><input type="submit" name="button3" value="calculate Interest  "></td>

                </tr>

                <tr>

                    <td>Payment</td>
                    <td><input type="text" name="payment" value="<?php echo $payment ?>">

                        <?php

                        if (isset($error['payment'])) {

                            echo '<p class="error">' . $error['payment'] . '</p>';

                        } // if
                        
                        ?>

                    </td>
                    <td><input type="submit" name="button4" value="calculate Payment"></td>

                </tr>

                <tr>

                    <td>Date_debut</td>
                    <td><input type="date" name="Date_debut" value="<?php echo $Date_debut ?>">



                        <?php

                        if (isset($error['date_debut'])) {

                            echo '<p class="error">' . $error['date_debut'] . '</p>';

                        } // if
                        
                        ?>

                    </td>
                    <td><input type="submit" name="button7" value="calculate  Periode"></td>

                </tr>

                <tr>

                    <td>Date_fin</td>
                    <td><input type="date" name="Date_fin" value="<?php echo $Date_fin ?>">

                        <?php

                        if (isset($error['date_fin'])) {

                            echo '<p class="error">' . $error['date_fin'] . '</p>';

                        } // if
                        
                        ?>

                </tr>

                <tr>

                    <td>Residual value</td>
                    <td><input type="text" name="R_Value" value="<?php echo $R_Value ?>">

                        <?php

                        if (isset($error['R_Value'])) {

                            echo '<p class="error">' . $error['R_Value'] . '</p>';

                        } // if
                        
                        ?>

                </tr>

                </td>

            </table>

            <p><input type="submit" name="reset" value="reset">&nbsp;&nbsp;&nbsp;<input type="submit" name="button5"
                    value="Payment Schedule">&nbsp;&nbsp;<input type="submit" name="button6" value="Intégrer données"
                    </p>

        </form>



        <?php

        if (isset($_POST['button5'])) {

            print_schedule($Date_debut, $principal, $rate, $payment, $number);

        } // if
        
        ?>

        <?php

        if (isset($_POST['button6'])) {

            print_click($Date_debut, $principal, $rate, $payment, $number);

        }

        ?>

    </div>

</body>

</html>



<?php

function calc_principal($payno, $int, $pmt)
{

    // check that required values have been supplied

    if (empty($payno)) {

        echo "<p class='error'>a value for NUMBER of PAYMENTS is required</p>";

        exit;

    } // if

    if (empty($int)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (empty($pmt)) {

        echo "<p class='error'>a value for PAYMENT is required</p>";

        exit;

    } // if



    // now do the calculation using this formula:



    //******************************************

    //             ((1 + INT) ** PAYNO) - 1

    // PV = PMT * --------------------------

    //            INT * ((1 + INT) ** PAYNO)

    //******************************************



    $int = $int / 100;        //convert to percentage

    $value1 = (pow((1 + $int), $payno)) - 1;

    $value2 = $int * pow((1 + $int), $payno);

    $pv = $pmt * ($value1 / $value2);

    $pv = number_format($pv, 2, ".", "");



    return $pv;



} // calc_principal ==================================================================



function calc_number($pv, $int, $pmt)
{

    // check that required values have been supplied

    if (empty($pv)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($int)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (empty($pmt)) {

        echo "<p class='error'>a value for PAYMENT is required</p>";

        exit;

    } // if



    // now do the calculation using this formula:



    //******************************************

    //         log(1 - INT * PV/PMT)

    // PAYNO = ---------------------

    //             log(1 + INT)

    //******************************************



    $int = $int / 100;

    $value1 = log(1 - $int * ($pv / $pmt));

    $value2 = log(1 + $int);

    $payno = $value1 / $value2;

    $payno = abs($payno);

    $payno = number_format($payno, 0, ".", "");



    return $payno;



} // calc_number =====================================================================



function calc_rate($pv, $payno, $RV, $pmt)
{

    // check that required values have been supplied

    if (empty($pv)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($payno)) {

        echo "<p class='error'>a value for NUMBER of PAYMENTS is required</p>";

        exit;

    } // if

    if (empty($pmt)) {

        echo "<p class='error'>a value for PAYMENT is required</p>";

        exit;

    } // if

    if (($RV < 0)) {

        echo "<p class='error'>RV must be > 0 </p>";

        exit;

    }



    // now try and guess the value using the binary chop technique

    $GuessHigh = (float) 100;    // maximum value

    $GuessMiddle = (float) 2.5;    // first guess

    $GuessLow = (float) 0;      // minimum value

    $GuessPMT = (float) 0;      // result of test calculation



    do {

        // use current value for GuessMiddle as the interest rate,

        // and set level of accurracy to 6 decimal places

        $GuessPMT = (float) calc_payment($pv, $payno, $GuessMiddle, $RV, 6);



        if ($GuessPMT > $pmt) {    // guess is too high

            $GuessHigh = $GuessMiddle;

            $GuessMiddle = $GuessMiddle + $GuessLow;

            $GuessMiddle = $GuessMiddle / 2;

        } // if



        if ($GuessPMT < $pmt) {    // guess is too low

            $GuessLow = $GuessMiddle;

            $GuessMiddle = $GuessMiddle + $GuessHigh;

            $GuessMiddle = $GuessMiddle / 2;

        } // if



        if ($GuessMiddle == $GuessHigh)
            break;

        if ($GuessMiddle == $GuessLow)
            break;



        $int = number_format($GuessMiddle, 9, ".", "");    // round it to 9 decimal places

        if ($int == 0) {

            echo "<p class='error'>Interest rate has reached zero - calculation error</p>";

            exit;

        } // if



    } while ($GuessPMT !== $pmt);



    return $int;



} // calc_rate =======================================================================



function calc_payment($pv, $payno, $int, $RV, $accuracy)
{

    // check that required values have been supplied

    if (empty($pv)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($payno)) {

        echo "<p class='error'>a value for NUMBER of PAYMENTS is required</p>";

        exit;

    } // if

    if (empty($int)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (($RV < 0)) {

        echo "<p class='error'>RV must be > 0 </p>";

        exit;

    }

    // now do the calculation using this formula:



    //******************************************

    //            INT * ((1 + INT) ** PAYNO)

    // PMT = PV * --------------------------

    //             ((1 + INT) ** PAYNO) - 1

    //******************************************

    $RV = $RV / pow((1 + ($int / 100)), $payno);

    $int = $int / 100;    // convert to a percentage

    $value1 = $int * pow((1 + $int), $payno);

    $value2 = pow((1 + $int), $payno) - 1;

    $pmt = ($pv - $RV) * ($value1 / $value2);

    // $accuracy specifies the number of decimal places required in the result

    $pmt = number_format($pmt, $accuracy, ".", "");



    return $pmt;



} // calc_payment ====================================================================

function calc_periode($DT, $DF)
{

    // check that required values have been supplied

    if (($DT == '')) {

        echo "<p class='error'>a value for Date debut is required</p>";

        exit;

    } // if

    if (($DF == '')) {

        echo "<p class='error'>a value for Date fin is required</p>";

        exit;

    } // if

    // if

    if (($DF < $DT)) {

        echo "<p class='error'>Date fin must be > date debut </p>";

        exit;

    } // if



    ///******************************************

    //  $diff=date_diff($date1,$date2);         

    //  $diff->format("%R%a days");

    //  $format=("%R%a days")

    //******************************************



    $diff = date_diff(new DateTime($DT), new DateTime($DF));

    // $accuracy specifies the number of decimal places required in the result
    return $diff->format("%a");

    ///$diff->format("%a");

} // calc_periode ====================================================================



function print_schedule($Date1, $balance, $rate, $payment, $number)
{

    // check that required values have been supplied

    if (empty($Date1)) {

        echo "<p class='error'>a value for date debut is required</p>";

        exit;

    } // if

    if (empty($balance)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($rate)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (empty($payment)) {

        echo "<p class='error'>a value for PAYMENT is required</p>";

        exit;

    } // if
    echo '<table Id="jamal"  border="1">';

    echo '<colgroup align="right" width="20">';

    echo '<colgroup align="right" width="100">';

    echo '<colgroup align="right" width="115">';

    echo '<colgroup align="right" width="115">';

    echo '<colgroup align="right" width="115">';

    echo '<colgroup align="right" width="115">';

    echo '<colgroup align="right" width="100">';

    echo '<tr><th>Durée</th><th>Date</th><th>PAYMENT</th><th>INTEREST</th><th>PRINCIPAL</th><th>BALANCE</th><th>FISCAL</th></tr>';



    $count = 0;

    $date = new DateTime($Date1);

    // calculate Fisc Loan Amortization

    $Fisc = $balance / $number;

    do {

        $count++;

        // return Date



        $date->add(new DateInterval('P1M')); // P1D means a period of 1 day

        $Date2 = $date->format('d-m-Y');



        // calculate interest on outstanding balance

        $interest = $balance * $rate / 100;



        // what portion of payment applies to principal?

        $principal = $payment - $interest;



        // watch out for balance < payment

        if ($balance < $payment) {

            $principal = $balance;

            $payment = $interest + $principal;

        } // if



        // reduce balance by principal paid

        $balance = $balance - $principal;



        // watch for rounding error that leaves a tiny balance

        if ($balance < 0) {

            $principal = $principal + $balance;

            $interest = $interest - $balance;

            $balance = 0;

        } // if



        echo "<tr>";

        echo "<td>$count</td>";

        echo "<td>$Date2</td>";

        echo "<td>" . number_format($payment, 2, ".", ",") . "</td>";

        echo "<td>" . number_format($interest, 2, ".", ",") . "</td>";

        echo "<td>" . number_format($principal, 2, ".", ",") . "</td>";

        echo "<td>" . number_format($balance, 2, ".", ",") . "</td>";

        echo "<td>" . number_format($Fisc, 2, ".", ",") . "</td>";

        echo "</tr>";



        @$totPayment = $totPayment + $payment;

        @$totInterest = $totInterest + $interest;

        @$totPrincipal = $totPrincipal + $principal;



        if ($payment < $interest) {

            echo "</table>";

            echo "<p>Payment < Interest amount - rate is too high, or payment is too low</p>";

            exit;

        } // if



    } while ($balance > 0);



    echo "<tr>";

    echo "<td>&nbsp;</td>";

    echo "<td><b>" . number_format($totPayment, 2, ".", ",") . "</b></td>";

    echo "<td><b>" . number_format($totInterest, 2, ".", ",") . "</b></td>";

    echo "<td><b>" . number_format($totPrincipal, 2, ".", ",") . "</b></td>";

    echo "<td>&nbsp;</td>";

    echo "</tr>";

    echo "</table>";



} // print_schedule =================================================================


function print_click($Date1, $balance, $rate, $payment)
{

    // check that required values have been supplied

    if (empty($balance)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($rate)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (empty($payment)) {

        echo "<p class='error'>a value for PAYMENT is required</p>";

        exit;

    } // if
    global $number;

    $i = 0;

    $date = new DateTime($Date1);

    // calculate Fisc Loan Amortization

    $Fisc = $balance / $number;

    do {

        $i++;
        // inserte Date

        $date->add(new DateInterval('P1M')); // P1D means a period of 1 day

        $Date2 = $date->format('Y-m-d');

        // calculate interest on outstanding balance

        $interest = $balance * $rate / 100;
        // what portion of payment applies to principal?

        $principal = $payment - $interest;
        // watch out for balance < payment

        if ($balance < $payment) {

            $principal = $balance;

            $payment = $interest + $principal;

        } // if

        // reduce balance by principal paid

        $balance = $balance - $principal;
        // watch for rounding error that leaves a tiny balance

        if ($balance < 0) {

            $principal = $principal + $balance;

            $interest = $interest - $balance;

            $balance = 0;

        } // 

        $link = mysqli_connect("localhost", "root", "", "payment");

        $sql = "insert into payment1 (Date,INTEREST,PRINCIPAL,BALANCE,AMORT_FISCAL) value

                  ('$Date2','$interest','$principal','$balance','$Fisc')";

        if (mysqli_query($link, $sql)) {

            echo "Data Inserted";

        } else {

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

        }

    } while ($i <= $number - 1);
    mysqli_close($link);

} // print_schedule =================================================================

?>