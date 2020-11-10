<div class="bg-modal" id="bg-modal-Order-Item-Popup">
    <div class="modal-contents">

        <div class="close">+</div>

        <div class="model-header">
            <h3>Select Order Items</h3>
        </div>
        <div class="SearchBtnWap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                <button type="submit" class="searchButton cripple">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <div id="tableParent-oI-Table" class="tableParent"></div>

        <div class="model-footer">
            <h5>* Something  to assign!</h5>
        </div>

        <div class="BtnWap">
            <button id="close" class="audButton2 cripple" onclick="closeOrderItemModel()">Close</button>
            <button id="assign" class="audButton cripple" onclick="assignOrderItem()" >Assign</button>
        </div>

    </div>
</div>
