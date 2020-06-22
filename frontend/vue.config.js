module.exports = {
    outputDir: '../public/app',
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
