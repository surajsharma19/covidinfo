<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covidinfo</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .state{
            color:black;
        }
        .con{
            color:rgba(50, 104, 252, 0.863);
        }
        .rec{
            color: rgba(7, 247, 7, 0.863);
        }
        .dec{
            color: rgb(253, 52, 52, 0.863);
        }
        .act{
            color: rgb(255, 255, 72, 0.863);
        }
    </style>
</head>
<body>
<nav class>
    <label class="logo"><a href="index.php">Covidinfo</a></label>
    <ul>
        <li><a href="https://www.who.int/">Visit WHO</a></li>
        <li><a href="prec.php">Precautions</a></li>
        <li><a href="symptom.php">symptoms</a></li>
        <li><a href="feedback/index.php">feedback</a></li>
    </ul>
</nav>
<br><br>
 
<div class="title">
    <h3>Statewise Corona Cases In India</h3>
</div>

    <table>
        <tr>
            <th class="state">State</th>
            <th class="con">Confirmed</th>
            <th class="rec">Recovered</td>
            <th class="dec">Deceased</th>
            <th class="act">Active</th>
        </tr>
        
        <?php 
        
            $data = file_get_contents('https://api.covid19india.org/data.json');
            $coronalive = json_decode($data,True);
            $statecount = count($coronalive['statewise']);
            $i = 1;
            while($i < $statecount){
        ?>
        <tr>
            <td><?php echo $coronalive['statewise'][$i]['state'];?></td>
            <td><?php echo $coronalive['statewise'][$i]['confirmed'];?></td>
            <td><?php echo $coronalive['statewise'][$i]['recovered'];?></td>
            <td><?php echo $coronalive['statewise'][$i]['deaths'];?></td>
            <td><?php echo $coronalive['statewise'][$i]['active']. "<br>";?></td>
        </tr>
            <?php 
                $i++;
            }
            ?>
    </table>
</div>
</body>
</html>