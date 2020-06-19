<template>
    <div>
        <span class="text-muted">{{postDate}}</span>
        <div class="media mt-2">
            <a :href="user.url" class="pr-2">
                <img :src="user.avatar" alt="">
            </a>
            <div class="media_body mt-1">
            <a :href="user.url" >user.name</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['model','label'],
    computed: {
        postDate() {
            return this.label + " "+this.model.created_date;
        },
        data() {
            console.log("===> MODEL: %o",this.model)
            return {
                user: this.model.user
            }
        }/*
        ,
        user_url(){
          return this.model.user.url
        }*/
    },
}
</script>