<template>
    <v-form
    ref="paypalForm"
    v-model="valid"
    lazy
    >
    <div class="text-center">
        <v-text-field
        label="Amount"
        v-model="data.amount"
        :rules="rules"
        class="mb-3"
        variant="underlined"
        type="number"
        >
        </v-text-field>
        <v-btn rounded
        color="primary"
        @click="submitForm"
        >
        <v-progress-circular
      	v-if="loading"
		indeterminate
		size="25"
		color="white"
		></v-progress-circular>
        Pay Now</v-btn>
    </div>
    </v-form>
</template>
<script>
export default {
data: ()=>({
    loading:false,
    valid:true,
    data: {
        //
    },
    rules:[
        v => !!v || 'The amount field is required',
    ],

}),
methods: {
    async submitForm(){
        const { valid} = await this.$refs.paypalForm.validate()
        if(valid){
            this.pay()
        }
    },
    pay() {
        this.loading = true,
        axios.post('request-payment', this.data).then((response)=>{
            location.href = response.data
        })
    }
}
}
</script>
