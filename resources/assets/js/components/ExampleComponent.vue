<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="m in messages">
                                {{m}}
                            </li>
                        </ul>
                        <div class="form-group">
                            <input type="text" v-model="message" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" @click="send()">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                message: null,
                messages: []
            }
        },
        methods: {
            send(){
                axios.post('/message/send', {
                    message: this.message
                }).then(res => {
                    console.log(res)
                }).then(res => {
                    console.log(res)
                })
            }
        },
        mounted() {
            Echo.channel('chat')
            .listen('Event', (e) => {
                console.log(e)
                this.messages.push(e.message)
            });
            console.log('Component mounted.')
        }
    }
</script>
