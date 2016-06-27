<!DOCTYPE html>
<html>
<head>
    <title>Converted presentation</title>
    <style type="text/css">
        body {
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>
<body onload="setBackground()">
    <script>
    function setBackground () {
        var slides = [],
            pos = 0,
            dir;

        <?php
            if ($_GET["dir"]) {
                $dir = "output/" . urldecode($_GET["dir"]);
                if (file_exists($dir)) {
                    $files = scandir($dir);

                    for($x = 0; $x < count($files); $x++) {
                        echo "slides.push('" . $files[$x] . "');";
                    }
                    echo "dir = '" . $dir . "';";
                }
            }
        ?>

        if (!dir) {
            return;
        }

        slides = slides.filter(function (file) {
            return file !== "." && file !== ".." && file.split(".").reverse()[0] === "svg";
        });

        var body = document.getElementsByTagName("body")[0];
        body.style.backgroundImage = "url(" + dir + "/" + slides[pos] + ")";

        document.addEventListener("keydown", function (event) {
            switch (event.keyCode) {
                case 37: // left
                case 38: // up
                    pos = (pos - 1 >= 0) ? pos - 1 : 0;
                    break;
                case 39: // right
                case 40:
                    pos = (pos + 1 < slides.length) ? pos + 1 : slides.length - 1;
                    break;
                default: return;
            }
            body.style.backgroundImage = "url(" + dir + "/" + slides[pos] + ")";
        });
    }
    </script>
</body>
</html>