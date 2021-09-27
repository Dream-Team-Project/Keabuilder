<style scoped>
/* nav */
.rightbrder{
    border-right: 4px solid #f2f4f4;
}
.wizard-steps {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: end;
    -ms-flex-align: end;
    align-items: flex-end;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-shadow: 0px 0px 30px 0px rgb(82 63 105 / 5%);
    box-shadow: 0px 0px 30px 0px rgb(82 63 105 / 5%);
    border-radius: 0.42rem;
}
.wizard-step {
    cursor: pointer;
}
.wizard-nav .wizard-steps .wizard-step {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 calc(20% - 0.25rem);
    flex: 0 0 calc(20% - 0.25rem);
    width: calc(20% - 0.25rem);
    background-color: #F3F6F9;
}
.wizard-step[data-wizard-state="current"]{
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
}
 .wizard-nav .wizard-steps .wizard-step .wizard-wrapper {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    color: #3F4254;
    padding: 15px 20px;
}
.wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
}
.wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label .wizard-title {
    font-size: 1.1rem;
    font-weight: 600;
}
.wizard-nav .wizard-steps .wizard-step[data-wizard-state=current] .wizard-wrapper .wizard-label .wizard-title {
    color: #d8c898;
}
.wizard-nav .wizard-steps .wizard-step[data-wizard-state=current] {
    background-color: #ffffff;
}
.wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-number {
    font-size: 1.3rem;
    font-weight: 600;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 2.75rem;
    flex: 0 0 2.75rem;
    height: 2.75rem;
    width: 2.75rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background-color: rgb(216 200 152 / 10%);
    color: #d8c898;
    margin-right: 1rem;
    border-radius: 0.5rem;
}
.wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label .wizard-title {
    font-size: 14px;
    font-weight: 600;
}
.wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label .wizard-desc{
    font-size: 13px;
}
#secondwizard .wizard-step {
    flex: 0 0 calc(25% - 0.25rem);
    width: calc(25% - 0.25rem);
}

/* nav */
/* body */
.whitefunnel{
    background:#fff;
}
.kiabuilder-item {
    padding: 10px 20px;
    border-radius: 0.267rem;
    margin-bottom: 20px;
    box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
    position: relative;
    font-size: 14px;
    font-weight: bold;
    background: #f2f4f4;
    transition: all .3s cubic-bezier(.23,1,.32,1);
    cursor: pointer;
    margin-top: 10px;
}
.kiabuilder-item:before {
    content: "";
    width: 3px;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 0.5rem;
}
.kiabuilder-item.success:before {
    background-color: #39DA8A;
}
.kiabuilder-item i {
    top: 0px;
    position: relative;
    opacity: 0.5;
    transition: .5s ease-in;
    width: 40px;
    height: 20px;
    text-align: center;
}
.kiabuilder-item i:hover, .kb-sharelink:hover, .kb-settings-i:hover {
    opacity: 1;
}
 .dropdown-menu {
    top: 16px!important;
    left: -115px!important;
    min-width: 120px!important;
}
.dropdown-menu {
    box-shadow: -7px 8px 16px 0 rgb(55 70 95 / 20%);
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}
.dropdown-menu .dropdown-item {
    text-transform: uppercase;
    display: flex;
    align-items: center;
}
.dropdown-item {
    font-size: 12px;
    padding: 10px!important;
}
.dropdownMenuButton i {
    font-size: 12px;
}
.dropdown-menu i {
    color: #475F7B;
}
.dropdownMenuButton:hover .dropdown-menu {
    display: block;
}
.sage-input:not(:last-child) {
    margin-bottom: 1.5rem;
}
.sage-input {
    display: flex;
    position: relative;
    flex-direction: column;
}
.sage-input__field:valid:not(:placeholder-shown) {
    outline: none;
    background: transparent;
}
.sage-input__field {
    width: 100%;
    color: #91959c;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: .0625rem solid #e0e7f1;
    border-radius: .375rem;
    background: transparent;
    transition: border .2s ease-in-out,box-shadow .2s ease-in-out;
    height: 2.5rem;
    padding: .9375rem 1rem;
}
.sage-input__field:valid:not(:placeholder-shown)~.sage-input__label {
    transform: translateY(-var(--sage-font-size-body).5rem);
    transform: translateY(calc(-50% - 1.25rem));
    transform: translateY(calc(-50% - var(--sage-font-size-body) - .25rem));
    transition: opacity .1s ease-in,transform .15s ease-in-out,color .15s ease-out;
    opacity: 1;
}
.sage-input__field~label {
    position: absolute;
    padding-left: .25rem;
    padding-right: .25rem;
    color: inherit;
    font-weight: 600;
    white-space: nowrap;
    background-color: #fff;
    pointer-events: none;
    opacity: 0;
    font-size: 12px;
    top: -9px;
    left: 20px;
}
#secondwizard .wizard-wrapper {
    padding: 5px 10px;
    background:rgb(243 246 249);
}
#createfunnel{
    background:#F2F4F4;
}
.kb-sharelink, .kb-settings-i {
    position: absolute;
    right: 10px;
    bottom: 8px;
    cursor: pointer;
    opacity: 0.5;
    transition: .5s ease-in;
}
.kb-settings-i{
    right: 40px;
}

