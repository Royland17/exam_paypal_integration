<template>
    <v-alert v-if="invalid_credentials" class="mb-4" type="error">Invalid credentials</v-alert>
    <v-form
    @submit.prevent="submitForm"
    ref="form"
    v-model="valid"
    lazy-validation
    >
    <v-text-field
        v-model="email"
        :rules="email_rules"
        label="Email"
        required
        class="mb-2"
        persistent-hint
        variant="underlined"
      ></v-text-field>
      <v-text-field
        v-model="password"
        :rules="password_rules"
        label="password"
        type="password"
        class="mb-5"
        required
        persistent-hint
        variant="underlined"
      ></v-text-field>
      <div class="text-center ">
        <v-btn
        color="primary"
        class="mb-2"
        type="submit">
        <v-progress-circular
      	v-if="loading"
		indeterminate
		size="25"
		color="white"
		></v-progress-circular>
        <v-icon
         icon="mdi-lock"
         class="mr-2"/>
         Login
        </v-btn>
        <v-divider class="mb-5"></v-divider>
        <v-row align="center" justify="center">
        Don't have an account?
        <a class="ml-2" href="/register">register</a>
    </v-row>

    </div>
    </v-form>
</template>
<script>
export default {
    props:['csrf'],
    data: ()=> ({
        invalid_credentials:false,
      valid: true,
      loading:false,
      password: '',
      password_rules: [
        v => !!v || 'The password field is required.',
      ],
      email: '',
      email_rules: [
        v => !!v || 'The email field is required',
        v => /.+@.+\..+/.test(v) || 'The email field must be valid email.',
      ],
    }),
    methods: {
      async submitForm () {
        const { valid } = await this.$refs.form.validate()
        if (valid) {
          this.login()
        }
      },
      login(){
        this.errors = []
        this.loading = true
        const credential = {
          email: this.email,
          password: this.password,
        }
        axios.post('login', credential).then(() => {
            this.loading = true
            setTimeout(() => {
                    location.href = 'paypal'
		    	}, 1000)
        }).catch(errors => {
          const response = errors.response
          if(response.status === 401){
            this.invalid_credentials = true
            this.loading = false
          }
        })
      }
    },
}
</script>

