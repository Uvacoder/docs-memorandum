import fs from 'fs'
import type { Plugin } from 'vite';

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

interface MarkdownContent {
  title: string
}

const content = async (): Promise<Plugin> => {
  let files = parseContent('./src/content')
  console.log(files);

  return {
    name: 'Content',
  }
}

export default content
