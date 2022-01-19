<style scoped>
    label {
        color: #475F7B;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 500;
    }
    #users-list-datatable tr td, select#users-list-verified {
        font-size: 14px;
    }
    .card{
        margin-bottom: 2.2rem;
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
    }
    #table-userslist .table-responsive{
        overflow-x: visible;
    }
    .dataTables_wrapper div.dataTables_length select{
        width: auto;
        display: inline-block;
    }
    #users-list-datatable_filter{
        text-align: right;
    }
    .dataTables_wrapper div.dataTables_filter input{
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
    #users-list-datatable_info{
        font-size: 14px;
        color: #727E8C;
    }
    .dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-end;
    }
    .disabled, .disabled a, :disabled, :disabled a{
        color: #828D99 !important;
    }
    .pagination .page-item.first .page-link, .pagination .page-item.last .page-link, .pagination .page-item.next .page-link, .pagination .page-item.previous .page-link {
        padding: 0.435rem 0.5rem;
    }
    .pagination .page-item.previous.disabled .page-link{
        background-color: #F2F4F4;
    }
    .pagination .page-item.previous .page-link{
        border: 1px solid #DFE3E7;
        border-radius: 0.267rem;
    }
    #users-list-datatable_paginate ul li{
        font-size: 13px;
    }
    .pagination .page-item.previous {
        margin-right: 0.3571rem;
    }
    .pagination .page-item.next{
        margin-left: 0.3571rem;
    }
    .pagination .page-item.active .page-link, .pagination .page-item.active .page-link:hover {
        border-radius: 0.267rem;
        background-color: #5A8DEE !important;
        color: #FFF;
    }
    .pagination .page-item .page-link {
        border: 1px solid #DFE3E7;
        border-right: 0;
        border-left: 0;
        color: #324356;
        background-color: transparent;
        font-weight: 600;
    }
    .pagination .page-item.next .page-link{
        border: 1px solid #DFE3E7;
        border-radius: 0.267rem;
    }

    .pagination .page-item.previous~.page-item:nth-last-child(-n+2) .page-link {
        border-right: 1px solid #DFE3E7;
        border-top-right-radius: 0.267rem;
        border-bottom-right-radius: 0.267rem;
    }
    .pagination .page-item.first .page-link, .pagination .page-item.last .page-link, .pagination .page-item.next .page-link, .pagination .page-item.previous .page-link {
        color: #5A8DEE;
        padding: 0.435rem 0.5rem;
    }




</style>
<template>
  <div id="onlyforcontacts">
    <div class="container-fluid">
        <div class="row whitefunnel pt-3 pb-5 loadEffect" >
                <div class="col-md-12">
                    <section class="users-list-wrapper" id='table-userslist'>
                        <div class="users-list-filter px-1">
                            <form class="container-fluid">
                                <div class="row border rounded py-2 mb-2">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-verified">Showing Contacts for</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-verified">
                                                <option value="Yes">Last 7 Days</option>
                                                <option value="" selected>Last 30 Days</option>
                                                <option value="Yes">Last 2 Months</option>
                                                <option value="No">This Year</option>
                                                <option value="No">All Time</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-role">Steps</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-role">
                                                <option value="">All Funnel Steps</option>
                                                <optgroup label="Funnel Steps">
                                                    <option value="User">Optin</option>
                                                    <option value="Staff">Thank you</option>
                                                </optgroup>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2"><i
                                                class="far fa-check-circle"></i> Apply</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2"><i
                                                class="fas fa-download"></i> Download Contacts</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                                                    style="width: 110.325px;">Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="name: activate to sort column ascending"
                                                                    style="width: 158.062px;">Email</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="last activity: activate to sort column ascending"
                                                                    style="width: 112.725px;">Sign Up</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                    aria-label="edit" style="width: 38.1px;">edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd" v-for="(value,index) in mycontacts" :key="index">
                                                                <td><a v-bind:href="'mailto:'+mycontacts[index]['email']">{{mycontacts[index]['name']}}</a></td>
                                                                <td>{{mycontacts[index]['email']}}</td>
                                                                <td>{{mycontacts[index]['sign_up']}}</td>
                                                                <td><a href=""><i class="fas fa-user-edit"></i></a></td>
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
  data() {
    return {
      mycontacts:[
          {
            id:1,  
            name:'Dean Stanley',
            email:'DeanStanley@gmail.com',
            sign_up:'30/04/2021	',
          },{
            id:2,  
            name:'Josh Stanley',
            email:'joshStanley@gmail.com',
            sign_up:'30/04/2020	',
          },{
            id:3,  
            name:'Great Stanley',
            email:'greatStanley@gmail.com',
            sign_up:'30/04/2019	',
          },
      ]

    }
  }
}
</script>