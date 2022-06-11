<?php
    //#####Вычисление психоматрицы#####
    $json = json_decode(file_get_contents('php://input'),true);

    $dateBirth = $json['date'];

    //Функция вычисления значений матрицы
    function calculationValuesMatrix($workingNumbersArray_calc,$dateBirthIntArray_calc) {
        //Вычисление матрицы
        foreach($workingNumbersArray_calc as $key => $value){
            if($value >= 10){
                $valueStrArray = str_split((string)$value);
                foreach($valueStrArray as $key => $twovalue){
                    $matrix_calc[$twovalue] .= (string)$twovalue;
                }
            }else{
                $matrix_calc[$value] .= (string)$value;
            }
        };

        //Вычисление матрицы
        foreach($dateBirthIntArray_calc as $key => $value){
            $matrix_calc[$value] .= (string)$value;
        };

        return  $matrix_calc;
    }

    //Функция вычисления матрицы и Рабочих чисел
    function calculationMatrix($funcDateBirth){
        //Разбитие на символы
        $funcDateBirthStrArray = str_split($funcDateBirth);

        //Создание массива цифр
        $funcDateBirthIntArray = [];
        foreach($funcDateBirthStrArray as $key => $value){
            if($value!='.' && $value!='0'){
                array_push($funcDateBirthIntArray,(int)$value);
            };
        };

        //Поиск года
        $funcYear = (int)explode(".",$funcDateBirth)[2];

        //1-ое число
        $funcFirstNumber = 0;
        //2-ое число
        $funcSecondNumber = 0;
        //3-ье число
        $funcThirdNumber = 0;
        //4-ое число
        $funcFourthNumber = 0;
        //5-ое число
        $funcFifthNumber = 0;

        //Вычисление 1-го числа
        foreach($funcDateBirthIntArray as $key => $value){
            $funcFirstNumber += (int)$value;
        };

        if($funcYear < 2000){
            //Вычисление 2-го числа
            $funcFirstNumberStrArray = str_split((string)$funcFirstNumber);
            foreach($funcFirstNumberStrArray as $key => $value){
                $funcSecondNumber += (int)$value;
            }
    
            //Вычисление 3-го числа
            $funcThirdNumber = $funcFirstNumber - ($funcDateBirthIntArray[0]*2);
    
            //Вычисление 4-го числа
            $funcThirdNumberStrArray = str_split((string)$funcThirdNumber);
            foreach($funcThirdNumberStrArray as $key => $value){
                $funcFourthNumber += (int)$value;
            };
    
            $funcWorkingNumbersArray = [$funcFirstNumber,$funcSecondNumber,$funcThirdNumber,$funcFourthNumber];
        }else{
            //Вычисление 2-го числа
            if($funcFirstNumber >= 10){
                $funcFirstNumberStrArray = str_split((string)$funcFirstNumber);
                foreach($funcFirstNumberStrArray as $key => $value){
                    $funcSecondNumber += (int)$value;
                }
            }
    
            //Вычисление 3-го числа
            $funcThirdNumber = 19;
    
            //Вычисление 4-го числа
            $funcFourthNumber = $funcFirstNumber + 19;
    
            //Вычисление 5-го числа
            $funcFourthNumberStrArray = str_split((string)$funcFourthNumber);
            foreach($funcFourthNumberStrArray as $key => $value){
                $funcFifthNumber += (int)$value;
            }
    
            if($funcSecondNumber){
                $funcWorkingNumbersArray = [$funcFirstNumber,$funcSecondNumber,$funcThirdNumber,$funcFourthNumber,$funcFifthNumber];
            }else{
                $funcWorkingNumbersArray = [$funcFirstNumber,$funcThirdNumber,$funcFourthNumber,$funcFifthNumber];
            }
        }
        $funcMatrix = calculationValuesMatrix($funcWorkingNumbersArray,$funcDateBirthIntArray);

        return ["matrix" => $funcMatrix,"workingNumbersArray" => $funcWorkingNumbersArray];
    }

    //Вызов функции
    $calcMatrixUser = calculationMatrix($dateBirth);

    //Матрица usera
    $matrix = $calcMatrixUser["matrix"];
    $workingNumbersArray = $calcMatrixUser["workingNumbersArray"];

    //Объединение значений
    $workingNumbers = implode(".", $workingNumbersArray);

    //Дополнительная информация в result
    $result["working_numbers"] = $workingNumbers;
    $result["date_birth"] = $dateBirth;
    $result["matrix"] = $matrix;

    //Отправка клиенту
    echo json_encode($result);
?>