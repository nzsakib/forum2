<script>
import Favorite from './Favorite';

export default {
    props: ['attributes'],

    components: {
        Favorite
    },
    data() {
        return {
            editing: false,
            body: this.attributes.body
        };
    },
    methods: {
        update() {
            axios.patch('/replies/' + this.attributes.id, {
                body: this.body
            }).then(response => {
                this.editing = false;
                flash('Updated.');
            });
        },
        destroy() {
            axios.delete('/replies/' + this.attributes.id)
                .then(response => {
                    $(this.$el).fadeOut(300, () => {
                        flash("Your reply has been deleted.");
                    });
                });
        }
    }
}
</script>
