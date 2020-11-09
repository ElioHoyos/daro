<template>
    <div class="content">
	    <div class="container-fluid"  id="cabecera">
	    	<div class="row">
			 <div class="col-md-12">
	            <div class="card card-info"  id="objetivo">
	                <div class="card-header text-center">
	                    <h4 class="title">Mis Datos</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                                <legend class="w-auto t16 text-primary"><b>Datos Cobrador</b></legend>
                                <!-- <div class="form-group row">      
                                    <div class="col-md-2 text-left">
                                        <label>Nombre (*)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nnormal" readonly v-model="docente.nombre" class="form-control form-control-sm"  maxlength="60">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>A. Paterno (*)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="anormal" v-model="docente.paterno" readonly class="form-control form-control-sm">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>A. Materno (*)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="anormal" v-model="docente.materno" readonly class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Direccion (*)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" id="dnormal" readonly v-model="docente.dir" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Celular (*)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="cnormal" readonly v-model="docente.cel" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>E-Mail (*)</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input v-model="docente.correo" id="enormal" readonly class="form-control form-control-sm">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Contraseña (*)</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input v-model="docente.pass" id="pass" placeholder="Nueva contraseña" type="password" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-1">
                                        <button v-if="!ojo" class="btn bg-olive altoBoton" title="ver contraseña" @click="ver()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button v-else class="btn bg-danger altoBoton" title="ocultar contraseña"  @click="ver()">
                                            <i class="fa fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn bg-indigo btn-sm" @click="editar()">Cambiar Contraseña <i class="fa fa-pencil"></i></button>
                                    </div>
                                </div>
                                
                                <!-- <div class="form-group row">
                                    <div class="col-md-2" id="agregar">
                                        <button class="btn btn-success" @click="registrar()">Guardar <i class="fa fa-save"></i></button>
                                    </div>
                                    <div class="col-md-2" id="editar">
                                        <button class="btn btn-warning" @click="edit()">Editar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div class="col-md-2" id="cancelar">
                                        <button class="btn btn-danger" @click="load(1)">Cancelar <i class="fa fa-pause"></i></button>
                                    </div>
                                </div> -->
                            </fieldset>
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
			docente:{
                nombre:null,
                paterno:null,
                materno:null,
                dir:null,
                fecha:null,
                cel:null,
                correo:null,
                pass:null,
                editar:false
			},
			ojo:false,
        }
	},
	created(){
        this.getDatos();
	},
	mounted(){
       
	},
    methods: {
        ver()
        {
            if(!this.ojo)
            {
                $("#pass").get(0).type = "text";
            }else
            {
                $("#pass").get(0).type = "password";
            }
            this.ojo = !this.ojo;
        },
		getDatos()
        {
            this.$Progress.start();
            axios.get("datosDocente")
            .then(data=>
            {
                this.docente.nombre = data.data.docente.Nombre;
                this.docente.paterno    = data.data.docente.Paterno;
                this.docente.materno    = data.data.docente.Materno;
                this.docente.dir    = data.data.docente.Direccion;
                this.docente.fecha  = data.data.docente.Fecha;
                this.docente.cel    = data.data.docente.Celular;
                this.docente.correo = data.data.docente.Correo;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		editar()
		{
            if(this.docente.pass == null || this.docente.pass == "")
            {
                swal({
                    type: "warning",
                    text: "Debe escribir una contraseña",
                    showConfirmButton: false,
                    timer: 2000
                })
                return;
            }
			axios.post("upDocente",{
				docente:this.docente
			}).then(data=>{
				console.log(data);
				swal({
					type: 'success',
					title: 'Datos actualizados correctamente',
					showConfirmButton: false,
					timer: 2000
				});
                this.getDatos();
                this.docente.pass = null;
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'Verifique los campos los campos obligatorios',
					showConfirmButton: true,
				});
			})
		},
    }
}
</script>
