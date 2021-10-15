<template>
  <div>
    <div id="page-container">
      <div id="kb-slectction-ask" v-if="showSelection">
        <span class="kb-cut" @click="showSelection = !showSelection, rowSelection = !rowSelection"><i class="fa fa-times"></i></span>
        <div id="kb-row-selection" v-if="rowSelection">
          <div class="kb-ask-head">Row Dimension</div>
          <div>
            <ul class="row-list">
              <li class="kb-row-type row-1" @click="rowSize = 'kb-full-block', rowLength = 1"><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-2" @click="rowSize = 'kb-half-block', rowLength = 2"><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-3" @click="rowSize = 'kb-three-block', rowLength = 3"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-4" @click="rowSize = 'kb-four-block', rowLength = 4"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-5" @click="rowSize = 'kb-five-block', rowLength = 5"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-6" @click="rowSize = 'kb-six-block', rowLength = 6"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
            </ul>
          </div>
        </div>
      </div>
      <div v-for="build in builder" :key="build.id" class="kb-section kb-contain-element" :class="build.sectionSetting || rowSelection ? 'kb-border' : ''" @mouseenter="build.sectionSetting = true" @mouseleave="build.sectionSetting = false">
        <div> 
          <div class="kb-module-setting" v-if="build.sectionSetting">
            <span><i class="fa fa-arrows-alt"></i></span>
            <span><i class="fa fa-cog"></i></span>
            <span><i class="fa fa-copy"></i></span>
            <span><i class="far fa-trash-alt"></i></span>
          </div>
          <span class="kb-ispan-add add-row" @click="showSelection = !showSelection, rowSelection = !rowSelection" v-if="!rowSelection && !rowSelected"><i class="fa fa-plus"></i></span>
          <span class="kb-ispan-add add-section bottom-add-btn" @click="addNewSection()" v-if="build.sectionSetting || rowSelection"><i class="fa fa-plus"></i></span>
        </div>
        <div class="kb-row kb-contain-element kb-border" v-if="rowSelected" @mouseenter="build.rowSetting = true" @mouseleave="build.rowSetting = false">
            <div class="kb-module-setting" v-if="rowSelected">
              <span><i class="fa fa-arrows-alt"></i></span>
              <span><i class="fa fa-cog"></i></span>
              <span><i class="fa fa-copy"></i></span>
              <span><i class="far fa-trash-alt"></i></span>
            </div>
            <div v-for="row in rowLength" :key="row" class="kb-inner-row" :class="rowSize"> 
              <span class="kb-ispan-add add-element"><i class="fa fa-plus"></i></span>
            </div>
            <span class="kb-ispan-add add-row bottom-add-btn" @click="showSelection = !showSelection, rowSelection = !rowSelection" v-if="rowSelected"><i class="fa fa-plus"></i></span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data() {
      return {
        builder: [],
        build:'',
        showSelection: false,
        rowSelection: false,
        rowSetting: false,
        rowSelected: false,
        rowSize: '',
        rowLength: 0,
        rowArray: [],
        section_id:0,
      }
    },
    created() {
        this.addNewSection();
    },
    computed: {
    },
    watch: {
      rowSize: function(val) {
        this.rowArray = [];
        for(var k=0; k<this.rowLength; k++) {
          this.rowArray.push(k);
        }
        this.showSelection = !this.showSelection;
        this.rowSelection = !this.rowSelection;
        this.rowSelected = !this.rowSelected;
      }
    },
    methods: {
      addNewSection: function() {
        var builderObj = {id:this.section_id++, sectionSetting: false, rowSetting: false};
        this.builder.push(builderObj);
      }
    }
}
</script>
