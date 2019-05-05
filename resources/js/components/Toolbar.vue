<template>
    <v-toolbar>
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
        <v-toolbar-title>The Little Red Hen</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">
            <router-link to="/forum">
                <v-btn flat>Forum</v-btn>
            </router-link>
            <v-btn flat>Ask Question</v-btn>
            <v-btn flat>Category</v-btn>
            <router-link to="/login">
                <v-btn flat>Login</v-btn>
            </router-link>

            <!-- <router-link class="white--text" to="/login">Login</router-link> -->
        </div>
    </v-toolbar>
</template>

<script>
export default {

}
</script>

<style>

</style>
