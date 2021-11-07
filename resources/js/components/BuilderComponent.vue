<template>
  <div>
    <div id="page-container">
      <div v-if="imgSelection" id="kb-img-group">
        <div class="kb-img-inner-group forScroll">
          <div class="kb-head">Choose a Background Image<button @click="selectBgImg()" class="kb-btn kb-btn-success">Add a new image</button><span @click="imgSelection = !imgSelection" class="kb-cut"><i class="fa fa-times"></i></span></div>
          <div class="kb-img-thumbnail-group">
            <ul class="kb-img-list">
              <li v-for="img in galleryImg" :key="img.id"><span><img v-lazy="'images/builder/upload_images/'+img.name" @click="background_image.name = '/images/builder/upload_images/'+img.name, imgSelection = !imgSelection"></span></li>
            </ul>
            <div v-if="galleryImg.length == 0"><center>Upload image</center></div>
          </div>
          <input type="file" name="image" id="imgInp" class="kb-d-none" v-on:change="onSelected($event)">
        </div>
      </div>
      <div ref="draggableContainer" id="kb-selectction-ask" class="forScroll" v-if="showSelection">
        <div class="kb-ask-head" @mousedown="dragMouseDown">{{!rowSelection ? 'Section Setting' : 'Row Dimension'}}</div>
        <span @click="!rowSelection ? expand = !expand : showSelection = !showSelection, selectedSection = ''" class="kb-selection-top-actions"><i v-if="!rowSelection" class="fas" :class="expand ? 'fa-expand-arrows-alt' : 'fas fa-compress-arrows-alt'"></i><i v-else class="fa fa-times"></i></span>
        <div id="kb-row-selection" class="selectionDiv" v-if="rowSelection">
          <div>
            <ul class="kb-row-list">
              <li v-for="rt in rowTypes" :key="rt.cls" class="kb-row-type" :class="(selectedRow.rowSize == 'kb-'+rt.appendCls ? 'kb-row-type-active ' : '') + 'row-'+rt.cls" @click="addNewRow('kb-'+rt.appendCls, rt.nofcolumn)"><span v-for="c in rt.nofcolumn" :key="c" class="block"><span></span></span></li>
            </ul>
          </div>
        </div>
        <div class="selectionDiv" v-else>
          <div class="kb-tabs-component">
              <tabs :options="{ defaultTabHash: 'general' }" cache-lifetime="10">
                <tab id="general" name="General">
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Margin</div>
                      <div class="kb-tab-content">
                        <span><input v-model="margin.top" type="text" name="top-margin" @keydown="margin.top = $event.key == 'ArrowUp' ? parseInt(margin.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.top.split('px')[0])-1 + 'px' : margin.top"><label for="top-margin">Top</label></span>
                        <span @click="m_link.tb = !m_link.tb, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.tb" v-model="margin.top" type="text" name="bottom-margin" @keydown="margin.top = $event.key == 'ArrowUp' ? parseInt(margin.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.top.split('px')[0])-1 + 'px' : margin.top"><input v-else v-model="margin.bottom" type="text" name="bottom-margin" @keydown="margin.bottom = $event.key == 'ArrowUp' ? parseInt(margin.bottom.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.bottom.split('px')[0])-1 + 'px' : margin.bottom"><label for="bottom-margin">Bottom</label></span>
                        <span @click="m_link.a = !m_link.a, m_link.tb = m_link.a, m_link.lr = m_link.a, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.a" v-model="margin.top" type="text" name="left-margin" @keydown="margin.top = $event.key == 'ArrowUp' ? parseInt(margin.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.top.split('px')[0])-1 + 'px' : margin.top"><input v-else v-model="margin.left" type="text" name="left-margin" @keydown="margin.left = $event.key == 'ArrowUp' ? parseInt(margin.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.left.split('px')[0])-1 + 'px' : margin.left"><label for="left-margin">Left</label></span>
                        <span @click="m_link.lr = !m_link.lr, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.a" v-model="margin.top" type="text" name="right-margin" @keydown="margin.top = $event.key == 'ArrowUp' ? parseInt(margin.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.top.split('px')[0])-1 + 'px' : margin.top"><input v-else-if="m_link.lr" v-model="margin.left" type="text" name="right-margin" @keydown="margin.left = $event.key == 'ArrowUp' ? parseInt(margin.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.left.split('px')[0])-1 + 'px' : margin.left"><input v-else v-model="margin.right" type="text" name="right-margin" @keydown="margin.right = $event.key == 'ArrowUp' ? parseInt(margin.right.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(margin.right.split('px')[0])-1 + 'px' : margin.right"><label for="right-margin">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Padding</div>
                      <div class="kb-tab-content">
                        <span><input v-model="padding.top" type="text" name="top-padding" @keydown="padding.top = $event.key == 'ArrowUp' ? parseInt(padding.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.top.split('px')[0])-1 + 'px' : padding.top"><label for="top-padding">Top</label></span>
                        <span @click="p_link.tb = !p_link.tb, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.tb" v-model="padding.top" type="text" name="bottom-padding" @keydown="padding.top = $event.key == 'ArrowUp' ? parseInt(padding.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.top.split('px')[0])-1 + 'px' : padding.top"><input v-else v-model="padding.bottom" type="text" name="bottom-padding" @keydown="padding.bottom = $event.key == 'ArrowUp' ? parseInt(padding.bottom.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.bottom.split('px')[0])-1 + 'px' : padding.bottom"><label for="bottom-padding">Bottom</label></span>
                        <span @click="p_link.a = !p_link.a, p_link.tb = p_link.a, p_link.lr = p_link.a, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.a" v-model="padding.top" type="text" name="left-padding" @keydown="padding.top = $event.key == 'ArrowUp' ? parseInt(padding.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.top.split('px')[0])-1 + 'px' : padding.top"><input v-else v-model="padding.left" type="text" name="left-padding" @keydown="padding.left = $event.key == 'ArrowUp' ? parseInt(padding.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.left.split('px')[0])-1 + 'px' : padding.left"><label for="left-padding">Left</label></span>
                        <span @click="p_link.lr = !p_link.lr, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.a" v-model="padding.top" type="text" name="right-padding" @keydown="padding.top = $event.key == 'ArrowUp' ? parseInt(padding.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.top.split('px')[0])-1 + 'px' : padding.top"><input v-else-if="p_link.lr" v-model="padding.left" type="text" name="right-padding" @keydown="padding.left = $event.key == 'ArrowUp' ? parseInt(padding.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.left.split('px')[0])-1 + 'px' : padding.left"><input v-else v-model="padding.right" type="text" name="right-padding" @keydown="padding.right = $event.key == 'ArrowUp' ? parseInt(padding.right.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(padding.right.split('px')[0])-1 + 'px' : padding.right"><label for="right-padding">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Width</div>
                      <div class="kb-tab-content">
                        <span><input v-model="border.top" type="text" name="top-border" @keydown="border.top = $event.key == 'ArrowUp' ? parseInt(border.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.top.split('px')[0])-1 + 'px' : border.top"><label for="top-border">Top</label></span>
                        <span @click="b_link.tb = !b_link.tb, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.tb" v-model="border.top" type="text" name="bottom-border" @keydown="border.top = $event.key == 'ArrowUp' ? parseInt(border.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.top.split('px')[0])-1 + 'px' : border.top"><input v-else v-model="border.bottom" type="text" name="bottom-border" @keydown="border.bottom = $event.key == 'ArrowUp' ? parseInt(border.bottom.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.bottom.split('px')[0])-1 + 'px' : border.bottom"><label for="bottom-border">Bottom</label></span>
                        <span @click="b_link.a = !b_link.a, b_link.tb = b_link.a, b_link.lr = b_link.a, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.a" v-model="border.top" type="text" name="left-border" @keydown="border.top = $event.key == 'ArrowUp' ? parseInt(border.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.top.split('px')[0])-1 + 'px' : border.top"><input v-else v-model="border.left" type="text" name="left-border" @keydown="border.left = $event.key == 'ArrowUp' ? parseInt(border.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.left.split('px')[0])-1 + 'px' : border.left"><label for="left-border">Left</label></span>
                        <span @click="b_link.lr = !b_link.lr, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.a" v-model="border.top" type="text" name="right-border" @keydown="border.top = $event.key == 'ArrowUp' ? parseInt(border.top.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.top.split('px')[0])-1 + 'px' : border.top"><input v-else-if="b_link.lr" v-model="border.left" type="text" name="right-border" @keydown="border.left = $event.key == 'ArrowUp' ? parseInt(border.left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.left.split('px')[0])-1 + 'px' : border.left"><input v-else v-model="border.right" type="text" name="right-border" @keydown="border.right = $event.key == 'ArrowUp' ? parseInt(border.right.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border.right.split('px')[0])-1 + 'px' : border.right"><label for="right-border">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Border Style</div>
                        <div @click="show_border_style_dropdown = !show_border_style_dropdown" class="kb-tob-content kb-dropdown forScroll"><div class="kb-dropdown-selected-item">{{border_style}}<i class="fa fa-angle-down kb-side-dropdown-arrow"></i></div><ul v-if="show_border_style_dropdown" class="kb-dropdown-items"><li @click="border_style = bst" :class="border_style == bst ? 'kb-active-dropdown-item' : ''" v-for="bst in border_style_types" :key="bst">{{bst}}</li></ul></div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Radius</div>
                      <div class="kb-tab-content">
                        <div class="kb-tab-border-radius">
                          <span><input v-model="border_radius.top_left" type="text" name="top-left-border" @keydown="border_radius.top_left= $event.key == 'ArrowUp' ? parseInt(border_radius.top_left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.top_left.split('px')[0])-1 + 'px' : border_radius.top_left"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="top-right-border" @keydown="border_radius.top_left= $event.key == 'ArrowUp' ? parseInt(border_radius.top_left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.top_left.split('px')[0])-1 + 'px' : border_radius.top_left"><input v-else v-model="border_radius.top_right" type="text" name="top-right-border" @keydown="border_radius.top_right= $event.key == 'ArrowUp' ? parseInt(border_radius.top_right.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.top_right.split('px')[0])-1 + 'px' : border_radius.top_right"></span>
                        </div>
                        <div class="kb-border-radius-demo" :style="demoBorder">
                          <span @click="br_link = !br_link, borderRadiusUpdate(border_radius)" class="kb-linkBtw"><svg :class="!br_link ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M14.71 17.71a3 3 0 0 1-2.12-.88l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 0 1.41 0l5-4.95a1 1 0 0 0 0-1.41l-1.46-1.42a1 1 0 0 0-1.41 0L16.1 9.07a1 1 0 0 1-1.41-1.41l1.43-1.43a3.07 3.07 0 0 1 4.24 0l1.41 1.41a3 3 0 0 1 0 4.24l-5 4.95a3 3 0 0 1-2.06.88z"></path><path d="M9.76 22.66a3 3 0 0 1-2.12-.88l-1.42-1.42a3 3 0 0 1 0-4.24l5-4.95a3.07 3.07 0 0 1 4.24 0l.71.71a1 1 0 0 1-1.41 1.41l-.76-.7a1 1 0 0 0-1.41 0l-5 4.95a1 1 0 0 0 0 1.41L9 20.36a1 1 0 0 0 1.41 0L11.82 19a1 1 0 0 1 1.41 1.41l-1.36 1.36a3 3 0 0 1-2.11.89z"></path></g></svg></span>
                        </div>
                        <div class="kb-tab-border-radius">
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-left-border" @keydown="border_radius.top_left= $event.key == 'ArrowUp' ? parseInt(border_radius.top_left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.top_left.split('px')[0])-1 + 'px' : border_radius.top_left"><input v-else v-model="border_radius.bottom_left" type="text" name="bottom-left-border" @keydown="border_radius.bottom_left= $event.key == 'ArrowUp' ? parseInt(border_radius.bottom_left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.bottom_left.split('px')[0])-1 + 'px' : border_radius.bottom_left"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-right-border" @keydown="border_radius.top_left= $event.key == 'ArrowUp' ? parseInt(border_radius.top_left.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.top_left.split('px')[0])-1 + 'px' : border_radius.top_left"><input v-else v-model="border_radius.bottom_right" type="text" name="bottom-right-border" @keydown="border_radius.bottom_right= $event.key == 'ArrowUp' ? parseInt(border_radius.bottom_right.split('px')[0])+1 + 'px' : $event.key == 'ArrowDown' ? parseInt(border_radius.bottom_right.split('px')[0])-1 + 'px' : border_radius.bottom_right"></span>
                        </div>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component kb-color-picker">
                      <div class="kb-tab-head">Border Color<span class="kb-color-demo kb-border-color-demo"  :style="demoBorder"><span :class="border_color.hex == '#ff000000' ? 'kb-no-color' : ''"></span></span><span class="kb-color-demo"><span @click="border_color.hex = '#ff000000'" v-tooltip="{content:'Transparent'}" class="kb-no-color"></span></span></div>
                      <div class="kb-tab-content">
                          <colour-material-picker v-model="border_color" label="Pick Colour" picker="chrome"/>
                          <div class="kb-slider-color-selection">
                            <colour-slider-picker v-model="border_color" label="Pick Colour" picker="chrome"/>
                            <div class="kb-color-preset"><span @click="border_color = color" v-for="color in presetColors" :key="color.hex" :class="border_color.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                          </div>
                      </div>
                    </div>
                    <!-- <div class="kb-tab-head">Divider</div>
                    <div class="kb-tab-head">Box Shadow</div> -->
                </tab>               
                <tab id="background" name="Background">
                  <div class="kb-inner-tab-component kb-color-picker">
                      <div class="kb-tab-head">Background Color<span class="kb-color-demo kb-background-color-demo" :style="demoBackground"><span :class="background_color.hex == '#ff000000' ? 'kb-no-color' : ''"></span></span><span class="kb-color-demo"><span @click="background_color.hex = '#ff000000'" v-tooltip="{content:'Transparent'}" class="kb-no-color"></span></span></div>
                      <div class="kb-tab-content">
                          <colour-material-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                          <div class="kb-slider-color-selection">
                            <colour-slider-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                            <div class="kb-color-preset"><span @click="background_color = color" v-tooltip="" v-for="color in presetColors" :key="color.hex" :class="background_color.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                          </div>
                      </div>
                  </div>
                  <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Background Gradient
                        <toggle-button class="kb-toggleBtn" v-model="background_gradient.active" v-tooltip="{content:background_gradient.active != 0 ? 'Enable' : 'Disable' }" :labels="{checked: 'On', unchecked: 'Off'}" :color="{checked: '#1867c0', unchecked: '#d3d3d3'}"></toggle-button>
                      </div>
                      <div class="kb-tab-content">
                        <div class="kb-gradient-color-selection">
                          <div class="kb-gradient-selected-color"><span v-tooltip="{content:'Select Color'}" class="kb-color-demo" :style="{'background-color':background_gradient.start.hex}" @click="background_gradient.gradientStart = !background_gradient.gradientStart, background_gradient.gradientEnd = false"></span><colour-material-picker v-model="background_gradient.start" label="Pick Colour" picker="chrome"/></div>
                          <div class="kb-gradient-selected-color"><span v-tooltip="{content:'Select Color'}" class="kb-color-demo" :style="{'background-color':background_gradient.end.hex}" @click="background_gradient.gradientEnd = !background_gradient.gradientEnd, background_gradient.gradientStart = false"></span><colour-material-picker v-model="background_gradient.end" label="Pick Colour" picker="chrome"/></div>
                          <div class="kb-color-picker" v-if="background_gradient.gradientStart || background_gradient.gradientEnd">
                            <span class="sel-tip-icon" :class="background_gradient.gradientStart ? 'start' : 'end'"></span>
                            <div class="kb-slider-color-selection">
                              <colour-slider-picker v-if="background_gradient.gradientStart" v-model="background_gradient.start" label="Pick Colour" picker="chrome"/>
                              <colour-slider-picker v-if="background_gradient.gradientEnd" v-model="background_gradient.end" label="Pick Colour" picker="chrome"/>
                              <div class="kb-color-preset"><span @click="background_gradient.gradientStart ? background_gradient.start = color : background_gradient.end = color" v-for="color in presetColors" :key="color.hex" :class="(background_gradient.gradientStart ? background_gradient.start.hex == color.hex : background_gradient.end.hex == color.hex) ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Background Gradient Direction<span v-tooltip="{content:'Reverse'}" @click="background_gradient.directionReverse = !background_gradient.directionReverse" :class="background_gradient.directionReverse ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                      <div class="kb-tab-content">
                        <div class="kb-rangeInp">
                            <range-slider class="slider" min="0" max="360" step="1" v-model="background_gradient_range_slider.direction"></range-slider>
                            <span><input v-model="background_gradient.direction" type="text" name="background_gradient-direction"></span>
                        </div>
                      </div>
                  </div>  
                  <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Start Position<span v-tooltip="{content:'Reverse'}" @click="background_gradient.startPositionReverse = !background_gradient.startPositionReverse" :class="background_gradient.startPositionReverse ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                      <div class="kb-tab-content">
                        <div class="kb-rangeInp">
                            <range-slider class="slider" min="0" max="100" step="1" v-model="background_gradient_range_slider.startPosition"></range-slider>
                            <span><input v-model="background_gradient.startPosition" type="text" name="background-gradient-start-position"></span>
                        </div>
                      </div>
                  </div>  
                  <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">End Position<span v-tooltip="{content:'Reverse'}" @click="background_gradient.endPositionReverse = !background_gradient.endPositionReverse" :class="background_gradient.endPositionReverse ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                      <div class="kb-tab-content">
                        <div class="kb-rangeInp">
                            <range-slider class="slider" min="0" max="100" step="1" v-model="background_gradient_range_slider.endPosition"></range-slider>
                            <span><input v-model="background_gradient.endPosition" type="text" name="background-gradient-end-position"></span>
                        </div>
                      </div>
                  </div>
                  <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Image
                          <toggle-button class="kb-toggleBtn" v-model="background_image.active" v-tooltip="{content:background_image.active != 0 ? 'Enable' : 'Disable' }" :labels="{checked: 'On', unchecked: 'Off'}" :color="{checked: '#1867c0', unchecked: '#d3d3d3'}"></toggle-button>
                        </div>
                        <div class="kb-tab-content">
                          <div @click="imgSelection = !imgSelection" class="kb-selectedBgImg">
                            <img v-if="background_image.name" :src="background_image.name" width="auto">
                            <span v-else class="kb-ispan-add"><i class="fa fa-plus"></i></span>
                          </div>
                        </div>
                  </div>
                </tab>
                <tab id="advanced" name="Advanced">
                    This is the content of the second tab
                </tab>
              </tabs>
          </div>
          <div class="kb-selection-btn-group"><button type="button"  @click="editSection(selectedSection, true), showSelection = !showSelection" class="kb-btn kb-btn-danger kb-selection-btn"><span><i class="fa fa-times"></i>Discard</span></button><button type="button" @click="updateStyle()" class="kb-btn kb-btn-success kb-selection-btn"><span><i class="fa fa-check"></i>Apply</span></button></div>
        </div>
      </div>
      <draggable class="kb-drag-container" tag="div" v-model="builder" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="section">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
          <div :style="selectedSection.id == build.id ? currentStyling : build.style" v-for="(build, index) in builder" :key="build.id" :id="'kb-section-'+build.id" class="kb-section kb-contain-element" :class="selectedSection.id == build.id ? 'kb-demo-styling' : build.sectionSetting ? 'kb-border' : ''" @mouseenter="selectedSectionRows = build.rowArr, build.sectionSetting = true" @mouseleave="build.sectionSetting = false">
            <div> 
              <div class="kb-module-setting" v-if="build.sectionSetting && selectedSection.id != build.id">
                <span><i class="fa fa-arrows-alt"></i></span>
                <span @click="editSection(build, false), rowSelection = false, showSelection = true" v-tooltip="{ content: 'Section Setting' }"><i class="far fa-edit"></i></span>
                <span @click="duplicateSection(build, index)" v-tooltip="{ content: 'Duplicate Section' }"><i class="far fa-copy"></i></span>
                <span @click="deleteSection(index)" v-tooltip="{ content: 'Delete Section' }" v-if="builder.length != 1"><i class="far fa-trash-alt"></i></span>
              </div>
              <span class="kb-ispan-add add-row" v-tooltip="{ content: 'Add New Row' }" @click="showSelection = true, rowSelection = true" v-if="build.rowArr.length == 0"><i class="fa fa-plus"></i></span>
              <span class="kb-ispan-add add-section bottom-add-btn" v-tooltip="{ content: 'Add New Section' }" @click="addNewSection(index)" v-if="build.sectionSetting"><i class="fa fa-plus"></i></span>
            </div>
            <div>
              <draggable class="kb-drag-container" tag="div" v-model="build.rowArr" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="row" @change="selectedSectionRows = build.rowArr">
                <transition-group type="transition" :name="!drag ? 'flip-list' : null">
                    <div :style="selectedRow.id == row.id ? currentStyling : ''" class="kb-row kb-contain-element kb-border" v-for="(row, index) in build.rowArr" :key="row.id" @mouseenter="row.rowSetting = true" @mouseleave="row.rowSetting = false">
                        <div class="kb-module-setting" v-if="row.rowSetting">
                          <span><i class="fa fa-arrows-alt"></i></span>
                          <span @click="selectedRow = row, showSelection = true, rowSelection = true" v-tooltip="{ content: 'Column Structure' }"><i class="fa fa-columns"></i></span>
                          <span @click="selectedRow = row, rowSelection = false, showSelection = true" v-tooltip="{ content: 'Row Setting' }"><i class="far fa-edit"></i></span>
                          <span @click="duplicateRow(build.rowArr, row, index)" v-tooltip="{ content: 'Duplicate Row' }"><i class="far fa-copy"></i></span>
                          <span @click="deleteRow(build.rowArr, index)" v-tooltip="{ content: 'Delete Row' }"><i class="far fa-trash-alt"></i></span>
                        </div>
                        <div>
                          <div v-for="column in row.columnLength" :key="column" class="kb-inner-row" :class="row.rowSize"> 
                            <span class="kb-ispan-add add-element" v-tooltip="{ content: 'Add New Element' }"><i class="fa fa-plus"></i></span>
                          </div>
                        </div>
                        <span v-if="row.rowSetting" class="kb-ispan-add add-row bottom-add-btn" v-tooltip="{ content: 'Add New Row' }" @click="row_index = index, showSelection = true, rowSelection = true"><i class="fa fa-plus"></i></span>
                    </div>
                </transition-group>
              </draggable>
            </div>
          </div>
        </transition-group>
      </draggable>
    </div>
  </div>
