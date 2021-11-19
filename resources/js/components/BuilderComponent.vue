<template>
  <div>
    <div id="page-container" @click="closeDropDown($event)">
       <!-- <tinymce id="id"  v-model="content" name="name"></tinymce> -->
       <!-- <vue-editor v-model="content"></vue-editor> -->
      <div v-if="imgSelection" id="kb-img-group">
        <div class="kb-img-inner-group forScroll">
          <div class="kb-head">Choose a Background Image<button @click="selectBgImg()" class="kb-btn kb-btn-success">Add a new image</button><span @click="imgSelection = !imgSelection" class="kb-cut"><i class="fa fa-times"></i></span></div>
          <div class="kb-img-thumbnail-group">
            <ul class="kb-img-list">
              <li v-for="img in galleryImg" :key="img.id"><span><img v-lazy="'images/builder/upload_images/'+img.name" @click="background_image.name = '/images/builder/upload_images/'+img.name, imgSelection = !imgSelection, background_image.active = true"></span></li>
            </ul>
            <div v-if="galleryImg.length == 0"><center>Upload image</center></div>
          </div>
          <input type="file" name="image" id="imgInp" class="kb-d-none" v-on:change="onSelected($event)">
        </div>
      </div>
      <div v-if="showSelection" class="kb-outer-selection-container">
        <div ref="draggableContainer" id="kb-selection-ask">
          <div v-if="elementSelection" id="kb-element-group" class="forScroll">
            <span @click="showSelection = !showSelection, elementSelection = false" class="kb-selection-top-actions"><i class="fa fa-times"></i></span>
            <div class="kb-ask-head" @mousedown="dragMouseDown">Element Selection</div>
            <div>
              <ul class="kb-element-list">
                <li v-for="element in elementList" :key="element.name" @click="addElement(element)" class="kb-element-box"><span><i :class="element.iconCls"></i><div>{{element.name}}</div></span></li>
              </ul>    
            </div>
          </div>
          <div v-else-if="rowSelection" id="kb-row-selection" class="kb-inner-selection-container">
            <span @click="showSelection = !showSelection, selectedRow = ''" class="kb-selection-top-actions"><i class="fa fa-times"></i></span>
            <div class="kb-ask-head" @mousedown="dragMouseDown">Row Dimension</div>
            <div>
              <ul class="kb-row-list">
                <li v-for="rt in rowTypes" :key="rt.cls" class="kb-row-type" :class="(selectedRow.rowSize == 'kb-'+rt.appendCls ? 'kb-row-type-active ' : '') + 'row-'+rt.cls" @click="addRow('kb-'+rt.appendCls, rt.nofcolumn)"><span v-for="c in rt.nofcolumn" :key="c" class="block"><span></span></span></li>
              </ul>
            </div>
          </div>
          <div v-else class="kb-inner-selection-container forScroll">
            <span @click="expand = !expand" class="kb-selection-top-actions"><i class="fas" :class="expand ? 'fa-expand-arrows-alt' : 'fas fa-compress-arrows-alt'"></i></span>
            <div class="kb-ask-head" @mousedown="dragMouseDown">Section Setting</div>
            <div class="kb-tabs-component">
                <tabs :options="{ defaultTabHash: 'general' }" cache-lifetime="10">
                  <tab id="general" name="General">
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Width</div>
                        <div class="kb-tab-content">
                          <div class="kb-rangeInp">
                              <range-slider class="slider" min="0" :max="widthRange.max" step="1" v-model="widthRange.value"></range-slider>
                              <span><input v-model="width.value" @keydown="width.value = operateNumVal($event.key, width.value)" type="text" name="width"></span>
                          </div>
                        </div>
                    </div> 
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Height</div>
                        <div class="kb-tab-content">
                          <div class="kb-rangeInp">
                              <range-slider class="slider" min="0" :max="heightRange.max" step="1" v-model="heightRange.value"></range-slider>
                              <span><input v-model="height.value" @keydown="height.value = operateNumVal($event.key, height.value)" type="text" name="height"></span>
                          </div>
                        </div>
                    </div> 
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Alignment<span v-tooltip="{content:'Auto Align'}" @click="blockAlign = ''" class="kb-reverse-icon" :class="blockAlign ? 'active' : ''"><i class="fa fa-ban"></i></span></div>
                        <div class="kb-tab-content">
                          <div class="kb-align-btn-group">
                            <span @click="blockAlign = 'left'" :class="blockAlign == 'left' ? 'kb-active-brd' : ''" class="kb-align-btn" v-tooltip="{content:'Left Align'}"><i class="fa fa-arrow-left"></i></span>
                            <span @click="blockAlign = 'center'" :class="blockAlign == 'center' ? 'kb-active-brd' : ''" class="kb-align-btn" v-tooltip="{content:'Center Align'}"><i class="fa fa-arrow-right"></i><i class="fa fa-arrow-left"></i></span>
                            <span @click="blockAlign = 'right'" :class="blockAlign == 'right' ? 'kb-active-brd' : ''" class="kb-align-btn" v-tooltip="{content:'Right Align'}"><i class="fa fa-arrow-right"></i></span></div>
                        </div>
                    </div> 
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Margin</div>
                      <div class="kb-tab-content">
                        <span><input v-model="margin.top" type="text" name="top-margin" @keydown="margin.top = operateNumVal($event.key, margin.top)"><label for="top-margin">Top</label></span>
                        <span @click="m_link.tb = !m_link.tb, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="m_link.tb" v-model="margin.top" type="text" name="bottom-margin" @keydown="margin.top = operateNumVal($event.key, margin.top)">
                          <input v-else v-model="margin.bottom" type="text" name="bottom-margin" @keydown="margin.bottom = operateNumVal($event.key, margin.bottom)"><label for="bottom-margin">Bottom</label></span>
                        <span @click="m_link.a = !m_link.a, m_link.tb = m_link.a, m_link.lr = m_link.a, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="m_link.a" v-model="margin.top" type="text" name="left-margin" @keydown="margin.top = operateNumVal($event.key, margin.top)">
                          <input v-else v-model="margin.left" type="text" name="left-margin" @keydown="margin.left = operateNumVal($event.key, margin.left)"><label for="left-margin">Left</label></span>
                        <span @click="m_link.lr = !m_link.lr, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="m_link.a" v-model="margin.top" type="text" name="right-margin" @keydown="margin.top = operateNumVal($event.key, margin.top)">
                          <input v-else-if="m_link.lr" v-model="margin.left" type="text" name="right-margin" @keydown="margin.left = operateNumVal($event.key, margin.left)">
                          <input v-else v-model="margin.right" type="text" name="right-margin" @keydown="margin.right = operateNumVal($event.key, margin.right)"><label for="right-margin">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Padding</div>
                      <div class="kb-tab-content">
                        <span><input v-model="padding.top" type="text" name="top-padding" @keydown="padding.top = operateNumVal($event.key, padding.top)"><label for="top-padding">Top</label></span>
                        <span @click="p_link.tb = !p_link.tb, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="p_link.tb" v-model="padding.top" type="text" name="bottom-padding" @keydown="padding.top = operateNumVal($event.key, padding.top)">
                          <input v-else v-model="padding.bottom" type="text" name="bottom-padding" @keydown="padding.bottom = operateNumVal($event.key, padding.bottom)"><label for="bottom-padding">Bottom</label></span>
                        <span @click="p_link.a = !p_link.a, p_link.tb = p_link.a, p_link.lr = p_link.a, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="p_link.a" v-model="padding.top" type="text" name="left-padding" @keydown="padding.top = operateNumVal($event.key, padding.top)">
                          <input v-else v-model="padding.left" type="text" name="left-padding" @keydown="padding.left = operateNumVal($event.key, padding.left)"><label for="left-padding">Left</label></span>
                        <span @click="p_link.lr = !p_link.lr, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="p_link.a" v-model="padding.top" type="text" name="right-padding" @keydown="padding.top = operateNumVal($event.key, padding.top)">
                          <input v-else-if="p_link.lr" v-model="padding.left" type="text" name="right-padding" @keydown="padding.left = operateNumVal($event.key, padding.left)">
                          <input v-else v-model="padding.right" type="text" name="right-padding" @keydown="padding.right = operateNumVal($event.key, padding.right)"><label for="right-padding">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Width</div>
                      <div class="kb-tab-content">
                        <span><input v-model="border.top" type="text" name="top-border" @keydown="border.top = operateNumVal($event.key, border.top)"><label for="top-border">Top</label></span>
                        <span @click="b_link.tb = !b_link.tb, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="b_link.tb" v-model="border.top" type="text" name="bottom-border" @keydown="border.top = operateNumVal($event.key, border.top)">
                          <input v-else v-model="border.bottom" type="text" name="bottom-border" @keydown="border.bottom = operateNumVal($event.key, border.bottom)"><label for="bottom-border">Bottom</label></span>
                        <span @click="b_link.a = !b_link.a, b_link.tb = b_link.a, b_link.lr = b_link.a, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="b_link.a" v-model="border.top" type="text" name="left-border" @keydown="border.top = operateNumVal($event.key, border.top)">
                          <input v-else v-model="border.left" type="text" name="left-border" @keydown="border.left = operateNumVal($event.key, border.left)"><label for="left-border">Left</label></span>
                        <span @click="b_link.lr = !b_link.lr, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span>
                          <input v-if="b_link.a" v-model="border.top" type="text" name="right-border" @keydown="border.top = operateNumVal($event.key, border.top)">
                          <input v-else-if="b_link.lr" v-model="border.left" type="text" name="right-border" @keydown="border.left = operateNumVal($event.key, border.left)">
                          <input v-else v-model="border.right" type="text" name="right-border" @keydown="border.right = operateNumVal($event.key, border.right)"><label for="right-border">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Border Style</div>
                        <div class="kb-tob-content kb-dropdown forScroll">
                          <div @click="show_dropdown = 'border'" class="kb-dropdown-selected-item">{{border_style}}<i class="fa fa-angle-down kb-side-dropdown-arrow"></i></div>
                          <ul v-if="show_dropdown == 'border'" class="kb-dropdown-items">
                            <li @click="border_style = bst, show_dropdown = ''" :class="border_style == bst ? 'kb-active-dropdown-item' : ''" v-for="bst in border_style_types" :key="bst">{{bst}}</li>
                          </ul>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Radius</div>
                      <div class="kb-tab-content">
                        <div class="kb-tab-border-radius">
                          <span><input v-model="border_radius.top_left" type="text" name="top-left-border" @keydown="border_radius.top_left = operateNumVal($event.key, border_radius.top_left)"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="top-right-border" @keydown="border_radius.top_left = operateNumVal($event.key, border_radius.top_left)"><input v-else v-model="border_radius.top_right" type="text" name="top-right-border" @keydown="border_radius.top_right = operateNumVal($event.key, border_radius.top_right)"></span>
                        </div>
                        <div class="kb-border-radius-demo" :style="demoBorder">
                          <span @click="br_link = !br_link, borderRadiusUpdate(border_radius)" class="kb-linkBtw"><svg :class="!br_link ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M14.71 17.71a3 3 0 0 1-2.12-.88l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 0 1.41 0l5-4.95a1 1 0 0 0 0-1.41l-1.46-1.42a1 1 0 0 0-1.41 0L16.1 9.07a1 1 0 0 1-1.41-1.41l1.43-1.43a3.07 3.07 0 0 1 4.24 0l1.41 1.41a3 3 0 0 1 0 4.24l-5 4.95a3 3 0 0 1-2.06.88z"></path><path d="M9.76 22.66a3 3 0 0 1-2.12-.88l-1.42-1.42a3 3 0 0 1 0-4.24l5-4.95a3.07 3.07 0 0 1 4.24 0l.71.71a1 1 0 0 1-1.41 1.41l-.76-.7a1 1 0 0 0-1.41 0l-5 4.95a1 1 0 0 0 0 1.41L9 20.36a1 1 0 0 0 1.41 0L11.82 19a1 1 0 0 1 1.41 1.41l-1.36 1.36a3 3 0 0 1-2.11.89z"></path></g></svg></span>
                        </div>
                        <div class="kb-tab-border-radius">
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-left-border" @keydown="border_radius.top_left = operateNumVal($event.key, border_radius.top_left)"><input v-else v-model="border_radius.bottom_left" type="text" name="bottom-left-border" @keydown="border_radius.bottom_left = operateNumVal($event.key, border_radius.bottom_left)"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-right-border" @keydown="border_radius.top_left = operateNumVal($event.key, border_radius.top_left)"><input v-else v-model="border_radius.bottom_right" type="text" name="bottom-right-border" @keydown="border_radius.bottom_right = operateNumVal($event.key, border_radius.bottom_right)"></span>
                        </div>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component kb-color-picker">
                      <div class="kb-tab-head">Border Color
                        <span class="kb-color-demo">
                          <span class="kb-no-color">
                            <span class="kb-color-demo" :style="demoBorder"></span>
                          </span>
                        </span>
                        <span class="kb-color-demo"><span @click="border_color.hex = '#ff000000'" v-tooltip="{content:'Transparent'}" class="kb-no-color"></span></span></div>
                      <div class="kb-tab-content">
                          <colour-material-picker v-model="border_color" label="Pick Colour" picker="chrome"/>
                          <div class="kb-slider-color-selection">
                            <div class="kb-rangeInp kb-opacity-slider">
                              <range-slider v-model="border_color.rgba.a" class="slider" min="0" max="1" step="0.01" :style="demoBorderOpacity"></range-slider>
                            </div>
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
                        <div class="kb-tab-head">Background Color
                          <span class="kb-color-demo"> 
                            <span class="kb-no-color">
                              <span class="kb-color-demo" :style="demoBackground"></span>
                            </span>
                          </span>
                          <span class="kb-color-demo"><span @click="background_color = {hex: '#ff000000', rgba: {r:'255', g:'0', b:'0', a:'0'}}" v-tooltip="{content:'Transparent'}" class="kb-no-color"></span></span>
                        </div>
                        <div class="kb-tab-content">
                            <colour-material-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                            <div class="kb-slider-color-selection">
                              <div class="kb-rangeInp kb-opacity-slider">
                                <range-slider v-model="background_color.rgba.a" class="slider" min="0" max="1" step="0.01" :style="demoBackgroundOpacity"></range-slider>
                              </div>
                              <colour-slider-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                              <div class="kb-color-preset">
                                <span @click="background_color = color" v-tooltip="" v-for="color in presetColors" :key="color.hex" :class="background_color == color ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Gradient
                          <toggle-button class="kb-toggleBtn" :sync='true' v-model="background_gradient.active" v-tooltip="{content:background_gradient.active != 0 ? 'Enable' : 'Disable' }" :labels="{checked: 'On', unchecked: 'Off'}" :color="{checked: '#1867c0', unchecked: '#d3d3d3'}"></toggle-button>
                        </div>
                        <div class="kb-tab-content">
                          <div class="kb-gradient-color-selection" @mouseleave="background_gradient.gradientStart=false, background_gradient.gradientEnd=false">
                            <div class="kb-gradient-selected-color">
                              <span v-tooltip="{content:'Select Starting Color'}" class="kb-color-demo" @click="background_gradient.gradientStart = !background_gradient.gradientStart, background_gradient.gradientEnd = false">                            
                                <span class="kb-no-color">
                                  <span class="kb-color-demo" :style="backgroundGradientStart"></span>
                                </span>
                              </span>
                              <colour-material-picker v-model="background_gradient.start" label="Pick Colour" picker="chrome"/>
                            </div>
                            <div class="kb-gradient-selected-color">
                              <span v-tooltip="{content:'Select Ending Color'}" class="kb-color-demo" @click="background_gradient.gradientEnd = !background_gradient.gradientEnd, background_gradient.gradientStart = false">                            
                                <span class="kb-no-color">
                                  <span class="kb-color-demo" :style="backgroundGradientEnd"></span>
                                </span>
                              </span>
                              <colour-material-picker v-model="background_gradient.end" label="Pick Colour" picker="chrome"/></div>
                            <div class="kb-color-picker" v-if="background_gradient.gradientStart || background_gradient.gradientEnd">
                              <span class="sel-tip-icon" :class="background_gradient.gradientStart ? 'start' : 'end'"></span>
                              <div v-if="background_gradient.gradientStart" class="kb-slider-color-selection">
                                <div class="kb-tab-head">Starting Color</div>
                                <div class="kb-rangeInp kb-opacity-slider">
                                  <range-slider v-model="background_gradient.start.rgba.a" class="slider" min="0" max="1" step="0.01" :style="backgroundGradientStartOpacity"></range-slider>
                                </div>
                                <colour-slider-picker v-model="background_gradient.start" label="Pick Colour" picker="chrome"/>
                                <div class="kb-color-preset"><span @click="background_gradient.start = color" v-for="color in presetColors" :key="color.hex" :class="background_gradient.start.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                              </div>
                              <div  v-if="background_gradient.gradientEnd" class="kb-slider-color-selection">
                                <div class="kb-tab-head">Ending Color</div>
                                <div class="kb-rangeInp kb-opacity-slider">
                                  <range-slider v-model="background_gradient.end.rgba.a" class="slider" min="0" max="1" step="0.01" :style="backgroundGradientEndOpacity"></range-slider>
                                </div>
                                <colour-slider-picker v-model="background_gradient.end" label="Pick Colour" picker="chrome"/>
                                <div class="kb-color-preset"><span @click="background_gradient.end = color" v-for="color in presetColors" :key="color.hex" :class="background_gradient.end.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Gradient Direction<span v-tooltip="{content:'Reverse'}" @click="background_gradient.direction = parseInt(background_gradient.direction.split('deg')[0])*-1 + 'deg'" :class="parseInt(background_gradient.direction.split('deg')[0]) < 0 ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                        <div class="kb-tab-content">
                          <div class="kb-rangeInp">
                              <range-slider class="slider" min="-360" max="360" step="1" v-model="background_gradient_range_slider.direction"></range-slider>
                              <span><input v-model="background_gradient.direction" @keydown="background_gradient.direction = $event.key == 'ArrowUp' ? parseInt(background_gradient.direction.split('deg')[0])+1 + 'deg' : $event.key == 'ArrowDown' ? parseInt(background_gradient.direction.split('deg')[0])-1 + 'deg' : background_gradient.direction" type="text" name="background_gradient-direction"></span>
                          </div>
                        </div>
                    </div>  
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Start Position<span v-tooltip="{content:'Reverse'}" @click="background_gradient.startPosition = parseInt(background_gradient.startPosition.split('%')[0])*-1 + '%'" :class="parseInt(background_gradient.startPosition.split('%')[0]) < 0 ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                        <div class="kb-tab-content">
                          <div class="kb-rangeInp">
                              <range-slider class="slider" min="-100" max="100" step="1" v-model="background_gradient_range_slider.startPosition"></range-slider>
                              <span><input v-model="background_gradient.startPosition" @keydown="background_gradient.startPosition = $event.key == 'ArrowUp' ? parseInt(background_gradient.startPosition.split('%')[0])+1 + '%' : $event.key == 'ArrowDown' ? parseInt(background_gradient.startPosition.split('%')[0])-1 + '%' : background_gradient.startPosition" type="text" name="background-gradient-start-position"></span>
                          </div>
                        </div>
                    </div>  
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">End Position<span v-tooltip="{content:'Reverse'}" @click="background_gradient.endPosition = parseInt(background_gradient.endPosition.split('%')[0])*-1 + '%'" :class="parseInt(background_gradient.endPosition.split('%')[0]) < 0 ? 'active' : ''" class="kb-reverse-icon"><i class="fa fa-sync-alt"></i></span></div>
                        <div class="kb-tab-content">
                          <div class="kb-rangeInp">
                              <range-slider class="slider" min="-100" max="100" step="1" v-model="background_gradient_range_slider.endPosition"></range-slider>
                              <span><input v-model="background_gradient.endPosition" @keydown="background_gradient.endPosition = $event.key == 'ArrowUp' ? parseInt(background_gradient.endPosition.split('%')[0])+1 + '%' : $event.key == 'ArrowDown' ? parseInt(background_gradient.endPosition.split('%')[0])-1 + '%' : background_gradient.endPosition" type="text" name="background-gradient-end-position"></span>
                          </div>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                          <div class="kb-tab-head">Background Image
                            <toggle-button class="kb-toggleBtn" :sync='true' v-model="background_image.active" v-tooltip="{content:background_image.active != 0 ? 'Enable' : 'Disable' }" :labels="{checked: 'On', unchecked: 'Off'}" :color="{checked: '#1867c0', unchecked: '#d3d3d3'}"></toggle-button>
                          </div>
                          <div class="kb-tab-content">
                            <div @click="imgSelection = !imgSelection" class="kb-selectedBgImg">
                              <img v-if="background_image.name" :src="background_image.name" width="auto">
                              <span v-else class="kb-ispan-add"><i class="fa fa-plus"></i></span>
                            </div>
                          </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Image Size</div>
                        <div class="kb-tob-content kb-dropdown forScroll">
                          <div @click="show_dropdown = 'size'" class="kb-dropdown-selected-item">{{background_image.size}}<i class="fa fa-angle-down kb-side-dropdown-arrow"></i></div>
                          <ul v-if="show_dropdown == 'size'" class="kb-dropdown-items">
                            <li @click="background_image.size = bgimgs, show_dropdown = ''" :class="background_image.size == bgimgs ? 'kb-active-dropdown-item' : ''" v-for="bgimgs in background_image_sizes" :key="bgimgs">{{bgimgs}}</li>
                          </ul>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Image Position</div>
                        <div class="kb-tob-content kb-dropdown forScroll">
                          <div @click="show_dropdown = 'position'" class="kb-dropdown-selected-item">{{background_image.position}}<i class="fa fa-angle-down kb-side-dropdown-arrow"></i></div>
                          <ul v-if="show_dropdown == 'position'" class="kb-dropdown-items">
                            <li @click="background_image.position = bgimgp, show_dropdown = ''" :class="background_image.position == bgimgp ? 'kb-active-dropdown-item' : ''" v-for="bgimgp in background_image_positions" :key="bgimgp">{{bgimgp}}</li>
                          </ul>
                        </div>
                    </div>
                    <div class="kb-inner-tab-component">
                        <div class="kb-tab-head">Background Image Repeat</div>
                        <div class="kb-tob-content kb-dropdown forScroll">
                          <div @click="show_dropdown = 'repeat'" class="kb-dropdown-selected-item">{{background_image.repeat.name}}<i class="fa fa-angle-down kb-side-dropdown-arrow"></i></div>
                          <ul v-if="show_dropdown == 'repeat'" class="kb-dropdown-items">
                            <li v-for="bgimgr in background_image_repeats" :key="bgimgr.value" @click="background_image.repeat = bgimgr, show_dropdown = ''" :class="background_image.repeat.value == bgimgr.value ? 'kb-active-dropdown-item' : ''">{{bgimgr.name}}</li>
                          </ul>
                        </div>
                    </div>
                  </tab>
                  <tab id="advanced" name="Advanced">
                      This is the content of the second tab
                  </tab>
                </tabs>
            </div>
            <div class="kb-selection-btn-group"><button type="button" @click="selectedBlock='', showSelection = !showSelection" class="kb-btn kb-btn-danger kb-selection-btn"><span><i class="fa fa-times"></i>Discard</span></button><button type="button" @click="updateStyle()" class="kb-btn kb-btn-success kb-selection-btn"><span><i class="fa fa-check"></i>Apply</span></button></div>
          </div>
        </div>
      </div>
      <draggable class="kb-drag-container" tag="div" v-model="builder" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="section">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
          <div v-for="(build, index) in builder" :key="build.id" @click="showSettingOpt(build)" @mouseenter="selectedSectionRows = build.rowArr" :id="'kb-section-'+build.id" :style="selectedBlock.id == build.id && selectedBlock.type == build.type ? currentStyling : build.style" :class="selectedBlock.id == build.id && selectedBlock.type == build.type ? 'kb-demo-styling' : ''" class="kb-section kb-block-container">
            <div> 
              <div class="kb-module-setting" v-if="build.id == selectedSection.id">
                <span><i class="fa fa-arrows-alt"></i></span>
                <span @click="selectedBlock = build, blockSetting(build), rowSelection = false, showSelection = true" v-tooltip="{ content: 'Section Setting' }"><i class="far fa-edit"></i></span>
                <span @click="duplicateSection(build, index)" v-tooltip="{ content: 'Duplicate Section' }"><i class="far fa-copy"></i></span>
                <span @click="deleteSection(index)" v-tooltip="{ content: 'Delete Section' }" v-if="builder.length != 1"><i class="far fa-trash-alt"></i></span>
              </div>
              <span class="kb-ispan-add add-row" v-tooltip="{ content: 'Add New Row' }" @click="showSelection = true, rowSelection = true" v-if="build.rowArr.length == 0"><i class="fa fa-plus"></i></span>
              <span class="kb-ispan-add add-section bottom-add-btn" v-tooltip="{ content: 'Add New Section' }" @click="addSection(index)" v-if="build.id == selectedSection.id"><i class="fa fa-plus"></i></span>
            </div>
            <div>
              <draggable class="kb-drag-container" tag="div" v-model="build.rowArr" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="row" @change="selectedSectionRows = build.rowArr">
                <transition-group type="transition" :name="!drag ? 'flip-list' : null">
                    <div v-for="(row, index) in build.rowArr" :key="row.id" :id="'kb-row-'+row.id" @click="showSettingOpt(row, build)" @mouseenter="selectedRowElements = row.elementArr" :style="selectedBlock.id == row.id && selectedBlock.type == row.type ? currentStyling : row.style" class="kb-row kb-block-container">
                        <div class="kb-module-setting" v-if="row.id == selectedRow.id">
                          <span><i class="fa fa-arrows-alt"></i></span>
                          <span @click="selectedRow = row, showSelection = true, rowSelection = true" v-tooltip="{ content: 'Column Structure' }"><i class="fa fa-columns"></i></span>
                          <span @click="selectedBlock = row, blockSetting(row), rowSelection = false, showSelection = true" v-tooltip="{ content: 'Row Setting' }"><i class="far fa-edit"></i></span>
                          <span @click="duplicateRow(build.rowArr, row, index)" v-tooltip="{ content: 'Duplicate Row' }"><i class="far fa-copy"></i></span>
                          <span @click="deleteRow(build.rowArr, index)" v-tooltip="{ content: 'Delete Row' }"><i class="far fa-trash-alt"></i></span>
                        </div>
                        <div class="kb-inner-row">
                          <div v-for="element in row.elementArr" :key="element.id" :id="'kb-element-'+element.id" @mouseenter="selectedRowElements = row.elementArr" class="kb-element kb-block-container" :class="(element.name ? 'kb-border ' : '') + row.rowSize"> 
                           {{element.setting}}
                            <div class="kb-module-setting" v-if="element.setting && element.name">
                              <span><i class="fa fa-arrows-alt"></i></span>
                              <span @click="selectedBlock = row, blockSetting(row), rowSelection = false, showSelection = true" v-tooltip="{ content: 'Row Setting' }"><i class="far fa-edit"></i></span>
                              <span @click="duplicateRow(build.rowArr, row, index)" v-tooltip="{ content: 'Duplicate Row' }"><i class="far fa-copy"></i></span>
                              <span @click="deleteRow(build.rowArr, index)" v-tooltip="{ content: 'Delete Row' }"><i class="far fa-trash-alt"></i></span>
                            </div>
                            <span v-if="!element.name" @click="selectedElement = element, showSelection = true, elementSelection = true" class="kb-ispan-add add-element" v-tooltip="{ content: 'Add New Element' }"><i class="fa fa-plus"></i></span>
                          </div>
                        </div>
                        <span v-if="row.id == selectedRow.id" v-tooltip="{ content: 'Add New Row' }" @click="row_index = index, showSelection = true, rowSelection = true" class="kb-ispan-add add-row bottom-add-btn" ><i class="fa fa-plus"></i></span>
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
        content: '<h3>Hello</h3>',
        show_dropdown: '',
        newD: new Date(),
        newImg: {id:'', upload: '', name: '', path: ''},
        galleryImg: [], 
        galleryImgName: [], 
        imgSelection: false,
        elementList: [{name: 'Text', iconCls: 'fas fa-font'}],
        presetColors: [{hex:'#ffffff', rgba:{r:'255', g:'255', b:'255', a:'1'}},{hex:'#000000', rgba:{r:'0', g:'0', b:'0', a:'1'}}],
        // presetColors: [{hex:'#ffffff'},{hex:'#cccccc'},{hex:'#b3b3b3'},{hex:'#999999'},{hex:'#808080'},{hex:'#666666'},{hex:'#4d4d4d'},{hex:'#333333'},{hex:'#000000'}],
        expand: false,
        width: {value: '100%'},
        widthRange: {value: '100', max: '100', type: '%'},
        height: {value: '100%'},
        heightRange: {value: '100', max: '100', type: '%'},
        blockAlign: '',
        m_link: {tb: false, lr: false, a: false},
        margin: {top: '0px', bottom: '0px', left: '0px', right: '0px'},
        p_link: {tb: false, lr: false, a: false},
        padding: {top: '0px', bottom: '0px', left: '0px', right: '0px'},
        b_link: {tb: true, lr: true, a: true},
        border: {top: '0px', bottom: '0px', left: '0px', right: '0px'},
        br_link: true,
        border_radius: {top_left: '0px', top_right: '0px', bottom_left: '0px', bottom_right: '0px'},
        border_color: {hex:'#000000', rgba:{r:'0', g:'0', b:'0', a:'1'}},
        border_style: 'solid',
        border_style_types: ['solid','dashed','dotted','double','groove','ridge','inset','outset','none'],
        background_color: {hex: '#ff000000', rgba: {r:'255', g:'0', b:'0', a:'0'}},
        background_gradient: {active: false, direction: '45deg', start: {hex: '#1867c0', rgba: {r:'24', g:'103', b:'193', a:'1'}}, end: {hex: '#1BC5BD', rgba: {r:'27', g:'197', b:'189', a:'1'}}, startPosition: '0%', endPosition: '100%', gradientStart: false, gradientEnd: false},
        background_gradient_range_slider: {direction: '45', startPosition: '0', endPosition: '100'},
        background_image: {active: false, name: '', size: 'cover', position: 'center', repeat: {name: 'no repeat', value: 'no-repeat'}},
        background_image_sizes: ['cover','contain','auto'],
        background_image_positions: ['top left', 'top center', 'top right', 'center', 'bottom left', 'bottom center', 'bottom right'],
        background_image_repeats: [{name: 'no repeat', value: 'no-repeat'}, {name: 'repeat', value: 'repeat'}, {name: 'repeat x (horizontal)', value: 'repeat-x'}, {name: 'repeat y (vertical)', value: 'repeat-y'}, {name: 'space', value: 'sapce'}, {name: 'round', value: 'round'}],
        rowTypes: [{cls: '1', appendCls: 'full-block', nofcolumn: 1}, {cls: '1-2', appendCls: 'half-block', nofcolumn: 2}, {cls: '1-3', appendCls: 'three-block', nofcolumn: 3}, {cls: '1-4', appendCls: 'four-block', nofcolumn: 4}, {cls: '1-5', appendCls: 'five-block', nofcolumn: 5}, {cls: '1-6', appendCls: 'six-block', nofcolumn: 6}, {cls: '40-60', appendCls: 'f-s-block', nofcolumn: 2}, {cls: '60-40', appendCls: 's-f-block', nofcolumn: 2}, 
                    {cls: '25-75', appendCls: 'tf-sf-block', nofcolumn: 2}, {cls: '75-25', appendCls: 'sf-tf-block', nofcolumn: 2}, {cls: '20-80', appendCls: 't-e-block', nofcolumn: 2}, {cls: '80-20', appendCls: 'e-t-block', nofcolumn: 2}, {cls: '10-90', appendCls: 't-n-block', nofcolumn: 2}, {cls: '90-10', appendCls: 'n-t-block', nofcolumn: 2}, {cls: '30-40-30', appendCls: 't-f-t-block', nofcolumn: 3}, {cls: '20-60-20', appendCls: 't-s-t-block', nofcolumn: 3}, 
                    {cls: '15-70-15', appendCls: 'ft-s-ft-block', nofcolumn: 3}, {cls: '10-80-10', appendCls: 't-e-t-block', nofcolumn: 3}, {cls: '30-30-40', appendCls: 't-t-f-block', nofcolumn: 3}, {cls: '40-30-30', appendCls: 'f-t-t-block', nofcolumn: 3}, {cls: '20-20-60', appendCls: 't-t-s-block', nofcolumn: 3}, {cls: '60-20-20', appendCls: 's-t-t-block', nofcolumn: 3}, {cls: '15-15-70', appendCls: 'ft-ft-s-block', nofcolumn: 3}, {cls: '70-15-15', appendCls: 's-ft-ft-block', nofcolumn: 3}, {cls: '10-10-80', appendCls: 't-t-e-block', nofcolumn: 3}, {cls: '80-10-10', appendCls: 'e-t-t-block', nofcolumn: 3}],
        drag: false, 
        builder: [],
        buildObj: {id: 0, setting: false, rowArr: [], style: '', type: 'section'},
        rowObj: {id: 0, elementArr: [], rowSize: '', style: '', setting: false,  type: 'row'},
        elementObj: {id: 0, setting: false, type: 'element', name: ''},
        selectedSectionRows: [],
        selectedRowElements: [],
        selectedBlock:'',
        selectedRow:'',
        selectedSection:'',
        showSelection: false,
        rowSelection: false,
        elementSelection: false,
        row_id: 0,
        row_index: 0,
        element_id: 0,
        positions: {
          clientX: undefined,
          clientY: undefined,
          movementX: 0,
          movementY: 0,
        },
        updateSideUnitsDelay: 1000,
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
          '--color': 'rgb('+this.border_color.rgba.r+' '+this.border_color.rgba.g+' '+this.border_color.rgba.b+ ' / ' + this.border_color.rgba.a+')', 
          '--border-style': this.border_style,
        }
      },
      demoBorderOpacity() {
        return {
          '--color': 'rgb('+this.border_color.rgba.r+' '+this.border_color.rgba.g+' '+this.border_color.rgba.b+')', 
        }
      },
      demoBackground() {
        return {
          '--color': 'rgb('+this.background_color.rgba.r+' '+this.background_color.rgba.g+' '+this.background_color.rgba.b+' / '+this.background_color.rgba.a+')',
        }
      },
      demoBackgroundOpacity() {
        return {
          '--color': 'rgb('+this.background_color.rgba.r+' '+this.background_color.rgba.g+' '+this.background_color.rgba.b+')', 
        }
      },
      backgroundGradientStart() {
        return {
            '--color': 'rgb('+this.background_gradient.start.rgba.r+' '+this.background_gradient.start.rgba.g+' '+this.background_gradient.start.rgba.b+' / '+this.background_gradient.start.rgba.a+')', 
        }
      },
      backgroundGradientStartOpacity() {
        return {
            '--color': 'rgb('+this.background_gradient.start.rgba.r+' '+this.background_gradient.start.rgba.g+' '+this.background_gradient.start.rgba.b+')', 
        }
      },
      backgroundGradientEnd() {
        return {
            '--color': 'rgb('+this.background_gradient.end.rgba.r+' '+this.background_gradient.end.rgba.g+' '+this.background_gradient.end.rgba.b+' / '+this.background_gradient.end.rgba.a+')', 
        }
      },
      backgroundGradientEndOpacity() {
        return {
            '--color': 'rgb('+this.background_gradient.end.rgba.r+' '+this.background_gradient.end.rgba.g+' '+this.background_gradient.end.rgba.b+')', 
        }
      },
      currentStyling() {          
        return {
              '--margin': this.margin.top + ' '  + (this.blockAlign == 'left' || this.blockAlign == 'center' || (this.blockAlign == '' && this.margin.right == '0px' && this.margin.left != 'auto') ? 'auto' : this.margin.right) + ' ' + this.margin.bottom + ' ' + (this.blockAlign == 'right' || this.blockAlign == 'center' || (this.blockAlign == '' && this.margin.left == '0px' && this.margin.right != 'auto') ? 'auto' : this.margin.left),
              '--padding': this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left,
              '--border-width': this.border.top + ' '  + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left,
              '--border-radius': this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_right + ' ' + this.border_radius.bottom_left, 
              '--border-color': 'rgb('+this.border_color.rgba.r+' '+this.border_color.rgba.g+' '+this.border_color.rgba.b+' / '+this.border_color.rgba.a+')',
              '--border-style': this.border_style,
              '--background-color': 'rgb('+this.background_color.rgba.r+' '+this.background_color.rgba.g+' '+this.background_color.rgba.b+' / '+this.background_color.rgba.a+')',
              '--background-image': this.background_image.active ? 'url('+this.background_image.name+')' : this.background_gradient.active ? 'linear-gradient(' + this.background_gradient.direction + ', ' + 'rgb('+this.background_gradient.start.rgba.r+' '+this.background_gradient.start.rgba.g+' '+this.background_gradient.start.rgba.b+' / '+this.background_gradient.start.rgba.a+')' + ' ' + this.background_gradient.startPosition + ', ' + 'rgb('+this.background_gradient.end.rgba.r+' '+this.background_gradient.end.rgba.g+' '+this.background_gradient.end.rgba.b+' / '+this.background_gradient.end.rgba.a+')' + ' ' + this.background_gradient.endPosition +')' : 'none',
              '--background-size': this.background_image.active ? this.background_image.size : '',
              '--background-position': this.background_image.active ? this.background_image.position : '',
              '--background-repeat': this.background_image.active ? this.background_image.repeat.value : '',
              '--width': this.width.value,
              '--height': this.height.value,
          }
      }
    },
    watch: {
      selectedElement: {
        handler(val) {
          console.log(val);
        },
        deep: true,
      },
      width: {
        handler(val) {
          var vm = this;
          setTimeout(function(){
              val.value = vm.updateRexVal(val.value, 'wh');
              vm.widthRange.value = val.value != 'auto' ? val.value.replace(/[^0-9]/g, '') : '100';
              if(val.value[val.value.length-1] != '%' && val.value != 'auto') {
                vm.widthRange.max = screen.width;
                vm.widthRange.type = 'px';
              }
              else {
                vm.widthRange.max = '100';
                vm.widthRange.type = '%';
              }
              vm.updateSideUnitsDelay = '1000';
          }, vm.updateSideUnitsDelay);
        },
        deep: true,
      },
      widthRange: {
        handler(val) {
          this.width.value = val.value + val.type;
        },
        deep: true,
      },
      height: {
        handler(val) {
          var vm = this;
          setTimeout(function(){
              val.value = vm.updateRexVal(val.value, 'wh');
              vm.heightRange.value = val.value != 'auto' ? val.value.replace(/[^0-9]/g, '') : '100';
              if(val.value[val.value.length-1] != '%' && val.value != 'auto') {
                vm.heightRange.max = screen.height;
                vm.heightRange.type = 'px';
              }
              else {
                vm.heightRange.max = '100';
                vm.heightRange.type = '%';
              }
              vm.updateSideUnitsDelay = '1000';
            }, vm.updateSideUnitsDelay);
        },
        deep: true,
      },
      heightRange: {
        handler(val) {
          this.height.value = val.value + val.type;
        },
        deep: true,
      },
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
          var gdir = parseInt(this.getNumVal(val.direction));
          var gstart = parseInt(this.getNumVal(val.startPosition));
          var gend = parseInt(this.getNumVal(val.endPosition));

          if(gdir > 360) gdir = 360;
          else if(gdir < -360) gdir = -360;
          if(gstart > 100) gstart = 100;
          else if(gstart < -100) gstart = -100;
          if(gend > 100) gend = 100;
          else if(gend < -100) gend = -100;

          val.direction = (gdir ? gdir : '0') + 'deg';
          val.startPosition = (gstart ? gstart : '0') + '%';
          val.endPosition = (gend ? gend : '0') + '%';

          this.background_gradient_range_slider.direction = gdir;
          this.background_gradient_range_slider.startPosition = gstart;
          this.background_gradient_range_slider.endPosition = gend;
          val.active ? this.background_image.active = false : '';
        },
        deep: true,        
      },
      background_image: {
        handler(val){
          val.active ? this.background_gradient.active = false : '';
        },
        deep: true,
      },
    },
    created() {
        this.addSection(0);
        this.getUploadImages();
    },
    methods: {
      showSettingOpt(block, Outterblock) {
        if(block.type == 'section') {
          this.selectedSection = this.selectedSection ? '' : block;
        }
        else if(block.type == 'row') {
          this.selectedRow = this.selectedRow ? '' : block;
          this.selectedSection = this.selectedSection ? '' : Outterblock;
        }
        else {
        }
      },
      closeDropDown(e) {
        e.target ? !e.target.classList.contains('kb-dropdown-selected-item') ? this.show_dropdown = '' : '' : '';
      },

      operateNumVal(eKey, val) {
        return eKey == 'ArrowUp' ? this.updateRexVal(val, 'inc') : eKey == 'ArrowDown' ?  this.updateRexVal(val, 'dec') : val;
      },

      getNumVal(val) {
        var i = 0;
        return val.replace(/[^0-9]/g, m  => !i++ ? (m == '-' ? (val[0] != '-' ? '' : m) : '') : '');
      },

      // general values

      updateRexVal(val, op) {
        if(val[0] != 'a') {
          let unit = 'px', len = val.length;
          val.includes('px') && val.lastIndexOf('px') == len - 2 ? unit = 'px' : '';
          val.includes('%') && val.lastIndexOf('%') == len - 1 ? unit = '%' : '';
          val.includes('em') && val.lastIndexOf('em') == len - 2 ? unit = 'em' : '';
          val.includes('pt') && val.lastIndexOf('pt') == len - 2 ? unit = 'pt' : '';
          val.includes('cm') && val.lastIndexOf('cm') == len - 2 ? unit = 'cm' : '';
          val.includes('in') && val.lastIndexOf('in') == len - 2 ? unit = 'in' : '';
          val.includes('rem') && val.lastIndexOf('rem') == len - 3 ? unit = 'rem' : '';
          val.includes('vh') && val.lastIndexOf('vh') == len - 2 ? unit = 'vh' : '';
          val.includes('vw') && val.lastIndexOf('vw') == len - 2 ? unit = 'vw' : '';
          var result = val.replace(/[^0-9]/g, '') ? this.getNumVal(val) : '0';
          if(op == 'inc') {
            return (parseInt(result)+1).toString() + unit;
          }
          else if(op == 'dec') {
            return (parseInt(result)-1).toString() + unit;
          }
          else if(op == 'wh') {
            return result == '0' ? '100%' : result + unit;
          }
          else {
            return result + unit;
          }
        }
        else {
          return 'auto';
        }
      },

      updateSideUnits(val) {
        var vm = this;
        setTimeout(function(){
          val.top = vm.updateRexVal(val.top);
          val.bottom = vm.updateRexVal(val.bottom);
          val.left = vm.updateRexVal(val.left);
          val.right = vm.updateRexVal(val.right);
        }, vm.updateSideUnitsDelay);
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
          this.updateSideUnits(val);
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
          this.updateSideUnits(val);
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
          this.updateSideUnits(val);
      },

      borderRadiusUpdate(val) {
          this.br_link ? val.bottom_left = val.bottom_right = val.top_right = val.top_left : '';
          var vm = this;
          setTimeout(function(){ 
            val.top_left = vm.updateRexVal(val.top_left);
            val.top_right = vm.updateRexVal(val.top_right);
            val.bottom_left = vm.updateRexVal(val.bottom_left);
            val.bottom_right = vm.updateRexVal(val.bottom_right);
          }, vm.updateSideUnitsDelay);
      },

      // general values

      getUploadImages() {
        axios.post('api/get_upload_image')
        .then(request=>{
          this.galleryImg = request.data.data;
          this.galleryImgName = this.galleryImg.map(item=>item.name);
        });
      },

      updateStyle() {
        var margin = 'margin:' + this.margin.top + ' '  + (this.blockAlign == '' && this.margin.right == '0px' && this.margin.left != 'auto' ? 'auto' : this.margin.right) + ' ' + this.margin.bottom + ' ' + (this.blockAlign == '' && this.margin.left == '0px' && this.margin.right != 'auto' ? 'auto' : this.margin.left)  + '; ';
        var padding = 'padding:'+this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left + '; ';
        var borderWidth = 'border-width:' + this.border.top + ' ' + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left + '; ';
        var borderStyle = 'border-style:' + this.border_style + '; ';
        var borderColor = 'border-color:' + 'rgb('+this.border_color.rgba.r+' '+this.border_color.rgba.g+' '+this.border_color.rgba.b+' / '+this.border_color.rgba.a+'); ';
        var borderRadius = 'border-radius:' + this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_left + ' ' + this.border_radius.bottom_right + '; ';
        var backgroundColor = 'background-color:' + 'rgb('+this.background_color.rgba.r+' '+this.background_color.rgba.g+' '+this.background_color.rgba.b+' / '+this.background_color.rgba.a+'); ';
        var width = this.width.value != '100%' ? 'width:' + this.width.value + '; ' : '';
        var height = this.height.value != '100%' ? 'height:' + this.height.value + '; ' : '';
        var align = this.blockAlign == 'right' || this.blockAlign == 'center' ? 'margin-left:auto!important;' : '';
        align = align + (this.blockAlign == 'left' || this.blockAlign == 'center' ? 'margin-right:auto!important;' : '');
        if(this.background_gradient.active || this.background_image.active) {
          if(this.background_gradient.active) {
            var backgroundImage = 'background-image:' + 'linear-gradient(' + this.background_gradient.direction + ', ' + 'rgb('+this.background_gradient.start.rgba.r+' '+this.background_gradient.start.rgba.g+' '+this.background_gradient.start.rgba.b+' / '+this.background_gradient.start.rgba.a+')' + ' ' + this.background_gradient.startPosition + ', ' + 'rgb('+this.background_gradient.end.rgba.r+' '+this.background_gradient.end.rgba.g+' '+this.background_gradient.end.rgba.b+' / '+this.background_gradient.end.rgba.a+')' + ' ' + this.background_gradient.endPosition +'); ';
          }
          else if(this.background_image.active) {
            var backgroundSize = 'background-size:' + this.background_image.size + '; ';
            var backgroundPosition = 'background-position:' + this.background_image.position + '; ';
            var backgroundRepeat = 'background-repeat:' + this.background_image.repeat.value + '; ';
            var backgroundImage = 'background-image:' + 'url('+this.background_image.name+'); ' + backgroundSize + backgroundPosition + backgroundRepeat;
          }
          this.selectedBlock.style = margin + padding + borderWidth + borderStyle + borderColor + borderRadius + width + height + backgroundColor + backgroundImage;
        }
        else {
          this.selectedBlock.style = margin + padding + borderWidth + borderStyle + borderColor + borderRadius + width + height + backgroundColor;
        }
        align ? this.selectedBlock.style = this.selectedBlock.style + align : '';
        this.showSelection = !this.showSelection;
        this.selectedBlock = '';
        // var style = document.createElement('STYLE');
        // style.id = "createStyle";
        // document.getElementsByTagName('HEAD')[0].appendChild(style);
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
          this.border_color = {hex:'#000000', rgba:{r:'0', g:'0', b:'0', a:'1'}};
          this.background_color = {hex: '#ff000000', rgba: {r:'255', g:'0', b:'0', a:'0'}};

          this.blockAlign = '';

          this.width.value = this.selectedBlock.type == 'section' ? '100%' : '80%';
          this.height.value = '100%';

          this.resetBackgroundImage();
          this.resetBackgroundGradient();
      },

      resetBackgroundImage() {
          this.background_image.active = false;
          this.background_image.name = '';
          this.background_image.size = 'cover';
          this.background_image.position = 'center';
          this.background_image.repeat = {name: 'no repeat', value: 'no-repeat'};
      },

      resetBackgroundGradient() {
          this.background_gradient.active = false;
          this.background_gradient.direction = '45deg'; 
          this.background_gradient.start = {hex: '#1867c0', rgba: {r:'24', g:'103', b:'193', a:'1'}}; 
          this.background_gradient.end = {hex: '#1BC5BD', rgba: {r:'27', g:'197', b:'189', a:'1'}}; 
          this.background_gradient.startPosition = '0%'; 
          this.background_gradient.endPosition = '100%'; 
          this.background_gradient.gradientStart = false; 
          this.background_gradient.gradientEnd = false; 
          this.background_gradient_range_slider.direction = '45'; 
          this.background_gradient_range_slider.startPosition = '0';
          this.background_gradient_range_slider.endPosition = '100';
      },

      blockSetting(build) {
        this.updateSideUnitsDelay = '0';
        var str = '';
        if(build.style) {
          for(var attr of build.style.split(';')) {
            var kt = attr.split(':');
            if(kt[0].trim() != 'background-image') {
              str = kt != ' ' ? str + '"' + kt[0].trim().split('-')[0] + (kt[0].trim().split('-')[1] != undefined ? kt[0].trim().split('-')[1] : '') + '"' + ':' + '"' + kt[1] + '", ' : str.slice(0, str.length-2);
            }
            else {
              var bg = kt[1].split(', ');
              if(bg.length != 1) {
                this.background_gradient.direction = bg[0].split('(')[1];

                var strclr = bg[1].split('(')[1].split(') ')[0].split(' ');
                this.background_gradient.start.rgba.r = strclr[0];
                this.background_gradient.start.rgba.g = strclr[1];
                this.background_gradient.start.rgba.b = strclr[2];
                this.background_gradient.start.rgba.a = strclr[4];

                var endclr = bg[2].split('(')[1].split(') ')[0].split(' ');
                this.background_gradient.end.rgba.r = endclr[0];
                this.background_gradient.end.rgba.g = endclr[1];
                this.background_gradient.end.rgba.b = endclr[2];
                this.background_gradient.end.rgba.a = endclr[4];

                this.background_gradient.startPosition = bg[1].split(') ')[1];
                this.background_gradient.endPosition = bg[2].split(') ')[1];
                this.background_gradient.active = true;
                this.resetBackgroundImage();
              }
              else {
                this.background_image.name = kt[1].split('(')[1].split(')')[0];
                this.background_image.active = true;
                this.resetBackgroundGradient();
              }
            }
          }
          str = str[str.length-2] == ',' ? str.slice(0, str.length-2) : str;
          var obj = JSON.parse('{'+str+'}');

          this.width.value = obj.width ? obj.width : '100%';
          this.height.value = obj.height ? obj.height : '100%';

          this.margin.top = obj.margin.split(' ')[0];
          this.margin.right = obj.margin.split(' ')[1] != 'auto' ? obj.margin.split(' ')[1] : '0px';
          this.margin.bottom = obj.margin.split(' ')[2];
          this.margin.left = obj.margin.split(' ')[3] != 'auto' ? obj.margin.split(' ')[3] : '0px';

          obj.marginleft == 'auto!important' ? this.blockAlign = 'right' : '';
          obj.marginright == 'auto!important' ? this.blockAlign = 'left' : '';
          obj.marginleft == 'auto!important' && obj.marginright == 'auto!important' ? this.blockAlign = 'center' : '';

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

          var brdclr = obj.bordercolor.split('(')[1].split(')')[0].split(' ');
          this.border_color.rgba.r = brdclr[0];
          this.border_color.rgba.g = brdclr[1];
          this.border_color.rgba.b = brdclr[2];
          this.border_color.rgba.a = brdclr[4];

          var bgclr = obj.backgroundcolor.split('(')[1].split(')')[0].split(' ');
          this.background_color.rgba.r = bgclr[0];
          this.background_color.rgba.g = bgclr[1];
          this.background_color.rgba.b = bgclr[2];
          this.background_color.rgba.a = bgclr[4];

          obj.backgroundsize ? this.background_image.size = obj.backgroundsize : '';
          obj.backgroundposition ? this.background_image.position = obj.backgroundposition : '';
          if(obj.backgroundrepeat) {
            this.background_image_repeats.find(item =>{
                if(item.value==obj.backgroundrepeat){
                  this.background_image.repeat = item;
                }
              }
            )
          }
          if(bg == undefined) {
            this.resetBackgroundImage();
            this.resetBackgroundGradient();
          }
        }
        else {
          this.resetStyling();
        }
      },

      createBlockId(temp, checkArr) {
        temp.id = Math.floor(Math.random() * 10000000000);
        checkArr.forEach(item=>{
          if(item.id == temp.id) {
            return this.createBlockId(temp, checkArr);
          }
        })
        return temp.id;
      },

      // section

      appendSection(build, index) {
        var tempObj = JSON.parse(JSON.stringify(build));
        tempObj.id = this.createBlockId(tempObj, this.builder);
        this.builder.splice(index+1, 0, tempObj);
      },

      addSection(index) {
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
        tempObj.id = this.createBlockId(tempObj, rowArr);
        rowArr.splice(index+1, 0, tempObj);
      },

      addRow(rowSize, columnLength) {
        if(!this.selectedRow) {
          var tempObj = JSON.parse(JSON.stringify(this.rowObj));
          for(var i=0; i<columnLength; i++) {
            var eleObj = new Object;
            eleObj.id = Math.floor(Math.random() * 10000000000);
            tempObj.elementArr.push(eleObj);
          }
          tempObj.rowSize = rowSize;
          this.appendRow(this.selectedSectionRows, tempObj, this.row_index);
          this.row_index = 0;
        }
        else {
          this.selectedRow.rowSize = rowSize;
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

    // element

    addElement(ele) {
      this.selectedElement.name = ele.name;
      this.showSelection = !this.showSelection;
      this.elementSelection = false;
    },

    // element
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
