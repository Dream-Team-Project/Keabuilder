<template>
  <div>
    <div id="page-container">
      <div ref="draggableContainer" id="kb-selectction-ask" class="forScroll" v-if="showSelection">
        <div class="kb-ask-head" @mousedown="dragMouseDown">{{!rowSelection ? 'Section Setting' : 'Row Dimension'}}</div>
        <span @click="!rowSelection ? expand = !expand : showSelection = !showSelection, selectedSection = ''" class="kb-selection-top-actions"><i v-if="!rowSelection" class="fas" :class="expand ? 'fa-expand-arrows-alt' : 'fas fa-compress-arrows-alt'"></i><i v-else class="fa fa-times"></i></span>
        <div id="kb-row-selection" class="selectionDiv" v-if="rowSelection">
          <div>
            <ul class="row-list">
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
                        <span><input v-model="margin.top" type="text" name="top-margin"><label for="top-margin">Top</label></span>
                        <span @click="m_link.tb = !m_link.tb, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.tb" v-model="margin.top" type="text" name="bottom-margin"><input v-else v-model="margin.bottom" type="text" name="bottom-margin"><label for="bottom-margin">Bottom</label></span>
                        <span @click="m_link.a = !m_link.a, m_link.tb = m_link.a, m_link.lr = m_link.a, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.a" v-model="margin.top" type="text" name="left-margin"><input v-else v-model="margin.left" type="text" name="left-margin"><label for="left-margin">Left</label></span>
                        <span @click="m_link.lr = !m_link.lr, m_link.a = false, marginUpdate(margin)" class="kb-linkBtw">
                          <svg :class="!m_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="m_link.a" v-model="margin.top" type="text" name="right-margin"><input v-else-if="m_link.lr" v-model="margin.left" type="text" name="right-margin"><input v-else v-model="margin.right" type="text" name="right-margin"><label for="right-margin">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Padding</div>
                      <div class="kb-tab-content">
                        <span><input v-model="padding.top" type="text" name="top-padding"><label for="top-padding">Top</label></span>
                        <span @click="p_link.tb = !p_link.tb, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.tb" v-model="padding.top" type="text" name="bottom-padding"><input v-else v-model="padding.bottom" type="text" name="bottom-padding"><label for="bottom-padding">Bottom</label></span>
                        <span @click="p_link.a = !p_link.a, p_link.tb = p_link.a, p_link.lr = p_link.a, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.a" v-model="padding.top" type="text" name="left-padding"><input v-else v-model="padding.left" type="text" name="left-padding"><label for="left-padding">Left</label></span>
                        <span @click="p_link.lr = !p_link.lr, p_link.a = false, paddingUpdate(padding)" class="kb-linkBtw">
                          <svg :class="!p_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="p_link.a" v-model="padding.top" type="text" name="right-padding"><input v-else-if="p_link.lr" v-model="padding.left" type="text" name="right-padding"><input v-else v-model="padding.right" type="text" name="right-padding"><label for="right-padding">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Width</div>
                      <div class="kb-tab-content">
                        <span><input v-model="border.top" type="text" name="top-border"><label for="top-border">Top</label></span>
                        <span @click="b_link.tb = !b_link.tb, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.tb ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.tb" v-model="border.top" type="text" name="bottom-border"><input v-else v-model="border.bottom" type="text" name="bottom-border"><label for="bottom-border">Bottom</label></span>
                        <span @click="b_link.a = !b_link.a, b_link.tb = b_link.a, b_link.lr = b_link.a, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.a ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.a" v-model="border.top" type="text" name="left-border"><input v-else v-model="border.left" type="text" name="left-border"><label for="left-border">Left</label></span>
                        <span @click="b_link.lr = !b_link.lr, b_link.a = false, borderUpdate(border)" class="kb-linkBtw">
                          <svg :class="!b_link.lr ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input v-if="b_link.a" v-model="border.top" type="text" name="right-border"><input v-else-if="b_link.lr" v-model="border.left" type="text" name="right-border"><input v-else v-model="border.right" type="text" name="right-border"><label for="right-border">Right</label></span>
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
                          <span><input v-model="border_radius.top_left" type="text" name="top-left-border"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="top-right-border"><input v-else v-model="border_radius.top_right" type="text" name="top-right-border"></span>
                        </div>
                        <div class="kb-border-radius-demo" :style="demoBorder">
                          <span @click="br_link = !br_link, borderRadiusUpdate(border_radius)" class="kb-linkBtw"><svg :class="!br_link ? 'deactive' : ''" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M14.71 17.71a3 3 0 0 1-2.12-.88l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 0 1.41 0l5-4.95a1 1 0 0 0 0-1.41l-1.46-1.42a1 1 0 0 0-1.41 0L16.1 9.07a1 1 0 0 1-1.41-1.41l1.43-1.43a3.07 3.07 0 0 1 4.24 0l1.41 1.41a3 3 0 0 1 0 4.24l-5 4.95a3 3 0 0 1-2.06.88z"></path><path d="M9.76 22.66a3 3 0 0 1-2.12-.88l-1.42-1.42a3 3 0 0 1 0-4.24l5-4.95a3.07 3.07 0 0 1 4.24 0l.71.71a1 1 0 0 1-1.41 1.41l-.76-.7a1 1 0 0 0-1.41 0l-5 4.95a1 1 0 0 0 0 1.41L9 20.36a1 1 0 0 0 1.41 0L11.82 19a1 1 0 0 1 1.41 1.41l-1.36 1.36a3 3 0 0 1-2.11.89z"></path></g></svg></span>
                        </div>
                        <div class="kb-tab-border-radius">
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-left-border"><input v-else v-model="border_radius.bottom_left" type="text" name="bottom-left-border"></span>
                          <span><input v-if="br_link" v-model="border_radius.top_left" type="text" name="bottom-right-border"><input v-else v-model="border_radius.bottom_right" type="text" name="bottom-right-border"></span>
                        </div>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component kb-color-picker">
                      <div class="kb-tab-head">Border Color<span class="kb-color-demo kb-border-color-demo"  :style="demoBorder"></span></div>
                      <div class="kb-tab-content">
                          <colour-material-picker v-model="border_color" label="Pick Colour" picker="chrome"/>
                          <div class="kb-slider-color-selection">
                            <colour-slider-picker v-model="border_color" label="Pick Colour" picker="chrome"/>
                            <!-- <colour-sketch-picker class="kb-pick-a-color" v-model="border_color" label="Pick Colour" picker="chrome"/> -->
                            <div class="kb-color-preset"><span @click="border_color = color" v-for="color in presetColors" :key="color.hex" :class="border_color.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                          </div>
                      </div>
                    </div>
                    <!-- <div class="kb-tab-head">Divider</div>
                    <div class="kb-tab-head">Box Shadow</div> -->
                </tab>               
                <tab id="background" name="Background">
                  <div class="kb-inner-tab-component kb-color-picker">
                      <div class="kb-tab-head">Background Color<span class="kb-color-demo kb-background-color-demo" :style="demoBackground"></span></div>
                      <div class="kb-tab-content">
                          <colour-material-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                          <div class="kb-slider-color-selection">
                            <colour-slider-picker v-model="background_color" label="Pick Colour" picker="chrome"/>
                            <!-- <colour-sketch-picker class="kb-pick-a-color" v-model="border_color" label="Pick Colour" picker="chrome"/> -->
                            <div class="kb-color-preset"><span @click="background_color = color" v-for="color in presetColors" :key="color.hex" :class="background_color.hex == color.hex ? 'kb-active-color' : ''" :style="{'background-color':color.hex}"></span></div>
                          </div>
                      </div>
                    </div>
                </tab>
                <tab id="advanced" name="Advanced">
                    This is the content of the second tab
                </tab>
              </tabs>
          </div>
          <div class="kb-selection-btn-group"><button type="button"  @click="showSelection = !showSelection, selectedSection = ''" class="kb-btn kb-btn-danger kb-selection-btn"><span><i class="fa fa-times"></i>Discard</span></button><button type="button" @click="updateStyle()" class="kb-btn kb-btn-success kb-selection-btn"><span><i class="far fa-save"></i>Apply</span></button></div>
        </div>
      </div>
      <draggable class="kb-drag-container" tag="div" v-model="builder" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="section">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
          <div :style="selectedSection.id == build.id ? currentStyling : build.style" v-for="(build, index) in builder" :key="build.id" :id="'kb-section-'+build.id" class="kb-section kb-contain-element" :class="selectedSection.id == build.id ? 'kb-demo-styling' : build.sectionSetting ? 'kb-border' : ''" @mouseenter="selectedSectionRows = build.rowArr, build.sectionSetting = true" @mouseleave="build.sectionSetting = false">
            <div> 
              <div class="kb-module-setting" v-if="build.sectionSetting && selectedSection.id != build.id">
                <span><i class="fa fa-arrows-alt"></i></span>
                <span @click="selectedSection = build, rowSelection = false, showSelection = true" v-tooltip="{ content: 'Section Setting' }"><i class="far fa-edit"></i></span>
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
        border_color: {hex: '#000000'},
        border_style: 'solid',
        border_style_types: ['solid','dashed','dotted','double','groove','ridge','inset','outset','none'],
        background_color: {hex: ''},
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
    created() {
        this.addNewSection(0);
    },
    computed: {
      dragOptions() {
        return {
            animation: 200,
            disabled: false,
            ghostClass: "ghost"
        };
      },
      demoBorder() {
        return {
          '--border-radius': this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_left + ' ' + this.border_radius.bottom_right, 
          '--border-color': this.border_color.hex,
          '--border-style': this.border_style,
        }
      },
      demoBackground() {
        return {
          '--background-color': this.background_color.hex, 
        }
      },
      currentStyling() {
          return {
              '--margin': this.margin.top + ' '  + this.margin.right + ' ' + this.margin.bottom + ' ' + this.margin.left,
              '--padding': this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left,
              '--border-width': this.border.top + ' '  + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left,
              '--border-radius': this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_left + ' ' + this.border_radius.bottom_right, 
              '--border-color': this.border_color.hex,
              '--border-style': this.border_style,
              '--background-color': this.background_color.hex,
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
    methods: {

      updateStyle() {
        var margin = 'margin: ' + this.margin.top + ' '  + this.margin.right + ' ' + this.margin.bottom + ' ' + this.margin.left + '; ';
        var padding = 'padding:'+this.padding.top + ' '  + this.padding.right + ' ' + this.padding.bottom + ' ' + this.padding.left + '; ';
        var borderWidth = 'border-width:' + this.border.top + ' ' + this.border.right + ' ' + this.border.bottom + ' ' + this.border.left + '; ';
        var borderStyle = 'border-style:' + this.border_style + '; ';
        var borderColor = 'border-color:' + this.border_color.hex + '; ';
        var borderRadius = 'border-radius:' + this.border_radius.top_left + ' '  + this.border_radius.top_right + ' ' + this.border_radius.bottom_left + ' ' + this.border_radius.bottom_right + '; ';
        var backgroundColor = 'background-color:' + this.background_color.hex + '; ';
        this.selectedSection.style = margin + padding + borderWidth + borderStyle + borderColor + borderRadius + backgroundColor;
        this.showSelection = !this.showSelection;
        this.selectedSection = '';
        // var style = document.createElement('STYLE');
        // style.id = "createStyle";
        // document.getElementsByTagName('HEAD')[0].appendChild(style);
        // this.selectedSection.style = style.innerHTML;
      },

      // general values

      updateSideVals(val) {
          val.top = val.top.replace(/[^0-9]/g, '') ? val.top.replace(/[^0-9]/g, '') + 'px' : '';
          val.bottom = val.bottom.replace(/[^0-9]/g, '') ? val.bottom.replace(/[^0-9]/g, '') + 'px' : '';
          val.right = val.right.replace(/[^0-9]/g, '') ? val.right.replace(/[^0-9]/g, '') + 'px' : '';
          val.left = val.left.replace(/[^0-9]/g, '') ? val.left.replace(/[^0-9]/g, '') + 'px' : '';
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
          val.top_left = val.top_left ? val.top_left.replace(/[^0-9]/g, '') + 'px' : '';
          val.top_right = val.top_right ? val.top_right.replace(/[^0-9]/g, '') + 'px' : '';
          val.bottom_left = val.bottom_left ? val.bottom_left.replace(/[^0-9]/g, '') + 'px' : '';
          val.bottom_right = val.bottom_right ? val.bottom_right.replace(/[^0-9]/g, '') + 'px' : '';
      },

      // general values

      // section

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

    }
}
</script>
