'use strict'
import { Web3Storage } from 'web3.storage'
import { getFilesFromPath } from 'web3.storage'

let apikey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDA3OGExZTNiZDg3MUFmMmIxQzM5ZDQ0NEZhMTNlN2M3ZDk5QTI2QTIiLCJpc3MiOiJ3ZWIzLXN0b3JhZ2UiLCJpYXQiOjE2NDM1Nzk4OTA0MDEsIm5hbWUiOiJkb2N1bWVudHMifQ.vgm5JW91ag9Dd3YRSjrxLpsUno7GU35kT6yAEPz6W5w";

function getAccessToken() {
  
  return apikey;
}

function makeStorageClient() {
  return new Web3Storage({ token: getAccessToken() })
}

async function getFiles(path) {
    const files = await getFilesFromPath(path)
    console.log(`read ${files.length} file(s) from ${path}`)
    return files
}

async function storeFiles(files) {
    const client = makeStorageClient()
    const cid = await client.put(files)
    console.log('stored files with cid:', cid)
    return cid
}

async function storeWithProgress(files) {  
    // show the root cid as soon as it's ready
    const onRootCidReady = cid => {
      console.log('uploading files with cid:', cid)
    }
  
    // when each chunk is stored, update the percentage complete and display
    const totalSize = files.map(f => f.size).reduce((a, b) => a + b, 0)
    let uploaded = 0
  
    const onStoredChunk = size => {
      uploaded += size
      const pct = totalSize / uploaded
      console.log(`Uploading... ${pct.toFixed(2)}% complete`)
    }
  
    
    const client = makeStorageClient();
    
    return client.put(files, { onRootCidReady, onStoredChunk })
  }

export async function store(path){
    
    let files = await getFiles(path);
    let rootcid = await storeWithProgress(files);

    console.log(rootcid);
    return rootcid;

}



//https://bafybeif54hdrp3wvxsjnqhfkl6vxwlnfminbehleja2hrqjm4467rwg6yu.ipfs.dweb.link/randomText.pdf