/* progressbar */

.progress.progress-sm {
    height: .4rem;
}

.progress {
    height: .6rem;
    overflow: visible;
    background-color: #F2F4F4;
}
.progress-bar {
    display: -webkit-box;
    display: flex;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    color: #FFF;
    text-align: center;
    background-color: #F2F4F4;
    -webkit-transition: width .6s ease;
    transition: width .6s ease;
}
.progress .progress-bar {
    position: relative;
    border-radius: 1.28rem;
    box-shadow: 0 2px 6px 0 rgb(90 141 238 / 60%);
}
.progress-bar-success .progress-bar {
    background-color: #39DA8A;
    box-shadow: 0 2px 6px 0 rgb(57 218 138 / 60%);
}

/* progressbar */

.kb-internalshadow .toast{
    opacity: 1;
}
.kb-split-text >div{
    display: flex;
}
.kb-split-text .fa-vials{
    opacity:0.4;
    color: #007aff;
}
.svgimg3 svg{
  width:182px;
  margin:auto;
  position:relative;
  left:34%;
  opacity: 0.5;
  transition: .5s ease-in-out;
}
.svgimg3 svg:hover{
    opacity: 1;
}

#Bubble-1{
  animation: bubbleup 1s ease-in-out infinite;
  stroke:red;
}
#Bubble-2{
  animation: bubbleup2 2s ease-in-out infinite;
  stroke:blue;
}
#Bubble-3 {
  animation: bubbleup3 3s ease-in-out infinite;
  stroke:pink;
}
#Bubble-4{
  animation: bubbleup4 2s ease-in-out infinite;
    stroke:gold;
}
#Bubble-5{
  animation: bubbleup5 1s infinite;
  stroke:green;
}
#Bubble-6{
  animation: bubbleup6 4s infinite;
  stroke:#91959c;
}
@keyframes bubbleup {
    from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -10);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -30);
    }
}
@keyframes bubbleup2 {
    from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -10);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -40);
    }
}
@keyframes bubbleup3 {
   
    from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -30);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -40);
    }
}
@keyframes bubbleup4 {
    from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -30);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -40);
    }
}
@keyframes bubbleup5 {
     from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -10);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -20);
    }
}
@keyframes bubbleup6 {
     from{
 opacity:0;
        transform: matrix(1, 0, 0, 1, 0, -15);
    }to{
 opacity:0.5;
        transform: matrix(1, 0, 0, 1, 0, -30);
    }
}


#Bubble-1,#Bubble-2,#Bubble-3,#Bubble-4,#Bubble-5,#Bubble-6 {
    display:none;
}
#Layer_1:hover #Bubble-1, #Layer_1:hover #Bubble-2, #Layer_1:hover #Bubble-3, #Layer_1:hover #Bubble-4, #Layer_1:hover #Bubble-5, #Layer_1:hover #Bubble-6{
  display:block;
}
.kb-createvar {
    display: inline-block!important;
    box-shadow: -7px 8px 16px 0 rgb(55 70 95 / 20%);
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    position: absolute;
    top: 34%;
    width: 100%;
    padding: 20px;
    left: 0px;
    z-index: 9;
}
.kb-bxoverlay {
    background: rgb(0 0 0 / 15%);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
}
.declarewinner {
    width: 100%;
    height: 70%;
    position: absolute;
    top: 37px;
    left: 0px;
    font-size: 24px;
    text-align: center;
    background: rgb(0 122 255 / 37%);
    color: #fff;
    padding-top: 24%;
    display: none;
}
.declarewinner i {
    font-size: 50px;
    width: 100%;
}
.declarewinner a {
    color: #fff;
}
.yesdeclarewinner:hover .declarewinner{
    display:block;
}
#kb-splittestmake{
    cursor: pointer;
    width: 100%;
    height: 1.4rem;
    padding: 0;
    background-color: transparent;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    position: relative;
    top: -15px;
}

