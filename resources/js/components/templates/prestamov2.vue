<template>
    <div class="container-fluid">
        <div class="row" v-if="!lista">
            <div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Prestamos</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><label>Datos Prestamo</label></legend>
                            <div class="form-group row" id="dni">  
                                <div class="col-md-2">
                                    <label>Cliente (*)</label>
                                </div>                             
                                <div class="col-md-6">
                                    <v-select v-model="alumnoz" :options="clientes" :value="clientes.code"> </v-select>
                                </div>
                            </div>  
                           
                            <div class="form-group row">      
                                <div class="col-md-2 text-left">
                                    <label>Tipo (*)</label>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control form-control-sm" v-model="prestamo.tipo">
                                        <option value="DIARIO">{{"Diario"}}</option>    
                                        <option value="SEMANAL">{{"Semanal"}}</option>    
                                        <option value="MENSUAL">{{"Mensual"}}</option>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Cuotas (*)</label>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control form-control-sm" @blur="calcular()" maxlength="2" v-model="prestamo.cuotas" onkeypress="return solonumeros(event)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Monto (*)</label>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control form-control-sm" @blur="calcular()" v-model="prestamo.monto" maxlength="6" onkeypress="return solonumeros(event)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Porcentaje (*)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-sm" @blur="calcular()" v-model="prestamo.porcentaje">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Cuota (*)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-sm" v-model="prestamo.cuota">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Fecha (*)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control form-control-sm" v-model="prestamo.fecha">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <button @click="addPrestamo ()" class="btn bg-indigo">Guardar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2">
                                    <button @click="ocultar(2)" class="btn bg-olive">Volver <i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
				</div>
			</div>
	    	</div>
            <div class="row" v-if="lista">
                <div class="col-md-12">
                    <div class="card card-info">
                            <div class="card-header bg-azul text-center">
                                <h4 class="title">Prestamo 
                                    <button  class="btn bg-navy altoBoton" @click="ocultar('1')">
							        <i class="fa fa-plus"></i>
							</button>
                            </h4>  
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
                                <v-client-table :data="prestamos" :columns="columns" :options="options">
                                    <div slot="Acciones" slot-scope="props">
                                    <a :href="'cronograma/'+props.row.ID" target="_blank" class="btn bg-indigo altoBoton" data-toggle="tooltip" data-placement="left" title="Ver Cronograma de pagos"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                    <button class="btn btn-success altoBoton" data-toggle="modal" data-target="#exampleModal" v-on:click="verPrestamos(props.row)" data-placement="left" title="Pagar cuotas"><i class="fa fa-dollar-sign" aria-hidden="true"></i></button>
                                    <button class="btn btn-danger altoBoton" v-on:click="eliminar(props.row)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </v-client-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
            <!-- modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-azul text-white text-center">
                        <h5 class=" text-center" id="exampleModalLabel">Datos Prestamo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div v-if="!cargando1" class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div v-else>
                                Cliente: {{zcliente}}
                            </div>
                        </div>
                        <div class="row" v-if="cargando1">
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-12 text-center"><b>Cuotas </b></div>
                            <div class="col-md-12 text-center text-danger" v-if="cuotas.length == 0">
                                No se encontraron registros
                            </div>
                            <div class="col-md-12"><hr></div>
                        </div>
                        <div class="row" v-if="cargando1 && cuotas.length > 0">
                            <table class="table table-sm text-center">
                                <tr class="bg-indigo">
                                    <td><b>Nro Cuota</b></td>
                                    <td><b>Cuota</b></td>
                                    <td><b>Fecha</b></td>
                                    <td><b>Estado</b></td>
                                    <td><b>Acciones</b></td>
                                </tr>
                                <tr v-for="c in cuotas" :key="c.ID" >
                                    <td>{{c.nroCuota}}</td>
                                    <td>{{c.Cuota}}</td>
                                    <td>{{c.Fecha}}</td>
                                    <td v-if="c.Estado == 0"><b class="text-primary">{{"Pendiente"}}</b></td>
                                    <td v-else-if="c.Estado == 1"><b class="text-success">{{"Pagado"}}</b></td>
                                    <td v-else-if="c.Estado == 2"><b class="text-danger">{{"Pagado con retraso"}}</b></td>
                                    <td v-else-if="c.Estado == 3"><b class="text-secondary">{{"Pagado parcialmente"}}</b></td>
                                    <td ><button v-if="c.Estado == 0 || c.Estado == 3" class="btn btn-success altoBoton" @click="datos(c)" data-toggle="modal" data-target="#ModalPagar" data-placement="left" title="Pagar cuota"><i class="fa fa-dollar-sign"></i></button></td>
                                </tr>
                            </table>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12"><hr></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- fin -->
            <!-- modalpagar -->
            <div class="modal fade" id="ModalPagar" tabindex="-1" role="dialog" aria-labelledby="ModalPagarLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-indigo text-white text-center">
                        <h5 class=" text-center" id="ModalPagarLabel">Pagar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Monto de cuota">Monto de cuota {{zPrestamo}}</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" v-model="monto" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Monto a pagar">Monto a pagar</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control form-control-sm" v-model="pago">
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" @click="pagar(zPrestamo,monto,pago,idCuota)">Pagar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- finmodal -->
    </div>
