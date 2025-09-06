const fs=require('fs'),path=require('path');
const cssDir=path.resolve(__dirname,'..','public','css');
if(!fs.existsSync(cssDir)) fs.mkdirSync(cssDir,{recursive:true});
for(const name of ['frontend','admin']){
  const src=path.resolve(__dirname,'..','assets','css',name+'.css');
  const dst=path.resolve(cssDir,name+'.css');
  if(fs.existsSync(src)) fs.copyFileSync(src,dst);
}
console.log('Postbuild complete.');
