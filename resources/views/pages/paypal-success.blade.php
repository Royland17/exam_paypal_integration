@extends('layouts.main')
@section('content')
<v-container>
    <v-row align="center" justify="center">
        <v-cols cols=12 sm="3">
            <v-card class="elevation-12" >
                <v-toolbar dar color="success">
                    <v-toolbar-title dark color="success">Payment Successful</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <v-divider class="mb-3"></v-divider>
                    <h4 class="mb-3">Payer Details</h4>
                    <div class="v-table v-theme--light mb-3">
                        <div class="v-table__wrapper">
                            <table>
                                <tr>
                                    <td class="text-left wrap-table-cell">Payer Name</td>
                                    <td class="text-left wrap-table-cell">Email Address</td>
                                    <td class="text-left wrap-table-cell">Amount Paid</td>
                                </tr>
                            <tbody>
                                <tr>
                            <td class="wrap-table-cell">{{$data['payer']['name']['given_name'].' '.$data['payer']['name']['surname']}}</td>
                            <td class="wrap-table-cell">{{$data['payer']['email_address']}}</td>
                            <td class="wrap-table-cell">{{$data['purchase_units'][0]['amount']['value'].' '.$data['purchase_units'][0]['amount']['currency_code']}}</td>
                            </tr>
                            </tbody>
                            </tr>
                    </table>
                        </div>
                    </div>

            <v-divider class="mb-3"></v-divider>
                    <div class="text-center">


                        <p class="mb-4">Payment was completed. To continue shopping, please return to the merchant.</p>
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
