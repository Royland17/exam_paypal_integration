<template>
    <v-snackbar
      v-model="snackbar"
      >
      <div class="text-center">
        {{ message }}
      </div>
    </v-snackbar>
    </template>
    <script>
        export default {
            props:['message', 'show'],
        data: () => ({
          snackbar: false,
        }),
        watch:{
          show(value){
            this.snackbar = value
          }
        }
      }
    </script>
