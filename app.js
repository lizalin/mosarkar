const express = require("express");
const bcrypt  = require("bcryptjs");
const bodyParser = require("body-parser");
const cors = require("cors");
const helmet = require("helmet");

const app = express();

app.use(cors());

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:false}));

app.use(helmet());

app.get("*",(req,res)=>res.status(200).send({
    message:"Welcome to the default API route"
}));

//set port
const port = process.env.PORT || 5200

//start server

app.listen(port,()=>console.log(`Server started on ${port}...`));