</template>
<script>
    export default {
    data() {
        return {
            prestamo:
            {
                cliente:null,
                cobrador:null,
                tipo:null,
                porcentaje:null,
                fecha:null,
                monto:null,
                cuota:null,
                cuotas:null,
            },
            aux:null,
			venta:{
                desde:null,
                hasta:null,
                alumno:null,
                fecha:null,
                monto:null,
                descripcion:null,
                comprobante:null
            },
            clientes:[{label:null,code:null}],
            cobradores:[{label:null,code:null}],
            alumnoz:null,
			prestamos	:[{
				ID:null,
                Cliente:null,
                Cobrador:null,
                Cuotas:null,
                Monto:null,
                Fecha:null
            }],
            columns: ["ID","Cliente","Cobrador","Cuotas","Monto","Fecha","Acciones"],
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
                    Cobrador:"Cobrador",
                    Cuotas:"Cuotas",
                    Monto:"Monto",
                    Fecha:"Fecha"
					
				},
				sortable    : ["ID","Cliente","Cobrador","Tiempo","Monto","Fecha"],
				filterable  : ["ID","Cliente","Cobrador","Tiempo","Monto","Fecha"]
            },
            tipo:null,
            cuotas:[],
            zcliente:null,
            zcobrador:null,
            lista:true,
            descarga:false,
            cargando:false,
            cargando1:false,
            zPrestamo:false,
            pago:null,
            monto:null,
            idCuota:null,
        }
	},
	created(){
        this.load();
        this.getClientes();
        this.zgetPrestamos();
        this.getAutenticacion();
	},
	mounted(){

	},
    methods: {
        getAutenticacion()
        {
            this.$Progress.start();
            axios.get("autenticacion")
            .then(data=>
            {
                this.prestamo.cobrador = data.data.user;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
        datos(cuota)
        {
            this.monto      = null;
            this.idCuota    = null;
            this.pago       = null;
            this.monto = cuota.Cuota;
            this.idCuota = cuota.ID;
        },
        eliminar(prestamo)
        {
            this.$Progress.start();
            swal({
                title: '¿Deseas eliminar este prestamo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/eliminarPrestamo/${prestamo.ID}`)
                        .then(data => {
                            swal(
                                {
                                    type : data.data.type,
                                    text : data.data.text,
                                    showConfirmButton : false,
                                    timer : 2000,
                                }
								);
						this.$Progress.finish();
                        this.zgetPrestamos();
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
            console.log(prestamo.ID);
        },
        borrar()
        {
            this.prestamo.cliente       = null;
            this.prestamo.tipo          = null;
            this.prestamo.porcentaje    = null;
            this.prestamo.monto         = null;
            this.prestamo.cuota         = null;
            this.prestamo.cuotas        = null;
            // this.alumnoz = null;
        },
        calcular()
        {
            if(this.prestamo.cuotas == null || this.prestamo.cuotas == null) return;
            if(this.prestamo.porcentaje == null || this.prestamo.porcentaje == null) return;
            if(this.prestamo.monto == null || this.prestamo.monto == null) return;
            var cuotas      = parseInt(this.prestamo.cuotas);
            var porcentaje  = parseInt(this.prestamo.porcentaje);
            var monto       = parseInt(this.prestamo.monto);
            this.prestamo.cuota = monto*(1 + porcentaje/100)/cuotas; 
        },
        load()
        {
            var fechaAux   = new Date();
            var year    = fechaAux.getFullYear();
            var month   = fechaAux.getMonth()+1;
            var day     = fechaAux.getDate();
            
            if(month.toString().length == 1) month = "0"+month;
            if(day.toString().length == 1) day = "0"+day;

            this.prestamo.fecha = year+"-"+month+"-"+day;

        },
		getPrestamos()
        {
            if(this.venta.desde == null ||  this.venta.hasta == null) return;
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
                axios.get("getPrestamos/"+this.prestamo.cobrador)
                .then(data=>{
                    this.cargando = false;
                    this.$Progress.finish();
                    this.prestamos = data.data.prestamos;
                    }).catch(error=>{
                    console.log(error);	
                });
            }
        },
        pagar(idPrestamo,monto,pago,id)
        {
            if(monto < pago)
            {
                swal(
                    {
                        type : "warning",
                        text : "el pago debe ser menor o igual a la cuota",
                        showConfirmButton : false,
                        timer : 2000,
                    });
                    return;
            }
            this.$Progress.start();
            swal({
                title: '¿Deseas pagar esta cuota?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/pagarCuota/${id}/${monto}/${pago}`)
                        .then(data => {
                            swal(
                                {
                                    type : data.data.type,
                                    text : data.data.text,
                                    showConfirmButton : false,
                                    timer : 2000,
                                }
								);
                        this.$Progress.finish();
                        $("#ModalPagar .close").click();
						this.zview(idPrestamo);
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
        },
        getClientes()
        {
            this.$Progress.start();
            axios.get("zgetClientev2")
            .then(data=>
            {
                this.clientes = data.data.clientes;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
        zgetPrestamos()
        {
            this.$Progress.start();
            axios.get("zgetPrestamosv2")
            .then(data=>
            {
                this.prestamos = data.data.prestamos;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
        zview(id)
        {
            this.cargando1 = false;
            this.cuotas = [];
            this.$Progress.start();
            axios.get("verPrestamo/"+id)
            .then(data=>
            {
                this.cargando1 = true;
                this.cuotas = data.data.cuotas;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
        verPrestamos(linea)
        {
            this.zPrestamo = linea.ID;
            this.zcliente = linea.Cliente;
            this.zview(linea.ID);
        },
		addPrestamo ()
		{
            this.prestamo.cliente = this.alumnoz.code;
            if(this.prestamo.cliente == null || this.prestamo.tipo == null
               || this.prestamo.porcentaje == null || this.prestamo.fecha == null
               || this.prestamo.monto == null || this.prestamo.cuotas == null)
            {
                swal({
					type: 'error',
					title: 'Llenar los datos obligatorios',
					showConfirmButton: false,
					timer: 2000
				});
            }else{
                
                this.$Progress.start();
                axios.post("addPrestamo",{
                    prestamo:this.prestamo
                }).then(data=>{
                    swal({
                        type: 'success',
                        title: 'Cronograma de pagos generado correctamente',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    this.$Progress.finish();
                    this.zgetPrestamos();
                    this.ocultar("2");
                    }).catch(error=>{
                    console.log(error);	
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Comuniquese con un administrador',
                        showConfirmButton: true,
                    });
                })
            }
			
		},
		ocultar(id){
			if(id == '1')
			{
                this.lista = false;
                this.borrar();
			}
			else if(id == '2')
			{
                this.lista = true;
                this.borrar();
			}
			
		},

    }
}
</script>
