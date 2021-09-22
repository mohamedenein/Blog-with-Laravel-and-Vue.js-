<template>
    <div>
        <form  @submit.prevent="submitForm">
            Post Title:<br/>
            <input type="text" class="form-control" v-model="fields.title"><br/>
            Post Text:<br/>
            <textarea rows="10" class="form-control" v-model="fields.body"></textarea><br/>
            Category:<br/>
            <select class="form-control" v-model="fields.category_id">
                <option value="">==Please Choose Categories ==</option>
                <option v-for="category in categories" :value="category.id">{{ category.name}}</option>
            </select>
            <br/>
            <button class="btn btn-primary">Save Post</button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            categories: {},
            fields: {
                title: '',
                body: '',
                category_id: ''

            },
        }
    },

    mounted(){
        axios.get('/api/categories').then(response => {
            this.categories = response.data.data
        })
    },

    methods: {
        submitForm(){
            axios.post('/api/post/create', this.fields).then(response => {
                this.$router.push('/')
            })
            console.log(this.fields);
        }
    }

}
</script>
