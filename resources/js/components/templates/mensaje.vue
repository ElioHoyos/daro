<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
	            <div class="card card-info"  id="objetivo">
	                <div class="card-header text-center bg-azul">
	                    <h4 class="title">Mensajes</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto text-primary t15"><b>Crear Mensaje</b></legend>    
                            <div class="form-group row">  
                                <div class="col-md-1">
                                <label>Tipo</label>   
                                </div>                             
                                <div class="col-md-3">
                                    <select v-model="mensaje.tipo" class="form-control form-control-sm">
                                        <option value="sendMessage">Mensaje</option>
                                        <option value="IMAGE">Imagen</option>
                                        <option value="sendFile">Archivo</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row" v-if="mensaje.tipo == 'sendMessage'">  
                                <div class="col-md-1">
                                <label>Mensaje</label>   
                                </div>                             
                                <div class="col-md-6">
                                    <textarea v-model="mensaje.mensaje" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" v-if="mensaje.tipo == 'IMAGE'">  
                                <div class="col-md-1 text-left">
                                    <label>Imagen</label>
                                 </div>
                                <div class="col-md-2" v-if="mensaje.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-image"></i> imagen
										<input @change="arc" type="file">
									</div>
                                </div>
								<div class="col-md-4">
									<img v-if="mensaje.foto != null" :src="'data:'+mensaje.foto" @click="reset()" alt="" width="120" height="175">
								</div>
                            </div>   
                            <div class="form-group row" v-if="mensaje.tipo == 'IMAGE'">  
                                <div class="col-md-1 text-left">
                                    <label>Caption</label>
                                 </div>
                                <div class="col-md-4">
                                    <input type="text" maxlength="100" class="form-control form-control-sm" v-model="mensaje.caption">
                                </div>
                            </div>  
                            <div class="form-group row" v-if="mensaje.tipo == 'sendFile'">  
                                <div class="col-md-1 text-left">
                                    <label>Archivo</label>
                                 </div>
                                <div class="col-md-2" v-if="mensaje.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-paperclip"></i> Archivo
										<input @change="arc" type="file">
									</div>
                                </div>
                            </div>   
                            <div class="form-group row" v-if="mensaje.tipo != null">  
                                <div class="col-md-1">
                                <label>Enviar a</label>   
                                </div>                             
                                <div class="col-md-3">
                                    <select v-model="mensaje.to" class="form-control form-control-sm">
                                        <option value="DOC">Docentes</option>
                                        <option value="ALU">Alumnos</option>
                                        <option value="LIBRE">Mensaje Libre</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row" v-if="mensaje.to == 'LIBRE'">  
                                <div class="col-md-1 text-left">
                                    <label>Números</label>
                                 </div>
                                <div class="col-md-11">
                                    <input type="text" maxlength="1000" placeholder="separar los numeros con coma (,)" onKeyPress="return onlyNumbers(event)" class="form-control form-control-sm" v-model="mensaje.destino">
                                </div>
                            </div>  
                        </fieldset>
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-success" @click="addMessage()">Enviar</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger" @click="load()">Cancelar</button>
                            </div>
                        </div>
	                </div>
				</div>
			</div>
	    	</div>

            <div class="row" id="expeditos">
                <div class="col-md-12">
                    <div class="card card-info">
                            <div class="card-header text-center bg-azul">
                                <h4 class="title">Mensajes  <button  class="btn bg-navy altoBoton" id="mas" @click="ocultar('1')">
							 <i class="fa fa-plus"></i>
							</button></h4>
                            </div>
                        <div class="card-body">
                            <div class="content table-responsive table-full-width t12">
                                <v-client-table :data="mensajes" :columns="columns" :options="options">
                                    <div slot="Acciones" slot-scope="props">
                                        <button class="btn bg-indigo altoBoton" title="reutilizar" @click="reutilizar(props.row.id)"> <i class="fa fa-undo"></i></button>
                                    </div>
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
            mensaje:{
                mensaje:null,
                foto:null,
                ext:null,
                caption:null,
                to:null,
                destino:null,
                tipo:null,
            },
            mensajes	:[{
                id:null,
                mensaje:null,
            }],
            
            columns: ["id","mensaje","destino","Acciones"],
            options: {
				headings:
				{
                    mensaje: "Mensaje",
                    destino: "Destino",
				},
				sortable    : ["id","mensaje","destino"],
				filterable  : ["id","mensaje","destino"]
            },
            destino:[],
        }
	},
	created(){
        this.getMessages();
	},
	mounted(){
        $('#objetivo').hide();
        $('#detalles').hide();
        $('#edit').hide();
	},
    methods: {
        reset()
		{
			this.mensaje.foto = null;
		},
		arc(e)
        {
            var size = e.target.files[0].size;
			var name = e.target.files[0].name;
			var type = e.target.files[0].type;
			this.mensaje.ext = name.split('.').pop();
			// if(!type.includes("image"))
			// {
			// 	swal({
			// 		type : "warning",
			// 		text : "debe seleccionar una imagen",
			// 	});
			// 	return;
			// }
			if(size > 20000000)
            {
				swal({
					type : "warning",
					text : "tamaño max. 20mb",
				});
				return;
			}
            var files = new FileReader();
            files.readAsDataURL(e.target.files[0]);
            files.onload = (e) =>
            {
			   this.mensaje.foto    = e.target.result;
            }
            
        },
        createInstance(id)
        {
            if(id != '' && id != null)
            {
                this.instancia.instanceid = "instance" + id;
            }
        },
        getInstancias()
        {
            this.$Progress.start();
            axios.get("getInstancias")
            .then(data=>
            {
                this.instancias = data.data.instancias;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getMessages()
        {
            this.$Progress.start();
            axios.get("getMessages")
            .then(data=>
            {
                this.mensajes = data.data.mensajes;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        load()
        {
            this.mensaje.mensaje    = null;
            this.mensaje.foto       = null;
            this.mensaje.ext        = null;
            this.mensaje.caption    = null;
            this.ocultar(2);
        },
		addMessage()
		{
            if(this.mensaje.tipo == null)
            {
                swal(
                    {
                        type: "error",
                        text: "Seleccionar Tipo de Mensaje",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                return;    
            }
            if(this.mensaje.tipo == "sendMessage")
            {
                if(this.mensaje.mensaje == null || this.mensaje.mensaje == "")
                {
                    swal(
                    {
                        type: "error",
                        text: "El mensaje no debe ser vacío",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    return;   
                }
                
            }
            if(this.mensaje.tipo == "sendFile" || this.mensaje.tipo == "IMAGE")
            {
                if(this.mensaje.foto == null)
                {
                    swal(
                    {
                        type: "error",
                        text: "debe seleccionar un archivo",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    return;   
                }
            }
            if(this.mensaje.to == "LIBRE")
            {
                this.destino = this.mensaje.destino.split(",");
            }
            if(this.destino.length == 0)
            {
                swal(
                {
                    type: "error",
                    text: "no hay destinatarios",
                    showConfirmButton: false,
                    timer: 2000,
                });
                return;   
            }

            this.$Progress.start();
            axios.post("sendMessage",{
                mensaje:this.mensaje,
                destino:this.destino,
            
            }).then(data=>{
                swal({
                    // position: 'top-end',
                    type: data.data.type,
                    title: data.data.title,
                    text: data.data.text,
                    showConfirmButton: false,
                    timer: 2000
                });
                this.$Progress.finish();
                }).catch(error=>{
                console.log(error);	
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Comuniquese con un administrador',
                    showConfirmButton: true,
                });
            })
			
        },
        editInstance()
		{
            this.$Progress.start();
            axios.post("updateInstancia",{
                instancia:this.instancia,
            }).then(data=>{
                swal({
                    // position: 'top-end',
                    type: data.data.type,
                    title: data.data.title,
                    text: data.data.text,
                    showConfirmButton: false,
                    timer: 2000
                });
                this.$Progress.finish();
                this.load();
                this.ocultar(2);
                this.getInstancias();
                }).catch(error=>{
                console.log(error);	
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Comuniquese con un administrador',
                    showConfirmButton: true,
                });
            });
        },
        editar(id)
        {
            this.$Progress.start();
            axios.get("getInstancia/"+id)
            .then(data=>
            {
                this.instancia = data.data.instancia;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
            this.ocultar(1);
            $("#edit").show();
            $("#add").hide();
        },
		ocultar(id){
			if(id == '1')
			{
                $('#objetivo').show();
                $('#expeditos').hide();
                $('#detalles').hide();
                $('#filas').show();
                $('#add').show();
                $('#edit').hide();
			}
			else if(id == '2')
			{
				$('#objetivo').hide();
                $('#expeditos').show();	
                
			}
			
        },
       
        
    }
}
</script>
