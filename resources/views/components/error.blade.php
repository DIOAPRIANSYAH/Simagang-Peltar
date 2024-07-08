<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>CodePen - Mars 404 Error Page</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Nunito:400,600,700");

        @keyframes floating {
            from {
                transform: translateY(0px);
            }

            65% {
                transform: translateY(15px);
            }

            to {
                transform: translateY(0px);
            }
        }

        html {
            height: 100%;
        }

        body {
            background-image: url("https://assets.codepen.io/1538474/star.svg"),
                linear-gradient(to bottom, #05007a, #4d007d);
            height: 100%;
            margin: 0;
            background-attachment: fixed;
            overflow: hidden;
        }

        .mars {
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            height: 27vmin;
            background: url("https://assets.codepen.io/1538474/mars.svg") no-repeat bottom center;
            background-size: cover;
        }

        .logo-404 {
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            top: 16vmin;
            width: 30vmin;
        }

        @media (max-width: 480px) and (min-width: 320px) {
            .logo-404 {
                top: 45vmin;
            }
        }

        .meteor {
            position: absolute;
            right: 2vmin;
            top: 16vmin;
        }

        .title {
            color: white;
            font-family: "Nunito", sans-serif;
            font-weight: 600;
            text-align: center;
            font-size: 5vmin;
            margin-top: 31vmin;
        }

        @media (max-width: 480px) and (min-width: 320px) {
            .title {
                margin-top: 65vmin;
            }
        }

        .subtitle {
            color: white;
            font-family: "Nunito", sans-serif;
            font-weight: 400;
            text-align: center;
            font-size: 3.5vmin;
            margin-top: -1vmin;
            margin-bottom: 9vmin;
        }

        .btn-back {
            border: 1px solid white;
            color: white;
            height: 5vmin;
            padding: 12px;
            font-family: "Nunito", sans-serif;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
            background: white;
            color: #4d007d;
        }

        @media (max-width: 480px) and (min-width: 320px) {
            .btn-back {
                font-size: 3.5vmin;
            }
        }

        .astronaut {
            position: absolute;
            top: 18vmin;
            left: 10vmin;
            height: 30vmin;
            animation: floating 3s infinite ease-in-out;
        }

        @media (max-width: 480px) and (min-width: 320px) {
            .astronaut {
                top: 2vmin;
            }
        }

        .spaceship {
            position: absolute;
            bottom: 15vmin;
            right: 24vmin;
        }

        @media (max-width: 480px) and (min-width: 320px) {
            .spaceship {
                width: 45vmin;
                bottom: 18vmin;
            }
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="mars"></div>
    <img src="https://assets.codepen.io/1538474/404.svg" class="logo-404" />
    <img src="https://assets.codepen.io/1538474/meteor.svg" class="meteor" />
    <p class="title">Oh no!!</p>
    <p class="subtitle">
        You’re either misspelling the URL <br />
        or requesting a page that's no longer here.
    </p>
    <div align="center">
        <a onclick="window.history.back();" class="btn-back" href="#">Back to previous page</a>
    </div>
    <img src="https://assets.codepen.io/1538474/astronaut.svg" class="astronaut" />
    <img src="https://assets.codepen.io/1538474/spaceship.svg" class="spaceship" />
    <!-- partial -->
</body>

</html>
