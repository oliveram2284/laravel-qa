Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@oliveram2284 
tutsprime
/
laravel-qa
19
76
99
Code
Issues
1
Pull requests
3
Actions
Projects
Wiki
Security
Insights
laravel-qa/resources/assets/js/components/UserInfo.vue
@tutsprime
tutsprime Create a basic Vue.js component
Latest commit efe14dd on 25 Aug 2018
 History
 1 contributor
31 lines (28 sloc)  647 Bytes
  
<template>
    <div>
        <span class="text-muted">{{ postDate }}</span>
        <div class="media mt-2">
            <a :href="user.url" class="pr-2">
                <img :src="user.avatar">
            </a>
            <div class="media-body mt-1">
                <a :href="user.url">{{ user.name }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['model', 'label'],
    computed: {
        postDate () {
            return this.label + " " + this.model.created_date;
        }        
    },
    data () {
        return {
            user: this.model.user
        }
    }
}
</script>
