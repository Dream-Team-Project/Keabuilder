<template>
  <div>
    <div id="page-container">
      <div id="kb-slectction-ask" v-if="showSelection">
        <span class="kb-cut" @click="showSelection = !showSelection"><i class="fa fa-times"></i></span>
        <div id="kb-row-selection" v-if="rowSelection">
          <div class="kb-ask-head">Row Dimension</div>
          <div>
            <ul class="row-list">
              <li class="kb-row-type row-1" @click="addNewRow('kb-full-block', 1)"><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-2" @click="addNewRow('kb-half-block', 2)"><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-3" @click="addNewRow('kb-three-block', 3)"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-4" @click="addNewRow('kb-four-block', 4)"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-5" @click="addNewRow('kb-five-block', 5)"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
              <li class="kb-row-type row-1-6" @click="addNewRow('kb-six-block', 6)"><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span><span class="block"><span></span></span></li>
            </ul>
          </div>
        </div>
      </div>
      <div v-for="(build, index) in builder" :key="build.id" class="kb-section kb-contain-element" :class="build.sectionSetting ? 'kb-border' : ''" @mouseenter="build.sectionSetting = true" @mouseleave="build.sectionSetting = false">
        <div> 
          <div class="kb-module-setting" v-if="build.sectionSetting">
            <span><i class="fa fa-arrows-alt"></i></span>
            <span v-tooltip="{ content: 'Section Setting' }"><i class="far fa-edit"></i></span>
            <span v-tooltip="{ content: 'Duplicate Section' }"><i class="far fa-copy" @click="duplicateSection(build, index)"></i></span>
            <span v-tooltip="{ content: 'Delete Section' }" v-if="builder.length != 1"><i class="far fa-trash-alt" @click="deleteSection(index)"></i></span>
          </div>
          <span class="kb-ispan-add add-row" v-tooltip="{ content: 'Add New Row' }" @click="selectedSection = build, showSelection = true, rowSelection = true" v-if="build.rowArr.length == 0"><i class="fa fa-plus"></i></span>
          <span class="kb-ispan-add add-section bottom-add-btn" v-tooltip="{ content: 'Add New Section' }" @click="addNewSection(index)" v-if="build.sectionSetting"><i class="fa fa-plus"></i></span>
        </div>
        <div class="kb-row kb-contain-element kb-border" v-for="(row, index) in build.rowArr" :key="row.id" @mouseenter="row.rowSetting = true" @mouseleave="row.rowSetting = false">
            <div class="kb-module-setting" v-if="row.rowSetting">
              <span><i class="fa fa-arrows-alt"></i></span>
              <span  v-tooltip="{ content: 'Column Structure' }" ><i class="fa fa-columns" @click="selectedRow = row, showSelection = true, rowSelection = true"></i></span>
              <span v-tooltip="{ content: 'Section Row' }"><i class="far fa-edit"></i></span>
              <span v-tooltip="{ content: 'Duplicate Row' }"><i class="far fa-copy" @click="duplicateRow(build.rowArr, row, index)"></i></span>
              <span v-tooltip="{ content: 'Delete Row' }"><i class="far fa-trash-alt" @click="deleteRow(build.rowArr, index)"></i></span>
            </div>
            <div v-for="column in row.columnLength" :key="column" class="kb-inner-row" :class="row.rowSize"> 
              <span class="kb-ispan-add add-element"  v-tooltip="{ content: 'Add New Element' }"><i class="fa fa-plus"></i></span>
            </div>
            <span class="kb-ispan-add add-row bottom-add-btn" v-tooltip="{ content: 'Add New Row' }" @click="selectedSection = build, showSelection = true, rowSelection = true"><i class="fa fa-plus"></i></span>
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
        buildObj: {id: null, sectionSetting: false, rowArr: []},
        rowObj: {id: null, columnLength: 0, rowSize: '', rowSetting: false},
        selectedSection:'',
        selectedRow:'',
        showSelection: false,
        rowSelection: false,
        section_id: 0,
        row_id: 0,
        positions: {
          clientX: undefined,
          clientY: undefined,
          movementX: 0,
          movementY: 0
        }
      }
    },
    created() {
        this.addNewSection(this.section_id);
    },
    computed: {
    },
    watch: {
    },
    methods: {
      // section

      appendSection(tempObj, index) {
        tempObj.id = this.section_id++;
        this.builder.splice(index+1, 0, tempObj);
      },

      addNewSection(index) {
        var tempObj = JSON.parse(JSON.stringify(this.buildObj));
        this.appendSection(tempObj, index);
      },

      duplicateSection(build, index) {
        var tempObj = JSON.parse(JSON.stringify(build));
        this.appendSection(tempObj, index);
      },

      deleteSection(index) {
          this.builder.splice(index, 1);
      },

      // section

      // row

      appendRow(tempObj, index) {
        tempObj.id = this.section_id++;
        this.builder.splice(index+1, 0, tempObj);
      },

      addNewRow(rowSize, columnLength) {
        if(!this.selectedRow) {
          var tempObj = JSON.parse(JSON.stringify(this.rowObj));
          tempObj.id = this.selectedSection.rowArr.length;
          tempObj.rowSize = rowSize;
          tempObj.columnLength = columnLength;
          this.selectedSection.rowArr.splice(this.row_id+1, 0, tempObj);
        }
        else {
          this.selectedRow.rowSize = rowSize;
          this.selectedRow.columnLength = columnLength;
          this.selectedRow = '';
        }
          this.showSelection = !this.showSelection;
      },

      duplicateRow(rowArr, row, index) {
        var tempObj = JSON.parse(JSON.stringify(row));
        tempObj.id = rowArr.length;
        rowArr.splice(index+1, 0, tempObj);
      },

      deleteRow(rowArr, index) {
          rowArr.splice(index, 1);
      },      

      // row

      // dragable

    dragMouseDown: function (event) {
      event.preventDefault()
      // get the mouse cursor position at startup:
      this.positions.clientX = event.clientX
      this.positions.clientY = event.clientY
      document.onmousemove = this.elementDrag
      document.onmouseup = this.closeDragElement
    },
    elementDrag: function (event) {
      event.preventDefault()
      this.positions.movementX = this.positions.clientX - event.clientX
      this.positions.movementY = this.positions.clientY - event.clientY
      this.positions.clientX = event.clientX
      this.positions.clientY = event.clientY
      // set the element's new position:
      this.$refs.draggableContainer.style.top = (this.$refs.draggableContainer.offsetTop - this.positions.movementY) + 'px'
      this.$refs.draggableContainer.style.left = (this.$refs.draggableContainer.offsetLeft - this.positions.movementX) + 'px'
    },
    closeDragElement () {
      document.onmouseup = null
      document.onmousemove = null
    }

    //dragable

    }
}
</script>
