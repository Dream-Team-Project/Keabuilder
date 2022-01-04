<style scoped>
#pagesinsidepage{
  padding:20px;
}
.cardpage >div{
    box-shadow: -10px 15px 30px 0 rgb(25 42 70 / 13%);
    padding: 20px;
    border-radius: 8px;
}
.pagemainlink a {
    font-size: 14px;
    float: right;
    margin-left: 20px;
    padding-bottom: 10px;
    color: #7E8299;
    border-bottom: 1px solid #7E8299;
    transition:.5s ease-in-out;
}
.pagemainlink a.active{
  color:#d8c898;
  border-bottom: 1px solid #d8c898;
}
.keabuilder-title-board {
  padding: 15px 0px;
}
.keabuilder-title-board input {
    display:none;
    background-color: #475F7B;
    color: #FFFFFF;
    border-radius: 0.267rem;
    outline: none;
    text-overflow: clip;
    font-size: 14px;
    width:100%;
}
.keabuilder-title-board:hover span {
    display: none;
}
.keabuilder-title-board:hover input {
 display: block;
}
.kb-pagedate {
    font-size: 13px;
    color: #988e71;
}
.kb-page-settting {
    float: right;
    color: #6c757d;
    font-size: 20px;
    padding: 3px;
    cursor: pointer;
    transition: .5s ease-in-out;
}
.kb-page-settting:hover {
    transform: rotate(
30deg);
}
.kb-dropdown__panel {
    position: absolute;
    right: 0px;
    top: calc(100% + -5px);
    min-width: 280px;
    width: auto;
    border-radius: 0.375rem;
    background-color: #fff;
    box-shadow: 0 8px 14px rgb(0 0 0 / 16%), 0 0 4px rgb(0 0 0 / 8%);
    padding: 10px;
    z-index: 9;
}
 .kb-dropdown__panel ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.kb-dropdown__panel li a {
    display: flex;
    align-items: center;
    position: relative;
    width: 100%;
    list-style: none;
    padding: 5px 0px 5px 20px;
    color:#444;
    font-size: 14px;
}
.kb-dropdown__panel li a:hover {
    background-color: #f4f8fa;
}
.kb-border-before {
    border-top: 1px solid #e0e7f1;
}
.statusbadge {
    color: #225d53;
    background-color: #d8c898;
    font-size: 12px;
    padding: 2px 12px;
    border-radius: 50px 0px 0px 50px;
    cursor: pointer;
    transition: .5s ease-in-out;
}
.statusbadge.active2 {
    background-color: #e0e0e0;
}
.statusbadge:hover {
    background-color: #d8c898;
}
.img-fit{
    height: 265px;
    object-fit: cover;
}
.drpdwnfa{
    font-size: 10px;
    opacity: 0.6;
}
.statbadg{
  position: absolute;
    top: 0px;
    right: 13px;
}
.kb-dropdown__status{
    top: 30px;
    min-width: 156px;
}
.pagemainlink a:hover {
  color: #d8c898;
  border-bottom: 1px solid #d8c898;
}
.kb-webpreviewer {
    box-shadow: 0 2px 4px rgb(0 0 0 / 12%), 0 0 2px rgb(0 0 0 / 8%);
    margin: 20px;
    text-align: center;
    width: 80%;
}
.kb-webpreviewer {
    margin: auto;
    box-shadow: 0 2px 4px rgb(0 0 0 / 12%), 0 0 2px rgb(0 0 0 / 8%);
    text-align: center;
    width: 80%;
    padding: 20px;
    border-radius: 8px;
    position: relative;
}
.kb-webpreviewinside {
    position: absolute;
    top: 0px;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(55,63,71,0.5);
    left: 0px;
    border-radius: 8px;
    opacity: 0;
    transition: all 0.2s ease-in-out;
}
.kb-webpreviewer:hover .kb-webpreviewinside {
  opacity: 1;
}
 .kb-weblive {
    color: #054fb8;
    background-color: #e6f4fe;
    position: absolute;
    right: 10px;
    top: 10px;
    padding: 4px 15px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: bold;
    z-index: 1;
    cursor: pointer;
}
.kb-dropdown_livestatus{
    top: 54px;
    min-width: 156px;
}
.kb-card__row{
    display: grid;
    grid-auto-columns: auto;
    grid-auto-flow: column;
}
.kb-sage-body-semi {
    margin: 0;
}
.kbcustom-domain-edit-link {
    font-size: 14px;
}
.kb-card__row a {
    text-align: right;
}
.kb-card__row a {
    width: fit-content;
    display: flex;
    justify-self: right;
    border-radius: 8px;
    padding: 0px 10px;
}
.kb-card__row a:hover{
    background: #e6f4fe;
}
.insideshdw{
    box-shadow: 0 2px 4px rgb(0 0 0 / 12%), 0 0 2px rgb(0 0 0 / 8%);
    padding: 20px;
    border-radius: 8px;
}
.kb-preview-inner {
    display: inline-block;
    border-radius: 4px;
    cursor: pointer;
    border: 1px solid #e5e9ed;
    width: 60px;
    height: 40px;
    margin-top: 10px;
    margin-right: 10px;
    margin-bottom: 0px;
}
hr {
    margin: 21px 0;
    border: 0;
    border-top: 0.0625rem solid #e0e7f1;
}
.kb-upload-card_preview {
    width: 2rem;
    max-width: 11.875rem;
    margin-right: 0;
    text-align: center;
}
.kb-upload-card_dropzone {
    display: flex;
    align-items: center;
    justify-content: center;
    grid-gap: 0.5rem;
    gap: 0.5rem;
    padding: 1.5rem;
    border-radius: 0.375rem;
    flex-flow: column;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='100%25' height='100%25' fill='none' rx='0.375rem' ry='0.375rem' stroke='%23e0e7f1' stroke-width='2' stroke-dasharray='4.5,8.5' stroke-dashoffset='4.5' stroke-linecap='square'/%3E%3C/svg%3E");
}
.kb-upload-card_body {
    display: flex;
    flex-flow: column;
    align-items: center;
    flex: 1 1;
}
.kb-btn-group {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.kb-dropdown_trigger .kb-btn {
    background: transparent;
    border: none;
    text-align: center;
    display: inline-block;
    width: 100%;
    color: #0072ef;
    font-size: 14px;
}
.kb-navmenu{
  background: transparent;
    border: none;
    display: inline;
    width: 100%;
    color: #0072ef;
    font-size: 14px;
    padding: 3px 10px;
    border-radius: 5px;
}
.kb-navmenu:hover {
    background: #e6f4fe;
}
.kb-dropdown_panel {
    position: absolute;
    top: 27px;
    transform-origin: top center;
    min-width: 17.5rem;
    width: auto;
    border-radius: 0.375rem;
    background-color: #fff;
    box-shadow: 0 8px 14px rgb(0 0 0 / 16%), 0 0 4px rgb(0 0 0 / 8%);
    transition: .1s ease-in-out;
    transition-property: transform;
    margin-bottom: 1.5rem;
    z-index: 9;
}
.kb-dropdown_menu {
    overflow: auto;
    min-width: 17.5rem;
    width: auto;
    max-height: 25rem;
    padding: 0.5rem 0;
    margin: 0;
}
.kb-dropdown_item {
    display: flex;
    align-items: center;
    position: relative;
    width: 100%;
    list-style: none;
}
.hide {
    display: none;
}
.kb-dropdown_item-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    font-family: inherit;
    color: inherit;
    box-shadow: none;
    background-color: transparent;
    border: 0;
    cursor: pointer;
    display: flex;
    position: relative;
    align-items: center;
    width: 100%;
    padding: 0.5625rem 1.5rem;
    text-align: left;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none; 
    font-size: 14px;
}
.kb-dropdown_item:hover:hover{
    color: #1c2530;
    background-color: #f4f8fa;
}
.t-kb-body {
    color: #94a6b8;
    font-size: 14px;
    margin: 0;
}
.kb-upload-card_dropzone:hover {
    background-color: #f8fafb;
}
.kb-dropdown {
    position: relative;
}
.kb_second_siteinfo p{
    color: #697887;
    font-size: 14px;
}



