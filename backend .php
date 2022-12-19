<?php
if(isset($_POST["companyID"]) && $_POST["companyID"] != '-1'){
    $result = shell_exec("python3 getCompanyData.py ".$_POST["companyID"]." 2>&1");
    $myfile = fopen("companyData.txt", "r");
    while(!feof($myfile)) {
        $i = explode(" ", fgets($myfile));
        $_POST[trim($i[0], "'")] = trim($i[1]);
    }
    fclose($myfile);
}
    if(isset($_POST["20TAI019"])){
        $payload = [
               intval($_POST["14TAH187"])/intval($_POST["14mf"]),
            intval($_POST["14TAB024"])/intval($_POST["14mf"]),
            intval($_POST["14TAH187"])/intval($_POST["14toke"]),
            intval($_POST["14TAC011"])/intval($_POST["14kolt"]),
            intval($_POST["14TAC013"])/intval($_POST["14kolt"]),
            intval($_POST["14TAC014"])/intval($_POST["14kolt"]),
            intval($_POST["14TAB024"])/intval($_POST["14kolt"]),
            intval($_POST["15TAH187"])/intval($_POST["15mf"]),
            intval($_POST["15TAB024"])/intval($_POST["15mf"]),
            intval($_POST["15TAH208"])/intval($_POST["15toke"]),
            intval($_POST["15TAH187"])/intval($_POST["15toke"]),
            intval($_POST["15TAC011"])/intval($_POST["15kolt"]),
            intval($_POST["15TAC013"])/intval($_POST["15kolt"]),
            intval($_POST["15TAC015"])/intval($_POST["15kolt"]),
            intval($_POST["15TAH021"])/intval($_POST["15kolt"]),
            intval($_POST["16TAH088"])/intval($_POST["16mf"]),
            intval($_POST["16TAH044"])/intval($_POST["16mf"]),
            intval($_POST["16TAH187"])/intval($_POST["16mf"]),
            intval($_POST["16TAI036"])/intval($_POST["16mf"]),
            intval($_POST["16TAB024"])/intval($_POST["16mf"]),
            intval($_POST["16TAH054"])/intval($_POST["16liab"]),
            intval($_POST["16TAH180"])/intval($_POST["16liab"]),
            intval($_POST["16TAH054"])/intval($_POST["16toke"]),
            intval($_POST["16TAB024"])/intval($_POST["16kolt"]),
            intval($_POST["17TAH187"])/intval($_POST["17mf"]),
            intval($_POST["17TAI056"])/intval($_POST["17mf"]),
            intval($_POST["17TAH189"])/intval($_POST["17toke"]),
            intval($_POST["17TAH187"])/intval($_POST["17toke"]),
            intval($_POST["17TAC015"])/intval($_POST["17kolt"]),
            intval($_POST["17TAC016"])/intval($_POST["17kolt"]),
            intval($_POST["17TAC018"])/intval($_POST["17kolt"]),
            intval($_POST["18TAH042"])/intval($_POST["18mf"]),
            intval($_POST["18TAH187"])/intval($_POST["18mf"]),
            intval($_POST["18TAH180"])/intval($_POST["18liab"]),
            intval($_POST["18TAC008"])/intval($_POST["18kolt"]),
            intval($_POST["19TAH187"])/intval($_POST["19mf"]),
            intval($_POST["19TAH190"])/intval($_POST["19mf"]),
            intval($_POST["19TAH004"])/intval($_POST["19toke"]),
            intval($_POST["19TAH187"])/intval($_POST["19toke"]),
            intval($_POST["19TAC013"])/intval($_POST["19kolt"]),
            intval($_POST["19TAC014"])/intval($_POST["19kolt"]),
            intval($_POST["19TAB024"])/intval($_POST["19kolt"]),
            intval($_POST["20TAH042"])/intval($_POST["20mf"]),
            intval($_POST["20TAH187"])/intval($_POST["20mf"]),
            intval($_POST["20TAI019"])/intval($_POST["20mf"]),
            intval($_POST["20TAI037"])/intval($_POST["20mf"]),
            intval($_POST["20TAH187"])/intval($_POST["20toke"]),
            intval($_POST["20TAC008"])/intval($_POST["20kolt"]),
            intval($_POST["20TAC009"])/intval($_POST["20kolt"]),
            intval($_POST["20TAC078"])/intval($_POST["20kolt"]),
        ];
        $result = curl -XPOST https://prductivityModel.execute-api.eu-central-1.amazonaws.com/predict -H "Content-
            Type: application/json -d @payload.json
            {
                "features": inputFeatures
            }

        $myfile = fopen("colouring.txt", "r");
        while(!feof($myfile)) {
            $i = explode("\t", fgets($myfile));
            $_POST[trim($i[0] . "c", "'")] = trim($i[1]);
        }
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Productivity advisory</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="content m-5">
    <h1 align="center" class="<?if(!isset($result) || strpos($result, "F") !== false) print("d-none") ?>">Productivity growth expected</h1>
    <form action="backend.php" method="post">
        <div>
        <div class="row mb-2">
            <h2 class="col">Current year</h2>
            <input type="submit" class="button primary col" value="Request advice">
        </div>
        <div class="row">
        <div class="form-group col">
            <label for="20TAI019">Gross value of properties on 31st of December</label>
            <input type="number" class="form-control <? echo $_POST['20TAI019c']?>" name = "20TAI019" placeholder="" value="<? echo $_POST['20TAI019']?>">
        </div>
            <div class="form-group col">
                <label for="20TAH187">Net income</label>
                <input type="number" class="form-control <? print $_POST['20TAH187c']?>" name = "20TAH187" placeholder="" value="<? print $_POST['20TAH187']?>">
            </div>
        </div>
        <div class="row">
        <div class="form-group col">
            <label for="20TAH042">Accounts receivables</label>
            <input type="number" class="form-control <? print $_POST['20TAH042c']?>" name = "20TAH042" placeholder="" value="<? print $_POST['20TAH042']?>">
        </div>
            <div class="form-group col">
                <label for="20toke">Equity</label>
                <input type="number" class="form-control" name = "20toke" placeholder="" value="<? print $_POST['20toke']?>">
            </div>
        </div>
        <div class="row">
        <div class="form-group col">
            <label for="20TAC008">Material costs</label>
            <input type="number" class="form-control <? print $_POST['20TAC008c']?>" name = "20TAC008" placeholder="" value="<? print $_POST['20TAC008']?>">
        </div>
            <div class="form-group col">
                <label for="20kolt">Total costs</label>
                <input type="number" class="form-control" name = "20kolt" placeholder="" value="<? print $_POST['20kolt']?>">
            </div>
        </div>
        <div class="row">
        <div class="form-group col">
            <label for="20TAC009">Material like services</label>
            <input type="number" class="form-control <? print $_POST['20TAC009c']?>" name = "20TAC009" placeholder="" value="<? print $_POST['20TAC009']?>">
        </div>
            <div class="form-group col">
                <label for="20mf">Total assets</label>
                <input type="number" class="form-control" name = "20mf" placeholder="" value="<? print $_POST['20mf']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="20TAC078">Other services within material like costs</label>
            <input type="number" class="form-control <? print $_POST['20TAC078c']?>" name = "20TAC078" placeholder="" value="<? print $_POST['20TAC078']?>">
        </div>
        <div class="form-group">
            <label for="20TAI037">Depreciation of machines, tools, vehicles</label>
            <input type="number" class="form-control <? print $_POST['20TAI037c']?>" name = "20TAI037" placeholder="" value="<? print $_POST['20TAI037']?>">
        </div>
        </div>
<hr>
        <div>
        <div class="row">
            <h2> Year -1</h2>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="19TAI019">Issued capital in possesion of domestic natural person</label>
                <input type="number" class="form-control <? print $_POST['19TAH004c']?>" name = "19TAH004" placeholder="" value="<? print $_POST['19TAH004']?>">
            </div>
            <div class="form-group col">
                <label for="19TAH187">Net income</label>
                <input type="number" class="form-control <? print $_POST['19TAH187c']?>" name = "19TAH187" placeholder="" value="<? print $_POST['19TAH187']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="19TAH042">One-time depreciation of small value procurment</label>
                <input type="number" class="form-control <? print $_POST['19TAH190c']?>" name = "19TAH190" placeholder="" value="<? print $_POST['19TAH190']?>">
            </div>
            <div class="form-group col">
                <label for="19toke">Equity</label>
                <input type="number" class="form-control" name = "19toke" placeholder="" value="<? print $_POST['19toke']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="19TAC008">Paid salaries</label>
                <input type="number" class="form-control <? print $_POST['19TAC013c']?>" name = "19TAC013" placeholder="" value="<? print $_POST['19TAC013']?>">
            </div>
            <div class="form-group col">
                <label for="19kolt">Total costs</label>
                <input type="number" class="form-control" name = "19kolt" placeholder="" value="<? print $_POST['19kolt']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="19TAC009">Personnel like costs</label>
                <input type="number" class="form-control <? print $_POST['19TAC014c']?>" name = "19TAC014" placeholder="" value="<? print $_POST['19TAC014']?>">
            </div>
            <div class="form-group col">
                <label for="19mf">Total assets</label>
                <input type="number" class="form-control" name = "19mf" placeholder="" value="<? print $_POST['19mf']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="19TAC078">Paid, approved dividend</label>
            <input type="number" class="form-control <? print $_POST['19TAB024c']?>" name = "19TAB024" placeholder="" value="<? print $_POST['19TAB024']?>">
        </div>
        </div>
<hr>
        <div>
        <div class="row">
            <h2> Year -2</h2>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="18TAH187">Net income</label>
                <input type="number" class="form-control <? print $_POST['18TAH187c']?>" name = "18TAH187" placeholder="" value="<? print $_POST['18TAH187']?>">
            </div>
            <div class="form-group col">
                <label for="18TAC008">Material costs</label>
                <input type="number" class="form-control <? print $_POST['18TAC008c']?>" name = "18TAC008" placeholder="" value="<? print $_POST['18TAC008']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="18TAH042">Accounts receivables</label>
                <input type="number" class="form-control <? print $_POST['18TAH042c']?>" name = "18TAH042" placeholder="" value="<? print $_POST['18TAH042']?>">
            </div>
            <div class="form-group col">
                <label for="18liab">Liabilities</label>
                <input type="number" class="form-control" name = "18liab" placeholder="" value="<? print $_POST['18liab']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="18TAH180">Short term liability towards owner</label>
                <input type="number" class="form-control <? print $_POST['18TAH180c']?>" name = "18TAH180" placeholder="" value="<? print $_POST['18TAH180']?>">
            </div>
            <div class="form-group col">
                <label for="18kolt">Total costs</label>
                <input type="number" class="form-control" name = "18kolt" placeholder="" value="<? print $_POST['18kolt']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="18mf">Total assets</label>
                <input type="number" class="form-control" name = "18mf" placeholder="" value="<? print $_POST['18mf']?>">
            </div>
        </div>
        </div>
<hr>
        <div>
            <div class="row">
                <h2>Year -3</h2>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="17TAC016">Depriciation</label>
                    <input type="number" class="form-control <? print $_POST['17TAC016c']?>" name = "17TAC016" placeholder="" value="<? print $_POST['17TAC016']?>">
                </div>
                <div class="form-group col">
                    <label for="17TAH187">Net income</label>
                    <input type="number" class="form-control <? print $_POST['17TAH187c']?>" name = "17TAH187" placeholder="" value="<? print $_POST['17TAH187']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="17TAC018">Other expenses</label>
                    <input type="number" class="form-control <? print $_POST['17TAC018c']?>" name = "17TAC018" placeholder="" value="<? print $_POST['17TAC018']?>">
                </div>
                <div class="form-group col">
                    <label for="17toke">Equity</label>
                    <input type="number" class="form-control" name = "17toke" placeholder="" value="<? print $_POST['17toke']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="17TAH189">Retained earnings</label>
                    <input type="number" class="form-control <? print $_POST['17TAH189c']?>" name = "17TAH189" placeholder="" value="<? print $_POST['17TAH189']?>">
                </div>
                <div class="form-group col">
                    <label for="17kolt">Total costs</label>
                    <input type="number" class="form-control" name = "17kolt" placeholder="" value="<? print $_POST['17kolt']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="17TAC015">Social security tax</label>
                    <input type="number" class="form-control <? print $_POST['17TAC015c']?>" name = "17TAC015" placeholder="" value="<? print $_POST['17TAC015']?>">
                </div>
                <div class="form-group col">
                    <label for="17mf">Total assets</label>
                    <input type="number" class="form-control" name = "17mf" placeholder="" value="<? print $_POST['17mf']?>">
                </div>
            </div>
            <div class="form-group">
                <label for="17TAI056">Depreciation of breeding animals</label>
                <input type="number" class="form-control <? print $_POST['17TAI056c']?>" name = "17TAI056" placeholder="" value="<? print $_POST['17TAI056']?>">
            </div>
        </div>
<hr>
        <div>
    <div class="row">
        <h2>Year -4</h2>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="16TAB024">Paid approved dividend</label>
            <input type="number" class="form-control <? print $_POST['16TAB024c']?>" name = "16TAB024" placeholder="" value="<? print $_POST['16TAB024']?>">
        </div>
        <div class="form-group col">
            <label for="16TAH187">Net income</label>
            <input type="number" class="form-control <? print $_POST['16TAH187c']?>" name = "16TAH187" placeholder="" value="<? print $_POST['16TAH187']?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="16TAI036">Depriciation of properties</label>
            <input type="number" class="form-control <? print $_POST['16TAI036c']?>" name = "16TAI036" placeholder="" value="<? print $_POST['16TAI036']?>">
        </div>
        <div class="form-group col">
            <label for="16toke">Equity</label>
            <input type="number" class="form-control " name = "16toke" placeholder="" value="<? print $_POST['16toke']?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="16TAH044">Closing amount of cash and cash equvivalents</label>
            <input type="number" class="form-control <? print $_POST['16TAH044c']?>" name = "16TAH044" placeholder="" value="<? print $_POST['16TAH044']?>">
        </div>
        <div class="form-group col">
            <label for="16kolt">Total costs</label>
            <input type="number" class="form-control" name = "16kolt" placeholder="" value="<? print $_POST['16kolt']?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="16TAH180">Short term liabilities</label>
            <input type="number" class="form-control <? print $_POST['16TAH180c']?>" name = "16TAH180" placeholder="" value="<? print $_POST['16TAH180']?>">
        </div>
        <div class="form-group col">
            <label for="16mf">Total assets</label>
            <input type="number" class="form-control" name = "16mf" placeholder="" value="<? print $_POST['16mf']?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="16TAH088">Inventory</label>
            <input type="number" class="form-control <? print $_POST['16TAH088c']?>" name = "16TAH088" placeholder="" value="<? print $_POST['16TAH088']?>">
        </div>
        <div class="form-group col">
            <label for="16liab">Liabilities</label>
            <input type="number" class="form-control" name = "16liab" placeholder="" value="<? print $_POST['16liab']?>">
        </div>
    </div>
    <div class="row"></div>
    <div class="form-group">
        <label for="16TAH054">Short term liabilities towards owners</label>
        <input type="number" class="form-control <? print $_POST['16TAH054c']?>" name = "16TAH054" placeholder="" value="<? print $_POST['16TAH054']?>">
    </div>
    <div class="form-group">
        <label for="16TAH005">Issued capital for domestic company</label>
        <input type="number" class="form-control <? print $_POST['16TAH005c']?>" name = "16TAH005" placeholder="" value="<? print $_POST['16TAH005']?>">
    </div>
</div>
<hr>
        <div>
            <div class="row">
                <h2>Year -5</h2>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="15TAC013">Paid salaries</label>
                    <input type="number" class="form-control <? print $_POST['15TAC013c']?>" name = "15TAC013" placeholder="" value="<? print $_POST['15TAC013']?>">
                </div>
                <div class="form-group col">
                    <label for="15TAH187">Net income</label>
                    <input type="number" class="form-control <? print $_POST['15TAH187c']?>" name = "15TAH187" placeholder="" value="<? print $_POST['15TAH187']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="15TAB024">Paid dividend</label>
                    <input type="number" class="form-control <? print $_POST['15TAB024c']?>" name = "15TAB024" placeholder="" value="<? print $_POST['15TAB024']?>">
                </div>
                <div class="form-group col">
                    <label for="15toke">Equity</label>
                    <input type="number" class="form-control" name = "15toke" placeholder="" value="<? print $_POST['15toke']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="15TAC015">Social security tax</label>
                    <input type="number" class="form-control <? print $_POST['15TAC015c']?>" name = "15TAC015" placeholder="" value="<? print $_POST['15TAC015']?>">
                </div>
                <div class="form-group col">
                    <label for="15kolt">Total costs</label>
                    <input type="number" class="form-control" name = "15kolt" placeholder="" value="<? print $_POST['15kolt']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="15TAC011">Subcontractor added value</label>
                    <input type="number" class="form-control <? print $_POST['15TAC011c']?>" name = "15TAC011" placeholder="" value="<? print $_POST['15TAC011']?>">
                </div>
                <div class="form-group col">
                    <label for="15mf">Total assets</label>
                    <input type="number" class="form-control" name = "15mf" placeholder="" value="<? print $_POST['15mf']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="15TAH208">Restricted reserve</label>
                    <input type="number" class="form-control <? print $_POST['15TAH208c']?>" name = "15TAH208" placeholder="" value="<? print $_POST['15TAH208']?>">
                </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="15TAH021">Other expenses: taxes</label>
                <input type="number" class="form-control <? print $_POST['15TAH021c']?>" name = "15TAH021" placeholder="" value="<? print $_POST['15TAH021']?>">
            </div>
        </div>
</div>
<hr>
        <div>
            <div class="row">
                <h2>Year -6</h2>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="14TAC013">Paid salaries</label>
                    <input type="number" class="form-control <? print $_POST['14TAC013c']?>" name = "14TAC013" placeholder="" value="<? print $_POST['14TAC013']?>">
                </div>
                <div class="form-group col">
                    <label for="14TAH187">Net income</label>
                    <input type="number" class="form-control <? print $_POST['14TAH187c']?>" name = "14TAH187" placeholder="" value="<? print $_POST['14TAH187']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="14TAB024">Paid dividend</label>
                    <input type="number" class="form-control <? print $_POST['14TAB024c']?>" name = "14TAB024" placeholder="" value="<? print $_POST['14TAB024']?>">
                </div>
                <div class="form-group col">
                    <label for="14toke">Equity</label>
                    <input type="number" class="form-control" name = "14toke" placeholder="" value="<? print $_POST['14toke']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="14TAC014">Personnel costs</label>
                    <input type="number" class="form-control <? print $_POST['14TAC014c']?>" name = "14TAC014" placeholder="" value="<? print $_POST['14TAC014']?>">
                </div>
                <div class="form-group col">
                    <label for="14kolt">Total costs</label>
                    <input type="number" class="form-control" name = "14kolt" placeholder="" value="<? print $_POST['14kolt']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="14TAC011">Subcontractor added value</label>
                    <input type="number" class="form-control <? print $_POST['14TAC011c']?>" name = "14TAC011" placeholder="" value="<? print $_POST['14TAC011']?>">
                </div>
                <div class="form-group col">
                    <label for="14mf">Total assets</label>
                    <input type="number" class="form-control" name = "14mf" placeholder="" value="<? print $_POST['14mf']?>">
                </div>
            </div>
        </div>
        <select name="companyID">
            <option value="-1"></option>
            <?
            $myfile = fopen("companiesIndex.txt", "r");
            while(!feof($myfile)) {
                $i = fgets($myfile);
                echo '<option value = '.$i.'>'.$i.'</option>';
            }
            fclose($myfile);
            ?>
        </select>
    </form>

</div>
</body>
</html>