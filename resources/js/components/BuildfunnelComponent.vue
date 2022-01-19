<style scoped>
#buildfunnelcomp{
    background:#F2F4F4;
    margin-top: -20px;
    padding-top: 20px;
}
.clmwithshadow{
    padding: 20px;
}
.clmwithshadow >div{
    text-align: center;
    padding: 20px;
    box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
    -webkit-transition: all .3s ease-in-out,background 0s,color 0s,border-color 0s;
    transition: all .3s ease-in-out,background 0s,color 0s,border-color 0s;
    border-radius: .267rem;
    background:#fff;
    cursor: pointer;
}
.clmicon svg {
    width: 112px;
    margin-bottom: 13px;
    color: rgb(216 200 152 / 40%);
}
.adjustloopvfor >div{
    width: 33%;
    float: left;
}
.list-unstyled li a.active {
    color: #2c2c28!important;
    font-weight: bold;
    background: #d8c898;
}
.loader-transition1-enter-active {
  transition: all .3s ease;
}
.loader-transition1-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.loader-transition1-enter, .loader-transition1-leave-to{
  transform: translateX(10px);
  opacity: 0;
}
.fixedcategory{
    position: fixed;
    top: 126px;
    z-index: 99;
}
.gobackward{
    font-size: 10px;
    color: #444;
    cursor: pointer;
    opacity: 0.5;
    transition: .5s ease;
}
.gobackward:hover{
    opacity: 1;
}
@media screen and (max-width:500px){
    .adjustloopvfor >div{
      width: 100%;
    }

}
</style>

<template>
  <div id="buildfunnelcomp">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <h3><router-link to="funnel" class="gobackward">
                      <i class="fas fa-arrow-left fa-2x "></i></router-link> Choose Your Path 
                       <router-link to="create-funnel">
                           <button class="btn btn-primary">Or.. Create a Custom Funnel</button>
                       </router-link>
                       </h3>
              </div>
              <div class="col-md-2 mt-3 fixedcategory" >
                  <h6>INDUSTRY</h6>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted "  @click="loopthefor([5,3,7,10,11,20,17,16,6,0,1,8,18,19,12,14,15,4,2,9],'author')" :class="{ active:author }"> Author / Speaker / Coach / Consultant{{allcategory.survey}}</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,3,7,10,11,0,8,18,12,15,4,9,21],'professional')" :class="{ active:professional }"> Professional Services</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,7,11,18,19,13],'retail')" :class="{ active:retail }">Retail</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,7,11,16,6,18,19,9,21,13],'ecommerce')" :class="{ active:ecommerce }">Ecommerce</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,3,7,11,18,4,15,4,9,13],'b2b')" :class="{ active:b2b }"> B2B</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,3,7,11,0,8,18,12,15,4,9],'network')" :class="{ active:network }"> Network Marketing</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,3,7,10,11,20,17,16,6,0,1,8,18,19,12,14,15,4,9,21,13],'other1')" :class="{ active:other1 }"> Other</a></li>
                 </ul>

                 <h6>TYPE OF FUNNEL</h6>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,7,10,11,0,8,18,15,9],'generate')" :class="{ active:generate }">Generate Leads</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([20,16,6,1,19,12,14,4,2,9,21,13],'sellaproduct')" :class="{ active:sellaproduct }"> Sell A Product</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([17,1,12,4,2],'createaevent')" :class="{ active:createaevent }">Create An Event</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted " @click="loopthefor([5,3,7,10,11,20,17,16,6,0,1,8,18,19,12,14,15,4,2,9,21,13],'other2')" :class="{ active:other2 }">Other</a></li>
                </ul>
              </div>
             <div class="col-md-2 mt-3" ></div>
             <div class="col-md-10">
                    <div class="" > 
                        <span v-for="(value,index) in allcategory" :key="index" class="adjustloopvfor">
                            <div class="clmwithshadow loadEffect" v-if="allcategory[index][0]">
                                <div>
                                    <div class="clmicon">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="funnel-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-funnel-dollar fa-w-20 fa-7x"><path fill="currentColor" d="M464.02 160c-4.7 0-9.32.34-13.93.7L568.06 46.09C585.02 29.13 573.01 0 548.97 0H27.03C3.05 0-9.05 29.1 7.94 46.09L224 256v182c0 8.81 4.3 17.07 11.52 22.12l74 46.98c4.82 3.37 10.15 4.9 15.36 4.9 13.99 0 27.12-11.03 27.12-27.02v-13.22c30.43 25.12 69.46 40.21 112.02 40.21 97.34 0 175.98-78.78 175.98-175.98C640 238.64 561.22 160 464.02 160zM320 474l-63.74-38.25-.26-.22V242.47L39.35 32h497.29l-150.7 146.41c-58.01 28.78-97.9 88.42-97.9 157.56 0 37.65 11.88 72.42 31.96 101.01V474zm144.02 5.96c-79.39 0-143.98-64.59-143.98-143.98S384.63 192 464.02 192 608 256.59 608 335.98s-64.59 143.98-143.98 143.98zm27.11-152.54l-45-13.5c-5.16-1.55-8.77-6.78-8.77-12.73 0-7.27 5.3-13.19 11.8-13.19h28.11c4.56 0 8.96 1.29 12.82 3.72 3.24 2.03 7.36 1.91 10.13-.73l11.75-11.21c3.53-3.37 3.33-9.21-.57-12.14-9.1-6.83-20.08-10.77-31.37-11.35V240c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v16.12c-23.62.63-42.67 20.55-42.67 45.07 0 19.97 12.98 37.81 31.58 43.39l45 13.5c5.16 1.55 8.77 6.78 8.77 12.73 0 7.27-5.3 13.19-11.8 13.19H450.8c-4.56 0-8.96-1.29-12.82-3.72-3.24-2.03-7.36-1.91-10.13.73l-11.75 11.21c-3.53 3.37-3.33 9.21.57 12.14 9.1 6.83 20.08 10.77 31.37 11.35V432c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-16.12c23.62-.63 42.67-20.54 42.67-45.07 0-19.97-12.98-37.81-31.58-43.39z" class=""></path></svg>
                                    </div>
                                    <h5>{{value.title}}</h5>
                                    <p class="text-muted">{{value.paragraph}}</p>
                                </div>
                            </div >
                        </span>
                    </div>
              </div>
          </div>
      </div>
  </div>
