<template>
<div>
    <!-- <drag-drop
      :dropzones="dropGroups"
      :dropzonesTitle="'XYZ Company Teams'"
      :originalData="stories"
      :originalTitle="'Tasks to be distributed'"
      :inPlace="true"
      :enableSave="true"
      :enableCancel="true"
      @dropInOriginalBucket="originalBucketDropEvent"
      @dropInDestinationBucket="destinationBucketDropEvent"
      @save="save"
      @cancel="cancel"
    >
      <template #dd-card="{ cardData }">
        <custom-card
          :data="cardData"
          @done="doneMarked"
        />
      </template>
    </drag-drop> -->
    <drag-drop :dropzones="dropGroups" :dropzonesTitle="'XYZ Company Teams'" :originalData="stories" :originalTitle="'Tasks to be distributed'"/>
      <div class="cc-card">
    <h3>{{data.title}}</h3>
    <p>
      {{data.description}}
    </p>
    <button v-if="!data.done" class="cc-btn" @click="markDone()">
      Mark Done
    </button>
  </div>
</div>
</template>

<script>

export default {
  data() {
    return {
      stories: [
        {
          title: 'Strategy 101',
          description: 'Create a draft of business plan',
          time: '3 days',
          done: false
        },
        {
          title: 'Strategy 102',
          description: 'Finalize the plan',
          time: '4 days',
          done: false
        },
        {
          title: 'Tech diagram',
          description: 'Draw the tech data',
          time: '4 days',
          done: false
        },
        {
          title: 'Place Holder',
          description: 'Data Science Team',
          time: '5 days',
          done: false
        }
      ],

      dropGroups: [
        {
          name: 'Business Team',
          children: []
        },
        {
          name: 'Tech Dept',
          children: []
        },
        {
          name: 'Marketing Dept',
          children: []
        }
      ]
    }
  },
    props: ['data'],
    methods: {
    markDone() {
      this.$emit('done', this.data);
    }
  }
}
</script>