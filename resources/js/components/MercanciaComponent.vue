<template>
    <div>
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    <h4 class="title"><i class="fas fa-boxes"></i> Mercancias:</h4>
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <button class="btn btn-secondary" type="button" @click="nuevoProducto()"><i class="fas fa-plus"></i> Nueva Mercancia</button>
                </div>
            </div>
        </div>
        <div class="card" v-for="(mercancia, index) in mercancias">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        <h5>
                            <i class="fas fa-box"></i> Mercancia {{index+1}}:{{ tipo }}
                        </h5>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerProducto(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="form-row form-group">
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Datos generales de la mercancia:
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Nombre de la mercancia:
                        </label>
                        <input type="text" :name="'nombre['+index+']'" class="form-control" v-model="mercancia.nombre" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Naturaleza del producto/Commodity:
                        </label>
                        <select class="form-control" id="naturaleza" :name="'naturaleza['+index+']'" v-model="mercancia.naturaleza" required>
                            <option value="">Seleccione una opción</option>                            
                            <option v-for="commodity in commodities" :value="commodity.nombre" :title="commodity.descripcion">{{commodity.nombre}}</option>
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dimensiones y peso de la mercancia
                        </h4>
                    </div>
                    <div class="col-6">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Volumen:
                        </label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="largo" aria-label="profundo" :name="'profundo['+index+']'" v-model="mercancia.profundo" aria-describedby="x-addon2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon2">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="ancho" aria-label="ancho" :name="'ancho['+index+']'" v-model="mercancia.ancho" aria-describedby="x-addon2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon1">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control volumen-alto" placeholder="alto" aria-label="alto" :name="'alto['+index+']'" v-model="mercancia.alto" aria-describedby="x-addon1">
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Unidad Volumen:
                        </label>
                        <select class="form-control volumen-unidad" :name="'medidas['+index+']'" v-model="mercancia.medidas" required>
                            <option value="">Seleccione la unidad de medida</option>
                            <!-- <option value="km">Kilómetro</option>
                            <option value="hm">Hectómetro</option>
                            <option value="dam">Decámetro</option> -->
                            <option value="m">Metro</option>
                            <!-- <option value="dm">Decimetro</option> -->
                            <option value="cm">Centimetro</option>
                            <option value="mm">Milímetro</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Peso Bruto:
                        </label>
                        <input type="number" step="0.01" min="0.01" class="form-control" :name="'peso_br['+index+']'" v-model="mercancia.peso_br" required>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Unidad Peso:
                        </label>
                        <select class="form-control mb-3" :name="'medida_peso['+index+']'" v-model="mercancia.medida_peso" required>
                            <option value="">Seleccione la unidad de medida</option>
                            <option value="kg">Kilógramo</option>
                            <option value="hg">Hectógramo</option>
                            <option value="dag">Decágramo</option>
                            <option value="g">Gramo</option>
                            <option value="dg">Decigramo</option>
                            <option value="cg">Centigramo</option>
                            <option value="mg">Milígramo</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Número de bultos:
                        </label>
                        <input type="number" step="0.1" min="0.1" class="form-control" :name="'bultos['+index+']'" v-model="mercancia.bultos" required>
                    </div>
                    <div class="col-2">
                        <label><i class="fas fa-asterisk"></i> Peso Total:</label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.1" min="0.1"  class="form-control" :name="'peso_total['+index+']'" v-model="mercancia.peso_total" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{mercancia.medida_peso}}</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <label><i class="fas fa-asterisk"></i> Volumen Total:</label>
                        <div class="input-group mb-3">
                             <input type="number" step="0.1" min="0.1"  class="form-control" :name="'volumen_total['+index+']'" v-model="mercancia.volumen_total"  aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{mercancia.medidas == "" ? mercancia.medidas : mercancia.medidas+"³" }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Observaciones de la mercancia
                        </h4>
                    </div>
                    <div class="col-12">
                        <label>Observaciones:</label>
                        <textarea class="form-control" :name="'observaciones['+index+']'" v-model="mercancia.observaciones"></textarea>
                    </div>
                </div>

            </div>
            <servicios-component :index_mercancia="index"></servicios-component>
        </div>
    </div>
    </div>
</template>

<script>
    $(document).ready(function($) {
       console.log('Hola-M');
        $('#tipo_servicio').change(function(event) {
            console.log('Cambio');
            console.log($('input:radio[name=es_estibable]:checked'));
            cambiarAltoVolumen($('input:radio[name=es_estibable]:checked'));
               
        });
        $('input[name=es_estibable]').click(function(event) {
            cambiarAltoVolumen(this);
        });

        function cambiarAltoVolumen(radio) {
            let servicio = $('#tipo_servicio option:selected').val();
            console.log($(radio).val());
            if($(radio).val() == 0){
                if(servicio == 'Terrestre FTL' || servicio == 'Terrestre LTL'){
                    $('input.volumen-alto').each(function(index, el) {
                        $(el).val(2.60);
                        $(el).prop('readonly', true);
                    });
                    $('select.volumen-unidad').each(function(index, el) {
                        $(el).children().eq(1).prop('selected', true);
                        $(el).prop('disabled', true);
                    });
                }
                else if (servicio == 'Maritimo FCL' || servicio == 'Maritimo LCL'){
                    $('input.volumen-alto').each(function(index, el) {
                        $(el).val(260);
                        $(el).prop('readonly', true);
                    });
                    $('select.volumen-unidad').each(function(index, el) {
                        $(el).children().eq(2).prop('selected', true);
                        $(el).prop('disabled', true);
                    });
                }
            }
            else{
                if(servicio == 'Terrestre FTL' || servicio == 'Terrestre LTL'){
                    $('input.volumen-alto').each(function(index, el) {
                        $(el).val(0);
                        $(el).prop('readonly', false);
                    });
                    $('select.volumen-unidad').each(function(index, el) {
                        $(el).children().eq(1).prop('selected', false);
                        $(el).prop('disabled', false);
                    });
                }
                else if (servicio == 'Maritimo FCL' || servicio == 'Maritimo LCL'){
                    $('input.volumen-alto').each(function(index, el) {
                        $(el).val(0);
                        $(el).prop('readonly', false);
                    });
                    $('select.volumen-unidad').each(function(index, el) {
                        $(el).children().eq(2).prop('selected', false);
                        $(el).prop('disabled', false);
                    });
                }

            }
        }
    });

    export default {
        data(){
            return{
                mercancias:[],
                commodities:[],
                servicios:[],
                tipo: $('#tipo_servicio option:selected').val(),
                volumen_total: 0,
                peso_total: 0
            }
        },
        watch:{
            mercancias: {
              handler: function (val, oldVal) {
                let servicio = $('#tipo_servicio option:selected').val();
                for (var i = val.length - 1; i >= 0; i--) {
                    if($('input:radio[name=es_estibable]:checked').val() == 0){
                        if(servicio == 'Terrestre FTL' || servicio == 'Terrestre LTL'){
                            $('input.volumen-alto').each(function(index, el) {
                                val[i].alto = 2.60;
                                $(el).prop('readonly', true);
                            });
                            $('select.volumen-unidad').each(function(index, el) {
                                $(el).prop('disabled', true);
                                val[i].medidas = 'm';
                            });
                        }
                        else if (servicio == 'Maritimo FCL' || servicio == 'Maritimo LCL'){
                            $('input.volumen-alto').each(function(index, el) {
                                //$(el).val(260);
                                val[i].alto = 260;
                                $(el).prop('readonly', true);
                            });
                            $('select.volumen-unidad').each(function(index, el) {
                                $(el).prop('disabled', true);
                                val[i].medidas = 'cm';
                            });
                        }
                        /****/
                        if(val[i].ancho != "" && val[i].profundo != "" ){
                            if (val[i].bultos != "")
                                val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo*val[i].bultos;
                            else
                                val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo;
                        }
                        /******/
                    }
                    else{
                        if(val[i].alto != "" && val[i].ancho != "" && val[i].profundo != "" ){
                            if (val[i].bultos != "")
                                val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo*val[i].bultos;
                            else
                                val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo;
                        }

                    }
                    // cALCULO DEL PESO
                    if (val[i].peso_br) {
                        if (val[i].bultos != "")
                            val[i].peso_total = val[i].peso_br*val[i].bultos;
                        else
                            val[i].peso_total = val[i].peso_br;
                    }
                    if (val[i].tipo_servicio) {
                        // console.log(val[i].tipo_servicio);
                        //this.getServicios($('#tipo_servicio option:selected').val());
                    }
                }
                this.calcularPesoTotal();
                this.calcularVolumenTotal();
              },
              deep: true
            },
            tipo: {
                handler: function(val, oldVal){
                    console.log('tipo:');
                    console.log(val);
                }
            }
        },
        methods:{
            nuevoProducto(){
                let producto = {
                    nombre:"",
                    //line1_origen:"",
                    //line2_origen:"",
                    //cp_origen:"",
                    //line1_destino:"",
                    //line2_destino:"",
                    //cp_destino:"",
                    naturaleza:"",
                    alto:"",
                    ancho:"",
                    profundo:"",
                    medidas:"",
                    peso_br:"",
                    medida_peso:"",
                    bultos:"",
                    peso_total:"",
                    volumen_total:"",
                    tipo_servicio:"",
                    observaciones:"",
                    serv_extra:[]
                }
                console.log($('#tipo_servicio option:selected').val());
                console.log($('input[name=es_estibable]:checked'));
                this.mercancias.push(producto);
            },
            removerProducto(index){
                if(this.mercancias.length > 1){
                    this.mercancias.splice(index,1);
                    this.calcularPesoTotal();
                    this.calcularVolumenTotal();

                }
            },
            getCommodities(){

                let url = "/rgc/getCommodities";
                //let url = "/getCommodities";
                axios.get(url).then(res=>{
                    this.commodities = res.data.commodities;
                }).catch(err=>{
                    console.log('err',err);
                });
            },
            eliminarServicio(mercancia,index){
                mercancia.serv_extra.splice(index,1);
            },
            calcularVolumenTotal(){
                /*Puntos a considerar al realizar la sumatoria de VOLUMEN TOTAL

                a) Si es servicio LTL .- se suman todos los volúmenes que se dieron de alta y se multiplica el total por un 
                    factor de 350 . El resultado se compara contra el resultado de PESO TOTAL, y se elige la que sea mayor.
                b) Si es servicio LCL.-  Se suman todos los volúmenes que se dieron de alta y se multiplica el total por un 
                    factor de un millón. El resultado se compara contra el resultado de PESO TOTAL, y se elige la que sea mayor.
                c) Si es servicio AEREO.- Se suman todos los volúmenes que se dieron de alta y el total se divide entre un 
                    factor de 6,000. El resultado se compara contra el resultado de PESO TOTAL, y se elige la que sea mayor.
                d) Si el servicio empieza con F (FTL y FCL) .- NO aplica la multiplicación ni división para el peso volumétrico, 
                    ese se queda tal cual*/

                this.volumen_total = 0
                let tipoServicio = $('#tipo_servicio option:selected').val();

                for (var i = this.mercancias.length - 1; i >= 0; i--) {
                    if (this.mercancias[i].volumen_total != "")
                        this.volumen_total += parseFloat(this.mercancias[i].volumen_total);
                }

                if (tipoServicio != '') {
                    if (tipoServicio.includes('LTL')) {
                        this.volumen_total *= 350;
                        this.volumen_total = Math.max(this.volumen_total, parseFloat($('#peso_total').val() ));
                    }

                    else if(tipoServicio.includes('LCL')){
                        this.volumen_total *= 1000000;
                        this.volumen_total = Math.max(this.volumen_total, parseFloat($('#peso_total').val() ));
                    }
                    
                    else if(tipoServicio.includes('Aereo')){
                        this.volumen_total /= 6000;
                        this.volumen_total = Math.max(this.volumen_total, parseFloat($('#peso_total').val() ));
                    }
                    
                }
                else
                    console.log('Si esta vacio');
                $('#volumen_total').val(this.volumen_total.toFixed(2));
            },
            calcularPesoTotal(){
                this.peso_total = 0
                for (var i = this.mercancias.length - 1; i >= 0; i--) {
                    if (this.mercancias[i].peso_total != "")
                        this.peso_total += parseFloat(this.mercancias[i].peso_total);
                }
                $('#peso_total').val(this.peso_total.toFixed(2));
                console.log(this.peso_total);
            }
        },
        mounted() {
            let producto = {
                nombre:"",
                line1_origen:"",
                line2_origen:"",
                cp_origen:"",
                line1_destino:"",
                line2_destino:"",
                cp_destino:"",
                naturaleza:"",
                alto:"",
                ancho:"",
                profundo:"",
                medidas:"",
                peso_br:"",
                medida_peso:"",
                bultos:"",
                peso_total:"",
                volumen_total:"",
                tipo_servicio:"",
                observaciones:"",
                serv_extra:[]
            }
            this.mercancias.push(producto);
            this.getCommodities();

            this.tipo = $('#tipo_servicio option:selected').val();
            console.log('Component mounted Merc.');
            //Dism /Online /Cleanup-Image /RestoreHealth
            //sfc /scannow
        }
    }
</script>

