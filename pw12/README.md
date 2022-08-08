Dentro na sua pasta faça, abra o terminal e faça:   
*npm init*    
*npm install express --save*    
*npm install --save-dev nodemon*   
Edite o arquivo package.json e faça add o seguinte parte em "scripts"   
"scripts": {   
    "test": "echo \"Error: no test specified\" && exit 1",   
    "start": "nodemon index.js"   
}   
Execute a aplicação Node: *npm start*     
ou apenas o *node index.js*   
