<template>
    <div>
        <div class="mb-3 text-right">
            <router-link to="/post/add" class="btn btn-secondary pull-right">Add new post</router-link>
        </div>
        <div v-for="(post,index) in posts" :key="index">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{post.title}}</h3>
                    <p class="card-text">{{post.text.substr(0,200)}}</p>
                        <div class="text-muted">
                            Categorie:
                            <span v-for="(category,index) in post.categories">
                            <span class="badge badge-secondary ml-1 p-2">{{category.title.substr(0,10)}}</span>
                        </span>
                        </div>
                        <div class="text-muted mt-2">
                            Crée par: <span class="badge badge-secondary ml-1 p-2">{{post.created_by.name}}</span>
                        </div>
                        <div class="text-muted mt-2" v-if="post.published_by != null">
                            Publié par: <span class="badge badge-secondary ml-1 p-2">{{post.published_by.name}}</span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                posts:{}
            }
        },
            created(){
                this.getPosts();
            },
            methods:{
                getPosts(){
                    axios.get('/posts').then(res => {
                        this.posts = res.data
                        console.log(res)
                    }).catch(err => {
                        console.log(err)
                    })
                }
            }
    }
</script>

