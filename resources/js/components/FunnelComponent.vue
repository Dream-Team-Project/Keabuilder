<template>

    <div id="funnelcontainer" class="insidecont">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                   <router-link to="build-funnel"> <button class="btn btn-primary">
                       <i class="far fa-plus-square"></i> Build A Funnel
                       </button>
                   </router-link>
                </div>
                <div class="col-md-10">
                    <ul class="kea-barfunnelsearch">
                        <li class="active">
                            <div>
                                <i class="fas fa-filter"></i> All Funnel
                            </div>
                        </li>
                        <li>
                            <div>
                                <i class="fas fa-archive"></i> Archived
                            </div>
                        </li>
                        <li>
                            <div>
                                <i class="fas fa-store"></i> Marketplace
                            </div>
                        </li>
                    </ul>
                    <fieldset class="form-group position-relative has-icon-left kea-barfieldset">
                        <input type="text" class="form-control" id="email-search" placeholder="Search funnel">
                        <div class="form-control-position">
                            <i class="fab fa-searchengin"></i>                        
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="" >
                <draggable
                        :steps="steps"
                        :disabled="!enabled"
                        class="steps-group row keabuilder-container mt-5"
                        ghost-class="ghost"
                        @start="dragging = true"
                        @end="draggingend"
                    >
                    <div class="col-md-3 loadEffect"  v-for="(value,index) in funnels" :key="index">
                        <div class=" keabuilder-board">
                            <header class="keabuilder-board-header">
                                <div class="keabuilder-title-board line-ellipsis"><span>{{funnels[index]['name']}}</span> <input type="text" v-model="funnels[index]['name']"></div>
                                <div class="btn-group">
                                    <div class="cursor-pointer dropdownMenuButton" role="button">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <div class="dropdown-menu" >
                                            <a class="dropdown-item keabuilder-edit" href="javascript:void(0);">
                                                <i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i> Edit
                                            </a>
                                            <a class="dropdown-item keabuilder-copy" href="javascript:void(0);">
                                                <i class="fas fa-link mr-2"></i> Copy Link
                                            </a>
                                            <a class="dropdown-item keabuilder-duplicate" href="javascript:void(0);">
                                                <i class="far fa-clone mr-2"></i> Duplicate
                                            </a>
                                            <a class="dropdown-item keabuilder-changepath" href="javascript:void(0);">
                                                <i class="fas fa-pen-fancy mr-2"></i> change path
                                            </a>
                                            <a class="dropdown-item keabuilder-delete" href="javascript:void(0);">
                                                <i class="far fa-trash-alt mr-2"></i> Archive
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div v-for="(value2,index2) in funnels[index]['steps']" :key="index2">
                                    <div class="keabuilder-item is-moving" :data-border="funnels[index]['steps'][index2]['color']">{{funnels[index]['steps'][index2]['title']}}
                                        <div class="keabuilder-footer d-flex justify-content-between mt-3">
                                        <div class="keabuilder-footer-left d-flex">
                                            <div class="keabuilder-due-date d-flex align-items-center mr-50">
                                                <i class="far fa-clock"></i> <span
                                                    class="font-size-small">{{funnels[index]['steps'][index2]['updatedat']}}</span></div>
                                            <div class="keabuilder-comment d-flex align-items-center mr-50">
                                                <i class="fas fa-puzzle-piece"></i> <span
                                                    class="font-size-small">{{funnels[index]['steps'][index2]['variation']}}</span>
                                                    </div>
                                            <div class="keabuilder-attachment d-flex align-items-center">
                                                <i class="fas fa-tags"></i> <span
                                                    class="font-size-small">{{funnels[index]['steps'][index2]['tag']}}</span></div>
                                        </div>
                                        <div class="keabuilder-footer-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>

                </draggable>


            </div>
        </div>
    </div>

</template>

