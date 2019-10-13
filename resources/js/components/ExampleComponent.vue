<template>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <button 
             class="btn-indigo" 
             @click="show = !show">
                 Show
            </button>
        </div>
        <br><br>
        <transition name="fade">
            <div class="btn-indigo" v-if="show">
                Howdy! How cool is VueJS ?
            </div>
        </transition>
    </div>
</template>
<script>
    export default {
        data(){
            return { show : false }
        }
    }
</script>
<style>
    .fade-enter{
        opacity: 0;
    }
    .fade-enter-active{
        transition: opacity 1s;
    }
    .fade-leave{
        /* opacity: 1; */
    }
    .fade-leave-active{
        transition: opacity 1s;
        opacity: 0;
    }
</style> 