.kb-red{
    background:rgb(255 0 0 / 20%);
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #d8c898;
  cursor:pointer;
  transition: background .3s ease-in-out;
   box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
}

input[type=range]::-webkit-slider-runnable-track  {
  -webkit-appearance: none;
  box-shadow: none;
  border: none;
  background: transparent;
}
.splitTestText {
    width: 50%;
    float: left;
    margin-bottom: 20px;
}
.splitTestText.variation {
    text-align: right;
}
.splitTestText .number {
    font-weight: bold;
}
.savechangesvs {
    text-align: center;
    float: left;
    width: 100%;
    background: #e7edf3;
    padding: 23px 0px;
    box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
}
.kb-split-text center {
    margin: 25px 0px;
    font-size: 18px;
}
.footer-wizard-kb {
    margin: auto;
    display: flex;
    justify-content: center;
}
.footer-wizard-kb button {
    font-size: 12px;
    background: transparent;
    color: #444;
    margin-right: 10px;
}
#secondwizard .wizard-step[data-wizard-state=current] >div{
    background:#fff;
}
#kb-automation-actions >div {
    overflow-y: scroll;
}
/* width */
#kb-automation-actions >div::-webkit-scrollbar{
    width: 5px;
  }
  
  /* Track */
  #kb-automation-actions >div::-webkit-scrollbar-track{
    background: transparent; 
  }
   
  /* Handle */
  #kb-automation-actions >div::-webkit-scrollbar-thumb {
    background: #e2e2e2; 
  }
  #kb-automation-actions .fa-times {
    position: absolute;
    right: 24px;
    z-index: 99999;
    cursor: pointer;
}

/* body */
</style>

