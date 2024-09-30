<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('cssfile/register.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: black;
            color: white;
        }
        .form-value {
            color: white;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            margin-bottom: 20px;
        }

        .inputbox {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        ion-icon.lock-icon {
            margin-right: 30px;
            cursor: pointer;
            color: #ccc;
        }
        input {
            flex: 1;
            padding: 10px;
            box-sizing: border-box;
        }
        ion-icon.eye-icon {
            cursor: pointer;
            color: #ccc;
        }
        .register {
            margin-top: 20px;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            .form-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value text-center"> <!-- Adjusted: Added text-center class -->
                @if(Session::has('success'))
                <div class="form-value text-center">
                    <small class="form-value" style="color: green;">{{ Session::get('success') }}</small>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="form-value text-center">
                    <small class="form-value" style="color: red;">{{ Session::get('error') }}</small>
                </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <br>
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="name" name="name" required autocomplete="off">
                        <label for="name">Name</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required autocomplete="off">
                        <label for="email">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" class="lock-icon"></ion-icon>
                        <input type="password" name="password" id="passwordInput" required>
                        <label for="password">Password</label>
                        <ion-icon name="eye-outline" id="togglePassword" class="eye-icon"></ion-icon>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" class="lock-icon"></ion-icon>
                        <input type="password" name="confirmpassword" id="passwordInputt" required>
                        <label for="confirmpassword">Confirm Password</label>
                        <ion-icon name="eye-outline" id="togglePasswordd" class="eye-icon"></ion-icon>
                    </div>
                    <button class="button">Register</button>

                    <div class="register">
                        <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        const togglePasswordd = document.getElementById('togglePasswordd');
        const passwordInputt = document.getElementById('passwordInputt');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.name = type === 'password' ? 'eye-outline' : 'eye-off-outline';
        });

        togglePasswordd.addEventListener('click', function() {
            const type = passwordInputt.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInputt.setAttribute('type', type);
            togglePasswordd.name = type === 'password' ? 'eye-outline' : 'eye-off-outline';
        });

     
    </script>
</body>
</html>