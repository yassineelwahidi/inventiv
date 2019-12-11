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

                        <div  class="text-muted mt-2" v-if="post.published_by != null" ref="tt" >
                            Publié par: <span class="badge badge-secondary ml-1 p-2 " >{{post.published_by.name}}</span>
                            <div :id="'publishedsuccess'+post.id" ></div>
                        </div>
                        <div class="text-muted mt-2" v-else>
                            <p><a href="javascript:;" v-on:click="publishPost(post.id, index)" :id="'publish'+post.id" class="btn btn-success mt-3 mr-2">Publish</a></p>
                        </div>
                    <p><a href="javascript:;" v-on:click="deletePost(post.id, index)" class="btn btn-danger mt-1">Delete</a></p>
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
                },
                deletePost(postid,index){
                    axios.delete('/post/delete/'+postid)
                        .then(resp => {
                            if(resp.data == true)
                                this.posts.splice(index, 1)
                        })
                        .catch(error => {
                            console.log(error);
                        })
                },
                publishPost(postid,index){
                    axios.post('/post/publish/'+postid)
                        .then(resp => {
                            if(resp.data == true){
                                this.posts[index].published_by = {
                                    name : 'Vous meme'
                                };
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            }
    }
</script>

