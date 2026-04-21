<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
           margin: 0;
           overflow: hidden;
           background-color: grey;
        }

        #square {
            position: absolute;
            top: 50px;
            left: 50px;
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 8px;
        }
        
    </style>
</head>
<body>

    <div id="square"></div>

    <script>
        const square = document.getElementById('square');
        let x = 50;
        let y = 50;
        const step = 50;

        document.addEventListener('keydown', (e) => {
            switch (e.key) {
                case 'ArrowUp':
                    if(y > 0) y -= 10;
                    break;
                case 'ArrowDown':
                    if(y < window.innerWidth - step) y += 10;
                    break;
                case 'ArrowLeft':
                    if(x > 0) x -= 10;
                    break;
                case 'ArrowRight':
                    if(x < window.innerWidth - step) x += 10;
                    break;
            }
            square.style.left = x + 'px';
            square.style.top = y + 'px';
        })
        
        
    </script>
    
</body>
</html>