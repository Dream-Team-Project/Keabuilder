<style>
.mainvideoheatmap video{
    width:100%;
    height:100%;
}
.mainvideoheatmap {
    background: #e2e2e2;
    box-shadow: 0 0 30px rgb(139 139 139);
    -webkit-box-shadow: 0 0 30px rgb(139 139 139);
}

/*video navbar styling */

#playback_nav_controls {
    margin-top: -20px;
    position: relative;
    padding: 12px 0px;
    margin-bottom: 40px;
    border: 1px solid transparent;
    background-image: -webkit-linear-gradient(top,#3c3c3c 0,#222 100%);
    background-image: -o-linear-gradient(top,#3c3c3c 0,#222 100%);
    background-image: -webkit-gradient(linear,left top,left bottom,from(#3c3c3c),to(#222));
    background-image: linear-gradient(to bottom,#3c3c3c 0,#222 100%);
    background-repeat: repeat-x;
    border-radius: 4px;
  background-color: #222;
    border-color: #080808;
}
.btn-dark-inset, #playback_nav_controls .btn-dark {
    border-color: #222 #292929 #111;
    box-shadow: inset 0 1px 0 rgb(255 255 255 / 18%), 0 1px 0 rgb(255 255 255 / 12%);
}
#playback_nav_controls .btn-dark {
    background-color: #333;
    background-image: -webkit-gradient(linear,0 100%,0 0,from(#555),to(#333));
    background-image: -webkit-linear-gradient(#555 0,#333 100%);
    background-image: -moz-linear-gradient(#555 0,#333 100%);
    background-image: -o-linear-gradient(#555 0,#333 100%);
    background-image: linear-gradient(#555 0,#333 100%);
    background-repeat: repeat-x;
    color: #eee;
    text-shadow: 0 -1px 0 rgb(0 0 0 / 75%);
}
#play-controls {
    width: 100%;
    display: inline-block;
}
#toggle_playback.paused {
    background-color: #333;
    background-image: -webkit-gradient(linear,0 100%,0 0,from(#555),to(#333));
    background-image: -webkit-linear-gradient(#555 0,#333 100%);
    background-image: -moz-linear-gradient(#555 0,#333 100%);
    background-image: -o-linear-gradient(#555 0,#333 100%);
    background-image: linear-gradient(#555 0,#333 100%);
    background-repeat: repeat-x;
    border-color: #222 #292929 #111;
    box-shadow: inset 0 1px 0 rgb(255 255 255 / 18%), 0 1px 0 rgb(255 255 255 / 12%);
}
#playback_nav_controls .progress {
    background-color: #222;
    background-image: -webkit-gradient(linear,0 0,0 100%,from(#222),to(#292929));
    background-image: -webkit-linear-gradient(#222,#292929);
    background-image: -moz-linear-gradient(#222,#292929);
    background-image: -o-linear-gradient(#222,#292929);
    background-image: linear-gradient(#222,#292929);
    border: 1px solid;
    border-color: #222 #1a1a1a #111;
    border-left: 0;
    border-right: 0;
    border-radius: 0;
    box-shadow: inset 0 1px 10px rgb(0 0 0 / 50%), 0 1px 0 rgb(255 255 255 / 12%);
    cursor: pointer;
    height: 30px;
    margin-bottom: 0;
    margin-top: 10px;
    min-width: 50px;
    position: relative;
    width: 89%;
    float: right;
    margin: 0px;
}
#playback_activity.dark {
    color: #fff;
    text-shadow: 0 0 3px rgb(0 0 0 / 50%);
}
#playback_activity {
    color: #333;
    font-size: 11px;
    font-weight: 700;
    left: 0;
    line-height: 30px;
    position: absolute;
    text-align: center;
    text-shadow: 0 0 2px #fff, 0 0 2px #fff;
    top: 0;
    width: 100%;
    -moz-osx-font-smoothing: grayscale;
}
#playback_nav_controls .progress:not(.active) .progress-bar {
    background-color: #777;
}
.progress-bar-striped, .progress-striped .progress-bar {
    background-image: -webkit-linear-gradient(
45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: -o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: linear-gradient(
45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    -webkit-background-size: 40px 40px;
    background-size: 40px 40px;
}
.btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    float: left;
}
#toggle_playback.btn-toggle.paused .fa-play {
    color: #d8c898;
    text-shadow: 0 -1px 0 rgb(0 0 0 / 90%);
}
#toggle_playback.btn-toggle .fa-pause {
    display: none;
}
.pull-right {
    float: right;
}
#playback_nav_controls .progress.active .progress-bar {
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    -o-animation: progress-bar-stripes 2s linear infinite;
    animation: progress-bar-stripes 2s linear infinite;
    background-color: rgb(216 200 152 / 63%);
}
@keyframes progress-bar-stripes{
    0% {
        background-position: 40px 0;
    }
    100% {
        background-position: 0 0;
    }
}
.wood_back_dark {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    border: none;
    background-image: linear-gradient(black,rgba(0,0,0,.3));
    transition: opacity 1s linear;
}
#close_spy_btn a {
    color: #eee;
}
    
/*video navbar styling */


.scrollable-menu {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;
    text-align: left;
}
.data-menu {
    max-width: 400px;
    -moz-osx-font-smoothing: grayscale;
}
.dropdown-menu {
    min-width: 170px;
}
.open>.dropdown-menu {
    display: block;
}
.pull-right>.dropdown-menu {
    right: 0;
    left: auto;
}
.data-menu__item {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}
.data-menu--padded .data-menu__item, .data-menu__item--padded {
    padding: 10px 25px;
}
.data-menu__item--separator {
    border-top: 1px solid #eee;
    margin: 0;
}
.data-menu--padded .data-menu__item--separator {
    margin: 0 25px;
}
.data-menu__label {
    color: #aaa;
    display: block;
    font-size: 11px;
    font-weight: 600;
    line-height: 1;
    text-transform: uppercase;
    margin-top: 0;
}
#mainindex .btn-primary a{
    color: #fff;
}

</style>
<template>
  <div id="recordingsheatmap">
    
    <div id="full_playback_controls">
        <nav id="playback_nav_controls">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">

                        <div class="navbar-btn btn btn-dark btn-sm btn-default" id="close_spy_btn">
                           <router-link to="heat-maps"><span class="glyphicon glyphicon-chevron-left"></span> <span class="lbl">Back</span></router-link>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="btn-group" id="play-controls">

                            <div class="navbar-btn btn btn-dark btn-sm tip btn-blue btn-toggle paused" id="toggle_playback" @click="toggle_playback">
                                <i class="fas fa-play"></i>
                                <i class="fas fa-pause"></i>
                            </div>

                            <div id="repeat-recording-button" @click="repeat_record" class="navbar-btn btn btn-dark btn-sm tip btn-blue btn-toggle">
                                <i class="fas fa-redo-alt"></i>
                                </div>

                            <div class="dropdown pull-left btn-group">
                                <select class="btn btn-dark navbar-btn btn-sm tip rounded-xs-right bordered-xs-right dropdown-toggle" id="play_speed_selector" @change="kb_speedcontrol">
                                    <option value="1">½ x</option>
                                    <option value="2" selected>1x</option>
                                    <option value="3">2x</option>
                                    <option value="4">3x</option>
                                    <option value="5">4x</option>
                                    <option value="6">5x</option>
                                    <option value="7">10x</option>
                                </select>
                            </div>

                            <div class="navbar-btn progress progress-striped tip" id="kb-progressbar">
                                <div id="playback_activity" class="dark" @click="toggle_playback"></div>
                                <div class="progress-bar" style="width: 107.692%; transition: none 0s ease 0s;">
                                    <span class="sr-only">0%</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="btn-group pull-right">

                            <div class="btn btn-primary btn-dark-inset navbar-btn btn-sm tip" >
                                <a href="#" target="_blank" id="kb_loadheatmap">Load Heatmap</a>
                            </div>

                            <div class="dropdown btn-group pull-right"  :class="{ 'open' : isOpen }"  id="recording_page_count" >
                                <button class="btn btn-sm navbar-btn btn-dark dropdown-toggle" id="page_count_val" type="button">
                                    <span id="page_lbl" @click="openClose" >Visitor Info</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu data-menu data-menu--padded" id="recording_visitor_data_menu">
                                    <li class="data-menu__item">
                                        <div class="media">                                           
                                            <div class="media-body">
                                                <h3 class="media-heading">Visitor</h3>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">Page Start</h4>
                                        <ul class="list-unstyled">
                                            <li class="data-menu__field" id="kb_visitorinfo1"></li>
                                        </ul>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">Browser &amp; OS</h4>
                                        <ul class="list-unstyled">
                                            <li class="data-menu__field" id="kb_visitorinfo2"></li>
                                        </ul>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">Location</h4>
                                        <span class="data-menu__field" id="kb_visitorinfo3"></span>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">IP Address</h4><span class="data-menu__field text-center" id="kb_visitorinfo4"></span>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>                                    
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">Source</h4>
                                        <ul class="list-unstyled list-spaced">
                                            <li><span class="data-menu__field"><small class="text-muted">Landing URL:</small><br> 
                                            <a href="" class="tip" id="kb_visitorinfo5" target="_blank"></a>
                                                        </span>
                                            </li>                                            
                                        </ul>
                                    </li>
                                    <li class="data-menu__item--separator" role="presentation"></li>
                                    <li class="data-menu__item">
                                        <h4 class="data-menu__label">Device</h4><span class="data-menu__field text-center" id="kb_visitorinfo6"></span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>

        </nav>
    </div>

      <!-- next video container -->
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                <div class="mainvideoheatmap">
                    <video id="kb-heatmapvideo" muted  @ended="onVideoEnded">
                    </video>
                </div>
              </div>
          </div>
      </div>
      
      <div class="wood_back_dark" style="opacity: 1;"></div>
  </div>
</template>

<script>
export default {
   data() {
    return {  
        video_index:0,
        video_player:null,
        video_list: [],
        toggleplkvalue:0,
        isOpen:false,
    }
  },created(){
        this.init();
    },
   methods:{
        init(){
            var hshvl = window.location.hash;
            hshvl = hshvl.replace('#','');
            axios.get('getheatdir?hash='+hshvl).then(response=>{
                // console.log(response.data);
                response.data.forEach(element => {
                    this.video_list.push(element);
                });
                    this.video_player = document.getElementById("kb-heatmapvideo");
                    this.video_player.setAttribute("src", '/videos_heatmaps/'+this.video_list[this.video_index]);
                    this.video_player.play();
                    document.getElementById('playback_activity').innerText = 'Viewing...';
                    document.getElementById('kb-progressbar').classList.add('active');

            });

              axios.get('visitorinfo?hash='+hshvl).then(response=>{
                console.log(response.data);
                 document.getElementById("kb_visitorinfo1").innerText = response.data[0].created_at;
                 document.getElementById("kb_visitorinfo2").innerText = response.data[0].os;
                 document.getElementById("kb_visitorinfo3").innerText = response.data[0].location;
                 document.getElementById("kb_visitorinfo4").innerText = response.data[0].ipaddress;
                 document.getElementById("kb_visitorinfo5").innerText = response.data[0].landing_page;
                 document.getElementById("kb_visitorinfo5").href = response.data[0].landing_page;
                 document.getElementById("kb_visitorinfo6").innerText = response.data[0].device;
                 document.getElementById("kb_loadheatmap").href = response.data[0].landing_page+"#kb-heatmaps";

              });

    },toggle_playback(){
        if(this.toggleplkvalue==1){
            this.video_player.play();
            document.getElementById('toggle_playback').children[1].style.display = "none";
            document.getElementById('toggle_playback').children[0].style.display = "block";
            document.getElementById('playback_activity').innerText = 'Viewing...';
            document.getElementById('kb-progressbar').classList.add('active');
        }else{
            this.video_player.pause();
            document.getElementById('toggle_playback').children[0].style.display = "none";
            document.getElementById('toggle_playback').children[1].style.display = "block";
            document.getElementById('playback_activity').innerText = 'Pause';
            document.getElementById('kb-progressbar').classList.remove('active');
        }
        this.toggleplkvalue++;
        if(this.toggleplkvalue==2){
            this.toggleplkvalue=0;
        }

    },onVideoEnded(){
        if(this.video_index < this.video_list.length - 1){
            this.video_index++;
        }
        else{
            this.video_index = 0;
        }
            // console.log("video ended");
            // console.log(this.video_index);
        this.video_player.setAttribute("src", '/videos_heatmaps/'+this.video_list[this.video_index]);
        this.video_player.play();
    },
    repeat_record(){
         this.video_player.pause();
         this.video_player.setAttribute("src", '/videos_heatmaps/'+this.video_list[0]);
         this.video_index = 0;
         this.video_player.defaultPlaybackRate = 1;
         document.getElementById('play_speed_selector').value = '2';
         this.video_player.play();
    },kb_speedcontrol(event){
        switch (event.target.value) {
                case '1':
            this.video_player.defaultPlaybackRate = 0.5;
            break;
                case '2':
            this.video_player.defaultPlaybackRate = 1;
            break;
                case '3':
            this.video_player.defaultPlaybackRate = 2;
            break;
                case '4':
            this.video_player.defaultPlaybackRate = 3;
            break;
                case '5':
            this.video_player.defaultPlaybackRate = 4;
            break;
                case '6':
            this.video_player.defaultPlaybackRate = 5;
            break;
                case '7':
            this.video_player.defaultPlaybackRate = 10;
            break;        
            default:
            break;
        }
    },openClose() { 
      this.isOpen = !this.isOpen;
    },



   }
}
</script>