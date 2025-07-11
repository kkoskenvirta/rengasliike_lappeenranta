const fs = require("fs");
const path = require("path");

// Copy all files from public to root
const publicDir = path.join(__dirname, "public");
const files = fs.readdirSync(publicDir);

files.forEach((file) => {
  const sourcePath = path.join(publicDir, file);
  const destPath = path.join(__dirname, file);

  if (fs.statSync(sourcePath).isFile()) {
    fs.copyFileSync(sourcePath, destPath);
    console.log(`Copied ${file} to root`);
  }
});

console.log("Build complete! Static files ready for GitHub Pages.");
