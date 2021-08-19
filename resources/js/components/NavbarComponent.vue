<template>
    <nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Build With</a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item pr-2 active"><router-link :to="'/'">Dashboard</router-link></li>
            <li class="nav-item pr-2"><router-link :to="{name: 'spapageone'}">Spa Page One</router-link></li>
            <li class="nav-item pr-2"><router-link :to="{name: 'spapagetwo'}">Spa Page Two</router-link></li>
        </ul>
    </div>
    </nav>
</template>
