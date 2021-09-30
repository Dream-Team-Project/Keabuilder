<style scoped>
    /* nav */
    .rightbrder {
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

    .wizard-step[data-wizard-state="current"] {
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

    .wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label .wizard-desc {
        font-size: 13px;
    }

    #secondwizard .wizard-step {
        flex: 0 0 calc(25% - 0.25rem);
        width: calc(25% - 0.25rem);
    }

    /* nav */
    /* body */
    .whitefunnel {
        background: #fff;
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
        transition: all .3s cubic-bezier(.23, 1, .32, 1);
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
        top: 4px;
        position: relative;
        opacity: 0.5;
        transition: .5s ease-in;
        width: 22px;
        /* height: 20px; */
        text-align: center;
        right: 0px;
    }

    .kiabuilder-item i:hover,
    .kb-sharelink:hover,
    .kb-settings-i:hover {
        opacity: 1;
    }

    .dropdown-menu {
        top: 16px !important;
        left: -115px !important;
        min-width: 120px !important;
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
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
    }

    .dropdown-menu .dropdown-item {
        text-transform: uppercase;
        display: flex;
        align-items: center;
    }

    .dropdown-item {
        font-size: 12px;
        padding: 10px !important;
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
        transition: border .2s ease-in-out, box-shadow .2s ease-in-out;
        height: 2.5rem;
        padding: .9375rem 1rem;
    }

    .sage-input__field:valid:not(:placeholder-shown)~.sage-input__label {
        transform: translateY(-var(--sage-font-size-body).5rem);
        transform: translateY(calc(-50% - 1.25rem));
        transform: translateY(calc(-50% - var(--sage-font-size-body) - .25rem));
        transition: opacity .1s ease-in, transform .15s ease-in-out, color .15s ease-out;
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
        background: rgb(243 246 249);
    }

    #createfunnel {
        background: #F2F4F4;
    }

    .kb-sharelink,
    .kb-settings-i {
        position: absolute;
        right: 10px;
        bottom: 8px;
        cursor: pointer;
        opacity: 0.5;
        transition: .5s ease-in;
    }

    .kb-settings-i {
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

    .kb-internalshadow .toast {
        opacity: 1;
    }

    .kb-split-text>div {
        display: flex;
    }

    .kb-split-text .fa-vials {
        opacity: 0.4;
        color: #007aff;
    }

    .svgimg3 svg {
        width: 182px;
        margin: auto;
        position: relative;
        left: 34%;
        opacity: 0.5;
        transition: .5s ease-in-out;
    }

    .svgimg3 svg:hover {
        opacity: 1;
    }

    #Bubble-1 {
        animation: bubbleup 1s ease-in-out infinite;
        stroke: red;
    }

    #Bubble-2 {
        animation: bubbleup2 2s ease-in-out infinite;
        stroke: blue;
    }

    #Bubble-3 {
        animation: bubbleup3 3s ease-in-out infinite;
        stroke: pink;
    }

    #Bubble-4 {
        animation: bubbleup4 2s ease-in-out infinite;
        stroke: gold;
    }

    #Bubble-5 {
        animation: bubbleup5 1s infinite;
        stroke: green;
    }

    #Bubble-6 {
        animation: bubbleup6 4s infinite;
        stroke: #91959c;
    }

    @keyframes bubbleup {
        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -10);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -30);
        }
    }

    @keyframes bubbleup2 {
        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -10);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -40);
        }
    }

    @keyframes bubbleup3 {

        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -30);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -40);
        }
    }

    @keyframes bubbleup4 {
        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -30);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -40);
        }
    }

    @keyframes bubbleup5 {
        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -10);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -20);
        }
    }

    @keyframes bubbleup6 {
        from {
            opacity: 0;
            transform: matrix(1, 0, 0, 1, 0, -15);
        }

        to {
            opacity: 0.5;
            transform: matrix(1, 0, 0, 1, 0, -30);
        }
    }


    #Bubble-1,
    #Bubble-2,
    #Bubble-3,
    #Bubble-4,
    #Bubble-5,
    #Bubble-6 {
        display: none;
    }

    #Layer_1:hover #Bubble-1,
    #Layer_1:hover #Bubble-2,
    #Layer_1:hover #Bubble-3,
    #Layer_1:hover #Bubble-4,
    #Layer_1:hover #Bubble-5,
    #Layer_1:hover #Bubble-6 {
        display: block;
    }

    .kb-createvar {
        display: inline-block !important;
        box-shadow: -7px 8px 16px 0 rgb(55 70 95 / 20%);
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
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

    .yesdeclarewinner:hover .declarewinner {
        display: block;
    }

    #kb-splittestmake {
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

    .kb-red {
        background: rgb(255 0 0 / 20%);
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: #d8c898;
        cursor: pointer;
        transition: background .3s ease-in-out;
        box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
    }

    input[type=range]::-webkit-slider-runnable-track {
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

    #secondwizard .wizard-step[data-wizard-state=current]>div {
        background: #fff;
    }

    #kb-automation-actions>div {
        overflow-y: scroll;
    }

    /* width */
    #kb-automation-actions>div::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    #kb-automation-actions>div::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Handle */
    #kb-automation-actions>div::-webkit-scrollbar-thumb {
        background: #e2e2e2;
    }

    #kb-automation-actions .fa-times {
        position: absolute;
        right: 24px;
        z-index: 99999;
        cursor: pointer;
    }

    .ghost {
        opacity: 0.5;
        background: #c8ebfb;
    }

    .fa-grip-lines {
        cursor: move;
    }

    .keabuilder-title-board {
        font-weight: 700;
        margin: 0;
        padding: 0;
        display: inline-block;
        font-weight: normal;
        cursor: text;
        padding: 0 0.5rem;
        /* width: 65%; */
    }

    .keabuilder-title-board span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 135px;
        display: inline-block;
    }

    .keabuilder-title-board input {
        display: none;
        background-color: #475F7B;
        color: #FFFFFF;
        border-radius: 0.267rem;
        outline: none;
        text-overflow: clip;
        font-size: 14px;
        height: 20px;
    }

    .keabuilder-title-board:hover span {
        display: none;
    }

    .keabuilder-title-board:hover input {
        display: block;
    }

    .kb-temp-ul {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 30px;
        position: relative;
    }

    .kb-temp-ul li {
        display: block;
        padding: 8px 20px;
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        margin-right: 10px;
        float: left;
        font-size: 14px;
        position: relative;
    }

    .kb-temp-ul li a {
        color: #444;
    }

    .kb-temp-ul ul {
        position: absolute;
        top: 34px;
        left: 0px;
        display: none;
        float: left;
        min-width: 240px;
        padding: 0;
    }

    .kb-temp-ul ul li {
        display: inline-block;
        box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
        background: #fff;
        margin-top: 5px;
        border-radius: 5px;
        font-size: 13px;
        transition: .5s ease;
    }

    .kb-temp-ul ul li:hover {
        background: #e2e2e2;
    }

    .kb-temp-ul li:hover>ul {
        display: block;
    }

    .kb-showtemplates {
        width: 100%;
        float: left;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .kb-showtemplates li {
        display: inline;
        width: 50%;
        padding: 2%;
        text-align: center;
        float: left;
        font-size: 14px;
        border-bottom: 1px solid #DFE3E7 !important;
    }

    .kb-showtemplates li a {
        color: rgb(0, 0, 0);
        cursor: pointer;
        padding: 15px;
        box-shadow: -4px 4px 6px 0 rgb(55 70 95 / 12%);
        width: 100%;
        float: left;
        background: #fff;
    }

    .kb-showtemplates li a.active {
        background: #d8c898;
        color: #fff;
    }

    #secondwizard .wizard-number {
        background: #d8c898;
        color: #fff;
    }

    #secondwizard {
        height: 17px;
        overflow: hidden;
        opacity: 0.5;
        transition: height 0.15s ease-out;
    }

    #secondwizard:hover {
        height: 54px;
        opacity: 1;
        transition: height 0.25s ease-in;
    }

    #secondwizard:hover .showwhendrag {
        opacity: 0;
    }

    .showwhendrag {
        position: relative;
        top: -23px;
        font-size: 25px;
        transition: opacity .5 ease-in;
    }

    .kb-alltemplates {
        margin: 0;
        padding: 0;
        list-style: none;
        float: left;
    }

    .kb-alltemplates li {
        text-align: center;
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
        border-radius: .267rem;
        background: #fff;
        cursor: pointer;
        display: inline;
        float: left;
        width: 31%;
        margin: 1%;
    }

    .kb-alltemplates .kb-showtemp-footer {
        padding: 13px;
        border-top: 1px solid #e2e2e2;
        height: 110px;
    }

    .kb-showtemp-footer button {
        height: 0;
        transition: 0.25s ease-in-out;
        font-size: 13px;
        padding: 0 10px;
    }

    .kb-alltemplates li:hover .kb-showtemp-footer button {
        height: 39px;
    }

    /* contacts */

    .card {
        margin-bottom: 2.2rem;
        box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%);
        -webkit-transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
        transition: all .3s ease-in-out, background 0s, color 0s, border-color 0s;
    }

    .dataTables_wrapper div.dataTables_length select {
        width: auto;
        display: inline-block;
    }

    .dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
    }

    div#users-list-datatable_filter {
        text-align: right;
    }

    label {
        color: #475F7B;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .table thead th {
        color: #475F7B;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    #users-list-datatable_info {
        font-size: 14px;
        color: #727E8C;
    }
    #users-list-datatable tr td, select#users-list-verified {
        font-size: 14px;
    }
    .disabled,
    .disabled a,
    :disabled,
    :disabled a {
        color: #828D99 !important;
    }
    #users-list-role {
        font-size: 14px;
    }
    .pagination .page-item.previous {
        margin-right: .3571rem;
    }

    .pagination .page-item.active {
        border-radius: 0;
    }

    .page-link {
        padding: .47rem .73rem;
        margin-left: 0;
        line-height: 1.25;
        color: #3F3356;
        background-color: #FFF;
    }

    .pagination .page-item .page-link {
        border: 1px solid #DFE3E7;
        border-right: 0;
        border-left: 0;
        color: #324356;
        background-color: transparent;
        font-weight: 600;
    }

    .pagination .page-item.active .page-link,
    .pagination .page-item.active .page-link:hover {
        border-radius: .267rem;
        background-color: #5A8DEE !important;
        color: #FFF;
    }

    .dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-end;
    }

    .pagination .page-item.next .page-link {
        border: 1px solid #DFE3E7;
        border-radius: .267rem;
    }

    .pagination .page-item.previous~.page-item:nth-last-child(-n+2) .page-link {
        border-right: 1px solid #DFE3E7;
        border-top-right-radius: .267rem;
        border-bottom-right-radius: .267rem;
    }

    .pagination .page-item.first .page-link,
    .pagination .page-item.last .page-link,
    .pagination .page-item.next .page-link,
    .pagination .page-item.previous .page-link {
        color: #5A8DEE;
        padding: .435rem .5rem;
    }

    .pagination .page-item.next {
        margin-left: .3571rem;
    }

    .pagination .page-item.previous {
        margin-right: .3571rem;
    }

    .pagination .page-item.previous.disabled .page-link {
        background-color: #F2F4F4;
    }

    .pagination .page-item.previous .page-link {
        border: 1px solid #DFE3E7;
        border-radius: .267rem;
    }

    #table-userslist .table-responsive {
        overflow-x: visible;
    }
    #users-list-datatable_paginate ul li {
        font-size: 13px;
    }
    .badge.badge-light-success {
        background-color: rgba(57,218,138,.17);
        color: #39DA8A!important;
    }
    .badge.badge-light-danger {
        background-color: rgba(255,91,92,.17);
        color: #FF5B5C!important;
    }
    .fonticon-wrap.mr-1 {
        width: 60px;
        float: left;
    }
    .wizard.vertical .steps {
        float: left;
        width: 30%;
    }
    .wizard .steps ul {
        display: table;
        width: 100%;
        table-layout: fixed;
        margin: 0;
        padding: 0;
    }
    .wizard .steps ul li {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .wizard.vertical .steps ul li.current {
        background: #F2F4F4;
        border-radius: .267rem;
    }
    .wizard.vertical .steps ul li {
        margin: 0 .5rem;
        display: block;
    }
    .wizard .steps ul li a {
        text-transform: uppercase;
        position: relative;
        padding-top: 3.46rem;
        margin-top: 1.33rem;
        margin-bottom: 1.33rem;
        display: block;
    }
    .wizard .steps ul li.current a {
        color: #5A8DEE;
        cursor: default;
    }
    .wizard.vertical .steps ul li a {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        text-align: left;
        margin: 0 .5rem;
        padding: 1rem;
        border-radius: .267rem;
    }
    .wizard .steps .current-info {
        display: none;
    }
    .wizard.vertical .steps ul li a .number {
        display: none;
    }
    .text-muted {
        color: #828D99!important;
    }
    .wizard.vertical .content {
        float: left;
        width: 70%;
        border-left: 1px solid #DFE3E7;
    }
    .wizard .content {
        padding: 0;
        margin: 0;
    }
    .wizard .actions ul li.disabled, .wizard .content .title {
        display: none;
    }
   
    .wizard.vertical .content .body {
        padding: 2.5%;
    }
    .wizard.vertical .actions {
        text-align: right;
    }

.wizard.vertical .actions ul {
    display: inline-block;
}
.wizard .actions ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.wizard .actions ul li {
    float: left;
}
    /* contacts */

    /* settings */
.wizard.vertical .steps ul li a i {
    font-size:40px;
    color: #d8c898;
}
#steps-uid-2 .d-block {
    color: #d8c898;
}
#steps-uid-2 ul li a{
    cursor: pointer;
}
 #kb-settingsaction ul li{
    float: inherit;
        display: inline;
}
    /* settings */

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
                    <option value="">Everyone</option>
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
                <p>Create a <a href="#">Twilio SMS Integration</a> first to customize outgoing text messages from
                    Keabuilder</p>
            </div>

        </div>
        <div class="offcanvas-overlay " v-if="poupsidebar" @click="hidepopupsidebar"></div>


        <header class="wizard-nav">
            <div class="wizard-steps">
                <!--begin::Wizard Step 1 Nav-->
                <div class="wizard-step" data-wizard-type="step"
                    :data-wizard-state="mainOpen == 'steps' ? 'current' : 'pending'" @click="kb_mainsteps('steps')">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-filter"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">My Funnel Name</div>
                            <div class="wizard-desc">Steps</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 1 Nav-->
                <!--begin::Wizard Step 2 Nav-->
                <div class="wizard-step" data-wizard-type="step"
                    :data-wizard-state="mainOpen == 'stats' ? 'current' : 'pending'" @click="kb_mainsteps('stats')">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="far fa-chart-bar"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">STATS</div>
                            <div class="wizard-desc">View Your Stats</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 2 Nav-->
                <!--begin::Wizard Step 3 Nav-->
                <div class="wizard-step" data-wizard-type="step"
                    :data-wizard-state="mainOpen == 'contacts' ? 'current' : 'pending'"
                    @click="kb_mainsteps('contacts')">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-users"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">CONTACTS</div>
                            <div class="wizard-desc">Check Your Contacts</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 3 Nav-->
                  <!--begin::Wizard Step 4 Nav-->
                <div class="wizard-step" data-wizard-type="step"
                    :data-wizard-state="mainOpen == 'sales' ? 'current' : 'pending'"
                    @click="kb_mainsteps('sales')">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-money-check-alt"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">SALES</div>
                            <div class="wizard-desc">See Your Sales</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 4 Nav-->
                <!--begin::Wizard Step 5 Nav-->
                <div class="wizard-step" data-wizard-type="step"
                    :data-wizard-state="mainOpen == 'settings' ? 'current' : 'pending'" @click="kb_mainsteps('settings')">
                    <div class="wizard-wrapper">
                        <div class="wizard-number"><i class="fas fa-sliders-h"></i></div>
                        <div class="wizard-label">
                            <div class="wizard-title">SETTINGS</div>
                            <div class="wizard-desc">Review Your Settings</div>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Step 5 Nav-->
              
            </div>
        </header>
        <div class="container-fluid">
            <div class="row whitefunnel loadEffect" v-if="mainOpen == 'steps'">
                <div class="col-md-3 pb-3 pt-3 rightbrder">
                    <button class="btn btn-primary mt-2 btn-block mb-3" @click="addsteps"><i class="fas fa-plus"></i>
                        Add A Step</button>
                    <draggable :steps="steps" :disabled="!enabled" class="steps-group" ghost-class="ghost"
                        @start="dragging = true" @end="draggingend">
                        <div class="kiabuilder-item" :class="tabOpen2 == element.id ? 'success' : ''"
                            @click="kb_substeps2(element.id)" v-for="element in steps" :key="element.id"
                            :data-listid="element.id">
                            <div class="keabuilder-title-board">
                                <span>{{ element.name }}</span>
                                <input type="text" v-model="element.name">
                            </div>

                            <i class="fas fa-grip-lines float-right mt-1"></i>
                            <div class="btn-group float-right mr-1">
                                <div class="cursor-pointer dropdownMenuButton" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <div class="dropdown-menu">
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
                    </draggable>

                </div>
                <!-- col -->
                <div class="col-md-9">
                    <div class="wizard-nav">
                        <div class="wizard-steps" id="secondwizard">
                            <div class="showwhendrag"><i class="fas fa-caret-down"></i></div>
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending"></div>
                            <div class="wizard-step" data-wizard-type="step"
                                :data-wizard-state="tabOpen == 'overview' ? 'current' : 'pending'"
                                @click="kb_substeps('overview')">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number"><i class="fas fa-th"></i></div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Overview</div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step"
                                :data-wizard-state="tabOpen == 'automation' ? 'current' : 'pending'"
                                @click="kb_substeps('automation')">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number"><i class="fas fa-bolt"></i></div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Automation</div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step"
                                :data-wizard-state="tabOpen == 'publishing' ? 'current' : 'pending'"
                                @click="kb_substeps('publishing')">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number"><i class="fas fa-wrench"></i></div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Publishing</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- templates -->
                        <div class="kb-templates loadEffectFromLeft" v-if="tabOpen == 'overview'">
                            <ul class="kb-temp-ul">
                                <li>
                                    <a href=""><i class="fas fa-envelope"></i> OPTIN <i
                                            class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href=""><i class="fas fa-envelope"></i> Email Optin</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-download"></i> Thank you</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-shopping-cart"></i> SALES <i
                                            class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href=""><i class="fas fa-search-dollar"></i> Sales Page</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-rocket"></i> Product Launch</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-shopping-cart"></i> Order Form</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-level-up-alt"></i> One Click Upsell (OTO)</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-level-down-alt"></i> One Click Downsell</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-check-circle"></i> Order Confirmation</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-microphone-alt"></i> WEBINAR <i
                                            class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href=""><i class="fas fa-mail-bulk"></i> Registration</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-download"></i> Thank you</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-microphone"></i> Boadcast Room</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-graduation-cap"></i> MEMBERSHIP <i
                                            class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href=""><i class="fas fa-sign-in-alt"></i> Membership Access</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fas fa-tachometer-alt"></i> Membership Area</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="fas fa-external-link-square-alt"></i> CLICKPOPUP</a></li>
                                <li><a href=""><i class="fas fa-bars"></i> OTHER</a></li>
                            </ul>

                            <ul class="kb-showtemplates">
                                <li>
                                    <a href=""><i class="fas fa-file-alt"></i> SHOW MY TEMPLATES</a>
                                </li>
                                <li>
                                    <a href="" class="active"><i class="fas fa-envelope"></i> EMAIL OPTIN TEMPLATES</a>
                                </li>
                            </ul>

                            <ul class="kb-alltemplates mb-5">
                                <li>
                                    <div class="kb-showtemp-header">
                                        <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="kb-showtemp-footer">
                                        <p>Step 1</p>
                                        <button class="btn btn-primary"><i class="fas fa-plus-square"></i> Select
                                            Template</button>
                                        <button class="btn btn-secondary"><i class="fas fa-eye"></i> Preview</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="kb-showtemp-header">
                                        <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="kb-showtemp-footer">
                                        <p>Blog Render</p>
                                        <button class="btn btn-primary"><i class="fas fa-plus-square"></i> Select
                                            Template</button>
                                        <button class="btn btn-secondary"><i class="fas fa-eye"></i> Preview</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="kb-showtemp-header">
                                        <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="kb-showtemp-footer">
                                        <p>Blog Render</p>
                                        <button class="btn btn-primary"><i class="fas fa-plus-square"></i> Select
                                            Template</button>
                                        <button class="btn btn-secondary"><i class="fas fa-eye"></i> Preview</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="kb-showtemp-header">
                                        <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="kb-showtemp-footer">
                                        <p>Clean leanding</p>
                                        <button class="btn btn-primary"><i class="fas fa-plus-square"></i> Select
                                            Template</button>
                                        <button class="btn btn-secondary"><i class="fas fa-eye"></i> Preview</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="kb-showtemp-header">
                                        <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="kb-showtemp-footer">
                                        <p>Big Sale</p>
                                        <button class="btn btn-primary"><i class="fas fa-plus-square"></i> Select
                                            Template</button>
                                        <button class="btn btn-secondary"><i class="fas fa-eye"></i> Preview</button>
                                    </div>
                                </li>
                            </ul>


                        </div>
                        <!-- templates -->

                        <div class="kb-overview loadEffectFromLeft" v-if="tabOpen == 'overviewstep'">
                            <div class="sage-input site_support_email mt-3">
                                <input class="sage-input__field" type="url" value="http://127.0.0.1:8000/optin"
                                    id="site_support_email">
                                <label class="sage-input__label" for="site_support_email">Your Link</label>
                                <span class="kb-settings-i"><i class="fas fa-cog"></i></span>
                                <span class="kb-sharelink"><i class="fas fa-external-link-alt"></i></span>
                            </div>

                            <div class="kb-insidebodycard row pb-5">
                                <div class="kb-insidecard col-md-4">
                                    <div class=" kb-internalshadow ">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2"
                                            role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Main</span>
                                                <i class="fas fa-history pr-2"></i>
                                                <small class="d-sm-block d-none">11 mins ago</small>
                                            </div>
                                            <div class="toast-body yesdeclarewinner">
                                                <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid"
                                                    alt="Kia Builder Logo">
                                                <div class="declarewinner">
                                                    <i class="fas fa-trophy"></i>
                                                    <a href="#">
                                                        Declare As winner
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="toast-header">
                                                <button class="btn btn-secondary btn-block mr-2"><i
                                                        class="fas fa-pen"></i> Edit Page</button>
                                                <button class="btn btn-secondary mr-2"><i
                                                        class="fas fa-external-link-alt"></i></button>
                                                <button class="btn btn-secondary "><i class="fas fa-cog"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kb-insidecard col-md-4 kb-internalshadow">
                                    <div class=" kb-internalshadow">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2"
                                            role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Split Test</span>
                                                <i class="fas fa-bolt mr-2"></i>
                                                <small class="d-sm-block d-none">Optmize your lead</small>
                                            </div>
                                            <div class="toast-body">
                                                <div class="progress progress-bar-success progress-sm"
                                                    style="display:flex;">
                                                    <div class="progress-bar" id="kb-changemyprogress"
                                                        role="progressbar" aria-valuenow="79" aria-valuemin="101"
                                                        aria-valuemax="100" style="width: 50%;"></div>
                                                </div>
                                                <input type="range" min="0" max="100" value="50" id="kb-splittestmake"
                                                    @change="totalmy">
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
                                                    <p>You've changed your split test, which will invalidate any
                                                        previous results. Please confirm that you'd like to apply these
                                                        changes and start the test over</p>
                                                    <button class="btn btn-primary">Apply Changes</button>
                                                </div>

                                            </div>
                                            <div class="kb-split-text pl-2 pr-2" style="display:none;">
                                                <div class="btn-block mb-3">
                                                    <div class="svgimg3">
                                                        <svg version="1.1" id="Layer_1" class="animation"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                                                            xml:space="preserve">
                                                            <path fill="#333333" d="M48,67.6c0,0.8-0.6,1.4-1.4,1.4H31.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h15.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V67.6z" />
                                                            <path fill="none" stroke="#333333" stroke-width="2"
                                                                stroke-miterlimit="10"
                                                                d="M50.6,34h10c2.6,0,4.4,1.9,4.4,4.5v16.3
                                                            c0,3.2,1.1,6.4,2.7,9.1l1.2,1.8l13.3,23.1c2.5,4.4-0.6,10.2-5.6,10.2H50.6H24.3c-5,0-8.2-5.8-5.7-10.2l12.9-22.9l0.8-2.2
                                                            c1.3-2.5,1.7-5.4,1.7-8.2v-17c0-2.6,2.7-4.5,5.4-4.5h11.1H50.6z" />
                                                            <path fill="#333333" d="M44,78.6c0,0.8-0.6,1.4-1.4,1.4H25.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h17.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V78.6z" />
                                                            <path fill="#333333" d="M39,88.6c0,0.8-0.6,1.4-1.4,1.4H20.4c-0.8,0-1.4-0.6-1.4-1.4v-0.1c0-0.8,0.6-1.4,1.4-1.4h17.1
                                                            c0.8,0,1.4,0.6,1.4,1.4V88.6z" />
                                                            <path fill="#333333" d="M69.7,35.5c0,1.5-1.3,2.5-2.9,2.5H32.3c-1.6,0-2.9-1-2.9-2.5l0,0c0-1.5,1.3-2.5,2.9-2.5h34.4
                                                            C68.4,33,69.7,34,69.7,35.5L69.7,35.5z" />
                                                            <circle id="Bubble-1" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="53.5"
                                                                cy="51" r="2.4" />
                                                            <circle id="Bubble-2" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="42.8"
                                                                cy="48.9" r="4.9" />
                                                            <circle id="Bubble-3" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="56"
                                                                cy="45.4" r="6" />
                                                            <circle id="Bubble-4" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="42.1"
                                                                cy="38.6" r="3.2" />
                                                            <circle id="Bubble-5" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="46.5"
                                                                cy="47" r="2.4" />
                                                            <circle id="Bubble-6" fill="none" stroke="#333333"
                                                                stroke-width="1.5268" stroke-miterlimit="10" cx="52.8"
                                                                cy="38.9" r="4.9" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <center>
                                                    <p>Start Split Test</p>
                                                </center>
                                                <button class="btn btn-secondary m-auto btn-block"
                                                    @click="showvariation"><i class="fas fa-plus"></i> Create
                                                    Variation</button>

                                                <div v-if="createvariation">
                                                    <div class="kb-createvar">
                                                        <button class="btn btn-secondary m-auto btn-block"><i
                                                                class="fas fa-plus"></i> Duplicate Variation 1</button>
                                                        <br>
                                                        <button class="btn btn-secondary m-auto btn-block mt-2"><i
                                                                class="fas fa-plus"></i> Create from Templates</button>
                                                    </div>
                                                    <div class="kb-bxoverlay" @click="hidevariation"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="kb-insidecard col-md-4 kb-internalshadow">
                                    <div class=" kb-internalshadow">
                                        <div class="toast toast-light toast-translucent mr-auto ml-auto pt-2 pb-2"
                                            role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <span class="mr-auto toast-title">Variation</span>
                                                <i class="fas fa-history pr-2"></i>
                                                <small class="d-sm-block d-none">1 mins ago</small>
                                            </div>
                                            <div class="toast-body yesdeclarewinner">
                                                <img src="/images/funnelpreviewimg/preview1.jpg" class="img-fluid"
                                                    alt="Kia Builder Logo">
                                                <div class="declarewinner kb-red">
                                                    <i class="fas fa-trophy"></i>
                                                    <a href="#">
                                                        Declare As winner
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="toast-header">
                                                <button class="btn btn-secondary btn-block mr-2"><i
                                                        class="fas fa-pen"></i> Edit Page</button>
                                                <button class="btn btn-secondary mr-2"><i
                                                        class="fas fa-external-link-alt"></i></button>
                                                <button class="btn btn-secondary "><i class="fas fa-cog"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-wizard-kb mb-5">
                                <button class="btn btn-secondary"><i class="fas fa-times"></i> Remove From
                                    Funnel</button>
                                <button class="btn btn-secondary"><i class="far fa-trash-alt"></i> Delete Funnel
                                    Step</button>
                                <button class="btn btn-secondary"><i class="far fa-clone"></i> Clone Funnel
                                    Step</button>
                            </div>
                        </div>
                        <!-- overview end -->

                        <div class="kb-automation mt-4 pb-5 loadEffect" v-if="tabOpen == 'automation'">
                            <div class="kb-automation-header">

                            </div>
                            <div class="kb-automation-footer text-center">
                                <button class="btn btn-secondary" @click="automation_show('action')"><i
                                        class="fas fa-plus"></i> Add New Action</button>
                                <button class="btn btn-secondary" @click="automation_show('email')"><i
                                        class="fas fa-plus"></i> Add New Email</button>
                                <button class="btn btn-secondary" @click="automation_show('sms')"><i
                                        class="fas fa-plus"></i> Add New Sms Text</button>
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
            <!-- row 1 end / for steps -->

            <div class="row whitefunnel pt-5 pb-5 loadEffect" v-if="mainOpen == 'stats'">
                <div class="col-md-6">
                    <apexchart width="500" type="bar" :options="options" :series="series"></apexchart>
                </div>
                <div class="col-md-6">
                    <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                </div>
                <div class="col-md-6">
                    <apexchart type="heatmap" height="350" :options="chartOptions2" :series="series2"></apexchart>
                </div>
                <div class="col-md-6">
                    <apexchart type="line" height="350" :options="chartOptions3" :series="series3"></apexchart>
                </div>

            </div>
            <!-- row 2 end / for stats -->

            <div class="row whitefunnel pt-5 pb-5 loadEffect" v-if="mainOpen == 'contacts'">
                <div class="col-md-12">
                    <section class="users-list-wrapper" id='table-userslist'>
                        <div class="users-list-filter px-1">
                            <form>
                                <div class="row border rounded py-2 mb-2">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-verified">Showing Contacts for</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-verified">
                                                <option value="Yes">Last 7 Days</option>
                                                <option value="" selected>Last 30 Days</option>
                                                <option value="Yes">Last 2 Months</option>
                                                <option value="No">This Year</option>
                                                <option value="No">All Time</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-role">Steps</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-role">
                                                <option value="">All Funnel Steps</option>
                                                <optgroup label="Funnel Steps">
                                                    <option value="User">Optin</option>
                                                    <option value="Staff">Thank you</option>
                                                </optgroup>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2"><i
                                                class="far fa-check-circle"></i> Apply</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2"><i
                                                class="fas fa-download"></i> Download Contacts</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="users-list-table">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <div id="users-list-datatable_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="users-list-datatable_length">
                                                        <label>Show <select name="users-list-datatable_length"
                                                                aria-controls="users-list-datatable"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="users-list-datatable_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder="Search By Product"
                                                                aria-controls="users-list-datatable"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="users-list-datatable" class="table dataTable no-footer"
                                                        role="grid" aria-describedby="users-list-datatable_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="username: activate to sort column ascending"
                                                                    style="width: 110.325px;">Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="name: activate to sort column ascending"
                                                                    style="width: 158.062px;">Email</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="last activity: activate to sort column ascending"
                                                                    style="width: 112.725px;">Sign Up</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                    aria-label="edit" style="width: 38.1px;">edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td><a href="">Dean Stanley</a>
                                                                </td>
                                                                <td>DeanStanley@gmail.com</td>
                                                                <td>30/04/2019</td>
                                                                <td><a href=""><i class="fas fa-user-edit"></i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                        role="status" aria-live="polite">Showing 1 to 10 of 36 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="users-list-datatable_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="users-list-datatable_previous"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="users-list-datatable_next"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- row 3 end / for contacts -->

            <div class="row whitefunnel pt-5 pb-5 loadEffect" v-if="mainOpen == 'sales'">
                <div class="col-md-12">
                    <section class="users-list-wrapper" id='table-userslist'>
                        <div class="users-list-filter px-1">
                            <form>
                                <div class="row border rounded py-2 mb-2">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-verified">Showing Contacts for</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-verified">
                                                <option value="Yes">Last 7 Days</option>
                                                <option value="" selected>Last 30 Days</option>
                                                <option value="Yes">Last 2 Months</option>
                                                <option value="No">This Year</option>
                                                <option value="No">All Time</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="users-list-role">Steps</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="users-list-role">
                                                <option value="">All Funnel Steps</option>
                                                <optgroup label="Funnel Steps">
                                                    <option value="User">Optin</option>
                                                    <option value="Staff">Thank you</option>
                                                </optgroup>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2"><i
                                                class="far fa-check-circle"></i> Apply</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                        <button type="reset"
                                            class="btn btn-primary btn-block glow users-list-clear mt-2">
                                            <i class="far fa-file-excel"></i> Export to CSV</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="users-list-table">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <div id="users-list-datatable_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="users-list-datatable_length">
                                                        <label>Show <select name="users-list-datatable_length"
                                                                aria-controls="users-list-datatable"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="users-list-datatable_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder="Search By Product"
                                                                aria-controls="users-list-datatable"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="users-list-datatable" class="table dataTable no-footer"
                                                        role="grid" aria-describedby="users-list-datatable_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="username: activate to sort column ascending"
                                                                    style="width: 110.325px;">Product</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="name: activate to sort column ascending"
                                                                    style="width: 158.062px;">Amount</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="users-list-datatable" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="last activity: activate to sort column ascending"
                                                                    style="width: 112.725px;">Customer</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                    aria-label="edit" style="width: 38.1px;">Status</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                aria-label="edit" style="width: 38.1px;">Transition</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                aria-label="edit" style="width: 38.1px;">View Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td>Optin</td>
                                                                <td>$12.00</td>
                                                                <td><a href="">DeanStanley@gmail.com</a></td>
                                                                <td><span class="badge badge-light-success">Active</span></td>
                                                                <td>2 Days Ago</td>
                                                                <td><a href=""><i class="fas fa-pencil-alt"></i> Details</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                        role="status" aria-live="polite">Showing 1 to 10 of 36 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="users-list-datatable_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="users-list-datatable_previous"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="users-list-datatable_next"><a href="#"
                                                                    aria-controls="users-list-datatable" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- row 4 end / for sales -->

            <div  class="row whitefunnel pt-5 pb-5 loadEffect" v-if="mainOpen == 'settings'">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" class="wizard-vertical wizard clearfix vertical"
                                id="steps-uid-2">
                                <div class="steps clearfix">
                                    <ul>
                                        <li class="first" :class="tabOpen3 == 'basic' ? 'current' : ''">
                                            <a @click="kb_settingsteps('basic')">
                                                <span class="fonticon-wrap mr-1">
                                                    <i class="fas fa-cog"></i>
                                                </span>
                                                <span class="icon-title">
                                                    <span class="d-block">Basic Details</span>
                                                    <small class="text-muted">Setup your details here.</small>
                                                </span>
                                            </a></li>
                                        <li :class="tabOpen3 == 'smtp' ? 'current' : ''"><a
                                                 @click="kb_settingsteps('smtp')">
                                                <span class="fonticon-wrap mr-1">
                                                    <i class="fas fa-mail-bulk"></i>
                                                </span>
                                                <span class="icon-title">
                                                    <span class="d-block">SMTP Configuation</span>
                                                    <small class="text-muted">Your SMTP Details here.</small>
                                                </span>
                                            </a></li>
                                        <li :class="tabOpen3 == 'tracking' ? 'current' : ''"><a
                                                @click="kb_settingsteps('tracking')">
                                                <span class="fonticon-wrap mr-1">
                                                   <i class="fas fa-code"></i>
                                                </span>
                                                <span class="icon-title">
                                                    <span class="d-block">Tracking</span>
                                                    <small class="text-muted">Your tracking code details.</small>
                                                </span>
                                            </a></li>
                                        <li :class="tabOpen3 == 'payment' ? 'current' : ''"><a
                                                 @click="kb_settingsteps('payment')">
                                                <span class="fonticon-wrap mr-1">
                                                    <i class="fas fa-money-check-alt"></i>
                                                </span>
                                                <span class="icon-title">
                                                    <span class="d-block">Payment</span>
                                                    <small class="text-muted">Payment integration.</small>
                                                </span>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="content clearfix">
                                    <!-- step 1 content -->
                                    <fieldset class="pt-0 body loadEffect " v-if="tabOpen3 == 'basic'" id="steps-uid-2-p-0" role="tabpanel"
                                        aria-labelledby="steps-uid-2-h-0" aria-hidden="false" style="">
                                        <h6 class="pb-50">Edit Settings For This Funnel</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstName12">Name </label>
                                                    <input type="text" class="form-control" id="firstName12"
                                                        placeholder="Funnel Name">
                                                    <small class="text-muted form-text">Name of this funnel</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstName12">Tags </label>
                                                    <input type="text" class="form-control" id="firstName12"
                                                        placeholder="Group Tags">
                                                    <small class="text-muted form-text">The group this funnel belongs too</small>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="emailAddress12">Domain</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value=""></option>
                                                    </select>
                                                    <small class="text-muted form-text">The domain for the funnel — <a href="#">Add/Edit Domains</a></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Path</label>
                                                    <input type="text" class="form-control" placeholder="optin">
                                                    <small class="text-muted form-text">The path of this funnels starting page</small>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Favicon Url</label>
                                                        <input type="text" class="form-control" placeholder="https://this.com/this.png">
                                                    <small class="text-muted form-text">Add a URL to your .png or .ico favicon image. For ALL your pages inside your funnel.</small>
                                                </div>
                                            </div>
                                         </div>
                                    </fieldset>
                                    <!-- step 1 content end-->
                                    <!-- step 2 content -->
                                    <fieldset class="pt-0 body loadEffect"  v-if="tabOpen3 == 'smtp'" id="steps-uid-2-p-1" role="tabpanel"
                                        aria-labelledby="steps-uid-2-h-1" aria-hidden="true">
                                        <h6 class="py-50">Edit Settings For This Funnel</h6>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="proposalTitle1"><a>SMTP Configuation</a></label>
                                                        <small>Provide your <a>Account SMTP Settings</a> to customize outgoing emails from Clickfunnels</small>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- step 2 content end-->
                                    <!-- step 3 content -->
                                    <fieldset class="pt-0 body loadEffect"  v-if="tabOpen3 == 'tracking'" id="steps-uid-2-p-2" role="tabpanel"
                                        aria-labelledby="steps-uid-2-h-2" aria-hidden="true" >
                                        <h6 class="py-50">Edit Settings For This Funnel</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Head Tracking Code:</label>
                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                    <small>Funnel wide tracking code for the head tag.</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="eventLocation12">Body Tracking Code:</label>
                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                    <small>Funnel wide tracking codes for the body tag.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- step 3 content end-->
                                    <!-- step 4 content -->
                                    <fieldset class="pt-0 body loadEffect"  v-if="tabOpen3 == 'payment'" id="steps-uid-2-p-3" role="tabpanel"
                                        aria-labelledby="steps-uid-2-h-3" aria-hidden="true" >
                                        <h6 class="py-50">Edit Settings For This Funnel</h6>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="eventName13">Stripe Account</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Stripe</option>
                                                    </select>
                                                    <label for="">Test Mode</label>

                                                    <small>Enable Test Mode for Stripe. Use CC number: 4012888888881881 with any future Exp date and CVV number. Note: To test subscriptions, you MUST have subscription plans with the same ID in Stripe in Test mode and Live mode. In test mode disc delivered will not operate.</small>
                                                    <br>

                                                    <small>
                                                        <a >Edit Stripe Details</a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- step 4 content end-->
                                </div>
                                <div class="actions clearfix" id="kb-settingsaction">
                                    <ul role="menu">
                                        <li><a class="btn btn-secondary"><i class="fas fa-archive"></i> Archive Funnel</a></li>

                                        <li ><a class="btn btn-secondary"><i class="fas fa-binoculars"></i> View Archive Funnel Steps</a></li>
                                    <li style="margin-right:50px;"><a href=""></a></li>

                                        <li ><a class="btn btn-primary"><i class="far fa-check-circle"></i> Update Settings</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row 5 end / for settings -->


        </div>
        <!-- container -->
    </div>
