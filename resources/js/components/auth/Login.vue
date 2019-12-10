<template>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="email" placeholder="Email" v-model="email" class="form-control" >
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="password" placeholder="Password" v-model="password" class="form-control" >
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <button @click="login()" class="btn btn-primary" >Login</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default{
        data(){
            return{
                email:'',
                password:'',
            }
        },
        methods:{
            login(){
                console.log(this.name)
            }
        }
    }
</script>