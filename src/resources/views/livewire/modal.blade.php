<div  style="display:inline-block; position:relative;">
    <select class = "sort-form__select" wire:model="selectedPrice" name="price" >
        <option value = "">価格で並び替え</option>
        <option value = "desc" >高い順に表示</option>
        <option value = "asc" >低い順に表示</option>
    </select>
    
    @if($showModal)
    <div class="modal" style="position:absolute; left:105%; top:0; background:#fff; border:1px solid #ccc; padding:5px,z-index:10;min-width:150px;height:30px;text-align:center;border-radius:10px";>
        <div class="modal__content" style=" display:flex;align-items:center;justify-content:space-between;padding:0px 10px;height:30px;">
            <p class="modal__content">{{$selectedPrice =='asc'? '低い順に表示' : '高い順に表示'}}</p>
            <span class="modal__content--close" wire:click="closeModal">×</span>
        </div>
    </div>
    @endif
</div>