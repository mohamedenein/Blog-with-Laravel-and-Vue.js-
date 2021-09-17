<template>
<div>
    <div class="card col-md-8 px-0" style="margin-top: 30px;">
        <div class="card-header">{{ post.title }}</div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{ post.body }}</p>
            </blockquote>
        </div>
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
