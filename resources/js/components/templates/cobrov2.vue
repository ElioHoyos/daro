<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                        <div class="card-header bg-azul text-center">
                            <h4 class="title">COBROS DIARIOS</h4>  
                        </div>
                    <div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><label>Datos Prestamo</label></legend>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Fecha (*)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control form-control-sm" v-model="venta.fecha">
                                </div>
                            </div>
                            <div class="form-group row" v-if="descarga">
                                <div class="col-md-2 text-left">
                                    <label>Descarga</label>
                                </div>
                                <div class="col-md-3" v-if="descarga">
                                    <a :href="'reporteCobros/'+venta.fecha + '/' + zcobrador" target="_blank" class="btn bg-navy" >Descargar <i class="fa fa-download"></i></a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <button @click="getPrestamos(venta.fecha,zcobrador)" class="btn bg-indigo">Buscar <i class="fa fa-search-dollar 3x"></i></button>
                                </div>
                                    <div class="col-md-3">
                                    <a :href="'reporteGeneral/'+zcobrador+'/'+venta.fecha" target="_blank" class="btn bg-navy">Reporte General <i class="fa fa-paste"></i></a>
                                </div>
                            </div>
                        </fieldset>
                        <div class="content table-responsive table-full-width">
                            <v-client-table :data="ingresos" :columns="columns" :options="options">
                            </v-client-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</template>
<script>
    export default {
    data() {
        return {
			venta:{
                fecha:null,
            },
			ingresos	:[{
				ID:null,
                Cliente:null,
                Monto:null,
                Cuota:null,
                Fecha:null
            }],
            cobradores:[{label:null,code:null}],
            columns: ["ID","Cliente","Cuota","Monto","Fecha"],
            options: {
                perPageValues : [5,10,15,20,25],
                perPage : 5,
                texts: {
                    filter: "Buscar:",
                    count: "Mostando {from} a {to} de {count} registros|{count} registros|Un registro",
                    first: 'Primero',
                    last: 'Último',
                    filterPlaceholder: "Buscar",
                    limit: "Registros:",
                    page: "Pagina:",
                    noResults: "No se encontraron registros",
                    filterBy: "Filtrar por {column}",
                    loading: 'Cargando...',
                    defaultOption: 'Seleccionar {column}',
                    columns: 'Columnas'
                },
				headings:
				{
                    Cliente:"Cliente",
                    Monto:"Monto",
                    Fecha:"Fecha"
					
				},
				sortable    : ["ID","Cliente","Cuota","Monto","Fecha"],
				filterable  : ["ID","Cliente","Cuota","Monto","Fecha"]
            },
            descarga:false,
            cargando: false,
            zcobrador:null
        }
	},
	created(){
        this.getCobradores();
        this.getAutenticacion();
	},
	mounted(){

	},
    methods: {
        getCobradores()
        {
            this.$Progress.start();
            axios.get("zgetCobradores")
            .then(data=>
            {
                this.cobradores = data.data.clientes;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
        getAutenticacion()
        {
            this.$Progress.start();
            axios.get("autenticacion")
            .then(data=>
            {
                this.zcobrador = data.data.user;
                this.$Progress.finish();
                console.log(this.zcobrador);
            }
            ).catch(error=>{
                console.log(error);
            });
        },
		getPrestamos(fecha,vendedor)
        {
            console.log(fecha,vendedor);
            if(fecha == null || fecha == "" || vendedor == null || vendedor == "") return;
            this.descarga = false;
            this.cargando = true;
            
            this.$Progress.start();
            axios.get("getCobros/"+fecha+"/"+vendedor)
            .then(data=>
            {
                this.cargando = false;
                this.descarga = data.data.IsConsistent;
                this.ingresos = data.data.cobros;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
            
        },
    }
}
</script>
