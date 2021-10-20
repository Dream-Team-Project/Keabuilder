<template>
  <div>
    <div id="page-container">
      <div ref="draggableContainer" id="kb-slectction-ask" class="forScroll" v-if="!showSelection">
        <div class="kb-ask-head" @mousedown="dragMouseDown">{{!rowSelection ? 'Section Setting' : 'Row Dimension'}}</div>
        <span class="kb-cut" @click="showSelection = !showSelection"><i class="fa fa-times"></i></span>
        <div id="kb-row-selection" class="selectionDiv" v-if="rowSelection">
          <div>
            <ul class="row-list">
              <li v-for="rt in rowTypes" :key="rt.cls" class="kb-row-type" :class="'row-'+rt.cls" @click="addNewRow('kb-'+rt.appendCls, rt.nofcolumn)"><span v-for="c in rt.nofcolumn" :key="c" class="block"><span></span></span></li>
            </ul>
          </div>
        </div>
        <div class="selectionDiv">
          <div class="kb-tabs-component">
              <tabs :options="{ defaultTabHash: 'general' }" @clicked="tabClicked" @changed="tabChanged" cache-lifetime="10">
                <tab id="general" name="General">
                    <!-- <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Margin</div>
                      <div class="kb-tab-content">
                        <span><input type="text" name="top-margin"><label for="top-margin">Top</label></span>
                        <span @click="m_link.tb = !m_link.tb, m_link.as = false" class="kb-linkBtw">
                          <svg v-if="!m_link.tb" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="bottom-margin"><label for="bottom-margin">Bottom</label></span>
                        <span @click="m_link.as = !m_link.as, m_link.tb = m_link.as, m_link.lr = m_link.as" class="kb-linkBtw">
                          <svg v-if="!m_link.as" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="left-margin"><label for="left-margin">Left</label></span>
                        <span @click="m_link.lr = !m_link.lr, m_link.as = false" class="kb-linkBtw">
                          <svg v-if="!m_link.lr" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="right-margin"><label for="right-margin">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Padding</div>
                      <div class="kb-tab-content">
                        <span><input type="text" name="top-padding"><label for="top-padding">Top</label></span>
                        <span @click="p_link.tb = !p_link.tb, p_link.as = false" class="kb-linkBtw">
                          <svg v-if="!p_link.tb" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="bottom-padding"><label for="bottom-padding">Bottom</label></span>
                        <span @click="p_link.as = !p_link.as, p_link.tb = p_link.as, p_link.lr = p_link.as" class="kb-linkBtw">
                          <svg v-if="!p_link.as" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="left-padding"><label for="left-padding">Left</label></span>
                        <span @click="p_link.lr = !p_link.lr, p_link.as = false" class="kb-linkBtw">
                          <svg v-if="!p_link.lr" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="right-padding"><label for="right-padding">Right</label></span>
                      </div>
                    </div>
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border</div>
                      <div class="kb-tab-content">
                        <span><input type="text" name="top-border"><label for="top-border">Top</label></span>
                        <span @click="b_link.tb = !b_link.tb, b_link.as = false" class="kb-linkBtw">
                          <svg v-if="!b_link.tb" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="bottom-border"><label for="bottom-border">Bottom</label></span>
                        <span @click="b_link.as = !b_link.as, b_link.tb = b_link.as, b_link.lr = b_link.as" class="kb-linkBtw">
                          <svg v-if="!b_link.as" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="left-border"><label for="left-border">Left</label></span>
                        <span @click="b_link.lr = !b_link.lr, b_link.as = false" class="kb-linkBtw">
                          <svg v-if="!b_link.lr" class="deactive" viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M16.75 9.14a1 1 0 0 1 .37 1.39l-4.5 8a1 1 0 0 1-1.37.37 1 1 0 0 1-.37-1.39l4.5-8a1 1 0 0 1 1.37-.37zM19.71 10H20a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-4.81l1.13-2H20a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1.42zM12.81 10l-1.13 2H8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h1.42l-1.13 2H8a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3z" fill-rule="evenodd"></path></g></svg>
                          <svg v-else viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M8 14a1 1 0 0 1 0 2h-.5A2.5 2.5 0 0 1 5 13.5v-2A2.5 2.5 0 0 1 7.5 9h8a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5H15a1 1 0 0 1 0-2h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5z" fill-rule="evenodd"></path><path d="M20 14a1 1 0 0 1 0-2h.5a2.5 2.5 0 0 1 2.5 2.5v2a2.5 2.5 0 0 1-2.5 2.5h-8a2.5 2.5 0 0 1-2.5-2.5v-2a2.5 2.5 0 0 1 2.5-2.5h.5a1 1 0 0 1 0 2h-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5z" fill-rule="evenodd"></path></g></svg>
                        </span>
                        <span><input type="text" name="right-border"><label for="right-border">Right</label></span>
                      </div>
                    </div> -->
                    <div class="kb-inner-tab-component">
                      <div class="kb-tab-head">Border Radius</div>
                      <div class="kb-tab-content">
                        <div class="kb-tab-border-radius">
                          <span><input type="text" name="top-left-border"></span>
                          <span><input type="text" name="top-right-border"></span>
                        </div>
                        <div class="kb-border-radius-demo">
                          <span class="kb-linkBtw"><svg viewBox="0 0 28 28" preserveAspectRatio="xMidYMid meet" shape-rendering="geometricPrecision"><g><path d="M14.71 17.71a3 3 0 0 1-2.12-.88l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 0 1.41 0l5-4.95a1 1 0 0 0 0-1.41l-1.46-1.42a1 1 0 0 0-1.41 0L16.1 9.07a1 1 0 0 1-1.41-1.41l1.43-1.43a3.07 3.07 0 0 1 4.24 0l1.41 1.41a3 3 0 0 1 0 4.24l-5 4.95a3 3 0 0 1-2.06.88z"></path><path d="M9.76 22.66a3 3 0 0 1-2.12-.88l-1.42-1.42a3 3 0 0 1 0-4.24l5-4.95a3.07 3.07 0 0 1 4.24 0l.71.71a1 1 0 0 1-1.41 1.41l-.76-.7a1 1 0 0 0-1.41 0l-5 4.95a1 1 0 0 0 0 1.41L9 20.36a1 1 0 0 0 1.41 0L11.82 19a1 1 0 0 1 1.41 1.41l-1.36 1.36a3 3 0 0 1-2.11.89z"></path></g></svg></span>
                        </div>
                        <div class="kb-tab-border-radius">
                          <span><input type="text" name="bottom-left-border"></span>
                          <span><input type="text" name="bottom-right-border"></span>
                        </div>
                      </div>
                    </div>
                    <!--<div class="kb-tab-head">Border</div>
                    <div class="kb-tab-head">Divider</div>
                    <div class="kb-tab-head">Box Shadow</div> -->
                </tab>               
                <tab id="background" name="Background">
                    <tabs :options="{ defaultTabHash: 'general' }" @clicked="tabClicked" @changed="tabChanged" cache-lifetime="10">
                      <tab id="color" name="Color">
                          Background color
                      </tab>               
                      <tab id="image" name="Image">
                          Image
                      </tab>
                      <tab id="gradient" name="Gradient">
                          Gradient
                      </tab>
                      <tab id="video" name="video">
                          Video
                      </tab>
                    </tabs>
                </tab>
                <tab id="advanced" name="Advanced">
                    This is the content of the second tab
                </tab>
              </tabs>
          </div>
        </div>
      </div>
      <draggable class="kb-drag-container" tag="div" v-model="builder" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="section">
        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
          <div v-for="(build, index) in builder" :key="build.id" class="kb-section kb-contain-element" :class="build.sectionSetting ? 'kb-border' : ''" @mouseenter="selectedSectionRows = build.rowArr, build.sectionSetting = true" @mouseleave="build.sectionSetting = false">
            <div> 
              <div class="kb-module-setting" v-if="build.sectionSetting">
                <span><i class="fa fa-arrows-alt"></i></span>
                <span v-tooltip="{ content: 'Section Setting' }"><i class="far fa-edit"></i></span>
                <span @click="duplicateSection(build, index)" v-tooltip="{ content: 'Duplicate Section' }"><i class="far fa-copy"></i></span>
                <span @click="deleteSection(index)" v-tooltip="{ content: 'Delete Section' }" v-if="builder.length != 1"><i class="far fa-trash-alt"></i></span>
              </div>
              <span class="kb-ispan-add add-row" v-tooltip="{ content: 'Add New Row' }" @click="showSelection = true, rowSelection = true" v-if="build.rowArr.length == 0"><i class="fa fa-plus"></i></span>
              <span class="kb-ispan-add add-section bottom-add-btn" v-tooltip="{ content: 'Add New Section' }" @click="addNewSection(index)" v-if="build.sectionSetting"><i class="fa fa-plus"></i></span>
            </div>
            <div>
              <draggable class="kb-drag-container" tag="div" v-model="build.rowArr" v-bind="dragOptions" @start="drag = true" @end="drag = false" group="row" @change="selectedSectionRows = build.rowArr">
                <transition-group type="transition" :name="!drag ? 'flip-list' : null">
                    <div class="kb-row kb-contain-element kb-border" v-for="(row, index) in build.rowArr" :key="row.id" @mouseenter="row.rowSetting = true" @mouseleave="row.rowSetting = false">
                        <div class="kb-module-setting" v-if="row.rowSetting">
                          <span><i class="fa fa-arrows-alt"></i></span>
                          <span @click="selectedRow = row, showSelection = true, rowSelection = true" v-tooltip="{ content: 'Column Structure' }"><i class="fa fa-columns"></i></span>
                          <span v-tooltip="{ content: 'Row Setting' }"><i class="far fa-edit"></i></span>
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
        m_link: {tb: false, lr: false, as: false},
        p_link: {tb: false, lr: false, as: false},
        b_link: {tb: true, lr: true, as: true},
       rowTypes: [{cls: '1', appendCls: 'full-block', nofcolumn: 1}, {cls: '1-2', appendCls: 'half-block', nofcolumn: 2}, {cls: '1-3', appendCls: 'three-block', nofcolumn: 3}, {cls: '1-4', appendCls: 'four-block', nofcolumn: 4}, {cls: '1-5', appendCls: 'five-block', nofcolumn: 5}, {cls: '1-6', appendCls: 'six-block', nofcolumn: 6}, {cls: '40-60', appendCls: 'f-s-block', nofcolumn: 2}, {cls: '60-40', appendCls: 's-f-block', nofcolumn: 2}, 
                  {cls: '25-75', appendCls: 'tf-sf-block', nofcolumn: 2}, {cls: '75-25', appendCls: 'sf-tf-block', nofcolumn: 2}, {cls: '20-80', appendCls: 't-e-block', nofcolumn: 2}, {cls: '80-20', appendCls: 'e-t-block', nofcolumn: 2}, {cls: '10-90', appendCls: 't-n-block', nofcolumn: 2}, {cls: '90-10', appendCls: 'n-t-block', nofcolumn: 2}, {cls: '30-40-30', appendCls: 't-f-t-block', nofcolumn: 3}, {cls: '20-60-20', appendCls: 't-s-t-block', nofcolumn: 3}, 
                  {cls: '15-70-15', appendCls: 'ft-s-ft-block', nofcolumn: 3}, {cls: '10-80-10', appendCls: 't-e-t-block', nofcolumn: 3}, {cls: '30-30-40', appendCls: 't-t-f-block', nofcolumn: 3}, {cls: '40-30-30', appendCls: 'f-t-t-block', nofcolumn: 3}, {cls: '20-20-60', appendCls: 't-t-s-block', nofcolumn: 3}, {cls: '60-20-20', appendCls: 's-t-t-block', nofcolumn: 3}, {cls: '15-15-70', appendCls: 'ft-ft-s-block', nofcolumn: 3}, {cls: '70-15-15', appendCls: 's-ft-ft-block', nofcolumn: 3}, {cls: '10-10-80', appendCls: 't-t-e-block', nofcolumn: 3}, {cls: '80-10-10', appendCls: 'e-t-t-block', nofcolumn: 3}],
        drag: false, 
        builder: [],
        buildObj: {id: 0, sectionSetting: false, rowArr: []},
        rowObj: {id: 0, columnLength: 0, rowSize: '', rowSetting: false},
        selectedSectionRows: [],
        selectedRow:'',
        showSelection: false,
        rowSelection: false,
        row_id: 0,
        row_index: 0,
        positions: {
          clientX: undefined,
          clientY: undefined,
          movementX: 0,
          movementY: 0
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
        }
    },
    watch: {
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

              tabClicked (selectedTab) {
            console.log('Current tab re-clicked:' + selectedTab.tab.name);
        },
        tabChanged (selectedTab) {
            console.log('Tab changed to:' + selectedTab.tab.name);
        },

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
        this.$refs.draggableContainer.style.top = (this.$refs.draggableContainer.offsetTop - this.positions.movementY) + 'px'
        this.$refs.draggableContainer.style.left = (this.$refs.draggableContainer.offsetLeft - this.positions.movementX) + 'px'
      },
      closeDragElement() {
        document.onmouseup = null
        document.onmousemove = null
      },

    //dragable element

    }
}
</script>
