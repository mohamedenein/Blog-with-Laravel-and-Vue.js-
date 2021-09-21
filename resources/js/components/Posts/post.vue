<template>
<div>
    <div class="card text-center" style="margin">
        <div class="card-header">Post Details</div>
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.body }}</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
        <div class="card-footer text-muted">Published at {{ post.created_at }}</div>
    </div>

</div>
</template>
<script>
export default {
    data() {
        return {
            post: {},
        }
    },
    mounted()
    {
        axios.get('/api/post/' + this.$route.params.slug)
             .then(response => (this.post = response.data.data))
    },
}
</script>
