<template>
<div>
    <select v-model="category_id" class="form-control col-3">
        <option value="">--Choose Category--</option>
        <option v-for="category in categories" :value="category.id">
            {{ category.name}}
        </option>
    </select>
    <table class="table table-striped table-hover" style="margin-top: 20px;">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">body</th>
            <th scope="col">Publish date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts.data">
            <td>{{ post.id }}</td>
            <td><router-link :to="'/post/' + post.slug">{{ post.title }}</router-link></td>
            <td>{{ post.body.substring(0,30) }}</td>
            <td>{{ post.created_at }}</td>
            <td>
                <router-link :to="'/posts/edit/' + post.slug" class="btn btn-success btn-sm">Edit</router-link>
                <button @click="delete_post(post.id)" class="btn btn-danger btn-sm">Delete</button>

            </td>

        </tr>
        </tbody>
    </table>
    <pagination :data="posts" @pagination-change-page="getResults"></pagination>

</div>
</template>

<script>
export default {
    data() {
        return {
            posts: {},
            categories: {},
            category_id:'',
        }
    },

    mounted() {
        axios.get('api/categories').then(response => {
            this.categories = response.data.data
        });
        this.getResults();
    },

    methods:{
        getResults(page = 1) {
            axios.get('/api/posts?page=' + page + '&category_id=' + this.category_id)
                .then(response => {
                    this.posts = response.data;
                });
        },

        delete_post(id) {
            swal({
                title: "Are Your Shure You Want to Delete The Post ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('/api/post/' + id).then(response => {
                        swal("Post Deleted Successfully");
                        this.getResults()
                    })
                } else {
                    swal("Post Not Deleted");
                }
            }).catch(error => {
                swal({
                    icon: 'error',
                    title: 'Error Happened'
                });
            });
        }
    },

    watch: {
        category_id(value){
            this.getResults()
        }
    },
}
</script>
