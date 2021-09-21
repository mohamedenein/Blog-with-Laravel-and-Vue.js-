<template>
<div>
    <table class="table table-striped table-hover" style="margin-top: 20px;">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">body</th>
            <th scope="col">Publish date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts.data">
            <td>{{ post.id }}</td>
            <td><router-link :to="'/post/' + post.slug">{{ post.title }}</router-link></td>
            <td>{{ post.body.substring(0,30) }}</td>
            <td>{{ post.created_at }}</td>
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
        }
    },

    mounted() {
        this.getResults();
    },

    methods:{
        getResults(page = 1) {
            axios.get('/api/posts?page=' + page)
                .then(response => {
                    this.posts = response.data;
                });
        }
    }
}
</script>
