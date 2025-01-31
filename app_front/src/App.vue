<template>
  <v-app theme="light">
    <v-main>
      <v-container class="d-flex justify-center align-center bg-blue-lighten-3" height="100vh" >
        <v-row justify="center" mx-auto>
          <v-col cols="5">
            <v-card class="px-2 rounded-lg" elevation="5">
              <v-card-item>
                <v-card-title class="text-center text-h4">Login</v-card-title>
                <v-card-subtitle class="text-center">Informe seu login e senha e clique em acessar</v-card-subtitle>
              </v-card-item>
              <v-card-text>
                <v-text-field
                  v-model="formdata.login"
                  label="Login"
                  variant="outlined"
                />
                <v-text-field
                  v-model="formdata.password"
                  label="Senha"
                  variant="outlined"
                />
                <p v-if="message" class="">{{ message }}</p>
              </v-card-text>
              <v-card-actions>
                <v-btn
                  color="primary"
                  text="Acessar"
                  variant="outlined"
                  class="mx-auto mb-2"
                  @click="login"
                />
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from './axios';

  export default {
    data() {
      return {
        formdata: {
          login: null,
          password: null
        },
        message: ''
      }
    },
    methods:{
      async login(){
        axios
          .post('/login', this.formdata).then(
            (response) => {
              console.log(this.$router.options.routes);

              this.message = response.data.detail

              if (response.data.message == 'OK'){
                localStorage.setItem('token', response.data.data.token);
                this.$router.push({ name: '/' })
              }else{
                return false;
              }
            }
          ).catch(
            (error) => {
              this.message = error;
            }
          );
      }
    }
  }
</script>
