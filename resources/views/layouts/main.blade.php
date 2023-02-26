<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Paypal Integration</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
       @if(auth()->check())
       <v-app  id="inspire">
        <v-app-bar app>
        <v-toolbar-title>Paypal Integration</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon href="/logout">
            <v-icon>mdi-logout</v-icon>
            <v-tooltip activator="parent" location="bottom">Logout</v-tooltip>
        </v-btn>
        </v-app-bar>
        <v-main>
            <v-container>

                    @yield('content')

            </v-container>
        </v-main>
    </v-app>
       @else
        @yield('content')
        @endif
    </div>
</body>
</html>
