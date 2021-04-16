<?php
 $permitted_chars = '123';
 
function generate_string($input, $strength = 4) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
$result = array(
    array(0,0,0,0),
    array(0,0,0,0),
    array(0,0,0,0),
    array(0,0,0,0)
);
for($i=0 ; $i<50 ; $i++)
 {
    $generate_number = generate_string($permitted_chars) . "<br>";
    // 1 -> stone  2 -> paper 3 -> scissor

    $array = str_split($generate_number);
    
    echo $i + 1 . " iteration:" . "<br>";
    //echo $generate_number . "<br>";
    echo "<table border = '1'>";
    echo '<tr>
    <th>Player1</th>
    <th>player2</th>
    <th>player3</th>
    <th>player4</th>
    </tr>';
    $j = 0;
    echo '<tr>';
    
    while ($j<4)
    {
        switch ($array[$j])
        {
            case 1:
                echo '
                <td>Rock</td>';
                break;
            case 2:
                echo '
                <td>Paper</td>';
                break;
            case 3:
                echo '
            <td>Scissor</td>';
            break;
        }
        $j = $j + 1;
    }
    echo '</tr>';
    echo "</table>";
    echo "<br>";
    
    echo "<table border=1>";

    for($row = 0 ; $row < 4 ; $row++)
    {
        for($col = 0 ; $col < 4 ; $col++)
        {
            if ($row == $col)
            {
                $result[$row][$col] = '-';
            }
            else if($array[$row] == $array[$col])
            {
                $result[$row][$col] += 0;
            }
            else if($array[$row] < $array[$col])
            {
                if($array[$row] == 1 && $array[$col] ==3 )
                {
                    $result[$row][$col] += 1;
                }
                else{
                    $result[$row][$col] += 0;
                } 
            }
            else
            {
                if($array[$row] == 2 && $array[$col] ==1 || $array[$row] == 3 && $array[$col] ==2)
                {
                    $result[$row][$col] += 1;
                }
                else{
                    $result[$row][$col] += 0;
                }
            }

        }
    }
    echo '<tr>
    <th>Totals</th>
    <th> </th>
    <th colspan = 4>Against</th>
    </tr>';

    echo '<tr>
    <th></th>
    <th></th>
    <th>Player1</th>
    <th>player2</th>
    <th>player3</th>
    <th>player4</th>
    </tr>';

    echo '<tr>
    <th >Player Wins</th>
    <th>Player1</th>
    <td>'.$result[0][0].'</td>
    <td>'.$result[0][1].'</td>
    <td>'.$result[0][2].'</td>
    <td>'.$result[0][3].'</td>
    </tr>';
    echo '<tr>
    <th></th>
    <th>player2</th>
    <td>'.$result[1][0].'</td>
    <td>'.$result[1][1].'</td>
    <td>'.$result[1][2].'</td>
    <td>'.$result[1][3].'</td>
    </tr>';
    echo '<tr>
    <th></th>
    <th>player3</th>
    <td>'.$result[2][0].'</td>
    <td>'.$result[2][1].'</td>
    <td>'.$result[2][2].'</td>
    <td>'.$result[2][3].'</td>
    </tr>';
    echo '<tr>
    <th></th>
    <th>player4</th>
    <td>'.$result[3][0].'</td>
    <td>'.$result[3][1].'</td>
    <td>'.$result[3][2].'</td>
    <td>'.$result[3][3].'</td>
    </tr>';

    echo "</table>";
    echo "<br>";

 }

 

?>