.kb-sortable {
    padding: 0;
    margin:0;
    list-style: none;
}
.kb-sortable__item:first-child {
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
    border-top: 0.0625rem solid #e0e7f1;
}
.kb-sortable__item {
    padding: 0.5rem 1rem;
    border-bottom: 0.0625rem solid #e0e7f1;
    border-left: 0.0625rem solid #e0e7f1;
    border-right: 0.0625rem solid #e0e7f1;
    transition: .1s ease-in-out;
    transition-property: border-color,box-shadow;
}
.kb-sortable__item {
    display: grid;
    grid-gap: 1rem;
    gap: 1rem;
    align-items: center;
    padding: 0.5rem 1.5rem;
    background: #fff;
    cursor: -webkit-grab;
    cursor: grab;
}
.kb-sortable__item-content {
    z-index: 0;
    overflow: hidden;
    max-width: 100%;
    margin-right: auto;
}
.kb-sortable__item-title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 14px;
}
.kb-sortable__item-subtitle {
    color: #526275;
    font-size: 12px;
    margin: 0;
}
.kb-sortable__item-actions {
    grid-column-start: 4;
    justify-self: end;
}
.kb-sortable__item-actions a {
    color: #405264;
    margin-right: 10px;
}
.kb_btnouter {
    padding: 7px 18px 7px 12px;
    border-radius: 4px 0 0 4px;
    border: 1px solid #ced3e0;
    color: #000;
    font-size: 14px;
    display: inline-block;
}
.kb_btnsetting {
    padding: 7px 10px 7px 10px;
    border-radius: 0 4px 4px 0;
    border: 1px solid #ced3e0;
    font-size: 14px;
    display: inline-block;
    color: #000;
    margin-left: -5px;
}
.kb_btnouter:hover, .kb_btnsetting:hover {
    background: #f7f9ff;
    border-color: #ced3e0;
}
.kb-makeittabl, .kb-makeittabl-campaign {
    width: 100%;
    list-style: none;
    margin: 0;
    padding: 8px;
    border-bottom: 1px solid #a2949d;
}
.kb-makeittabl > li, .kb-makeittabl-campaign > li{
  position: relative;
  display:inline-block;
}
.kb-makeittabl > li:nth-child(1) {
    width: 60%;
}
.kb-makeittabl > li:nth-child(2) {
    width: 29%;
}
.kb-makeittabl > li:nth-child(3) {
    width: 10%;
}
.kb-makeittabl:nth-child(1), .kb-makeittabl-campaign:nth-child(1) {
    font-weight: bold;
}
.kbwhat.Active {
  background: #19cca3;
}
.kbwhat.InActive {
  background: #f3376b;
}
.kbwhat{
    width: 10px;
    height: 37px;
    display: inline-block;
    position: relative;
    margin-left: -45px;
    top: 14px;
}
.kb-makeittabl-campaign > li:nth-child(1) {
    width: 43%;
}
.kb-makeittabl-campaign > li:nth-child(2) {
    width: 10%;
}
.kb-makeittabl-campaign > li:nth-child(3) {
    width: 8%;
}
.kb-makeittabl-campaign > li:nth-child(4) {
    width: 12%;
}
.kb-makeittabl-campaign > li:nth-child(5) {
    width: 10%;
}
.kb-makeittabl-campaign > li:nth-child(6) {
    width: 15%;
}


