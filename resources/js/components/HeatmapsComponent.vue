<style scoped>
.kb-mt-tp-2{
    margin-top: -20px;;
}
.kb-heatmapnew{
    font-size: 75px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    top: 75%;
    left: 33%;
}
.kb-heatmapnew span {
    font-size: 22px;
    color: #d8c898;
}
.kb-findsection > div{
    background: linear-gradient(to left,#d8c898 ,#2c2c28);
    color: #fff;
    padding: 50px;
    border-radius: 6px;
}
.kb-findsection input {
    width: 91%;
    height: 45px;
    border-radius: 64px 0px 0px 64px;
    border: 0;
    padding: 0px 20px;
}
.kb-findsection button {
    background-image: linear-gradient(to bottom,#337ab7 0,#265a88 100%);
    color: #fff;
    border: navajowhite;
    padding: 11px 20px;
    border-radius: 0px 64px 64px 0px;
}
.kb-mostvisitpage h3 {
    background: linear-gradient(to left,#d8c898 ,#2c2c28);
    color: #fff;
    padding: 10px 30px;
    margin: 0px 33px 0px;
    border-radius: 6px 6px 0px 0px;
}
.kb-mostvisitpage ol {
    margin: 0px 32px;
    background: #f2f4f4;
    padding: 43px;
}
.kb-mostvisitpage ol li {
    background: rgb(255 255 255 / 60%);
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 10px;
}
.kb-mostvisitpage ol li a {
    color: #6f6954;
}

</style>
<template>
    <div id="heatmapcomntainer">
        <div class="container-fluid">
            <div class="row kb-mt-tp-2">
                <div class="col-md-12">
                    <img src="/images/heatmap/bk-heatmap.jpg" class="img-fluid" alt="">
                    <p class="kb-heatmapnew"><span>ALL NEW</span> HEATMAPS</p>
                </div>
            </div>
            <div class="row p-5 kb-findsection">
                <div class="col-md-12">
                    <h3>Enter a URL on your site to start with...</h3>
                    <p>You can easily monitor your user behavior.</p>
                    <input type="text" placeholder="e.g. http://.com/page.html" id="inpurl"><button @click="settheurl">View</button>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12 kb-mostvisitpage">
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
            visited:[],
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
        },
        settheurl(){
            var inputval = document.getElementById('inpurl').value;
            if(inputval!=''){
                window.open(inputval+'#kb-heatmaps','_blank');
            }
        }
    },
}
</script>