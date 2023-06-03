<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .side{
            margin: 0;
            padding: 0;
            width: 100%;
            background: #1d1b31;
            opacity: .8;
            height: 3rem;
            position: absolute;
            top: 0px;
            left: 0;
            margin-bottom: 12rem;
            color: #fff;
            text-align: center;
        }

        .side .right{
            color: #fff;
            position: absolute;
            top: .5rem;
            right: 1rem;
        }

        /* @media (min-width: 768px) {
            .side{
                margin: 0;
            padding: 0;
            height: 100%;
            width: auto;
            }
        } */
    </style>
</head>
<body>
    <div class="side">
    <h2>
    <?php 
      echo $_SESSION['head'];
      ?></h2>

<div class="right">
        <?php echo "Welcome ".$_SESSION['name']; ?>
    </div>
    </div>
</body>
</html>