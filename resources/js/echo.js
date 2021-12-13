Echo
    .private('article')
    .listen('ArticleUpdated', (e) => {
        alert(
            'Изменена статья: ' + e.article.title + '\n' +
            'Поля, которые были изменены ' + Object.keys(JSON.parse(e.changedColumns))
        );
    });

Echo
    .private('totalReport')
    .notification((notification) => {
        alert(JSON.stringify(notification.resultRequest));
});
