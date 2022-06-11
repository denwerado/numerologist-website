<?php
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
    $calcMatrixPartner = calculationMatrix($dateBirthPartner);

    //Матрица партнера
    $matrixPartner = $calcMatrixPartner["matrix"];

    //Матрица usera
    $matrix = $calcMatrixUser["matrix"];
    $workingNumbersArray = $calcMatrixUser["workingNumbersArray"];

    //Объединение значений
    $workingNumbers = implode(".", $workingNumbersArray);

    //Обьявление спец переменых usera
    //!Колонки
    $calcCol2 = strlen($matrix[4]) + strlen($matrix[5]) + strlen($matrix[6]);
    //!Строки
    $calcRow1 = strlen($matrix[1]) + strlen($matrix[4]) + strlen($matrix[7]);
    $calcRow2 = strlen($matrix[2]) + strlen($matrix[5]) + strlen($matrix[8]);
    //!Диагонали
    $matrixDiag1 = strlen($matrix[1]) + strlen($matrix[5]) + strlen($matrix[9]);
    $matrixDiag2 = strlen($matrix[3]) + strlen($matrix[5]) + strlen($matrix[7]);
    //!Ячейки
    $calcMatrix1 = strlen($matrix[1]);
    $calcMatrix2 = strlen($matrix[2]); 
    $calcMatrix3 = strlen($matrix[3]);
    $calcMatrix4 = strlen($matrix[4]);
    $calcMatrix5 = strlen($matrix[5]);
    $calcMatrix6 = strlen($matrix[6]);
    $calcMatrix7 = strlen($matrix[7]);
    $calcMatrix8 = strlen($matrix[8]);
    $calcMatrix9 = strlen($matrix[9]); 

    //Объявление спец переменных партнера
    $calcMatrixPartner1 = strlen($matrixPartner[1]);
    $calcMatrixPartner2 = strlen($matrixPartner[2]); 

    //Вычислекние психотипа usera
    if($calcMatrix1 > $calcMatrix2){
        $psychotype = 1;
    }else{
        if($calcMatrix1 < $calcMatrix2){
            $psychotype = 2;
        }else{
            $psychotype = 3;
        }
    }

    //Вычисление психотипа партнера
    if($calcMatrixPartner1 > $calcMatrixPartner2){
        $psychotypePartner = 1;
    }else{
        if($calcMatrixPartner1 < $calcMatrixPartner2){
            $psychotypePartner = 2;
        }else{
            $psychotypePartner = 3;
        }
    }
?>