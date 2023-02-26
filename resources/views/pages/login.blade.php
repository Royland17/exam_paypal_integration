@extends('layouts.main')
@section('content')
<v-container fill-height>
    <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
            <v-card class="elevation-12" max-width="400">
                <v-toolbar dark color="info">
                    <v-toolbar-title>Log in Form</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
              <login-form csrf="{{csrf_token()}}"/>
            </v-card-text>
          </v-card>
        </v-col>
    </v-row>

  </v-container>
@endsection
