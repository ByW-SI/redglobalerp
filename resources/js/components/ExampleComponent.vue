<template>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div>
        <select v-model="select">
            <option v-for="item in options" :value="item.value">{{ item.text }}</option>
        </select>

        <div class="mt-3">Selected: <strong>{{ select }}</strong></div>
        <h1>{{ animal.data.selectServicio.value }}</h1>
    </div>
</template>

<script>
    export default {
        props: ['animal'],
        data() {
            return {
                select: null,
                options: [
                    { value: null, text: '-- Please select an option --'},
                    { value: 'A', text: 'Option A (from options prop)' },
                    { value: 'B', text: 'Option B (from options prop)' },
                    { value: 'C', text: 'Option C (from options prop)' },
                    { value: 'D', text: 'Option D (from options prop)' }
                ]
            }
        },
        watch:{
            animal: {
              handler: function (val, oldVal) {
                console.log(animal.data.selectServicio.value);
              }
            }   
        },
        methods:{
            mostrar(){
                console.log('Hola')
            },

        },
        mounted() {
            console.log('Component mounted. Example');
        }
  };
</script>
