
<template>
    <div>
        <mq-layout mq="lg">
            <span> Display on lg </span>
        </mq-layout>
        <div v-if="$mq === 'sm'">I am small</div>
        <div v-else-if="$mq === 'lg'">I am large</div>
        <div v-else>I am medium edit me</div>
    </div>
</template>