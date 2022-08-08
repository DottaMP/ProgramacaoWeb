const db = require('./db')

const Produto = 
db.sequelize.define('produto', {  
    nome: {type: db.Sequelize.STRING},
    email: {type: db.Sequelize.DECIMAL},
    senha: {type: db.Sequelize.INTEGER}
});

Produto.sync(); //sync: cria tabela caso não exista
//Cliente.create({nome:'maria',email:'maria@norton.net.bt',senha:'345345'});

module.exports = Produto;
