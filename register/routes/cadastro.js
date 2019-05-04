const CadastroController = require("../controllers/cadastro-controller.js")

module.exports = (app) => {

	const controller = new CadastroController(app)

	app.route("/cadastro")
		.get(controller.listar.bind(controller))
		.post(controller.adicionar.bind(controller))

	app.get("/cadastro/novo", controller.novo.bind(controller))

	app.get("/cadastro/editar/:id", controller.editar.bind(controller))

	app.route("/cadastro/:id")
		.delete(controller.excluir.bind(controller))
        .put(controller.alterar.bind(controller))
}