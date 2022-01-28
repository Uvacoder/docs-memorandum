import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import Components from 'unplugin-vue-components/vite'
import AutoImport from 'unplugin-auto-import/vite'
import svgLoader from 'vite-svg-loader'
import Content from './src/plugins/content'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    Content(),
    Components({
      directoryAsNamespace: true,
      // allow auto load markdown components under `./src/components/`
      extensions: ['vue', 'md'],

      // allow auto import and register components used in markdown
      include: [/\.vue$/, /\.vue\?vue/, /\.md$/],

      // custom resolvers
      resolvers: [
        // auto import icons
        // https://github.com/antfu/unplugin-icons
        // IconsResolver({
        //   componentPrefix: '',
        //   // enabledCollections: ['carbon']
        // }),
      ],

      dts: 'src/components.d.ts',
    }),
    AutoImport({
      imports: [
        'vue',
        'vue-router',
        'vue-i18n',
        '@vueuse/head',
        '@vueuse/core',
        'vitest',
      ],
      dts: 'src/auto-imports.d.ts',
    }),
    svgLoader(),
  ]
})
