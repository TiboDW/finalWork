'use strict'
import { store } from './storeIPFS.mjs';
import { writeFile } from 'fs';
import { sendToBlockchain } from './toBlockchain.mjs';
import express from "express"

const app = express();
const port = 3000;

app.use(express.urlencoded({extended: false}));
app.use(express.json());




//main('/Users/tibodewinter/Documents/finalwork/frond-end/public/uploads/randomText.pdf', 'randomText','This is a description', 'randomText.pdf');
function main(path, name, description, filename){

    store(path).then(function(CIDString){
        let link = "https://"+CIDString+".ipfs.dweb.link"+"/"+filename;
        
        let json = {
            "name": name,
            "description": description,
            "content": link
        }

        var jsonstring = JSON.stringify(json);

        var filenameMetadata = name + "Metadata.json";
        var metadataPath = "files/"+filenameMetadata;



        writeFile(metadataPath, jsonstring, function(err, data) {
            console.log("check1");
            store(metadataPath).then(function(CIDString){
                
                let linkIPFS = "https://"+CIDString+".ipfs.dweb.link"+"/"+filenameMetadata;
                
                sendToBlockchain(linkIPFS);
                

            });
               
        });

    });

}



app.post('/blockchain', (req, res) =>{
    console.log(req.body);
    let path = req.body.path;
    let name = req.body.name;
    let description = req.body.description;
    let filename = req.body.filename;
    console.log(name);
    main(path, name, description, filename);

    res.status(201).send('received');

});

app.listen(port, () => {
    console.log(`blockchain api listening on port ${port}`)
  })

