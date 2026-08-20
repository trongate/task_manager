<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p class="text-center">
        <button>Real Button</button>
        <a href="#" class="button">Click Here</a>
        <a href="#" class="button alt">Cancel</a>
    </p>

    <style>
        .text-center {
            text-align: center;
            margin-top: 7em;
        }

        button,
        .button {
          background-color: #4682b4;
          border: 1px solid #38678f;
          margin: 1em 0.1em 0 0;
          padding: 0.6em 1.2em;
          color: #fff;
          font-size: 0.9em;
          cursor: pointer;
          text-decoration: none;
          font-family: inherit;
          line-height: normal;
          border-radius: 6px;
          display: inline-block;
          text-align: center;
        }

        button:hover,
        .button:hover {
          background-color: #38678f;
          border-color: #294d6b;
          color: #fff;
        }

        .alt {
          background-color: transparent;
          border-color: #4682b4;
          color: #333;
        }

        .alt:hover {
          background-color: transparent;
          border-color: #4682b4;
          color: #4682b4;
        }

    </style>

</body>
</html>