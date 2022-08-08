const db = require('./db')

const Cliente = 
db.sequelize.define('cliente', {  
    nome: {type: db.Sequelize.STRING},
    email: {type: db.Sequelize.STRING},
    senha: {type: db.Sequelize.STRING}
});

Cliente.sync(); //sync: cria tabela caso não exista
//Cliente.create({nome:'maria',email:'maria@norton.net.bt',senha:'345345'});

module.exports = Cliente;
