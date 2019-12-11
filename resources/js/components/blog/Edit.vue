<template>
    <div>
        <div class="alert alert-success" v-if="updated">
            <h3>Data Updated succefully</h3>
        </div>
        <h3>Edit Post Page</h3>
        <div class="form-group">
            <label class="label" for="title">Title</label>
            <input :class="['input form-control',{'is-danger':errors.title}]" id="title"   type="text" placeholder="Title" v-model="post.title" >
            <small v-if="errors.title">{{errors.title[0]}}</small>
        </div>
        <div class="form-group">
            <label class="label" for="text">Text</label>

            <textarea  id="text" :class="[{'is-danger':errors.text},'input form-control']"  placeholder="Text" v-model="post.text"></textarea>
            <small v-if="errors.text">{{errors.text[0]}}</small>
        </div>
        <div class="form-group" >

            <div><h3>Categories</h3></div>
            <div v-for="(cats,index) in categories">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" :id="'cat'+cats.id" :value="cats.id" v-model="list.categories">
                    <label class="form-check-label" :for="'cat'+cats.id">{{cats.title}}</label>
                </div>
            </div>


        </div>

            <button class="btn btn-primary is-success" @click="save">Save</button>

    </div>
</template>

<script>
    export default{
        props: ['postId'],
        data(){
            return{
                list:{
                    title:'',
                    text:'',
                    categories:[],
                },
                errors:{},
                categories:'',
                post:{},
                isChecked:true,
                updated:false
            }
        },
        created(){
          this.getAllCategories();

        },
        mounted(){
            this.fetchPost();
        },
        methods:{
            save(){
                axios.put('/post/update',{
                    'id':this.post.id,
                    'title':this.post.title,
                    'text':this.post.text,
                    'categories':this.list.categories
                })
                .then(
                    (response)=> {
                        console.log(response.data)
                        if(response.data == 'update-success'){
                            this.updated = true;
                        }
                }
                ).catch(
                (error)=>{
                    console.log(error)
                    this.errors = error.response.data.errors
                }
                );
            },
            getAllCategories(){
                axios.get('/categories').then(
                    (response)=>{
                        this.categories = response.data
                    }
                ).catch(
                    (error)=>{
                        console.log(error)
                    }
                );
            },
            fetchPost() {
                axios.get('/post/edit/'+this.postId)
                    .then(
                        response => {this.post = response.data;console.log(this.post)}
                    ).catch(error => console.log('Has error'));
            },

        }
    }
</script>