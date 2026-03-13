module.exports = {
  proxy: "http://test.com/", // ← あなたのWPローカルURL
  files: [
    "**/*.php",
    "**/*.css",
    "**/*.js"
  ],
  notify: false,
  open: false
};