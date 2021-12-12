<div class="mb-3">
    <label for="inputCode" class="form-label">Идентификатор статьи</label>
    <input name="code" type="text" class="form-control" id="inputCode"
           placeholder="Введите уникальный идентификатор"
           value="{{old('code', $article->code ?? '')}}">
</div>
<div class="mb-3">
    <label for="inputTitle" class="form-label">Заголовок статьи</label>
    <input name="title" type="text" class="form-control" id="inputTitle"
           placeholder="Введите заголовок статьи"
           value="{{old('title', $article->title ?? '')}}">
</div>
<div class="mb-3">
    <label for="inputDescr" class="form-label">Краткое описание статьи</label>
    <textarea name="description" class="form-control" id="inputDescr" placeholder="Введите описание статьи">
        {{old('description', $article->description ?? '')}}
    </textarea>
</div>
<div class="mb-3">
    <label for="inputContent" class="form-label">Детальное описание статьи</label>
    <textarea name="content" class="form-control" id="inputContent" placeholder="Введите статью">
        {{old('content', $article->content ?? '')}}
    </textarea>
</div>
<div class="mb-3">
    <label for="inputTags" class="form-label">Тэги</label>
    <input name="tags" type="text" class="form-control" id="inputTags"
           placeholder="Введите тэги"
           value="{{old('tags', isset($article->tags) ? $article->tags->pluck('name')->implode(',') : '')}}">
</div>
@admin(Auth::user()->roles)
        <div class="mb-3 form-check">
            <input name="published" type="checkbox" class="form-check-input" id="inputPublished" value="{{$article->isPublished() ? 0 : 1 }}">
            <label class="form-check-label" for="inputPublished">{{$article->isPublished() ? 'Снять с публикации' : 'Опубликовать' }}</label>
        </div>
@endadmin
