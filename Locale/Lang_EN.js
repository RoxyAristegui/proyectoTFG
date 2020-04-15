
arrayEN={
//header 
	NomProyect:'INCID',
	Idioma : 'Languaje',
	LogIn :'Log in',
	seleccionaIdioma :'Select a languaje',
	Usuario: 'User',
	VerPerfil : 'Profile',
	Desconectar : 'Disconect',
	notAuthUser : 'User not authenticated',
	Registrar : 'Register',
	volver : 'Return',
	Cancelar : 'Cancel',
	confirmar:'OK',
	TeVas : 'Ready to Leave?',
	SeleccionaDesconectarSi : 'Select "Logout" below if you are ready to end your current session',

	//menu LAteral
	Inicio : 'Home',
	GestionUsuarios : 'Users management',
	GestionPermisos : 'Access management',
	GestionRoles : 'Rol management',
	GestionEntidades:'Entities management',
	GestionAcciones:'Actions management',
	DefinirPermisos:'Define permissions',
	AsignarARol:'Role asignament',
	ListarUsuarios:'Users list',
	Componentes:'items',


	//generales
	AllUSers : 'All Users',
	AccesoRestringido : 'ACCESS DENIED',
	BusquedaAvanzada : 'Advanced search',
	Bienvenido:'Welcome',




	//usuarios
	Login :'Login',
	login : 'login',
	Nombre : 'Name',
	nombre : 'name',
	Apellidos : 'Last Name',
	apellidos : 'last name',
	Pass: 'Password',
	password : 'password',
	DNI : 'ID',
	dni : 'id',
	email : 'email',
	NuevoCrearCuenta :"it's your first time? sign up!",
	IniciarSesion : 'Log in',
	YaTienesCuentaInicia : 'Already have an account? Log in now',
	NuevoUsuario : 'New User',
	Editar : 'Editar',
	Borrar : 'Delete',
	Añadir : 'Add',
	Buscar : 'Search',
	MostrarTodos : 'Show all',
	AñadirUsuario : 'Add user',
	EditarUsuario : 'Edit user',
	BorrarUsuario : 'Delete user',
	BuscarUsuario : 'Search user',
	Detalle : 'Detail',

	//placeholders
	LetrasyNumeros : 'only letters and numbers',
	SoloLetras : 'only letters',
	SoloLetrasEspacios : 'only letters and spaces',
	IntroduceLogin : 'Introduce your login name',
	IntroduceEmail : 'Introduce your email',
	IntroduceDni : 'Introduce your id',
	DebeSerEmailValido : 'Introduce a valid email',


	Permisos:'Permissions',

	//Roles
	Roles : 'Roles',
	AddRol : 'Add new Role',
	RolesAsignadosAUsuarios : 'User role list',
	RolesAsignadosAUsuariosTexto : 'To change the role user, set a role in the selectable, and press ok',
	RolesCreados: 'Role list',
	Rol : 'Role',
	Descripcion : 'Description',
	RolName : 'Role name',
	Crear : 'Create',
	estasSeguroEliminarRol : 'Are you sure to delete the role',
	EliminarRol : 'Delete role',
	EditarRoles: 'Edit Roles',


		//Acciones
	Acciones : 'Actions',
	SeguroEliminarAccion : 'Sure you want to delete this action?',
	NombreAccion : 'Action name',
	AccionesCreadas:'Created actions',
	Anadiraccion : 'Add action',
	EditarAciones:'Edit actions',
	LaAccionEstaAsignadaARol: 'The action is asigned',

	Entidades:'Entities',
	SeguroEliminarEntidad: 'Sure you want to delete this entitie?',
	NombreEntidad : 'Entity name',
	EntidadesCreadas:'Created entities',
	EditarEntidades: 'Edit entities',
	AnadirEntidad: 'Add entity',
	LaEntidadEstaAsignadaARol: 'The entitie is asigned',



//codigos de errores
	'00001' : 'Success!',
	'000010' : 'Correct user and password',
	'00006' : 'Something happends, query not executed',//'Consulta no ejecutada, algo ha ocurrido.',
	'00007' : 'the query returns empty',
	'00005' : 'Error tring to connect with the DB',
	'000051' : 'Error with the DB',
	
	'000052': 'Sql done successfully',
	'000074': 'Error trying to make the change',
	'00004': 'The file cannot be found',

	'000053': 'Registration completed successfully',
	'000054': 'Modification made successfully',
	'000055': 'Deletion performed successfully',

	'000071': 'A user already exists with that Login',
	'000072': 'There is no user with that name',
	'000073': 'The password does not match',
	'000075': 'There is no user with that email',
	'000076': 'A user with that email already exists',
	'000077': 'A user with that id already exists',

	// permissions
	'000310': 'The Role could not be created',
	'000311': 'The role was created successfully',
	'000312': 'The Role could not be removed',
	'000313': 'Cannot delete, the role is assigned to some user',
	'000314': 'The role was not found',
	'000315': 'The user role could not be modified',
	'000316': 'A role with that name already exists',
	'000317': 'The role has been successfully changed',

	'000330': 'no permissions found for that role',

	'000320': 'The action could not be created',
	'000321': 'The action was created successfully',
	'000322': 'The action could not be deleted',
	'000323': 'The action has been deleted',
	'000324': 'The action could not be found',
	'000326': 'An action with that name already exists',

	'000341': 'The entity was created successfully',
	'000340': 'The entity could not be created',
	'000343': 'Entity has been deleted',
	'000342': 'The entity could not be deleted',
	'000346': 'An entity with that data already exists',
	'000344': 'Entity not found',

	//errores de validacion
	'000121': 'The name length must be greater than 3',
	'000122': 'The length of the name must be less than 30 characters',
	'000123': 'The name only admits letters',
	'000124': 'The name only supports letters and numbers',
	'000125': 'The name cannot be empty',
	'000131': 'The login length must be greater than 5',
	'000132': 'The login length must be less than 30 characters',
	'000133': 'The login only supports letters and numbers',
	'000141': 'The password length must be greater than 5',
	'000142': 'The password length must be less than 30 characters',
	'000143': 'The password only supports letters and numbers',
	'000151': 'The length of the last name must be greater than 3',
	'000152': 'The length of the last name must be less than 50 characters',
	'000153': 'The name only admits letters',
	'000161': 'Enter a valid email address',
	'000162': 'Please enter a valid ID',

}