<template>
  <div id="createfunnel" class="insidecont">

      <div id="kb-automation-actions" v-if="poupsidebar">
          <i class="fas fa-times" @click="hidepopupsidebar"></i>
          <div class="offcanvas offcanvas-right p-4 offcanvas-on" v-if="automationaddnewaction">
              <h6><b>NEW FUNNEL STEPS</b></h6>
              <p><i class="fas fa-cogs"></i> Action Settings</p>
              <hr>
              <label for="">Name</label>
              <input type="text" placeholder="Give your action a name" class="form-control">
              <label for="" class="mt-3">Condition</label>
              <select name="" id="" class="form-control">
                  <option value="">Everyone</option>n
              </select>
              <label for="" class="mt-3">Integration</label>
              <select name="" id="" class="form-control">
                  <option value="">Keabuilder Integration</option>
              </select>
              <label for="" class="mt-3">Action To Do</label>
              <select name="" id="" class="form-control">
                  <option value="">Add To List</option>
                  <option value="">Remove From List</option>
                  <option value="">Email Notification</option>
                  <option value="">Add Tag</option>
                  <option value="">Remove Tag</option>
              </select>
                <br>
              <p><i class="far fa-clock"></i> Action Delay</p>
              <hr>
              <label for="">Delay Days</label>
              <input type="number" placeholder="# Of Days Before Action Happens..." class="form-control">
              <label for="" class="mt-3">Delay Hours</label>
              <input type="number" placeholder="# Of Hours Before Action Happens..." class="form-control">
              <br>
              <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Funnel Action</button>

          </div>

          <div class="offcanvas offcanvas-right p-4 offcanvas-on" v-if="automationaddnewemail">
             <h6><b>CREATE NEW EMAIL</b></h6>
             <p>Provide your <a href="#">Account SMTP Settings</a> to customize outgoing emails from Keabuilder</p>
          </div>

          <div class="offcanvas offcanvas-right p-4 offcanvas-on" v-if="automationaddnewtext">
             <h6><b>CREATE NEW TEXT</b></h6>
             <p>Create a <a href="#">Twilio SMS Integration</a> first to customize outgoing text messages from Keabuilder</p>
          </div>

      </div>
      <div class="offcanvas-overlay " v-if="poupsidebar" @click="hidepopupsidebar"></div>


      <header class="wizard-nav">  
          <div class="wizard-steps">
                <!--begin::Wizard Step 1 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-filter"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">My Funnel Name</div>
                            <div class="wizard-desc">Steps</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 1 Nav-->
                <!--begin::Wizard Step 3 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="far fa-chart-bar"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">STATS</div>
                            <div class="wizard-desc">View Your Stats</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 3 Nav-->
                <!--begin::Wizard Step 4 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-users"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">CONTACTS</div>
                            <div class="wizard-desc">Check Your Contacts</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 4 Nav-->
                <!--begin::Wizard Step 4 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-sliders-h"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">SETTINGS</div>
                            <div class="wizard-desc">Review Your Settings</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 4 Nav-->                
                <!--begin::Wizard Step 2 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-network-wired"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">INTEGRATIONS</div>
                            <div class="wizard-desc">Setup Your Integrations</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 2 Nav-->
            </div>
      </header>
      <div class="container-fluid">
          <div class="row whitefunnel">
              <div class="col-md-3 pb-3 pt-3 rightbrder">
                  <button class="btn btn-primary mt-2 btn-block mb-3"><i class="fas fa-plus"></i> Add A Step</button>

                  <div class="list-group">

                        <div class="kiabuilder-item is-moving success list-group-item" data-border="success">Optin
                                <i class="fas fa-grip-lines float-right mt-1"></i>
                                <div class="btn-group float-right mr-1">
                                        <div class="cursor-pointer dropdownMenuButton" role="button">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <div class="dropdown-menu" >
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i class="fas fa-link"></i> Copy Link
                                                </a>
                                                <a class="dropdown-item kiabuilder-delete" href="javascript:void(0);">
                                                    <i class="far fa-clone"></i> Duplicate
                                                </a>
                                                <a class="dropdown-item kiabuilder-changepath" href="javascript:void(0);">
                                                    <i class="fas fa-pen-fancy "></i> change path
                                                </a>
                                                <a class="dropdown-item kiabuilder-delete" href="javascript:void(0);">
                                                    <i class="far fa-trash-alt"></i> Archive
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                        </div>

                        <div class="kiabuilder-item is-moving list-group-item">Thank you
                                <i class="fas fa-grip-lines float-right mt-1"></i>
                                <div class="btn-group float-right mr-1">
                                    <div class="cursor-pointer dropdownMenuButton" role="button">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <div class="dropdown-menu" >
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="fas fa-link mr-2"></i> Copy Link
                                            </a>
                                            <a class="dropdown-item kiabuilder-delete" href="javascript:void(0);">
                                                <i class="far fa-clone mr-2"></i> Duplicate
                                            </a>
                                                <a class="dropdown-item kiabuilder-changepath" href="javascript:void(0);">
                                                <i class="fas fa-pen-fancy mr-2"></i> change path
                                            </a>
                                            <a class="dropdown-item kiabuilder-delete" href="javascript:void(0);">
                                                <i class="far fa-trash-alt mr-2"></i> Archive
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>

                  </div>

                 


              </div>
              <!-- col -->
              <div class="col-md-9">
                    <div class="wizard-nav">  
                        <div class="wizard-steps" id="secondwizard">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending"></div>
                                <div class="wizard-step" data-wizard-type="step" :data-wizard-state="tabOpen == 'overview' ? 'current' : 'pending'" @click="kb_substeps('overview')">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number"><i class="fas fa-th"></i></div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Overview</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step" :data-wizard-state="tabOpen == 'automation' ? 'current' : 'pending'" @click="kb_substeps('automation')">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number"><i class="fas fa-bolt"></i></div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Automation</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step" :data-wizard-state="tabOpen == 'publishing' ? 'current' : 'pending'" @click="kb_substeps('publishing')">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number"><i class="fas fa-wrench"></i></div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Publishing</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    
                        <div class="kb-overview loadEffectFromLeft" v-if="tabOpen == 'overview'">
                             <div class="sage-input site_support_email mt-3">
                           <input class="sage-input__field" type="url" value="http://127.0.0.1:8000/optin" id="site_support_email">
                           <label class="sage-input__label" for="site_support_email">Your Link</label>
                           <span class="kb-settings-i"><i class="fas fa-cog"></i></span>
                           <span class="kb-sharelink"><i class="fas fa-external-link-alt"></i></span>
                            </div>

                            <div class="kb-insidebodycard row pb-5">
                                <div class="kb-insidecard col-md-4">
                                    <div class=" kb-internalshadow ">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Main</span>
                                                <i class="fas fa-history pr-2"></i>
                                                <small class="d-sm-block d-none">11 mins ago</small>
                                            </div>
                                            <div class="toast-body yesdeclarewinner">
                                                <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="Kia Builder Logo">
                                                <div class="declarewinner">
                                                    <i class="fas fa-trophy"></i>
                                                    <a href="#">
                                                        Declare As winner
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="toast-header">
                                                <button class="btn btn-secondary btn-block mr-2"><i class="fas fa-pen"></i> Edit Page</button>
                                                <button class="btn btn-secondary mr-2"><i class="fas fa-external-link-alt"></i></button>
                                                <button class="btn btn-secondary "><i class="fas fa-cog"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kb-insidecard col-md-4 kb-internalshadow">
                                    <div class=" kb-internalshadow">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Split Test</span>
                                                <i class="fas fa-bolt mr-2"></i>
                                                <small class="d-sm-block d-none">Optmize your lead</small>
                                            </div>
                                            <div class="toast-body">
                                                <div class="progress progress-bar-success progress-sm" style="display:flex;">
                                                    <div class="progress-bar" id="kb-changemyprogress" role="progressbar" aria-valuenow="79" aria-valuemin="101" aria-valuemax="100" style="width: 50%;"></div>
                                                </div>
                                                <input type="range" min="0" max="100" value="50" id="kb-splittestmake" @change="totalmy">
                                                <div class="splitTestText control">
                                                    <span class="number" id="kb-control">50%</span>
                                                    of traffic
                                                </div>
                                                <div class="splitTestText variation">
                                                    <span class="number" id="kb-variation">50%</span>
                                                    of traffic
                                                </div>
                                                <div class="savechangesvs">
                                                    <h6>Ready to go</h6>
                                                    <p>You've changed your split test, which will invalidate any previous results. Please confirm that you'd like to apply these changes and start the test over</p>
                                                    <button class="btn btn-primary">Apply Changes</button>
                                                </div>

                                            </div>
                                            <div class="kb-split-text pl-2 pr-2" style="display:none;">  
                                                <div class="btn-block mb-3">
                                                    <div class="svgimg3">
                                                        <svg version="1.1" id="Layer_1" class="animation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                                        <path fill="#333333" d="M48,67.6c0,0.8-0.6,1.4-1.4,1.4H31.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h15.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V67.6z"/>
                                                        <path fill="none" stroke="#333333" stroke-width="2" stroke-miterlimit="10" d="M50.6,34h10c2.6,0,4.4,1.9,4.4,4.5v16.3
                                                            c0,3.2,1.1,6.4,2.7,9.1l1.2,1.8l13.3,23.1c2.5,4.4-0.6,10.2-5.6,10.2H50.6H24.3c-5,0-8.2-5.8-5.7-10.2l12.9-22.9l0.8-2.2
                                                            c1.3-2.5,1.7-5.4,1.7-8.2v-17c0-2.6,2.7-4.5,5.4-4.5h11.1H50.6z"/>
                                                        <path fill="#333333" d="M44,78.6c0,0.8-0.6,1.4-1.4,1.4H25.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h17.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V78.6z"/>
                                                        <path fill="#333333" d="M39,88.6c0,0.8-0.6,1.4-1.4,1.4H20.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h17.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V88.6z"/>
                                                        <path fill="#333333" d="M69.7,35.5c0,1.5-1.3,2.5-2.9,2.5H32.3c-1.6,0-2.9-1-2.9-2.5l0,0c0-1.5,1.3-2.5,2.9-2.5h34.4
                                                            C68.4,33,69.7,34,69.7,35.5L69.7,35.5z"/>
                                                        <circle id="Bubble-1" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="53.5" cy="51" r="2.4"/>
                                                        <circle id="Bubble-2" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="42.8" cy="48.9" r="4.9"/>
                                                        <circle id="Bubble-3" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="56" cy="45.4" r="6"/>
                                                        <circle id="Bubble-4" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="42.1" cy="38.6" r="3.2"/>
                                                        <circle id="Bubble-5" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="46.5" cy="47" r="2.4"/>
                                                        <circle id="Bubble-6" fill="none" stroke="#333333" stroke-width="1.5268" stroke-miterlimit="10" cx="52.8" cy="38.9" r="4.9"/>
                                                        </svg>
                                                    </div>  
                                                </div>
                                                <center>
                                                    <p>Start Split Test</p>
                                                </center>
                                                <button class="btn btn-secondary m-auto btn-block" @click="showvariation"><i class="fas fa-plus"></i> Create Variation</button>

                                                <div v-if="createvariation">
                                                    <div class="kb-createvar">
                                                        <button class="btn btn-secondary m-auto btn-block"><i class="fas fa-plus"></i> Duplicate Variation 1</button>
                                                        <br>
                                                        <button class="btn btn-secondary m-auto btn-block mt-2"><i class="fas fa-plus"></i> Create from Templates</button>
                                                    </div>
                                                    <div class="kb-bxoverlay" @click="hidevariation"></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="kb-insidecard col-md-4 kb-internalshadow">
                                    <div class=" kb-internalshadow">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Variation</span>
                                                <i class="fas fa-history pr-2"></i>
                                                <small class="d-sm-block d-none">1 mins ago</small>
                                            </div>
                                            <div class="toast-body yesdeclarewinner">
                                                <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="Kia Builder Logo">
                                                <div class="declarewinner kb-red">
                                                    <i class="fas fa-trophy"></i>
                                                    <a href="#">
                                                        Declare As winner
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="toast-header">
                                                <button class="btn btn-secondary btn-block mr-2"><i class="fas fa-pen"></i> Edit Page</button>
                                                <button class="btn btn-secondary mr-2"><i class="fas fa-external-link-alt"></i></button>
                                                <button class="btn btn-secondary "><i class="fas fa-cog"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-wizard-kb mb-5">
                                <button class="btn btn-secondary"><i class="fas fa-times"></i> Remove From Funnel</button>
                                <button class="btn btn-secondary"><i class="far fa-trash-alt"></i> Delete Funnel Step</button>
                                <button class="btn btn-secondary"><i class="far fa-clone"></i> Clone Funnel Step</button>
                            </div>
                        </div>
                        <!-- overview end -->

                        <div class="kb-automation mt-4 pb-5 loadEffect" v-if="tabOpen == 'automation'">
                            <div class="kb-automation-header">

                            </div>
                            <div class="kb-automation-footer text-center">
                                <button class="btn btn-secondary" @click="automation_show('action')"><i class="fas fa-plus"></i> Add New Action</button>
                                <button class="btn btn-secondary" @click="automation_show('email')"><i class="fas fa-plus"></i> Add New Email</button>
                                <button class="btn btn-secondary" @click="automation_show('sms')"><i class="fas fa-plus"></i> Add New Sms Text</button>
                            </div>
                        </div>
                        <!-- automation end -->

                        <div class="kb-publishing loadEffect" v-if="tabOpen == 'publishing'">
                            <div class="row mt-4 pb-5">
                                <div class="col-md-6">
                                    <p><b>FUNNEL STEP NAME</b></p>
                                    <input type="text" class="form-control" value="Optin">
                                </div>
                                <div class="col-md-6">
                                    <p><b>PATH</b></p>
                                    <input type="text" class="form-control" value="/optin">
                                </div>
                                <div class="col-md-12 pt-3">
                                    <button class="btn btn-primary float-right">Update Funnel Step</button>

                                </div>
                            </div>
                        </div>
                        <!-- publishing end -->

                    </div>
                    <!-- wizard nav -->
              </div>
              <!-- col -->
          </div>
          <!-- row -->
      </div>
      <!-- container -->
  </div>
