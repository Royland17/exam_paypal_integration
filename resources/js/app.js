import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js'

//Vuetify
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

//pages components
import LoginForm from './components/LoginForm.vue'
import RegisterForm from './components/RegisterForm.vue'
import PaypalForm from './components/PaypalForm.vue'
import SnackBar from './components/utils/SnackBar.vue'
const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
          mdi,
        }
      },
})
const app= createApp({
    components:{
        LoginForm,
        RegisterForm,
        PaypalForm,
        SnackBar,

    },
    data: () => ({

    }),
})

app.use(vuetify)
app.mount("#app")

