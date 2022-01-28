import fs, { readdir } from 'fs'
import path, { resolve } from 'path';
import type { Plugin } from 'vite';
import Markdown from 'vite-plugin-md'

const getAllFiles = (dirPath: string, arrayOfFiles: any[] = []): string[] => {
  let files = fs.readdirSync(dirPath)

  arrayOfFiles = arrayOfFiles || []

  files.forEach(function (file) {
    if (fs.statSync(dirPath + "/" + file).isDirectory()) {
      arrayOfFiles = getAllFiles(dirPath + "/" + file, arrayOfFiles)
    } else {
      arrayOfFiles.push(`${dirPath}/${file}`)
      // arrayOfFiles.push(path.join(__dirname, dirPath, "/", file))
    }
  })

  return arrayOfFiles
}
const parseContent = async (dir: string) => {
  const files = getAllFiles(dir)

  return files
}

// module.exports = function () {


//   // const moduleContent = `
//   //   ${imports.join('\n')}
//   //   export const routes = [${routes.join(', \n')}]
//   // `

//   // const configureServer = [
//   //   async ({ app }) => {
//   //     app.use(async (ctx, next) => {
//   //       if (ctx.path.startsWith('/@modules/vue-auto-routes')) {
//   //         ctx.type = 'js'
//   //         ctx.body = moduleContent
//   //       } else {
//   //         await next()
//   //       }
//   //     })
//   //   },
//   // ]
//   console.log('content')

//   return 'content'
// }

interface MarkdownContent {
  title: string
}

const content = async (): Promise<Plugin> => {
  let files = parseContent('./src/content')
  console.log(files);


  // console.log(imports)
  // console.log(routes)
  // console.log('content');
  // return [
  // ]
  // const files = import.meta.globEager("./*.md");

  // const modules = {};
  // for (const path in modules) {
  //   modules[path]().then((mod) => {
  //     console.log(path, mod)
  //   })
  // }
  // console.log(files, modules);
  console.log('content');

  return {
    name: 'Content',
  }
}

export default content
