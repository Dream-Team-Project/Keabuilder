<template>
    <div>
        <vue-page-transition name="fade-in-up" >
            <login-component v-if="login"></login-component>
        </vue-page-transition>

        <div v-if="loginstate">
            <sidebar-component v-if="$route.name != 'builder'"></sidebar-component>
            <vue-page-transition name="fade-in-up" :class="[$route.name == 'dashboard' ? 'bg-gray-100' : '', $route.name != 'builder' ? 'insidecont' : '']">
                <router-view></router-view>
            </vue-page-transition>
        </div>

    </div>    
</template>
<script>

export default{
    data(){
        return{
            login:false,
            loginstate:false,
        }
    },
    created(){
        this.init();
        // this.hide = window.location.pathname != '/login' && window.location.pathname != '/register' ? false : true ;
    },
watch:{
        '$route.params.search': {
        handler: function(search) {
        //    console.log(search+'login');       
            if(search==true){
                this.loginstate = true;
                this.login = false;
            }
        },
            deep: true,
            immediate: true,        
        }
    },
    methods:{
        init(){
            axios.get('auth/init').then(response=>{
                // console.log(response);
                if(response.data.user==null){
                    if(window.location.pathname=='/login'){
                        this.login = true;
                    }else if(window.location.pathname=='/register'){
                        this.login = true;
                    }else{
                        this.$router.push('/login');
                        this.login = true;
                    }
                }else{
                    this.login = false;
                    this.loginstate = true; 
                }
            })
        }
    }
}
</script>