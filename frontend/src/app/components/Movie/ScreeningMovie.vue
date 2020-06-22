<template>
    <div>
        <b-tabs content-class="mt-3">
            <b-tab v-for="item in this.week" :key="item" :title="item" active>
            <ScheduleBox v-for="movie in movieList[item]" :key="movie.movie_id" :movie="movie"></ScheduleBox>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>

    import ScheduleBox from "./ScheduleBox";

    export default {
        components: {
            ScheduleBox
        },
        props: ['week', 'movieList']
    }
</script>

<style scoped>

</style>
