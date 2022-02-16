<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

body {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(#141e30, #243b55);
}

a {
  overflow: hidden;
}

.outerParent {
  width: 400px;
  padding: 40px;
  background: rgba(0, 0, 0, 0.5);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
  border-radius: 10px;
}
.outerParent h2 {
  text-align: center;
  color: white;
  margin: 0 0 2rem;
}
.outerParent .user-box {
  position: relative;
  margin-bottom: 1rem;
}
.outerParent .user-box input {
  background: transparent;
  border: none;
  border-bottom: 1px solid #fff;
  width: 100%;
  margin-bottom: 2rem;
  font-size: 16px;
  padding: 3px;
  color: white;
  outline: none;
}
.outerParent .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  color: white;
  transition: all 0.3s ease;
  pointer-events: none;
}
.outerParent .user-box input:valid ~ label,
.outerParent .user-box input:focus ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
  outline: none;
}
.outerParent a {
  color: white;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  padding: 10px;
  position: relative;
  display: inline-block;
  transition: all 0.3s ease;
  cursor: pointer;
}
.outerParent a span {
  position: absolute;
  display: block;
}
.outerParent a span:nth-child(1) {
  background: linear-gradient(90deg, transparent, #03e9f4);
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  animation: 2s span1 linear infinite;
  animation-delay: 0s;
}
.outerParent a span:nth-child(2) {
  background: linear-gradient(180deg, transparent, #03e9f4);
  right: 0;
  top: -100%;
  width: 2px;
  height: 100%;
  animation: 2s span2 linear infinite;
  animation-delay: 0.5s;
}
.outerParent a span:nth-child(3) {
  background: linear-gradient(270deg, transparent, #03e9f4);
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  animation: 2s span3 linear infinite;
  animation-delay: 1s;
}
.outerParent a span:nth-child(4) {
  background: linear-gradient(360deg, transparent, #03e9f4);
  left: 0;
  bottom: -100%;
  width: 2px;
  height: 100%;
  animation: 2s span4 linear infinite;
  animation-delay: 1.5s;
}
.outerParent a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 100px #03e9f4;
}

@keyframes span1 {
  0% {
    left: -100%;
  }
  50%, 100% {
    left: 100%;
  }
}
@keyframes span2 {
  0% {
    top: -100%;
  }
  50%, 100% {
    top: 100%;
  }
}
@keyframes span3 {
  0% {
    right: -100%;
  }
  50%, 100% {
    right: 100%;
  }
}
@keyframes span4 {
  0% {
    bottom: -100%;
  }
  50%, 100% {
    bottom: 100%;
  }
}
</style>

<x-guest-layout>
    <!-- <x-auth-card> -->
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

        <!-- <form method="POST" action="{{ route('login') }}"> -->
            <!-- @csrf -->

            <!-- Email Address -->
            <!-- <div> -->
                <!-- <x-label for="email" :value="__('Email')" /> -->

                <!-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> -->
            <!-- </div> -->

            <!-- Password -->
            <!-- <div class="mt-4"> -->
                <!-- <x-label for="password" :value="__('Password')" /> -->

                <!-- <x-input id="password" class="block mt-1 w-full" -->
                                <!-- type="password" -->
                                <!-- name="password" -->
                                <!-- required autocomplete="current-password" /> -->
            <!-- </div> -->

            <!-- Remember Me -->
            <!-- <div class="block mt-4"> -->
                <!-- <label for="remember_me" class="inline-flex items-center"> -->
                    <!-- <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember"> -->
                    <!-- <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> -->
                <!-- </label> -->
            <!-- </div> -->

            <!-- <div class="flex items-center justify-end mt-4"> -->
                <!-- @if (Route::has('password.request')) -->
                    <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}"> -->
                        <!-- {{ __('Forgot your password?') }} -->
                    <!-- </a> -->
                <!-- @endif -->

                <!-- <x-button class="ml-3"> -->
                    <!-- {{ __('Log in') }} -->
                <!-- </x-button> -->
            <!-- </div> -->
        <!-- </form> -->
    <!-- </x-auth-card> -->

    
    <div class="outerParent">
        <h2>Inicia sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="user-box">
                <input type="username" name="email" required />
                <!-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> -->
                <label for="usernameInput">Correo</label>
                <!-- <x-label for="email" :value="__('Email')" /> -->

                <!-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> -->
            </div>
            <div class="user-box">
                <!-- <input type="password" name="passwordInput" required /> -->
                <!-- <x-label for="password" :value="__('Password')" /> -->

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"
                                placeholder='' />
                <label for="passwordInput">Contraseña</label>
            </div>
        <div class="flex justify-between">
            <a class="ml-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button>
                    {{ __('Log in') }}
                </button>
            </a>
            <a href="{{ route('register') }}" class="mr-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Registrate
            </a>
        </div>
            </form>
        </div>
    </x-guest-layout>