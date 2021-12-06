<style scoped>
    .kb-ana-card{
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        padding: 20px;
        background:#fff;
    }
    #kb-analytics{
       background: #f2f4f4;
    }
</style>
<template>
    <div id="kb-analytics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="kb-ana-card">
                        <h4>Kea Analytics</h4>
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
                        <h4>Kea Heat Maps</h4>
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