</template>
<script>
export default {
    data() {
      return {
         allcategory:[
                {0:true,
                    title:'Survey Funnel',
                    paragraph:'Find out who your visitors are first and then send them into the right funnel.',
                },
                {0:true,
                    title:'Product Launch Funnel',
                    paragraph:'Built anticipation for your new product with our product launch funnels.',
                },
                {0:true,
                    title:'Invisible Funnel',
                    paragraph:'Sell access to an event, but charge them after it\'s over if they like it.',
                },
                {0:true,
                    title:'Hero Funnel',
                    paragraph:'Let people know who you are and how to connect with you.',
                },
                {0:true,
                    title:'Auto Webinar Funnel',
                    paragraph:'Create auto webinars that automatically sell your products around the clock.',
                },
                {0:true,
                    title:'Squeeze Page Funnel',
                    paragraph:'Use curiosity to generate leads with this simple two page funnel.',
                },
                {0:true,
                    title:'Video Sales Letter Funnel',
                    paragraph:'Use video to sell your products or services through a VSL funnel.',
                },
                {0:true,
                    title:'Lead Magnet Funnel',
                    paragraph:'Give people an ethical bribe in exchange for their email address.',
                },
                {0:true,
                    title:'Ask Campaign Funnel',
                    paragraph:'Find out what your customers actually want before you create it for them.',
                },
                {0:true,
                    title:'Live Demo Funnel',
                    paragraph:'Demonstrate your product through your own live demo funnel.',
                },
                {0:true,
                    title:'Homepage Funnel',
                    paragraph:'A traditional "website" that pushes people into your core funnels.',
                },
                {0:true,
                    title:'Reverse Squeeze Page Funnel',
                    paragraph:'Give value first, then ask for their email with a reverse squeeze funnel.',
                },
                {0:true,
                    title:'Webinar Funnel',
                    paragraph:'This funnel will get people to registered and attend your webinar events.',
                },
                {0:true,
                    title:'Storefront Funnel',
                    paragraph:'A traditional ecommerce "website" that pushes people into your core funnels.',
                },
                {0:true,
                    title:'Membership Funnel',
                    paragraph:'Create a membership site and sell access to it through this funnel.',
                },
                {0:true,
                    title:'Application Funnel',
                    paragraph:'Have people apply to work with you through an application funnel.',
                },
                {0:true,
                    title:'Sales Letter Funnel',
                    paragraph:'Use a traditional sales letter to sell your products or services.',
                },
                {0:true,
                    title:'Summit Funnel',
                    paragraph:'Grow your list and build your following by running a summit funnel.',
                },
                {0:true,
                    title:'Bridge Funnel',
                    paragraph:'Generate a lead, then bridge the gap before you send them to the next funnel.',
                },
                {0:true,
                    title:'2-Step Tripwire Funnel',
                    paragraph:'Use a low ticket front end product and then upsell them your others products.',
                },
                {0:true,
                    title:'Cancellation Funnel',
                    paragraph:'Create a survey asking people why they are leaving then try to save the sale.',
                },
                {0:true,
                    title:'Daily Deal Funnel',
                    paragraph:'Make an irresistable offer to get new customers (Nickname: Groupon Funnel).',
                },
            ],
            author:false,
            professional:false,
            retail:false,
            ecommerce:false,
            b2b:false,
            network:false,
            other1:false,
            generate:false,
            sellaproduct:false,
            createaevent:false,
            other2:false

        }
    },  methods: {
        loopthefor(value,which){
            if(which=='author'){    
                this.author = !this.author;
            }else if(which=='professional'){  
                this.professional = !this.professional;
            }else if(which=='retail'){  
                this.retail = !this.retail;
            }else if(which=='ecommerce'){  
                this.ecommerce = !this.ecommerce;
            }else if(which=='b2b'){  
                this.b2b = !this.b2b;
            }else if(which=='network'){  
                this.network = !this.network;
            }else if(which=='other1'){  
                this.other1 = !this.other1;
            }else if(which=='generate'){  
                this.generate = !this.generate;
            }else if(which=='sellaproduct'){  
                this.sellaproduct = !this.sellaproduct;
            }else if(which=='createaevent'){  
                this.createaevent = !this.createaevent;
            }else if(which=='other2'){  
                this.other2 = !this.other2;
            }


            for (let index = 0; index <= 21; index++) {  
                if(value.indexOf(index)==-1){
                    this.allcategory[index][0] = !this.allcategory[index][0];
                }
            }
        }
    }
}
</script>

