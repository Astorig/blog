Echo
    .private('article')
    .listen('ArticleUpdated', (e) => {
        alert(
            'Изменена статья: ' + e.article.title + '\n' +
            'Поля, которые были изменены ' + Object.keys(JSON.parse(e.changedColumns))
        );
    });

Echo
    .private('App.Models.User.1')
    .notification((notification) => {
         console.log(notification.resultRequest);
});
