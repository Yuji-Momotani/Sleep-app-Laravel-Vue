module.exports = {
  // アセットはLaravelの `public` の `app` ディレクトリ配下に作成されるようにする.
  outputDir: '../backend/public/app',


  // app配下にjs, cssなどが置かれるので、publicPathを調整する
  publicPath: '/app',


  pages: {
  // appのエントリポイント、テンプレート、出力先を調整
    app: {
      entry: 'src/app/main.js',
      template: 'templates/base.html',
      filename: '../../resources/views/spa/app.blade.php',
    },
  },
};