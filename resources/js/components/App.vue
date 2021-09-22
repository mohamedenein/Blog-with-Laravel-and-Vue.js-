<template>
    <div class="container" style="margin-top: 20px">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <router-link to="/" class="btn btn-link">Posts List</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/posts/create" class="btn btn-link">Create Post</router-link>
            </li>
        </ul>
       <div>
           <router-view></router-view>
       </div>
    </div>
</template>
<script>
</script>
