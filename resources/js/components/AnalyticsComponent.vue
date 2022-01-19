<style scoped>
    .kb-ana-card{
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        padding: 20px;
        background:#fff;
    }
</style>
<template>
    <div id="kb-analytics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="kb-ana-card">
                        <img src="/images/heatmap/analytics-front.jpg" alt="" class="img-fluid">
                        <h4 class="mt-2">Kea Analytics</h4>
                        <small>View Your analytics with brand new features.</small>
                        <br>
                        <br>
                        <router-link to="kea-analytics"  class="btn btn-primary">
                            <i class="far fa-eye"></i> View
                        </router-link>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="kb-ana-card">                        
                        <img src="/images/heatmap/heatmap-front.jpg" alt="" class="img-fluid">
                        <h4 class="mt-2">Kea Heat Maps</h4>
                        <small>All new heat maps just for you.</small>
                        <br>
                        <br>
                        <router-link to="heat-maps"  class="btn btn-primary">
                            <i class="far fa-eye"></i> View
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>