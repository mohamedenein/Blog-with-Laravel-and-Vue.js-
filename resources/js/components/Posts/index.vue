<template>
<div>
    <div class="card col-md-8 px-0" style="margin-top: 30px;" v-for="post in posts" :key="post.uuid">
        <div class="card-header">{{ post.title }}</div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{ post.body }}</p>
                <p class="lead mb-0"> <router-link :to="'/post/' + post.slug" style="color: #000!important;">Continue reading...</router-link></p>

            </blockquote>
        </div>
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
