<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function update($tbName,$fieldname, $conditions, $operator){
        // update tablename set field1=value1, field2=value2 where filed01=criteria1 and/or field2=criteria2
        //conditions = [field1= value1, field2=value2]
        $updateFieldStr= "";
        foreach($updateFields as $field => $val){
            $updateFieldStr .= "$field=$val";
            if($field !=array_key_last($conditionArray)){
                $updateFields .=".";
                // . : concat
            }
        }
        $where ="WHERE";
        foreach ($conditionArray as $key => $value) {
            # code...
            $where .= "$key=$value";
            if($key != array_key_last($conditionArray)){
                $where .= "$operator";
            }
        }
        $updateQuery ="UPDATE $tbName, $conditionArray";
    
    }

    ?>
</body>
</html>