</template>
<script>
export default {
    data(){
        return{
            createvariation:false,
            overview:true,
            automation:false,
            publishing:false,
            automationaddnewaction:true,
            automationaddnewemail:false,
            automationaddnewtext:false,
            poupsidebar:false,
            tabOpen:'overview',
            
        }
    },
    methods: {
        showvariation(){
            this.createvariation = true;
        },
        hidevariation(){
            this.createvariation = false;
        },
        totalmy() {
            var thsvalue = document.getElementById('kb-splittestmake').value;
           document.getElementById('kb-changemyprogress').style.width = thsvalue+'%';

           document.getElementById('kb-control').innerHTML = thsvalue+'%';
           document.getElementById('kb-variation').innerHTML = (100-thsvalue)+'%';

        },
        automation_show(value){
            if(value=='action'){
                this.automationaddnewaction = true;
                this.automationaddnewemail = false;
                this.automationaddnewtext = false;
            }else if(value=='email'){
                this.automationaddnewaction = false;
                this.automationaddnewemail = true;
                this.automationaddnewtext = false;
            }else if(value=='sms'){
                this.automationaddnewaction = false;
                this.automationaddnewemail = false;
                this.automationaddnewtext = true;
            }
                this.poupsidebar = true;
        },
        hidepopupsidebar(){
            this.poupsidebar = false;
        },
        kb_substeps(value){
            this.tabOpen = value;
        }
    },
   
}
</script>
