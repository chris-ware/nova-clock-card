<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl te text-80 font-light" v-text="time"></h1>
            <p class="text-center font-light" v-text="date"></p>
        </div>
    </card>
</template>

<script>
    export default {
        props: ['card'],

        data: () => {
            return {
                time: 'Nova Clock Card',
                date: '',
                timezone: 'UTC'
            };
        },

        methods: {
            updateCurrentTime: function () {
                this.datetime = moment().tz(this.timezone);
                this.time = this.datetime.format('LTS');
                this.date = this.datetime.format('dddd, MMMM Do YYYY');
            },
            startInterval: function () {
                const _this = this;
                setInterval(
                function () {
                    return _this.updateCurrentTime();
                }, 1000);
            }
        },
        mounted() {

            Nova.request().get('/nova-vendor/nova-clock-card/timezone').then(response => {
                this.timezone = response.data;
                this.updateCurrentTime();
                this.startInterval();
            });

        }
    }
</script>
