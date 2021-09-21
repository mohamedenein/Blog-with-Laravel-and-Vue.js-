<template>
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
        <tr v-for="post in posts">
            <td>{{ post.id }}</td>
            <td><router-link :to="'/post/' + post.slug">{{ post.title }}</router-link></td>
            <td>{{ post.body }}</td>
            <td>{{ post.created_at }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            posts: {},
        }
    },

    mounted() {
        axios.get('/api/posts').then(response=>{
            this.posts = response.data.data
        })
        console.log(this.posts);
    }
}
</script>
