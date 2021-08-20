<template>
    <div class="hidden">
      <vs-sidebar
        absolute
        hover-expand
        reduce
        v-model="active"
        open
        >
        <template #logo>
          <!-- ...img logo -->
              <img v-bind:src="'images/logo/bw.svg'" alt="">          
        </template>
        <vs-sidebar-item id="dashboard">
          <template #icon>
              <i class="fa fa-home" aria-hidden="true"></i>
          </template>
          <router-link :to="{name: 'dashboard'}">Dashboard</router-link>
        </vs-sidebar-item>
        <vs-sidebar-item id="funnel">
          <template #icon>
              <i class="fa fa-filter" aria-hidden="true"></i>
          </template>
          <router-link :to="{name: 'builder'}">Funnels / Builder</router-link>
        </vs-sidebar-item>
        <vs-sidebar-item id="membership">
          <template #icon>
             <i class="fas fa-shield-alt"></i>
          </template>
          <router-link :to="{name: 'spapageone'}">Membership</router-link>
        </vs-sidebar-item>
        <vs-sidebar-item id="analytics">
          <template #icon>
              <i class="fas fa-chart-pie"></i>
          </template>
            <router-link :to="{name: 'spapagetwo'}">Analytics</router-link>
        </vs-sidebar-item>
        <vs-sidebar-item id="backpack">
          <template #icon>
           <i class="fas fa-briefcase"></i>
          </template>
          Backpack
        </vs-sidebar-item>
        <vs-sidebar-item id="contacts">
          <template #icon>
            <i class="far fa-id-badge"></i>
          </template>
          Contacts
        </vs-sidebar-item>
         <vs-sidebar-item id="sales">
          <template #icon>
           <i class="fas fa-chart-line"></i>
          </template>
          Sales
        </vs-sidebar-item>
         <vs-sidebar-item id="affilates">
          <template #icon>
            <i class="fas fa-search-dollar"></i>
          </template>
          Affilates
        </vs-sidebar-item>
         <vs-sidebar-item id="integrations">
          <template #icon>
            <i class="fas fa-cogs"></i>
          </template>
          Integrations
        </vs-sidebar-item>
        <vs-sidebar-group>
          <template #header>
            <vs-sidebar-item arrow>
              <template #icon>
                <i class="fas fa-life-ring"></i>
              </template>
              Help
            </vs-sidebar-item>
          </template>
          <vs-sidebar-item id="gethelp">
            <template #icon>
              <i class="fas fa-comments"></i>
            </template>
            Get Help
          </vs-sidebar-item>
          <vs-sidebar-item id="mysupportrequest">
            <template #icon>
              <i class="fas fa-comments"></i>
            </template>
            My Support Request
          </vs-sidebar-item>
          <vs-sidebar-item id="whatsnew">
            <template #icon>
              <i class="fas fa-gifts"></i>
            </template>
            What's New
          </vs-sidebar-item>
        </vs-sidebar-group>  
        <vs-sidebar-group>
          <template #header>
            <vs-sidebar-item arrow>
              <template #icon>
                <i class="fas fa-book"></i>
              </template>
              Documentation
            </vs-sidebar-item>
          </template>
          <vs-sidebar-item id="gettingstarted">
            <template #icon>
              <i class="fas fa-rocket"></i>
            </template>
            Getting Started
          </vs-sidebar-item>
          <vs-sidebar-item id="funnelbuilder">
            <template #icon>
              <i class="fas fa-filter"></i>
            </template>
            Funnel Builder
          </vs-sidebar-item>
          <vs-sidebar-item id="myaccount">
            <template #icon>
              <i class="fas fa-user-cog"></i>
            </template>
            My Account Settings
          </vs-sidebar-item>
          <vs-sidebar-item id="follow">
            <template #icon>
             <i class="fas fa-user-cog"></i>
            </template>
            Follow Up Funnels
          </vs-sidebar-item>
          <vs-sidebar-item id="backpack">
            <template #icon>
              <i class="fas fa-briefcase"></i>
            </template>
            Backpack
          </vs-sidebar-item>
          <vs-sidebar-item id="qas">
            <template #icon>
              <i class="fas fa-chalkboard-teacher"></i>
            </template>
            Q&As, Advice and Troubleshooting
          </vs-sidebar-item>
          <vs-sidebar-item id="affiliatepro">
            <template #icon>
              <i class="fas fa-funnel-dollar"></i>
            </template>
            Affiliate Program
          </vs-sidebar-item>
            <vs-sidebar-item id="trainingresources">
            <template #icon>
              <i class="fas fa-clipboard-check"></i>
            </template>
            Training & Resources
          </vs-sidebar-item>
        </vs-sidebar-group>        
        <template #footer>
          <vs-row justify="space-between">
            <vs-avatar badge-color="danger" badge-position="top-right">
              <i class="fa fa-bell" aria-hidden="true"></i>     

              <template #badge>
                28
              </template>
            </vs-avatar>

            <vs-avatar>
              <img v-bind:src="'images/profile/avatar.png'" alt="">
            </vs-avatar>
          </vs-row>
        </template>
      </vs-sidebar>
    </div>
  </template>
<script>
  export default {
    data:() => ({
      active: 'dashboard',
    }),methods:{
       
    }
  }
  </script>

        