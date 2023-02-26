<template>
    <v-form
    ref="registerForm"
	  v-model="valid"
      lazy-validation
    >
    <v-alert v-for="(error, key) in errors" class="mb-4" type="error">{{error}}</v-alert>
    <v-text-field
	        v-model="data.name"
	        :rules="rules.name"
	        label="Name"
	        class="mb-2"
	        required
	        persistent-hint
	        variant="underlined"
      	></v-text-field>

		<v-text-field
	        v-model="data.email"
	        :rules="rules.email"
	        label="Email"
	        class="mb-2"
	        required
	        persistent-hint
            variant="underlined"
      	></v-text-field>

      	<v-text-field
	        v-model="data.password"
	        :rules="rules.password"
	        label="Password"
	        class="mb-2"
	        required
	        persistent-hint
            variant="underlined"
	        type="password"
      	></v-text-field>
	    <v-text-field
	        v-model="data.password_confirmation"
	        :rules="rules.password_confirmation.concat([(data.password === data.password_confirmation ) || 'Password mismatch.'])"
	        label="Confirm password"
	        required
            class="mb-3"
	        persistent-hint
            variant="underlined"
	        type="password"
      	></v-text-field>
          <div class="text-center mb-3">
      		<v-btn color="success" @click="submitRegisterForm">
                <v-progress-circular
      			  v-if="loading"
			      indeterminate
			      size="25"
			      color="white"
			    ></v-progress-circular>
                Register
      		</v-btn>
      	</div>
        <v-divider class="mb-2"></v-divider>
        <div>
            Already have an account?
          <a href="/">Log in</a>
        </div>
        <SnackBar :message="'Successfully Register'" :show="showSnackBar"/>
    </v-form>
</template>
<script>
    import SnackBar from '././utils/SnackBar.vue'
    export default {
        components:{
		SnackBar
	},
        data: ()=>({
        loading: false,
         valid: true,
         errors:[],
         showSnackBar:false,
         data: {
			name: '',
			email: '',
			password: '',
			password_confirmation : '',
		},
		rules:{
			name: [
				v => !!v || 'The name field is required.',
			],
			email: [
		        v => !!v || 'The email field is required',
		        v => /.+@.+\..+/.test(v) || 'The email field must be valid email.',
			],
			password: [
				v => !!v || 'The password field is required.',
			],
			password_confirmation : [
				v => !!v || 'The confirm password field is required.',
			],
		}
    }),
    methods:{
        async submitRegisterForm () {
            const { valid } = await this.$refs.registerForm.validate()
            if(valid){
                this.registerUser()
            }
        },
        registerUser(){
            this.loading = true,
            this.errors =[],
             axios.post('register',this.data).then(res=>{
                this.loading = false
		    	this.showSnackBar = true
                setTimeout(()=>{
                    this.showSnackBar = true
                    location.href = '/login'
                }, 2000)
            }).catch(errors=>{
                const response = errors.response
                if(response.status === 422){
                    const errorData = response.data.errors
                    for(const key in errorData){
                        const errs = errorData[key]
                        errs.forEach(value=>{
                            this.errors.push(value)
                        })
                    }
                }
            })
        }
    }
}

</script>
