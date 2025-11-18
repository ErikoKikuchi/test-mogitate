<div style="position:relative;" >
    <h3 class=sort-form__title >価格順で表示</h3>
    <select class = "sort-form__select" wire:model="selectedPrice" name="price" >
        <option value = "">価格で並び替え</option>
        <option value = "desc" >高い順に表示</option>
        <option value = "asc" >低い順に表示</option>
    </select>
    
    @if($showModal)
    <div class="modal" style="position:absolute; top:100px; background:#fff; border:1px solid rgb(255, 220, 30) ; padding:5px,z-index:10;min-width:130px;height:30px;text-align:center;border-radius:10px";>
        <div class="modal__content" style=" display:flex;align-items:center;justify-content:space-between;padding:0px 5px 10px 5px ;height:30px; border-bottom: 1px solid rgb(220,220,220);">
            <p class="modal__content">{{$selectedPrice =='asc'? '低い順に表示' : '高い順に表示'}}</p>
            <span class="modal__content--close" wire:click="closeModal" style="color:rgb(255, 220, 30);">×</span>
        </div>
    </div>
    @endif
</div>