</style>
<template>
  <div id="pagesinsidepage">
      <div class="container-fluid" v-if="firstcontainer">
        <div class="row">
            <div class="col-md-12 pagemainlink">
                <a class="" href="javascript:void(0)"  @click="kb_landingpage" :class="addnewlandingpages==true ? 'active':''">Landing Page <i class="fas fa-file-alt"></i></a>
                <a class="" href="javascript:void(0)"  @click="kb_campaign" :class="addnewcampaign==true ? 'active':''">Campaigns <i class="fas fa-stream"></i></a>
                <a class="" href="javascript:void(0)"  @click="kb_automation" :class="addnewautomation==true ? 'active':''">Automations <i class="fas fa-stream"></i></a>
                <a href="javascript:void(0)" @click="kb_page" :class="addnewpages==true ? 'active':''">Pages <i class="far fa-window-restore"></i></a>
                <a class="" href="javascript:void(0)">Add New Pages <i class="fas fa-plus"></i></a>
                <a href="javascript:void(0)" @click="kb_design" :class="websitedesigns==true ? 'active':''">Website Design <i class="fas fa-palette"></i></a>
            </div>
        </div>

        

        <!-- Website Design -->

        <div class="row mt-4 loadEffect" v-if="websitedesigns"> 
            <div class="col-md-2">
              <h3>Design</h3>
            </div>
            <div class="col-md-10 text-right">
              <a href="javascript:void(0)" class="btn btn-secondary" @click="seesitedetails">Site Details <i class="fas fa-pencil-alt"></i></a>
              <a href="javascript:void(0)" class="btn btn-secondary">Preview <i class="far fa-eye"></i></a>
              <a href="javascript:void(0)" class="btn btn-secondary">Customize <i class="fas fa-palette"></i></a>
            </div>
            <div class="col-md-12 mt-4">
                <div class="kb-webpreviewer">
                    <span class="kb-weblive" @click="livestatus = !livestatus">LIVE <i class="fas fa-chevron-down drpdwnfa"></i></span>
                    <div class="kb-dropdown__panel kb-dropdown_livestatus" v-if="livestatus">
                      <ul class="kb-dropdown__menu">
                        <li>
                          <a href=""><i class="fa fa-check pr-2"></i> Publish</a>
                        </li>
                        <li>
                          <a href=""><i class="fa fa-file pr-2"></i> Draft</a>
                        </li>
                      </ul>
                    </div>
                    <img src="https://storage.googleapis.com/website-production/uploads/2019/12/subscription-kit-fabfitfun-landing-page.png" class="img-fluid" alt="">
                    <div class="kb-webpreviewinside">
                      <a href="" class="btn btn-primary">Customize Design <i class="fas fa-palette"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pages -->
          <div class="row mt-4" v-if="addnewpages">
              <div class="col-md-4 cardpage mt-10 loadEffect"  v-for="(value,index) in kbpages" :key="index">
                <div>
                  <img v-bind:src="kbpages[index]['imgsrc']" alt="" class="img-fluid img-fit">

                  <div class="keabuilder-title-board line-ellipsis">
                    <span>{{kbpages[index]['title']}}</span> 
                    <input type="text" v-model="kbpages[index]['title']">
                  </div>
                  <div class="statbadg">
                    <span class="statusbadge" :class="kbpages[index]['status']=='Publish' ? 'active1':'active2'" @click="kbpages[index].dropdownstatus = !kbpages[index].dropdownstatus">
                      <i class="fas" :class="kbpages[index]['status']=='Publish' ? 'fa-check':'fa-file'"></i> 
                      {{kbpages[index]['status']}} <i class="fas fa-chevron-down drpdwnfa"></i>
                    </span>
                    <div class="kb-dropdown__panel kb-dropdown__status" v-if="kbpages[index].dropdownstatus">
                      <ul class="kb-dropdown__menu">
                        <li>
                          <a href=""><i class="fa fa-check pr-2"></i> Publish</a>
                        </li>
                        <li>
                          <a href=""><i class="fa fa-file pr-2"></i> Draft</a>
                        </li>
                      </ul>
                    </div>
                 </div>


                  <p class="kb-pagedate">{{kbpages[index]['updated_at']}}</p>

                  <button class="btn btn-secondary">Preview <i class="far fa-eye"></i></button>
                  <button class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>

                  <div class="kb-page-settting" @click="kbpages[index].itemshow = !kbpages[index].itemshow"><i class="fas fa-cog"></i></div>
                  <div v-if="kbpages[index].itemshow" class="kb-dropdown__panel">
                    <ul class="kb-dropdown__menu">
                          <li class=""><a href="#" class=""><i class="fas fa-pen pr-2"></i>Edit details </a></li>
                          <li class="" ><a href="#" class=""><i class="fas fa-file-import pr-2"></i>Copy page to Landing </a></li>
                          <li class=""><a href="#" class=""><i class="fas fa-chart-pie pr-2"></i>View Analytics</a></li>
                          <li class=""><a href="#" class=""><i class="far fa-copy pr-2"></i>Duplicate</a></li>
                          <li class=""><a href="#" class=""><i class="fas fa-link pr-2"></i>Copy URL</a></li>
                          <li class="kb-border-before"><a href="#" class="text-danger"><i class="fas fa-trash pr-2"></i>Delete page</a></li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>

        <!-- landing Pages -->
        <div class="row mt-4" v-if="addnewlandingpages">
            <div class="col-md-4 cardpage mt-10 loadEffect"  v-for="(value,index) in kblandingpages" :key="index">
              <div>
                <img v-bind:src="kblandingpages[index]['imgsrc']" alt="" class="img-fluid img-fit">

                <div class="keabuilder-title-board line-ellipsis">
                  <span>{{kblandingpages[index]['title']}}</span> 
                  <input type="text" v-model="kblandingpages[index]['title']">
                </div>
                <div class="statbadg">
                  <span class="statusbadge" :class="kblandingpages[index]['status']=='Publish' ? 'active1':'active2'" @click="kblandingpages[index].dropdownstatus = !kblandingpages[index].dropdownstatus">
                    <i class="fas" :class="kblandingpages[index]['status']=='Publish' ? 'fa-check':'fa-file'"></i> 
                    {{kblandingpages[index]['status']}} <i class="fas fa-chevron-down drpdwnfa"></i>
                  </span>
                  <div class="kb-dropdown__panel kb-dropdown__status" v-if="kblandingpages[index].dropdownstatus">
                    <ul class="kb-dropdown__menu">
                      <li>
                        <a href=""><i class="fa fa-check pr-2"></i> Publish</a>
                      </li>
                      <li>
                        <a href=""><i class="fa fa-file pr-2"></i> Draft</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <p class="kb-pagedate">{{kblandingpages[index]['updated_at']}}</p>

                <button class="btn btn-secondary">Preview <i class="far fa-eye"></i></button>
                <button class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>

                <div class="kb-page-settting" @click="kblandingpages[index].itemshow = !kblandingpages[index].itemshow"><i class="fas fa-cog"></i></div>
                <div v-if="kblandingpages[index].itemshow" class="kb-dropdown__panel">
                  <ul class="kb-dropdown__menu">
                        <li class=""><a href="#" class=""><i class="fas fa-pen pr-2"></i>Edit details </a></li>
                        <li class="" ><a href="#" class=""><i class="fas fa-file-import pr-2"></i>Copy page to Landing </a></li>
                        <li class=""><a href="#" class=""><i class="fas fa-chart-pie pr-2"></i>View Analytics</a></li>
                        <li class=""><a href="#" class=""><i class="far fa-copy pr-2"></i>Duplicate</a></li>
                        <li class=""><a href="#" class=""><i class="fas fa-link pr-2"></i>Copy URL</a></li>
                        <li class="kb-border-before"><a href="#" class="text-danger"><i class="fas fa-trash pr-2"></i>Delete page</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>

        <!-- Automations -->
        <div class="row mt-4 loadEffect" v-if="addnewautomation">
          <ul class="kb-makeittabl">
            <li>Automation Name</li>
            <li>Automation Created</li>
            <li>Settings</li>
          </ul>

          <ul class="kb-makeittabl" v-for="(error,index) in kbautomationelem" :key="index">
            <li>{{kbautomationelem[index]['title']}} </li>
            <li>{{kbautomationelem[index]['created_at']}}</li>
            <li>
                <a href="javascript:void(0)" class="kb_btnouter"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="javascript:void(0)" class="kb_btnsetting" @click="kbautomationelem[index]['dropdownstatus'] = !kbautomationelem[index]['dropdownstatus']"><i class="fas fa-cog"></i></a>
                  <div class="kb-dropdown__panel kb-dropdown_livestatus" v-if="kbautomationelem[index]['dropdownstatus']">
                    <ul class="kb-dropdown__menu">
                      <li>
                        <a href="" class="p-1"><i class="fa fa-check pr-2"></i> Make {{kbautomationelem[index]['status'] == 'Active' ? 'InActive': 'Active'}}</a>
                        <hr class="m-1">
                      </li>
                      <li>
                        <a href="" class="p-1"><i class="fa fa-file pr-2"></i> Copy</a>
                        <hr class="m-1">
                      </li>
                      <li>
                        <a href="" class="p-1"><i class="fas fa-trash-alt pr-2"></i> Delete</a>
                        <hr class="m-1">
                      </li>
                       <li>
                        <a href="" class="p-1"><i class="fas fa-share pr-2"></i> Share</a>
                      </li>
                    </ul>
                  </div>  
                  <span class="kbwhat" :class="kbautomationelem[index]['status']"></span>
                  
            </li>
          </ul>

        </div>

        <!-- Campaign -->
        <div class="row mt-4 loadEffect" v-if="addnewcampaign">
          <ul class="kb-makeittabl-campaign">
            <li>Campaign Name</li>
            <li>Sent</li>
            <li>Sent to#</li>
            <li>Last Modified</li>
            <li>Type</li>
            <li>Settings</li>
          </ul>

          <ul class="kb-makeittabl-campaign" v-for="(error,index) in kbcampaignelem" :key="index">
            <li>{{kbcampaignelem[index]['title']}} </li>
            <li>{{kbcampaignelem[index]['sent']}}</li>
            <li>{{kbcampaignelem[index]['sentto']}}</li>
            <li>{{kbcampaignelem[index]['last_modified']}}</li>
            <li>{{kbcampaignelem[index]['type']}}</li>
            <li>
                <a href="javascript:void(0)" class="kb_btnouter"><i class="fas" :class="kbcampaignelem[index]['status']!='Active' ?  'fa-pencil-alt' : 'fa-chart-line'"></i> {{kbcampaignelem[index]['btn']}}</a>
                <a href="javascript:void(0)" class="kb_btnsetting" @click="kbcampaignelem[index]['dropdownstatus'] = !kbcampaignelem[index]['dropdownstatus']">
                  <i class="fas fa-cog" ></i></a>
                <div class="kb-dropdown__panel kb-dropdown_livestatus" v-if="kbcampaignelem[index]['dropdownstatus']">
                  <ul class="kb-dropdown__menu">
                    <li>
                      <a href="" class="p-1"><i class="fa fa-check pr-2"></i> Make {{kbcampaignelem[index]['status'] == 'Active' ? 'InActive': 'Active'}}</a>
                      <hr class="m-1">
                    </li>
                    <li>
                      <a href="" class="p-1"><i class="fa fa-file pr-2"></i> Copy</a>
                      <hr class="m-1">
                    </li>
                    <li>
                      <a href="" class="p-1"><i class="fas fa-trash-alt pr-2"></i> Delete</a>
                      <hr class="m-1">
                    </li>
                      <li>
                      <a href="" class="p-1"><i class="fas fa-share pr-2"></i> Share</a>
                    </li>
                  </ul>
                </div>  
                <span class="kbwhat" :class="kbcampaignelem[index]['status']"></span>
            </li>
          </ul>

        </div>



      </div>

      <div class="container-fluid kb_second_siteinfo" v-if="secondcontainer">
        <div class="row loadEffect">
          
          <div class="col-md-12">
            <h3><b>Site Details</b> <a href="javascript:void(0)" class="btn btn-secondary" @click="backfromsitedetails"><i class="fas fa-arrow-left"></i> Back</a></h3>
          </div>

          <div class="col-md-6 mt-4">

            <div class="insideshdw">
              <h5>Site Info</h5>
              <p>Edit the main elements of your site.</p>
              <p>Your site name is used wherever the title of your site appears, such as browser tabs, search engine results, and links.</p>

              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="" placeholder="Your title here" class="form-control" id="">              
              </div> 
              <div class="form-group">
                <label for="">Domain</label>
                  <div class="kbcustom-domain-edit-link" style="border: 1px solid #c7cfd8; border-radius: 4px; padding: 6px 10px; margin-bottom: 20px">
                  <div class="kb-card__row">  
                    <p class="kb-sage-body-semi">mynew.mykea.com</p>
                    <a href="#" class="kb-btn">Manage Domain</a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Support Email</label>
                <input type="text" name="" placeholder="Your Email here" class="form-control" id="">              
              </div> 
            </div>

          </div>

          <div class="col-md-6 mt-4">

            <div class="insideshdw">
              <h5>Homepage</h5>
              <p>Rename the main Page of your site.</p>

              <div class="form-group">
                <label for="">Homepage</label>
                <select name="" id="" class="form-control">
                  <option value="">About</option>
                  <option value="">Landing</option>
                </select>
              </div> 

              <hr>

              <h5>Colors</h5>
              <p>Choose the default color palette you want to show in all color pickers across Kajabi.</p>
              <div class="kb-preview-inner" style="background-color: rgb(26, 188, 156);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(46, 204, 113);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(52, 152, 219);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(155, 89, 182);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(241, 196, 15);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(230, 126, 34);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(231, 76, 60);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(236, 240, 241);"></div>
              <div class="kb-preview-inner" style="background-color: rgb(149, 165, 166);"></div>

            </div>

          </div>

          <div class="col-md-6 mt-4">
            <div class="insideshdw">
               <h5>Navigation Menus</h5>

               <p>Main Menu</p>
               <div style="position:relative;">
                <a href="javascript:void(0)" class="kb-navmenu" @click="navmainmenu_fun"><i class="fas fa-plus"></i> Add</a>
                <nav class="kb-dropdown_panel" v-if="navmainmenu_add">
                    <ul class="kb-dropdown_menu" >
                        <li class="kb-dropdown_item" >
                            <input type="file" class="hide" value="">
                            <a href="#" class="kb-dropdown_item-control"><i class="far fa-file-alt mr-2"></i> Add Page</a>
                        </li>
                        <li class="kb-dropdown_item">
                            <a class="kb-dropdown_item-control"  href=""><i class="fas fa-link mr-2"></i> Add Link</a>
                        </li>
                    </ul>
                </nav>
               </div>

              <hr>

              <p>Footer</p>

              <ul class="kb-sortable">
                <li class="kb-sortable__item"  v-for="(error,index) in navmenu_footer" :key="index">
                    <div class="kb-sortable__item-content">
                        <h1 class="kb-sortable__item-title">{{navmenu_footer[index]['title']}}</h1>
                        <h2 class="kb-sortable__item-subtitle">{{navmenu_footer[index]['pageorpost']}}</h2>
                    </div>
                    <div class="kb-sortable__item-actions">
                    
                    <a href="javascript:void(0)" target="_blank" class="kb-btn" >
                        <i class="far fa-eye"></i>
                    </a>
                    
                    <a href="javascript:void(0)" class="kb-btn">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    </div>
                </li>
              </ul>


               <div style="position:relative;" class="mt-4">
                  <a href="javascript:void(0)" class="kb-navmenu"  @click="navfootermenu_fun"><i class="fas fa-plus"></i> Add</a>
                    <nav class="kb-dropdown_panel" v-if="navfootermenu_add">
                      <ul class="kb-dropdown_menu" >
                          <li class="kb-dropdown_item" >
                            <input type="file" class="hide" value="">
                            <a href="#" class="kb-dropdown_item-control"><i class="far fa-file-alt mr-2"></i> Add Page</a>
                        </li>
                        <li class="kb-dropdown_item">
                            <a class="kb-dropdown_item-control"  href=""><i class="fas fa-link mr-2"></i> Add Link</a>
                        </li>
                      </ul>
                  </nav>
               </div>

            </div>
          </div>

          <div class="col-md-6 mt-4">

            <div class="insideshdw">
              <h5>Branding</h5>
              <p>Control whether or not “Powered by Kea links display in the footer of your site and products.</p>

              <div class="form-group">
                <label for="">Logo</label>

                <div class="kb-upload-card_dropzone">
                    <div class="kb-upload-card_preview">
                      <img alt=""  class="kb-thumbnail img-fluid" style="border: none; padding: 0;" src="https://kajabi-app-assets.kajabi-cdn.com/assets/default-file-upload-image-08bb079c8f92413903461a82f288f906d352de53889f650298c276cd6332379d.png">    
                    </div>
                    <div class="kb-upload-card_body">
                      <div class="kb-btn-group">
                            <div class="kb-dropdown">
                                <div class="kb-dropdown_trigger">
                                
                                    <button type="button" class="kb-btn" @click="kb_brandinglogo">
                                        <span class="kb-btn_truncate-text">
                                            Choose a social image
                                        </span>
                                    </button>

                                </div>
                                <nav class="kb-dropdown_panel" v-if="branding_logo">
                                    <ul class="kb-dropdown_menu" >
                                        <li class="kb-dropdown_item" >
                                            <input type="file" class="hide" value="">
                                            <a href="#" class="kb-dropdown_item-control">Upload a new file</a>
                                        </li>
                                        <li class="kb-dropdown_item">
                                            <a class="kb-dropdown_item-control"  href="">Select a recent file</a>
                                        </li>
                                    </ul>
                                </nav>
                          </div>

                    </div>

                      <p class="t-kb-body">Recommended dimensions of <strong>640x640</strong></p>
                    </div>
                </div>  

                <label for="" class="mt-4">Favicon</label>

                <div class="kb-upload-card_dropzone">
                    <div class="kb-upload-card_preview">
                      <img alt=""  class="kb-thumbnail img-fluid" style="border: none; padding: 0;" src="https://kajabi-app-assets.kajabi-cdn.com/assets/default-file-upload-image-08bb079c8f92413903461a82f288f906d352de53889f650298c276cd6332379d.png">    
                    </div>
                    <div class="kb-upload-card_body">
                      <div class="kb-btn-group">
                            <div class="kb-dropdown">
                                <div class="kb-dropdown_trigger">
                                
                                    <button type="button" class="kb-btn" @click="kb_brandingfavicon">
                                        <span class="kb-btn_truncate-text">
                                            Choose a social image
                                        </span>
                                    </button>

                                </div>
                                <nav class="kb-dropdown_panel" v-if="branding_favicon">
                                    <ul class="kb-dropdown_menu" >
                                        <li class="kb-dropdown_item" >
                                            <input type="file" class="hide" value="">
                                            <a href="#" class="kb-dropdown_item-control">Upload a new file</a>
                                        </li>
                                        <li class="kb-dropdown_item">
                                            <a class="kb-dropdown_item-control"  href="">Select a recent file</a>
                                        </li>
                                    </ul>
                                </nav>
                          </div>

                    </div>

                      <p class="t-kb-body">Recommended dimensions of <strong>32x32</strong></p>
                    </div>
                </div>  
                

              </div> 

            </div>

          </div>

          <div class="col-md-6 mt-4">
            <div class="insideshdw">

              <h5>Page Scripts</h5>
                  <p>Add custom javascript to be placed on all site Pages. The code will be placed in the <b>head</b> section of every page.
                    <br>
                   You can also add a <b>Privacy and cookies</b> banner script. This informs visitors of cookies being used on your site and can collect their consent. For assistance, visit our <a href="#">Help Guide</a></p>

              <div class="form-group">
                <label for="">Page Script Header</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                <small>This code will be placed in the head section of every page.</small>                
              </div> 

            </div>
          </div>

          <div class="col-md-6 mt-4">
            
            <div class="insideshdw">

              <h5>SEO and Sharing</h5>
                  <p>The page name appears at the top of each browser window or tab. The URL is the unique address for the page.
                    <br><br>
                  Page visibility controls who can see your website. Search engine optimization (SEO) can improve your ranking in search results, making it easier for people to find your page.
                  <br><br>
                  The title and description are displayed in search engine results and social media shares. Social networks (like Facebook or Twitter) may also show the social image when your URL is shared.
                  <br><br>
                  If you leave these fields blank, they will be automatically generated using your default settings.</p>

              <div class="form-group">
                <label for="">Page Title</label>
                <input type="text" class="form-control">
                <small>A clear title without branding or mentioning the domain itself. Best between 60 - 70 characters long.</small>

                              
              </div> 

            </div>

          </div>

          <div class="col-md-6 mt-4">
            <div class="insideshdw">

              <label for="">Page Description</label>
              <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
              <small>A clear description, at least two sentences long. Best between 150 - 160 characters long.</small>  

              <div class="kb-upload-card_dropzone mt-4">
                  <div class="kb-upload-card_preview">
                    <img alt=""  class="kb-thumbnail img-fluid" style="border: none; padding: 0;" src="https://kajabi-app-assets.kajabi-cdn.com/assets/default-file-upload-image-08bb079c8f92413903461a82f288f906d352de53889f650298c276cd6332379d.png">    
                  </div>
                  
                  <div class="kb-upload-card_body">
                    <div class="kb-btn-group">
                          <div class="kb-dropdown">
                              <div class="kb-dropdown_trigger">
                              
                                  <button type="button" class="kb-btn" @click="kb_brandingsocial">
                                      <span class="kb-btn_truncate-text">
                                          Choose a social image
                                      </span>
                                  </button>

                              </div>
                              <nav class="kb-dropdown_panel" v-if="branding_social">
                                  <ul class="kb-dropdown_menu" >
                                      <li class="kb-dropdown_item" >
                                          <input type="file" class="hide" value="">
                                          <a href="#" class="kb-dropdown_item-control">Upload a new file</a>
                                      </li>
                                      <li class="kb-dropdown_item">
                                          <a class="kb-dropdown_item-control"  href="">Select a recent file</a>
                                      </li>
                                  </ul>
                              </nav>
                        </div>

                  </div>

                    <p class="t-kb-body">Recommended dimensions of <strong>1280x720</strong></p>
                </div>

              </div>  


            </div>

          </div>

          <div class="col-md-12 text-center">
              <a href="javascript:void(0)" class="btn btn-secondary mt-4">Update <i class="fas fa-check"></i></a>
          </div>





        </div>
      </div>



  </div>