<script>
export default {
  data() {
    return {
      show: false,
      funnels:[

          {
            id:'1',  
            name:'Marketing',
            steps:[
                {
                title:'Facebook Campaign 😎',
                updatedat:'Feb 6',
                variation:'1',
                tag:'campaign',
                color:'success',
                },
                 {
                title:'Social Media Graphics',
                updatedat:'Feb 8',
                variation:'0',
                tag:'graphic, media',
                color:'warning',
                },
                 {
                title:'Database Management System (DBMS) is a collection of programs',
                updatedat:'Mar 6',
                variation:'1',
                tag:'DBMS, program',
                color:'info',
                }
            ],
          },
          {
            id:'2',  
            name:'Developing',
            steps:[
                {
                title:'Sales page',
                updatedat:'Feb 6',
                variation:'1',
                tag:'campaign',
                color:'secondary',
                },
                {
                title:'Upsell 1',
                updatedat:'Feb 8',
                variation:'0',
                tag:'graphic, media',
                color:'primary',
                },
                {
                title:'Upsell 2',
                updatedat:'Mar 6',
                variation:'0',
                tag:'graphic, media',
                color:'primary',
                },
                {
                title:'Downsell 1',
                updatedat:'Feb 6',
                variation:'1',
                tag:'DBMS, program',
                color:'info',
                },
                {
                title:'Downsell 2',
                updatedat:'Feb 6',
                variation:'1',
                tag:'DBMS, program',
                color:'danger',
                },
                {
                title:'Thank you',
                updatedat:'Feb 6',
                variation:'1',
                tag:'DBMS, program',
                color:'info',
                }
            ],
          },
          {
            id:'3',  
            name:'Webinar',
            steps:[
                {
                title:'Webinar Registration',
                updatedat:'Feb 6',
                variation:'1',
                tag:'campaign',
                color:'success',
                },
                 {
                title:'Webinar Confrimation',
                updatedat:'Feb 8',
                variation:'0',
                tag:'graphic, media',
                color:'primary',
                },
                 {
                title:'Thank you',
                updatedat:'Mar 6',
                variation:'1',
                tag:'DBMS, program',
                color:'info',
                }
            ],
          },
           {
            id:'4',  
            name:'kea Ebook',
            steps:[
                {
                title:'kea Customer Optin',
                updatedat:'Feb 6',
                variation:'1',
                tag:'optin',
                color:'danger',
                },
                 {
                title:'kea Customer Variation',
                updatedat:'Feb 8',
                variation:'0',
                tag:'variation, media',
                color:'warning',
                },
                 {
                title:'Thank you',
                updatedat:'Mar 6',
                variation:'1',
                tag:'DBMS, program',
                color:'secondary',
                }
            ],
          },

      ],
       enabled: true,
       dragging: false,

    }
  },
  mounted() {
    this.show = true;
  },
    methods: {
        draggingend(e){
            this.dragging = false;
        },
    }
}

</script>

<style scoped>
.keabuilder-board {
    position: relative;
    float: left;
    background: #e2e4e6;
    transition: all .3s cubic-bezier(.23,1,.32,1);
}
.keabuilder-container .keabuilder-board {
    border-radius: 0.267rem;
    background-color: #e7edf3;
    width: 100%;
    height: 340px;
    overflow-y: scroll;
}
/* width */
.keabuilder-container .keabuilder-board::-webkit-scrollbar{
    width: 5px;
  }
  
  /* Track */
  .keabuilder-container .keabuilder-board::-webkit-scrollbar-track{
    background: transparent; 
  }
   
  /* Handle */
  .keabuilder-container .keabuilder-board::-webkit-scrollbar-thumb {
    background: #e2e2e2; 
  }

