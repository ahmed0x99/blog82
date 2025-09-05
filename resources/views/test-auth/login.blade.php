<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Themed Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #0b0f1a;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            position: relative;
            width: 350px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
        .container h2 {
            color: white;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            color: #aaa;
        }
        .input-group input {
            width: 95%;
            padding: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            font-size: 14px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #1f2d52;
            color: white;
            text-align: center;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            cursor: pointer;
            border: none;
        }
        .submit-btn:hover {
            background: #293b6a;
        }
        .footer {
            margin-top: 10px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            color: white;
        }
        .footer a {
            text-decoration: none;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('test.login') }}" class="container">
        @csrf

        
        {{-- @dd($errors->all()) --}}
        @session('email')
            <div style="color: green; margin-bottom: 10px;">{{ session('email') }}</div>    
            
        @endsession

        <h2>LOGIN</h2>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email">
        </div>

        @error('email')
            <div style="color: red; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
        <div class="input-group">
            <label>Password </label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        @error('password')
            <div style="color: red; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
        <button class="submit-btn">LOGIN</button>
        <div class="footer">
            <a href="#">REGISTER</a>
            <a href="#">FORGOT PASSWORD</a>
        </div>
    </form>
</body>
</html>