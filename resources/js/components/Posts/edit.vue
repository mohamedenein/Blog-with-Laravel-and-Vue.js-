<template>
    <div>
        <form  @submit.prevent="submitForm">
            Post Title:<br/>
            <input type="text" class="form-control" v-model="fields.title"><br/>
            <div class="alert alert-danger" v-if="errors && errors.title">{{ errors.title[0]}}</div>

            Post Text:<br/>
            <textarea rows="10" class="form-control" v-model="fields.body"></textarea><br/>
            <div class="alert alert-danger" v-if="errors && errors.body">{{ errors.body[0]}}</div>

            Category:<br/>
            <select class="form-control" v-model="fields.category_id">
                <option value="">==Please Choose Categories ==</option>
                <option v-for="category in categories" :value="category.id">{{ category.name}}</option>
            </select><br/>
            <div class="alert alert-danger" v-if="errors && errors.category_id">{{ errors.category_id[0]}}</div>

            <button class="btn btn-primary">Save Post</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categories: {},
            fields: {
                title: '',
                body: '',
                category_id: ''
            },
            errors: {},
        }
    },

    mounted() {
        axios.get('/api/categories')
            .then(response => {
                this.categories = response.data.data;
            });

        axios.get('/api/post/'+ this.$route.params.slug)
            .then(response => {
                this.fields = response.data.data;
            });
    },

    methods: {
        submitForm(){
            axios.put('/api/post/update/' + this.$route.params.slug, this.fields).then(response => {
                this.$router.push('/')
            }).catch(error => {
                if(error.response.status === 422){
                    this.errors = error.response.data.errors;
                }

            })
        }
    }
}
</script>
