@extends('layouts.main')
@section('content')
<v-container>
    <v-row align="center" justify="center">
        <v-cols cols=12 sm="3">
            <v-card class="elevation-12" >
                <v-toolbar dar color="warning">
                    <v-toolbar-title>Payment Cancelled</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <div class="text-center">
                        <p class="mb-4">payment was cancelled. To continue shopping, please return to the merchant.</p>
                        <v-btn
                        color="primary"
                        href="/paypal"
                        >Return to Merchant</v-btn>
                    </div>
                </v-card-text>

            </v-card>

        </v-cols>
    </v-row>
</v-container>
@endsection
