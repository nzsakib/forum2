<template>
    <div :id="'reply-' + data.id" class="card">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a :href="'/profile/'+ data.owner.name" class="flex" v-text="data.owner.name"></a> 
                     said {{ data.created_at }}...
                </h5>
                
                
                <favorite :reply="data" v-if="signedIn"></favorite>
                
            </div>
            
        </div>
    
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                
                <button class="btn btn-sm btn-primary" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        </div>
    
        
        <div class="card-footer level" v-if="canUpdate">
            <button class="btn btn-primary btn-sm mr-1" @click="editing = true">Edit</button>
            <button class="btn btn-danger btn-sm" @click="destroy">Delete</button>
            
        </div>
    
    </div>
</template>

<script>
import Favorite from './Favorite';

export default {
    props: ['data'],

    components: {
        Favorite
    },

    data() {
        return {
            editing: false,
            body: this.data.body
        };
    },
    computed: {
        signedIn() {
            return window.App.signedIn;
        },
        canUpdate() {
            return this.authorize(user => user.id == this.data.user_id);
        }
    },

    methods: {
        update() {
            axios.patch('/replies/' + this.data.id, {
                body: this.body
            }).then(response => {
                this.editing = false;
                flash('Updated.');
            });
        },
        destroy() {
            axios.delete('/replies/' + this.data.id)
                .then(response => {
                    this.$emit('deleted', this.data.id);
                
                    flash("Your reply has been deleted.");
                });
        },
    }
}
</script>
