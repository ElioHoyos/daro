
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
	            <div class="card card-info"  id="objetivo">
	                <div class="card-header text-center bg-azul">
	                    <h4 class="title">Instancias</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto text-primary t15"><b>Crear Instancia</b></legend>    
                            <div class="form-group row">  
                                <div class="col-md-1">
                                <label>Store</label>   
                                </div>                             
                                <div class="col-md-3">
                                    <input type="text" v-model="instancia.idstore" @keyup="createInstance(instancia.idstore)" id="instancia" class="form-control form-control-sm" maxlength="11" onKeyPress="return solonumeros(event)">
                                </div>
                            </div> 
                            <div class="form-group row">  
                                <div class="col-md-1">
                                <label>Instancia</label>   
                                </div>                             
                                <div class="col-md-3">
                                    <input type="text" v-model="instancia.instanceid" id="instancia" class="form-control form-control-sm" maxlength="11" readonly>
                                </div>
                            </div>    
                             
                            <div class="form-group row">  
                                <div class="col-md-1">
                                <label>Token</label>   
                                </div>                             
                                <div class="col-md-5">
                                    <input type="text" v-model="instancia.token" class="form-control form-control-sm" maxlength="100" onKeyPress="return soloLetras(event)">
                                </div>
                            </div> 
                        </fieldset>
                        
                        <div class="row">
                            <div class="col-md-2" id="add">
                                <button class="btn btn-success" @click="addInstancia()">Guardar <i class="fa fa-save"></i></button>
                            </div>
                            <div class="col-md-2" id="edit">
                                <button class="btn btn-primary" @click="editInstance()">Editar <i class="fas fa-edit"></i></button>
                            </div>
                            <div class="col-md-2" id="cancel">
                                <button class="btn btn-warning" @click="load()">cancelar <i class="fas fa-edit"></i></button>
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
                                <h4 class="title">Instancias  <button  class="btn bg-navy altoBoton" id="mas" @click="ocultar('1')">
							 <i class="fa fa-plus"></i>
							</button></h4>
                            </div>
                        <div class="card-body">
                            <div class="content table-responsive table-full-width t12">
                                <v-client-table :data="instancias" :columns="columns" :options="options">
                                    <div slot="Acciones" slot-scope="props">
                                        <button class="btn bg-indigo altoBoton" title="editar" @click="editar(props.row.id)"> <i class="fa fa-edit"></i></button>
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
            instancia:{
                instanceid:null,
                idstore:null,
                token:null,
            },
            instancias	:[{
                id:null,
                idstore:null,
				instanceid: null,
                token: null,
            }],
            
            columns: ["id","idstore","instanceid","token","Acciones"],
            options: {
				headings:
				{
                    instancia: "Instancia",
                    token: "Token",
				},
				sortable    : ["id","idstore","instanceid","token"],
				filterable  : ["id","idstore","instanceid","token"]
            },
        }
	},
	created(){
        this.getInstancias();
	},
	mounted(){
        $('#objetivo').hide();
        $('#detalles').hide();
        $('#edit').hide();
	},
    methods: {
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
        
        validar()
        {
         
            if(this.instancia.instancia != null)
            {
                $("#instancia").removeClass("is-invalid").addClass("is-valid");
               
            }else
            {
               
                $("#instancia").removeClass("is-valid").addClass("is-invalid");
            }
        },
      
        load()
        {
            this.instancia.instanceid    = null;
            this.instancia.token        = null;
            this.instancia.idstore        = null;
            this.instancia.status        = null;
            this.ocultar(2);
        },
		addInstancia()
		{
           
                this.$Progress.start();
                axios.post("addInstancia",{
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
