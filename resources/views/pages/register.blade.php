@extends('layouts.main')
@section('content')
<v-container fill-height>
    <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
            <v-card class="elevation-12" max-width="600">
                <v-toolbar dark color="info">
                    <v-toolbar-title>Register</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <register-form/>
                </v-card-text>
          </v-card>
        </v-col>
    </v-row>
  </v-container>
@endsection
