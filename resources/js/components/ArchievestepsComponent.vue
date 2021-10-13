<style scoped>
 .card {
        margin-bottom: 2.2rem;
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        -webkit-transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
        transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
    }
    #table-userslist .table-responsive {
    overflow-x: visible;
}
label {
    color: #475F7B;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 500;
}
.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
}
.table thead th {
    color: #475F7B;
    font-size: 12px;
    letter-spacing: 1px;
    text-transform: uppercase;
}
#users-list-datatable tr td, select#users-list-verified {
    font-size: 14px;
}
#users-list-datatable_info {
    font-size: 14px;
    color: #727E8C;
}
.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin: 2px 0;
    white-space: nowrap;
    justify-content: flex-end;
}
#users-list-datatable_paginate ul li {
    font-size: 13px;
}
.pagination .page-item.previous.disabled .page-link {
    background-color: #F2F4F4;
}
.pagination .page-item.previous .page-link {
    border: 1px solid #DFE3E7;
    border-radius: .267rem;
}
.pagination .page-item.active .page-link, .pagination .page-item.active .page-link:hover {
    border-radius: .267rem;
    background-color: #5A8DEE !important;
    color: #FFF;
}
#users-list-datatable_filter{
    text-align: right;
}
.kea-barfunnelsearch {
    margin: 0;
    padding: 0;
    list-style: none;
    float: left;
}
.kea-barfunnelsearch li a:hover {
    color: #000;
}
.kea-barfunnelsearch li a{
    color: #727E8C;
}
.kea-barfunnelsearch li{
    display: inline-block;
}
.kea-barfunnelsearch li a{
    border: 1px solid #DFE3E7;
    cursor: pointer;
    display: inline-block;
    color: #727E8C;
    text-align: center;
    vertical-align: middle;
    background-color: transparent;
    padding: .467rem 1rem;
    font-size: 14px;
    line-height: 1.6rem;
    border-radius: .267rem;
}
.kea-barfunnelsearch li.active {
    box-shadow: 0 1px 6px 1px rgb(216 200 152 / 71%);
}
</style>
<template>
  <div id="archievesteps">
      <div class="container-fluid">
          <div class="row whitefunnel pb-5 loadEffect">
              <div class="col-md-12 mb-5">
                  <ul class="kea-barfunnelsearch">
                        <li >
                            <router-link to="funnel">
                                <i class="fas fa-filter"></i> All Funnel
                            </router-link>
                        </li>
                        <li class="active">
                            <router-link to="archieve-steps">
                                <i class="fas fa-archive"></i> Archived
                            </router-link>
                        </li>
                        <li>
                            <router-link to="marketplace">
                                <i class="fas fa-store"></i> Marketplace
                            </router-link>
                        </li>
                    </ul>
              </div>
                <div class="col-md-12">
                    <h4>Your Archive Funnel Steps</h4>
                    <br>
                    <section class="users-list-wrapper" id='table-userslist'>
                        <div class="users-list-table">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <div id="users-list-datatable_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="users-list-datatable_length">
                                                        <label>Show <select name="users-list-datatable_length"
                                                                aria-controls="users-list-datatable"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="users-list-datatable_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder="Search By Product"
                                                                aria-controls="users-list-datatable"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="users-list-datatable" class="table dataTable no-footer"
                                                        role="grid" aria-describedby="users-list-datatable_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="username: activate to sort column ascending"
                                                                    style="width: 110.325px;">Funnel</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="name: activate to sort column ascending"
                                                                    style="width: 158.062px;">Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="last activity: activate to sort column ascending"
                                                                    style="width: 112.725px;">Created At</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                    aria-label="edit" style="width: 38.1px;">Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td>123456</td>
                                                                <td>Optin</td>
                                                                <td>Wed, 03 Mar 2021 00:36:31 -0500</td>
                                                                <td><a href=""><i class="fas fa-trash-restore"></i> Restore</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                        role="status" aria-live="polite">Showing 1 to 10 of 36 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="users-list-datatable_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="users-list-datatable_previous"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="users-list-datatable_next"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
      </div>
  </div>
</template>

<script>
export default {

}
</script>