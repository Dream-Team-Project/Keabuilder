<style scoped>

</style>
<template>
    <div id="heatmapcomntainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Most Visited Pages</h3>
                    <ol>
                        <li v-for="(visit,index) in visited" :key="index">
                            <a :href="visit['landing_page']+'#kb-heatmaps'" target="_blank">
                                {{visit['landing_page']}}
                            </a>

                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visited:[]
        }
    }, 
    created() {
        this.init();
    },
    methods: {
        init(){
            axios.get('heatget-request').then(response => {

                // console.log(response);
                this.visited = response.data;

            }).catch(error => {
                console.log(error.response.data.error);
            });
        }
    },
}
</script>