@extends('layouts.main')
@section('content')
<v-container fill-height>
    <v-row align="center" justify="center">
        <v-col cols="12" sm="3" >
            <v-card class="elevation-12">
                <v-toolbar dark color="info" max-width="600">
                    <v-toolbar-title>Pay with Paypal</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <paypal-form/>
                </v-card-text>
            </v-card>

    </v-col>
    </v-row>
  </v-container>
@endsection


