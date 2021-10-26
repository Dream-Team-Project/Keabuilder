<style scoped>  
    .bw-login {
        margin-top: -19px;
    }
    .mycustomalert ul {
        position: fixed;
        top: 5px;
        right: 18px;
        z-index: 9;
        color: #fff;
    }
    .mycustomalert ul li {
        background-color: #F64E60;
        border-color: #F64E60;
        list-style: none;
        padding: 10px 20px;
        font-size: 14px;
        margin-top: 20px;
        border-radius: 5px;
    }

    .bw-login img {
        width: 100px;
    }

    .login-form {
        width: 100%;
        max-width: 450px;
        color: rgb(0, 0, 0);
        text-align: left;
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
        padding: 10px 50px !important;
    }

    .txt-light {
        font-size: 13px;
        opacity: 0.7;
    }

    .signup-btn:hover {
        background: transparent !important;
        opacity: 0.7;
    }

    .error {
        color: #F64E60;
        font-size: 12px;
        font-weight: 400;
    }

    .first-login input::placeholder,
    .bu-forlogin input::placeholder,
    .bu-forlogin input:focus,
    .first-login input:focus {
        color: rgb(0, 0, 0);
        font-size: 13px;
    }

    .first-login input,
    .bu-forlogin input {
        opacity: 0.7;
        padding: 13px 26px;
        height: 45px;
    }

    .toastnew .fa-thumbs-up {
        display: none;
    }

    .toastnew.active .fa-thumbs-up {
        display: inline-block;
    }

    .toastnew.active .fa-exclamation-triangle {
        display: none;
    }

    .toastnew.active {
        background: green !important;
    }

    .apple-login__container{
        display: none;
    }

     .bw-anthoersignin a:focus, .bw-anthoersignin a:hover {
        background-color: #f8f7fa;
        border-color: #f8f7fa;
        color:#3d64ff;
    }
    .bw-anthoersignin a{
        font-size: 14px;
        padding: 10px 20px;
        display: inline-block;
        width: 50%;
    }
    .bw-container__divider {
        position: relative;
        width: 50%;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .bw-container__divider:before {
        content: "";
        height: 1px;
        position: absolute;
        left: 0;
        right: 0;
        background-color: #a9a8b3;
        top: 14px;
    }

    .bw-container__divider-text {
        color: #6f7287;
        border: 1px solid #a9a8b3;
        border-radius: 100px;
        background: #fff;
        position: relative;
        display: inline-block;
        padding: 0 12px 3px;
        min-width: 20px;
        text-align: center;
        left: 41%;
    }
     .bw-container__bg {
        background: var(--login-bk);
        background-position: 0;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
   

    .bw-colside {
        /* display: -webkit-box ;
    display: -ms-flexbox ;
    display: flex ;    */
        flex: 1;
        -ms-flex: 1 0 0px;
        height: 99.9vh;
        overflow: hidden;
    }


</style>

<template>
    <div id="mainlogincontainer"> 
        <div class="bw-login container-fluid">
            <div class="row">
                <div class="pt-3 bw-colside ml-4 mt-4">
                    <div class="login-form">

                        <img v-bind:src="'images/logo/kblogo.svg'">
                        <h5>{{signheading}}</h5>
                        <p>{{signpara}}</p>

                        <!-- <span class="error">{{error}}</span> -->
                        <div class=" mycustomalert" v-if="errors.length">
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index" class="toastnew"
                                    :class="{ active:isActive }">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <i class="far fa-thumbs-up"></i>
                                    {{error}}
                                </li>
                            </ul>
                        </div>
                        <transition name="slide-fade">
                            <form v-on:submit.prevent="onLogin">
                                <div class="bu-forlogin" v-if="loginbox">
                                    <input type="email" v-model="email" placeholder="Email" class="form-control mb-3">
                                    <input type="password" v-model="password" placeholder="******"
                                        class="form-control mb-3">
                                    <button type="submit" class="btn btn-outline-dark login-btn">Login</button>
                                    <br>
                                    <a class="btn btn-outline-dark signup-btn" @click="anchorforget">Forget
                                        password?</a>

                                    <div class="mt-4">
                                        <span class="txt-light">Don't have an account yet?</span>
                                        <a class="btn btn-outline-dark signup-btn" @click="anchorsignup">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </transition>

                        <transition name="slide-fade">
                            <form v-on:submit.prevent="onRegister">
                                <div class="bu-forregister" v-if="registerbox">
                                    <input type="text" class="form-control mb-3" placeholder="Username..."
                                        v-model="username">
                                    <input type="email" class="form-control mb-3" placeholder="Email..."
                                        v-model="registeremail">
                                    <input type="password" class="form-control mb-3" placeholder="Password..."
                                        v-model="registerpassword">
                                    <input type="password" class="form-control mb-3" placeholder="Password Again..."
                                        v-model="passwordagain">
                                    <button class="btn btn-outline-dark login-btn" type="submit">Register</button>
                                    <div class="mt-4">
                                        <span class="txt-light">Have an account?</span>
                                        <a class="btn btn-outline-dark signup-btn" @click="anchorsignin">Log In</a>
                                    </div>
                                </div>
                            </form>
                        </transition>

                        <div class="bw-forforget" v-if="forforget">
                            <form v-on:submit.prevent="sentToken">
                                <input type="email" v-model="emailforget" placeholder="Email" class="form-control mb-3">
                                <button type="submit" class="btn btn-outline-dark login-btn">Sign Token To Email
                                    Address</button>

                                <div class="mt-4">
                                    <span class="txt-light">Don't have an account yet?</span>
                                    <a class="btn btn-outline-dark signup-btn" @click="anchorsignup">Sign Up</a>
                                </div>

                            </form>
                        </div>

                        <div class="bw-forvalidate" v-if="forvalidate">
                            <form v-on:submit.prevent="validateToken">
                                <input type="text" class="form-control" v-model="token" placeholder="Token...">
                                <button type="submit" class="btn btn-outline-dark login-btn mt-3">Validate
                                    Token</button>
                            </form>
                        </div>

                        <div class="bw-forchangepassword" v-if="forchangepassword">
                            <form v-on:submit.prevent="changePassword">
                                <input type="password" class="form-control" v-model="newpassword"
                                    placeholder="New Password">
                                <input type="password" class="form-control mt-3 mb-3" v-model="passwordagain"
                                    placeholder="Password Again">
                                <button type="submit" class="btn btn-outline-dark login-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="bw-container__divider">
                        <div class="bw-container__divider-text">or</div>
                    </div>

                    <div class="bw-anthoersignin">
                            <div class="google-login__container">
                                <a class="eds-btn" href="/auth/redirect/google">
                                        <i class="eds-vector-image "
                                            data-spec="icon" data-testid="icon" aria-hidden="true"><svg width="24"
                                                height="24" fill="none">
                                                <g >
                                                    <path
                                                        d="M21.99 12.108c0-.84-.069-1.452-.216-2.088H12.2v3.79h5.62c-.113.943-.725 2.362-2.084 3.315l-.02.127 3.028 2.349.21.021c1.926-1.782 3.037-4.404 3.037-7.514"
                                                        fill="#4285F4"></path>
                                                    <path
                                                        d="M12.2 22.096c2.753 0 5.064-.908 6.753-2.474l-3.218-2.497c-.862.602-2.017 1.021-3.536 1.021-2.697 0-4.985-1.781-5.801-4.244l-.12.01-3.148 2.44-.041.115c1.677 3.337 5.122 5.63 9.11 5.63z"
                                                        fill="#34A853"></path>
                                                    <path
                                                        d="M6.397 13.902a6.298 6.298 0 01-.34-2.02c0-.704.125-1.385.33-2.02l-.007-.136-3.187-2.48-.104.05A10.238 10.238 0 002 11.881c0 1.646.397 3.201 1.088 4.586l3.308-2.565"
                                                        fill="#FBBC05"></path>
                                                    <path
                                                        d="M12.2 5.616c1.914 0 3.206.829 3.942 1.521l2.879-2.814c-1.768-1.646-4.068-2.656-6.822-2.656-3.988 0-7.433 2.292-9.11 5.63L6.386 9.86c.828-2.463 3.116-4.245 5.813-4.245"
                                                        fill="#EB4335"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="logo-google_svg__clip0">
                                                        <path fill="#fff" transform="translate(2 1.667)"
                                                            d="M0 0h20v20.5H0z"></path>
                                                    </clipPath>
                                                </defs>
                                            </svg></i> {{anothersigngoogle}}
                                </a></div>
                    </div>
                    <div class="bw-anthoersignin">
                        <div class="facebook-button-container">
                            <a class="eds-btn"  href="/auth/redirect/facebook">
                                <i class="eds-vector-image "
                                    data-spec="icon" data-testid="icon" aria-hidden="true"><svg
                                        width="24" height="24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.999 12c0-5.524-4.477-10-10-10s-10 4.476-10 10c0 4.99 3.657 9.128 8.438 9.878V14.89h-2.54V12h2.54V9.795c0-2.506 1.493-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989c4.78-.75 8.437-4.887 8.437-9.879z"
                                            fill="#1877F2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.892 14.89l.443-2.89h-2.774v-1.877c0-.79.388-1.561 1.63-1.561h1.261V6.1s-1.144-.195-2.238-.195c-2.284 0-3.777 1.384-3.777 3.89V12h-2.54v2.89h2.54v6.989a10.073 10.073 0 003.125 0V14.89h2.33z"
                                            fill="#fff"></path>
                                    </svg></i>
                                   {{anothersignfacebook}}
                            </a></div>
                    </div>
                    <div class="bw-anthoersignin">
                        <div class="apple-login__container">
                            <a href="" class="eds-btn">
                                    <i class="eds-vector-image"
                                        data-spec="icon" data-testid="icon" aria-hidden="true"><svg width="24"
                                            height="24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.012 2c-.997.046-2.222.679-2.947 1.516-.658.747-1.224 1.946-1.066 3.099 1.112.09 2.267-.565 2.97-1.402.704-.86 1.18-2.036 1.043-3.213zm-.022 4.842c-1.564-.16-3.06.927-3.854.927s-2.019-.905-3.311-.882c-1.7.045-3.265.995-4.15 2.51-1.746 3.077-.43 7.602 1.293 10.09.838 1.199 1.859 2.579 3.174 2.51 1.27-.044 1.746-.813 3.288-.813 1.52 0 1.973.814 3.31.791 1.36-.022 2.223-1.244 3.062-2.465.975-1.403 1.36-1.923 1.383-1.991-.022-.023-2.653-1.878-2.698-4.887-.023-2.534 2.063-3.755 2.177-3.823-1.18-1.718-3.016-1.945-3.674-1.967z"
                                                fill="#4B4D63"></path>
                                            </svg>
                                        </i>
                                Sign in with Apple
                            </a></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bw-container__bg" :style="cssVars"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                username: '',
                registeremail: '',
                registerpassword: '',
                passwordagain: '',
                errors: [],
                loginbox: true,
                registerbox: false,
                signheading: 'Sign In To Admin',
                signpara: 'Enter your details to login to your account:',
                emailforget: '',
                token: '',
                newpassword: '',
                passwordagain: '',
                user: null,
                forforget: '',
                forvalidate: '',
                forchangepassword: '',
                isActive: '',
                heroImageIndex:2,
                min: 1,
                max: 3,
                anothersigngoogle:"Sign in with Google",
                anothersignfacebook:"Sign in with Facebook",
            }
        },
        computed: {
            cssVars() {
                return {
                    '--login-bk': 'url(/images/login/login-bk'+this.generateNumber()+'.jpg)',
                }
            }
        },
        created() {
            this.init();
        },
        watch: {
            '$route.params.search': {
                handler: function (search) {
                    //    console.log(search+'login');
                },
                deep: true,
                immediate: true,
            }
        },
        methods: {
            init() {
                if (window.location.pathname == "/login") {
                    this.loginbox = true;
                    this.registerbox = false;
                    this.signheading = 'Sign In To Admin';
                    this.signpara = 'Enter your details to login to your account:';

                } else if (window.location.pathname == "/register") {
                    this.loginbox = false;
                    this.registerbox = true;
                    this.signheading = 'Sign Up To Admin';
                    this.signpara = 'Enter your details to Register to your account:';
                }
            },
            generateNumber() {
                return Math.floor(Math.random()*(this.max-this.min+1)+this.min);
            },
            mainanimation() {
                setTimeout(() => this.errors = [], 3000);
            },
            onLogin() {
                this.errors = [];

                if (!this.email) {
                    this.errors.push('Email is required.');
                    this.mainanimation();
                }
                if (!this.password) {
                    this.errors.push('Password is required.');
                    this.mainanimation();
                }
                if (!this.errors.length) {
                    const data = {
                        email: this.email,
                        password: this.password,
                    }
                    axios.post('auth/login', data).then(response => {
                        this.$router.push({
                            name: 'home',
                            params: {
                                search: true
                            }
                        });
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }

            },
            onRegister() {
                //    console.log('registerwork');
                this.errors = [];
                if (!this.username) {
                    this.errors.push('Username is required.');
                    this.mainanimation();
                }
                if (!this.registeremail) {
                    this.errors.push('Email is required.');
                    this.mainanimation();
                }
                if (!this.registerpassword) {
                    this.errors.push('Password is required.');
                    this.mainanimation();
                }
                if (!this.passwordagain) {
                    this.errors.push('Password Confirmation is required.');
                    this.mainanimation();
                }

                if (this.registerpassword !== this.passwordagain) {
                    this.errors.push('Passwords do not match.');
                    this.mainanimation();
                }
                // console.log(this.errors);
                if (!this.errors.length) {
                    const data = {
                        username: this.username,
                        email: this.registeremail,
                        password: this.registerpassword,
                        passwordagain: this.passwordagain,

                    }

                    axios.post('auth/register', data).then(response => {
                        this.$router.push({
                            name: 'home',
                            params: {
                                search: true
                            }
                        });
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }

            },
            anchorsignin() {
                this.loginbox = true;
                this.registerbox = false;
                this.forforget = false;
                this.signheading = 'Sign In To Admin';
                this.signpara = 'Enter your details to login to your account:';
                this.anothersigngoogle = "Sign in with Google";
                this.anothersignfacebook = "Sign in with Facebook";
            },
            anchorsignup() {
                this.loginbox = false;
                this.registerbox = true;
                this.forforget = false;
                this.signheading = 'Sign Up To Admin';
                this.signpara = 'Enter your details to Register to your account:';
                 this.anothersigngoogle = "Sign up with Google";
                this.anothersignfacebook = "Sign up with Facebook";
            },
            anchorforget() {
                this.loginbox = false;
                this.registerbox = false;
                this.forforget = true;
                this.signheading = 'Forgot Password!';
                this.signpara = 'Enter your email to generate to your password:';

            },
            sentToken() {
                this.errors = [];
                if (!this.emailforget) {
                    this.errors.push('Email address is requred');
                    this.mainanimation();
                }

                if (!this.errors.length) {
                    const data = {
                        email: this.emailforget
                    }
                    axios.post('auth/send-token', data).then(response => {
                        // console.log('email sent.');
                        this.signheading = 'Token';
                        this.signpara = 'Enter your token for generate your password:';
                        this.isActive = true;
                        this.errors.push('Email has been sent, Please check you email.');
                        this.forforget = false;
                        this.forvalidate = true;
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }

            },
            validateToken() {

                this.errors = [];

                if (!this.token) {
                    this.erros.push('Token is Required');
                    this.mainanimation();
                }
                if (!this.errors.length) {
                    const data = {
                        token: this.token
                    }
                    axios.post('auth/validate-token', data).then(response => {
                        // console.log('email sent.');

                        if (response.data.id) {
                            this.signheading = 'Change Password!';
                            this.signpara = 'Enter your password:';
                            this.user = response.data;
                            this.isActive = true;
                            this.errors.push('Success!');
                            this.forvalidate = false;
                            this.forchangepassword = true;

                        }
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });

                }

            },
            changePassword() {
                this.errors = [];

                if (!this.newpassword) {
                    this.errors.push("New password is required.");
                    this.mainanimation();
                }

                if (!this.passwordagain) {
                    this.errors.push("Password confirmation is required.");
                    this.mainanimation();
                }

                if (this.newpassword !== this.passwordagain) {
                    this.errors.push("Passwords do not match.");
                    this.mainanimation();
                }

                if (!this.errors.length) {
                    const data = {
                        password: this.newpassword,
                        user_id: this.user.id
                    };

                    axios.post('auth/reset-password', data).then(response => {
                        this.isActive = true;
                        this.errors.push("Passwords has been successfully changed.");
                        this.forchangepassword = false;
                        this.anchorsignin();
                        // console.log('success');

                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });

                }

            }

        }
    }

</script>