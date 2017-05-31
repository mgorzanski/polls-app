<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Polls App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/polls-app/css/styles.css">
    <?php
    if(isset($loadScss) && $loadScss == true) {
        require "functions/scss-compiler.php";
        $scss = new scssc();

        echo '<style type="text/css">';
        echo $scss->compile('
        dl {
          display: flex;
          background-color: white;
          flex-direction: column;
          width: 100%;
          max-width: 700px;
          position: relative;
          padding: 20px;
        }

        dt {
          align-self: flex-start;
          width: 100%;
          font-weight: 700;
          display: block;
          text-align: center;
          font-size: 1.2em;
          font-weight: 700;
          margin-bottom: 20px;
          margin-left: 130px;
        }

        .text {
          font-weight: 600;
          display: flex;
          align-items: center;
          height: 40px;
          width: 130px;
          background-color: white;
          position: absolute;
          left: 0;
          justify-content: flex-end;
        }

        .percentage {
          font-size: .8em;
          line-height: 1;
          text-transform: uppercase;
          width: 100%;
          height: 40px;
          margin-left: 130px;
          background: repeating-linear-gradient(
          to right,
          #ddd,
          #ddd 1px,
          #fff 1px,
          #fff 5%
        );
          
          &:after {
            content: "";
            display: block;
            background-color: #3d9970;
            width: 50px;
            margin-bottom: 10px;
            height: 90%;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            transition: background-color .3s ease;
            cursor: pointer;
          }
          &:hover,
          &:focus {
            &:after {
               background-color: #aaa; 
            }
          }
        }

        @for $i from 1 through 100 {
          .percentage-#{$i} {
            &:after {
              $value: ($i * 1%);
              width: $value;
            }
          }
        }

        main#main {
          font-family: "fira-sans-2",sans-serif;
          color: #333;
        }
        ');
        echo '</style>';
    }
    ?>
</head>
    
<body id="body">
    <div class="container">
        <header>
            <div class="page-header">
                <h1><a onclick="goToPage('/polls-app/', '/polls-app/')">Polls App</a></h1>
            </div>
        </header>