</template>
<script>
    let id = 2;
    export default {
        data() {
            return {
                createvariation: false,
                automationaddnewaction: true,
                automationaddnewemail: false,
                automationaddnewtext: false,
                poupsidebar: false,
                mainOpen: 'steps',
                tabOpen: 'overview',
                tabOpen2: 0,
                tabOpen3: 'basic',
                enabled: true,
                steps: [{
                        name: "Optin",
                        id: 0
                    },
                    {
                        name: "Thank you",
                        id: 1
                    },
                ],
                dragging: false,
                // chart start
                options: {
                    chart: {
                        id: 'vuechart-example'
                    },
                    xaxis: {
                        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                    }
                },
                series: [{
                    name: 'series-1',
                    data: [30, 40, 45, 50, 49, 60, 70, 91]
                }],
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                //   line chart
                chartOptions: {
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: 'Earning by Month',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    }
                },
                // heat map
                series2: [{
                        name: 'Jan',
                        data: [-30, 55]
                    },
                    {
                        name: 'Feb',
                        data: [80, 15]
                    },
                    {
                        name: 'Mar',
                        data: [-10, 15]
                    },
                    {
                        name: 'Apr',
                        data: [30, -15]
                    },
                    {
                        name: 'May',
                        data: [-130, 15]
                    }, {
                        name: 'June',
                        data: [70, 15]
                    }, {
                        name: 'July',
                        data: [30, 45]
                    }, {
                        name: 'Aug',
                        data: [50, 15]
                    },
                    {
                        name: 'Sep',
                        data: [-30, 15]
                    }
                ],
                chartOptions2: {
                    chart: {
                        height: 350,
                        type: 'heatmap',
                    },
                    plotOptions: {
                        heatmap: {
                            shadeIntensity: 0.5,
                            radius: 0,
                            useFillColorAsStroke: true,
                            colorScale: {
                                ranges: [{
                                        from: -30,
                                        to: 5,
                                        name: 'low',
                                        color: '#00A100'
                                    },
                                    {
                                        from: 6,
                                        to: 20,
                                        name: 'medium',
                                        color: '#128FD9'
                                    },
                                    {
                                        from: 21,
                                        to: 45,
                                        name: 'high',
                                        color: '#FFB200'
                                    },
                                    {
                                        from: 46,
                                        to: 55,
                                        name: 'extreme',
                                        color: '#FF0000'
                                    }
                                ]
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 1
                    },
                    title: {
                        text: 'Product HeatMap'
                    },
                },
                // Line Column Area
                series3: [{
                    name: 'TEAM A',
                    type: 'column',
                    data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
                }, {
                    name: 'TEAM B',
                    type: 'area',
                    data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                }, {
                    name: 'TEAM C',
                    type: 'line',
                    data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
                }],
                chartOptions3: {
                    chart: {
                        height: 350,
                        type: 'line',
                        stacked: false,
                    },
                    stroke: {
                        width: [0, 2, 5],
                        curve: 'smooth'
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '50%'
                        }
                    },

                    fill: {
                        opacity: [0.85, 0.25, 1],
                        gradient: {
                            inverseColors: false,
                            shade: 'light',
                            type: "vertical",
                            opacityFrom: 0.85,
                            opacityTo: 0.55,
                            stops: [0, 100, 100, 100]
                        }
                    },
                    labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003',
                        '07/01/2003',
                        '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
                    ],
                    markers: {
                        size: 0
                    },
                    xaxis: {
                        type: 'datetime'
                    },
                    yaxis: {
                        title: {
                            text: 'Points',
                        },
                        min: 0
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        y: {
                            formatter: function (y) {
                                if (typeof y !== "undefined") {
                                    return y.toFixed(0) + " points";
                                }
                                return y;

                            }
                        }
                    }
                },


            }
        },
        computed: {

        },
        methods: {
            showvariation() {
                this.createvariation = true;
            },
            hidevariation() {
                this.createvariation = false;
            },
            totalmy() {
                var thsvalue = document.getElementById('kb-splittestmake').value;
                document.getElementById('kb-changemyprogress').style.width = thsvalue + '%';

                document.getElementById('kb-control').innerHTML = thsvalue + '%';
                document.getElementById('kb-variation').innerHTML = (100 - thsvalue) + '%';

            },
            automation_show(value) {
                if (value == 'action') {
                    this.automationaddnewaction = true;
                    this.automationaddnewemail = false;
                    this.automationaddnewtext = false;
                } else if (value == 'email') {
                    this.automationaddnewaction = false;
                    this.automationaddnewemail = true;
                    this.automationaddnewtext = false;
                } else if (value == 'sms') {
                    this.automationaddnewaction = false;
                    this.automationaddnewemail = false;
                    this.automationaddnewtext = true;
                }
                this.poupsidebar = true;
            },
            hidepopupsidebar() {
                this.poupsidebar = false;
            },
            kb_mainsteps(value) {
                this.mainOpen = value;
            },
            kb_substeps(value) {
                this.tabOpen = value;
            },
            kb_substeps2(value) {
                this.tabOpen2 = value;
            },
             kb_settingsteps(value) {
                this.tabOpen3 = value;
            },
            addsteps() {
                this.steps.push({
                    name: "New Step ",
                    id: id++
                });
            },
            draggingend(e) {
                this.dragging = false;
            },



        },

    }

</script>