</template>
<script>

export default {
    data() {
      return {
        newD: new Date(),
        newImg: {id:'', upload: '', name: '', path: ''},
        galleryImg: [], 
        galleryImgName: [], 
        imgSelection: false,
        presetColors: [{hex:'#ffffff'},{hex:'#cccccc'},{hex:'#b3b3b3'},{hex:'#999999'},{hex:'#808080'},{hex:'#666666'},{hex:'#4d4d4d'},{hex:'#333333'},{hex:'#000000'}],
        expand: false,
        m_link: {tb: false, lr: false, a: false},
        margin: {top: '0px', bottom: '0px', left: '0px', right: '0px'},
        p_link: {tb: false, lr: false, a: false},
        padding: {top: '60px', bottom: '60px', left: '0px', right: '0px'},
        b_link: {tb: true, lr: true, a: true},
        border: {top: '0px', bottom: '0px', left: '0px', right: '0px'},
        br_link: true,
        border_radius: {top_left: '0px', top_right: '0px', bottom_left: '0px', bottom_right: '0px'},
        border_color: {hex: 'red'},
        border_style: 'solid',
        border_style_types: ['solid','dashed','dotted','double','groove','ridge','inset','outset','none'],
        background_color: {hex: '#ff000000'},
        background_gradient: {active: false, direction: '45deg', start: {hex: '#1867c0'}, end: {hex: '#1BC5BD'}, startPosition: '0%', endPosition: '100%', gradientStart: false, gradientEnd: false, directionReverse: false, startPositionReverse: false, endPositionReverse: false},
        background_gradient_range_slider: {direction: '45', startPosition: '0', endPosition: '100'},
        background_image: {active: false, name: ''},
        show_border_style_dropdown: false,
        rowTypes: [{cls: '1', appendCls: 'full-block', nofcolumn: 1}, {cls: '1-2', appendCls: 'half-block', nofcolumn: 2}, {cls: '1-3', appendCls: 'three-block', nofcolumn: 3}, {cls: '1-4', appendCls: 'four-block', nofcolumn: 4}, {cls: '1-5', appendCls: 'five-block', nofcolumn: 5}, {cls: '1-6', appendCls: 'six-block', nofcolumn: 6}, {cls: '40-60', appendCls: 'f-s-block', nofcolumn: 2}, {cls: '60-40', appendCls: 's-f-block', nofcolumn: 2}, 
                    {cls: '25-75', appendCls: 'tf-sf-block', nofcolumn: 2}, {cls: '75-25', appendCls: 'sf-tf-block', nofcolumn: 2}, {cls: '20-80', appendCls: 't-e-block', nofcolumn: 2}, {cls: '80-20', appendCls: 'e-t-block', nofcolumn: 2}, {cls: '10-90', appendCls: 't-n-block', nofcolumn: 2}, {cls: '90-10', appendCls: 'n-t-block', nofcolumn: 2}, {cls: '30-40-30', appendCls: 't-f-t-block', nofcolumn: 3}, {cls: '20-60-20', appendCls: 't-s-t-block', nofcolumn: 3}, 
                    {cls: '15-70-15', appendCls: 'ft-s-ft-block', nofcolumn: 3}, {cls: '10-80-10', appendCls: 't-e-t-block', nofcolumn: 3}, {cls: '30-30-40', appendCls: 't-t-f-block', nofcolumn: 3}, {cls: '40-30-30', appendCls: 'f-t-t-block', nofcolumn: 3}, {cls: '20-20-60', appendCls: 't-t-s-block', nofcolumn: 3}, {cls: '60-20-20', appendCls: 's-t-t-block', nofcolumn: 3}, {cls: '15-15-70', appendCls: 'ft-ft-s-block', nofcolumn: 3}, {cls: '70-15-15', appendCls: 's-ft-ft-block', nofcolumn: 3}, {cls: '10-10-80', appendCls: 't-t-e-block', nofcolumn: 3}, {cls: '80-10-10', appendCls: 'e-t-t-block', nofcolumn: 3}],
          drag: false, 
          builder: [],
          buildObj: {id: 0, sectionSetting: false, rowArr: [], style: ''},
          rowObj: {id: 0, columnLength: 0, rowSize: '', rowSetting: false},
          selectedSectionRows: [],
          selectedSection:'',
          selectedRow:'',
          showSelection: false,
          rowSelection: false,
          row_id: 0,
          row_index: 0,
          positions: {
            clientX: undefined,
            clientY: undefined,
            movementX: 0,
            movementY: 0,
          },
      }
    },
    computed: {
      dragOptions() {
        return {
            animation: 200,
            disabled: false,
            ghostClass: "ghost",
            scrollSensitivity: 200,
            forceFallback: true
        };
      },
      demoBorder() {
        return {
          '--border-radius': this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_right + ' ' + this.border_radius.bottom_left, 
          '--border-color': this.border_color.hex,
          '--border-style': this.border_style,
        }
      },
      demoBackground() {
        return {
          '--background-color': this.background_color.hex, 
          '--background-image': this.background_gradient.active ? 'linear-gradient(' + this.background_gradient.direction + ', ' + this.background_gradient.start.hex + ' ' + this.background_gradient.startPosition + ', ' + this.background_gradient.end.hex + ' ' + this.background_gradient.endPosition +')' : 'none',
        }
      },
      currentStyling() {
          return {
              '--margin': this.margin.top + ' '  + this.margin.right + ' ' + this.margin.bottom + ' ' + this.margin.left,
              '--padding': this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left,
              '--border-width': this.border.top + ' '  + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left,
              '--border-radius': this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_right + ' ' + this.border_radius.bottom_left, 
              '--border-color': this.border_color.hex,
              '--border-style': this.border_style,
              '--background-color': this.background_color.hex,
              '--background-image': this.background_image.active ? 'url('+this.background_image.name+')' : this.background_gradient.active ? 'linear-gradient(' + this.background_gradient.direction + ', ' + this.background_gradient.start.hex + ' ' + this.background_gradient.startPosition + ', ' + this.background_gradient.end.hex + ' ' + this.background_gradient.endPosition +')' : 'none',
          }
      }
    },
    watch: {
      margin: {
        handler(val) {
          this.marginUpdate(val);
        },
        deep: true,
      },
      padding: {
        handler(val) {
          this.paddingUpdate(val);
        },
        deep: true,
      },
      border: {
        handler(val) {
          this.borderUpdate(val);
        },
        deep: true,
      },
      border_radius: {
        handler(val) {
          this.borderRadiusUpdate(val);
        },
        deep: true,
      },
      background_gradient_range_slider: {
        handler(val) {
          this.background_gradient.direction = val.direction + 'deg';
          this.background_gradient.startPosition = val.startPosition + '%';
          this.background_gradient.endPosition = val.endPosition + '%';
        },
        deep: true,    
      },
      background_gradient: {
        handler(val) {
          var gdir = parseInt(val.direction.replace(/[^0-9]/g, ''));
          var gsdir = parseInt(val.startPosition.replace(/[^0-9]/g, ''));
          var gedir = parseInt(val.endPosition.replace(/[^0-9]/g, ''));
          this.background_gradient_range_slider.direction = gdir;
          this.background_gradient_range_slider.startPosition = gsdir;
          this.background_gradient_range_slider.endPosition = gedir;
          if(gdir > 360) {
            gdir = '360';
          }
          if(gsdir > 100) {
            gsdir = '100';
          }
          if(gedir > 100) {
            gedir = '100';
          }
          val.direction = (val.directionReverse ? '-' : '') + (gdir ? gdir : '0') + 'deg';
          val.startPosition = (val.startPositionReverse ? '-' : '') + (gsdir ? gsdir : '0') + '%';
          val.endPosition = (val.endPositionReverse ? '-' : '') + (gedir ? gedir : '0') + '%';
        },
        deep: true,        
      },
      builder(val) {
        val.forEach((item, index)=>{
          item.id = index;
        })
      },
      selectedSectionRows(val) {
        this.row_id = 0;
        this.builder.forEach((item1)=>{
          item1.rowArr.forEach((item2)=>{
            item2.id = this.row_id++;
          })
        })
      }
    },
    created() {
        this.addNewSection(0);
        this.getUploadImages();
    },
    methods: {
      getUploadImages() {
        axios.post('api/get_upload_image')
        .then(request=>{
          this.galleryImg = request.data.data;
          this.galleryImgName = this.galleryImg.map(item=>item.name);
        });
      },
      changeNumeral(e, val){
        if(e.key == 'ArrowUp' || e.key == 'ArrowDown') {
          val = (e.key == 'ArrowUp' ? parseInt(val.split('px')[0])+1 : parseInt(val.split('px')[0])-1) + 'px';
        }
      },
      resetStyling() {
          this.margin.top = '0px';
          this.margin.right = '0px';
          this.margin.bottom = '0px';
          this.margin.left = '0px';

          this.padding.top = '60px';
          this.padding.right = '0px';
          this.padding.bottom = '60px';
          this.padding.left = '0px';

          this.border.top = '0px';
          this.border.right = '0px';
          this.border.bottom = '0px';
          this.border.left = '0px';

          this.border_radius.top_left = '0px';
          this.border_radius.top_right = '0px';
          this.border_radius.bottom_left = '0px';
          this.border_radius.bottom_right = '0px';

          this.border_style = 'solid';
          this.border_color.hex = '#000000';
          this.background_color.hex = '#ff000000';

          this.background_gradient.active = false;
          this.background_gradient.direction = '45deg'; 
          this.background_gradient.start.hex = '#1867c0'; 
          this.background_gradient.end.hex = '#1BC5BD'; 
          this.background_gradient.startPosition = '0%'; 
          this.background_gradient.endPosition = '100%'; 
          this.background_gradient.gradientStart = false; 
          this.background_gradient.gradientEnd = false; 
          this.background_gradient.directionReverse = false; 
          this.background_gradient.startPositionReverse = false; 
          this.background_gradient.endPositionReverse = false;
          this.background_gradient_range_slider.direction = '45'; 
          this.background_gradient_range_slider.startPosition = '0';
          this.background_gradient_range_slider.endPosition = '100';
          this.background_image.name = '';
          this.background_image.active = false;
      },

      updateStyle() {
        var margin = 'margin:' + this.margin.top + ' '  + this.margin.right + ' ' + this.margin.bottom + ' ' + this.margin.left + '; ';
        var padding = 'padding:'+this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left + '; ';
        var borderWidth = 'border-width:' + this.border.top + ' ' + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left + '; ';
        var borderStyle = 'border-style:' + this.border_style + '; ';
        var borderColor = 'border-color:' + this.border_color.hex + '; ';
        var borderRadius = 'border-radius:' + this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_left + ' ' + this.border_radius.bottom_right + '; ';
        var backgroundColor = 'background-color:' + this.background_color.hex + '; ';
        if(this.background_gradient.active || this.background_image.active) {
          if(this.background_gradient.active) {
            var backgroundImage = 'background-image:' + 'linear-gradient(' + this.background_gradient.direction + ', ' + this.background_gradient.start.hex + ' ' + this.background_gradient.startPosition + ', ' + this.background_gradient.end.hex + ' ' + this.background_gradient.endPosition +')';
          }
          else if(this.background_image.active) {
            var backgroundImage = 'background-image:' + 'url('+this.background_image.name+')';
          }
          this.selectedSection.style = margin + padding + borderWidth + borderStyle + borderColor + borderRadius + backgroundImage;
        }
        else {
          this.selectedSection.style = margin + padding + borderWidth + borderStyle + borderColor + borderRadius + backgroundColor;
        }
        this.showSelection = !this.showSelection;
        this.selectedSection = '';
        // var style = document.createElement('STYLE');
        // style.id = "createStyle";
        // document.getElementsByTagName('HEAD')[0].appendChild(style);
      },

      // general values

      updateSideVals(val) {
          let it = 0, ib = 0, ir = 0, il = 0;
          val.top = val.top.replace(/[^0-9]/g, '') ? val.top.replace(/[^0-9]/g, m  => !it++ ? (m == '-' ? (val.top[0] != '-' ? '' : m) : '') : '') + 'px' : '';
          val.bottom = val.bottom.replace(/[^0-9]/g, '') ? val.bottom.replace(/[^0-9]/g, m  => !ib++ ? (m == '-' ? (val.bottom[0] != '-' ? '' : m) : '') : '') + 'px' : '';
          val.left = val.left.replace(/[^0-9]/g, '') ? val.left.replace(/[^0-9]/g, m  => !il++ ? (m == '-' ? (val.left[0] != '-' ? '' : m) : '') : '') + 'px' : '';
          val.right = val.right.replace(/[^0-9]/g, '') ? val.right.replace(/[^0-9]/g, m  => !ir++ ? (m == '-' ? (val.right[0] != '-' ? '' : m) : '') : '') + 'px' : '';
      },
     
      marginUpdate(val) {
          if(this.m_link.a) {
              val.right = val.left = val.bottom = val.top;
          }
          else {
            if(this.m_link.tb) {
                val.bottom = val.top = val.top;
            }
            if(this.m_link.lr) {
                val.right = val.left = val.left;
            }
          }
          this.updateSideVals(val);
      },

      paddingUpdate(val) {
          if(this.p_link.a) {
              val.right = val.left = val.bottom = val.top; 
          }
          else {
            if(this.p_link.tb) {
                val.bottom = val.top; 
            }
            if(this.p_link.lr) {
                val.right = val.left; 
            }
          }
          this.updateSideVals(val);
      },

      borderUpdate(val) {
          if(this.b_link.a) {
              val.right = val.left = val.bottom = val.top; 
          }
          else {
            if(this.b_link.tb) {
                val.bottom = val.top; 
            }
            if(this.b_link.lr) {
                val.right = val.left; 
            }
          }
          this.updateSideVals(val);
      },

      borderRadiusUpdate(val) {
          this.br_link ? val.bottom_left = val.bottom_right = val.top_right = val.top_left : ''; 
          val.top_left = val.top_left.replace(/[^0-9]/g, '') ? val.top_left.replace(/[^0-9]/g, '') + 'px' : '';
          val.top_right = val.top_right.replace(/[^0-9]/g, '') ? val.top_right.replace(/[^0-9]/g, '') + 'px' : '';
          val.bottom_left = val.bottom_left.replace(/[^0-9]/g, '') ? val.bottom_left.replace(/[^0-9]/g, '') + 'px' : '';
          val.bottom_right = val.bottom_right.replace(/[^0-9]/g, '') ? val.bottom_right.replace(/[^0-9]/g, '') + 'px' : '';
      },

      // general values

      // section

      editSection(build, discard) {
        this.selectedSection = !discard ? build : '';
        var str = '';
        if(build.style) {
          for(var attr of build.style.split(';')) {
            var kt = attr.split(':');
            if(kt[0].trim() != 'background-image') {
              str = kt != ' ' ? str + '"' + kt[0].trim().split('-')[0] + (kt[0].trim().split('-')[1] != undefined ? kt[0].trim().split('-')[1] : '') + '"' + ':' + '"' + kt[1] + '", ' : str.slice(0, str.length-2);
            }
            else {
              var bg = kt[1].split('(')[1].split(')')[0].split(', ');
              if(bg.length != 1) {
                this.background_gradient.direction = bg[0];
                this.background_gradient.start.hex = bg[1].split(' ')[0];
                this.background_gradient.end.hex = bg[2].split(' ')[0];
                this.background_gradient.startPosition = bg[1].split(' ')[1];
                this.background_gradient.endPosition = bg[2].split(' ')[1];
                this.background_gradient.active = true;
              }
              else {
                this.background_image.name = bg[0];
                this.background_image.active = true;
              }
            }
          }
          str = str[str.length-2] == ',' ? str.slice(0, str.length-2) : str;
          var obj = JSON.parse('{'+str+'}');

          this.margin.top = obj.margin.split(' ')[0];
          this.margin.right = obj.margin.split(' ')[1];
          this.margin.bottom = obj.margin.split(' ')[2];
          this.margin.left = obj.margin.split(' ')[3];

          this.padding.top = obj.padding.split(' ')[0];
          this.padding.right = obj.padding.split(' ')[1];
          this.padding.bottom = obj.padding.split(' ')[2];
          this.padding.left = obj.padding.split(' ')[3];

          this.border.top = obj.borderwidth.split(' ')[0];
          this.border.right = obj.borderwidth.split(' ')[1];
          this.border.bottom = obj.borderwidth.split(' ')[2];
          this.border.left = obj.borderwidth.split(' ')[3];

          this.border_radius.top_left = obj.borderradius.split(' ')[0];
          this.border_radius.top_right = obj.borderradius.split(' ')[1];
          this.border_radius.bottom_left = obj.borderradius.split(' ')[2];
          this.border_radius.bottom_right = obj.borderradius.split(' ')[3];

          this.border_style = obj.borderstyle;
          this.border_color.hex = obj.bordercolor;
          this.background_color.hex = obj.backgroundcolor;

        }
        else {
          this.resetStyling();
        }
      },

      appendSection(build, index) {
        var tempObj = JSON.parse(JSON.stringify(build));
        this.builder.splice(index+1, 0, tempObj);
      },

      addNewSection(index) {
        this.appendSection(this.buildObj, index);
      },

      duplicateSection(build, index) {
        this.appendSection(build, index);
        this.selectedSectionRows = [];
        this.selectedSectionRows = build.rowArr;
      },

      deleteSection(index) {
          this.builder.splice(index, 1);
      },

      // section

      // row

      appendRow(rowArr, tempObj, index) {
        tempObj.id = this.row_id++;
        rowArr.splice(index+1, 0, tempObj);
      },

      addNewRow(rowSize, columnLength) {
        if(!this.selectedRow) {
          var tempObj = JSON.parse(JSON.stringify(this.rowObj));
          tempObj.rowSize = rowSize;
          tempObj.columnLength = columnLength;
          this.appendRow(this.selectedSectionRows, tempObj, this.row_index);
          this.row_index = 0;
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
        this.appendRow(rowArr, tempObj, index);
      },

      deleteRow(rowArr, index) {
          rowArr.splice(index, 1);
      },      

      // row

      // dragable element

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
        var YPosition = this.$refs.draggableContainer.offsetTop - this.positions.movementY;
        var XPosition = this.$refs.draggableContainer.offsetLeft - this.positions.movementX;
        YPosition >= 0 ? this.$refs.draggableContainer.style.top = YPosition + 'px' : '';
        this.$refs.draggableContainer.style.left = XPosition + 'px'
      },
      
      closeDragElement() {
        document.onmouseup = null
        document.onmousemove = null
      },

    //dragable element

    // background Image Selection

      onSelected(img){
        let files = img.target.files || img.dataTransfer.files;
        if (!files.length)
            return;
        let reader = new FileReader();
        let vm = this;
        reader.onload = (e) => {
            vm.newImg.upload = e.target.result;
            vm.newImg.id = this.galleryImg.length;
            vm.newImg.path = URL.createObjectURL(img.target.files[0]);
            var strn = img.target.files[0].name;
            vm.newImg.name = vm.galleryImgName.includes(strn) ? strn.slice(0, strn.lastIndexOf(".")) + '-' + new Date().getTime() + strn.slice(strn.lastIndexOf("."), strn.length) : strn;
            var obj = new Object();
            obj.name = 'loading.gif';
            vm.galleryImg.unshift(obj);
            axios.post('api/upload_image',vm.newImg)
            .then(response=>{
              this.getUploadImages();
              vm.newImg = {};
            })
        };
        reader.readAsDataURL(files[0]);
      },

      selectBgImg() {
        document.getElementById('imgInp').click();
      },

    // background Image Selection

    }
}
</script>
