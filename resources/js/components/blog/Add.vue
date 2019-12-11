<template>
    <div>

        <div class="form-group">
            <label class="label" for="title">Title</label>
            <input :class="['input form-control',{'is-danger':errors.title}]" id="title"   type="text" placeholder="Title" v-model="list.title">
            <small v-if="errors.title">{{errors.title[0]}}</small>
        </div>
        <div class="form-group">
            <label class="label" for="text">Text</label>

            <textarea  id="text" :class="[{'is-danger':errors.text},'input form-control']"  placeholder="Text" v-model="list.text"></textarea>
            <small v-if="errors.text">{{errors.text[0]}}</small>
        </div>
        <div class="form-group" v-for="(cats,index) in categories">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" :id="'cat'+cats.id" :value="cats.id" v-model="list.categories">
                <label class="form-check-label" :for="'cat'+cats.id">{{cats.title}}</label>
            </div>

        </div>

            <button class="btn btn-primary is-success" @click="save">Save</button>

    </div>
</template>

<script>
    export default{
        data(){
            return{
                list:{
                    title:'',
                    text:'',
                    categories:[],
                },
                errors:{},
                categories:''
            }
        },
        created(){
          this.getAllCategories();
        },
        methods:{
            save(){
                axios.post('/post/add',this.list)
                .then(
                    (response)=> {
                        console.log(response)
                        this.list = {
                            title:'',
                            text:'',
                            categories:[],
                        }
                        this.$router.push('/blog')
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
            }

        }
    }
</script>