<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                        <div class="card-header bg-azul text-center">
                            <h4 class="title">INGRESOS</h4>  
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Desde (*)</label>
                                    <input type="date" class="form-control form-control-sm" v-model="venta.desde" @change="getPrestamos()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Hasta (*)</label>
                                    <input type="date" class="form-control form-control-sm" v-model="venta.hasta" @change="getPrestamos()">
                                </div>
                            </div>
                            <div class="col-md-3" v-if="descarga">
                                <div class="form-group">
                                    <label>Descargar</label> <br>
                                    <a :href="'reporte/'+venta.desde+'/'+venta.hasta" target="_blank" class="btn bg-olive" title="descargar reporte">Descargar <i class="fa fa-file-pdf"></i></a>
                                </div>
                            </div>
                            <div class="col-md-5" v-if="cargando">
                                <div  class="spinner-grow text-secondary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-success" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
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
                desde:null,
                hasta:null,
            },
			ingresos	:[{
				ID:null,
                Cliente:null,
                Monto:null,
                Fecha:null
            }],
            columns: ["ID","Cliente","Monto","Fecha"],
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
				sortable    : ["ID","Cliente","Monto","Fecha"],
				filterable  : ["ID","Cliente","Monto","Fecha"]
            },
            descarga:false,
            cargando: false,
        }
	},
	created(){
	},
	mounted(){

	},
    methods: {
		getPrestamos()
        {
            this.descarga = false;
            if(this.venta.desde == null ||  this.venta.hasta == null) return;
            var desde = this.venta.desde;
            var hasta = this.venta.hasta;
            if(this.venta.desde > this.venta.hasta)
            {
                swal({
                type : 'error',
                title: 'ERROR!',
                text:  'Fecha Inicio debe ser menor a Fecha Final',
                showConfirmButton: true,
                });
            }else{
                this.cargando = true;
                this.$Progress.start();
                axios.get("getIngresos/"+desde+"/"+hasta)
                .then(data=>
                {
                    this.cargando = false;
                    this.descarga = data.data.IsConsistent;
                    this.ingresos = data.data.ingresos;
                    this.$Progress.finish();
                }
                ).catch(error=>{
                    console.log(error);
                })
            }
        },
        

    }
}
</script>
