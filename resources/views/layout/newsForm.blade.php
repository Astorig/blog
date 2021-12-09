<div class="mb-3">
    <label for="inputTitle" class="form-label">Заголовок</label>
    <input name="title" type="text" class="form-control" id="inputTitle"
           placeholder="Введите заголовок новости"
           value="{{old('title', $news->title ?? '')}}">
</div>
<div class="mb-3">
    <label for="inputDescription" class="form-label">Описание новости</label>
    <textarea name="description" class="form-control" id="inputDescription" placeholder="Введите описание новости">
        {{old('description', $news->description ?? '')}}
    </textarea>
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Тело новости</label>
    <textarea name="body" class="form-control" id="inputBody" placeholder="Введите текст новости">
        {{old('body', $news->body ?? '')}}
    </textarea>
</div>
<div class="mb-3">
    <label for="inputTags" class="form-label">Тэги</label>
    <input name="tags" type="text" class="form-control" id="inputTags"
           placeholder="Введите тэги"
           value="{{old('tags', isset($news->tags) ? $news->tags->pluck('name')->implode(',') : '')}}">
</div>
