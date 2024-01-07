<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Bank Website - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
             width: 100%;;
            background-size: cover;
            color: #333;
        }
        header {
            background-color: #004d99;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-family: 'Courier New', monospace;
        }
        nav {
            background-color: #e6e6e6;
            padding: 10px 0;
          
        color: black;
        text-align: center;
        padding: 10px 0;
        font-family: 'Courier New', monospace;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            
                
            .button-51 {
            background-color: transparent;
            border: 1px solid #266DB6;
            box-sizing: border-box;
            color: #00132C;
            font-family: "Avenir Next LT W01 Bold",sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            padding: 16px 23px;
            position: relative;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            }

            .button-51:hover,
            .button-51:active {
            outline: 0;
            }

            .button-51:hover {
            background-color: transparent;
            cursor: pointer;
            }

            .button-51:before {
            background-color: #D5EDF6;
            content: "";
            height: calc(100% + 3px);
            position: absolute;
            right: -7px;
            top: -9px;
            transition: background-color 300ms ease-in;
            width: 100%;
            z-index: -1;
            }

            .button-51:hover:before {
            background-color: #6DCFF6;
            }

            @media (min-width: 768px) {
            .button-51 {
                padding: 16px 32px;
            }
            }
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        main {
      
        background-image: url('background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        margin: 20px auto; 
        width: 80vw;
        height: 80vh; 
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); 
    }

    .container {
        max-width: 1200px; 
        margin: auto; 
        overflow: hidden; 
    }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Our Simple Bank</h1>
        </header>
        <nav>
            <h2>THE MOST SECURE AND RELIABLE BANK.</h2>
              <ul>
            <li><a href="login.php" class="button-51" role="button">LOGIN</a></li>
            </ul>
        </nav>
        <main>
            
        </main>
        <footer>
            <p>&copy; 2023 Simple Bank</p>
        </footer>
    </div>
</body>
</html>