.keabuilder-container .keabuilder-board .keabuilder-board-header {
    font-size: 1.2rem;
    color: #475F7B;
    padding: 13px;
    display: flex;
    justify-content: space-between;
    cursor: move;
}
.line-ellipsis {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.keabuilder-board main {
    padding: 0px 15px;
}
.keabuilder-board header .keabuilder-title-board {
    font-weight: 700;
    margin: 0;
    padding: 0;
    display: inline;
}
.keabuilder-container .keabuilder-board .keabuilder-board-header .keabuilder-title-board {
    font-weight: normal;
    cursor: text;
    padding: 0 0.5rem;
    width: 200px;
}
.keabuilder-container .keabuilder-board .keabuilder-board-header .dropdown {
    float: right;
}
.dropdown-menu {
    box-shadow: -7px 8px 16px 0 rgb(55 70 95 / 20%);
}
.dropdown-menu .dropdown-item {
    text-transform: uppercase;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: .8rem 1.6rem;
    clear: both;
    color: #475F7B;
    text-align: inherit;
    background-color: transparent;
    border: 0;
}
.dropdown-menu i {
    color: #475F7B;
}
.keabuilder-container .keabuilder-board .keabuilder-drag {
    padding: 13px;
    min-height: auto;
}
.keabuilder-item {
    background: #fff;
    padding: 15px;
    margin-bottom: 20px;
    transition: all .3s cubic-bezier(.23,1,.32,1);
    cursor: pointer;
}
.keabuilder-container .keabuilder-board .keabuilder-item {
    padding: 0.53rem 0.8rem;
    border-radius: 0.267rem;
    margin-bottom: 1rem;
    box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
    position: relative;
    font-size:14px;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=success]:before {
    background-color: #39DA8A;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=warning]:before {
background-color: #FDAC41;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=info]:before {
background-color: #00CFDD;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=primary]:before {
background-color: #5A8DEE;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=secondary]:before {
background-color: #475F7B;
}
.keabuilder-container .keabuilder-board .keabuilder-item[data-border=danger]:before {
background-color: #FF5B5C;
}
.keabuilder-item:hover {
    opacity: 0.7;
}   
.keabuilder-container .keabuilder-board .keabuilder-item:before {
    content: "";
    width: 3px;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 0.5rem;
}
.font-size-small, .dropdownMenuButton i {
    font-size: 12px;
}
.keabuilder-footer i {
    font-size: 10px;
    margin-right: 5px;
    margin-left: 5px;
}
.keabuilder-footer-left >div {
    padding-left: 10px;
    margin-left: -7px;
    border-right: 2px solid #e2e2e2;
    padding-right: 10px;
}
.keabuilder-footer-left >div:last-child {
    border: none;
}
.keabuilder-board-header .dropdown-menu {
    min-width: 120px;
    padding: 0px;
}
.keabuilder-board-header a {
    font-size: 12px;
    padding: 10px!important;
}
.dropdown-item:focus, .dropdown-item:hover {
    color: #475F7B;
    text-decoration: none;
    background-color: #F2F4F4;
}
.dropdownMenuButton:hover .dropdown-menu {
    display: block;
}
.dropdownMenuButton .dropdown-menu {
    top:20px;
    left: -115px;
}
.keabuilder-title-board:hover span {
    display: none;
}
.keabuilder-title-board:hover input {
 display: block;
}

.keabuilder-title-board input {
    display:none;
    background-color: #475F7B;
    color: #FFFFFF;
    border-radius: 0.267rem;
    outline: none;
    text-overflow: clip;
    font-size: 14px;
}
.kea-barfunnelsearch {
    margin: 0;
    padding: 0;
    list-style: none;
    float: left;
}
.kea-barfunnelsearch li:hover {
    color: #000;
}
.kea-barfunnelsearch li {
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
.kea-barfieldset{
    width: 50%;
    float: right;
}
.form-control-position {
    position: absolute;
    top: 2px;
    right: 0;
    display: block;
    width: 2.5rem;
    height: 2.5rem;
    line-height: 2.5rem;
    text-align: center;
    color: rgba(0,0,0,.4);
    cursor: pointer;
}
.has-icon-left .form-control-position {
    right: auto;
}
.has-icon-left .form-control {
    border-color: #DFE3E7;
    font-size: 13px;
    padding: 20px 10px 20px 30px;
}
ul.kea-barfunnelsearch li.active {
    box-shadow: 0 1px 6px 1px rgb(216 200 152 / 71%);
}
</style>
