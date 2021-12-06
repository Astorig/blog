<div class="mb-3">
    <label for="inputTitle" class="form-label">Заголовок</label>
    <input name="title" type="text" class="form-control" id="inputTitle"
           placeholder="Введите заголовок новости"
           value="{{old('title', $news->title ?? '')}}">
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Тело новости</label>
    <textarea name="body" class="form-control" id="inputBody" placeholder="Введите текст новости">
        {{old('body', $news->content ?? '')}}
    </textarea>
</div>
