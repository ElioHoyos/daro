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
                                <legend class="w-auto t16 text-primary"><b>Datos Alumno</b></legend>
                                <div class="form-group row">      
                                    <div class="col-md-2 text-left">
                                        <label>Nombre (*)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly v-model="alumno.nombre" class="form-control form-control-sm"  maxlength="60">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Apellido Paterno (*)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" v-model="alumno.ape" readonly class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Apellido Materno (*)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" v-model="alumno.mat" readonly class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Direccion (*)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly v-model="alumno.dir" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label class="t12">Fecha de Nacimiento (*)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" readonly v-model="alumno.fecha" class="form-control form-control-sm"  maxlength="60">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 text-left">
                                        <label>Contraseña (*)</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input v-model="alumno.pass" id="pass" placeholder="Nueva contraseña" type="password" class="form-control form-control-sm">
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
                                        <button class="btn bg-indigo btn-sm"  @click="editar()">Cambiar Contraseña <i class="fa fa-pencil"></i></button>
                                    </div>
                                </div>
                               
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
			alumno:{
                nombre:null,
                ape:null,
                mat:null,
                dir:null,
                fecha:null,
                pass:null,
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
        load(e)
        {
            
            
        },
		getDatos()
        {
            
            this.$Progress.start();
            axios.get("datosAlumno")
            .then(data=>
            {
                this.alumno.nombre = data.data.alumno.Nombre;
                this.alumno.ape    = data.data.alumno.ApePaterno;
                this.alumno.mat    = data.data.alumno.ApeMaterno;
                this.alumno.dir    = data.data.alumno.Direccion;
                this.alumno.fecha  = data.data.alumno.fechaNac;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		editar()
		{
            if (this.alumno.pass == null || this.alumno.pass == "") {
                swal(
                    {
                        type : "warning",
                        text : "debe llenar el campo contraseña",
                        showConfirmButton : false,
                        timer : 2000,
                    });
                    return;
            }
			axios.post("upAlumno",{
				alumno:this.alumno
			}).then(data=>{
				console.log(data);
				swal({
					type: 'success',
					title: 'Datos actualizados correctamente',
					showConfirmButton: false,
					timer: 2000
				});
                this.getDatos();
                this.load(1);
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
		edit()
		{
			this.load(2);
		},
		
    }
}
</script>