</template>

<script>
export default {
  data() {
    return {      
      firstcontainer:true,
      secondcontainer:false,
      addnewpages:true,
      addnewlandingpages:false,
      websitedesigns:false,
      livestatus:false,
      branding_logo:false,
      branding_favicon:false,
      branding_social:false,
      navmainmenu_add:false,
      navfootermenu_add:false,
      addnewautomation:false,
      addnewcampaign:false,
      kbpages:[
        {
          id:1,
          title:"Home",
          imgsrc:"https://storage.googleapis.com/website-production/uploads/2019/12/subscription-kit-fabfitfun-landing-page.png",
          updated_at:"Updated: December 06, 2021 11:21AM",   
          status: "Publish",     
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:2,
          title:"About",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:3,
          title:"Skills",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:4,
          title:"Landing page",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:5,
          title:"Faq",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        }

      ],
      navmenu_footer:[
        {
          title:'Terms',
          pageorpost: 'page'
        },
        {
          title:'Privacy',
          pageorpost: 'page'
        }
        ,
        {
          title:'Contact Us',
          pageorpost: 'page'
        }

      ],
      kblandingpages:[
        {
          id:1,
          title:"Survey page",
          imgsrc:"https://storage.googleapis.com/website-production/uploads/2019/12/subscription-kit-fabfitfun-landing-page.png",
          updated_at:"Updated: December 06, 2021 11:21AM",   
          status: "Publish",     
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:2,
          title:"Book a Call page",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        },
        {
          id:3,
          title:"Skillset page",
          imgsrc:"https://media.geeksforgeeks.org/wp-content/uploads/20211201143659/algogeek.png",
          updated_at:"Updated: December 10, 2021 11:21AM",    
           status: "Draft",    
          itemshow:false,
          dropdownstatus:false,
        },

      ],
      kbautomationelem:[
        {
          id:1,
          title:"Connect Big Small Business Boost Contest Official Entry Form",
          created_at:"December 06, 2021 11:21AM",   
          status: "Active",     
          dropdownstatus:false,
        },
         {
          id:2,
          title:"New Event",
          created_at:"December 12, 2021 11:21AM",   
          status: "InActive",     
          dropdownstatus:false,
        },
         {
          id:3,
          title:"Creative call",
          created_at:"December 20, 2021 11:21AM",   
          status: "Active",     
          dropdownstatus:false,
        },

      ],
      kbcampaignelem:[
        {
          id:1,
          title:"Dell super sell",
          sent:"",   
          status: "InActive",     
          sentto:"",
          last_modified:"12/17/2021 08:43",
          type:"One-Time",
          btn: "Draft",
          dropdownstatus:false,
        },
         {
          id:2,
          title:"Crazy Deal",
          sent:"12/18/2021 08:43",   
          status: "Active",     
          sentto:"1000",
          last_modified:"12/17/2021 08:43",
          type:"One-Time",
          btn: "View Report",
          dropdownstatus:false,
        },
         {
          id:3,
          title:"Join Now!",
          sent:"12/18/2021 08:43",   
          status: "Active",     
          sentto:"1000",
          last_modified:"12/17/2021 08:43",
          type:"One-Time",
          btn: "View Report",
          dropdownstatus:false,
        },

      ]

    }
  },
  methods: {
      kb_design(){
        this.websitedesigns = true;
        this.addnewpages = false;
        this.addnewlandingpages = false;
        this.addnewautomation = false;
        this.addnewcampaign = false;
      },
      kb_page(){
        this.addnewpages = true;
        this.websitedesigns = false;
        this.addnewlandingpages = false;
        this.addnewautomation = false;
        this.addnewcampaign = false;
      },
      kb_landingpage(){
        this.addnewlandingpages = true;
        this.addnewpages = false;
        this.websitedesigns = false;
        this.addnewautomation = false;
        this.addnewcampaign = false;
      },
      kb_automation(){
        this.addnewautomation = true;
         this.addnewlandingpages = false;
        this.addnewpages = false;
        this.websitedesigns = false;
        this.addnewcampaign = false;
      },
      kb_campaign(){
        this.addnewautomation = false;
         this.addnewlandingpages = false;
        this.addnewpages = false;
        this.websitedesigns = false;
        this.addnewcampaign = true;
      },
      kb_brandinglogo(){
        this.branding_logo = !this.branding_logo;
      },
      kb_brandingfavicon(){
        this.branding_favicon = !this.branding_favicon;
      },
      kb_brandingsocial(){
        this.branding_social = !this.branding_social;
      },
      backfromsitedetails(){
        this.secondcontainer = false;
        this.firstcontainer = true;

        this.websitedesigns = true;
        this.addnewpages = false;
      },
      seesitedetails(){
        this.secondcontainer = true;
        this.firstcontainer = false;
      },
      navmainmenu_fun(){
        this.navmainmenu_add = !this.navmainmenu_add;
      },
      navfootermenu_fun(){
        this.navfootermenu_add = !this.navfootermenu_add;
      }


      


    }

}
</script>