import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import fs from "fs";
import path from 'path';

const NGROK_DOMAIN = "6332-2806-2f0-62a1-ed13-b47b-4cb8-2a9c-be10.ngrok-free.app";

export default defineConfig(({ command, mode }) => {
  if (command === 'serve') {
    // Modo desarrollo (npm run dev)
    return {
      plugins: [
        laravel({
          input: ['resources/css/app.css', 'resources/js/app.js'],
          refresh: true,
        }),
      ],
      server: {
        https: {
          key: fs.readFileSync(path.resolve(__dirname, 'cert/localhost.key')),
          cert: fs.readFileSync(path.resolve(__dirname, 'cert/localhost.crt')),
        },
        host: true,       // TRUE para aceptar conexiones externas (no string "true")
        port: 5173,
        cors: true,
        strictPort: true,
        hmr: {
          protocol: "wss",
          host: 'localhost',
          port: 5173,
        },
      },
    };
  } else {
    // Modo producción (npm run build)
    return {
      plugins: [
        laravel({
          input: ['resources/css/app.css', 'resources/js/app.js'],
          refresh: true,
        }),
      ],
      build: {
        manifest: true,
        outDir: "public/build",
        emptyOutDir: true,
      },
    };
  }
});
