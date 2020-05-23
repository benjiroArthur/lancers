<template>
    <div>
        <h3 class="text-white">Contact Us</h3>
        <form>
            <input v-model="form.email" class="form-control contact-input" type="text" name="email" id="email" placeholder="Enter Your Email" required>
            <textarea v-model="form.message" class="form-control mt-2 contact-input" type="text" name="message" id="message" placeholder="Your Message Here" cols="4" required></textarea>
            <button class="contact-button btn bg-lancer mt-3" type="submit" @click.prevent="send">Send</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "ContactUs",
        data(){
            return{
                form: new Form({
                    email: '',
                    message: ''
                }),
            }
        },
        methods:{
            send(){
                Swal.fire(
                    'Success',
                    'Thank You For Contacting Us',
                    'success'
                )
                this.form.reset();
            }
        },
    }
</script>

<style lang="scss" scoped>
.contact-input {
    border-radius: 0;
}
    .contact-button{
        border: 2px solid white;
        color: white;
    }
</style>
