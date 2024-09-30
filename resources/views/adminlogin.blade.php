<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('cssfile/admin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin</title>
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
            <div class="form-value">
                @if(Session::has('error'))
                <div class="form-value text-center">
                    <small class="form-value" style="color: red;">{{ Session::get('error') }}</small>
                </div>
                @endif
                <form action="{{ route('admin') }}" method="POST">
                    @csrf
                    <br>
                    <h2>Admin</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" id="email" required autocomplete="off">
                        <label for="email">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" class="lock-icon"></ion-icon>
                        <input type="password" name="password" id="passwordInput" required>
                        <label for="password">Password</label>
                        <ion-icon name="eye-outline" id="togglePassword" class="eye-icon"></ion-icon>
                    </div>

                    <button class="button">Login</button>

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

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.name = type === 'password' ? 'eye-outline' : 'eye-off-outline';
        });
    </script>
</body>
</html>