<template>
    <div>
        <div class="first-login">
            <div class="second-login">
                <div class="third-login">
                    <div class="login-form">
                        
                            <img  v-bind:src="'images/logo/bw.svg'">
                            <h5>{{signheading}}</h5>
                            <p>{{signpara}}</p>


                        <!-- <span class="error">{{error}}</span> -->
                        <div class=" mycustomalert" v-if="errors.length">
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index" class="toastnew">
                                    <i class="fas fa-exclamation-triangle"></i> {{error}}
                                </li>
                            </ul>
                        </div>
                          <transition name="slide-fade" >
                            <div class="bu-forlogin" v-if="loginbox">                            
                                <input type="email" v-model="email" placeholder="Email" class="form-control mb-3">
                                <input type="password" v-model="password" placeholder="******" class="form-control mb-3">
                                <button type="primary" @click="onLogin" class="btn btn-outline-light login-btn" >Login</button>
                                <div class="mt-4">
                                    <span class="txt-light">Don't have an account yet?</span>
                                    <a class="btn btn-outline-light signup-btn" @click="anchorsignup">Sign Up</a>
                                </div>
                            </div>
                            </transition>

                        <transition name="slide-fade">
                            <div class="bu-forregister" v-if="registerbox">                             
                                <input type="text" class="form-control mb-3" placeholder="Username..." v-model="username">
                                <input type="email" class="form-control mb-3" placeholder="Email..." v-model="registeremail">
                                <input type="password" class="form-control mb-3" placeholder="Password..." v-model="registerpassword">
                                <input type="password" class="form-control mb-3" placeholder="Password Again..." v-model="passwordagain">
                                <button class="btn btn-outline-light login-btn" @click="onRegister">Register</button>  
                                <div class="mt-4">
                                    <span class="txt-light">Have an account?</span>
                                    <a class="btn btn-outline-light signup-btn" @click="anchorsignin" >Log In</a>
                                </div>                          
                            </div>
                        </transition>


                    </div>                     
                </div>
            </div>
        </div>


      
    </div>
</template>
<style scoped>

.slide-fade-enter-active {
  transition: all .5s ease;
}
.slide-enter-active {
  transition: all .1s ease;
}

.slide-fade-enter, .slide-fade-leave-to {
  transform: translateX(100px);
  opacity: 0;
}

.mycustomalert ul {
    position: fixed;
    top: 5px;
    right: 18px;
}
.mycustomalert ul li {
    background-color: #F64E60;
    border-color: #F64E60;
    list-style: none;
    padding: 10px 20px;
    font-size: 14px;
    margin-top: 20px;
}



.first-login{    
    display: -webkit-box ;
    display: -ms-flexbox ;
    display: flex ;    
    -webkit-box-orient: vertical ;
    -webkit-box-direction: normal ;
    -ms-flex-direction: column ;
    flex-direction: column ;
    -webkit-box-flex: 1;
    flex: 1;
    -ms-flex: 1 0 0px;    
    height: 100vh;
    margin: -20px 0px -20px -70px;
}
.second-login{    
    display: -webkit-box ;
    display: -ms-flexbox ;
    display: flex ;
    -webkit-box-flex: 1;
    flex: 1 auto;
    -ms-flex: 1 0 0px;
    min-width: 0;
}
.third-login{  
    display: -webkit-box ;
    display: -ms-flexbox ;
    display: flex ;    
    background-size: cover;    
    background-repeat: no-repeat;    
    -webkit-box-flex: 1;
    flex: 1 auto;
    -ms-flex: 1 0 0px;
    min-width: 0;    
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;   
    background-image: url('/images/bk/bg-1.jpg');
}
.third-login img {
    width: 100px;
}
.login-form{
    width: 100%;
    max-width: 450px;
    color: #fff;
    text-align: center;
}
.login-form h5 {
    font-size: 19px;
    margin-top: 15px;
}
.login-form p {
    font-size: 13px;
    opacity: 0.6;
}
.signup-btn {
    border: none;
    font-size: 13px;
}
.login-btn {
    padding: 10px 50px!important;
    border-radius: 50px!important;
}
.txt-light{
    font-size: 13px;
    opacity: 0.7;
}
.signup-btn:hover {
    background: transparent!important;
    opacity: 0.7;
}
.error {
    color: #F64E60;
    font-size: 12px;
    font-weight: 400;
}
.bu-forregister input::placeholder, .bu-forlogin input::placeholder, .bu-forlogin input:focus, .bu-forregister input:focus {
    color: #fff;
    font-size: 13px;
}
.bu-forregister input,.bu-forlogin input {
    background-color: rgba(24, 28, 50, 0.28);
    border-radius: 50px;
    opacity: 0.7;
    color: #ffffff!important;
    padding: 13px 26px;
    height: 45px;
}


</style>
<script>
export default {
   name: 'login',
   props: ['app '],
   data(){
       return{         
           email:'',
           password:'',
           username:'',
           registeremail:'',
           registerpassword:'',
           passwordagain:'',
           errors: [],
           loginbox:true,
           registerbox: false,
           signheading: 'Sign In To Admin',
           signpara: 'Enter your details to login to your account:',
       }
   },
    created(){
        this.init();
    },
    watch:{
        '$route.params.search': {
        handler: function(search) {
           console.log(search+'login');
        },
            deep: true,
            immediate: true,        
        }
    },
   methods:{
        init(){
            if(window.location.pathname=="/login"){
                this.loginbox = true;
                this.registerbox = false;
                this.signheading = 'Sign In To Admin';
                this.signpara = 'Enter your details to login to your account:';

            }else if(window.location.pathname=="/register"){
                this.loginbox = false;
                this.registerbox = true;
                this.signheading = 'Sign Up To Admin';
                this.signpara = 'Enter your details to Register to your account:';
            }
        },
       onLogin(){
           this.errors = [];
          
           if(!this.email){
               this.errors.push('Email is required.');
           }
           if(!this.password){
               this.errors.push('Password is required.');
           }
           

            if(!this.errors.length){
                const data = {
                    email: this.email,
                    password: this.password,
                }

                axios.post('auth/login',data).then(response=>{
                    this.$router.push({
                        name: 'home',
                        params: { search: true}
                    });

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }

       },
       onRegister(){
           this.errors = [];
           if(!this.username){
               this.errors.push('Username is required.');
           }
           if(!this.email){
               this.errors.push('Email is required.');
           }
           if(!this.password){
               this.errors.push('Password is required.');
           }
           if(!this.passwordagain){
               this.errors.push('Password Confirmation is required.');
           }

           if(this.password !== this.passwordagain){
               this.errors.push('Passwords do not match.');
           }

            if(!this.errors.length){
                const data = {
                    username: this.username,
                    email: this.registeremail,
                    password: this.registerpassword,
                    passwordagain: this.passwordagain,

                }

                axios.post('auth/register',data).then(response=>{
                    this.$router.push('/home');
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }

       },
       anchorsignin(){
           this.loginbox = true;
           this.registerbox = false;
           this.signheading = 'Sign In To Admin';
           this.signpara = 'Enter your details to login to your account:';
       },
       anchorsignup(){
           this.loginbox = false;
           this.registerbox = true;
           this.signheading = 'Sign Up To Admin';
           this.signpara = 'Enter your details to Register to your account:';
       }

   }
}
</script>