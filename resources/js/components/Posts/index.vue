<template>
    <div>
        <div v-for="post in posts" :key="post.uuid">
            <a href="">
                <h1>{{ post.title }}</h1>
            </a>

        </div>
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
        axios.get('/api/posts').then(response=>{
            this.posts = response.data.data
        })
    }
}
</script>
